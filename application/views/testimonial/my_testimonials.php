<style>
.page-header { 
    background: #3b5d50 !important; 
    padding: 40px 0 !important; 
    margin-bottom: 40px !important; 
    border-radius: 0 !important;
}
.page-header .container {
    border-radius: 0 !important;
}
.page-header * {
    border-radius: 0 !important;
}
.page-header h1 { 
    font-size: 36px !important; 
    font-weight: 700 !important; 
    color: #ffffff !important; 
    margin: 0 !important; 
}
.page-header p {
    color: #ffffff !important;
    opacity: 0.9 !important;
    margin-top: 8px !important;
}
.page-header-right {
    display: flex !important;
    gap: 12px !important;
}
.btn-back {
    background: rgba(255, 255, 255, 0.2) !important;
    color: #ffffff !important;
    padding: 12px 24px !important;
    border-radius: 30px !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    text-decoration: none !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    transition: all 0.3s ease !important;
    border: 2px solid rgba(255, 255, 255, 0.3) !important;
    white-space: nowrap !important;
}
.btn-back:hover {
    background: rgba(255, 255, 255, 0.3) !important;
    border-color: rgba(255, 255, 255, 0.5) !important;
    color: #ffffff !important;
}
.testimonials-section { 
    padding: 60px 0 !important; 
    background: #ffffff !important; 
}
.testimonials-grid { 
    display: grid !important; 
    gap: 25px !important; 
}
.testimonial-card { 
    background: #ffffff !important; 
    border: 1px solid #dee2e6 !important; 
    border-radius: 10px !important; 
    padding: 30px !important; 
    transition: all 0.3s ease !important; 
}
.testimonial-card:hover { 
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important; 
}
.card-top {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    margin-bottom: 20px !important;
}
.rating-stars { 
    display: flex !important; 
    gap: 4px !important;
}
.rating-stars i { 
    font-size: 18px !important; 
}
.rating-stars .fas { 
    color: #f9bf29 !important; 
}
.rating-stars .far { 
    color: #ddd !important; 
}
.badge { 
    display: inline-block !important; 
    padding: 8px 16px !important; 
    border-radius: 20px !important; 
    font-size: 13px !important; 
    font-weight: 600 !important; 
}
.badge-pending { 
    background: #fff3cd !important; 
    color: #856404 !important; 
}
.badge-approved { 
    background: #d4edda !important; 
    color: #155724 !important; 
}
.badge-rejected { 
    background: #f8d7da !important; 
    color: #721c24 !important; 
}
.testimonial-title { 
    font-size: 20px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin-bottom: 12px !important; 
}
.testimonial-content { 
    font-size: 15px !important; 
    color: #6a6a6a !important; 
    line-height: 1.7 !important; 
    margin-bottom: 15px !important;
}
.testimonial-image { 
    margin-top: 15px !important; 
    border-radius: 8px !important; 
    overflow: hidden !important; 
    max-width: 300px !important;
}
.testimonial-image img { 
    width: 100% !important; 
    height: auto !important; 
    cursor: pointer !important; 
    transition: transform 0.3s ease !important;
    display: block !important;
}
.testimonial-image img:hover { 
    transform: scale(1.05) !important; 
}
.testimonial-meta { 
    font-size: 13px !important; 
    color: #6a6a6a !important; 
    margin-top: 15px !important;
    display: flex !important;
    align-items: center !important;
    gap: 6px !important;
}
.testimonial-actions { 
    display: flex !important; 
    gap: 12px !important; 
    margin-top: 20px !important;
    padding-top: 20px !important;
    border-top: 2px solid #eff2f1 !important;
}
.btn { 
    padding: 12px 28px !important; 
    border-radius: 30px !important; 
    font-weight: 600 !important; 
    font-size: 14px !important; 
    text-decoration: none !important; 
    display: inline-flex !important; 
    align-items: center !important; 
    gap: 8px !important; 
    transition: all 0.3s ease !important; 
    border: none !important;
    cursor: pointer !important;
}
.btn-outline { 
    background: transparent !important; 
    color: #3b5d50 !important; 
    border: 2px solid #3b5d50 !important; 
}
.btn-outline:hover { 
    background: #3b5d50 !important; 
    color: #ffffff !important; 
}
.btn-danger { 
    background: transparent !important; 
    color: #dc3545 !important; 
    border: 2px solid #dc3545 !important; 
}
.btn-danger:hover { 
    background: #dc3545 !important; 
    color: #ffffff !important; 
}
.btn-primary { 
    background: #f9bf29 !important; 
    color: #2f2f2f !important; 
}
.btn-primary:hover { 
    background: #e6ac1a !important; 
}
.empty-state { 
    text-align: center !important; 
    padding: 80px 40px !important; 
    background: #dce5e4 !important; 
    border-radius: 10px !important; 
}
.empty-state i { 
    font-size: 64px !important; 
    color: #3b5d50 !important; 
    margin-bottom: 20px !important; 
    opacity: 0.5 !important; 
}
.empty-state h3 { 
    font-size: 24px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin-bottom: 12px !important; 
}
.empty-state p { 
    font-size: 16px !important; 
    color: #6a6a6a !important; 
    margin-bottom: 30px !important; 
}
.alert { 
    padding: 18px 24px !important; 
    border-radius: 8px !important; 
    margin-bottom: 30px !important; 
    border: none !important;
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
}
.alert-success { 
    background: #d4edda !important; 
    color: #155724 !important; 
}
.alert-danger { 
    background: #f8d7da !important; 
    color: #721c24 !important; 
}

