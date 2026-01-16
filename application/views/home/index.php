<?php
/**
 * File: application/views/home/index.php
 * Homepage - Furni Template
 * Clean & Optimized Version
 */
?>

<style>
/* ============================================
   HOMEPAGE STYLES - FURNI TEMPLATE
   ============================================ */

/* HERO SECTION */
.hero-section {
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
    margin-bottom: 20px !important;
    line-height: 1.1 !important;
}

.hero-text p {
    font-size: 18px !important;
    color: rgba(255, 255, 255, 0.8) !important;
    margin-bottom: 35px !important;
    line-height: 1.6 !important;
}

.hero-buttons {
    display: flex !important;
    gap: 15px !important;
    flex-wrap: wrap !important;
}

.hero-image img {
    max-width: 100% !important;
    height: auto !important;
    filter: drop-shadow(0 10px 30px rgba(0,0,0,0.3)) !important;
}

/* BUTTONS */
.btn {
    padding: 14px 35px !important;
    border-radius: 30px !important;
    font-weight: 600 !important;
    font-size: 16px !important;
    text-decoration: none !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 10px !important;
    transition: all 0.3s ease !important;
    border: none !important;
    cursor: pointer !important;
}

.btn-primary {
    background: #f9bf29 !important;
    color: #2f2f2f !important;
}

.btn-primary:hover {
    background: #e6ac1a !important;
}

.btn-outline-white {
    background: transparent !important;
    color: #ffffff !important;
    border: 2px solid rgba(255, 255, 255, 0.5) !important;
}

.btn-outline-white:hover {
    background: rgba(255, 255, 255, 0.1) !important;
    border-color: #ffffff !important;
}

.btn-outline-primary {
    background: transparent !important;
    color: #3b5d50 !important;
    border: 2px solid #3b5d50 !important;
}

.btn-outline-primary:hover {
    background: #3b5d50 !important;
    color: #ffffff !important;
}

.btn-success {
    background: #3b5d50 !important;
    color: #ffffff !important;
}

.btn-success:hover {
    background: #2d4840 !important;
}

.btn-sm {
    padding: 10px 24px !important;
    font-size: 14px !important;
}

/* SECTIONS */
.section-title {
    font-size: 40px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 40px !important;
    text-align: center !important;
}

.section-header {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    margin-bottom: 40px !important;
}

.view-all {
    color: #3b5d50 !important;
    font-weight: 600 !important;
    text-decoration: underline !important;
}

/* FEATURES SECTION */
.features-section {
    padding: 80px 0 !important;
    background: #ffffff !important;
}

.features-section .container {
    background: #ffffff !important;
    padding: 0 !important;
}

.features-grid {
    display: grid !important;
    grid-template-columns: repeat(4, 1fr) !important;
    gap: 40px !important;
}

.feature-card {
    background: #dce5e4 !important;
    text-align: center !important;
}

.feature-card i {
    font-size: 24px !important;
    color: #3b5d50 !important;
    background: transparent !important;
    width: auto !important;
    height: auto !important;
    margin: 0 !important;
    display: inline !important;
    
}

.feature-card h3 {
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 10px !important;
}

.feature-card p {
    font-size: 14px !important;
    color: #6a6a6a !important;
    line-height: 1.6 !important;
    margin: 0 !important;
}

/* PRODUCTS SECTION */
.products-section {
    padding: 80px 0 !important;
    background: #eff2f1 !important;
}

.products-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 30px !important;
}

.product-card {
    background: transparent !important;
    border: none !important;
    text-align: center !important;
}

.product-image {
    width: 100% !important;
    height: 350px !important;
    overflow: hidden !important;
    margin-bottom: 20px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
}

.product-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    transition: transform 0.3s ease !important;
}

.product-card:hover .product-image img {
    transform: scale(1.05) !important;
}

.product-info h3 {
    font-size: 16px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
}

.product-price {
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 15px !important;
}

.product-meta {
    display: flex !important;
    gap: 12px !important;
    justify-content: center !important;
    margin-bottom: 15px !important;
    font-size: 12px !important;
    color: #6a6a6a !important;
}

.product-actions {
    display: flex !important;
    gap: 10px !important;
    justify-content: center !important;
}

.product-actions .btn {
    flex: 1 !important;
    max-width: 150px !important;
}

