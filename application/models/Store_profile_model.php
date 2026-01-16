<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_profile_model extends CI_Model {
    
    private $table = 'profil_toko';
    
    // ✅ Daftar kolom VALID di database (UPDATED - Tambah google_maps)
    private $allowed_fields = [
        'nama_toko',
        'logo_toko',
        'foto_toko',
        'deskripsi_toko',
        'alamat',
        'no_telepon',
        'email',
        'instagram',
        'tiktok',
        'facebook',
        'whatsapp',
        'google_maps',  // ✅ TAMBAHAN BARU
        'jam_operasional',
        'jam_senin_jumat',
        'jam_sabtu',
        'jam_minggu',
        'bank_name',
        'bank_account_number',
        'bank_account_name',
        'created_at',
        'updated_at'
    ];
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_profile() {
        $this->db->limit(1);
        $profile = $this->db->get($this->table)->row();
        
        if (!$profile) {
            $default_data = [
                'nama_toko' => 'Jepara Indah Furniture',
                'email' => 'info@jeparaindah.com',
                'no_telepon' => '0751-123456',
                'alamat' => 'Padang, Sumatera Barat',
                'whatsapp' => '628123456789',
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $this->db->insert($this->table, $default_data);
            $profile = $this->db->get($this->table)->row();
        }
        
        return $profile;
    }
    
    // FILTER data sebelum update
    private function filter_data($data) {
        $filtered = [];
        foreach ($data as $key => $value) {
            if (in_array($key, $this->allowed_fields)) {
                $filtered[$key] = $value;
            }
        }
        return $filtered;
    }
    
    public function update_profile($data) {
        // HAPUS field yang tidak ada di database
        $data = $this->filter_data($data);
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        $profile = $this->get_profile();
        
        if ($profile) {
            $this->db->where('id', $profile->id);
            return $this->db->update($this->table, $data);
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            return $this->db->insert($this->table, $data);
        }
    }
    
    public function update_logo($filename) {
        $profile = $this->get_profile();
        if ($profile) {
            $data = [
                'logo_toko' => $filename,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->db->where('id', $profile->id);
            return $this->db->update($this->table, $data);
        }
        return false;
    }
    
    public function update_photo($filename) {
        $profile = $this->get_profile();
        if ($profile) {
            $data = [
                'foto_toko' => $filename,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->db->where('id', $profile->id);
            return $this->db->update($this->table, $data);
        }
        return false;
    }
    
    public function delete_old_file($filename, $type = 'logo') {
        if (!empty($filename)) {
            $file_path = FCPATH . 'uploads/store/' . $filename;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }
}