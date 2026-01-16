<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Model
 * Helper model untuk mengambil data dashboard admin
 */
class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get dashboard statistics
     * @return array
     */
    public function get_statistics() {
        $stats = [];
        
        // Total Produk Aktif
        $this->db->where('status', 'active');
        $stats['total_produk'] = $this->db->count_all_results('produk');
        
        // Transaksi bulan ini
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        $stats['transaksi_bulan_ini'] = $this->db->count_all_results('pesanan');
        
        // Rehap pending
        $this->db->where_in('status', ['pending', 'menunggu_penawaran']);
        $stats['rehap_pending'] = $this->db->count_all_results('rehap');
        
        // Total customers
        $this->db->where('role', 'customer');
        $stats['total_customers'] = $this->db->count_all_results('users');
        
        return $stats;
    }

    /**
     * Get monthly sales data for last N months
     * @param int $months
     * @return array
     */
    public function get_monthly_sales($months = 6) {
        $data = [];
        
        for ($i = $months - 1; $i >= 0; $i--) {
            $month = date('m', strtotime("-$i month"));
            $year = date('Y', strtotime("-$i month"));
            $label = date('M Y', strtotime("-$i month"));
            
            $this->db->select_sum('total_harga');
            $this->db->where('MONTH(created_at)', $month);
            $this->db->where('YEAR(created_at)', $year);
            $this->db->where_not_in('status_pesanan', ['dibatalkan']);
            $result = $this->db->get('pesanan')->row();
            
            $data[] = [
                'label' => $label,
                'month' => date('M', strtotime("-$i month")),
                'value' => (int) ($result->total_harga ?? 0)
            ];
        }
        
        return $data;
    }

    /**
     * Get monthly transaction count for last N months
     * @param int $months
     * @return array
     */
    public function get_monthly_transactions($months = 6) {
        $data = [];
        
        for ($i = $months - 1; $i >= 0; $i--) {
            $month = date('m', strtotime("-$i month"));
            $year = date('Y', strtotime("-$i month"));
            
            $this->db->where('MONTH(created_at)', $month);
            $this->db->where('YEAR(created_at)', $year);
            $count = $this->db->count_all_results('pesanan');
            
            $data[] = [
                'month' => date('M', strtotime("-$i month")),
                'count' => $count
            ];
        }
        
        return $data;
    }

    /**
     * Get recent activities (transactions, rehap, testimonials)
     * @param int $limit
     * @return array
     */
    public function get_recent_activities($limit = 10) {
        $activities = [];
        
        // Recent Transactions
        $this->db->select('pesanan.id, pesanan.kode_pesanan, pesanan.status_pesanan, 
                          pesanan.created_at, users.nama_lengkap,
                          GROUP_CONCAT(produk.nama_produk SEPARATOR ", ") as products');
        $this->db->from('pesanan');
        $this->db->join('users', 'users.id = pesanan.id_user');
        $this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan = pesanan.id', 'left');
        $this->db->join('produk', 'produk.id = detail_pesanan.id_produk', 'left');
        $this->db->group_by('pesanan.id');
        $this->db->order_by('pesanan.created_at', 'DESC');
        $this->db->limit(ceil($limit / 2));
        $transactions = $this->db->get()->result();
        
        foreach ($transactions as $trans) {
            $activities[] = [
                'type' => 'transaksi',
                'id' => $trans->id,
                'customer_name' => $trans->nama_lengkap,
                'description' => $trans->products ?? 'N/A',
                'status' => $trans->status_pesanan,
                'created_at' => $trans->created_at,
                'detail_url' => base_url('admin/transaksi/detail/' . $trans->id)
            ];
        }
        
        // Recent Rehap
        $this->db->select('rehap.id, rehap.status, rehap.created_at, 
                          users.nama_lengkap, rehap.deskripsi_kerusakan');
        $this->db->from('rehap');
        $this->db->join('users', 'users.id = rehap.id_user');
        $this->db->order_by('rehap.created_at', 'DESC');
        $this->db->limit(ceil($limit / 3));
        $rehaps = $this->db->get()->result();
        
        foreach ($rehaps as $rehap) {
            $activities[] = [
                'type' => 'rehap',
                'id' => $rehap->id,
                'customer_name' => $rehap->nama_lengkap,
                'description' => substr($rehap->deskripsi_kerusakan, 0, 50) . '...',
                'status' => $rehap->status,
                'created_at' => $rehap->created_at,
                'detail_url' => base_url('admin/rehap/detail/' . $rehap->id)
            ];
        }
        
        // Recent Testimonials (pending)
        $this->db->select('testimoni.id, testimoni.status, testimoni.created_at, 
                          users.nama_lengkap, testimoni.judul_testimoni');
        $this->db->from('testimoni');
        $this->db->join('users', 'users.id = testimoni.id_user');
        $this->db->where('testimoni.status', 'pending');
        $this->db->order_by('testimoni.created_at', 'DESC');
        $this->db->limit(ceil($limit / 6));
        $testimonials = $this->db->get()->result();
        
        foreach ($testimonials as $testi) {
            $activities[] = [
                'type' => 'testimoni',
                'id' => $testi->id,
                'customer_name' => $testi->nama_lengkap,
                'description' => $testi->judul_testimoni,
                'status' => $testi->status,
                'created_at' => $testi->created_at,
                'detail_url' => base_url('admin/testimoni')
            ];
        }
        
        // Sort by date descending
        usort($activities, function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
        
        return array_slice($activities, 0, $limit);
    }

    /**
     * Get trend comparison (this month vs last month)
     * @param string $table
     * @param string $date_field
     * @return array
     */
    public function get_trend($table, $date_field = 'created_at') {
        // This month
        $this->db->where("MONTH($date_field)", date('m'));
        $this->db->where("YEAR($date_field)", date('Y'));
        $this_month = $this->db->count_all_results($table);
        
        // Last month
        $this->db->where("MONTH($date_field)", date('m', strtotime('-1 month')));
        $this->db->where("YEAR($date_field)", date('Y', strtotime('-1 month')));
        $last_month = $this->db->count_all_results($table);
        
        $diff = $this_month - $last_month;
        $percent = $last_month > 0 ? round(($diff / $last_month) * 100, 1) : 0;
        
        return [
            'this_month' => $this_month,
            'last_month' => $last_month,
            'difference' => $diff,
            'percent' => $percent,
            'direction' => $diff >= 0 ? 'up' : 'down'
        ];
    }

    /**
     * Get top selling products
     * @param int $limit
     * @return array
     */
    public function get_top_products($limit = 5) {
        $this->db->select('produk.id, produk.nama_produk, produk.harga, 
                          COUNT(detail_pesanan.id) as total_sold,
                          SUM(detail_pesanan.jumlah) as total_quantity');
        $this->db->from('produk');
        $this->db->join('detail_pesanan', 'detail_pesanan.id_produk = produk.id');
        $this->db->join('pesanan', 'pesanan.id = detail_pesanan.id_pesanan');
        $this->db->where_not_in('pesanan.status_pesanan', ['dibatalkan']);
        $this->db->group_by('produk.id');
        $this->db->order_by('total_quantity', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }

    /**
     * Get revenue summary
     * @return object
     */
    public function get_revenue_summary() {
        // Total revenue (all time)
        $this->db->select_sum('total_harga');
        $this->db->where_not_in('status_pesanan', ['dibatalkan']);
        $total = $this->db->get('pesanan')->row()->total_harga ?? 0;
        
        // This month revenue
        $this->db->select_sum('total_harga');
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        $this->db->where_not_in('status_pesanan', ['dibatalkan']);
        $this_month = $this->db->get('pesanan')->row()->total_harga ?? 0;
        
        // Last month revenue
        $this->db->select_sum('total_harga');
        $this->db->where('MONTH(created_at)', date('m', strtotime('-1 month')));
        $this->db->where('YEAR(created_at)', date('Y', strtotime('-1 month')));
        $this->db->where_not_in('status_pesanan', ['dibatalkan']);
        $last_month = $this->db->get('pesanan')->row()->total_harga ?? 0;
        
        return (object)[
            'total' => (int) $total,
            'this_month' => (int) $this_month,
            'last_month' => (int) $last_month,
            'growth' => $last_month > 0 ? round((($this_month - $last_month) / $last_month) * 100, 1) : 0
        ];
    }
}