.badge {
    position: absolute !important;
    top: 10px !important;
    right: 10px !important;
    padding: 5px 12px !important;
    border-radius: 15px !important;
    font-size: 11px !important;
    font-weight: 600 !important;
}

.badge-warning {
    background: #f9bf29 !important;
    color: #2f2f2f !important;
}

.badge-danger {
    background: #dc3545 !important;
    color: #ffffff !important;
}

/* CATEGORIES SECTION */
.categories-section {
    padding: 80px 0 !important;
    background: #ffffff !important;
}

.categories-grid {
    display: grid !important;
    grid-template-columns: repeat(4, 1fr) !important;
    gap: 30px !important;
}

.category-card {
    background: #dce5e4 !important;
    border: none !important;
    border-radius: 10px !important;
    padding: 40px 30px !important;
    text-align: center !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}

.category-card:hover {
    background: #3b5d50 !important;
}

.category-card i {
    font-size: 40px !important;
    color: #3b5d50 !important;
    margin-bottom: 20px !important;
    display: block !important;
    transition: all 0.3s ease !important;
}

.category-card:hover i {
    color: #ffffff !important;
}

.category-card h3 {
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 8px !important;
    transition: all 0.3s ease !important;
}

.category-card:hover h3 {
    color: #ffffff !important;
}

.category-card p {
    font-size: 14px !important;
    color: #6a6a6a !important;
    margin: 0 !important;
    transition: all 0.3s ease !important;
}

.category-card:hover p {
    color: rgba(255, 255, 255, 0.8) !important;
}

/* TESTIMONIALS SECTION */
.testimonials-section {
    padding: 80px 0 !important;
    background: #eff2f1 !important;
}

.testimonials-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 30px !important;
}

.testimonial-card {
    background: #ffffff !important;
    border-radius: 10px !important;
    padding: 30px !important;
    border: none !important;
}

.rating {
    display: flex !important;
    gap: 4px !important;
    margin-bottom: 15px !important;
}

.rating i {
    color: #ddd !important;
    font-size: 16px !important;
}

.rating i.active {
    color: #f9bf29 !important;
}

.testimonial-card h4 {
    font-size: 16px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 12px !important;
}

.testimonial-card p {
    font-size: 14px !important;
    color: #6a6a6a !important;
    line-height: 1.7 !important;
}

.testimonial-author {
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    padding-top: 15px !important;
    border-top: 1px solid #eff2f1 !important;
}

.testimonial-author img {
    width: 40px !important;
    height: 40px !important;
    border-radius: 50% !important;
    object-fit: cover !important;
}

.testimonial-author strong {
    display: block !important;
    font-size: 14px !important;
    font-weight: 600 !important;
    color: #2f2f2f !important;
}

.testimonial-author small {
    display: block !important;
    font-size: 12px !important;
    color: #6a6a6a !important;
}

/* BLOG SECTION */
.blog-section {
    padding: 80px 0 !important;
    background: #ffffff !important;
}

.blog-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 30px !important;
}

.blog-card {
    background: #dce5e4 !important;
    border-radius: 10px !important;
    overflow: hidden !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}

.blog-card:hover {
    transform: translateY(-5px) !important;
}

.blog-card img {
    width: 100% !important;
    height: 200px !important;
    object-fit: cover !important;
}

.blog-content {
    padding: 20px !important;
}

.blog-content h3 {
    font-size: 16px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 10px !important;
}

.blog-date {
    font-size: 12px !important;
    color: #6a6a6a !important;
    display: flex !important;
    align-items: center !important;
    gap: 5px !important;
}

