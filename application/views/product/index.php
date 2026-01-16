<style>
/* ============================================
   PRODUCT CATALOG - FURNI TEMPLATE
   ============================================ */

/* HERO SECTION - Matching Home */
.catalog-hero {
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

/* Hero Image */
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

/* Catalog Wrapper */
.catalog-wrapper {
    background: #eff2f1 !important;
    min-height: 100vh !important;
    padding: 50px 0 80px !important;
}

/* Page Header */
.page-header {
    background: white;
    border-radius: 20px;
    padding: 32px 40px;
    margin-bottom: 32px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.page-title {
    font-size: 32px;
    font-weight: 800;
    color: #2f2f2f;
    margin-bottom: 8px;
}

.page-subtitle {
    font-size: 16px;
    color: #6a6a6a;
    line-height: 1.6;
}

/* Layout */
.catalog-layout {
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 32px;
}

/* Sidebar */
.sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

.filter-card {
    background: white;
    border-radius: 18px;
    padding: 24px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.filter-title {
    font-size: 16px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 16px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-title i {
    color: #3b5d50;
}

/* Category List */
.category-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.category-item {
    padding: 12px 16px;
    border-radius: 10px;
    text-decoration: none;
    color: #2f2f2f;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.2s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid transparent;
}

.category-item:hover {
    background: #dce5e4;
    border-color: rgba(59, 93, 80, 0.2);
    transform: translateX(4px);
}

.category-item.active {
    background: #3b5d50 !important;
    color: white;
    font-weight: 700;
}

.category-count {
    font-size: 12px;
    padding: 4px 10px;
    background: rgba(0,0,0,0.1);
    border-radius: 12px;
}

/* Price Filter */
.price-inputs {
    display: flex;
    gap: 12px;
    margin-bottom: 12px;
}

.price-input {
    flex: 1;
}

.price-input label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    color: #6a6a6a;
    margin-bottom: 6px;
}

.price-input input {
    width: 100%;
    padding: 10px 12px;
    border: 1.5px solid #e5e7eb;
    border-radius: 8px;
    font-size: 14px;
}

.price-input input:focus {
    outline: none;
    border-color: #3b5d50;
}

.btn-apply-filter {
    width: 100%;
    padding: 12px;
    background: #3b5d50;
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-apply-filter:hover {
    background: #2d4840;
    transform: translateY(-2px);
}

/* Toolbar */
.catalog-toolbar {
    background: white;
    border-radius: 16px;
    padding: 20px 24px;
    margin-bottom: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.product-count {
    font-size: 15px;
    color: #2f2f2f;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

.product-count i {
    color: #3b5d50;
}

.toolbar-right {
    display: flex;
    align-items: center;
    gap: 16px;
}

.sort-select {
    padding: 10px 16px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    background: white;
    transition: all 0.2s ease;
}

.sort-select:focus {
    outline: none;
    border-color: #3b5d50;
}

/* Product Grid */
.product-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 30px !important;
}

/* Product Card - FURNI STYLE */
.product-card {
    background: transparent !important;
    border: none !important;
    text-align: center !important;
    transition: all 0.3s ease !important;
    text-decoration: none !important;
    display: block !important;
}

.product-card:hover {
    transform: translateY(-8px) !important;
}

.product-image {
    width: 100% !important;
    height: 350px !important;
    overflow: hidden !important;
    background: transparent !important;
    position: relative !important;
    margin-bottom: 20px !important;
    border-radius: 0 !important;
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

.product-badge {
    position: absolute !important;
    top: 16px !important;
    left: 16px !important;
    background: #f9bf29 !important;
    color: #2f2f2f !important;
    padding: 6px 14px !important;
    border-radius: 20px !important;
    font-size: 12px !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
}

.product-info {
    padding: 0 !important;
}

.product-category {
    font-size: 12px !important;
    font-weight: 600 !important;
    color: #3b5d50 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
    margin-bottom: 8px !important;
}

.product-name {
    font-size: 17px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 12px !important;
    line-height: 1.4 !important;
    display: -webkit-box !important;
    -webkit-line-clamp: 2 !important;
    -webkit-box-orient: vertical !important;
    overflow: hidden !important;
}

.product-desc {
    font-size: 13px !important;
    color: #6a6a6a !important;
    line-height: 1.5 !important;
    margin-bottom: 16px !important;
    display: -webkit-box !important;
    -webkit-line-clamp: 2 !important;
    -webkit-box-orient: vertical !important;
    overflow: hidden !important;
}

.product-footer {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    padding-top: 16px !important;
}

.product-price {
    font-size: 22px !important;
    font-weight: 800 !important;
    color: #2f2f2f !important;
}

.btn-detail {
    padding: 10px 20px !important;
    background: transparent !important;
    color: #3b5d50 !important;
    border: 2px solid #3b5d50 !important;
    border-radius: 30px !important;
    font-weight: 600 !important;
    font-size: 13px !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
    display: flex !important;
    align-items: center !important;
    gap: 6px !important;
    text-decoration: none !important;
}

.btn-detail:hover {
    background: #3b5d50 !important;
    color: white !important;
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

.empty-title {
    font-size: 24px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 12px;
}

.empty-text {
    font-size: 16px;
    color: #6a6a6a;
    margin-bottom: 24px;
    line-height: 1.6;
}

.btn-browse {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 14px 28px;
    background: #3b5d50;
    color: white;
    border: none;
    border-radius: 30px;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-browse:hover {
    background: #2d4840;
    transform: translateY(-2px);
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .catalog-layout {
        grid-template-columns: 1fr;
    }

    .sidebar {
        position: relative;
        top: 0;
    }

    .product-grid {
        grid-template-columns: repeat(2, 1fr) !important;
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

    .page-header {
        padding: 24px;
    }

    .page-title {
        font-size: 24px;
    }

    .catalog-toolbar {
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
    }

    .toolbar-right {
        justify-content: space-between;
    }

    .product-grid {
        grid-template-columns: 1fr !important;
    }
    
    .catalog-wrapper {
        padding: 40px 0 60px !important;
    }
}
</style>

<!-- Catalog Hero - Matching Home Style -->
<div class="catalog-hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1><?= isset($title) ? $title : 'Katalog Produk' ?></h1>
                <p>
                    <?php if ($current_category && !empty($current_category->deskripsi)): ?>
                        <?= $current_category->deskripsi ?>
                    <?php elseif (!empty($current_filters['search'])): ?>
                        Hasil pencarian untuk "<?= htmlspecialchars($current_filters['search']) ?>"
                    <?php else: ?>
                        Temukan furniture berkualitas tinggi dengan desain elegan untuk melengkapi hunian Anda
                    <?php endif; ?>
                </p>
                
                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <a href="<?= base_url() ?>">
                        <i class="fas fa-home"></i> Home
                    </a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Katalog Produk</span>
                    <?php if ($current_category): ?>
                        <i class="fas fa-chevron-right"></i>
                        <span><?= $current_category->nama_kategori ?></span>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="hero-image">
                <?php if ($current_category && !empty($current_category->gambar)): ?>
                    <img src="<?= base_url('uploads/categories/' . $current_category->gambar) ?>" 
                         alt="<?= $current_category->nama_kategori ?>"
                         onerror="this.src='https://via.placeholder.com/600x400/3b5d50/ffffff?text=<?= urlencode($current_category->nama_kategori) ?>'">
                <?php else: ?>
                    <img src="<?= base_url('assets/images/rehap-hero.png') ?>" 
                         alt="Katalog Produk" 
                         onerror="this.src='https://via.placeholder.com/600x400/3b5d50/ffffff?text=Katalog+Furniture'">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Catalog Content -->
<div class="catalog-wrapper">
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">
                <?php if ($current_category): ?>
                    <?= $current_category->nama_kategori ?>
                <?php elseif (!empty($current_filters['search'])): ?>
                    Hasil Pencarian: "<?= htmlspecialchars($current_filters['search']) ?>"
                <?php else: ?>
                    Semua Produk
                <?php endif; ?>
            </h1>
            <p class="page-subtitle">
                <?php if ($current_category && !empty($current_category->deskripsi)): ?>
                    <?= $current_category->deskripsi ?>
                <?php else: ?>
                    Koleksi lengkap furniture berkualitas tinggi dengan berbagai pilihan desain dan model
                <?php endif; ?>
            </p>
        </div>

        <div class="catalog-layout">
            
            <!-- Sidebar Filters -->
            <aside class="sidebar">
                
                <!-- Categories -->
                <div class="filter-card">
                    <h3 class="filter-title">
                        <i class="fas fa-th-large"></i>
                        Kategori
                    </h3>
                    <div class="category-list">
                        <a href="<?= base_url('product') ?>" 
                           class="category-item <?= !$current_category ? 'active' : '' ?>">
                            <span>Semua Produk</span>
                            <span class="category-count"><?= $total_products ?></span>
                        </a>
                        <?php foreach ($categories as $cat): ?>
                        <a href="<?= base_url('product/category/' . $cat->slug) ?>" 
                           class="category-item <?= $current_category && $current_category->id == $cat->id ? 'active' : '' ?>">
                            <span><?= $cat->nama_kategori ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Price Filter -->
                <div class="filter-card">
                    <h3 class="filter-title">
                        <i class="fas fa-dollar-sign"></i>
                        Filter Harga
                    </h3>
                    <form method="get" action="<?= base_url('product') ?>">
                        <?php if ($current_category): ?>
                            <input type="hidden" name="category" value="<?= $current_category->slug ?>">
                        <?php endif; ?>
                        
                        <div class="price-inputs">
                            <div class="price-input">
                                <label>Harga Min</label>
                                <input type="number" 
                                       name="min_price" 
                                       placeholder="0"
                                       value="<?= $current_filters['min_price'] ?? '' ?>">
                            </div>
                            <div class="price-input">
                                <label>Harga Max</label>
                                <input type="number" 
                                       name="max_price" 
                                       placeholder="999999999"
                                       value="<?= $current_filters['max_price'] ?? '' ?>">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn-apply-filter">
                            <i class="fas fa-filter"></i>
                            Terapkan Filter
                        </button>
                    </form>
                </div>

            </aside>

            <!-- Main Content -->
            <div class="catalog-content">
                
                <!-- Toolbar -->
                <div class="catalog-toolbar">
                    <div class="product-count">
                        <i class="fas fa-box"></i>
                        Menampilkan <strong><?= count($products) ?></strong> produk
                    </div>
                    
                    <div class="toolbar-right">
                        <form method="get" action="<?= base_url('product') ?>" style="margin: 0;">
                            <?php if ($current_category): ?>
                                <input type="hidden" name="category" value="<?= $current_category->slug ?>">
                            <?php endif; ?>
                            <?php if (!empty($current_filters['search'])): ?>
                                <input type="hidden" name="search" value="<?= $current_filters['search'] ?>">
                            <?php endif; ?>
                            
                            <select name="sort" class="sort-select" onchange="this.form.submit()">
                                <option value="newest" <?= ($current_filters['sort'] ?? 'newest') == 'newest' ? 'selected' : '' ?>>
                                    Terbaru
                                </option>
                                <option value="price_low" <?= ($current_filters['sort'] ?? '') == 'price_low' ? 'selected' : '' ?>>
                                    Harga Terendah
                                </option>
                                <option value="price_high" <?= ($current_filters['sort'] ?? '') == 'price_high' ? 'selected' : '' ?>>
                                    Harga Tertinggi
                                </option>
                                <option value="name" <?= ($current_filters['sort'] ?? '') == 'name' ? 'selected' : '' ?>>
                                    Nama A-Z
                                </option>
                            </select>
                        </form>
                    </div>
                </div>

                <!-- Product Grid -->
                <?php if (empty($products)): ?>
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="empty-title">Produk Tidak Ditemukan</h3>
                        <p class="empty-text">
                            Maaf, tidak ada produk yang sesuai dengan filter Anda.<br>
                            Coba ubah filter atau lihat kategori lainnya.
                        </p>
                        <a href="<?= base_url('product') ?>" class="btn-browse">
                            <i class="fas fa-th"></i>
                            Lihat Semua Produk
                        </a>
                    </div>
                <?php else: ?>
                    <div class="product-grid">
                        <?php foreach ($products as $product): ?>
                        <a href="<?= base_url('product/' . $product->slug) ?>" class="product-card">
                            <div class="product-image">
                                <?php if (!empty($product->gambar_1)): ?>
                                    <img src="<?= base_url('uploads/products/' . $product->gambar_1) ?>" 
                                         alt="<?= $product->nama_produk ?>">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/350x350/eff2f1/6a6a6a?text=No+Image" 
                                         alt="No Image">
                                <?php endif; ?>
                                
                                <?php if ($product->tipe_produk == 'setengah_jadi'): ?>
                                    <span class="product-badge">Custom</span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="product-info">
                                <div class="product-category">
                                    <?= $product->nama_kategori ?? 'Furniture' ?>
                                </div>
                                
                                <h3 class="product-name"><?= $product->nama_produk ?></h3>
                                
                                <p class="product-desc">
                                    <?php
                                    $desc = strip_tags($product->deskripsi);
                                    $words = explode(' ', $desc);
                                    if (count($words) > 15) {
                                        $desc = implode(' ', array_slice($words, 0, 15)) . '...';
                                    }
                                    echo $desc;
                                    ?>
                                </p>
                                
                                <div class="product-footer">
                                    <div class="product-price">
                                        Rp <?= number_format($product->harga, 0, ',', '.') ?>
                                    </div>
                                    <div class="btn-detail">
                                        Lihat Detail
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>