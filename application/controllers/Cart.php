<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Cart Controller
 * Handles shopping cart operations
 */
class Cart extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Cart_model', 'Produk_model']);
        $this->load->helper(['auth', 'url']);
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    /**
     * Display cart
     */
    public function index() {
        $user_id = $this->session->userdata('user_id');
        
        // Get cart items
        $cart_items = $this->Cart_model->get_user_cart($user_id);
        
        // Clean up inactive products
        $this->Cart_model->cleanup_inactive_products($user_id);
        
        // Calculate totals
        $cart_summary = $this->Cart_model->get_cart_summary($user_id);

        $data = [
            'title' => 'Keranjang Belanja',
            'cart_items' => $cart_items,
            'cart_summary' => $cart_summary
        ];

        $this->render('cart/index', $data);
    }

    /**
     * Add item to cart
     */
    public function add($product_id = null) {
        $user_id = $this->session->userdata('user_id');
        
        if (!$product_id) {
            $product_id = $this->input->post('product_id');
        }
        
        $quantity = $this->input->post('quantity') ?: 1;
        $catatan = $this->input->post('catatan');
        
        // Validate product
        $product = $this->Produk_model->get_by_id($product_id);
        
        if (!$product || $product->status != 'active') {
            $this->session->set_flashdata('error', 'Produk tidak tersedia');
            redirect($this->input->post('redirect_url') ?: 'product');
            return;
        }
        
        // Check if already in cart
        $existing = $this->Cart_model->get_by_user_and_product($user_id, $product_id);
        
        if ($existing) {
            // Update quantity
            $new_quantity = $existing->jumlah + $quantity;
            $this->Cart_model->update($existing->id, ['jumlah' => $new_quantity]);
            $this->session->set_flashdata('success', 'Jumlah produk di keranjang berhasil diupdate');
        } else {
            // Add new item
            $data = [
                'id_user' => $user_id,
                'id_produk' => $product_id,
                'jumlah' => $quantity,
                'catatan' => $catatan,
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            if ($this->Cart_model->add($data)) {
                $this->session->set_flashdata('success', 'Produk berhasil ditambahkan ke keranjang');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan produk ke keranjang');
            }
        }
        
        // Redirect
        $redirect_url = $this->input->post('redirect_url');
        if ($redirect_url) {
            redirect($redirect_url);
        } else {
            redirect('cart');
        }
    }

    /**
     * Update cart item quantity
     */
    public function update() {
        // Check if AJAX request
        if ($this->input->is_ajax_request()) {
            header('Content-Type: application/json');
            
            $cart_id = $this->input->post('cart_id');
            $quantity = $this->input->post('quantity');
            
            if ($quantity < 1) {
                echo json_encode(['success' => false, 'message' => 'Jumlah minimal 1']);
                return;
            }
            
            $data = ['jumlah' => $quantity];
            
            if ($this->Cart_model->update($cart_id, $data)) {
                $user_id = $this->session->userdata('user_id');
                $summary = $this->Cart_model->get_cart_summary($user_id);
                
                echo json_encode([
                    'success' => true,
                    'message' => 'Keranjang berhasil diupdate',
                    'summary' => $summary
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal mengupdate keranjang']);
            }
        } else {
            // Regular form submit
            $cart_id = $this->input->post('cart_id');
            $quantity = $this->input->post('quantity');
            
            if ($quantity < 1) {
                $this->session->set_flashdata('error', 'Jumlah minimal 1');
                redirect('cart');
                return;
            }
            
            $data = ['jumlah' => $quantity];
            
            if ($this->Cart_model->update($cart_id, $data)) {
                $this->session->set_flashdata('success', 'Keranjang berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate keranjang');
            }
            
            redirect('cart');
        }
    }

    /**
     * Remove item from cart
     */
    public function remove($cart_id) {
        $user_id = $this->session->userdata('user_id');
        
        if ($this->Cart_model->remove($cart_id, $user_id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus dari keranjang');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk dari keranjang');
        }
        
        redirect('cart');
    }

    /**
     * Clear cart
     */
    public function clear() {
        $user_id = $this->session->userdata('user_id');
        
        if ($this->Cart_model->clear_cart($user_id)) {
            $this->session->set_flashdata('success', 'Keranjang berhasil dikosongkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengosongkan keranjang');
        }
        
        redirect('cart');
    }

    /**
     * Get cart count (AJAX)
     */
    public function count() {
        if (!$this->input->is_ajax_request()) {
            show_404();
            return;
        }
        
        header('Content-Type: application/json');
        $user_id = $this->session->userdata('user_id');
        $count = $this->Cart_model->count_items($user_id);
        
        echo json_encode(['count' => $count]);
    }

    /**
     * Get cart summary (AJAX)
     */
    public function summary() {
        if (!$this->input->is_ajax_request()) {
            show_404();
            return;
        }
        
        header('Content-Type: application/json');
        $user_id = $this->session->userdata('user_id');
        $summary = $this->Cart_model->get_cart_summary($user_id);
        
        echo json_encode($summary);
    }

    /**
     * Checkout page
     */
    public function checkout() {
        $user_id = $this->session->userdata('user_id');
        
        // Get cart items
        $cart_items = $this->Cart_model->get_user_cart($user_id);
        
        if (empty($cart_items)) {
            $this->session->set_flashdata('error', 'Keranjang belanja kosong');
            redirect('cart');
            return;
        }
        
        // Validate cart
        $validation = $this->Cart_model->validate_cart($user_id);
        
        if (!$validation['valid']) {
            foreach ($validation['errors'] as $error) {
                $this->session->set_flashdata('error', $error);
            }
            redirect('cart');
            return;
        }
        
        // Get cart summary
        $cart_summary = $this->Cart_model->get_cart_summary($user_id);
        
        $data = [
            'title' => 'Checkout',
            'cart_items' => $cart_items,
            'cart_summary' => $cart_summary
        ];
        
        $this->render('checkout/index', $data);
    }
}