/* RESPONSIVE */
@media (max-width: 1200px) {
    .hero-text h1 {
        font-size: 44px !important;
    }
    
    .features-grid,
    .categories-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
    
    .products-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

@media (max-width: 992px) {
    .hero-content {
        grid-template-columns: 1fr !important;
        text-align: center !important;
    }
    
    .hero-image {
        order: -1 !important;
    }
    
    .hero-buttons {
        justify-content: center !important;
    }
    
    .testimonials-grid,
    .blog-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

@media (max-width: 768px) {
    .hero-text h1 {
        font-size: 32px !important;
    }
    
    .features-grid,
    .categories-grid,
    .products-grid,
    .testimonials-grid,
    .blog-grid {
        grid-template-columns: 1fr !important;
    }
    
    .features-section,
    .products-section,
    .categories-section,
    .testimonials-section,
    .blog-section {
        padding: 50px 0 !important;
    }
}
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Jepara Indah Furniture Padang</h1>
                <p>Furniture kayu berkualitas tinggi dengan desain elegan dan tahan lama. Melayani pembuatan custom dan layanan rehap furniture.</p>
                <div class="hero-buttons">
                    <a href="<?= base_url('product') ?>" class="btn btn-primary">
                        <i class="fas fa-shopping-bag"></i>
                        Lihat Produk
                    </a>
                    <a href="<?= base_url('rehap') ?>" class="btn btn-outline-white">
                        <i class="fas fa-tools"></i>
                        Layanan Rehap
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img src="<?= base_url('assets/images/rehap-hero.png') ?>" alt="Jepara Furniture" 
                     onerror="this.src='https://via.placeholder.com/600x400/3b5d50/ffffff?text=Jepara+Furniture'">
            </div>
        </div>
    </div>
</div>

<!-- Why Choose Us -->
<section class="features-section">
    <div class="container">
        <h2 class="section-title">Mengapa Memilih Kami?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="icon-wrapper">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3>Kualitas Terjamin</h3>
                <p>Furniture berkualitas tinggi dengan bahan pilihan terbaik dari Jepara</p>
            </div>
            <div class="feature-card">
                <div class="icon-wrapper">
                    <i class="fas fa-tools"></i>
                </div>
                <h3>Layanan Rehap</h3>
                <p>Perbaikan dan renovasi furniture lama Anda dengan hasil maksimal</p>
            </div>
            <div class="feature-card">
                <div class="icon-wrapper">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <h3>Custom Design</h3>
                <p>Pembuatan furniture sesuai keinginan dan kebutuhan Anda</p>
            </div>
            <div class="feature-card">
                <div class="icon-wrapper">
                    <i class="fas fa-shipping-fast"></i>
                </div>
                <h3>Pengiriman Aman</h3>
                <p>Packing rapi dan pengiriman ke seluruh Indonesia dengan aman</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="products-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Produk Unggulan</h2>
            <a href="<?= base_url('product') ?>" class="btn btn-success btn-sm">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="products-grid">
            <?php if (!empty($featured_products)): ?>
                <?php 
                // FIX: Limit to 6 products only
                $limited_products = array_slice($featured_products, 0, 6);
                foreach ($limited_products as $product): 
                ?>
                <div class="product-card">
                    <div class="product-image">
                        <?php if (isset($product->gambar_1) && !empty($product->gambar_1)): ?>
                            <img src="<?= base_url('uploads/products/' . $product->gambar_1) ?>" alt="<?= $product->nama_produk ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/350x350/eff2f1/6a6a6a?text=No+Image" alt="<?= $product->nama_produk ?>">
                        <?php endif; ?>
                        
                        <?php if (isset($product->stok)): ?>
                            <?php if ($product->stok < 5 && $product->stok > 0): ?>
                            <span class="badge badge-warning">Stok Terbatas</span>
                            <?php elseif ($product->stok == 0): ?>
                            <span class="badge badge-danger">Habis</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <div class="product-info">
                        <h3><?= $product->nama_produk ?></h3>
                        <div class="product-price">Rp <?= number_format($product->harga, 0, ',', '.') ?></div>
                        <div class="product-meta">
                            <?php if (isset($product->stok)): ?>
                            <span><i class="fas fa-box"></i> Stok: <?= $product->stok ?></span>
                            <?php endif; ?>
                            <?php if (isset($product->berat)): ?>
                            <span><i class="fas fa-weight"></i> <?= $product->berat ?> kg</span>
                            <?php endif; ?>
                        </div>
                        <div class="product-actions">
                            <a href="<?= base_url('product/detail/' . $product->slug) ?>" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <?php if ($this->session->userdata('logged_in') && (!isset($product->stok) || $product->stok > 0)): ?>
                            <button class="btn btn-primary btn-sm" onclick="addToCart(<?= $product->id ?>)">
                                <i class="fas fa-cart-plus"></i> Keranjang
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="grid-column: 1/-1; text-align: center; padding: 60px; color: #6a6a6a;">
                    <i class="fas fa-box-open" style="font-size: 64px; margin-bottom: 20px; display: block; opacity: 0.5;"></i>
                    <h3 style="font-size: 24px; margin-bottom: 10px;">Belum Ada Produk</h3>
                    <p>Produk unggulan akan segera ditampilkan di sini</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="categories-section">
    <div class="container">
        <h2 class="section-title">Kategori Produk</h2>
        <div class="categories-grid">
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <?php
                    // Dynamic icons based on category name
                    $icon = 'fa-couch';
                    $cat_name = strtolower($category->nama_kategori);
                    
                    if (strpos($cat_name, 'kursi') !== false) {
                        $icon = 'fa-chair';
                    } elseif (strpos($cat_name, 'lemari') !== false) {
                        $icon = 'fa-door-closed';
                    } elseif (strpos($cat_name, 'meja') !== false) {
                        $icon = 'fa-table';
                    } elseif (strpos($cat_name, 'tempat tidur') !== false || strpos($cat_name, 'kasur') !== false) {
                        $icon = 'fa-bed';
                    } elseif (strpos($cat_name, 'rak') !== false) {
                        $icon = 'fa-layer-group';
                    }
                    ?>
                    <a href="<?= base_url('product/category/' . $category->slug) ?>" class="category-card">
                        <i class="fas <?= $icon ?>"></i>
                        <h3><?= $category->nama_kategori ?></h3>
                        <p><?= isset($category->deskripsi) ? substr($category->deskripsi, 0, 60) . '...' : 'Lihat koleksi ' . $category->nama_kategori ?></p>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="grid-column: 1/-1; text-align: center; padding: 40px; color: #6a6a6a;">
                    <i class="fas fa-box-open" style="font-size: 48px; margin-bottom: 15px; display: block; opacity: 0.5;"></i>
                    <p>Kategori produk akan segera tersedia</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<?php if (!empty($testimonials)): ?>
<section class="testimonials-section">
    <div class="container">
        <h2 class="section-title">Testimoni Pelanggan</h2>
        <div class="testimonials-grid">
            <?php foreach ($testimonials as $testimonial): ?>
            <div class="testimonial-card">
                <div class="rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <i class="fas fa-star <?= $i <= $testimonial->rating ? 'active' : '' ?>"></i>
                    <?php endfor; ?>
                </div>
                <h4><?= $testimonial->judul_testimoni ?></h4>
                <p><?= substr($testimonial->isi_testimoni, 0, 150) ?>...</p>
                <div class="testimonial-author">
                    <img src="<?= $testimonial->foto_profil ? base_url('uploads/users/' . $testimonial->foto_profil) : base_url('assets/img/default-avatar.png') ?>" 
                         alt="<?= $testimonial->nama_lengkap ?>"
                         onerror="this.src='https://ui-avatars.com/api/?name=<?= urlencode($testimonial->nama_lengkap) ?>&background=3b5d50&color=fff'">
                    <div>
                        <strong><?= $testimonial->nama_lengkap ?></strong>
                        <small><?= date('d M Y', strtotime($testimonial->created_at)) ?></small>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Blog Posts -->
<?php if (!empty($recent_posts)): ?>
<section class="blog-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Artikel Terbaru</h2>
            <a href="<?= base_url('blog') ?>" class="btn btn-success btn-sm">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="blog-grid">
            <?php foreach ($recent_posts as $post): ?>
            <a href="<?= base_url('blog/detail/' . $post->slug) ?>" class="blog-card">
                <?php if ($post->gambar_utama): ?>
                <img src="<?= base_url('uploads/blog/' . $post->gambar_utama) ?>" alt="<?= $post->judul ?>">
                <?php else: ?>
                <img src="https://via.placeholder.com/400x220/eff2f1/6a6a6a?text=Blog+Post" alt="<?= $post->judul ?>">
                <?php endif; ?>
                <div class="blog-content">
                    <h3><?= $post->judul ?></h3>
                    <p class="blog-date">
                        <i class="fas fa-calendar"></i> 
                        <?= date('d F Y', strtotime($post->published_at)) ?>
                    </p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<script>
function addToCart(productId) {
    fetch('<?= base_url('home/add_to_cart') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'product_id=' + productId + '&quantity=1'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Produk berhasil ditambahkan ke keranjang!');
            
            const cartBadge = document.querySelector('.position-absolute.badge.rounded-pill');
            if (cartBadge && data.cart_count) {
                cartBadge.textContent = data.cart_count;
                cartBadge.style.display = 'block';
            }
        } else {
            alert(data.message || 'Gagal menambahkan produk ke keranjang');
            
            if (data.redirect) {
                window.location.href = data.redirect;
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat menambahkan produk');
    });
}
</script>