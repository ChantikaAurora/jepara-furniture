<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home Controller - COMPLETELY FIXED VERSION
 * All errors resolved
 * 
 * @package    Jepara_Furniture
 * @subpackage Controllers
 * @author     Chantika Aurora Akmal
 */
class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load models
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->model('Testimonial_model');
        $this->load->model('Blog_model');
        $this->load->model('Cart_model');
        
        // Load helpers
        $this->load->helper(['url', 'text', 'form']);
    }

    /**
     * Display homepage
     */
    public function index() {
        // Get featured products
        $featured_products = $this->Produk_model->get_active(8);
        
        // Get all categories and ensure they have slugs
        $categories = $this->Kategori_model->get_all();
        
        // Fix categories without slugs
        foreach ($categories as $category) {
            if (empty($category->slug)) {
                $category->slug = url_title($category->nama_kategori, 'dash', true);
            }
        }
        
        // Get approved testimonials
        $testimonials = $this->Testimonial_model->get_approved(6);
        
        // Get recent blog posts
        $recent_posts = $this->Blog_model->get_recent_posts(3);
        
        // Prepare data for view
        $data = [
            'title' => 'Jepara Indah Furniture - Furniture Berkualitas Khas Jepara',
            'meta_description' => 'Toko furniture berkualitas tinggi dari Jepara. Menyediakan berbagai produk furniture jati asli dengan desain elegan dan harga terjangkau.',
            'active_menu' => 'home', 
            'featured_products' => $featured_products,
            'categories' => $categories,
            'testimonials' => $testimonials,
            'recent_posts' => $recent_posts,
            'stats' => $this->get_homepage_stats()
        ];
        
        $this->render('home/index', $data);
    }

    /**
     * Get homepage statistics
     */
    private function get_homepage_stats() {
        return [
            'total_products' => $this->Produk_model->count_active(),
            'total_categories' => $this->db->count_all('kategori'),
            'happy_customers' => $this->Testimonial_model->count_pending(),
            'years_experience' => 15
        ];
    }

    /**
     * AJAX endpoint for add to cart
     */
    public function add_to_cart() {
        header('Content-Type: application/json');
        
        if (!$this->session->userdata('logged_in')) {
            echo json_encode([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu',
                'redirect' => base_url('auth/login')
            ]);
            return;
        }
        
        $product_id = $this->input->post('product_id');
        $quantity = $this->input->post('quantity') ?? 1;
        
        if (!$product_id || !is_numeric($product_id)) {
            echo json_encode([
                'success' => false,
                'message' => 'ID produk tidak valid'
            ]);
            return;
        }
        
        $product = $this->Produk_model->get_by_id($product_id);
        
        if (!$product) {
            echo json_encode([
                'success' => false,
                'message' => 'Produk tidak ditemukan'
            ]);
            return;
        }
        
        if (isset($product->stok) && $product->stok < $quantity) {
            echo json_encode([
                'success' => false,
                'message' => 'Stok tidak mencukupi. Tersedia: ' . $product->stok
            ]);
            return;
        }
        
        $user_id = $this->session->userdata('user_id');
        $result = $this->Cart_model->add_to_cart($user_id, $product_id, $quantity);
        
        if ($result) {
            $cart_count = $this->Cart_model->get_cart_count($user_id);
            
            echo json_encode([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan ke keranjang',
                'cart_count' => $cart_count
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Gagal menambahkan produk'
            ]);
        }
    }

    /**
     * Search products
     */
    public function search() {
        $keyword = $this->input->get('q');
        
        if (empty($keyword)) {
            redirect('product');
            return;
        }
        
        $products = $this->Produk_model->search($keyword);
        
        $data = [
            'title' => 'Hasil Pencarian: ' . $keyword,
            'active_menu' => 'product',
            'search_keyword' => $keyword,
            'products' => $products,
            'categories' => $this->Kategori_model->get_all()
        ];
        
        if (file_exists(APPPATH . 'views/product/index.php')) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('product/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('home/search_results', $data);
            $this->load->view('templates/footer');
        }
    }

    /**
     * View product detail by slug
     */
    public function product($slug) {
        $product = $this->Produk_model->get_by_slug($slug);
        
        if (!$product) {
            show_404();
            return;
        }
        
        $related_products = [];
        if (isset($product->id_kategori)) {
            $related_products = $this->Produk_model->get_by_category($product->id_kategori);
            $related_products = array_filter($related_products, function($p) use ($product) {
                return $p->id != $product->id;
            });
            $related_products = array_slice($related_products, 0, 4);
        }
        
        $data = [
            'title' => $product->nama_produk . ' - Jepara Indah Furniture',
            'meta_description' => strip_tags(substr($product->deskripsi, 0, 160)),
            'active_menu' => 'product',
            'product' => $product,
            'related_products' => $related_products
        ];
        
        $this->render('product/detail', $data);
    }

    /**
     * View products by category
     */
    public function category($slug) {
        $category = $this->Kategori_model->get_by_slug($slug);
        
        if (!$category) {
            show_404();
            return;
        }
        
        $products = $this->Produk_model->get_by_category($category->id);
        
        $data = [
            'title' => $category->nama_kategori . ' - Jepara Indah Furniture',
            'active_menu' => 'product',
            'current_category' => $category,
            'products' => $products,
            'categories' => $this->Kategori_model->get_all()
        ];
        
        $this->render('product/index', $data);
    }
}