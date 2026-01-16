<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }
    
    // ========================================
    // LOGIN
    // ========================================
    public function login() {
        // ✅ FIX: Cek apakah form di-submit dulu
        $is_form_submitted = $this->input->post('email') !== NULL;
        
        // Jika sudah login DAN form tidak di-submit, redirect
        if($this->session->userdata('logged_in') && !$is_form_submitted) {
            if($this->session->userdata('role') == 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('profile');
            }
        }
        
        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login - Jepara Furniture';
            $this->load->view('auth/login', $data);
        } else {
            $this->_do_login();
        }
    }
    
    // Process Login
    private function _do_login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->User_model->login($email, $password);
        
        if($user) {
            // ✅ Destroy session lama jika ada (untuk switch user)
            if($this->session->userdata('logged_in')) {
                $this->session->sess_destroy();
            }
            
            // Set session data baru
            $session_data = array(
                'user_id' => $user->id,
                'nama_lengkap' => $user->nama_lengkap,
                'email' => $user->email,
                'role' => $user->role,
                'logged_in' => TRUE
            );
            
            $this->session->set_userdata($session_data);
            
            // Set flash message
            $this->session->set_flashdata('success', 'Login berhasil! Selamat datang ' . $user->nama_lengkap);
            
            // ✅ Redirect berdasarkan role USER YANG BARU LOGIN
            if($user->role == 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('profile');
            }
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah!');
            redirect('auth/login');
        }
    }
    
    // ========================================
    // REGISTER
    // ========================================
    public function register() {
        // Jika sudah login, redirect
        if($this->session->userdata('logged_in')) {
            if($this->session->userdata('role') == 'admin') {
                redirect('admin/dashboard');
            } else {
                redirect('profile');
            }
        }
        
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', array(
            'is_unique' => 'Email sudah terdaftar!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|trim|matches[password]', array(
            'matches' => 'Password tidak sama!'
        ));
        
        if($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register - Jepara Furniture';
            $this->load->view('auth/register', $data);
        } else {
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'no_telepon' => $this->input->post('no_telepon')
            );
            
            if($this->User_model->register($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Registrasi gagal! Silakan coba lagi.');
                redirect('auth/register');
            }
        }
    }
    
    // ========================================
    // LOGOUT
    // ========================================
    public function logout() {
        $user_name = $this->session->userdata('nama_lengkap');
        
        // Destroy session
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('success', 'Anda telah berhasil logout. Sampai jumpa lagi' . ($user_name ? ', ' . $user_name : '') . '!');
        
        redirect('');
    }
}