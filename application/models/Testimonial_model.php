<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Testimonial Model
 * Handles all database operations for testimonials
 */
class Testimonial_model extends CI_Model {

    private $table = 'testimoni';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all testimonials with filters
     */
    public function get_all($filters = [], $limit = null, $offset = 0) {
        $this->db->select('testimoni.*, users.nama_lengkap, users.email');
        $this->db->from($this->table);
        $this->db->join('users', 'testimoni.id_user = users.id', 'left');
        
        // Apply filters
        if (isset($filters['status'])) {
            $this->db->where('testimoni.status', $filters['status']);
        }
        
        if (isset($filters['rating'])) {
            $this->db->where('testimoni.rating', $filters['rating']);
        }
        
        $this->db->order_by('testimoni.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Get approved testimonials for public display
     */
    public function get_approved($limit = 6) {
        $this->db->select('testimoni.*, users.nama_lengkap, users.foto_profil');
        $this->db->from($this->table);
        $this->db->join('users', 'testimoni.id_user = users.id', 'left');
        $this->db->where('testimoni.status', 'approved');
        $this->db->order_by('testimoni.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Get testimonial by ID
     */
    public function get_by_id($id) {
        $this->db->select('testimoni.*, users.nama_lengkap, users.email, users.foto_profil');
        $this->db->from($this->table);
        $this->db->join('users', 'testimoni.id_user = users.id', 'left');
        $this->db->where('testimoni.id', $id);
        
        return $this->db->get()->row();
    }

    /**
     * Get testimonials by user
     */
    public function get_by_user($user_id, $limit = null) {
        $this->db->select('testimoni.*');
        $this->db->from($this->table);
        $this->db->where('testimoni.id_user', $user_id);
        $this->db->order_by('testimoni.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Create new testimonial
     */
    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * Update testimonial
     */
    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete testimonial
     */
    public function delete($id) {
        // Get testimonial to delete photo if exists
        $testimonial = $this->get_by_id($id);
        
        if ($testimonial && !empty($testimonial->foto_produk)) {
            $photo_path = FCPATH . 'uploads/testimonials/' . $testimonial->foto_produk;
            if (file_exists($photo_path)) {
                unlink($photo_path);
            }
        }
        
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Approve testimonial
     */
    public function approve($id, $admin_id = null) {
        $data = [
            'status' => 'approved',
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        // Check if approved_at column exists before adding it
        if ($this->db->field_exists('approved_at', $this->table)) {
            $data['approved_at'] = date('Y-m-d H:i:s');
        }
        
        if ($admin_id && $this->db->field_exists('approved_by', $this->table)) {
            $data['approved_by'] = $admin_id;
        }
        
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Reject testimonial
     */
    public function reject($id, $admin_id = null) {
        $data = [
            'status' => 'rejected',
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Count testimonials by status
     */
    public function count_by_status($status = null) {
        if ($status) {
            $this->db->where('status', $status);
        }
        return $this->db->count_all_results($this->table);
    }

    /**
     * Count pending testimonials (ADDED - for homepage stats)
     */
    public function count_pending() {
        return $this->count_by_status('pending');
    }

    /**
     * Count approved testimonials (for statistics)
     */
    public function count_approved() {
        return $this->count_by_status('approved');
    }

    /**
     * Get average rating
     */
    public function get_average_rating() {
        $this->db->select_avg('rating');
        $this->db->from($this->table);
        $this->db->where('status', 'approved');
        
        $result = $this->db->get()->row();
        return $result ? round($result->rating, 1) : 0;
    }

    /**
     * Get testimonials with high ratings (4-5 stars)
     */
    public function get_featured($limit = 3) {
        $this->db->select('testimoni.*, users.nama_lengkap, users.foto_profil');
        $this->db->from($this->table);
        $this->db->join('users', 'testimoni.id_user = users.id', 'left');
        $this->db->where('testimoni.status', 'approved');
        $this->db->where('testimoni.rating >=', 4);
        $this->db->order_by('testimoni.rating', 'DESC');
        $this->db->order_by('testimoni.created_at', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }

    /**
     * Check if user can submit testimonial
     * User can only submit one testimonial per order
     */
    public function can_submit($user_id, $order_id = null) {
        if ($order_id) {
            $this->db->where('id_user', $user_id);
            $this->db->where('id_pesanan', $order_id);
            $count = $this->db->count_all_results($this->table);
            
            return $count == 0;
        }
        
        return true;
    }

    /**
     * Get rating distribution
     */
    public function get_rating_distribution() {
        $distribution = [];
        
        for ($i = 5; $i >= 1; $i--) {
            $this->db->where('status', 'approved');
            $this->db->where('rating', $i);
            $count = $this->db->count_all_results($this->table);
            
            $distribution[$i] = $count;
        }
        
        return $distribution;
    }

    // ========================================
// TAMBAHKAN METHOD INI DI BAWAH FILE Testimonial_model.php ANDA
// ========================================

    /**
     * Get orders eligible for testimonial (ONLY completed orders)
     */
    public function get_eligible_orders($user_id) {
        // Get completed orders that don't have testimonials yet
        $this->db->select('pesanan.*, 
                          GROUP_CONCAT(produk.nama_produk SEPARATOR ", ") as products');
        $this->db->from('pesanan');
        $this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan = pesanan.id', 'left');
        $this->db->join('produk', 'produk.id = detail_pesanan.id_produk', 'left');
        $this->db->where('pesanan.id_user', $user_id);
        $this->db->where('pesanan.status_pesanan', 'selesai'); // ONLY completed orders
        
        // Exclude orders that already have testimonials
        $this->db->where('pesanan.id NOT IN (
            SELECT id_pesanan FROM testimoni WHERE id_user = ' . $user_id . '
        )');
        
        $this->db->group_by('pesanan.id');
        $this->db->order_by('pesanan.created_at', 'DESC');
        
        return $this->db->get()->result();
    }
    
    /**
     * Verify order eligibility for testimonial
     */
    public function verify_order_eligibility($order_id, $user_id) {
        $this->db->select('pesanan.*');
        $this->db->from('pesanan');
        $this->db->where('pesanan.id', $order_id);
        $this->db->where('pesanan.id_user', $user_id);
        $this->db->where('pesanan.status_pesanan', 'selesai'); // MUST be completed
        
        return $this->db->get()->row();
    }
    
    /**
     * Check if testimonial already exists for order
     */
    public function check_existing($user_id, $order_id) {
        $this->db->where('id_user', $user_id);
        $this->db->where('id_pesanan', $order_id);
        
        return $this->db->get($this->table)->row();
    }
    
    /**
     * Get testimonial statistics
     */
    public function get_statistics() {
        $stats = new stdClass();
        
        // Total testimonials
        $stats->total = $this->db->count_all($this->table);
        
        // Pending
        $this->db->where('status', 'pending');
        $stats->pending = $this->db->count_all_results($this->table);
        
        // Approved
        $this->db->where('status', 'approved');
        $stats->approved = $this->db->count_all_results($this->table);
        
        // Rejected
        $this->db->where('status', 'rejected');
        $stats->rejected = $this->db->count_all_results($this->table);
        
        // Average rating
        $this->db->select_avg('rating');
        $this->db->where('status', 'approved');
        $result = $this->db->get($this->table)->row();
        $stats->average_rating = $result && $result->rating ? round($result->rating, 1) : 0;
        
        return $stats;
    }

    /**
     * Get approved testimonials for a specific product
     */
    public function get_by_product($product_id, $limit = null) {
        $this->db->select('testimoni.*, users.nama_lengkap, users.foto_profil');
        $this->db->from($this->table);
        $this->db->join('users', 'testimoni.id_user = users.id', 'left');
        $this->db->join('pesanan', 'testimoni.id_pesanan = pesanan.id', 'left');
        $this->db->join('detail_pesanan', 'pesanan.id = detail_pesanan.id_pesanan', 'left');
        $this->db->where('detail_pesanan.id_produk', $product_id);
        $this->db->where('testimoni.status', 'approved');
        $this->db->group_by('testimoni.id');
        $this->db->order_by('testimoni.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Get average rating for a product
     */
    public function get_product_average_rating($product_id) {
        $this->db->select_avg('testimoni.rating');
        $this->db->from($this->table);
        $this->db->join('pesanan', 'testimoni.id_pesanan = pesanan.id', 'left');
        $this->db->join('detail_pesanan', 'pesanan.id = detail_pesanan.id_pesanan', 'left');
        $this->db->where('detail_pesanan.id_produk', $product_id);
        $this->db->where('testimoni.status', 'approved');
        
        $result = $this->db->get()->row();
        return $result && $result->rating ? round($result->rating, 1) : 0;
    }

    /**
     * Count testimonials for a product
     */
    public function count_product_testimonials($product_id) {
        $this->db->from($this->table);
        $this->db->join('pesanan', 'testimoni.id_pesanan = pesanan.id', 'left');
        $this->db->join('detail_pesanan', 'pesanan.id = detail_pesanan.id_pesanan', 'left');
        $this->db->where('detail_pesanan.id_produk', $product_id);
        $this->db->where('testimoni.status', 'approved');
        
        return $this->db->count_all_results();
    }
}