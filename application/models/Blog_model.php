<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Blog Model - FIXED VERSION
 * Sesuai dengan struktur database blog_posts
 */

class Blog_model extends CI_Model {

    private $table = 'blog_posts';

    /**
     * Get all blog posts with optional search
     */
    public function get_all_posts($search = null) {
        $this->db->select('bp.*, u.nama_lengkap as author_name');
        $this->db->from($this->table . ' bp');
        $this->db->join('users u', 'bp.id_author = u.id', 'left');
        
        if ($search) {
            $this->db->group_start();
            $this->db->like('bp.judul', $search);
            $this->db->or_like('bp.konten', $search);
            $this->db->or_like('bp.kategori_blog', $search);
            $this->db->group_end();
        }
        
        $this->db->order_by('bp.created_at', 'DESC');
        
        return $this->db->get()->result();
    }

    /**
     * Get all (alias for backward compatibility)
     */
    public function get_all($search = null) {
        return $this->get_all_posts($search);
    }

    /**
     * Get blog post by ID
     */
    public function get_post_by_id($id) {
        $this->db->select('bp.*, u.nama_lengkap as author_name');
        $this->db->from($this->table . ' bp');
        $this->db->join('users u', 'bp.id_author = u.id', 'left');
        $this->db->where('bp.id', $id);
        
        return $this->db->get()->row();
    }

    /**
     * Get by ID (alias)
     */
    public function get_by_id($id) {
        return $this->get_post_by_id($id);
    }

    /**
     * Get blog post by slug
     */
    public function get_post_by_slug($slug) {
        $this->db->select('bp.*, u.nama_lengkap as author_name');
        $this->db->from($this->table . ' bp');
        $this->db->join('users u', 'bp.id_author = u.id', 'left');
        $this->db->where('bp.slug', $slug);
        
        return $this->db->get()->row();
    }

    /**
     * Get published posts for public view
     */
    public function get_published_posts($limit = null, $offset = 0, $category = null) {
        $this->db->select('bp.*, u.nama_lengkap as author_name');
        $this->db->from($this->table . ' bp');
        $this->db->join('users u', 'bp.id_author = u.id', 'left');
        $this->db->where('bp.is_published', 1);
        
        if ($category) {
            $this->db->where('bp.kategori_blog', $category);
        }
        
        $this->db->order_by('bp.published_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Get recent posts
     */
    public function get_recent_posts($limit = 5) {
        $this->db->select('bp.*, u.nama_lengkap as author_name');
        $this->db->from($this->table . ' bp');
        $this->db->join('users u', 'bp.id_author = u.id', 'left');
        $this->db->where('bp.is_published', 1);
        $this->db->order_by('bp.published_at', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }

    /**
     * Get popular posts by view count
     */
    public function get_popular_posts($limit = 5) {
        $this->db->select('bp.*, u.nama_lengkap as author_name');
        $this->db->from($this->table . ' bp');
        $this->db->join('users u', 'bp.id_author = u.id', 'left');
        $this->db->where('bp.is_published', 1);
        $this->db->order_by('bp.view_count', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }

    /**
     * Get posts by category
     */
    public function get_posts_by_category($category, $limit = null) {
        $this->db->select('bp.*, u.nama_lengkap as author_name');
        $this->db->from($this->table . ' bp');
        $this->db->join('users u', 'bp.id_author = u.id', 'left');
        $this->db->where('bp.kategori_blog', $category);
        $this->db->where('bp.is_published', 1);
        $this->db->order_by('bp.published_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit);
        }
        
        return $this->db->get()->result();
    }

    /**
     * Get blog statistics - FIXED
     */
    public function get_statistics() {
        $stats = new stdClass();
        
        // Total posts
        $stats->total_posts = $this->db->count_all($this->table);
        
        // Published posts
        $this->db->where('is_published', 1);
        $stats->published_posts = $this->db->count_all_results($this->table);
        
        // Draft posts
        $this->db->where('is_published', 0);
        $stats->draft_posts = $this->db->count_all_results($this->table);
        
        // Total views - FIXED: gunakan view_count bukan views
        $this->db->select_sum('view_count');
        $result = $this->db->get($this->table)->row();
        $stats->total_views = $result->view_count ? (int)$result->view_count : 0;
        
        // Format total views
        if ($stats->total_views >= 1000) {
            $stats->total_views_formatted = number_format($stats->total_views / 1000, 1) . 'K';
        } else {
            $stats->total_views_formatted = $stats->total_views;
        }
        
        return $stats;
    }

    /**
     * Get category list with post count
     */
    public function get_categories_with_count() {
        $this->db->select('kategori_blog as category, COUNT(*) as post_count');
        $this->db->where('is_published', 1);
        $this->db->where('kategori_blog IS NOT NULL');
        $this->db->group_by('kategori_blog');
        $this->db->order_by('post_count', 'DESC');
        
        return $this->db->get($this->table)->result();
    }

    /**
     * Create new blog post
     */
    public function create_post($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * Insert (alias)
     */
    public function insert($data) {
        return $this->create_post($data);
    }

    /**
     * Update blog post - FIXED
     */
    public function update_post($id, $data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Update (alias)
     */
    public function update($id, $data) {
        return $this->update_post($id, $data);
    }

    /**
     * Delete blog post
     */
    public function delete_post($id) {
        // Get post first to delete image
        $post = $this->get_post_by_id($id);
        
        if ($post && $post->gambar_utama) {
            $image_path = './uploads/blog/' . $post->gambar_utama;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Delete (alias)
     */
    public function delete($id) {
        return $this->delete_post($id);
    }

    /**
     * Check if slug exists
     */
    public function slug_exists($slug, $exclude_id = null) {
        $this->db->where('slug', $slug);
        
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        
        return $this->db->count_all_results($this->table) > 0;
    }

    /**
     * Increment view count
     */
    public function increment_view($id) {
        $this->db->set('view_count', 'view_count + 1', FALSE);
        $this->db->where('id', $id);
        return $this->db->update($this->table);
    }

    /**
     * Search posts
     */
    public function search_posts($keyword, $limit = 10) {
        $this->db->select('bp.*, u.nama_lengkap as author_name');
        $this->db->from($this->table . ' bp');
        $this->db->join('users u', 'bp.id_author = u.id', 'left');
        $this->db->where('bp.is_published', 1);
        
        $this->db->group_start();
        $this->db->like('bp.judul', $keyword);
        $this->db->or_like('bp.konten', $keyword);
        $this->db->or_like('bp.excerpt', $keyword);
        $this->db->group_end();
        
        $this->db->order_by('bp.published_at', 'DESC');
        $this->db->limit($limit);
        
        return $this->db->get()->result();
    }

    /**
     * Count posts
     */
    public function count_posts($published_only = false) {
        if ($published_only) {
            $this->db->where('is_published', 1);
        }
        
        return $this->db->count_all_results($this->table);
    }
}