<?php
/**
 * File: application/views/blog/index.php
 * Blog listing page - Updated with Home Style
 */
?>

<style>
/* ============================================
   BLOG INDEX STYLES - FURNI TEMPLATE
   ============================================ */

/* HERO SECTION - Matching Home */
.blog-hero {
    background: #3b5d50 !important;
    padding: 0 !important;
}

.hero-content {
    display: grid !important;
    grid-template-columns: 1fr 1fr !important;
    gap: 60px !important;
    align-items: center !important;
    padding: 20px 0 !important;
}

.hero-text h1 {
    font-size: 54px !important;
    font-weight: 700 !important;
    color: #ffffff !important;
    margin-bottom: 16px !important;
    line-height: 1.1 !important;
}

.hero-text p {
    font-size: 18px !important;
    color: rgba(255, 255, 255, 0.85) !important;
    margin-bottom: 0 !important;
    line-height: 1.6 !important;
}

.hero-image {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.hero-image img {
    max-width: 100% !important;
    height: auto !important;
    filter: drop-shadow(0 10px 30px rgba(0,0,0,0.3)) !important;
}

/* Breadcrumb */
.breadcrumb {
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    font-size: 14px !important;
    color: rgba(255, 255, 255, 0.9) !important;
    margin-top: 24px !important;
    flex-wrap: wrap !important;
}

.breadcrumb a {
    color: #ffffff !important;
    text-decoration: none !important;
    font-weight: 600 !important;
    transition: all 0.2s ease !important;
}

.breadcrumb a:hover {
    color: #f9bf29 !important;
}

.breadcrumb i {
    font-size: 10px !important;
    opacity: 0.7 !important;
}

.breadcrumb span {
    font-weight: 500 !important;
}

/* Blog Layout */
.blog-wrapper {
    background: #eff2f1 !important;
    padding: 50px 0 80px !important;
}

.blog-layout {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 40px;
}

.blog-main {
    flex: 1;
}

/* Blog Grid */
.blog-posts-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-bottom: 40px;
}

/* Blog Card - Matching Home Style */
.blog-card {
    background: #dce5e4 !important;
    border-radius: 10px !important;
    overflow: hidden !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
    border: none !important;
}

.blog-card:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0 12px 30px rgba(0,0,0,0.12) !important;
}

.blog-card-image {
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: #f3f4f6;
}

.blog-card-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    transition: transform 0.3s ease !important;
}

.blog-card:hover .blog-card-image img {
    transform: scale(1.05) !important;
}

.blog-card-content {
    padding: 24px !important;
}

.blog-category {
    display: inline-block;
    padding: 6px 14px;
    background: #3b5d50 !important;
    color: #ffffff !important;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.blog-card-title {
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 12px !important;
    line-height: 1.4 !important;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.blog-excerpt {
    font-size: 14px !important;
    color: #6a6a6a !important;
    line-height: 1.6 !important;
    margin-bottom: 16px !important;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.blog-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 16px;
    border-top: 1px solid rgba(59, 93, 80, 0.15);
    font-size: 12px !important;
    color: #6a6a6a !important;
}

.blog-date,
.blog-views {
    display: flex;
    align-items: center;
    gap: 6px;
}

.read-more {
    color: #3b5d50 !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 6px !important;
    margin-top: 12px !important;
    font-size: 14px !important;
}

/* Sidebar - Matching Home Style */
.blog-sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.sidebar-widget {
    background: white !important;
    border-radius: 18px !important;
    padding: 24px !important;
    margin-bottom: 24px !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06) !important;
    border: none !important;
}

.sidebar-widget h3 {
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 20px !important;
    padding-bottom: 12px !important;
    border-bottom: 2px solid #eff2f1 !important;
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
}

.sidebar-widget h3 i {
    color: #3b5d50 !important;
}

/* Search Box */
.search-box {
    position: relative;
}

.search-box input {
    width: 100%;
    padding: 12px 50px 12px 18px;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    font-size: 14px;
}

.search-box input:focus {
    outline: none;
    border-color: #3b5d50;
}

