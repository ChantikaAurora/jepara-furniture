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
}
.btn-back:hover {
    background: rgba(255, 255, 255, 0.3) !important;
    border-color: rgba(255, 255, 255, 0.5) !important;
}
.form-section { 
    padding: 60px 0 !important; 
    background: #ffffff !important; 
}
.form-card { 
    background: #ffffff !important; 
    border: 1px solid #dee2e6 !important; 
    border-radius: 10px !important; 
    padding: 40px !important; 
    margin-bottom: 30px !important;
}
.order-info-box {
    background: #f8f9fa !important;
    border-left: 4px solid #3b5d50 !important;
    padding: 20px !important;
    border-radius: 8px !important;
    margin-bottom: 30px !important;
}
.order-info-box h6 {
    color: #3b5d50 !important;
    font-weight: 700 !important;
    margin-bottom: 12px !important;
}
.order-info-box p {
    margin-bottom: 8px !important;
    color: #2f2f2f !important;
}
.form-group { 
    margin-bottom: 25px !important; 
}
.form-group label { 
    font-size: 15px !important; 
    font-weight: 600 !important; 
    color: #2f2f2f !important; 
    margin-bottom: 10px !important; 
    display: block !important;
}
.required { 
    color: #e63946 !important; 
}
.form-control { 
    width: 100% !important; 
    padding: 14px 18px !important; 
    border: 2px solid #efefef !important; 
    border-radius: 8px !important; 
    font-size: 15px !important; 
    transition: all 0.3s ease !important;
}
.form-control:focus { 
    border-color: #3b5d50 !important; 
    outline: none !important; 
    box-shadow: 0 0 0 3px rgba(59, 93, 80, 0.1) !important;
}
textarea.form-control { 
    resize: vertical !important; 
    min-height: 150px !important;
}
.rating-input-wrapper {
    display: flex !important;
    flex-direction: row-reverse !important;
    justify-content: flex-end !important;
    gap: 10px !important;
    font-size: 2.5rem !important;
    margin-bottom: 8px !important;
}
.rating-input-wrapper input[type="radio"] {
    display: none !important;
}
.rating-input-wrapper label {
    cursor: pointer !important;
    color: #ddd !important;
    transition: color 0.2s !important;
    margin: 0 !important;
}
.rating-input-wrapper label:hover,
.rating-input-wrapper label:hover ~ label,
.rating-input-wrapper input[type="radio"]:checked ~ label {
    color: #f9bf29 !important;
}
.form-actions { 
    display: flex !important; 
    gap: 15px !important; 
    margin-top: 40px !important; 
    padding-top: 30px !important;
    border-top: 2px solid #eff2f1 !important;
}
.btn { 
    padding: 14px 32px !important; 
    border-radius: 30px !important; 
    font-weight: 600 !important; 
    font-size: 15px !important; 
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
.btn-primary { 
    background: #f9bf29 !important; 
    color: #2f2f2f !important; 
}
.btn-primary:hover { 
    background: #e6ac1a !important; 
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 12px rgba(249, 191, 41, 0.3) !important;
}
.sidebar-info { 
    background: #3b5d50 !important; 
    border-radius: 10px !important; 
    padding: 30px !important; 
    color: #ffffff !important;
}
.sidebar-info h5 { 
    font-size: 20px !important; 
    font-weight: 700 !important; 
    margin-bottom: 20px !important;
}
.sidebar-info ul { 
    list-style: none !important; 
    padding: 0 !important; 
    margin: 0 !important;
}
.sidebar-info ul li { 
    margin-bottom: 15px !important; 
    padding-left: 30px !important; 
    position: relative !important;
    line-height: 1.6 !important;
}
.sidebar-info ul li i { 
    position: absolute !important; 
    left: 0 !important; 
    top: 2px !important; 
    color: #f9bf29 !important;
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
.alert-danger { 
    background: #f8d7da !important; 
    color: #721c24 !important; 
}
.alert i { 
    font-size: 20px !important; 
}

@media (max-width: 768px) {
    .page-header-content { 
        flex-direction: column !important; 
        gap: 20px !important; 
        align-items: flex-start !important;
    }
    .btn-back {
        order: -1 !important;
    }
    .form-card { 
        padding: 25px !important; 
    }
    .form-actions { 
        flex-direction: column !important; 
    }
    .btn { 
        width: 100% !important; 
        justify-content: center !important; 
    }
}
</style>

<?php $this->load->view('templates/navbar'); ?>

<div class="page-header">
    <div class="container">
        <div class="page-header-content">
            <div>
                <h1>Tulis Testimoni</h1>
                <p>Bagikan pengalaman Anda dengan produk kami</p>
            </div>
            <a href="<?= base_url('testimonial') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<section class="form-section">
    <div class="container">
        
        <!-- Alert Messages -->
        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <div><?= $this->session->flashdata('error') ?></div>
        </div>
        <?php endif; ?>
        
        <?php if (validation_errors()): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <div><?= validation_errors() ?></div>
        </div>
        <?php endif; ?>

        <div class="row">
            <!-- Form Section -->
            <div class="col-lg-8">
                <div class="form-card">
                    
                    <!-- Order Info -->
                    <?php if (isset($order) && $order): ?>
                    <div class="order-info-box">
                        <h6><i class="fas fa-receipt"></i> Informasi Pesanan</h6>
                        <p><strong>Kode Pesanan:</strong> <?= $order->kode_pesanan ?></p>
                        <p><strong>Tanggal Pesanan:</strong> <?= date('d F Y', strtotime($order->created_at)) ?></p>
                    </div>
                    <?php endif; ?>

                    <!-- Form -->
                    <form method="POST" action="<?= base_url('testimonial/create/' . (isset($order) ? $order->id : '')) ?>" enctype="multipart/form-data">
                        
                        <input type="hidden" name="order_id" value="<?= isset($order) ? $order->id : '' ?>">
                        
                        <!-- Rating -->
                        <div class="form-group">
                            <label>Rating <span class="required">*</span></label>
                            <div class="rating-input-wrapper">
                                <?php for ($i = 5; $i >= 1; $i--): ?>
                                <input type="radio" 
                                       id="star<?= $i ?>" 
                                       name="rating" 
                                       value="<?= $i ?>" 
                                       <?= set_value('rating') == $i ? 'checked' : '' ?>
                                       required>
                                <label for="star<?= $i ?>">
                                    <i class="fas fa-star"></i>
                                </label>
                                <?php endfor; ?>
                            </div>
                            <small style="color: #6a6a6a;">Pilih rating dari 1 sampai 5 bintang</small>
                        </div>
                        
                        <!-- Judul -->
                        <div class="form-group">
                            <label for="judul">Judul Testimoni <span class="required">*</span></label>
                            <input type="text" 
                                   class="form-control" 
                                   id="judul" 
                                   name="judul" 
                                   value="<?= set_value('judul') ?>" 
                                   placeholder="Contoh: Produk Berkualitas Tinggi!"
                                   required>
                        </div>
                        
                        <!-- Isi Testimoni -->
                        <div class="form-group">
                            <label for="isi">Testimoni Anda <span class="required">*</span></label>
                            <textarea class="form-control" 
                                      id="isi" 
                                      name="isi" 
                                      placeholder="Ceritakan pengalaman Anda dengan produk kami..."
                                      required><?= set_value('isi') ?></textarea>
                            <small style="color: #6a6a6a;">Minimal 20 karakter</small>
                        </div>
                        
                        <!-- Upload Foto -->
                        <div class="form-group">
                            <label for="foto">Foto Produk <span style="color: #6a6a6a;">(Opsional)</span></label>
                            <input type="file" 
                                   class="form-control" 
                                   id="foto" 
                                   name="foto" 
                                   accept="image/*">
                            <small style="color: #6a6a6a;">Format: JPG, PNG. Maksimal 2MB</small>
                        </div>
                        
                        <!-- Buttons -->
                        <div class="form-actions">
                            <a href="<?= base_url('testimonial') ?>" class="btn btn-outline">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Kirim Testimoni
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="col-lg-4">
                <div class="sidebar-info">
                    <h5><i class="fas fa-info-circle"></i> Panduan Testimoni</h5>
                    <ul>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            Berikan rating yang sesuai dengan pengalaman Anda
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            Tulis judul yang menarik dan deskriptif
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            Ceritakan pengalaman Anda secara jujur
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            Testimoni akan ditinjau oleh admin sebelum dipublikasikan
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</section>