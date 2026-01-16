<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {
    
    private $table = 'pembayaran';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Create payment record
     */
    public function create($data) {
        $payment_data = [
            'id_pesanan' => $data['id_pesanan'],
            'jumlah_bayar' => $data['jumlah_bayar'],
            'metode_bayar' => $data['metode_pembayaran'],
            'status_bayar' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $this->db->insert($this->table, $payment_data);
        return $this->db->insert_id();
    }
    
    /**
     * Get payment by ID
     */
    public function get_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }
    
    /**
     * Get payment by order ID
     */
    public function get_by_order($order_id) {
        $this->db->where('id_pesanan', $order_id);
        return $this->db->get($this->table)->row();
    }
    
    /**
     * Get payments by transaction (alias for get_by_order for multiple results)
     */
    public function get_payments_by_transaction($order_id) {
        $this->db->where('id_pesanan', $order_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }
    
    /**
     * Get payment by ID (alias)
     */
    public function get_payment_by_id($id) {
        return $this->get_by_id($id);
    }
    
    /**
     * Update payment
     */
    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    
    /**
     * Update payment (alias)
     */
    public function update_payment($id, $data) {
        return $this->update($id, $data);
    }
    
    /**
     * Update payment status
     */
    public function update_status($id, $status) {
        $data = [
            'status_bayar' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($status == 'terverifikasi') {
            $data['tanggal_bayar'] = date('Y-m-d H:i:s');
        }
        
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    
    /**
     * Upload payment proof
     */
    public function upload_proof($id, $filename) {
        $data = [
            'bukti_bayar' => $filename,
            'status_bayar' => 'menunggu_verifikasi',
            'tanggal_bayar' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    
    /**
     * Get all payments with filters
     */
    public function get_all($status = null) {
        $this->db->select('pembayaran.*, pesanan.kode_pesanan, users.nama_lengkap');
        $this->db->from($this->table);
        $this->db->join('pesanan', 'pembayaran.id_pesanan = pesanan.id', 'left');
        $this->db->join('users', 'pesanan.id_user = users.id', 'left');
        
        if ($status) {
            $this->db->where('pembayaran.status_bayar', $status);
        }
        
        $this->db->order_by('pembayaran.created_at', 'DESC');
        return $this->db->get()->result();
    }
    
    /**
     * Get pending payments for admin verification
     */
    public function get_pending_payments($limit = 50) {
        $this->db->select('pembayaran.*, 
                          pesanan.kode_pesanan, 
                          pesanan.total_harga,
                          users.nama_lengkap,
                          users.email');
        $this->db->from($this->table);
        $this->db->join('pesanan', 'pembayaran.id_pesanan = pesanan.id', 'left');
        $this->db->join('users', 'pesanan.id_user = users.id', 'left');
        $this->db->where('pembayaran.status_bayar', 'menunggu_verifikasi');
        $this->db->order_by('pembayaran.created_at', 'ASC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }
    
    /**
     * Verify payment
     */
    public function verify_payment($payment_id, $admin_id, $status, $notes = null) {
        $data = [
            'status_bayar' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($status == 'terverifikasi') {
            $data['tanggal_bayar'] = date('Y-m-d H:i:s');
        }
        
        if ($notes) {
            $data['catatan_admin'] = $notes;
        }
        
        $this->db->where('id', $payment_id);
        return $this->db->update($this->table, $data);
    }
    
    /**
     * Get payment statistics
     */
    public function get_statistics() {
        $stats = new stdClass();
        
        // Total pending
        $this->db->where('status_bayar', 'menunggu_verifikasi');
        $stats->pending = $this->db->count_all_results($this->table);
        
        // Total verified today
        $this->db->where('status_bayar', 'terverifikasi');
        $this->db->where('DATE(updated_at)', date('Y-m-d'));
        $stats->verified_today = $this->db->count_all_results($this->table);
        
        // Total rejected
        $this->db->where('status_bayar', 'ditolak');
        $stats->rejected = $this->db->count_all_results($this->table);
        
        // Total this month
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        $stats->this_month = $this->db->count_all_results($this->table);
        
        return $stats;
    }
    
    /**
     * Delete payment
     */
    public function delete($id) {
        // Get payment info to delete file
        $payment = $this->get_by_id($id);
        
        if ($payment && !empty($payment->bukti_bayar)) {
            $file_path = FCPATH . 'uploads/payments/' . $payment->bukti_bayar;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
    
    /**
     * Get total verified payments for a transaction
     */
    public function get_total_paid($transaction_id) {
        $this->db->select_sum('jumlah_bayar');
        $this->db->where('id_pesanan', $transaction_id);
        $this->db->where('status_bayar', 'terverifikasi');
        
        $result = $this->db->get($this->table)->row();
        
        return $result ? (float)$result->jumlah_bayar : 0;
    }
    
    /**
     * Check if payment is fully paid
     */
    public function is_fully_paid($transaction_id, $total_amount) {
        $total_paid = $this->get_total_paid($transaction_id);
        return $total_paid >= $total_amount;
    }
}