.search-box button {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: #3b5d50 !important;
    color: white;
    border: none;
    width: 42px;
    height: 42px;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.search-box button:hover {
    background: #2d4840 !important;
}

/* Category List */
.category-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-list li {
    margin-bottom: 8px;
}

.category-list a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    color: #2f2f2f;
    text-decoration: none;
    border-radius: 10px;
    transition: all 0.2s ease;
    font-weight: 500;
    font-size: 14px;
    border: 1px solid transparent;
}

.category-list a:hover {
    background: #dce5e4;
    border-color: rgba(59, 93, 80, 0.2);
    transform: translateX(4px);
}

.category-count {
    background: rgba(59, 93, 80, 0.1) !important;
    color: #3b5d50 !important;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 700;
}

/* Recent Posts */
.recent-post-item {
    display: flex;
    gap: 12px;
    margin-bottom: 16px;
    padding-bottom: 16px;
    border-bottom: 1px solid #eff2f1;
}

.recent-post-item:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.recent-post-image {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
}

.recent-post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.recent-post-content {
    flex: 1;
}

.recent-post-content h4 {
    font-size: 14px;
    font-weight: 600;
    color: #2f2f2f;
    margin-bottom: 6px;
    line-height: 1.4;
}

.recent-post-content a {
    text-decoration: none;
    color: #2f2f2f;
}

.recent-post-content a:hover {
    color: #3b5d50;
}

.recent-post-date {
    font-size: 12px;
    color: #6a6a6a;
    display: flex;
    align-items: center;
    gap: 4px;
}

/* Empty State */
.empty-state {
    background: white;
    border-radius: 18px;
    padding: 80px 40px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.empty-icon {
    width: 120px;
    height: 120px;
    margin: 0 auto 24px;
    background: #dce5e4;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-icon i {
    font-size: 56px;
    color: #3b5d50;
}

.empty-state h3 {
    font-size: 24px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 12px;
}

.empty-state p {
    font-size: 16px;
    color: #6a6a6a;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .blog-layout {
        grid-template-columns: 1fr;
    }
    
    .blog-sidebar {
        position: relative;
        top: 0;
    }
    
    .blog-posts-grid {
        grid-template-columns: 1fr;
    }
    
    .hero-content {
        gap: 40px !important;
    }
}

@media (max-width: 768px) {
    .hero-content {
        grid-template-columns: 1fr !important;
        text-align: center !important;
        padding: 40px 0 !important;
    }
    
    .hero-text h1 {
        font-size: 32px !important;
    }
    
    .hero-text p {
        font-size: 15px !important;
    }
    
    .hero-image {
        order: -1 !important;
        margin-bottom: 20px !important;
    }
    
    .breadcrumb {
        justify-content: center !important;
    }
    
    .blog-wrapper {
        padding: 40px 0 60px !important;
    }
}
</style>

<!-- Blog Hero Section - Matching Home Style -->
<div class="blog-hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1><?= isset($title) ? $title : 'Blog & Artikel' ?></h1>
                <p>Temukan berbagai artikel, tips, dan informasi seputar furniture, desain interior, dan inspirasi untuk hunian Anda</p>
                
                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <a href="<?= base_url() ?>">
                        <i class="fas fa-home"></i> Home
                    </a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Blog</span>
                </div>
            </div>
            
            <div class="hero-image">
                <img src="<?= base_url('assets/images/rehap-hero.png') ?>" 
                     alt="Blog Furniture" 
                     onerror="this.src='https://via.placeholder.com/600x400/3b5d50/ffffff?text=Blog+%26+Artikel'">
            </div>
        </div>
    </div>
</div>

