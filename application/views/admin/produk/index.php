<style>
/* ========================================
   PRODUCT INDEX - REFINED & POLISHED
   Clean Layout, Perfect Spacing, Professional
   ======================================== */

.products-wrapper {
    background: linear-gradient(135deg, #f5f1e8 0%, #faf8f3 100%);
    min-height: 100vh;
    padding: 32px;
}

/* Page Header */
.page-header {
    background: white;
    border-radius: 20px;
    padding: 32px 40px;
    margin-bottom: 32px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.1);
}

.header-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.page-title {
    font-size: 32px;
    font-weight: 800;
    color: #2d1810;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.page-title i {
    color: #8B5E3C;
}

.page-subtitle {
    font-size: 16px;
    color: #6b5947;
    line-height: 1.6;
}

.btn-add-product {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    padding: 14px 28px;
    border-radius: 12px;
    border: none;
    font-weight: 600;
    font-size: 15px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 2px 8px rgba(139,94,60,0.2);
}

.btn-add-product:hover {
    background: linear-gradient(135deg, #6d4a2f 0%, #5A3E2B 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(139,94,60,0.3);
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-bottom: 32px;
}

.stat-card {
    background: white;
    border-radius: 18px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--card-gradient);
}

.stat-card.brown {
    --card-gradient: linear-gradient(90deg, #8B5E3C, #a67c52);
}

.stat-card.green {
    --card-gradient: linear-gradient(90deg, #10b981, #34d399);
}

.stat-card.orange {
    --card-gradient: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.stat-card.blue {
    --card-gradient: linear-gradient(90deg, #3b82f6, #60a5fa);
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.stat-card-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stat-info {
    flex: 1;
}

.stat-label {
    font-size: 13px;
    font-weight: 600;
    color: #6b5947;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-value {
    font-size: 36px;
    font-weight: 800;
    color: #2d1810;
    line-height: 1;
}

.stat-icon {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.stat-card.brown .stat-icon {
    background: linear-gradient(135deg, rgba(139,94,60,0.1), rgba(139,94,60,0.15));
    color: #8B5E3C;
}

.stat-card.green .stat-icon {
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.15));
    color: #10b981;
}

.stat-card.orange .stat-icon {
    background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(245,158,11,0.15));
    color: #f59e0b;
}

.stat-card.blue .stat-icon {
    background: linear-gradient(135deg, rgba(59,130,246,0.1), rgba(59,130,246,0.15));
    color: #3b82f6;
}

/* Alert Messages */
.alert {
    padding: 18px 24px;
    border-radius: 12px;
    margin-bottom: 24px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    font-size: 15px;
    border: 1.5px solid;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-success {
    background: #ecfdf5;
    border-color: #10b981;
    color: #065f46;
}

.alert-danger {
    background: #fef2f2;
    border-color: #ef4444;
    color: #991b1b;
}

.alert i {
    font-size: 18px;
}

/* Search & Filter Section */
.filter-section {
    background: white;
    border-radius: 18px;
    padding: 24px 28px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.filter-row {
    display: flex;
    gap: 16px;
    align-items: center;
}

.search-box {
    flex: 1;
    position: relative;
}

.search-box i {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 16px;
}

.search-box input {
    width: 100%;
    padding: 14px 18px 14px 50px;
    border-radius: 12px;
    border: 1.5px solid #e5e7eb;
    font-size: 15px;
    transition: all 0.2s ease;
    background: #fafafa;
}

.search-box input:focus {
    outline: none;
    border-color: #8B5E3C;
    background: white;
    box-shadow: 0 0 0 4px rgba(139,94,60,0.1);
}

.filter-box {
    min-width: 200px;
}

.filter-box select {
    width: 100%;
    padding: 14px 18px;
    border-radius: 12px;
    border: 1.5px solid #e5e7eb;
    font-size: 15px;
    background: #fafafa;
    cursor: pointer;
    transition: all 0.2s ease;
}

.filter-box select:focus {
    outline: none;
    border-color: #8B5E3C;
    background: white;
    box-shadow: 0 0 0 4px rgba(139,94,60,0.1);
}

/* Products Section */
.products-section {
    background: white;
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid #f3f4f6;
}

.section-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
}

.product-count {
    font-size: 14px;
    color: #6b5947;
}

/* Products Grid */
.products-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

.product-card {
    background: #faf8f3;
    border: 1px solid rgba(139,94,60,0.1);
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.product-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    border-color: rgba(139,94,60,0.2);
}

.product-image {
    width: 100%;
    height: 220px;
    overflow: hidden;
    background: #f3f4f6;
    position: relative;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image img {
    transform: scale(1.05);
}

.product-image-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #e5e7eb, #d1d5db);
}

.product-image-placeholder i {
    font-size: 48px;
    color: #9ca3af;
}

.product-status-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    backdrop-filter: blur(10px);
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
}

.product-status-badge.active {
    background: rgba(16, 185, 129, 0.95);
    color: white;
}

.product-status-badge.inactive {
    background: rgba(107, 114, 128, 0.95);
    color: white;
}

.product-content {
    padding: 20px;
}

.product-category {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    background: white;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 700;
    color: #6b5947;
    margin-bottom: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.product-name {
    font-size: 16px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 10px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 44px;
}

.product-price {
    font-size: 20px;
    font-weight: 800;
    color: #8B5E3C;
    margin-bottom: 12px;
}

.product-meta {
    display: flex;
    gap: 8px;
    margin-bottom: 16px;
    flex-wrap: wrap;
}

.meta-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 10px;
    background: white;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    color: #6b5947;
}

.meta-badge i {
    font-size: 10px;
}

.product-actions {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
    padding-top: 16px;
    border-top: 1px solid rgba(139,94,60,0.1);
}

.btn-action {
    padding: 10px 8px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    text-decoration: none;
}

.btn-action.edit {
    background: #fef3c7;
    color: #92400e;
}

.btn-action.edit:hover {
    background: #fde68a;
    transform: translateY(-2px);
}

.btn-action.toggle {
    background: #dbeafe;
    color: #1e40af;
}

.btn-action.toggle:hover {
    background: #bfdbfe;
    transform: translateY(-2px);
}

.btn-action.delete {
    background: #fee2e2;
    color: #991b1b;
}

.btn-action.delete:hover {
    background: #fecaca;
    transform: translateY(-2px);
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 80px 40px;
}

.empty-icon {
    width: 100px;
    height: 100px;
    margin: 0 auto 24px;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-icon i {
    font-size: 48px;
    color: #9ca3af;
}

.empty-title {
    font-size: 20px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 8px;
}

.empty-text {
    font-size: 15px;
    color: #6b5947;
    margin-bottom: 24px;
}

/* Responsive */
@media (max-width: 1400px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 1024px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .products-wrapper {
        padding: 20px;
    }

    .header-top {
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
    }

    .btn-add-product {
        justify-content: center;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .stat-value {
        font-size: 28px;
    }

    .filter-row {
        flex-direction: column;
    }

    .filter-box {
        width: 100%;
    }

    .products-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="products-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-top">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-box-open"></i>
                    Manajemen Produk
                </h1>
                <p class="page-subtitle">
                    Kelola seluruh produk furniture yang dijual di toko Anda
                </p>
            </div>
            <a href="<?= base_url('admin/produk/create') ?>" class="btn-add-product">
                <i class="fas fa-plus-circle"></i>
                Tambah Produk Baru
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card brown">
            <div class="stat-card-content">
                <div class="stat-info">
                    <div class="stat-label">Total Produk</div>
                    <div class="stat-value"><?= count($products) ?></div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-boxes"></i>
                </div>
            </div>
        </div>

        <div class="stat-card green">
            <div class="stat-card-content">
                <div class="stat-info">
                    <div class="stat-label">Produk Aktif</div>
                    <div class="stat-value">
                        <?= count(array_filter($products, function($p) { return $p->status == 'active'; })) ?>
                    </div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
        </div>

        <div class="stat-card orange">
            <div class="stat-card-content">
                <div class="stat-info">
                    <div class="stat-label">Setengah Jadi</div>
                    <div class="stat-value">
                        <?= count(array_filter($products, function($p) { return isset($p->tipe_produk) && $p->tipe_produk == 'setengah_jadi'; })) ?>
                    </div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-cog"></i>
                </div>
            </div>
        </div>

        <div class="stat-card blue">
            <div class="stat-card-content">
                <div class="stat-info">
                    <div class="stat-label">Kategori</div>
                    <div class="stat-value">
                        <?= count(array_unique(array_column($products, 'id_kategori'))) ?>
                    </div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <div><?= $this->session->flashdata('success') ?></div>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle"></i>
        <div><?= $this->session->flashdata('error') ?></div>
    </div>
    <?php endif; ?>

    <!-- Search & Filter Section -->
    <div class="filter-section">
        <div class="filter-row">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" 
                       id="searchProduct" 
                       placeholder="Cari produk berdasarkan nama...">
            </div>
            <div class="filter-box">
                <select id="filterCategory">
                    <option value="">Semua Kategori</option>
                    <?php 
                    $categories = array_unique(array_map(function($p) {
                        return ['id' => $p->id_kategori, 'name' => isset($p->kategori_name) ? $p->kategori_name : ''];
                    }, $products), SORT_REGULAR);
                    foreach($categories as $cat): 
                        if(!empty($cat['name'])):
                    ?>
                        <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                    <?php 
                        endif;
                    endforeach; 
                    ?>
                </select>
            </div>
            <div class="filter-box">
                <select id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Nonaktif</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="products-section">
        <div class="section-header">
            <h3 class="section-title">Daftar Produk</h3>
            <p class="product-count">
                Menampilkan <strong><span id="productCount"><?= count($products) ?></span></strong> produk
            </p>
        </div>

        <?php if(!empty($products)): ?>
        <div class="products-grid" id="productsGrid">
            <?php foreach($products as $product): ?>
            <div class="product-card" 
                 data-name="<?= strtolower($product->nama_produk) ?>"
                 data-category="<?= $product->id_kategori ?>"
                 data-status="<?= $product->status ?>">
                
                <!-- Product Image -->
                <div class="product-image">
                    <?php if(isset($product->gambar_1) && !empty($product->gambar_1)): ?>
                        <img src="<?= base_url('uploads/products/'.$product->gambar_1) ?>" 
                             alt="<?= $product->nama_produk ?>">
                    <?php else: ?>
                        <div class="product-image-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                    <?php endif; ?>
                    
                    <span class="product-status-badge <?= $product->status ?>">
                        <?= $product->status == 'active' ? 'Aktif' : 'Nonaktif' ?>
                    </span>
                </div>

                <!-- Product Content -->
                <div class="product-content">
                    <span class="product-category">
                        <i class="fas fa-tag"></i>
                        <?= isset($product->kategori_name) ? $product->kategori_name : 'Tanpa Kategori' ?>
                    </span>

                    <h3 class="product-name"><?= $product->nama_produk ?></h3>

                    <div class="product-price">
                        Rp <?= number_format($product->harga, 0, ',', '.') ?>
                    </div>

                    <div class="product-meta">
                        <?php if(isset($product->tipe_produk)): ?>
                        <span class="meta-badge">
                            <i class="fas fa-<?= $product->tipe_produk == 'jadi' ? 'check' : 'cog' ?>"></i>
                            <?= $product->tipe_produk == 'jadi' ? 'Jadi' : 'Setengah Jadi' ?>
                        </span>
                        <?php endif; ?>
                        
                        <?php if(isset($product->berat) && !empty($product->berat)): ?>
                        <span class="meta-badge">
                            <i class="fas fa-weight"></i>
                            <?= $product->berat ?>
                        </span>
                        <?php endif; ?>
                    </div>

                    <!-- Actions -->
                    <div class="product-actions">
                        <a href="<?= base_url('admin/produk/edit/'.$product->id) ?>" 
                           class="btn-action edit"
                           title="Edit Produk">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                        
                        <button onclick="toggleStatus(<?= $product->id ?>)" 
                                class="btn-action toggle"
                                title="Toggle Status">
                            <i class="fas fa-power-off"></i>
                            Toggle
                        </button>
                        
                        <button onclick="deleteProduct(<?= $product->id ?>, '<?= addslashes($product->nama_produk) ?>')" 
                                class="btn-action delete"
                                title="Hapus Produk">
                            <i class="fas fa-trash"></i>
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <h3 class="empty-title">Belum Ada Produk</h3>
            <p class="empty-text">
                Mulai tambahkan produk furniture pertama Anda
            </p>
            <a href="<?= base_url('admin/produk/create') ?>" class="btn-add-product">
                <i class="fas fa-plus-circle"></i>
                Tambah Produk Pertama
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
// Toggle Product Status
function toggleStatus(id) {
    if(confirm('Yakin ingin mengubah status produk ini?')) {
        window.location.href = '<?= base_url("admin/produk/toggle/") ?>' + id;
    }
}

// Delete Product
function deleteProduct(id, name) {
    if(confirm('Yakin ingin menghapus produk "' + name + '"?\n\nAksi ini tidak dapat dibatalkan!')) {
        window.location.href = '<?= base_url("admin/produk/delete/") ?>' + id;
    }
}

// Search & Filter Functionality
const searchInput = document.getElementById('searchProduct');
const categoryFilter = document.getElementById('filterCategory');
const statusFilter = document.getElementById('filterStatus');
const productsGrid = document.getElementById('productsGrid');
const productCards = productsGrid ? productsGrid.querySelectorAll('.product-card') : [];
const productCount = document.getElementById('productCount');

function filterProducts() {
    const searchValue = searchInput.value.toLowerCase();
    const categoryValue = categoryFilter.value;
    const statusValue = statusFilter.value;
    let visibleCount = 0;
    
    productCards.forEach(card => {
        const name = card.getAttribute('data-name');
        const category = card.getAttribute('data-category');
        const status = card.getAttribute('data-status');
        
        const matchSearch = name.includes(searchValue);
        const matchCategory = !categoryValue || category === categoryValue;
        const matchStatus = !statusValue || status === statusValue;
        
        if(matchSearch && matchCategory && matchStatus) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });
    
    productCount.textContent = visibleCount;
}

if(searchInput) {
    searchInput.addEventListener('keyup', filterProducts);
}

if(categoryFilter) {
    categoryFilter.addEventListener('change', filterProducts);
}

if(statusFilter) {
    statusFilter.addEventListener('change', filterProducts);
}

// Animate cards on load
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.product-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 50);
    });
});
</script>