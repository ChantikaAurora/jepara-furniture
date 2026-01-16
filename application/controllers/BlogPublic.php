<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * BlogPublic Controller - FRONTEND
 * Untuk customer melihat blog (PUBLIC)
 */

class BlogPublic extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->library('pagination');
    }

    /**
     * Display blog listing page - FIXED
     */
    public function index() {
        // Pagination configuration
        $config['base_url'] = base_url('blog');
        $config['total_rows'] = $this->Blog_model->count_posts(true);
        $config['per_page'] = 9;
        $config['uri_segment'] = 2;
        
        // Pagination styling
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next »';
        $config['prev_link'] = '« Previous';
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span>';
        $config['num_tag_close'] = '</span>';
        
        $this->pagination->initialize($config);
        
        // Get category filter
        $category = $this->input->get('category');
        
        // Get posts
        $offset = $this->uri->segment(2) ? $this->uri->segment(2) : 0;
        $posts = $this->Blog_model->get_published_posts($config['per_page'], $offset, $category);
        
        // Get categories
        $categories = $this->Blog_model->get_categories_with_count();
        
        // Get recent posts
        $recent_posts = $this->Blog_model->get_recent_posts(5);
        
        // Get popular posts
        $popular_posts = $this->Blog_model->get_popular_posts(5);
        
        $data = [
            'title' => 'Blog & Artikel',
            'posts' => $posts,
            'categories' => $categories,
            'current_category' => $category,
            'recent_posts' => $recent_posts,
            'popular_posts' => $popular_posts,
            'pagination' => $this->pagination->create_links(),
            'active_menu' => 'blog'
        ];
        
        $this->render('blog/index', $data);
    }

    /**
     * Display single blog post
     */
    public function detail($slug) {
        $post = $this->Blog_model->get_post_by_slug($slug);
        
        if (!$post || !$post->is_published) {
            show_404();
            return;
        }
        
        // Increment view count
        $this->Blog_model->increment_view($post->id);
        
        // Get related posts (same category)
        $related_posts = $this->Blog_model->get_posts_by_category($post->kategori_blog, 4);
        
        // Remove current post from related
        $related_posts = array_filter($related_posts, function($p) use ($post) {
            return $p->id != $post->id;
        });
        $related_posts = array_slice($related_posts, 0, 3);
        
        $data = [
            'title' => $post->judul,
            'post' => $post,
            'related_posts' => $related_posts,
            'active_menu' => 'blog'
        ];
        
        $this->render('blog/detail', $data);
    }

    /**
     * Search blog posts
     */
    public function search() {
        $keyword = $this->input->get('q');
        
        if (empty($keyword)) {
            redirect('blog');
            return;
        }
        
        $posts = $this->Blog_model->search_posts($keyword, 20);
        
        $data = [
            'title' => 'Hasil Pencarian: ' . $keyword,
            'posts' => $posts,
            'keyword' => $keyword,
            'categories' => $this->Blog_model->get_categories_with_count(),
            'recent_posts' => $this->Blog_model->get_recent_posts(5),
            'popular_posts' => $this->Blog_model->get_popular_posts(5),
            'pagination' => '',
            'active_menu' => 'blog'
        ];
        
        $this->render('blog/index', $data);
    }
}