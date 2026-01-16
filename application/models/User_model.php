<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    private $table = 'users';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Login user - verify email and password
     */
    public function login($email, $password) {
        $this->db->where('email', $email);
        $user = $this->db->get($this->table)->row();
        
        if ($user) {
            // Verify password (assuming password is hashed with password_hash)
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        
        return false;
    }

    /**
     * Register new user
     */
    public function register($data) {
        // Hash password before storing
        $insert_data = array(
            'nama_lengkap' => $data['nama_lengkap'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'no_telepon' => isset($data['no_telepon']) ? $data['no_telepon'] : null,
            'role' => isset($data['role']) ? $data['role'] : 'customer', // default role
            'status' => isset($data['status']) ? $data['status'] : 'active', // default status
            'created_at' => date('Y-m-d H:i:s')
        );
        
        return $this->db->insert($this->table, $insert_data);
    }

    /**
     * Get user by ID
     */
    public function get_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }

    /**
     * Get user by ID (alias)
     */
    public function get_user_by_id($id) {
        return $this->get_by_id($id);
    }

    /**
     * Get user by email
     */
    public function get_by_email($email) {
        $this->db->where('email', $email);
        return $this->db->get($this->table)->row();
    }

    /**
     * Create new user
     */
    public function create($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update user
     */
    public function update($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete user
     */
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Check if email exists
     */
    public function email_exists($email, $exclude_id = null) {
        $this->db->where('email', $email);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        return $this->db->count_all_results($this->table) > 0;
    }

    /**
     * Get all users with optional filters
     */
    public function get_all($role = null, $status = null) {
        if ($role) {
            $this->db->where('role', $role);
        }
        if ($status) {
            $this->db->where('status', $status);
        }
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->result();
    }
}