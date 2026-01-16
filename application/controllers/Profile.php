<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Profile Controller
 * User profile and order history management
 */
class Profile extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['User_model', 'Order_model', 'Payment_model']);
        $this->load->helper('auth');
        $this->load->library('form_validation');
        
        check_login();
    }

    /**
     * Display user profile
     */
    public function index() {
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_by_id($user_id);

        $data['title'] = 'Profil Saya';
        $data['user'] = $user;

        $this->render('profile/index', $data);
    }

    /**
     * Edit profile form
     */
    public function edit() {
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_by_id($user_id);

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
            $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'trim');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim');

            if ($this->form_validation->run()) {
                // Check if email is already used by another user
                $email_check = $this->User_model->get_by_email($this->input->post('email', TRUE));
                if ($email_check && $email_check->id != $user_id) {
                    $this->session->set_flashdata('error', 'Email sudah digunakan oleh pengguna lain');
                } else {
                    $update_data = [
                        'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                        'email' => $this->input->post('email', TRUE),
                        'no_telepon' => $this->input->post('no_telepon', TRUE),
                        'alamat' => $this->input->post('alamat', TRUE)
                    ];

                    if ($this->User_model->update($user_id, $update_data)) {
                        // Update session data
                        $this->session->set_userdata('name', $update_data['nama_lengkap']);
                        $this->session->set_userdata('email', $update_data['email']);
                        
                        $this->session->set_flashdata('success', 'Profil berhasil diperbarui');
                        redirect('profile');
                    } else {
                        $this->session->set_flashdata('error', 'Gagal memperbarui profil');
                    }
                }
            }
        }

        $data['title'] = 'Edit Profil';
        $data['user'] = $user;

        $this->render('profile/edit', $data);
    }

    /**
     * Change password form
     */
    public function change_password() {
        $user_id = $this->session->userdata('user_id');

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required');
            $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]');

            if ($this->form_validation->run()) {
                $user = $this->User_model->get_by_id($user_id);
                
                // Verify current password
                if (password_verify($this->input->post('current_password'), $user->password)) {
                    $new_password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
                    
                    if ($this->User_model->update($user_id, ['password' => $new_password])) {
                        $this->session->set_flashdata('success', 'Password berhasil diubah');
                        redirect('profile');
                    } else {
                        $this->session->set_flashdata('error', 'Gagal mengubah password');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Password saat ini tidak sesuai');
                }
            }
        }

        $data['title'] = 'Ubah Password';

        $this->render('profile/change_password', $data);
    }

    /**
     * Order history
     */
    public function orders() {
        $user_id = $this->session->userdata('user_id');
        
        // Pagination
        $config['base_url'] = base_url('profile/orders');
        $config['total_rows'] = $this->db->where('id_user', $user_id)->count_all_results('pesanan');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        
        $this->load->library('pagination', $config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $data['title'] = 'Riwayat Pesanan';
        $data['orders'] = $this->Order_model->get_by_user($user_id, $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();

        $this->render('profile/orders', $data);
    }

    /**
     * Order detail
     */
    public function order_detail($order_id) {
        // Load models
        $this->load->model('Transaksi_model');
        $this->load->model('Payment_model');
        $this->load->model('Store_profile_model');
        
        $user_id = $this->session->userdata('user_id');
        
        // Get order
        $order = $this->Order_model->get_by_id($order_id);
        
        if (!$order || $order->id_user != $user_id) {
            show_404();
        }
        
        // FIXED: Load order items
        $order->items = $this->Order_model->get_items($order_id);
        
        // FIXED: Load payment info
        $payment = $this->Payment_model->get_by_order($order_id);

        // Get store info
        $store = $this->Store_profile_model->get_profile();
        
        $data['title'] = 'Detail Pesanan';
        $data['order'] = $order;
        $data['payment'] = $payment; 
        $data['store'] = $store;
        
        $this->render('profile/order_detail', $data);
    }
}
