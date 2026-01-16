<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Transaksi Model
 * Handles all database operations for transactions
 * 
 * @package    Jepara Furniture
 * @subpackage Models
 * @category   Admin
 * @author     Aurora
 * @version    2.0
 */

class Transaksi_model extends CI_Model {

    private $table = 'pesanan';
    private $table_items = 'detail_pesanan';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all transactions with optional filters
     */
    public function get_all_transactions($status_filter = null, $search = null) {
        $this->db->select('pesanan.*, 
                          users.nama_lengkap as customer_name,
                          users.email as customer_email,
                          COUNT(detail_pesanan.id) as total_items');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = pesanan.id_user', 'left');
        $this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan = pesanan.id', 'left');
        
        // Apply filters
        if ($status_filter) {
            $this->db->where('pesanan.status_pesanan', $status_filter);
        }
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('pesanan.kode_pesanan', $search);
            $this->db->or_like('users.nama_lengkap', $search);
            $this->db->or_like('users.email', $search);
            $this->db->group_end();
        }
        
        $this->db->group_by('pesanan.id');
        $this->db->order_by('pesanan.created_at', 'DESC');
        
        return $this->db->get()->result();
    }

    /**
     * Get transaction by ID
     */
    public function get_transaction_by_id($id) {
        $this->db->select('pesanan.*, 
                          users.nama_lengkap as customer_name,
                          users.email as customer_email,
                          users.no_telepon as customer_phone');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = pesanan.id_user', 'left');
        $this->db->where('pesanan.id', $id);
        
        return $this->db->get()->row();
    }

    /**
     * Get transaction with customer info (alias)
     */
    public function get_transaction_with_customer($id) {
        return $this->get_transaction_by_id($id);
    }

    /**
     * Get transaction by code
     */
    public function get_transaction_by_code($code) {
        $this->db->where('kode_pesanan', $code);
        return $this->db->get($this->table)->row();
    }

    /**
     * Get transaction items
     */
    public function get_transaction_items($transaction_id) {
        $this->db->select('detail_pesanan.*, produk.gambar_1');
        $this->db->from($this->table_items);
        $this->db->join('produk', 'produk.id = detail_pesanan.id_produk', 'left');
        $this->db->where('detail_pesanan.id_pesanan', $transaction_id);
        
        return $this->db->get()->result();
    }

    /**
     * Get statistics
     */
    public function get_statistics() {
        $stats = new stdClass();
        
        // Total transactions
        $this->db->from($this->table);
        $stats->total_transaksi = $this->db->count_all_results();
        
        // Pending payments count
        $this->db->from($this->table);
        $this->db->where('status_pesanan', 'pending');
        $stats->menunggu_pembayaran = $this->db->count_all_results();
        
        // In process count
        $this->db->from($this->table);
        $this->db->where_in('status_pesanan', ['dikonfirmasi', 'diproses']);
        $stats->proses = $this->db->count_all_results();
        
        // Total revenue (completed orders only)
        $this->db->select_sum('total_harga');
        $this->db->where('status_pesanan', 'selesai');
        $result = $this->db->get($this->table)->row();
        $stats->total_pendapatan = $result && $result->total_harga ? (float)$result->total_harga : 0;
        
        return $stats;
    }

    /**
     * Get monthly growth
     */
    public function get_monthly_growth() {
        // This month
        $this->db->select('COUNT(*) as count');
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        $this_month_result = $this->db->get($this->table)->row();
        
        // Last month
        $last_month_date = strtotime('-1 month');
        $this->db->select('COUNT(*) as count');
        $this->db->where('MONTH(created_at)', date('m', $last_month_date));
        $this->db->where('YEAR(created_at)', date('Y', $last_month_date));
        $last_month_result = $this->db->get($this->table)->row();
        
        $this_month = $this_month_result ? $this_month_result->count : 0;
        $last_month = $last_month_result ? $last_month_result->count : 0;
        
        $growth = $this_month - $last_month;
        
        return [
            'growth' => $growth,
            'this_month' => $this_month,
            'last_month' => $last_month
        ];
    }

    /**
     * Create new transaction
     */
    public function create_transaction($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * Add transaction item
     */
    public function add_transaction_item($data) {
        return $this->db->insert($this->table_items, $data);
    }

    /**
     * Update transaction
     */
    public function update_transaction($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Add admin note to transaction
     */
    public function add_admin_note($transaction_id, $note) {
        // Get current transaction
        $transaction = $this->get_transaction_by_id($transaction_id);
        
        if (!$transaction) {
            return false;
        }
        
        // Append note to existing catatan_pesanan
        $current_note = $transaction->catatan_pesanan ?? '';
        $timestamp = date('d/m/Y H:i');
        $admin_name = $this->session->userdata('name');
        
        $new_note = $current_note . "\n[{$timestamp} - {$admin_name}]: {$note}";
        
        return $this->update_transaction($transaction_id, [
            'catatan_pesanan' => trim($new_note)
        ]);
    }

    /**
     * Delete transaction
     */
    public function delete_transaction($id) {
        // Delete items first
        $this->db->where('id_pesanan', $id);
        $this->db->delete($this->table_items);
        
        // Delete transaction
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Get transactions for export
     */
    public function get_transactions_for_export($status_filter = null, $start_date = null, $end_date = null) {
        $this->db->select('pesanan.*, 
                          users.nama_lengkap as customer_name,
                          users.email as customer_email');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = pesanan.id_user', 'left');
        
        // Apply filters
        if ($status_filter) {
            $this->db->where('pesanan.status_pesanan', $status_filter);
        }
        
        if ($start_date) {
            $this->db->where('DATE(pesanan.created_at) >=', $start_date);
        }
        
        if ($end_date) {
            $this->db->where('DATE(pesanan.created_at) <=', $end_date);
        }
        
        $this->db->order_by('pesanan.created_at', 'DESC');
        
        return $this->db->get()->result();
    }

    /**
     * Generate unique transaction code
     */
    public function generate_transaction_code() {
        $prefix = 'TRX-';
        $date = date('ymd');
        
        // Get last transaction of today
        $this->db->select('kode_pesanan');
        $this->db->like('kode_pesanan', $prefix . $date, 'after');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $last = $this->db->get($this->table)->row();
        
        if ($last) {
            $last_number = intval(substr($last->kode_pesanan, -3));
            $new_number = str_pad($last_number + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $new_number = '001';
        }
        
        return $prefix . $date . $new_number;
    }

    /**
     * Get transactions by user
     */
    public function get_user_transactions($user_id) {
        $this->db->where('id_user', $user_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    /**
     * Get transaction count by status
     */
    public function get_count_by_status($status) {
        $this->db->where('status_pesanan', $status);
        return $this->db->count_all_results($this->table);
    }

    /**
     * Count by status (alias)
     */
    public function count_by_status($status) {
        return $this->get_count_by_status($status);
    }

    /**
     * Get recent transactions
     */
    public function get_recent($limit = 10) {
        $this->db->select('pesanan.*, users.nama_lengkap as customer_name');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = pesanan.id_user', 'left');
        $this->db->order_by('pesanan.created_at', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }
    /**
 * Export Transaksi to Excel XLS
 * Menggunakan format XML Excel tanpa library external
 */
public function export_transactions_to_excel($status_filter = null, $search = null) {
    // Get transactions data
    $transactions = $this->get_all_transactions($status_filter, $search);
    
    $filename = 'Laporan_Transaksi_' . date('YmdHis') . '.xls';
    
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    
    // Start Excel XML
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<?mso-application progid="Excel.Sheet"?>';
    echo '<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
        xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">';
    
    // Styles
    echo '<Styles>
        <Style ss:ID="header">
            <Font ss:Bold="1" ss:Color="#FFFFFF"/>
            <Interior ss:Color="#8B5E3C" ss:Pattern="Solid"/>
            <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
            <Borders>
                <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
                <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
                <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
                <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
        </Style>
        <Style ss:ID="data">
            <Alignment ss:Vertical="Center"/>
            <Borders>
                <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
            </Borders>
        </Style>
        <Style ss:ID="center">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
            <Borders>
                <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
            </Borders>
        </Style>
        <Style ss:ID="currency">
            <Alignment ss:Vertical="Center"/>
            <NumberFormat ss:Format="#,##0"/>
            <Borders>
                <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
            </Borders>
        </Style>
    </Styles>';
    
    echo '<Worksheet ss:Name="Laporan Transaksi">';
    echo '<Table>';
    
    // Column widths
    echo '<Column ss:Width="40"/>';  // No
    echo '<Column ss:Width="120"/>'; // Kode Pesanan
    echo '<Column ss:Width="120"/>'; // Tanggal
    echo '<Column ss:Width="150"/>'; // Customer
    echo '<Column ss:Width="180"/>'; // Email
    echo '<Column ss:Width="120"/>'; // No. Telepon
    echo '<Column ss:Width="200"/>'; // Produk
    echo '<Column ss:Width="120"/>'; // Total Harga
    echo '<Column ss:Width="120"/>'; // Status Pembayaran
    echo '<Column ss:Width="120"/>'; // Status Pesanan
    echo '<Column ss:Width="120"/>'; // Metode Pembayaran
    echo '<Column ss:Width="250"/>'; // Alamat Pengiriman
    echo '<Column ss:Width="200"/>'; // Catatan
    
    // Header Row
    echo '<Row ss:Height="25">';
    $headers = [
        'No', 
        'Kode Pesanan', 
        'Tanggal', 
        'Customer', 
        'Email', 
        'No. Telepon',
        'Produk',
        'Total Harga (Rp)', 
        'Status Pembayaran',
        'Status Pesanan',
        'Metode Pembayaran',
        'Alamat Pengiriman',
        'Catatan Pesanan'
    ];
    
    foreach ($headers as $header) {
        echo '<Cell ss:StyleID="header"><Data ss:Type="String">' . htmlspecialchars($header) . '</Data></Cell>';
    }
    echo '</Row>';
    
    // Data Rows
    $no = 1;
    foreach ($transactions as $trans) {
        echo '<Row>';
        
        // No (center aligned)
        echo '<Cell ss:StyleID="center"><Data ss:Type="Number">' . $no++ . '</Data></Cell>';
        
        // Kode Pesanan
        $kode = isset($trans->kode_pesanan) ? $trans->kode_pesanan : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($kode) . '</Data></Cell>';
        
        // Tanggal
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . date('d/m/Y H:i', strtotime($trans->created_at)) . '</Data></Cell>';
        
        // Customer
        $customer = isset($trans->customer_name) ? $trans->customer_name : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($customer) . '</Data></Cell>';
        
        // Email
        $email = isset($trans->customer_email) ? $trans->customer_email : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($email) . '</Data></Cell>';
        
        // No. Telepon
        $phone = isset($trans->no_telepon_penerima) ? $trans->no_telepon_penerima : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($phone) . '</Data></Cell>';
        
        // Produk (get items)
        $items = $this->get_transaction_items($trans->id);
        $produk_list = [];
        if (!empty($items)) {
            foreach ($items as $item) {
                $nama = isset($item->nama_produk) ? $item->nama_produk : 'Produk';
                $qty = isset($item->jumlah) ? $item->jumlah : 1;
                $produk_list[] = $nama . ' (x' . $qty . ')';
            }
            $produk_text = implode(', ', $produk_list);
        } else {
            $produk_text = '-';
        }
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($produk_text) . '</Data></Cell>';
        
        // Total Harga (currency format)
        echo '<Cell ss:StyleID="currency"><Data ss:Type="Number">' . $trans->total_harga . '</Data></Cell>';
        
        // Status Pembayaran (center aligned)
        $status_bayar = isset($trans->status_pembayaran) ? ucfirst(str_replace('_', ' ', $trans->status_pembayaran)) : 'Pending';
        echo '<Cell ss:StyleID="center"><Data ss:Type="String">' . htmlspecialchars($status_bayar) . '</Data></Cell>';
        
        // Status Pesanan (center aligned)
        $status_pesanan = isset($trans->status_pesanan) ? ucfirst(str_replace('_', ' ', $trans->status_pesanan)) : 'Pending';
        echo '<Cell ss:StyleID="center"><Data ss:Type="String">' . htmlspecialchars($status_pesanan) . '</Data></Cell>';
        
        // Metode Pembayaran
        $metode = isset($trans->metode_pembayaran) ? $trans->metode_pembayaran : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($metode) . '</Data></Cell>';
        
        // Alamat Pengiriman
        $alamat = isset($trans->alamat_pengiriman) ? $trans->alamat_pengiriman : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($alamat) . '</Data></Cell>';
        
        // Catatan Pesanan
        $catatan = isset($trans->catatan_pesanan) ? $trans->catatan_pesanan : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($catatan) . '</Data></Cell>';
        
        echo '</Row>';
    }
    
    echo '</Table>';
    echo '</Worksheet>';
    echo '</Workbook>';
    exit;
}
}