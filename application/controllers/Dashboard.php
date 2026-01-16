<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('auth');
        
        // ✅ Cek login
        check_login();
        
        // ✅ Redirect admin ke admin dashboard
        if ($this->session->userdata('role') === 'admin') {
            redirect('admin/dashboard');
        }
    }
    
    public function index() {
        // ✅ Customer dashboard = Profile page
        redirect('profile');
    }
}