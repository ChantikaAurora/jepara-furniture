<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Profil Toko Controller - WITH AUTO-CLEAN WHATSAPP!
 * Automatically cleans WhatsApp number format
 * 
 * @package    Jepara_Furniture
 * @subpackage Controllers/Admin
 * @author     Chantika Aurora Akmal
 */
class Profil_toko extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        // Check if user is admin
        if ($this->session->userdata('role') != 'admin') {
            show_error('You do not have permission to access this page', 403, 'Access Denied');
        }
        
        // Load models
        $this->load->model('Store_profile_model');
        
        // Load libraries
        $this->load->library(['form_validation', 'upload']);
        
        // Load helpers
        $this->load->helper(['url', 'form']);
    }

    /**
     * Display store profile edit form
     */
    public function index() {
        // Get store profile data
        $data['store'] = $this->Store_profile_model->get_profile();
        
        // Render view
        $data['title'] = 'Profil Toko';
        $data['active_menu'] = 'profil-toko';
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/store_profile/edit', $data);
        $this->load->view('admin/templates/footer');
    }

    /**
     * Update store profile
     */
    public function update() {
        // Set validation rules
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('whatsapp', 'WhatsApp', 'required|trim|callback_validate_whatsapp');
        
        if ($this->form_validation->run() === FALSE) {
            // Validation failed - reload form with errors
            $this->session->set_flashdata('error', validation_errors());
            $this->index();
            return;
        }
        
        // Clean WhatsApp number BEFORE saving!
        $whatsapp_clean = $this->_clean_whatsapp($this->input->post('whatsapp'));
        
        // Prepare data array
        $data = [
            'nama_toko' => $this->input->post('nama_toko'),
            'deskripsi_toko' => $this->input->post('deskripsi_toko'),
            'alamat' => $this->input->post('alamat'),
            'no_telepon' => $this->input->post('no_telepon'),
            'email' => $this->input->post('email'),
            'website' => $this->input->post('website'),
            'whatsapp' => $whatsapp_clean, // CLEANED VERSION!
            'instagram' => str_replace('@', '', $this->input->post('instagram')),
            'facebook' => $this->input->post('facebook'),
            'tiktok' => str_replace('@', '', $this->input->post('tiktok')),
            'jam_senin_jumat' => $this->input->post('jam_senin_jumat'),
            'jam_sabtu' => $this->input->post('jam_sabtu'),
            'jam_minggu' => $this->input->post('jam_minggu'),
            'bank_name' => $this->input->post('bank_name'),
            'bank_account_number' => $this->input->post('bank_account_number'),
            'bank_account_name' => $this->input->post('bank_account_name'),
            'google_maps' => $this->input->post('google_maps'),
        ];
        
        // Handle logo upload
        if (!empty($_FILES['logo_toko']['name'])) {
            $upload_result = $this->_handle_upload('logo_toko', 2048);
            
            if ($upload_result['success']) {
                $old_profile = $this->Store_profile_model->get_profile();
                if (!empty($old_profile->logo_toko)) {
                    $this->Store_profile_model->delete_old_file($old_profile->logo_toko, 'logo');
                }
                $data['logo_toko'] = $upload_result['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Upload logo gagal: ' . $upload_result['error']);
                redirect('admin/profil-toko');
                return;
            }
        }
        
        // Handle photo upload
        if (!empty($_FILES['foto_toko']['name'])) {
            $upload_result = $this->_handle_upload('foto_toko', 5120);
            
            if ($upload_result['success']) {
                $old_profile = $this->Store_profile_model->get_profile();
                if (!empty($old_profile->foto_toko)) {
                    $this->Store_profile_model->delete_old_file($old_profile->foto_toko, 'photo');
                }
                $data['foto_toko'] = $upload_result['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Upload foto gagal: ' . $upload_result['error']);
                redirect('admin/profil-toko');
                return;
            }
        }
        
        // Update database
        if ($this->Store_profile_model->update_profile($data)) {
            $this->session->set_flashdata('success', 'Profil toko berhasil diperbarui! WhatsApp: ' . $whatsapp_clean);
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil toko. Silakan coba lagi.');
        }
        
        redirect('admin/profil-toko');
    }

    /**
     * CLEAN WhatsApp Number - Remove ALL non-numeric characters except 62 prefix
     * Converts ANY format to: 628xxx
     * 
     * Examples:
     * - "+62 812-3456-7890" → "628123456789"
     * - "0812-3456-7890" → "628123456789"
     * - "62 812 345 678" → "62812345678"
     * - "+62‑812‑3456" → "628123456" (removes unicode dash)
     * 
     * @param string $whatsapp Raw WhatsApp input
     * @return string Cleaned WhatsApp (628xxx format)
     */
    private function _clean_whatsapp($whatsapp) {
        // Remove ALL non-numeric characters (spaces, +, -, unicode chars, etc)
        $clean = preg_replace('/[^0-9]/', '', $whatsapp);
        
        // If starts with 0, replace with 62
        if (substr($clean, 0, 1) === '0') {
            $clean = '62' . substr($clean, 1);
        }
        
        // If doesn't start with 62, add it
        if (substr($clean, 0, 2) !== '62') {
            $clean = '62' . $clean;
        }
        
        return $clean;
    }

    /**
     * Custom validation callback for WhatsApp
     * Validates AFTER cleaning
     * 
     * @param string $whatsapp Raw WhatsApp input
     * @return bool TRUE if valid, FALSE otherwise
     */
    public function validate_whatsapp($whatsapp) {
        // Clean first
        $clean = $this->_clean_whatsapp($whatsapp);
        
        // Validate cleaned version
        // Must be: 62 + 9-13 digits
        // Total: 11-15 characters
        if (!preg_match('/^62[0-9]{9,13}$/', $clean)) {
            $this->form_validation->set_message('validate_whatsapp', 
                'Format {field} tidak valid. Hasil setelah dibersihkan: ' . $clean . '. Harus 628xxx (11-15 digit)');
            return FALSE;
        }
        
        return TRUE;
    }

    /**
     * Handle file upload
     * 
     * @param string $field_name Form field name
     * @param int $max_size Maximum file size in KB
     * @return array Upload result
     */
    private function _handle_upload($field_name, $max_size = 2048) {
        $upload_path = './uploads/store/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, TRUE);
        }
        
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = $max_size;
        $config['encrypt_name'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload($field_name)) {
            $upload_data = $this->upload->data();
            return [
                'success' => TRUE,
                'file_name' => $upload_data['file_name'],
                'full_path' => $upload_data['full_path']
            ];
        } else {
            return [
                'success' => FALSE,
                'error' => $this->upload->display_errors('', '')
            ];
        }
    }
}