<!-- Blog Content -->
<div class="blog-wrapper">
    <div class="container">
        <div class="blog-layout">
            <!-- Main Content -->
            <div class="blog-main">
                <?php if (!empty($posts)): ?>
                    <div class="blog-posts-grid">
                        <?php foreach ($posts as $post): ?>
                        <a href="<?= base_url('blog/detail/' . $post->slug) ?>" class="blog-card">
                            <div class="blog-card-image">
                                <?php if (!empty($post->gambar_utama)): ?>
                                    <img src="<?= base_url('uploads/blog/' . $post->gambar_utama) ?>" alt="<?= htmlspecialchars($post->judul) ?>">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x220/eff2f1/6a6a6a?text=Blog+Post" alt="<?= htmlspecialchars($post->judul) ?>">
                                <?php endif; ?>
                            </div>
                            <div class="blog-card-content">
                                <?php if (!empty($post->kategori_blog)): ?>
                                    <span class="blog-category"><?= htmlspecialchars($post->kategori_blog) ?></span>
                                <?php endif; ?>
                                
                                <h3 class="blog-card-title"><?= htmlspecialchars($post->judul) ?></h3>
                                
                                <?php if (!empty($post->excerpt)): ?>
                                    <p class="blog-excerpt"><?= htmlspecialchars($post->excerpt) ?></p>
                                <?php endif; ?>
                                
                                <div class="blog-meta">
                                    <span class="blog-date">
                                        <i class="fas fa-calendar"></i>
                                        <?php 
                                        if (!empty($post->published_at) && $post->published_at != '0000-00-00 00:00:00') {
                                            echo date('d M Y', strtotime($post->published_at));
                                        } else if (!empty($post->created_at)) {
                                            echo date('d M Y', strtotime($post->created_at));
                                        } else {
                                            echo '01 Jan 1970';
                                        }
                                        ?>
                                    </span>
                                    
                                </div>
                                
                                <span class="read-more">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    
                    <?php if (!empty($pagination)): ?>
                        <?= $pagination ?>
                    <?php endif; ?>
                    
                <?php else: ?>
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3>Belum Ada Artikel</h3>
                        <p>Artikel blog akan segera ditampilkan di sini</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Sidebar -->
            <aside class="blog-sidebar">
                <!-- Search Widget -->
                <div class="sidebar-widget">
                    <h3>
                        <i class="fas fa-search"></i>
                        Cari Artikel
                    </h3>
                    <form action="<?= base_url('blog/search') ?>" method="get" class="search-box">
                        <input type="text" name="q" placeholder="Cari artikel..." value="<?= isset($keyword) ? htmlspecialchars($keyword) : '' ?>">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                
                <!-- Categories Widget -->
                <?php if (!empty($categories)): ?>
                <div class="sidebar-widget">
                    <h3>
                        <i class="fas fa-folder"></i>
                        Kategori
                    </h3>
                    <ul class="category-list">
                        <?php foreach ($categories as $cat): ?>
                        <li>
                            <a href="<?= base_url('blog?category=' . urlencode($cat->category)) ?>">
                                <span><?= htmlspecialchars($cat->category) ?></span>
                                <span class="category-count"><?= $cat->post_count ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                
                <!-- Recent Posts Widget -->
                <?php if (!empty($recent_posts)): ?>
                <div class="sidebar-widget">
                    <h3>
                        <i class="fas fa-clock"></i>
                        Artikel Terbaru
                    </h3>
                    <?php foreach ($recent_posts as $recent): ?>
                    <div class="recent-post-item">
                        <div class="recent-post-image">
                            <?php if (!empty($recent->gambar_utama)): ?>
                                <img src="<?= base_url('uploads/blog/' . $recent->gambar_utama) ?>" alt="<?= htmlspecialchars($recent->judul) ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/80x80/eff2f1/6a6a6a?text=No+Image" alt="<?= htmlspecialchars($recent->judul) ?>">
                            <?php endif; ?>
                        </div>
                        <div class="recent-post-content">
                            <h4>
                                <a href="<?= base_url('blog/detail/' . $recent->slug) ?>">
                                    <?= htmlspecialchars($recent->judul) ?>
                                </a>
                            </h4>
                            <p class="recent-post-date">
                                <i class="fas fa-calendar"></i>
                                <?php 
                                if (!empty($recent->published_at) && $recent->published_at != '0000-00-00 00:00:00') {
                                    echo date('d M Y', strtotime($recent->published_at));
                                } else {
                                    echo date('d M Y', strtotime($recent->created_at));
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</div>