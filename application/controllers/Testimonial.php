<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Testimonial_model');
        $this->load->library(['form_validation', 'session']);
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    /**
     * List user's testimonials
     */
    public function my_testimonials() {
        $user_id = $this->session->userdata('user_id');
        
        // Get user's existing testimonials
        $data['testimonials'] = $this->Testimonial_model->get_by_user($user_id);
        $data['title'] = 'Testimoni Saya';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('testimonial/my_testimonials', $data);
        $this->load->view('templates/footer');
    }

    /**
     * List completed orders that can be reviewed
     */
    public function index() {
        $user_id = $this->session->userdata('user_id');
        
        // Get completed orders that can be reviewed
        $data['completed_orders'] = $this->Testimonial_model->get_eligible_orders($user_id);
        $data['title'] = 'Buat Testimoni';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('testimonial/index', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Create testimonial form & Handle POST
     */
    public function create($order_id = null) {
        $user_id = $this->session->userdata('user_id');
        
        // Handle POST request (form submission)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            return $this->_handle_create_post();
        }
        
        // Handle GET request (show form)
        if (!$order_id) {
            $this->session->set_flashdata('error', 'Pesanan tidak valid');
            redirect('testimonial');
        }
        
        // Verify order belongs to user and is completed
        $order = $this->Testimonial_model->verify_order_eligibility($order_id, $user_id);
        
        if (!$order) {
            $this->session->set_flashdata('error', 'Pesanan tidak ditemukan atau belum selesai');
            redirect('testimonial');
        }
        
        // Check if testimonial already exists for this order
        $existing = $this->Testimonial_model->check_existing($user_id, $order_id);
        
        if ($existing) {
            $this->session->set_flashdata('error', 'Anda sudah memberikan testimoni untuk pesanan ini');
            redirect('testimonial');
        }
        
        $data['title'] = 'Tulis Testimoni';
        $data['order'] = $order;
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('testimonial/create', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Private: Handle create testimonial POST
     */
    private function _handle_create_post() {
        $user_id = $this->session->userdata('user_id');
        
        // Validation
        $this->form_validation->set_rules('order_id', 'Pesanan', 'required|numeric');
        $this->form_validation->set_rules('rating', 'Rating', 'required|integer|greater_than[0]|less_than[6]');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('isi', 'Isi Testimoni', 'required|trim|min_length[20]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('testimonial/create/' . $this->input->post('order_id'));
        }
        
        $order_id = $this->input->post('order_id');
        
        // Verify order eligibility again
        $order = $this->Testimonial_model->verify_order_eligibility($order_id, $user_id);
        
        if (!$order) {
            $this->session->set_flashdata('error', 'Pesanan tidak valid atau belum selesai');
            redirect('testimonial');
        }
        
        // Check if testimonial already exists
        $existing = $this->Testimonial_model->check_existing($user_id, $order_id);
        
        if ($existing) {
            $this->session->set_flashdata('error', 'Anda sudah memberikan testimoni untuk pesanan ini');
            redirect('testimonial');
        }
        
        // Handle image upload
        $foto_produk = null;
        if (!empty($_FILES['foto']['name'])) {
            $foto_produk = $this->_upload_testimonial_image();
            if (!$foto_produk) {
                $this->session->set_flashdata('error', 'Gagal mengupload foto. Format: JPG, PNG, max 2MB');
                redirect('testimonial/create/' . $order_id);
            }
        }
        
        // Prepare data
        $data = [
            'id_user' => $user_id,
            'id_pesanan' => $order_id,
            'rating' => $this->input->post('rating'),
            'judul_testimoni' => $this->input->post('judul'),
            'isi_testimoni' => $this->input->post('isi'),
            'foto_produk' => $foto_produk,
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        // Save testimonial
        if ($this->Testimonial_model->insert($data)) {
            $this->session->set_flashdata('success', 'Testimoni berhasil dikirim dan menunggu persetujuan admin');
            redirect('testimonial/my_testimonials');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengirim testimoni');
            redirect('testimonial/create/' . $order_id);
        }
    }

    /**
     * Delete testimonial
     */
    public function delete($id) {
        $user_id = $this->session->userdata('user_id');
        
        $testimonial = $this->Testimonial_model->get_by_id($id);
        
        if (!$testimonial || $testimonial->id_user != $user_id) {
            $this->session->set_flashdata('error', 'Testimoni tidak ditemukan');
            redirect('testimonial/my_testimonials');
        }
        
        // Delete image if exists
        if ($testimonial->foto_produk && file_exists('./uploads/testimonials/' . $testimonial->foto_produk)) {
            unlink('./uploads/testimonials/' . $testimonial->foto_produk);
        }
        
        if ($this->Testimonial_model->delete($id)) {
            $this->session->set_flashdata('success', 'Testimoni berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus testimoni');
        }
        
        redirect('testimonial/my_testimonials');
    }

    /**
     * Private: Upload testimonial image
     */
    private function _upload_testimonial_image() {
        $config['upload_path'] = './uploads/testimonials/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = 'testimonial_' . time() . '_' . rand(1000, 9999);
        
        // Create directory if not exists
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);
        }
        
        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        }
        
        return false;
    }
}