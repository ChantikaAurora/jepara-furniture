<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Blog Controller
 * Manages all blog post operations
 * 
 * @package    Jepara Furniture
 * @subpackage Controllers
 * @category   Admin
 * @author     Aurora
 * @version    1.0
 */

class Blog extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load models
        $this->load->model('Blog_model');
        
        // Load libraries
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        // Check if user is admin
        if ($this->session->userdata('role') != 'admin') {
            redirect('home');
        }
    }

    /**
     * Display all blog posts
     */
    public function index() {
        // Get search parameter
        $search = $this->input->get('search');
        
        // Initialize data with defaults
        $data = [
            'title' => 'Blog Management',
            'posts' => [],
            'stats' => (object)[
                'total_posts' => 0,
                'published_posts' => 0,
                'draft_posts' => 0,
                'total_views' => 0
            ]
        ];
        
        try {
            // Get all posts
            $data['posts'] = $this->Blog_model->get_all_posts($search);
            
            // Get statistics
            $stats = $this->Blog_model->get_statistics();
            if ($stats) {
                $data['stats'] = $stats;
            }
        } catch (Exception $e) {
            log_message('error', 'Error loading blog posts: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat memuat data blog');
        }
        
        $this->render('blog/index', $data);
    }

    /**
     * Show create post form
     */
    public function create() {
        $data = [
            'title' => 'Tulis Artikel Baru',
            'categories' => $this->_get_blog_categories()
        ];
        
        $this->render('blog/create', $data);
    }

    /**
     * Store new blog post
     */
    public function store() {
        // Set validation rules
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('kategori_blog', 'Kategori', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->create();
            return;
        }
        
        try {
            // Generate slug from title
            $slug = $this->_generate_slug($this->input->post('judul'));
            
            // Handle image upload
            $image_name = null;
            if (!empty($_FILES['gambar_utama']['name'])) {
                $image_name = $this->_upload_image('gambar_utama');
                if (!$image_name) {
                    $this->session->set_flashdata('error', 'Gagal mengupload gambar: ' . $this->upload->display_errors());
                    redirect('admin/blog/create');
                    return;
                }
            }
            
            // Auto-generate excerpt if empty
            $excerpt = $this->input->post('excerpt');
            if (empty($excerpt)) {
                $excerpt = $this->_generate_excerpt($this->input->post('konten'));
            }
            
            // Prepare data
            $post_data = [
                'judul' => $this->input->post('judul'),
                'slug' => $slug,
                'konten' => $this->input->post('konten'),
                'excerpt' => $excerpt,
                'kategori_blog' => $this->input->post('kategori_blog'),
                'gambar_utama' => $image_name,
                'id_author' => $this->session->userdata('user_id'),
                'is_published' => $this->input->post('is_published') ? 1 : 0,
                'published_at' => $this->input->post('is_published') ? date('Y-m-d H:i:s') : null
            ];
            
            // Save to database
            $result = $this->Blog_model->create_post($post_data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Artikel berhasil disimpan');
                redirect('admin/blog');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan artikel');
                redirect('admin/blog/create');
            }
            
        } catch (Exception $e) {
            log_message('error', 'Error creating blog post: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan artikel');
            redirect('admin/blog/create');
        }
    }

    /**
     * Show edit post form
     */
    public function edit($id) {
        try {
            $post = $this->Blog_model->get_post_by_id($id);
            
            if (!$post) {
                $this->session->set_flashdata('error', 'Artikel tidak ditemukan');
                redirect('admin/blog');
                return;
            }
            
            $data = [
                'title' => 'Edit Artikel',
                'post' => $post,
                'categories' => $this->_get_blog_categories()
            ];
            
            $this->render('blog/edit', $data);
            
        } catch (Exception $e) {
            log_message('error', 'Error loading blog post: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat memuat artikel');
            redirect('admin/blog');
        }
    }

    /**
     * Update blog post
     */
    public function update($id) {
        // Set validation rules
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('kategori_blog', 'Kategori', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
            return;
        }
        
        try {
            // Get existing post
            $existing_post = $this->Blog_model->get_post_by_id($id);
            if (!$existing_post) {
                $this->session->set_flashdata('error', 'Artikel tidak ditemukan');
                redirect('admin/blog');
                return;
            }
            
            // Generate slug from title
            $slug = $this->_generate_slug($this->input->post('judul'), $id);
            
            // Handle image upload
            $image_name = $existing_post->gambar_utama;
            if (!empty($_FILES['gambar_utama']['name'])) {
                $new_image = $this->_upload_image('gambar_utama');
                if ($new_image) {
                    // Delete old image
                    if ($image_name && file_exists('./uploads/blog/' . $image_name)) {
                        unlink('./uploads/blog/' . $image_name);
                    }
                    $image_name = $new_image;
                }
            }
            
            // Auto-generate excerpt if empty
            $excerpt = $this->input->post('excerpt');
            if (empty($excerpt)) {
                $excerpt = $this->_generate_excerpt($this->input->post('konten'));
            }
            
            // Prepare update data
            $post_data = [
                'judul' => $this->input->post('judul'),
                'slug' => $slug,
                'konten' => $this->input->post('konten'),
                'excerpt' => $excerpt,
                'kategori_blog' => $this->input->post('kategori_blog'),
                'gambar_utama' => $image_name,
                'is_published' => $this->input->post('is_published') ? 1 : 0
            ];
            
            // Update published_at if changing from draft to published
            if ($this->input->post('is_published') && !$existing_post->is_published) {
                $post_data['published_at'] = date('Y-m-d H:i:s');
            }
            
            // Update database
            $result = $this->Blog_model->update_post($id, $post_data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Artikel berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate artikel');
            }
            
            redirect('admin/blog');
            
        } catch (Exception $e) {
            log_message('error', 'Error updating blog post: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengupdate artikel');
            redirect('admin/blog/edit/' . $id);
        }
    }

    /**
     * Toggle publish status
     */
    public function toggle_publish($id) {
        try {
            $post = $this->Blog_model->get_post_by_id($id);
            
            if (!$post) {
                $this->session->set_flashdata('error', 'Artikel tidak ditemukan');
                redirect('admin/blog');
                return;
            }
            
            // Toggle status
            $new_status = $post->is_published ? 0 : 1;
            $update_data = [
                'is_published' => $new_status
            ];
            
            // Set published_at if publishing
            if ($new_status == 1 && !$post->published_at) {
                $update_data['published_at'] = date('Y-m-d H:i:s');
            }
            
            $result = $this->Blog_model->update_post($id, $update_data);
            
            if ($result) {
                $status_text = $new_status ? 'dipublikasikan' : 'dijadikan draft';
                $this->session->set_flashdata('success', 'Artikel berhasil ' . $status_text);
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah status artikel');
            }
            
        } catch (Exception $e) {
            log_message('error', 'Error toggling publish status: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengubah status');
        }
        
        redirect('admin/blog');
    }

    /**
     * Delete blog post
     */
    public function delete($id) {
        try {
            $post = $this->Blog_model->get_post_by_id($id);
            
            if (!$post) {
                $this->session->set_flashdata('error', 'Artikel tidak ditemukan');
                redirect('admin/blog');
                return;
            }
            
            // Delete image file
            if ($post->gambar_utama && file_exists('./uploads/blog/' . $post->gambar_utama)) {
                unlink('./uploads/blog/' . $post->gambar_utama);
            }
            
            // Delete from database
            $result = $this->Blog_model->delete_post($id);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Artikel berhasil dihapus');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus artikel');
            }
            
        } catch (Exception $e) {
            log_message('error', 'Error deleting blog post: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus artikel');
        }
        
        redirect('admin/blog');
    }

    /**
     * Private: Generate URL-friendly slug
     */
    private function _generate_slug($title, $exclude_id = null) {
        // Convert to lowercase and replace spaces with hyphens
        $slug = strtolower(trim($title));
        $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');
        
        // Check if slug exists
        $original_slug = $slug;
        $counter = 1;
        
        while ($this->Blog_model->slug_exists($slug, $exclude_id)) {
            $slug = $original_slug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }

    /**
     * Private: Upload blog image
     */
    private function _upload_image($field_name) {
        $config['upload_path'] = './uploads/blog/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 5120; // 5MB
        $config['file_name'] = 'blog_' . time() . '_' . rand(1000, 9999);
        
        // Create directory if not exists
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, true);
        }
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        }
        
        return false;
    }

    /**
     * Private: Generate excerpt from content
     */
    private function _generate_excerpt($content, $length = 150) {
        // Strip HTML tags
        $text = strip_tags($content);
        
        // Limit length
        if (strlen($text) > $length) {
            $text = substr($text, 0, $length);
            $text = substr($text, 0, strrpos($text, ' ')) . '...';
        }
        
        return $text;
    }

    /**
     * Private: Get blog categories
     */
    private function _get_blog_categories() {
        return [
            'Tips & Trik',
            'Perawatan Furniture',
            'Desain Interior',
            'Produk Terbaru',
            'Berita'
        ];
    }
}