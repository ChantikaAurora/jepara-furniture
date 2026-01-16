<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Cart_model', 'Produk_model', 'User_model']);
        $this->load->library(['form_validation', 'session']);
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    /**
     * Display checkout page
     */
    public function index() {
        $user_id = $this->session->userdata('user_id');
        
        // Get cart items
        $cart_items = $this->Cart_model->get_cart_items($user_id);
        
        if (empty($cart_items)) {
            $this->session->set_flashdata('error', 'Keranjang belanja Anda kosong');
            redirect('cart');
        }

        // Get user data
        $user = $this->User_model->get_by_id($user_id);

        // Load store profile model and get store info
        $this->load->model('Store_profile_model');
        $store = $this->Store_profile_model->get_profile();

        // Calculate totals
        $cart_total = 0;
        
        foreach ($cart_items as $item) {
            $price = floatval($item->harga ?? 0);
            $quantity = intval($item->jumlah ?? 0);
            $cart_total += $price * $quantity;
        }

        $grand_total = $cart_total;

        $data['title'] = 'Checkout';
        $data['user'] = $user;
        $data['cart_items'] = $cart_items;
        $data['cart_total'] = $cart_total;
        $data['grand_total'] = $grand_total;
        $data['store'] = $store;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('checkout/index', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Process checkout and create order
     */
    public function process() {
        $user_id = $this->session->userdata('user_id');
        
        // Validate form
        $this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required|trim');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('metode_pembayaran', 'Metode Pembayaran', 'required|in_list[transfer,ewallet]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return;
        }

        // Get cart items
        $cart_items = $this->Cart_model->get_cart_items($user_id);
        
        if (empty($cart_items)) {
            $this->session->set_flashdata('error', 'Keranjang belanja Anda kosong');
            redirect('cart');
        }

        // Calculate totals
        $cart_total = 0;
        
        foreach ($cart_items as $item) {
            $price = floatval($item->harga ?? 0);
            $quantity = intval($item->jumlah ?? 0);
            $cart_total += $price * $quantity;
        }

        $grand_total = $cart_total;

        // Generate order code
        $kode_pesanan = $this->_generate_order_code();

        // Start transaction
        $this->db->trans_start();

        // Prepare order data
        $order_data = [
            'kode_pesanan' => $kode_pesanan,
            'id_user' => $user_id,
            'nama_penerima' => $this->input->post('nama_penerima'),
            'no_telepon_penerima' => $this->input->post('no_telepon'),
            'alamat_pengiriman' => $this->input->post('alamat'),
            'catatan_pesanan' => $this->input->post('catatan'),
            'metode_pembayaran' => $this->input->post('metode_pembayaran'),
            'total_harga' => $grand_total,
            'status_pesanan' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];

        // Insert order
        $this->db->insert('pesanan', $order_data);
        $order_id = $this->db->insert_id();

        if ($order_id) {
            // Create order items
            foreach ($cart_items as $item) {
                $price = floatval($item->harga ?? 0);
                $quantity = intval($item->jumlah ?? 0);
                
                $item_data = [
                    'id_pesanan' => $order_id,
                    'id_produk' => $item->id_produk,
                    'nama_produk' => $item->nama_produk, // FIX: menggunakan nama_produk dari join
                    'harga' => $price,
                    'jumlah' => $quantity,
                    'subtotal' => $price * $quantity,
                    'created_at' => date('Y-m-d H:i:s')
                ];
                
                $this->db->insert('detail_pesanan', $item_data);
            }

            // Create payment record
            $payment_data = [
                'id_pesanan' => $order_id,
                'metode_bayar' => $this->input->post('metode_pembayaran'),
                'jumlah_bayar' => $grand_total,
                'status_bayar' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('pembayaran', $payment_data);

            // Clear cart
            $this->Cart_model->clear_cart($user_id);

            // Complete transaction
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('error', 'Gagal membuat pesanan. Silakan coba lagi.');
                redirect('checkout');
            } else {
                $this->session->set_flashdata('success', 'Pesanan berhasil dibuat!');
                redirect('checkout/success/' . $order_id);
            }
        } else {
            $this->db->trans_rollback();
            $this->session->set_flashdata('error', 'Gagal membuat pesanan. Silakan coba lagi.');
            redirect('checkout');
        }
    }

    /**
     * Order success page
     */
    public function success($order_id) {
        $user_id = $this->session->userdata('user_id');
        
        // Get order with items
        $this->db->select('pesanan.*, 
                          GROUP_CONCAT(detail_pesanan.nama_produk SEPARATOR ", ") as produk_list');
        $this->db->from('pesanan');
        $this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan = pesanan.id', 'left');
        $this->db->where('pesanan.id', $order_id);
        $this->db->where('pesanan.id_user', $user_id);
        $this->db->group_by('pesanan.id');
        $order = $this->db->get()->row();
        
        if (!$order) {
            show_404();
        }

        // Get order items
        $this->db->select('detail_pesanan.*, produk.gambar_1');
        $this->db->from('detail_pesanan');
        $this->db->join('produk', 'produk.id = detail_pesanan.id_produk', 'left');
        $this->db->where('detail_pesanan.id_pesanan', $order_id);
        $order_items = $this->db->get()->result();

        $data['title'] = 'Pesanan Berhasil';
        $data['order'] = $order;
        $data['order_items'] = $order_items;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('checkout/success', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Private: Generate unique order code
     */
    private function _generate_order_code() {
        $prefix = 'ORD';
        $date = date('ymd');
        
        // Get last order of today
        $this->db->select('kode_pesanan');
        $this->db->like('kode_pesanan', $prefix . '-' . $date, 'after');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $last = $this->db->get('pesanan')->row();
        
        if ($last) {
            $last_number = intval(substr($last->kode_pesanan, -4));
            $new_number = str_pad($last_number + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $new_number = '0001';
        }
        
        return $prefix . '-' . $date . '-' . $new_number;
    }

        /**
     * Invoice - Display printable invoice
     */
    public function invoice($kode_pesanan = null) {
        if (!$kode_pesanan) {
            show_404();
            return;
        }
        
        // Load models
        $this->load->model('Transaksi_model');
        $this->load->model('Payment_model');
        $this->load->model('Store_profile_model');
        
        // Get order by code
        $order = $this->Transaksi_model->get_transaction_by_code($kode_pesanan);
        
        if (!$order) {
            show_404();
            return;
        }
        
        // Check if user owns this order (unless admin)
        if ($this->session->userdata('role') != 'admin') {
            if (!$this->session->userdata('logged_in') || $order->id_user != $this->session->userdata('user_id')) {
                show_404();
                return;
            }
        }
        
        // Get order items
        $data['order'] = $order;
        $data['items'] = $this->Transaksi_model->get_transaction_items($order->id);
        $data['payment'] = $this->Payment_model->get_by_order($order->id);
        $data['store'] = $this->Store_profile_model->get_profile();
        
        // Load invoice view (no header/footer)
        $this->load->view('checkout/invoice', $data);
    }
}