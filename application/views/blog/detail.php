<?php
/**
 * File: application/views/blog/detail.php
 * Blog detail page - Updated with consistent style
 */
?>

<style>
/* ============================================
   BLOG DETAIL STYLES - FURNI TEMPLATE
   ============================================ */

/* HERO SECTION - Matching Blog Index */
.blog-detail-hero {
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
    font-size: 42px !important;
    font-weight: 700 !important;
    color: #ffffff !important;
    margin-bottom: 20px !important;
    line-height: 1.2 !important;
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
    margin-bottom: 20px !important;
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

/* Post Category Badge */
.post-category {
    display: inline-block !important;
    padding: 6px 14px !important;
    background: #f9bf29 !important;
    color: #2f2f2f !important;
    border-radius: 20px !important;
    font-size: 11px !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    margin-bottom: 16px !important;
}

/* Post Meta */
.post-meta {
    display: flex !important;
    gap: 24px !important;
    font-size: 14px !important;
    color: rgba(255, 255, 255, 0.85) !important;
    flex-wrap: wrap !important;
}

.post-meta-item {
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
}

.post-meta-item i {
    opacity: 0.8 !important;
}

/* Blog Content Wrapper */
.blog-content-wrapper {
    background: #eff2f1 !important;
    padding: 50px 0 80px !important;
}

.post-content-wrapper {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 40px;
}

/* Post Main Content */
.post-main {
    background: white !important;
    border-radius: 18px !important;
    padding: 0 !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06) !important;
    overflow: hidden !important;
}

/* Featured Image - Centered at Top */
.post-featured-image {
    width: 100% !important;
    height: 500px !important;
    overflow: hidden !important;
    margin: 0 !important;
    background: #f3f4f6 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.post-featured-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
}

/* Post Content Body */
.post-content-body {
    padding: 50px !important;
}

.post-content {
    font-size: 17px !important;
    line-height: 1.8 !important;
    color: #2f2f2f !important;
}

.post-content h2 {
    font-size: 32px !important;
    font-weight: 700 !important;
    margin: 40px 0 20px !important;
    color: #2f2f2f !important;
}

.post-content h3 {
    font-size: 24px !important;
    font-weight: 700 !important;
    margin: 30px 0 15px !important;
    color: #2f2f2f !important;
}

.post-content h4 {
    font-size: 20px !important;
    font-weight: 700 !important;
    margin: 25px 0 12px !important;
    color: #2f2f2f !important;
}

.post-content p {
    margin-bottom: 20px !important;
    color: #2f2f2f !important;
}

.post-content ul,
.post-content ol {
    margin: 20px 0 !important;
    padding-left: 30px !important;
}

.post-content li {
    margin-bottom: 10px !important;
    color: #2f2f2f !important;
}

.post-content img {
    max-width: 100% !important;
    height: auto !important;
    border-radius: 12px !important;
    margin: 30px 0 !important;
    display: block !important;
}

.post-content blockquote {
    border-left: 4px solid #3b5d50 !important;
    padding: 20px 30px !important;
    background: rgba(59, 93, 80, 0.05) !important;
    margin: 30px 0 !important;
    font-style: italic !important;
    color: #6a6a6a !important;
    border-radius: 0 8px 8px 0 !important;
}

.post-content a {
    color: #3b5d50 !important;
    text-decoration: underline !important;
}

.post-content a:hover {
    color: #2d4840 !important;
}

/* Post Tags */
.post-tags {
    display: flex !important;
    flex-wrap: wrap !important;
    gap: 10px !important;
    margin-top: 40px !important;
    padding-top: 30px !important;
    border-top: 2px solid #eff2f1 !important;
}

.post-tag {
    padding: 8px 16px !important;
    background: rgba(59, 93, 80, 0.1) !important;
    color: #3b5d50 !important;
    border-radius: 20px !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    text-decoration: none !important;
    transition: all 0.2s ease !important;
}

.post-tag:hover {
    background: #3b5d50 !important;
    color: white !important;
}

/* Post Author */
.post-author {
    display: flex !important;
    align-items: center !important;
    gap: 16px !important;
    padding: 24px !important;
    background: #dce5e4 !important;
    border-radius: 15px !important;
    margin-top: 40px !important;
}

.author-avatar {
    width: 64px !important;
    height: 64px !important;
    border-radius: 50% !important;
    background: #3b5d50 !important;
    color: white !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 28px !important;
    font-weight: 700 !important;
    flex-shrink: 0 !important;
}

.author-info h4 {
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 4px !important;
}

.author-info p {
    font-size: 14px !important;
    color: #6a6a6a !important;
    margin: 0 !important;
}

/* Back Button */
.back-to-blog {
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    padding: 12px 28px !important;
    background: transparent !important;
    color: #3b5d50 !important;
    border: 2px solid #3b5d50 !important;
    border-radius: 30px !important;
    text-decoration: none !important;
    font-weight: 600 !important;
    margin-top: 30px !important;
    transition: all 0.2s ease !important;
}

.back-to-blog:hover {
    background: #3b5d50 !important;
    color: white !important;
}

/* Sidebar */
.post-sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.sidebar-card {
    background: white !important;
    border-radius: 18px !important;
    padding: 24px !important;
    margin-bottom: 24px !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06) !important;
}

.sidebar-card h3 {
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

.sidebar-card h3 i {
    color: #3b5d50 !important;
}

/* Share Buttons */
.share-buttons {
    display: flex !important;
    flex-direction: column !important;
    gap: 10px !important;
}

.share-btn {
    padding: 12px 20px !important;
    border-radius: 10px !important;
    border: none !important;
    color: white !important;
    cursor: pointer !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 10px !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    text-decoration: none !important;
    transition: all 0.2s ease !important;
}

.share-btn.facebook {
    background: #1877f2 !important;
}

.share-btn.twitter {
    background: #1da1f2 !important;
}

.share-btn.whatsapp {
    background: #25d366 !important;
}

.share-btn:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15) !important;
}

