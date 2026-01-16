<?php
/**
 * File: application/views/rehap/index.php
 * Rehap Service Landing Page - Furni Template Style
 */
?>

<style>
/* Rehap Page - Furni Style */

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

.btn {
    padding: 14px 35px !important;
    border-radius: 30px !important;
    font-weight: 600 !important;
    font-size: 16px !important;
    text-decoration: none !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 10px !important;
    transition: all 0.3s ease !important;
    border: none !important;
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

/* Stats Bar */
.stats-section {
    background: #eff2f1 !important;
    padding: 60px 0 !important;
}

.stats-grid {
    display: grid !important;
    grid-template-columns: repeat(4, 1fr) !important;
    gap: 40px !important;
}

.stat-item {
    text-align: center !important;
}

.stat-item i {
    font-size: 48px !important;
    color: #3b5d50 !important;
    margin-bottom: 15px !important;
}

.stat-item .stat-number {
    font-size: 36px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    display: block !important;
    margin-bottom: 8px !important;
}

.stat-item .stat-label {
    font-size: 14px !important;
    color: #6a6a6a !important;
    font-weight: 600 !important;
}

/* Service Info Section */
.service-section {
    padding: 80px 0 !important;
    background: #ffffff !important;
}

.section-title {
    font-size: 40px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 20px !important;
    text-align: center !important;
}

.section-subtitle {
    text-align: center !important;
    font-size: 16px !important;
    color: #6a6a6a !important;
    max-width: 700px !important;
    margin: 0 auto 50px !important;
    line-height: 1.7 !important;
}

.features-grid {
    display: grid !important;
    grid-template-columns: repeat(4, 1fr) !important;
    gap: 30px !important;
}

.feature-card {
    background: #dce5e4 !important;
    border-radius: 10px !important;
    padding: 35px 25px !important;
    text-align: center !important;
    transition: all 0.3s ease !important;
}

.feature-card:hover {
    background: #3b5d50 !important;
}

.feature-card i {
    font-size: 40px !important;
    color: #3b5d50 !important;
    margin-bottom: 20px !important;
    transition: all 0.3s ease !important;
}

.feature-card:hover i {
    color: #ffffff !important;
}

.feature-card h3 {
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 10px !important;
    transition: all 0.3s ease !important;
}

.feature-card:hover h3 {
    color: #ffffff !important;
}

.feature-card p {
    font-size: 14px !important;
    color: #6a6a6a !important;
    margin: 0 !important;
    line-height: 1.6 !important;
    transition: all 0.3s ease !important;
}

.feature-card:hover p {
    color: rgba(255, 255, 255, 0.8) !important;
}

/* Process Section */
.process-section {
    padding: 80px 0 !important;
    background: #eff2f1 !important;
}

.process-steps {
    display: grid !important;
    grid-template-columns: repeat(5, 1fr) !important;
    gap: 30px !important;
    margin-top: 50px !important;
}

.step {
    background: #ffffff !important;
    border-radius: 10px !important;
    padding: 30px 20px !important;
    text-align: center !important;
}

.step-number {
    width: 60px !important;
    height: 60px !important;
    background: #3b5d50 !important;
    color: #ffffff !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 24px !important;
    font-weight: 700 !important;
    margin: 0 auto 20px !important;
}

.step h3 {
    font-size: 16px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 10px !important;
}

.step p {
    font-size: 13px !important;
    color: #6a6a6a !important;
    line-height: 1.5 !important;
    margin: 0 !important;
}

/* Why Choose Section */
.why-section {
    padding: 80px 0 !important;
    background: #ffffff !important;
}

.why-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 30px !important;
}

.why-item {
    background: #dce5e4 !important;
    padding: 40px 30px !important;
    border-radius: 10px !important;
}

.why-item i {
    font-size: 40px !important;
    color: #3b5d50 !important;
    margin-bottom: 20px !important;
}

.why-item h3 {
    font-size: 20px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 12px !important;
}

.why-item p {
    font-size: 15px !important;
    color: #6a6a6a !important;
    line-height: 1.7 !important;
    margin: 0 !important;
}

/* CTA Section */
.cta-section {
    padding: 80px 0 !important;
    background: #3b5d50 !important;
    text-align: center !important;
}

.cta-section h2 {
    font-size: 40px !important;
    font-weight: 700 !important;
    color: #ffffff !important;
    margin-bottom: 15px !important;
}

.cta-section p {
    font-size: 18px !important;
    color: rgba(255, 255, 255, 0.8) !important;
    margin-bottom: 35px !important;
}

.cta-buttons {
    display: flex !important;
    gap: 15px !important;
    justify-content: center !important;
    flex-wrap: wrap !important;
}

/* Responsive */
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
    
    .features-grid,
    .why-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
    
    .process-steps {
        grid-template-columns: repeat(2, 1fr) !important;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}

