<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Payment_model', 'Store_profile_model']); 
        $this->load->library(['form_validation', 'session']);
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    /**
     * Display payment instructions
     */
    public function index($order_id) {
        $user_id = $this->session->userdata('user_id');
        
        // Get order
        $this->db->where('id', $order_id);
        $this->db->where('id_user', $user_id);
        $order = $this->db->get('pesanan')->row();
        
        if (!$order) {
            show_404();
            return;
        }

        // Get payment info
        $payment = $this->Payment_model->get_by_order($order_id);
        
        // Get store info
        $store = $this->Store_profile_model->get_profile();

        $data['title'] = 'Instruksi Pembayaran';
        $data['order'] = $order;
        $data['payment'] = $payment;
        $data['store'] = $store; // Add store data

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('payment/index', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Upload payment proof page
     */
    public function upload($order_id) {
        $user_id = $this->session->userdata('user_id');
        
        // Get order
        $this->db->where('id', $order_id);
        $this->db->where('id_user', $user_id);
        $order = $this->db->get('pesanan')->row();
        
        if (!$order) {
            show_404();
            return;
        }

        // Check if already uploaded
        $payment = $this->Payment_model->get_by_order($order_id);
        
        // Get store info
        $store = $this->Store_profile_model->get_profile();

        $data['title'] = 'Upload Bukti Pembayaran';
        $data['order'] = $order;
        $data['payment'] = $payment;
        $data['store'] = $store; // Add store data

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('payment/upload', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Process upload payment proof
     */
    public function process_upload($order_id) {
        if ($this->input->method() !== 'post') {
            redirect('payment/upload/' . $order_id);
        }

        $user_id = $this->session->userdata('user_id');
        
        // Get order
        $this->db->where('id', $order_id);
        $this->db->where('id_user', $user_id);
        $order = $this->db->get('pesanan')->row();
        
        if (!$order) {
            show_404();
            return;
        }

        // Validate file
        $config['upload_path'] = './uploads/payments/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = 'payment_' . $order_id . '_' . time();

        // Create directory if not exists
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti_pembayaran')) {
            $this->session->set_flashdata('error', $this->upload->display_errors('', ''));
            redirect('payment/upload/' . $order_id);
            return;
        }

        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];

        // Check if payment record exists
        $existing = $this->Payment_model->get_by_order($order_id);

        if ($existing) {
            // Delete old file if exists
            if (!empty($existing->bukti_bayar)) {
                $old_file = './uploads/payments/' . $existing->bukti_bayar;
                if (file_exists($old_file)) {
                    unlink($old_file);
                }
            }

            // Update payment record
            $update_data = [
                'bukti_bayar' => $file_name,
                'status_bayar' => 'menunggu_verifikasi',
                'tanggal_bayar' => date('Y-m-d H:i:s')
            ];

            $this->Payment_model->update($existing->id, $update_data);
        } else {
            // Create new payment record
            $insert_data = [
                'id_pesanan' => $order_id,
                'metode_bayar' => $order->metode_pembayaran,
                'jumlah_bayar' => $order->total_harga,
                'bukti_bayar' => $file_name,
                'status_bayar' => 'menunggu_verifikasi',
                'tanggal_bayar' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('pembayaran', $insert_data);
        }

        // Update order status
        $this->db->where('id', $order_id);
        $this->db->update('pesanan', [
            'status_pesanan' => 'menunggu_konfirmasi',
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $this->session->set_flashdata('success', 'Bukti pembayaran berhasil diupload. Menunggu verifikasi admin.');
        redirect('payment/index/' . $order_id);
    }
    
    /**
     * Alias for upload - for backward compatibility
     */
    public function upload_proof($order_id) {
        $this->upload($order_id);
    }
}