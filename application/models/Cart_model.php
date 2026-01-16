<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

    private $table = 'keranjang';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get cart items for a user with product details
     */
    public function get_cart_items($user_id) {
        $this->db->select('
            keranjang.*,
            produk.nama_produk,
            produk.slug,
            produk.harga,
            produk.gambar_1,
            produk.status as produk_status,
            kategori.nama_kategori
        ');
        $this->db->from($this->table);
        $this->db->join('produk', 'produk.id = keranjang.id_produk', 'left');
        $this->db->join('kategori', 'kategori.id = produk.id_kategori', 'left');
        $this->db->where('keranjang.id_user', $user_id);
        $this->db->order_by('keranjang.created_at', 'DESC');
        
        $items = $this->db->get()->result();
        
        // Calculate subtotal for each item
        foreach ($items as $item) {
            $item->subtotal = $item->harga * $item->jumlah;
        }
        
        return $items;
    }

    /**
     * Alias method for checkout compatibility
     */
    public function get_user_cart($user_id) {
        return $this->get_cart_items($user_id);
    }

    /**
     * Get cart summary (total items and total price)
     */
    public function get_cart_summary($user_id) {
        $items = $this->get_cart_items($user_id);
        
        $total_items = 0;
        $total_price = 0;
        
        foreach ($items as $item) {
            // Only count active products
            if ($item->produk_status == 'active') {
                $total_items += $item->jumlah;
                $total_price += $item->subtotal;
            }
        }
        
        return [
            'total_items' => $total_items,
            'total_price' => $total_price,
            'formatted_price' => 'Rp ' . number_format($total_price, 0, ',', '.')
        ];
    }

    /**
     * Get cart count for a user
     */
    public function get_cart_count($user_id) {
        $this->db->select('SUM(jumlah) as total');
        $this->db->from($this->table);
        $this->db->join('produk', 'produk.id = keranjang.id_produk', 'left');
        $this->db->where('keranjang.id_user', $user_id);
        $this->db->where('produk.status', 'active'); // Only active products
        
        $result = $this->db->get()->row();
        
        return $result ? (int)$result->total : 0;
    }

    /**
     * Alias for get_cart_count (for controller compatibility)
     */
    public function count_items($user_id) {
        return $this->get_cart_count($user_id);
    }

    /**
     * Check if product exists in user's cart
     */
    public function check_product_in_cart($user_id, $product_id) {
        $this->db->where('id_user', $user_id);
        $this->db->where('id_produk', $product_id);
        
        return $this->db->get($this->table)->row();
    }

    /**
     * Get cart item by user and product (alias for check_product_in_cart)
     */
    public function get_by_user_and_product($user_id, $product_id) {
        return $this->check_product_in_cart($user_id, $product_id);
    }

    /**
     * Add item to cart (generic insert method)
     */
    public function add($data) {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Add product to cart with quantity
     */
    public function add_to_cart($user_id, $product_id, $quantity = 1) {
        // Check if product already exists in cart
        $existing = $this->check_product_in_cart($user_id, $product_id);
        
        if ($existing) {
            // Update quantity
            $new_quantity = $existing->jumlah + $quantity;
            
            $this->db->where('id', $existing->id);
            return $this->db->update($this->table, [
                'jumlah' => $new_quantity,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        } else {
            // Insert new item
            $data = [
                'id_user' => $user_id,
                'id_produk' => $product_id,
                'jumlah' => $quantity,
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            return $this->db->insert($this->table, $data);
        }
    }

    /**
     * Update cart item (generic update method)
     */
    public function update($cart_id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $cart_id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Update cart item quantity
     */
    public function update_quantity($cart_id, $user_id, $quantity) {
        $this->db->where('id', $cart_id);
        $this->db->where('id_user', $user_id);
        
        return $this->db->update($this->table, [
            'jumlah' => $quantity,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Remove item from cart (generic remove method)
     */
    public function remove($cart_id, $user_id) {
        $this->db->where('id', $cart_id);
        $this->db->where('id_user', $user_id);
        
        return $this->db->delete($this->table);
    }

    /**
     * Remove item from cart (alias)
     */
    public function remove_from_cart($cart_id, $user_id) {
        return $this->remove($cart_id, $user_id);
    }

    /**
     * Clear all items from cart
     */
    public function clear_cart($user_id) {
        $this->db->where('id_user', $user_id);
        
        return $this->db->delete($this->table);
    }

    /**
     * Get cart item by ID
     */
    public function get_cart_item($cart_id, $user_id) {
        $this->db->where('id', $cart_id);
        $this->db->where('id_user', $user_id);
        
        return $this->db->get($this->table)->row();
    }

    /**
     * Validate cart items (check if products are still active and available)
     */
    public function validate_cart($user_id) {
        $items = $this->get_cart_items($user_id);
        $errors = [];
        $valid = true;
        
        foreach ($items as $item) {
            // Check if product is inactive or deleted
            if ($item->produk_status != 'active' || !$item->nama_produk) {
                $errors[] = "Produk '{$item->nama_produk}' tidak lagi tersedia dan telah dihapus dari keranjang.";
                $valid = false;
                
                // Remove invalid item from cart
                $this->remove_from_cart($item->id, $user_id);
            }
        }
        
        return [
            'valid' => $valid,
            'errors' => $errors
        ];
    }

    /**
     * Cleanup inactive products from cart
     * This method removes products that are no longer active or have been deleted
     */
    public function cleanup_inactive_products($user_id) {
        // Get all cart items with product details
        $this->db->select('keranjang.*, produk.status as produk_status');
        $this->db->from($this->table);
        $this->db->join('produk', 'produk.id = keranjang.id_produk', 'left');
        $this->db->where('keranjang.id_user', $user_id);
        $items = $this->db->get()->result();
        
        $removed_count = 0;
        
        foreach ($items as $item) {
            // Remove if product is inactive, deleted, or doesn't exist
            if (!$item->produk_status || $item->produk_status != 'active') {
                $this->db->where('id', $item->id);
                $this->db->delete($this->table);
                $removed_count++;
            }
        }
        
        return $removed_count;
    }

    /**
     * Transfer cart items to order
     */
    public function create_order_from_cart($user_id, $order_data) {
        // Start transaction
        $this->db->trans_start();
        
        // Get cart items
        $cart_items = $this->get_cart_items($user_id);
        
        if (empty($cart_items)) {
            return false;
        }
        
        // Create order
        $order_code = 'ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));
        
        $order = [
            'kode_pesanan' => $order_code,
            'id_user' => $user_id,
            'nama_penerima' => $order_data['nama_penerima'],
            'no_telepon_penerima' => $order_data['no_telepon_penerima'],
            'alamat_pengiriman' => $order_data['alamat_pengiriman'],
            'total_harga' => $this->get_cart_summary($user_id)['total_price'],
            'metode_pembayaran' => $order_data['metode_pembayaran'] ?? 'transfer',
            'status_pesanan' => 'pending',
            'catatan_pesanan' => $order_data['catatan_pesanan'] ?? null,
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $this->db->insert('pesanan', $order);
        $order_id = $this->db->insert_id();
        
        // Create order details
        foreach ($cart_items as $item) {
            if ($item->produk_status == 'active') {
                $detail = [
                    'id_pesanan' => $order_id,
                    'id_produk' => $item->id_produk,
                    'nama_produk' => $item->nama_produk,
                    'harga' => $item->harga,
                    'jumlah' => $item->jumlah,
                    'subtotal' => $item->subtotal,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                
                $this->db->insert('detail_pesanan', $detail);
            }
        }
        
        // Clear cart after order created
        $this->clear_cart($user_id);
        
        // Complete transaction
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            return false;
        }
        
        return $order_id;
    }
}