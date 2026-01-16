<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    
    public function index() {
        $this->load->database();
        $query = $this->db->query("SELECT * FROM users WHERE role = 'admin'");
        $admin = $query->row();
        
        echo "<h2>✅ Test Database Connection</h2>";
        
        if ($admin) {
            echo "<p style='color: green; font-size: 18px;'>✅ Database connected successfully!</p>";
            echo "<p>Admin Name: <strong>" . $admin->nama_lengkap . "</strong></p>";
            echo "<p>Admin Email: <strong>" . $admin->email . "</strong></p>";
            echo "<p>Database: <strong>db_jepara_furniture</strong></p>";
        } else {
            echo "<p style='color: red;'>❌ Connection failed!</p>";
        }
    }
}