@media (max-width: 768px) {
    .hero-text h1 {
        font-size: 32px !important;
    }
    
    .features-grid,
    .why-grid,
    .process-steps,
    .stats-grid {
        grid-template-columns: 1fr !important;
    }
    
    .service-section,
    .process-section,
    .why-section,
    .cta-section {
        padding: 50px 0 !important;
    }
}
</style>
 <?php $this->load->view('templates/navbar'); ?>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Layanan Rehap Furniture</h1>
                <p>Perbaikan dan renovasi furniture lama Anda menjadi seperti baru kembali dengan hasil yang memuaskan dan harga terjangkau</p>
                <div class="hero-buttons">
                    <?php if ($this->session->userdata('logged_in')): ?>
                    <a href="<?= base_url('rehap/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Ajukan Permintaan
                    </a>
                    <a href="<?= base_url('rehap/my_requests') ?>" class="btn btn-outline-white">
                        <i class="fas fa-list"></i>
                        Lihat Permintaan Saya
                    </a>
                    <?php else: ?>
                    <a href="<?= base_url('auth/login') ?>" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        Login untuk Ajukan
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="hero-image">
                <img src="<?= base_url('assets/images/rehap-hero.png') ?>" alt="Rehap Furniture"
                     onerror="this.src='https://via.placeholder.com/600x400/3b5d50/ffffff?text=Rehap+Furniture'">
            </div>
        </div>
    </div>
</div>

<!-- Service Info -->
<section class="service-section">
    <div class="container">
        <h2 class="section-title">Apa itu Layanan Rehap?</h2>
        <p class="section-subtitle">
            Layanan rehap adalah jasa perbaikan dan renovasi furniture yang sudah lama atau rusak. 
            Tim ahli kami akan memperbaiki, mengganti bagian yang rusak, dan memberikan finishing baru 
            sehingga furniture Anda tampak seperti baru kembali.
        </p>
        
        <div class="features-grid">
            <div class="feature-card">
                <i class="fas fa-tools"></i>
                <h3>Perbaikan Struktur</h3>
                <p>Memperbaiki bagian yang rusak, patah, atau tidak kokoh</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-paint-roller"></i>
                <h3>Finishing Ulang</h3>
                <p>Cat ulang dengan warna pilihan dan finishing berkualitas</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-couch"></i>
                <h3>Ganti Kain/Busa</h3>
                <p>Penggantian kain pelapis dan busa kursi/sofa</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-hammer"></i>
                <h3>Modifikasi Desain</h3>
                <p>Ubah desain sesuai keinginan dengan konsultasi gratis</p>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="process-section">
    <div class="container">
        <h2 class="section-title">Proses Layanan Rehap</h2>
        <p class="section-subtitle">
            Mudah, cepat, dan transparan - dari konsultasi hingga pengiriman
        </p>
        
        <div class="process-steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Ajukan Permintaan</h3>
                <p>Upload foto furniture dan jelaskan kebutuhannya</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Konsultasi</h3>
                <p>Tim kami memberikan estimasi biaya dan waktu</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Persetujuan</h3>
                <p>Setujui penawaran dan lakukan pembayaran DP</p>
            </div>
            <div class="step">
                <div class="step-number">4</div>
                <h3>Pengerjaan</h3>
                <p>Furniture dikerjakan oleh tim ahli kami</p>
            </div>
            <div class="step">
                <div class="step-number">5</div>
                <h3>Selesai</h3>
                <p>Furniture selesai dan dikirim kembali</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-section">
    <div class="container">
        <h2 class="section-title">Mengapa Pilih Kami?</h2>
        
        <div class="why-grid">
            <div class="why-item">
                <i class="fas fa-user-tie"></i>
                <h3>Craftsman Berpengalaman</h3>
                <p>Tim ahli dengan pengalaman 15+ tahun dalam perbaikan dan restorasi furniture berkualitas tinggi</p>
            </div>
            <div class="why-item">
                <i class="fas fa-shield-alt"></i>
                <h3>Garansi Hasil</h3>
                <p>Kami memberikan garansi untuk setiap pekerjaan rehap yang kami lakukan</p>
            </div>
            <div class="why-item">
                <i class="fas fa-gem"></i>
                <h3>Material Berkualitas</h3>
                <p>Menggunakan bahan-bahan premium dan cat berkualitas untuk hasil terbaik</p>
            </div>
            <div class="why-item">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>Harga Transparan</h3>
                <p>Estimasi biaya jelas tanpa biaya tersembunyi, konsultasi gratis</p>
            </div>
            <div class="why-item">
                <i class="fas fa-truck"></i>
                <h3>Pickup & Delivery</h3>
                <p>Layanan antar-jemput furniture untuk kemudahan Anda</p>
            </div>
            <div class="why-item">
                <i class="fas fa-comments"></i>
                <h3>Konsultasi Gratis</h3>
                <p>Konsultasi desain dan material tanpa biaya tambahan</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Siap Merehap Furniture Anda?</h2>
        <p>Hubungi kami untuk konsultasi gratis atau ajukan permintaan rehap sekarang juga</p>
        <div class="cta-buttons">
            <?php if ($this->session->userdata('logged_in')): ?>
            <a href="<?= base_url('rehap/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajukan Permintaan Rehap
            </a>
            <a href="<?= base_url('rehap/my_requests') ?>" class="btn btn-outline-white">
                <i class="fas fa-list"></i> Lihat Permintaan Saya
            </a>
            <?php else: ?>
            <a href="<?= base_url('auth/login') ?>" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i> Login untuk Ajukan Permintaan
            </a>
            <?php endif; ?>
        </div>
    </div>
</section>