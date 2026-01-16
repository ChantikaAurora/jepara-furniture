<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Page Controller
 * Handles static pages like About and Contact
 */
class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'text']);
    }

    /**
     * Display About page with store information from database
     */
    public function about() {
        // Get store profile from database - DIRECT query, no model needed
        $query = $this->db->query("SELECT * FROM profil_toko LIMIT 1");
        $data['store'] = $query->row();
        
        // If no data, create default (shouldn't happen but just in case)
        if (!$data['store']) {
            $data['store'] = (object)[
                'nama_toko' => 'Jepara Indah Furniture',
                'deskripsi_toko' => 'Toko furniture berkualitas',
                'alamat' => 'Padang, Sumatera Barat',
                'no_telepon' => '0751-123456',
                'email' => 'info@jeparaindah.com',
                'whatsapp' => '628123456789',
                'instagram' => 'jeparaindah',
                'facebook' => 'jeparaindah',
                'tiktok' => 'jeparaindah',
                'jam_senin_jumat' => '08:00 - 17:00 WIB',
                'jam_sabtu' => '08:00 - 15:00 WIB',
                'jam_minggu' => 'Tutup'
            ];
        }
        
        // Page metadata
        $data['title'] = 'Tentang Kami';
        $data['active_menu'] = 'about';
        
        // Load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('page/about', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Display Contact page
     */
    public function contact() {
        // Get store profile
        $query = $this->db->query("SELECT * FROM profil_toko LIMIT 1");
        $data['store'] = $query->row();
        
        // Page metadata
        $data['title'] = 'Hubungi Kami';
        $data['active_menu'] = 'contact';
        
        // Load views
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('page/contact', $data);
        $this->load->view('templates/footer');
    }
}