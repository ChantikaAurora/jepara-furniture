<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Product Model
 * Handles all database operations for products
 */
class Produk_model extends CI_Model {

    private $table = 'produk';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all active products
     */
    public function get_all($limit = null, $offset = 0) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        $this->db->where('produk.status', 'active');
        $this->db->order_by('produk.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Get product by ID
     */
    public function get_by_id($id) {
        $this->db->select('produk.*, kategori.nama_kategori, kategori.slug as kategori_slug');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        $this->db->where('produk.id', $id);
        
        return $this->db->get()->row();
    }

    /**
     * Get product by slug
     */
    public function get_by_slug($slug) {
        $this->db->select('produk.*, kategori.nama_kategori, kategori.slug as kategori_slug');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        $this->db->where('produk.slug', $slug);
        
        return $this->db->get()->row();
    }

    /**
     * Get products by category
     */
    public function get_by_category($category_id, $limit = null) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        $this->db->where('produk.id_kategori', $category_id);
        $this->db->where('produk.status', 'active');
        $this->db->order_by('produk.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Get products by category slug
     */
    public function get_by_category_slug($category_slug, $limit = null) {
        $this->db->select('produk.*, kategori.nama_kategori, kategori.slug as kategori_slug');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        $this->db->where('kategori.slug', $category_slug);
        $this->db->where('produk.status', 'active');
        $this->db->order_by('produk.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Search products
     */
    public function search($keyword, $limit = null) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        $this->db->where('produk.status', 'active');
        
        $this->db->group_start();
        $this->db->like('produk.nama_produk', $keyword);
        $this->db->or_like('produk.deskripsi', $keyword);
        $this->db->or_like('kategori.nama_kategori', $keyword);
        $this->db->group_end();
        
        $this->db->order_by('produk.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Get featured products
     */
    public function get_featured($limit = 8) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        $this->db->where('produk.status', 'active');
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }

    /**
     * Get latest products
     */
    public function get_latest($limit = 8) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        $this->db->where('produk.status', 'active');
        $this->db->order_by('produk.created_at', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }

    /**
     * Get related products
     */
    public function get_related($product_id, $category_id, $limit = 4) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        $this->db->where('produk.id_kategori', $category_id);
        $this->db->where('produk.id !=', $product_id);
        $this->db->where('produk.status', 'active');
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }

    /**
     * Create product (FIXED - Use 'insert' instead of 'create')
     */
    public function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * Update product
     */
    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete product
     */
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Toggle product status
     */
    public function toggle_status($id) {
        $product = $this->get_by_id($id);
        if (!$product) return false;
        
        $new_status = $product->status == 'active' ? 'inactive' : 'active';
        
        return $this->update($id, ['status' => $new_status]);
    }

    /**
     * Count all products
     */
    public function count_all() {
        return $this->db->count_all_results($this->table);
    }

    /**
     * Count active products (ADDED - Missing method)
     */
    public function count_active() {
        $this->db->where('status', 'active');
        return $this->db->count_all_results($this->table);
    }

    /**
     * Count by category
     */
    public function count_by_category($category_id) {
        $this->db->where('id_kategori', $category_id);
        return $this->db->count_all_results($this->table);
    }

    /**
     * Get products for admin (including inactive)
     */
    public function get_all_admin($limit = null, $offset = 0, $status = null) {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id', 'left');
        
        if ($status) {
            $this->db->where('produk.status', $status);
        }
        
        $this->db->order_by('produk.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Get active products with limit (ADDED - for homepage)
     * Alias for get_all() with limit
     */
    public function get_active($limit = 8) {
        return $this->get_all($limit);
    }
}