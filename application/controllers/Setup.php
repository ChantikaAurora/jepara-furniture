<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property CI_DB_query_builder $db
*/

class Setup extends CI_Controller {
    
    public function index() {
        $this->load->database();
        
        echo "<!DOCTYPE html>
<html>
<head>
    <title>Setup Database Jepara Furniture</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 40px rgba(0,0,0,0.2); }
        h1 { color: #8B5E3C; margin-bottom: 10px; }
        h2 { color: #5A3E2B; margin: 25px 0 15px; padding-bottom: 10px; border-bottom: 2px solid #F5EBDD; }
        .success { color: #4caf50; padding: 8px 0; }
        .error { color: #f44336; padding: 8px 0; }
        .info { color: #2196f3; padding: 8px 0; }
        .btn { display: inline-block; padding: 15px 40px; background: #8B5E3C; color: white; text-decoration: none; border-radius: 8px; margin-top: 30px; font-weight: 600; transition: all 0.3s; }
        .btn:hover { background: #5A3E2B; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(139,94,60,0.3); }
        pre { background: #f5f5f5; padding: 15px; border-radius: 8px; overflow-x: auto; margin: 10px 0; }
        hr { margin: 30px 0; border: none; border-top: 2px solid #F5EBDD; }
        .step { background: #F5EBDD; padding: 20px; border-radius: 10px; margin: 15px 0; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>🛠️ Setup Database Jepara Furniture</h1>
        <p style='color: #666; margin-bottom: 30px;'>Instalasi otomatis semua tabel dan data awal</p>
        <hr>";
        
        // STEP 1: Buat/Fix Tabel Users
        echo "<div class='step'>";
        echo "<h2>📋 Step 1: Tabel Users</h2>";
        $this->create_users_table();
        echo "</div>";
        
        // STEP 2: Buat Tabel Categories
        echo "<div class='step'>";
        echo "<h2>📋 Step 2: Tabel Categories</h2>";
        $this->create_categories_table();
        echo "</div>";
        
        // STEP 3: Buat Tabel Products
        echo "<div class='step'>";
        echo "<h2>📋 Step 3: Tabel Products</h2>";
        $this->create_products_table();
        echo "</div>";
        
        // STEP 4: Insert Data Awal
        echo "<div class='step'>";
        echo "<h2>📋 Step 4: Data Awal (Admin & Sample)</h2>";
        $this->insert_initial_data();
        echo "</div>";
        
        echo "<hr>";
        echo "<h2 style='color: #4caf50;'>✅ Setup Berhasil Selesai!</h2>";
        echo "<p style='margin: 20px 0;'><strong>Login Information:</strong></p>";
        echo "<pre>📧 Email: admin@jepara.com\n🔑 Password: password</pre>";
        echo "<a href='" . base_url('login') . "' class='btn'>🚀 Login Sekarang</a>";
        echo "</div></body></html>";
    }
    
    // === FUNCTION CREATE TABLES ===
    
    private function create_users_table() {
        try {
            // Cek apakah tabel sudah ada
            $exists = $this->db->query("SHOW TABLES LIKE 'users'")->num_rows() > 0;
            
            if($exists) {
                echo "<p class='info'>ℹ️ Tabel users sudah ada, mengecek struktur...</p>";
                
                // Cek dan tambahkan kolom yang kurang
                $columns = $this->db->query("SHOW COLUMNS FROM users")->result_array();
                $has_is_active = false;
                $has_updated_at = false;
                
                foreach($columns as $col) {
                    if($col['Field'] == 'is_active') $has_is_active = true;
                    if($col['Field'] == 'updated_at') $has_updated_at = true;
                }
                
                if(!$has_is_active) {
                    $this->db->query("ALTER TABLE users ADD COLUMN is_active TINYINT(1) NOT NULL DEFAULT 1 AFTER role");
                    echo "<p class='success'>✅ Kolom is_active ditambahkan</p>";
                }
                
                if(!$has_updated_at) {
                    $this->db->query("ALTER TABLE users ADD COLUMN updated_at DATETIME NULL AFTER created_at");
                    echo "<p class='success'>✅ Kolom updated_at ditambahkan</p>";
                }
                
            } else {
                // Buat tabel baru
                $sql = "CREATE TABLE users (
                    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                    name VARCHAR(100) NOT NULL,
                    email VARCHAR(100) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    phone VARCHAR(20) NULL,
                    address TEXT NULL,
                    role ENUM('admin', 'customer') NOT NULL DEFAULT 'customer',
                    is_active TINYINT(1) NOT NULL DEFAULT 1,
                    created_at DATETIME NOT NULL,
                    updated_at DATETIME NULL,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
                
                $this->db->query($sql);
                echo "<p class='success'>✅ Tabel users berhasil dibuat!</p>";
            }
        } catch(Exception $e) {
            echo "<p class='error'>❌ Error: " . $e->getMessage() . "</p>";
        }
    }
    
    private function create_categories_table() {
        try {
            $exists = $this->db->query("SHOW TABLES LIKE 'categories'")->num_rows() > 0;
            
            if($exists) {
                echo "<p class='info'>ℹ️ Tabel categories sudah ada</p>";
            } else {
                $sql = "CREATE TABLE categories (
                    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                    name VARCHAR(100) NOT NULL,
                    slug VARCHAR(100) NOT NULL UNIQUE,
                    description TEXT NULL,
                    created_at DATETIME NOT NULL,
                    updated_at DATETIME NULL,
                    PRIMARY KEY (id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
                
                $this->db->query($sql);
                echo "<p class='success'>✅ Tabel categories berhasil dibuat!</p>";
            }
        } catch(Exception $e) {
            echo "<p class='error'>❌ Error: " . $e->getMessage() . "</p>";
        }
    }
    
    private function create_products_table() {
        try {
            $exists = $this->db->query("SHOW TABLES LIKE 'products'")->num_rows() > 0;
            
            if($exists) {
                echo "<p class='info'>ℹ️ Tabel products sudah ada</p>";
            } else {
                $sql = "CREATE TABLE products (
                    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                    category_id INT(11) UNSIGNED NOT NULL,
                    name VARCHAR(150) NOT NULL,
                    slug VARCHAR(150) NOT NULL UNIQUE,
                    description TEXT NULL,
                    price DECIMAL(12,2) NOT NULL,
                    stock INT(11) NOT NULL DEFAULT 0,
                    image VARCHAR(255) NULL DEFAULT 'default.jpg',
                    weight INT(11) NULL DEFAULT 0,
                    is_active TINYINT(1) NOT NULL DEFAULT 1,
                    created_at DATETIME NOT NULL,
                    updated_at DATETIME NULL,
                    PRIMARY KEY (id),
                    KEY category_id (category_id)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
                
                $this->db->query($sql);
                echo "<p class='success'>✅ Tabel products berhasil dibuat!</p>";
            }
        } catch(Exception $e) {
            echo "<p class='error'>❌ Error: " . $e->getMessage() . "</p>";
        }
    }
    
    private function insert_initial_data() {
        try {
            // 1. Insert Admin
            $check_admin = $this->db->get_where('users', array('email' => 'admin@jepara.com'))->num_rows();
            
            if($check_admin > 0) {
                echo "<p class='info'>ℹ️ Admin sudah ada</p>";
            } else {
                $admin = array(
                    'name' => 'Admin Jepara Indah',
                    'email' => 'admin@jepara.com',
                    'password' => password_hash('password', PASSWORD_DEFAULT),
                    'phone' => '081234567890',
                    'role' => 'admin',
                    'is_active' => 1,
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->db->insert('users', $admin);
                echo "<p class='success'>✅ Admin berhasil dibuat</p>";
            }
            
            // 2. Insert Categories
            $check_cat = $this->db->count_all('categories');
            
            if($check_cat > 0) {
                echo "<p class='info'>ℹ️ Kategori sudah ada</p>";
            } else {
                $categories = array(
                    array('name' => 'Kursi', 'slug' => 'kursi', 'description' => 'Berbagai jenis kursi jati minimalis', 'created_at' => date('Y-m-d H:i:s')),
                    array('name' => 'Meja', 'slug' => 'meja', 'description' => 'Meja makan, kerja, dan tamu', 'created_at' => date('Y-m-d H:i:s')),
                    array('name' => 'Lemari', 'slug' => 'lemari', 'description' => 'Lemari pakaian dan hias', 'created_at' => date('Y-m-d H:i:s')),
                    array('name' => 'Sofa', 'slug' => 'sofa', 'description' => 'Sofa minimalis dan klasik', 'created_at' => date('Y-m-d H:i:s')),
                    array('name' => 'Tempat Tidur', 'slug' => 'tempat-tidur', 'description' => 'Ranjang dan dipan kayu jati', 'created_at' => date('Y-m-d H:i:s'))
                );
                
                $this->db->insert_batch('categories', $categories);
                echo "<p class='success'>✅ 5 Kategori berhasil dibuat</p>";
            }
            
            // 3. Insert Sample Products
            $check_prod = $this->db->count_all('products');
            
            if($check_prod > 0) {
                echo "<p class='info'>ℹ️ Produk sample sudah ada</p>";
            } else {
                $products = array(
                    array(
                        'category_id' => 1,
                        'name' => 'Kursi Jati Minimalis',
                        'slug' => 'kursi-jati-minimalis',
                        'description' => 'Kursi minimalis dari kayu jati berkualitas tinggi',
                        'price' => 2500000,
                        'stock' => 15,
                        'image' => 'kursi-jati.jpg',
                        'weight' => 15,
                        'is_active' => 1,
                        'created_at' => date('Y-m-d H:i:s')
                    ),
                    array(
                        'category_id' => 2,
                        'name' => 'Meja Makan Set',
                        'slug' => 'meja-makan-set',
                        'description' => 'Set meja makan untuk 6 orang dengan finishing natural',
                        'price' => 8500000,
                        'stock' => 8,
                        'image' => 'meja-makan.jpg',
                        'weight' => 80,
                        'is_active' => 1,
                        'created_at' => date('Y-m-d H:i:s')
                    ),
                    array(
                        'category_id' => 3,
                        'name' => 'Lemari Pakaian 3 Pintu',
                        'slug' => 'lemari-pakaian-3-pintu',
                        'description' => 'Lemari ukir klasik dengan 3 pintu dan cermin',
                        'price' => 5200000,
                        'stock' => 12,
                        'image' => 'lemari-pakaian.jpg',
                        'weight' => 120,
                        'is_active' => 1,
                        'created_at' => date('Y-m-d H:i:s')
                    ),
                    array(
                        'category_id' => 4,
                        'name' => 'Sofa L Minimalis',
                        'slug' => 'sofa-l-minimalis',
                        'description' => 'Sofa minimalis berbentuk L untuk ruang tamu modern',
                        'price' => 12000000,
                        'stock' => 5,
                        'image' => 'sofa-l.jpg',
                        'weight' => 100,
                        'is_active' => 1,
                        'created_at' => date('Y-m-d H:i:s')
                    )
                );
                
                $this->db->insert_batch('products', $products);
                echo "<p class='success'>✅ 4 Produk sample berhasil dibuat</p>";
            }
            
        } catch(Exception $e) {
            echo "<p class='error'>❌ Error: " . $e->getMessage() . "</p>";
        }
    }
}
