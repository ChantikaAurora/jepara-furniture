<?php
/**
 * File: application/views/page/about.php
 * About page - Updated with Home Style
 */
?>

<style>
/* ============================================
   ABOUT PAGE - FURNI TEMPLATE
   ============================================ */

/* HERO SECTION - Matching Home */
.about-hero {
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

/* About Wrapper */
.about-wrapper {
    background: #eff2f1 !important;
    padding: 50px 0 80px !important;
}

/* About Intro Section */
.about-intro {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    margin-bottom: 60px;
    background: white;
    padding: 60px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
}

.intro-text h2 {
    font-size: 36px;
    font-weight: 800;
    color: #2f2f2f;
    margin-bottom: 24px;
}

.intro-text p {
    font-size: 16px;
    line-height: 1.8;
    color: #6a6a6a;
    margin-bottom: 20px;
}

.intro-image {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    aspect-ratio: 4/3;
    background: #f5f5f5;
}

.intro-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

/* Section Title */
.section-title {
    font-size: 40px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    text-align: center !important;
    margin-bottom: 50px !important;
}

.section-title::after {
    content: '';
    display: block;
    width: 120px;
    height: 4px;
    background: #3b5d50;
    margin: 16px auto 0;
    border-radius: 2px;
}

/* Values Section */
.our-values {
    margin-bottom: 60px;
}

.values-grid {
    display: grid !important;
    grid-template-columns: repeat(4, 1fr) !important;
    gap: 30px !important;
}

.value-card {
    background: white !important;
    padding: 40px 32px !important;
    border-radius: 20px !important;
    text-align: center !important;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06) !important;
    transition: all 0.3s ease !important;
    border: none !important;
}

.value-card:hover {
    transform: translateY(-8px) !important;
    box-shadow: 0 12px 32px rgba(0,0,0,0.12) !important;
}

.value-card i {
    font-size: 48px !important;
    color: #3b5d50 !important;
    margin-bottom: 24px !important;
    display: block !important;
}

.value-card h3 {
    font-size: 20px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 16px !important;
}

.value-card p {
    font-size: 15px !important;
    line-height: 1.7 !important;
    color: #6a6a6a !important;
    margin: 0 !important;
}

/* Services Section */
.our-services {
    margin-bottom: 60px;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
}

.service-item {
    display: flex;
    align-items: flex-start;
    gap: 24px;
    padding: 32px;
    background: white;
    border-radius: 16px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    transition: all 0.2s ease;
}

