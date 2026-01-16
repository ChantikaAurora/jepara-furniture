<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Report Model
 * Handles reporting and analytics
 */
class Report_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get sales summary
     * @param string $start_date
     * @param string $end_date
     * @return object
     */
    public function get_sales_summary($start_date = null, $end_date = null) {
        if (!$start_date) $start_date = date('Y-m-01');
        if (!$end_date) $end_date = date('Y-m-d');

        $this->db->select('COUNT(*) as total_orders, SUM(total_harga) as total_revenue, AVG(total_harga) as avg_order_value');
        $this->db->where('DATE(created_at) >=', $start_date);
        $this->db->where('DATE(created_at) <=', $end_date);
        $this->db->where_in('status_pesanan', ['dikonfirmasi', 'diproses', 'selesai']);
        
        return $this->db->get('pesanan')->row();
    }

    /**
     * Get sales by category
     * @param string $start_date
     * @param string $end_date
     * @return array
     */
    public function get_sales_by_category($start_date = null, $end_date = null) {
        if (!$start_date) $start_date = date('Y-m-01');
        if (!$end_date) $end_date = date('Y-m-d');

        $this->db->select('kategori.name as category_name, SUM(detail_pesanan.jumlah) as total_quantity, SUM(detail_pesanan.subtotal) as total_revenue');
        $this->db->from('detail_pesanan');
        $this->db->join('pesanan', 'pesanan.id = detail_pesanan.id_pesanan');
        $this->db->join('produk', 'produk.id = detail_pesanan.id_produk');
        $this->db->join('kategori', 'kategori.id = produk.id_kategori');
        $this->db->where('DATE(pesanan.created_at) >=', $start_date);
        $this->db->where('DATE(pesanan.created_at) <=', $end_date);
        $this->db->where_in('pesanan.status_pesanan', ['dikonfirmasi', 'diproses', 'selesai']);
        $this->db->group_by('kategori.id');
        $this->db->order_by('total_revenue', 'DESC');

        return $this->db->get()->result();
    }

    /**
     * Get best selling products
     * @param string $start_date
     * @param string $end_date
     * @param int $limit
     * @return array
     */
    public function get_best_sellers($start_date = null, $end_date = null, $limit = 10) {
        if (!$start_date) $start_date = date('Y-m-01');
        if (!$end_date) $end_date = date('Y-m-d');

        $this->db->select('produk.id, produk.name as product_name, kategori.name as category_name, produk.stock as current_stock, SUM(detail_pesanan.jumlah) as total_sold, SUM(detail_pesanan.subtotal) as revenue');
        $this->db->from('detail_pesanan');
        $this->db->join('pesanan', 'pesanan.id = detail_pesanan.id_pesanan');
        $this->db->join('produk', 'produk.id = detail_pesanan.id_produk');
        $this->db->join('kategori', 'kategori.id = produk.id_kategori');
        $this->db->where('DATE(pesanan.created_at) >=', $start_date);
        $this->db->where('DATE(pesanan.created_at) <=', $end_date);
        $this->db->where_in('pesanan.status_pesanan', ['dikonfirmasi', 'diproses', 'selesai']);
        $this->db->group_by('produk.id');
        $this->db->order_by('total_sold', 'DESC');
        $this->db->limit($limit);

        return $this->db->get()->result();
    }

    /**
     * Get inventory stats
     * @return object
     */
    public function get_inventory_stats() {
        $stats = new stdClass();
        
        $stats->total_products = $this->db->count_all('produk');
        
        $this->db->where('stock >', 0);
        $stats->in_stock = $this->db->count_all_results('produk');
        
        $this->db->where('stock <', 10);
        $this->db->where('stock >', 0);
        $stats->low_stock = $this->db->count_all_results('produk');
        
        $this->db->where('stock', 0);
        $stats->out_of_stock = $this->db->count_all_results('produk');
        
        return $stats;
    }

    /**
     * Get low stock products
     * @return array
     */
    public function get_low_stock_products() {
        $this->db->select('produk.id, produk.name, produk.stock, kategori.name as category_name');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id = produk.id_kategori');
        $this->db->where('produk.stock <=', 10);
        $this->db->order_by('produk.stock', 'ASC');
        
        return $this->db->get()->result();
    }

    /**
     * Get customer statistics
     * @return object
     */
    public function get_customer_stats() {
        $stats = new stdClass();
        
        $this->db->where('role', 'customer');
        $stats->total_customers = $this->db->count_all_results('users');
        
        $this->db->where('role', 'customer');
        $this->db->where('is_active', 1);
        $stats->active_customers = $this->db->count_all_results('users');
        
        $this->db->select('COUNT(DISTINCT id_user) as count');
        $this->db->where_in('status_pesanan', ['dikonfirmasi', 'diproses', 'selesai']);
        $result = $this->db->get('pesanan')->row();
        $stats->customers_with_orders = $result->count;
        
        $this->db->where('role', 'customer');
        $this->db->where('DATE(created_at) >=', date('Y-m-01'));
        $stats->new_this_month = $this->db->count_all_results('users');
        
        return $stats;
    }

    /**
     * Get top customers
     * @param int $limit
     * @return array
     */
    public function get_top_customers($limit = 10) {
        $this->db->select('users.id, users.nama_lengkap, users.email, COUNT(pesanan.id) as total_orders, SUM(pesanan.total_harga) as total_spent, users.created_at');
        $this->db->from('users');
        $this->db->join('pesanan', 'pesanan.id_user = users.id');
        $this->db->where('users.role', 'customer');
        $this->db->where_in('pesanan.status_pesanan', ['dikonfirmasi', 'diproses', 'selesai']);
        $this->db->group_by('users.id');
        $this->db->order_by('total_spent', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }

    /**
     * Get recent customers
     * @param int $limit
     * @return array
     */
    public function get_recent_customers($limit = 10) {
        $this->db->where('role', 'customer');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get('users')->result();
    }

    /**
     * Get monthly customer stats
     * @param int $months
     * @return array
     */
    public function get_monthly_customer_stats($months = 6) {
        $this->db->select('DATE_FORMAT(users.created_at, "%Y-%m") as month, COUNT(DISTINCT users.id) as new_customers, COUNT(pesanan.id) as total_orders, SUM(pesanan.total_harga) as total_revenue');
        $this->db->from('users');
        $this->db->join('pesanan', 'pesanan.id_user = users.id AND pesanan.status_pesanan IN ("dikonfirmasi", "diproses", "selesai")', 'left');
        $this->db->where('users.role', 'customer');
        $this->db->where('users.created_at >=', date('Y-m-01', strtotime("-$months months")));
        $this->db->group_by('month');
        $this->db->order_by('month', 'DESC');
        
        return $this->db->get()->result();
    }
}
