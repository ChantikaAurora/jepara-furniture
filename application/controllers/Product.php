<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Product Controller - WITH TESTIMONIALS
 * 
 * @package    Jepara_Furniture
 * @subpackage Controllers
 * @author     Chantika Aurora Akmal
 */
class Product extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load models
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->model('Cart_model');
        $this->load->model('Testimonial_model'); // ADDED FOR TESTIMONIALS
        
        // Load helpers
        $this->load->helper(['url', 'text', 'form']);
    }

    /**
     * Display product catalog
     */
    public function index() {
        // Get filters from URL
        $category_slug = $this->input->get('category');
        $search = $this->input->get('search');
        $min_price = $this->input->get('min_price');
        $max_price = $this->input->get('max_price');
        $sort = $this->input->get('sort') ?? 'newest';
        
        // Get category if filter applied
        $current_category = null;
        $category_id = null;
        
        if ($category_slug) {
            $current_category = $this->Kategori_model->get_by_slug($category_slug);
            if ($current_category) {
                $category_id = $current_category->id;
            }
        }
        
        // Get products based on filters
        if ($category_id) {
            $products = $this->Produk_model->get_by_category($category_id);
        } else if ($search) {
            $products = $this->Produk_model->search($search);
        } else {
            $products = $this->Produk_model->get_active();
        }
        
        // Apply price filter
        if ($min_price || $max_price) {
            $products = array_filter($products, function($p) use ($min_price, $max_price) {
                $match = true;
                if ($min_price && $p->harga < $min_price) $match = false;
                if ($max_price && $p->harga > $max_price) $match = false;
                return $match;
            });
        }
        
        // Apply sorting
        switch ($sort) {
            case 'price_low':
                usort($products, function($a, $b) {
                    return $a->harga <=> $b->harga;
                });
                break;
            case 'price_high':
                usort($products, function($a, $b) {
                    return $b->harga <=> $a->harga;
                });
                break;
            case 'name':
                usort($products, function($a, $b) {
                    return strcmp($a->nama_produk, $b->nama_produk);
                });
                break;
            case 'newest':
            default:
                usort($products, function($a, $b) {
                    return strtotime($b->created_at ?? '2024-01-01') <=> strtotime($a->created_at ?? '2024-01-01');
                });
                break;
        }
        
        // Get all categories for sidebar
        $categories = $this->Kategori_model->get_all();
        
        // Prepare data
        $data = [
            'title' => $current_category ? $current_category->nama_kategori . ' - Katalog Produk' : 'Katalog Produk',
            'active_menu' => 'product',
            'products' => $products,
            'categories' => $categories,
            'current_category' => $current_category,
            'current_filters' => [
                'search' => $search,
                'min_price' => $min_price,
                'max_price' => $max_price,
                'sort' => $sort
            ],
            'total_products' => count($products)
        ];
        
        $this->render('product/index', $data);
    }

    /**
     * Display product detail WITH TESTIMONIALS
     * 
     * @param string $slug Product slug
     */
    public function detail($slug) {
        // Get product by slug
        $product = $this->Produk_model->get_by_slug($slug);
        
        if (!$product) {
            show_404();
            return;
        }
        
        // ========================================
        // TESTIMONIALS DATA - ADDED
        // ========================================
        $testimonials = $this->Testimonial_model->get_by_product($product->id, 10);
        $avg_rating = $this->Testimonial_model->get_product_average_rating($product->id);
        $total_reviews = $this->Testimonial_model->count_product_testimonials($product->id);
        
        // Get rating distribution (1-5 stars)
        $rating_distribution = [];
        for ($i = 5; $i >= 1; $i--) {
            $count = 0;
            foreach ($testimonials as $testi) {
                if ($testi->rating == $i) {
                    $count++;
                }
            }
            $percentage = $total_reviews > 0 ? ($count / $total_reviews) * 100 : 0;
            $rating_distribution[$i] = [
                'count' => $count,
                'percentage' => round($percentage, 1)
            ];
        }
        
        // Get related products (same category)
        $related_products = [];
        if (isset($product->id_kategori)) {
            $all_related = $this->Produk_model->get_by_category($product->id_kategori);
            
            // Remove current product
            $related_products = array_filter($all_related, function($p) use ($product) {
                return $p->id != $product->id;
            });
            
            // Limit to 4 products
            $related_products = array_slice($related_products, 0, 4);
        }
        
        // Prepare data
        $data = [
            'title' => $product->nama_produk,
            'meta_description' => strip_tags(substr($product->deskripsi ?? '', 0, 160)),
            'active_menu' => 'product',
            'product' => $product,
            'related_products' => $related_products,
            // TESTIMONIAL DATA
            'testimonials' => $testimonials,
            'avg_rating' => $avg_rating,
            'total_reviews' => $total_reviews,
            'rating_distribution' => $rating_distribution
        ];
        
        $this->render('product/detail', $data);
    }

    /**
     * Filter by category
     * 
     * @param string $slug Category slug
     */
    public function category($slug) {
        // Get category
        $category = $this->Kategori_model->get_by_slug($slug);
        
        if (!$category) {
            show_404();
            return;
        }
        
        // Get products in this category
        $products = $this->Produk_model->get_by_category($category->id);
        
        // Get all categories for sidebar
        $categories = $this->Kategori_model->get_all();
        
        // Prepare data
        $data = [
            'title' => $category->nama_kategori,
            'active_menu' => 'product',
            'products' => $products,
            'categories' => $categories,
            'current_category' => $category,
            'current_filters' => [],
            'total_products' => count($products)
        ];
        
        $this->render('product/index', $data);
    }
}