<style>
/* Modern Dashboard Theme untuk Testimoni */
.testimonial-wrapper {
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
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    border: 1px solid rgba(139,94,60,0.1);
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
    margin: 0;
}

/* Stats Cards */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 32px;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

.stat-label {
    font-size: 13px;
    color: #6b5947;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
    margin-bottom: 8px;
}

.stat-value {
    font-size: 36px;
    font-weight: 800;
    color: #2d1810;
    margin-bottom: 4px;
}

.stat-description {
    font-size: 13px;
    color: #9ca3af;
}

.stat-pending .stat-value { color: #f59e0b; }
.stat-approved .stat-value { color: #10b981; }

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
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
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

.alert i { font-size: 18px; margin-top: 2px; }

/* Search and Filter Section */
.filter-section {
    background: white;
    border-radius: 18px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.search-box {
    position: relative;
    max-width: 600px;
}

.search-box input {
    width: 100%;
    padding: 14px 20px 14px 48px;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    font-size: 15px;
    transition: all 0.2s ease;
}

.search-box input:focus {
    outline: none;
    border-color: #8B5E3C;
    box-shadow: 0 0 0 3px rgba(139,94,60,0.1);
}

.search-box i {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 16px;
}

/* Testimonial Grid */
.testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
    gap: 24px;
    margin-bottom: 32px;
}

/* Testimonial Card */
.testimonial-card {
    background: white;
    border-radius: 18px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.testimonial-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

/* Card Header */
.card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 16px;
}

.customer-info {
    display: flex;
    align-items: center;
    gap: 14px;
    flex: 1;
}

.customer-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: linear-gradient(135deg, #8B5E3C, #a67c52);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 700;
    text-transform: uppercase;
    flex-shrink: 0;
}

.customer-details {
    flex: 1;
    min-width: 0;
}

.customer-name {
    font-size: 16px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.product-name {
    font-size: 13px;
    color: #6b5947;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Status Badge */
.badge {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    flex-shrink: 0;
}

.badge-pending {
    background: #fef3c7;
    color: #92400e;
}

.badge-approved {
    background: #d1fae5;
    color: #065f46;
}

/* Rating */
.rating-stars {
    display: flex;
    gap: 4px;
    margin-bottom: 12px;
}

.rating-stars i {
    color: #fbbf24;
    font-size: 16px;
}

.rating-stars i.far {
    color: #d1d5db;
}

/* Testimonial Content */
.testimonial-title {
    font-size: 15px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 8px;
    line-height: 1.4;
}

.testimonial-text {
    font-size: 14px;
    color: #4b5563;
    line-height: 1.6;
    margin-bottom: 16px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Card Footer */
.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 16px;
    border-top: 1px solid #f3f4f6;
}

.testimonial-date {
    font-size: 13px;
    color: #9ca3af;
    display: flex;
    align-items: center;
    gap: 6px;
}

.testimonial-date i {
    font-size: 12px;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 8px;
}

.btn-action {
    padding: 8px 16px;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    text-decoration: none;
}

.btn-action:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.btn-approve {
    background: #d1fae5;
    color: #065f46;
}

.btn-approve:hover {
    background: #a7f3d0;
}

.btn-reject {
    background: #fee2e2;
    color: #991b1b;
}

.btn-reject:hover {
    background: #fecaca;
}

.btn-delete {
    background: #f3f4f6;
    color: #6b7280;
}

.btn-delete:hover {
    background: #e5e7eb;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 80px 40px;
    background: white;
    border-radius: 18px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
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
    margin: 0;
}

/* Responsive */
@media (max-width: 1024px) {
    .testimonials-grid {
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    }
}

@media (max-width: 768px) {
    .testimonial-wrapper {
        padding: 20px;
    }
    
    .page-header {
        padding: 24px;
    }
    
    .page-title {
        font-size: 24px;
    }
    
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .testimonials-grid {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-action {
        width: 100%;
        justify-content: center;
    }
}
</style>

<div class="testimonial-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-star"></i>
            Testimoni Moderasi
        </h1>
        <p class="page-subtitle">
            Kelola dan moderasi testimoni dari pelanggan
        </p>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Total Testimoni</div>
            <div class="stat-value"><?= count($testimonials) ?></div>
            <div class="stat-description">Semua testimoni</div>
        </div>
        
        <div class="stat-card stat-pending">
            <div class="stat-label">Menunggu Persetujuan</div>
            <div class="stat-value">
                <?php
                $pending = array_filter($testimonials, function($t) {
                    return $t->status == 'pending';
                });
                echo count($pending);
                ?>
            </div>
            <div class="stat-description">Perlu direview</div>
        </div>
        
        <div class="stat-card stat-approved">
            <div class="stat-label">Disetujui</div>
            <div class="stat-value">
                <?php
                $approved = array_filter($testimonials, function($t) {
                    return $t->status == 'approved';
                });
                echo count($approved);
                ?>
            </div>
            <div class="stat-description">Ditampilkan di web</div>
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

    <!-- Search Section -->
    <div class="filter-section">
        <form method="get" action="<?= base_url('admin/testimoni') ?>">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" 
                       name="search" 
                       placeholder="Cari testimoni atau customer..." 
                       value="<?= $this->input->get('search') ?>">
            </div>
        </form>
    </div>

    <!-- Testimonials Grid -->
    <?php if (empty($testimonials)): ?>
    <div class="empty-state">
        <div class="empty-icon">
            <i class="fas fa-comments"></i>
        </div>
        <h3 class="empty-title">Belum Ada Testimoni</h3>
        <p class="empty-text">
            Testimoni dari pelanggan akan muncul di sini
        </p>
    </div>
    <?php else: ?>
    <div class="testimonials-grid">
        <?php foreach ($testimonials as $testimonial): ?>
        <div class="testimonial-card">
            <!-- Card Header -->
            <div class="card-header">
                <div class="customer-info">
                    <div class="customer-avatar">
                        <?= strtoupper(substr($testimonial->nama_lengkap, 0, 2)) ?>
                    </div>
                    <div class="customer-details">
                        <div class="customer-name"><?= $testimonial->nama_lengkap ?></div>
                        <div class="product-name"><?= $testimonial->judul_testimoni ?></div>
                    </div>
                </div>
                
                <?php if ($testimonial->status == 'pending'): ?>
                    <span class="badge badge-pending">
                        <i class="fas fa-clock"></i> Pending
                    </span>
                <?php else: ?>
                    <span class="badge badge-approved">
                        <i class="fas fa-check"></i> Approved
                    </span>
                <?php endif; ?>
            </div>

            <!-- Rating -->
            <div class="rating-stars">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <?php if($i <= $testimonial->rating): ?>
                        <i class="fas fa-star"></i>
                    <?php else: ?>
                        <i class="far fa-star"></i>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>

            <!-- Testimonial Content -->
            <h3 class="testimonial-title"><?= $testimonial->judul_testimoni ?></h3>
            <p class="testimonial-text"><?= $testimonial->isi_testimoni ?></p>

            <!-- Card Footer -->
            <div class="card-footer">
                <div class="testimonial-date">
                    <i class="far fa-calendar"></i>
                    <?= date('d-m-Y', strtotime($testimonial->created_at)) ?>
                </div>
                
                <div class="action-buttons">
                    <?php if ($testimonial->status == 'pending'): ?>
                    <a href="<?= base_url('admin/testimoni/approve/' . $testimonial->id) ?>" 
                       class="btn-action btn-approve" 
                       onclick="return confirm('Setujui testimoni ini?')">
                        <i class="fas fa-check"></i> Setujui
                    </a>
                    <a href="<?= base_url('admin/testimoni/reject/' . $testimonial->id) ?>" 
                       class="btn-action btn-reject" 
                       onclick="return confirm('Tolak testimoni ini?')">
                        <i class="fas fa-times"></i> Tolak
                    </a>
                    <?php else: ?>
                    <a href="<?= base_url('admin/testimoni/delete/' . $testimonial->id) ?>" 
                       class="btn-action btn-delete" 
                       onclick="return confirm('Hapus testimoni ini?')">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>