@media (max-width: 768px) {
    .page-header-content { 
        flex-direction: column !important; 
        gap: 20px !important; 
        align-items: flex-start !important;
    }
    .page-header-right {
        order: -1 !important;
        flex-direction: column !important;
        width: 100% !important;
    }
    .btn-back {
        width: 100% !important;
        justify-content: center !important;
    }
    .card-top { 
        flex-direction: column !important; 
        gap: 15px !important; 
        align-items: flex-start !important;
    }
    .testimonial-actions { 
        flex-direction: column !important; 
    }
    .btn { 
        width: 100% !important; 
        justify-content: center !important; 
    }
    .testimonial-image {
        max-width: 100% !important;
    }
}
</style>

<?php $this->load->view('templates/navbar'); ?>

<div class="page-header">
    <div class="container">
        <div class="page-header-content">
            <div>
                <h1>Testimoni Saya</h1>
                <p>Daftar testimoni yang telah Anda buat</p>
            </div>
            <div class="page-header-right">
                 <a href="<?= base_url('profile') ?>" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Profile
                </a>
                <a href="<?= base_url('testimonial') ?>" class="btn-back">
                    <i class="fas fa-plus"></i> Buat Testimoni Baru
                </a>
               
            </div>
        </div>
    </div>
</div>

<section class="testimonials-section">
    <div class="container">
        
        <!-- Alert Messages -->
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <div><?= $this->session->flashdata('success') ?></div>
        </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <div><?= $this->session->flashdata('error') ?></div>
        </div>
        <?php endif; ?>

        <?php if (empty($testimonials)): ?>
        <div class="empty-state">
            <i class="fas fa-comments"></i>
            <h3>Belum Ada Testimoni</h3>
            <p>Anda belum membuat testimoni. Bagikan pengalaman Anda dengan produk kami!</p>
            <a href="<?= base_url('testimonial') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Buat Testimoni Pertama
            </a>
        </div>
        <?php else: ?>
        <div class="testimonials-grid">
            <?php foreach ($testimonials as $testi): ?>
            <div class="testimonial-card">
                <!-- Top: Rating and Badge -->
                <div class="card-top">
                    <div class="rating-stars">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= $testi->rating): ?>
                                <i class="fas fa-star"></i>
                            <?php else: ?>
                                <i class="far fa-star"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <div>
                        <?php if ($testi->status == 'pending'): ?>
                            <span class="badge badge-pending">
                                <i class="fas fa-clock"></i> Menunggu Persetujuan
                            </span>
                        <?php elseif ($testi->status == 'approved'): ?>
                            <span class="badge badge-approved">
                                <i class="fas fa-check-circle"></i> Disetujui
                            </span>
                        <?php else: ?>
                            <span class="badge badge-rejected">
                                <i class="fas fa-times-circle"></i> Ditolak
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Title -->
                <h3 class="testimonial-title"><?= htmlspecialchars($testi->judul_testimoni) ?></h3>
                
                <!-- Content -->
                <div class="testimonial-content">
                    <?= nl2br(htmlspecialchars($testi->isi_testimoni)) ?>
                </div>
                
                <!-- Image (if exists) -->
                <?php if (!empty($testi->foto_produk)): ?>
                <div class="testimonial-image">
                    <img src="<?= base_url('uploads/testimonials/' . $testi->foto_produk) ?>" 
                         alt="<?= htmlspecialchars($testi->judul_testimoni) ?>">
                </div>
                <?php endif; ?>
                
                <!-- Meta Info -->
                <div class="testimonial-meta">
                    <i class="fas fa-calendar"></i> 
                    <span><?= date('d F Y', strtotime($testi->created_at)) ?></span>
                </div>

                <!-- Action Buttons (Only for Pending) -->
                <?php if ($testi->status == 'pending'): ?>
                <div class="testimonial-actions">
                    <button onclick="deleteTestimonial(<?= $testi->id ?>)" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
// Delete testimonial with confirmation
function deleteTestimonial(id) {
    if (confirm('Apakah Anda yakin ingin menghapus testimoni ini?')) {
        window.location.href = '<?= base_url('testimonial/delete/') ?>' + id;
    }
}

// Auto-hide alerts after 5 seconds
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        alert.style.opacity = '0';
        alert.style.transition = 'opacity 0.3s ease';
        setTimeout(function() {
            alert.remove();
        }, 300);
    });
}, 5000);
</script>