/* Related Posts */
.related-post-item {
    display: flex !important;
    gap: 12px !important;
    padding-bottom: 16px !important;
    margin-bottom: 16px !important;
    border-bottom: 1px solid #eff2f1 !important;
}

.related-post-item:last-child {
    border-bottom: none !important;
    margin-bottom: 0 !important;
    padding-bottom: 0 !important;
}

.related-post-image {
    width: 90px !important;
    height: 90px !important;
    border-radius: 10px !important;
    overflow: hidden !important;
    flex-shrink: 0 !important;
    background: #f3f4f6 !important;
}

.related-post-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
}

.related-post-content {
    flex: 1 !important;
}

.related-post-content h4 {
    font-size: 14px !important;
    font-weight: 600 !important;
    line-height: 1.4 !important;
    margin-bottom: 8px !important;
}

.related-post-content a {
    color: #2f2f2f !important;
    text-decoration: none !important;
}

.related-post-content a:hover {
    color: #3b5d50 !important;
}

.related-post-date {
    font-size: 12px !important;
    color: #6a6a6a !important;
    display: flex !important;
    align-items: center !important;
    gap: 4px !important;
}

/* Table of Contents */
.toc-card {
    background: #dce5e4 !important;
}

.toc-list {
    list-style: none !important;
    padding: 0 !important;
    margin: 0 !important;
}

.toc-list li {
    margin-bottom: 8px !important;
}

.toc-list a {
    display: block !important;
    padding: 10px 14px !important;
    color: #2f2f2f !important;
    text-decoration: none !important;
    border-radius: 8px !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    transition: all 0.2s ease !important;
}

.toc-list a:hover {
    background: rgba(59, 93, 80, 0.1) !important;
    color: #3b5d50 !important;
    transform: translateX(4px) !important;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .post-content-wrapper {
        grid-template-columns: 1fr;
    }
    
    .post-sidebar {
        position: relative;
        top: 0;
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
        font-size: 28px !important;
    }
    
    .hero-image {
        order: -1 !important;
        margin-bottom: 20px !important;
    }
    
    .breadcrumb {
        justify-content: center !important;
    }
    
    .post-meta {
        justify-content: center !important;
    }
    
    .post-content-body {
        padding: 30px 20px !important;
    }
    
    .post-featured-image {
        height: 300px !important;
    }
    
    .post-content {
        font-size: 16px !important;
    }
    
    .post-content h2 {
        font-size: 24px !important;
    }
    
    .post-content h3 {
        font-size: 20px !important;
    }
    
    .blog-content-wrapper {
        padding: 40px 0 60px !important;
    }
}
</style>

<!-- Blog Detail Hero Section -->
<div class="blog-detail-hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <a href="<?= base_url() ?>">
                        <i class="fas fa-home"></i> Home
                    </a>
                    <i class="fas fa-chevron-right"></i>
                    <a href="<?= base_url('blog') ?>">Blog</a>
                    <i class="fas fa-chevron-right"></i>
                    <span><?= htmlspecialchars($post->judul) ?></span>
                </div>
                
                <?php if (!empty($post->kategori_blog)): ?>
                    <span class="post-category"><?= htmlspecialchars($post->kategori_blog) ?></span>
                <?php endif; ?>
                
                <h1><?= htmlspecialchars($post->judul) ?></h1>
                
                <div class="post-meta">
                    <div class="post-meta-item">
                        <i class="fas fa-user"></i>
                        <span><?= isset($post->author_name) ? htmlspecialchars($post->author_name) : 'Admin' ?></span>
                    </div>
                    <div class="post-meta-item">
                        <i class="fas fa-calendar"></i>
                        <span>
                            <?php 
                            if (!empty($post->published_at) && $post->published_at != '0000-00-00 00:00:00') {
                                echo date('d M Y', strtotime($post->published_at));
                            } else if (!empty($post->created_at)) {
                                echo date('d M Y', strtotime($post->created_at));
                            } else {
                                echo date('d M Y');
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Content -->
<div class="blog-content-wrapper">
    <div class="container">
            <!-- Main Content -->
            <article class="post-main">
                <!-- Featured Image - Centered at Top -->
                <?php if (!empty($post->gambar_utama)): ?>
                <div class="post-featured-image">
                    <img src="<?= base_url('uploads/blog/' . $post->gambar_utama) ?>" alt="<?= htmlspecialchars($post->judul) ?>">
                </div>
                <?php endif; ?>
                
                <!-- Post Content Body -->
                <div class="post-content-body">
                    <div class="post-content">
                        <?= $post->konten ?>
                    </div>
                    
                    <!-- Post Tags -->
                    <?php if (!empty($post->tags)): ?>
                    <div class="post-tags">
                        <?php 
                        $tags = explode(',', $post->tags);
                        foreach ($tags as $tag): 
                        ?>
                        <a href="<?= base_url('blog?tag=' . urlencode(trim($tag))) ?>" class="post-tag">
                            #<?= htmlspecialchars(trim($tag)) ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Post Author -->
                    <?php if (!empty($post->author_name)): ?>
                    <div class="post-author">
                        <div class="author-avatar">
                            <?= strtoupper(substr($post->author_name, 0, 1)) ?>
                        </div>
                        <div class="author-info">
                            <h4><?= htmlspecialchars($post->author_name) ?></h4>
                            <p>Penulis Artikel</p>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Back Button -->
                    <a href="<?= base_url('blog') ?>" class="back-to-blog">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke Blog
                    </a>
                </div>
            </article>
        </div>
    </div>
</div>