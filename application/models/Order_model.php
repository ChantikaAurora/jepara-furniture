<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Order Model
 * Handles all database operations for orders/pesanan
 */
class Order_model extends CI_Model {

    private $table = 'pesanan';
    private $table_items = 'detail_pesanan'; // FIXED: Changed from pesanan_items

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all orders with filters
     */
    public function get_all($status = null, $search = null) {
        $this->db->select('pesanan.*, users.nama_lengkap as customer_name, users.email as customer_email');
        $this->db->from($this->table);
        $this->db->join('users', 'pesanan.id_user = users.id', 'left');
        
        if ($status) {
            $this->db->where('pesanan.status_pesanan', $status);
        }
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('pesanan.kode_pesanan', $search);
            $this->db->or_like('users.nama_lengkap', $search);
            $this->db->or_like('users.email', $search);
            $this->db->group_end();
        }
        
        $this->db->order_by('pesanan.created_at', 'DESC');
        
        return $this->db->get()->result();
    }

    /**
     * Get order by ID
     */
    public function get_by_id($id) {
        $this->db->select('pesanan.*, users.nama_lengkap as customer_name, users.email as customer_email');
        $this->db->from($this->table);
        $this->db->join('users', 'pesanan.id_user = users.id', 'left');
        $this->db->where('pesanan.id', $id);
        
        return $this->db->get()->row();
    }

    /**
     * Get order by code
     */
    public function get_by_code($code) {
        $this->db->where('kode_pesanan', $code);
        return $this->db->get($this->table)->row();
    }

    /**
     * Get order items
     */
    public function get_items($order_id) {
        $this->db->select('detail_pesanan.*, produk.gambar_1');
        $this->db->from($this->table_items);
        $this->db->join('produk', 'detail_pesanan.id_produk = produk.id', 'left');
        $this->db->where('detail_pesanan.id_pesanan', $order_id);
        
        return $this->db->get()->result();
    }

    /**
     * Get user orders
     */
    public function get_by_user($user_id) {
        $this->db->where('id_user', $user_id);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    /**
     * Create new order
     */
    public function create($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * Add order item
     */
    public function add_item($data) {
        return $this->db->insert($this->table_items, $data);
    }

    /**
     * Update order
     */
    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete order
     */
    public function delete($id) {
        // Delete items first
        $this->db->where('id_pesanan', $id);
        $this->db->delete($this->table_items);
        
        // Delete order
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Get statistics
     */
    public function get_statistics() {
        $stats = new stdClass();
        
        // Total orders
        $stats->total_pesanan = $this->db->count_all_results($this->table);
        
        // Pending count
        $this->db->where('status_pesanan', 'pending');
        $stats->pending = $this->db->count_all_results($this->table);
        
        // Processing count
        $this->db->where('status_pesanan', 'diproses');
        $stats->diproses = $this->db->count_all_results($this->table);
        
        // Total revenue this month
        $this->db->select_sum('total_harga');
        $this->db->where('MONTH(created_at)', date('m'));
        $this->db->where('YEAR(created_at)', date('Y'));
        $this->db->where('status_pesanan !=', 'dibatalkan');
        $result = $this->db->get($this->table)->row();
        $stats->total_pendapatan = $result->total_harga ? $result->total_harga : 0;
        
        return $stats;
    }

    /**
     * Get count by status
     */
    public function count_by_status($status) {
        $this->db->where('status_pesanan', $status);
        return $this->db->count_all_results($this->table);
    }
}