.service-item:hover {
    transform: translateX(8px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.service-item i {
    font-size: 40px;
    color: #3b5d50;
    flex-shrink: 0;
}

.service-item h3 {
    font-size: 20px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 8px;
}

.service-item p {
    font-size: 15px;
    line-height: 1.6;
    color: #6a6a6a;
    margin: 0;
}

/* Contact Section */
.contact-section {
    margin-bottom: 60px;
}

.contact-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

/* Contact Info */
.contact-info-card {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    display: flex;
    flex-direction: column;
    gap: 32px;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 20px;
}

.contact-item i {
    font-size: 28px;
    color: #3b5d50;
    flex-shrink: 0;
    margin-top: 4px;
}

.contact-item h3 {
    font-size: 16px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 6px;
}

.contact-item p {
    font-size: 15px;
    line-height: 1.6;
    color: #6a6a6a;
    margin: 0;
}

/* Google Maps */
.map-container {
    background: white;
    padding: 24px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
}

.map-container h3 {
    font-size: 20px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.map-container h3 i {
    color: #3b5d50;
}

.map-wrapper {
    border-radius: 16px;
    overflow: hidden;
    height: 400px;
}

.map-wrapper iframe {
    width: 100%;
    height: 100%;
    border: none;
}

/* Social Media */
.social-media {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    grid-column: 1 / -1;
}

.social-media h3 {
    font-size: 24px;
    font-weight: 700;
    color: #2f2f2f;
    margin-bottom: 24px;
    text-align: center;
}

.social-links {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    max-width: 1000px;
    margin: 0 auto;
}

.social-btn {
    padding: 20px 24px;
    border-radius: 16px;
    text-decoration: none;
    font-weight: 600;
    font-size: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    transition: all 0.2s ease;
    border: 2px solid transparent;
}

.social-btn i {
    font-size: 24px;
}

.social-btn.whatsapp {
    background: #25D366;
    color: white;
}

.social-btn.whatsapp:hover {
    background: #128C7E;
    transform: translateY(-2px);
}

.social-btn.instagram {
    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
    color: white;
}

.social-btn.instagram:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(220,39,67,0.3);
}

.social-btn.facebook {
    background: #1877F2;
    color: white;
}

.social-btn.facebook:hover {
    background: #145dbf;
    transform: translateY(-2px);
}

.social-btn.tiktok {
    background: #000000;
    color: white;
}

.social-btn.tiktok:hover {
    background: #333333;
    transform: translateY(-2px);
}

/* CTA Section */
.cta-section {
    background: #3b5d50;
    padding: 60px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 8px 32px rgba(59, 93, 80, 0.3);
}

.cta-section h2 {
    font-size: 36px;
    font-weight: 800;
    color: white;
    margin-bottom: 16px;
}

.cta-section p {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 40px;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

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
    transform: translateY(-2px) !important;
}

.btn-outline {
    background: transparent !important;
    color: white !important;
    border: 2px solid white !important;
}

.btn-outline:hover {
    background: white !important;
    color: #3b5d50 !important;
}

/* RESPONSIVE */
@media (max-width: 1024px) {
    .hero-content {
        gap: 40px !important;
    }

    .about-intro {
        grid-template-columns: 1fr;
        gap: 40px;
    }

    .values-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }

    .services-grid {
        grid-template-columns: 1fr;
    }

    .contact-layout {
        grid-template-columns: 1fr;
    }

    .social-links {
        grid-template-columns: repeat(2, 1fr);
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

    .about-intro,
    .contact-info-card,
    .map-container,
    .social-media,
    .cta-section {
        padding: 32px 24px;
    }

    .intro-text h2,
    .section-title {
        font-size: 28px !important;
    }

    .cta-section h2 {
        font-size: 28px;
    }

    .values-grid {
        grid-template-columns: 1fr !important;
    }

    .social-links {
        grid-template-columns: 1fr;
    }

    .cta-buttons {
        flex-direction: column;
    }

    .btn {
        width: 100% !important;
        justify-content: center !important;
    }
    
    .about-wrapper {
        padding: 40px 0 60px !important;
    }
}
</style>

<!-- About Hero Section - Matching Home Style -->
<div class="about-hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Tentang Kami</h1>
                <p>Mengenal lebih dekat <?= isset($store->nama_toko) ? htmlspecialchars($store->nama_toko) : 'Jepara Indah Furniture' ?> dan komitmen kami untuk memberikan yang terbaik</p>
                
                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <a href="<?= base_url() ?>">
                        <i class="fas fa-home"></i> Home
                    </a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Tentang Kami</span>
                </div>
            </div>
            
            <div class="hero-image">
                <img src="<?= base_url('assets/images/rehap-hero.png') ?>" 
                     alt="Tentang Kami" 
                     onerror="this.src='https://via.placeholder.com/600x400/3b5d50/ffffff?text=Tentang+Kami'">
            </div>
        </div>
    </div>
</div>

<!-- About Content -->
<div class="about-wrapper">
    <div class="container">
        
        <!-- About Intro -->
        <section class="about-intro">
            <div class="intro-text">
                <h2><?= isset($store->nama_toko) ? htmlspecialchars($store->nama_toko) : 'Jepara Indah Furniture' ?></h2>
                
                <?php if (isset($store->deskripsi_toko) && !empty($store->deskripsi_toko)): ?>
                    <p><?= nl2br(htmlspecialchars($store->deskripsi_toko)) ?></p>
                <?php else: ?>
                    <p>Kami adalah perusahaan furniture yang berlokasi di Padang, Sumatera Barat, yang mengkhususkan diri dalam pembuatan dan penjualan furniture berkualitas tinggi dengan sentuhan khas Jepara.</p>
                    <p>Dengan pengalaman lebih dari 10 tahun di industri furniture, kami berkomitmen untuk memberikan produk terbaik dengan harga yang kompetitif dan pelayanan yang memuaskan.</p>
                    <p>Setiap produk kami dibuat dengan teliti menggunakan bahan pilihan dan dikerjakan oleh pengrajin berpengalaman untuk menghasilkan furniture yang tidak hanya indah, tetapi juga tahan lama dan fungsional.</p>
                <?php endif; ?>
            </div>
            <div class="intro-image">
                <?php if (isset($store->foto_toko) && !empty($store->foto_toko)): ?>
                    <img src="<?= base_url('uploads/store/' . $store->foto_toko) ?>" 
                         alt="<?= htmlspecialchars($store->nama_toko ?? 'Toko Kami') ?>">
                <?php else: ?>
                    <img src="<?= base_url('assets/images/about-us.jpg') ?>" 
                         alt="<?= htmlspecialchars($store->nama_toko ?? 'Toko Kami') ?>"
                         onerror="this.src='https://via.placeholder.com/600x400/eff2f1/6a6a6a?text=Toko+Kami'">
                <?php endif; ?>
            </div>
        </section>
        
        <!-- Our Values -->
        <section class="our-values">
            <h2 class="section-title">Nilai-Nilai Kami</h2>
            <div class="values-grid">
                <div class="value-card">
                    <i class="fas fa-certificate"></i>
                    <h3>Kualitas Terjamin</h3>
                    <p>Kami hanya menggunakan bahan baku pilihan dan proses produksi yang terkontrol untuk menghasilkan furniture berkualitas tinggi.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-handshake"></i>
                    <h3>Kepercayaan</h3>
                    <p>Kepuasan pelanggan adalah prioritas utama kami. Kami selalu menjaga kepercayaan yang diberikan pelanggan.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-lightbulb"></i>
                    <h3>Inovasi</h3>
                    <p>Kami terus berinovasi dalam desain dan teknik pembuatan untuk menghadirkan produk yang modern dan fungsional.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-users"></i>
                    <h3>Pelayanan Terbaik</h3>
                    <p>Tim kami siap membantu Anda dari konsultasi hingga purna jual dengan pelayanan yang ramah dan profesional.</p>
                </div>
            </div>
        </section>
        
        <!-- Our Services -->
        <section class="our-services">
            <h2 class="section-title">Layanan Kami</h2>
            <div class="services-grid">
                <div class="service-item">
                    <i class="fas fa-couch"></i>
                    <div>
                        <h3>Penjualan Furniture</h3>
                        <p>Berbagai pilihan furniture berkualitas untuk rumah dan kantor Anda dengan desain elegan dan modern.</p>
                    </div>
                </div>
                <div class="service-item">
                    <i class="fas fa-paint-brush"></i>
                    <div>
                        <h3>Custom Furniture</h3>
                        <p>Pembuatan furniture sesuai desain dan ukuran yang Anda inginkan dengan konsultasi gratis.</p>
                    </div>
                </div>
                <div class="service-item">
                    <i class="fas fa-tools"></i>
                    <div>
                        <h3>Layanan Rehap</h3>
                        <p>Perbaikan dan renovasi furniture lama menjadi seperti baru dengan hasil yang memuaskan.</p>
                    </div>
                </div>
                <div class="service-item">
                    <i class="fas fa-shipping-fast"></i>
                    <div>
                        <h3>Pengiriman</h3>
                        <p>Pengiriman ke seluruh Indonesia dengan packing yang aman dan garansi produk sampai dengan selamat.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Contact Information -->
        <section class="contact-section">
            <h2 class="section-title">Hubungi Kami</h2>
            <div class="contact-layout">
                
                <!-- Contact Info -->
                <div class="contact-info-card">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h3>Alamat Toko</h3>
                            <p><?= isset($store->alamat) && !empty($store->alamat) ? nl2br(htmlspecialchars($store->alamat)) : 'Jl. Raya Furniture No. 123, Padang, Sumatera Barat' ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3>Telepon</h3>
                            <p><?= isset($store->no_telepon) && !empty($store->no_telepon) ? htmlspecialchars($store->no_telepon) : '0751-123456' ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Email</h3>
                            <p><?= isset($store->email) && !empty($store->email) ? htmlspecialchars($store->email) : 'info@jeparaindah.com' ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3>Jam Operasional</h3>
                            <p>
                                <?php 
                                $jam_senin_jumat = isset($store->jam_senin_jumat) && !empty($store->jam_senin_jumat) ? $store->jam_senin_jumat : '08:00 - 17:00 WIB';
                                $jam_sabtu = isset($store->jam_sabtu) && !empty($store->jam_sabtu) ? $store->jam_sabtu : '08:00 - 15:00 WIB';
                                $jam_minggu = isset($store->jam_minggu) && !empty($store->jam_minggu) ? $store->jam_minggu : 'Tutup';
                                ?>
                                <strong>Senin - Jumat:</strong> <?= htmlspecialchars($jam_senin_jumat) ?><br>
                                <strong>Sabtu:</strong> <?= htmlspecialchars($jam_sabtu) ?><br>
                                <strong>Minggu:</strong> <?= htmlspecialchars($jam_minggu) ?>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Google Maps -->
                <div class="map-container">
                    <h3><i class="fas fa-map-marked-alt"></i> Lokasi Toko</h3>
                    <div class="map-wrapper">
                        <?php if (isset($store->google_maps) && !empty($store->google_maps)): ?>
                            <?= $store->google_maps ?>
                        <?php else: ?>
                            <!-- Default Google Maps - Padang, Sumatera Barat -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3055555555555!2d100.35277777777778!3d-0.9477777777777778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwNTYnNTIuMCJTIDEwMMKwMjEnMTAuMCJF!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="social-media">
                    <h3>Ikuti Kami di Social Media</h3>
                    <div class="social-links">
                        <?php if (isset($store->whatsapp) && !empty($store->whatsapp)): ?>
                        <a href="https://wa.me/<?= htmlspecialchars($store->whatsapp) ?>" 
                           target="_blank" 
                           class="social-btn whatsapp">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                        <?php endif; ?>
                        
                        <?php if (isset($store->instagram) && !empty($store->instagram)): ?>
                        <a href="https://instagram.com/<?= str_replace('@', '', htmlspecialchars($store->instagram)) ?>" 
                           target="_blank" 
                           class="social-btn instagram">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                        <?php endif; ?>
                        
                        <?php if (isset($store->facebook) && !empty($store->facebook)): ?>
                        <a href="https://facebook.com/<?= str_replace('@', '', htmlspecialchars($store->facebook)) ?>" 
                           target="_blank" 
                           class="social-btn facebook">
                            <i class="fab fa-facebook"></i> Facebook
                        </a>
                        <?php endif; ?>
                        
                        <?php if (isset($store->tiktok) && !empty($store->tiktok)): ?>
                        <a href="https://tiktok.com/@<?= str_replace('@', '', htmlspecialchars($store->tiktok)) ?>" 
                           target="_blank" 
                           class="social-btn tiktok">
                            <i class="fab fa-tiktok"></i> TikTok
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</div>