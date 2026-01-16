<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Rehap Model - FIXED & DEBUG VERSION
 */
class Rehap_model extends CI_Model {

    private $table = 'rehap';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Approve and set payment - FIXED WITH DEBUG
     */
    public function approve_and_set_payment($id, $jumlah_bayar, $estimasi_waktu, $bank_info, $catatan_admin = null) {
        log_message('debug', '=== MODEL: approve_and_set_payment ===');
        log_message('debug', 'ID: ' . $id);
        log_message('debug', 'Jumlah Bayar: ' . $jumlah_bayar);
        log_message('debug', 'Estimasi Waktu: ' . $estimasi_waktu);
        log_message('debug', 'Bank Info: ' . json_encode($bank_info));
        log_message('debug', 'Catatan: ' . $catatan_admin);
        
        $data = [
            'status' => 'menunggu_pembayaran',
            'jumlah_bayar' => $jumlah_bayar,
            'estimasi_waktu' => $estimasi_waktu,
            'estimasi_biaya' => $jumlah_bayar,
            'bank_name' => isset($bank_info['bank_name']) ? $bank_info['bank_name'] : null,
            'bank_account_number' => isset($bank_info['bank_account_number']) ? $bank_info['bank_account_number'] : null,
            'bank_account_name' => isset($bank_info['bank_account_name']) ? $bank_info['bank_account_name'] : null,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($catatan_admin) {
            $data['catatan_admin'] = $catatan_admin;
        }
        
        log_message('debug', 'Data to update: ' . json_encode($data));
        
        $this->db->where('id', $id);
        $result = $this->db->update($this->table, $data);
        
        if ($result) {
            log_message('debug', 'Update successful');
            log_message('debug', 'Affected rows: ' . $this->db->affected_rows());
        } else {
            log_message('error', 'Update failed');
            log_message('error', 'DB Error: ' . $this->db->error()['message']);
        }
        
        log_message('debug', '=== END MODEL ===');
        
        return $result;
    }

    /**
     * Get request by ID
     */
    public function get_by_id($id) {
        $this->db->select('rehap.*, users.nama_lengkap, users.email, users.no_telepon');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = rehap.id_user');
        $this->db->where('rehap.id', $id);
        
        $result = $this->db->get()->row();
        
        if ($result) {
            log_message('debug', 'Get by ID result: ' . json_encode($result));
        } else {
            log_message('debug', 'Get by ID: No result found for ID ' . $id);
        }
        
        return $result;
    }

    /**
     * Get all rehap requests with filters
     */
    public function get_all($filters = [], $limit = 20, $offset = 0) {
        $this->db->select('rehap.*, users.nama_lengkap, users.email');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = rehap.id_user');

        if (!empty($filters['status'])) {
            $this->db->where('rehap.status', $filters['status']);
        }

        if (!empty($filters['start_date'])) {
            $this->db->where('DATE(rehap.created_at) >=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $this->db->where('DATE(rehap.created_at) <=', $filters['end_date']);
        }

        if (!empty($filters['search'])) {
            $this->db->group_start();
            $this->db->like('rehap.kode_rehap', $filters['search']);
            $this->db->or_like('rehap.nama_furniture', $filters['search']);
            $this->db->or_like('users.nama_lengkap', $filters['search']);
            $this->db->group_end();
        }

        $this->db->order_by('rehap.created_at', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result();
    }

    /**
     * Get requests by user
     */
    public function get_by_user($user_id, $limit = 10, $offset = 0) {
        $this->db->where('id_user', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        
        return $this->db->get($this->table)->result();
    }

    /**
     * Insert new rehap request
     */
    public function insert($data) {
        $data['kode_rehap'] = $this->generate_request_number();
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
        }

        return false;
    }

    /**
     * Update rehap request
     */
    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Update request status
     */
    public function update_status($id, $status, $notes = null) {
        $valid_statuses = [
            'menunggu_review',
            'ditolak',
            'menunggu_pembayaran',
            'menunggu_verifikasi_bayar',
            'sedang_dikerjakan', 
            'selesai', 
            'dibatalkan'
        ];
        
        if (!in_array($status, $valid_statuses)) {
            log_message('error', 'Invalid status: ' . $status);
            return false;
        }

        $data = [
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($notes) {
            $data['catatan_admin'] = $notes;
        }

        if ($status == 'selesai') {
            $data['tanggal_selesai'] = date('Y-m-d H:i:s');
            $data['progress_persen'] = 100;
        }

        log_message('debug', 'Updating status to: ' . $status);

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Upload payment proof
     */
    public function upload_payment_proof($id, $file_name) {
        $data = [
            'bukti_bayar' => $file_name,
            'tanggal_bayar' => date('Y-m-d H:i:s'),
            'status' => 'menunggu_verifikasi_bayar',
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Verify payment
     */
    public function verify_payment($id, $is_approved, $notes = null) {
        $data = [
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($is_approved) {
            $data['status'] = 'sedang_dikerjakan';
            $data['progress_persen'] = 10;
        } else {
            $data['status'] = 'menunggu_pembayaran';
            $data['bukti_bayar'] = null;
        }

        if ($notes) {
            $data['catatan_admin'] = $notes;
        }

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete rehap request
     */
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Count requests by status
     */
    public function count_by_status($status = null) {
        if ($status) {
            $this->db->where('status', $status);
        }
        return $this->db->count_all_results($this->table);
    }

    /**
     * Generate unique rehap request number
     */
    private function generate_request_number() {
        $date = date('Ymd');
        $prefix = 'RHP-' . $date . '-';
        
        $this->db->like('kode_rehap', $prefix, 'after');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $last_request = $this->db->get($this->table)->row();

        if ($last_request) {
            $last_number = (int) substr($last_request->kode_rehap, -5);
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }

        return $prefix . str_pad($new_number, 5, '0', STR_PAD_LEFT);
    }

    /**
     * Update progress percentage
     */
    public function update_progress($id, $progress) {
        if ($progress < 0 || $progress > 100) {
            return false;
        }

        $data = [
            'progress_persen' => $progress,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($progress == 100) {
            $data['status'] = 'selesai';
            $data['tanggal_selesai'] = date('Y-m-d H:i:s');
        }

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Get report data
     */
    public function get_report_data($filters = []) {
        $this->db->select('rehap.*, users.nama_lengkap, users.email, users.no_telepon');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = rehap.id_user');

        if (!empty($filters['year'])) {
            $this->db->where('YEAR(rehap.created_at)', $filters['year']);
        }

        if (!empty($filters['month'])) {
            $this->db->where('MONTH(rehap.created_at)', $filters['month']);
        }

        if (!empty($filters['status'])) {
            $this->db->where('rehap.status', $filters['status']);
        }

        $this->db->order_by('rehap.created_at', 'DESC');
        return $this->db->get()->result();
    }

    /**
     * Get statistics
     */
    public function get_statistics($filters = []) {
        $stats = [
            'total' => 0,
            'menunggu_review' => 0,
            'menunggu_pembayaran' => 0,
            'sedang_dikerjakan' => 0,
            'selesai' => 0,
            'dibatalkan' => 0,
            'total_revenue' => 0
        ];

        if (!empty($filters['year'])) {
            $this->db->where('YEAR(created_at)', $filters['year']);
        }
        if (!empty($filters['month'])) {
            $this->db->where('MONTH(created_at)', $filters['month']);
        }

        $this->db->select('status, COUNT(*) as count');
        $this->db->group_by('status');
        $counts = $this->db->get($this->table)->result();

        foreach ($counts as $count) {
            if (isset($stats[$count->status])) {
                $stats[$count->status] = $count->count;
                $stats['total'] += $count->count;
            }
        }

        $this->db->select_sum('jumlah_bayar');
        $this->db->where('status', 'selesai');
        
        if (!empty($filters['year'])) {
            $this->db->where('YEAR(created_at)', $filters['year']);
        }
        if (!empty($filters['month'])) {
            $this->db->where('MONTH(created_at)', $filters['month']);
        }
        
        $revenue = $this->db->get($this->table)->row();
        $stats['total_revenue'] = $revenue->jumlah_bayar ?? 0;

        return $stats;
    }
}