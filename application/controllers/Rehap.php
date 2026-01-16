<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Rehap Controller
 * Handles rehap furniture requests from customers
 */
class Rehap extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form', 'auth']);
        $this->load->library(['form_validation', 'session', 'upload']);
        $this->load->model('Rehap_model');
        $this->load->model('User_model');
        $this->load->model('Store_profile_model');
    }
    
    /**
     * Render view with header/footer
     */
    private function render($view, $data = []) {
        $data['store'] = $this->Store_profile_model->get_profile();
        $this->load->view('templates/header', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * Index - Rehap service landing page
     */
    public function index() {
        $data = [
            'title' => 'Layanan Rehap Furniture - Jepara Indah Furniture',
            'page' => 'rehap'
        ];
        
        $this->render('rehap/index', $data);
    }
    
    /**
     * Create - Show create form
     */
    public function create() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu untuk mengajukan rehap');
            redirect('auth/login');
            return;
        }
        
        // Get user data
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_by_id($user_id);
        
        $data = [
            'title' => 'Ajukan Permintaan Rehap - Jepara Indah Furniture',
            'page' => 'rehap',
            'user' => $user
        ];
        
        $this->render('rehap/create', $data);
    }
    
    /**
     * Store - Process create form
     */
    public function store() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu');
            redirect('auth/login');
            return;
        }
        
        // Validation rules
        $this->form_validation->set_rules('nama_furniture', 'Nama Furniture', 'required|trim');
        $this->form_validation->set_rules('deskripsi_kerusakan', 'Deskripsi Kerusakan', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->create();
            return;
        }
        
        // Upload photos
        $uploaded_photos = [];
        $upload_errors = [];
        
        for ($i = 1; $i <= 6; $i++) {
            $field_name = 'foto_' . $i;
            
            // Check if file is uploaded
            if (!empty($_FILES[$field_name]['name'])) {
                $upload_result = $this->_upload_rehap_photo($field_name);
                
                if ($upload_result['success']) {
                    $uploaded_photos[$field_name] = $upload_result['file_name'];
                } else {
                    $upload_errors[] = "Foto $i: " . $upload_result['error'];
                }
            } elseif ($i <= 3) {
                // Required for first 3 photos
                $upload_errors[] = "Foto $i wajib diupload";
            }
        }
        
        // Check if there are upload errors
        if (!empty($upload_errors)) {
            // Delete uploaded photos if any
            foreach ($uploaded_photos as $photo) {
                $file_path = FCPATH . 'uploads/rehap/' . $photo;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            
            $this->session->set_flashdata('error', implode('<br>', $upload_errors));
            redirect('rehap/create');
            return;
        }
        
        // Generate kode rehap
        $kode_rehap = 'RHP-' . date('Ymd') . '-' . strtoupper(substr(md5(time()), 0, 6));
        
        // Prepare data
        $user_id = $this->session->userdata('user_id');
        $data = [
            'kode_rehap' => $kode_rehap,
            'id_user' => $user_id,
            'nama_furniture' => $this->input->post('nama_furniture', TRUE),
            'deskripsi_kerusakan' => $this->input->post('deskripsi_kerusakan', TRUE),
            'alamat_customer' => $this->input->post('alamat_customer', TRUE) ?: '-',
            'no_telepon_customer' => $this->input->post('no_telepon_customer', TRUE) ?: '-',
            'status' => 'menunggu_review',
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        // Add photos to data
        foreach ($uploaded_photos as $field => $filename) {
            $data[$field] = $filename;
        }
        
        // Insert to database
        $request_id = $this->Rehap_model->insert($data);
        
        if ($request_id) {
            // Generate WhatsApp URL
            $store = $this->Store_profile_model->get_profile();
            $whatsapp = $store->whatsapp;
            
            $message = "Halo, saya ingin konsultasi untuk permintaan rehap furniture:\n\n";
            $message .= "*Kode Rehap:* " . $kode_rehap . "\n";
            $message .= "*Furniture:* " . $data['nama_furniture'] . "\n";
            $message .= "*Deskripsi:* " . substr($data['deskripsi_kerusakan'], 0, 100) . "...\n\n";
            $message .= "Mohon info lebih lanjut. Terima kasih!";
            
            $wa_url = "https://wa.me/" . $whatsapp . "?text=" . urlencode($message);
            
            // Get request data
            $request = $this->Rehap_model->get_by_id($request_id);
            
            $data = [
                'title' => 'Permintaan Berhasil - Jepara Indah Furniture',
                'page' => 'rehap',
                'request' => $request,
                'wa_url' => $wa_url
            ];
            
            $this->render('rehap/success', $data);
        } else {
            // Delete uploaded photos
            foreach ($uploaded_photos as $photo) {
                $file_path = FCPATH . 'uploads/rehap/' . $photo;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            
            $this->session->set_flashdata('error', 'Gagal menyimpan permintaan rehap');
            redirect('rehap/create');
        }
    }
    
    /**
     * My Requests - List user's rehap requests
     */
    public function my_requests() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu');
            redirect('auth/login');
            return;
        }
        
        $user_id = $this->session->userdata('user_id');
        $requests = $this->Rehap_model->get_by_user($user_id);
        
        $data = [
            'title' => 'Permintaan Rehap Saya - Jepara Indah Furniture',
            'page' => 'rehap',
            'requests' => $requests
        ];
        
        $this->render('rehap/my_requests', $data);
    }
    
    /**
     * Detail - Show request detail
     */
    public function detail($id) {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu');
            redirect('auth/login');
            return;
        }
        
        $request = $this->Rehap_model->get_by_id($id);
        
        if (!$request) {
            $this->session->set_flashdata('error', 'Permintaan tidak ditemukan');
            redirect('rehap/my_requests');
            return;
        }
        
        // Check if user owns this request
        $user_id = $this->session->userdata('user_id');
        if ($request->id_user != $user_id) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke permintaan ini');
            redirect('rehap/my_requests');
            return;
        }
        
        $data = [
            'title' => 'Detail Rehap - ' . $request->kode_rehap,
            'page' => 'rehap',
            'request' => $request
        ];
        
        $this->render('rehap/detail', $data);
    }
    
    /**
     * Contact WhatsApp
     */
    public function contact_whatsapp($id) {
        $request = $this->Rehap_model->get_by_id($id);
        
        if (!$request) {
            $this->session->set_flashdata('error', 'Permintaan tidak ditemukan');
            redirect('rehap/my_requests');
            return;
        }
        
        // Generate WhatsApp URL
        $store = $this->Store_profile_model->get_profile();
        $whatsapp = $store->whatsapp;
        
        $message = "Halo, saya ingin konsultasi untuk permintaan rehap:\n\n";
        $message .= "*Kode Rehap:* " . $request->kode_rehap . "\n";
        $message .= "*Furniture:* " . $request->nama_furniture . "\n";
        $message .= "*Status:* " . ucfirst(str_replace('_', ' ', $request->status)) . "\n\n";
        $message .= "Mohon info lebih lanjut. Terima kasih!";
        
        $wa_url = "https://wa.me/" . $whatsapp . "?text=" . urlencode($message);
        
        redirect($wa_url);
    }
    
    /**
     * Private: Upload rehap photo
     */
    private function _upload_rehap_photo($field_name) {
        // Create upload directory if not exists
        $upload_path = FCPATH . 'uploads/rehap/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
        
        // Upload configuration
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = 'rehap_' . time() . '_' . rand(1000, 9999);
        $config['encrypt_name'] = FALSE;
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload($field_name)) {
            $upload_data = $this->upload->data();
            return [
                'success' => true,
                'file_name' => $upload_data['file_name']
            ];
        } else {
            return [
                'success' => false,
                'error' => $this->upload->display_errors('', '')
            ];
        }
    }

    /**
     * Upload Payment Proof - Customer upload bukti pembayaran
     */
    public function upload_payment() {
    // Check if user is logged in
    if (!$this->session->userdata('logged_in')) {
        $this->session->set_flashdata('error', 'Silakan login terlebih dahulu');
        redirect('auth/login');
        return;
    }

    $id = $this->input->post('rehap_id');
    $request = $this->Rehap_model->get_by_id($id);

    if (!$request) {
        $this->session->set_flashdata('error', 'Permintaan tidak ditemukan');
        redirect('rehap/my_requests');
        return;
    }

    // Check if user owns this request
    $user_id = $this->session->userdata('user_id');
    if ($request->id_user != $user_id) {
        $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
        redirect('rehap/my_requests');
        return;
    }

    // Check status
    if ($request->status != 'menunggu_pembayaran') {
        $this->session->set_flashdata('error', 'Status tidak valid untuk upload bukti pembayaran');
        redirect('rehap/detail/' . $id);
        return;
    }

    // Upload file
    $upload_result = $this->_upload_payment_proof('bukti_bayar');

    if (!$upload_result['success']) {
        $this->session->set_flashdata('error', $upload_result['error']);
        redirect('rehap/detail/' . $id);
        return;
    }

    // Update database
    if ($this->Rehap_model->upload_payment_proof($id, $upload_result['file_name'])) {
        $this->session->set_flashdata('success', 'Bukti pembayaran berhasil diupload. Menunggu verifikasi admin.');
    } else {
        // Delete uploaded file if database update fails
        $file_path = FCPATH . 'uploads/rehap/payment/' . $upload_result['file_name'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        $this->session->set_flashdata('error', 'Gagal menyimpan bukti pembayaran');
    }

    redirect('rehap/detail/' . $id);
}

/**
 * Private: Upload payment proof file
 */
private function _upload_payment_proof($field_name) {
    // Create upload directory if not exists
    $upload_path = FCPATH . 'uploads/rehap/payment/';
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }

    // Upload configuration
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png|pdf';
    $config['max_size'] = 2048; // 2MB
    $config['file_name'] = 'payment_' . time() . '_' . rand(1000, 9999);
    $config['encrypt_name'] = FALSE;

    $this->upload->initialize($config);

    if ($this->upload->do_upload($field_name)) {
        $upload_data = $this->upload->data();
        return [
            'success' => true,
            'file_name' => $upload_data['file_name']
        ];
    } else {
        return [
            'success' => false,
            'error' => $this->upload->display_errors('', '')
        ];
    }
}
}
