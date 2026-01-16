<style>
/* ============================================
   PRODUCT DETAIL - FURNI TEMPLATE COLORS
   FIXED: Related Products with Individual Cards!
   ============================================ */

/* Product Hero */
.product-hero {
    background: linear-gradient(135deg, #2d5a4a 0%, #1a3a2e 100%);
    color: white;
    padding: 40px 0;
    text-align: center;
    margin-bottom: 10px;
}

.product-hero h1 {
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 10px;
}

/* Breadcrumb */
.breadcrumb {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.9);
    margin-top: 16px;
}

.breadcrumb a {
    color: #ffffff;
    text-decoration: none;
    font-weight: 600;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

/* Detail Wrapper */
.product-detail-wrapper {
    background: #eff2f1;
    min-height: 100vh;
    padding: 40px 0;
}

/* Product Detail Layout */
.product-detail {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    margin-bottom: 60px;
}

/* Product Gallery */
.product-gallery {
    position: sticky;
    top: 120px;
    height: fit-content;
}

.main-image {
    width: 100%;
    height: 600px;
    border-radius: 16px;
    overflow: hidden;
    background: #f9fafb;
    margin-bottom: 20px;
    border: 2px solid #e5e7eb;
}

.main-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.thumbnail-images {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    gap: 12px;
}

.thumbnail {
    width: 100%;
    height: 100px;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid #e5e7eb;
    transition: all 0.2s ease;
}

.thumbnail:hover,
.thumbnail.active {
    border-color: #3b5d50;
    transform: scale(1.05);
}

.thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Product Info */
.product-info {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.product-category-badge {
    display: inline-block;
    padding: 6px 16px;
    background: #3b5d50;
    color: white;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    width: fit-content;
}

.product-title {
    font-size: 36px;
    font-weight: 800;
    color: #2f2f2f;
    line-height: 1.2;
    margin: 0;
}

.product-price-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 24px;
    background: #dce5e4;
    border-radius: 16px;
    border: 2px solid rgba(59, 93, 80, 0.2);
}

.product-price {
    font-size: 42px;
    font-weight: 800;
    color: #3b5d50;
}

.stock-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.stock-badge.available {
    background: #d1fae5;
    color: #065f46;
}

.stock-badge.limited {
    background: #fef3c7;
    color: #92400e;
}

.stock-badge.out {
    background: #fee2e2;
    color: #991b1b;
}

/* Product Meta */
.product-meta {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 16px;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
}

.meta-item i {
    font-size: 20px;
    color: #3b5d50;
}

.meta-item .meta-label {
    font-size: 13px;
    color: #6a6a6a;
    font-weight: 600;
}

.meta-item .meta-value {
    font-size: 15px;
    color: #2f2f2f;
    font-weight: 700;
}

/* Product Description */
.product-description {
    padding: 24px;
    background: #dce5e4;
    border-radius: 16px;
}

.product-description h3 {
    font-size: 20px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 16px;
}

.product-description p {
    font-size: 15px;
    line-height: 1.8;
    color: #4b5563;
}

/* Add to Cart Form */
.add-to-cart-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.quantity-selector {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.quantity-selector label {
    font-size: 15px;
    font-weight: 600;
    color: #2f2f2f;
}

.quantity-control {
    display: flex;
    align-items: center;
    gap: 12px;
}

.qty-btn {
    width: 44px;
    height: 44px;
    border: 2px solid #e5e7eb;
    background: white;
    border-radius: 10px;
    font-size: 20px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #3b5d50;
}

.qty-btn:hover {
    background: #3b5d50;
    color: white;
    border-color: #3b5d50;
}

.quantity-control input {
    width: 80px;
    height: 44px;
    text-align: center;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    font-size: 18px;
    font-weight: 600;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-group label {
    font-size: 15px;
    font-weight: 600;
    color: #2f2f2f;
}

.form-group textarea {
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    resize: vertical;
    font-family: inherit;
}

.form-group textarea:focus {
    outline: none;
    border-color: #3b5d50;
}

/* Buttons */
.btn {
    padding: 16px 32px;
    border: none;
    border-radius: 30px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
}

.btn-primary {
    background: #f9bf29;
    color: #ffffffff;
}

.btn-primary:hover {
    background: #e6ac1a;
    transform: translateY(-2px);
}

.btn-outline {
    background: transparent;
    color: #3b5d50;
    border: 2px solid #3b5d50;
}

.btn-outline:hover {
    background: #3b5d50;
    color: white;
}

/* Alert */
.alert {
    padding: 16px 20px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 15px;
}

.alert-info {
    background: #dbeafe;
    border: 1px solid #3b82f6;
    color: #1e40af;
}

.alert a {
    color: inherit;
    font-weight: 700;
    text-decoration: underline;
}

/* RELATED PRODUCTS - WITH CARDS! */
.related-products {
    margin-top: 60px;
}

.related-products h2 {
    font-size: 32px;
    font-weight: 800;
    color: #2f2f2f;
    margin-bottom: 40px;
    text-align: center;
}

.related-products h2::after {
    content: '';
    display: block;
    width: 120px;
    height: 4px;
    background: #3b5d50;
    margin: 10px auto 0;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

/* PRODUCT CARD - SAME AS CATALOG! */
.product-card {
    background: white; /* WHITE CARD! */
    border-radius: 20px; /* ROUNDED CORNERS! */
    padding: 24px; /* PADDING! */
    box-shadow: 0 2px 12px rgba(0,0,0,0.08); /* SHADOW! */
    text-align: center;
    transition: all 0.3s ease;
    text-decoration: none;
    display: block;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 32px rgba(0,0,0,0.12); /* BIGGER SHADOW ON HOVER! */
}

.product-card .product-image {
    width: 100%;
    height: 300px; /* CONSISTENT HEIGHT! */
    overflow: hidden;
    background: transparent;
    margin-bottom: 20px;
    border-radius: 12px; /* ROUNDED IMAGE! */
}

.product-card .product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.1);
}

.product-card .product-info-card {
    padding: 0;
}

/* PRODUCT CATEGORY BADGE */
.product-card .product-category {
    font-size: 12px;
    font-weight: 600;
    color: #3b5d50;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 8px;
    display: block;
}

/* PRODUCT NAME */
.product-card h3 {
    font-size: 17px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 12px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-card h3 a {
    color: inherit;
    text-decoration: none;
}

/* PRODUCT DESCRIPTION */
.product-card .product-desc {
    font-size: 13px;
    color: #6a6a6a;
    line-height: 1.5;
    margin-bottom: 16px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* PRODUCT PRICE */
.product-card .product-price {
    font-size: 22px;
    font-weight: 800;
    color: #2f2f2f;
    margin-bottom: 16px;
}

/* Responsive */
@media (max-width: 1024px) {
    .product-detail {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .product-gallery {
        position: relative;
        top: 0;
    }

    .main-image {
        height: 400px;
    }

    .products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .product-detail {
        padding: 24px;
    }

    .product-title {
        font-size: 28px;
    }

    .product-price {
        font-size: 32px;
    }

    .product-meta {
        grid-template-columns: 1fr;
    }

    .products-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Product Hero -->
<div class="product-hero">
    <div class="container">
        <h1><?= $product->nama_produk ?></h1>
        
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="<?= base_url() ?>">
                <i class="fas fa-home"></i> Home
            </a>
            <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
            <a href="<?= base_url('product') ?>">Katalog Produk</a>
            <?php if (!empty($product->nama_kategori)): ?>
                <i class="fas fa-chevron-right" style="font-size: 10px;"></i>
                <span><?= $product->nama_kategori ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Product Detail -->
<div class="product-detail-wrapper">
    <div class="container">
        
        <div class="product-detail">
            
            <!-- Product Gallery -->
            <div class="product-gallery">
                <div class="main-image">
                    <?php if (!empty($product->gambar_1)): ?>
                        <img src="<?= base_url('uploads/products/' . $product->gambar_1) ?>" 
                             alt="<?= $product->nama_produk ?>" 
                             id="mainImage">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/600x600/eff2f1/6a6a6a?text=No+Image" 
                             alt="No Image">
                    <?php endif; ?>
                </div>
                
                <!-- Thumbnail Images -->
                <?php 
                $images = [];
                for($i = 1; $i <= 6; $i++) {
                    $img_field = 'gambar_' . $i;
                    if (!empty($product->$img_field)) {
                        $images[] = $product->$img_field;
                    }
                }
                
                if (count($images) > 1): 
                ?>
                <div class="thumbnail-images">
                    <?php foreach ($images as $index => $image): ?>
                    <div class="thumbnail <?= $index == 0 ? 'active' : '' ?>" 
                         onclick="changeImage('<?= base_url('uploads/products/' . $image) ?>', this)">
                        <img src="<?= base_url('uploads/products/' . $image) ?>" alt="Thumbnail">
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Product Info -->
            <div class="product-info">
                
                <!-- Category Badge -->
                <?php if (!empty($product->nama_kategori)): ?>
                <span class="product-category-badge">
                    <i class="fas fa-tag"></i> <?= $product->nama_kategori ?>
                </span>
                <?php endif; ?>
                
                <!-- Product Title -->
                <h2 class="product-title"><?= $product->nama_produk ?></h2>
                
                <!-- Price & Stock -->
                <div class="product-price-section">
                    <div class="product-price">
                        Rp <?= number_format($product->harga, 0, ',', '.') ?>
                    </div>
                </div>
                
                <!-- Product Meta Info -->
                <div class="product-meta">
                    <?php if (!empty($product->bahan)): ?>
                    <div class="meta-item">
                        <i class="fas fa-cube"></i>
                        <div>
                            <div class="meta-label">Bahan</div>
                            <div class="meta-value"><?= $product->bahan ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($product->dimensi)): ?>
                    <div class="meta-item">
                        <i class="fas fa-ruler-combined"></i>
                        <div>
                            <div class="meta-label">Dimensi</div>
                            <div class="meta-value"><?= $product->dimensi ?></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($product->berat)): ?>
                    <div class="meta-item">
                        <i class="fas fa-weight"></i>
                        <div>
                            <div class="meta-label">Berat</div>
                            <div class="meta-value"><?= $product->berat ?> kg</div>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="meta-item">
                        <i class="fas fa-certificate"></i>
                        <div>
                            <div class="meta-label">Tipe</div>
                            <div class="meta-value">
                                <?= $product->tipe_produk == 'jadi' ? 'Produk Jadi' : 'Custom/Setengah Jadi' ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="product-description">
                    <h3><i class="fas fa-info-circle"></i> Deskripsi Produk</h3>
                    <p><?= nl2br($product->deskripsi) ?></p>
                </div>
                
                <!-- Add to Cart Form -->
                <?php if ($this->session->userdata('user_id')): ?>
                    <form class="add-to-cart-form" method="post" action="<?= base_url('cart/add') ?>">
                        <input type="hidden" name="product_id" value="<?= $product->id ?>">
                        
                        
                        <div class="form-group">
                            <label>Catatan (Opsional):</label>
                            <textarea name="catatan" rows="3" placeholder="Contoh: Warna, ukuran custom, dll"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
                        </button>
                    </form>
                <?php else: ?>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> 
                        <a href="<?= base_url('auth/login') ?>">Login</a> untuk membeli produk ini
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
        <?php $this->load->view('product/testimonials_section'); ?>
        <!-- Related Products WITH CARDS! -->
        <?php if (!empty($related_products)): ?>
        <section class="related-products">
            <h2>Produk Terkait</h2>
            <div class="products-grid">
                <?php foreach ($related_products as $related): ?>
                <div class="product-card">
                    <a href="<?= base_url('product/' . $related->slug) ?>">
                        <div class="product-image">
                            <?php if (!empty($related->gambar_1)): ?>
                                <img src="<?= base_url('uploads/products/' . $related->gambar_1) ?>" 
                                     alt="<?= $related->nama_produk ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300x300/eff2f1/6a6a6a?text=No+Image" 
                                     alt="No Image">
                            <?php endif; ?>
                        </div>
                    </a>
                    
                    <div class="product-info-card">
                        <!-- Category Badge -->
                        <?php if (!empty($related->nama_kategori)): ?>
                        <span class="product-category">
                            <?= $related->nama_kategori ?>
                        </span>
                        <?php endif; ?>
                        
                        <!-- Product Name -->
                        <h3>
                            <a href="<?= base_url('product/' . $related->slug) ?>">
                                <?= $related->nama_produk ?>
                            </a>
                        </h3>
                        
                        <!-- Product Description -->
                        <?php if (!empty($related->deskripsi)): ?>
                        <p class="product-desc">
                            <?php
                            $desc = strip_tags($related->deskripsi);
                            $words = explode(' ', $desc);
                            if (count($words) > 15) {
                                $desc = implode(' ', array_slice($words, 0, 15)) . '...';
                            }
                            echo $desc;
                            ?>
                        </p>
                        <?php endif; ?>
                        
                        <!-- Price -->
                        <div class="product-price">
                            Rp <?= number_format($related->harga, 0, ',', '.') ?>
                        </div>
                        
                        <!-- View Detail Button -->
                        <a href="<?= base_url('product/' . $related->slug) ?>" class="btn btn-outline">
                            Lihat Detail <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
        
    </div>
</div>

<script>
// Change main image on thumbnail click
function changeImage(src, element) {
    document.getElementById('mainImage').src = src;
    
    // Remove active class from all thumbnails
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('active');
    });
    
    // Add active class to clicked thumbnail
    element.classList.add('active');
}

// Quantity controls
function increaseQty(max) {
    const input = document.getElementById('quantity');
    if (parseInt(input.value) < max) {
        input.value = parseInt(input.value) + 1;
    }
}

function decreaseQty() {
    const input = document.getElementById('quantity');
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
    }
}
</script>