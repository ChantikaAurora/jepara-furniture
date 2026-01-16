<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Controller - Base Controller
 * Extended CI_Controller with common functionality
 * FIXED VERSION - No undefined navbar error!
 */
class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Render view with template
     * @param string $view View file path
     * @param array $data Data to pass to view
     * @param bool $return Return output instead of displaying
     */
    protected function render($view, $data = [], $return = false) {
        // Set default title if not provided
        if (!isset($data['title'])) {
            $data['title'] = 'Jepara Furniture';
        }
        
        // Determine which template to use based on user role
        $role = $this->session->userdata('role');
        
        if ($return) {
            // Return mode - concatenate all views
            $output = '';
            
            if ($role == 'admin') {
                // Admin templates
                $output .= $this->load->view('templates/admin_header', $data, true);
                $output .= $this->load->view($view, $data, true);
                $output .= $this->load->view('templates/admin_footer', $data, true);
            } else {
                // User templates - FIXED ORDER: header → navbar → view → footer
                $output .= $this->load->view('templates/header', $data, true);
                $output .= $this->load->view('templates/navbar', $data, true);  
                $output .= $this->load->view($view, $data, true);
                $output .= $this->load->view('templates/footer', $data, true);
            }
            
            return $output;
            
        } else {
            // Display mode - load views directly
            if ($role == 'admin') {
                // Admin templates
                $this->load->view('templates/admin_header', $data);
                $this->load->view($view, $data);
                $this->load->view('templates/admin_footer', $data);
            } else {
                // User templates - FIXED ORDER: header → navbar → view → footer
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar', $data);  // ✅ Navbar di tengah!
                $this->load->view($view, $data);
                $this->load->view('templates/footer', $data);
            }
        }
    }
    
    /**
     * Check if user is logged in
     * Redirect to login page if not
     */
    protected function require_login() {
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu');
            redirect('auth/login');
        }
    }
    
    /**
     * Check if user is admin
     * Redirect to home if not admin
     */
    protected function require_admin() {
        $this->require_login();
        
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Akses ditolak. Anda bukan admin.');
            redirect('home');
        }
    }
    
    /**
     * Set flash message
     * @param string $type Type of message (success, error, info, warning)
     * @param string $message Message content
     */
    protected function set_message($type, $message) {
        $this->session->set_flashdata($type, $message);
    }
    
    /**
     * JSON response helper
     * @param bool $success Success status
     * @param string $message Response message
     * @param mixed $data Additional data
     */
    protected function json_response($success, $message, $data = null) {
        header('Content-Type: application/json');
        
        $response = [
            'success' => $success,
            'message' => $message
        ];
        
        if ($data !== null) {
            $response['data'] = $data;
        }
        
        echo json_encode($response);
        exit;
    }
}