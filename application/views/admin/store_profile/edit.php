<style>
/* Store Profile Edit - Modern Dashboard Theme */
.profile-wrapper {
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

.alert i {
    font-size: 18px;
    margin-top: 2px;
}

/* Main Layout Grid */
.profile-grid {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 24px;
}

/* Left Sidebar - Photo Upload Only */
.sidebar-section {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.upload-card {
    background: white;
    border-radius: 18px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.upload-card-title {
    font-size: 16px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 16px;
}

.upload-preview {
    width: 100%;
    aspect-ratio: 4/3;
    background: linear-gradient(135deg, #f5f1e8, #faf8f3);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    border: 2px dashed #d1d5db;
    position: relative;
    overflow: hidden;
}

.upload-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    padding: 0;
}

.upload-placeholder {
    text-align: center;
    color: #9ca3af;
}

.upload-placeholder i {
    font-size: 48px;
    color: #8B5E3C;
    opacity: 0.3;
    margin-bottom: 12px;
}

.upload-placeholder-text {
    font-size: 14px;
    font-weight: 600;
}

.btn-upload {
    width: 100%;
    padding: 12px 20px;
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.2s ease;
}

.btn-upload:hover {
    background: linear-gradient(135deg, #6d4a2f 0%, #5A3E2B 100%);
    transform: translateY(-2px);
}

.upload-info {
    font-size: 12px;
    color: #9ca3af;
    text-align: center;
    margin-top: 8px;
}

input[type="file"] {
    display: none;
}

/* Right Content - Form Sections */
.content-section {
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.form-section {
    background: white;
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.section-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px solid #f3f4f6;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title i {
    color: #8B5E3C;
    font-size: 20px;
}

/* Form Elements */
.form-group {
    margin-bottom: 20px;
}

.form-group:last-child {
    margin-bottom: 0;
}

.form-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #2d1810;
    margin-bottom: 8px;
}

.required {
    color: #ef4444;
    margin-left: 4px;
}

.form-control {
    width: 100%;
    padding: 14px 18px;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    font-size: 15px;
    transition: all 0.2s ease;
    background: #fafafa;
    font-family: inherit;
}

.form-control:focus {
    outline: none;
    border-color: #8B5E3C;
    background: white;
    box-shadow: 0 0 0 4px rgba(139,94,60,0.1);
}

textarea.form-control {
    min-height: 100px;
    resize: vertical;
}

.input-with-icon {
    position: relative;
}

.input-with-icon i {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 16px;
}

.input-with-icon .form-control {
    padding-left: 48px;
}

/* Grid Layout for Form Fields */
.form-row {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.form-row-3 {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

/* Operating Hours Section */
.hours-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.hours-row {
    display: grid;
    grid-template-columns: 120px 1fr;
    gap: 12px;
    align-items: center;
}

.day-label {
    font-weight: 600;
    color: #2d1810;
    font-size: 14px;
}

/* Submit Button */
.btn-submit {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    padding: 16px 40px;
    border-radius: 12px;
    border: none;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 12px rgba(139,94,60,0.3);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #6d4a2f 0%, #5A3E2B 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139,94,60,0.4);
}

.btn-submit i {
    font-size: 18px;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    padding-top: 20px;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .profile-grid {
        grid-template-columns: 1fr;
    }

    .sidebar-section {
        max-width: 600px;
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .profile-wrapper {
        padding: 20px;
    }

    .page-header {
        padding: 24px;
    }

    .page-title {
        font-size: 24px;
    }

    .sidebar-section {
        width: 100%;
        max-width: 100%;
    }

    .form-row,
    .form-row-3,
    .hours-grid {
        grid-template-columns: 1fr;
    }

    .hours-row {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="profile-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-store"></i>
            Profil Toko
        </h1>
        <p class="page-subtitle">
            Kelola informasi toko dan kontak bisnis
        </p>
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

    <!-- Main Form -->
    <?php echo form_open_multipart('admin/profil-toko/update'); ?>
        <div class="profile-grid">
            
            <!-- Left Sidebar - Store Photo Only -->
            <div class="sidebar-section">
                
                <!-- Store Photo Upload -->
                <div class="upload-card">
                    <h3 class="upload-card-title">Foto Toko</h3>
                    <div class="upload-preview">
                        <?php if (!empty($store->foto_toko)): ?>
                            <img src="<?= base_url('uploads/store/' . $store->foto_toko) ?>" 
                                 alt="Foto Toko" 
                                 id="photo-preview">
                        <?php else: ?>
                            <div class="upload-placeholder">
                                <i class="fas fa-camera"></i>
                                <div class="upload-placeholder-text">Foto Toko</div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <label for="foto_toko" class="btn-upload">
                        <i class="fas fa-upload"></i>
                        Upload Foto Toko
                    </label>
                    <input type="file" 
                           id="foto_toko" 
                           name="foto_toko" 
                           accept="image/jpeg,image/png,image/jpg"
                           onchange="previewImage(this, 'photo-preview')">
                    <div class="upload-info">
                        Maksimal 5MB. Format: JPG, PNG<br>
                        Rekomendasi: 800x600 pixel (ratio 4:3)
                    </div>
                </div>

            </div>

            <!-- Right Content - Form Sections -->
            <div class="content-section">
                
                <!-- Informasi Toko -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-info-circle"></i>
                        Informasi Toko
                    </h3>

                    <div class="form-group">
                        <label class="form-label">
                            Nama Toko<span class="required">*</span>
                        </label>
                        <input type="text" 
                               name="nama_toko" 
                               class="form-control" 
                               value="<?= set_value('nama_toko', $store->nama_toko ?? '') ?>" 
                               placeholder="Masukkan nama toko"
                               required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Deskripsi Singkat</label>
                        <textarea name="deskripsi_toko" 
                                  class="form-control"
                                  placeholder="Deskripsi singkat tentang toko Anda"><?= set_value('deskripsi_toko', $store->deskripsi_toko ?? '') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Alamat Lengkap<span class="required">*</span>
                        </label>
                        <div class="input-with-icon">
                            <i class="fas fa-map-marker-alt"></i>
                            <textarea name="alamat" 
                                      class="form-control"
                                      placeholder="Jl. Nama Jalan No. XX, Kota, Provinsi"
                                      required><?= set_value('alamat', $store->alamat ?? '') ?></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">
                                Email<span class="required">*</span>
                            </label>
                            <div class="input-with-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" 
                                       name="email" 
                                       class="form-control" 
                                       value="<?= set_value('email', $store->email ?? '') ?>" 
                                       placeholder="info@example.com"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. Telepon</label>
                            <div class="input-with-icon">
                                <i class="fas fa-phone"></i>
                                <input type="tel" 
                                       name="no_telepon" 
                                       class="form-control" 
                                       value="<?= set_value('no_telepon', $store->no_telepon ?? '') ?>" 
                                       placeholder="0251-1234567">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Social Media -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-share-alt"></i>
                        Social Media
                    </h3>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">
                                WhatsApp<span class="required">*</span>
                            </label>
                            <div class="input-with-icon">
                                <i class="fab fa-whatsapp"></i>
                                <input type="text" 
                                       name="whatsapp" 
                                       class="form-control" 
                                       value="<?= set_value('whatsapp', $store->whatsapp ?? '') ?>" 
                                       placeholder="628123456789"
                                       required>
                            </div>
                            <small style="color: #6b5947; font-size: 12px; display: block; margin-top: 4px;">
                                Format: 628123456789 (tanpa +, -, atau spasi)
                            </small>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Instagram</label>
                            <div class="input-with-icon">
                                <i class="fab fa-instagram"></i>
                                <input type="text" 
                                       name="instagram" 
                                       class="form-control" 
                                       value="<?= set_value('instagram', $store->instagram ?? '') ?>" 
                                       placeholder="username_instagram">
                            </div>
                            <small style="color: #6b5947; font-size: 12px; display: block; margin-top: 4px;">
                                Masukkan username tanpa @
                            </small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Facebook</label>
                            <div class="input-with-icon">
                                <i class="fab fa-facebook"></i>
                                <input type="text" 
                                       name="facebook" 
                                       class="form-control" 
                                       value="<?= set_value('facebook', $store->facebook ?? '') ?>" 
                                       placeholder="username.facebook">
                            </div>
                            <small style="color: #6b5947; font-size: 12px; display: block; margin-top: 4px;">
                                Masukkan username Facebook
                            </small>
                        </div>

                        <div class="form-group">
                            <label class="form-label">TikTok</label>
                            <div class="input-with-icon">
                                <i class="fab fa-tiktok"></i>
                                <input type="text" 
                                       name="tiktok" 
                                       class="form-control" 
                                       value="<?= set_value('tiktok', $store->tiktok ?? '') ?>" 
                                       placeholder="username_tiktok">
                            </div>
                            <small style="color: #6b5947; font-size: 12px; display: block; margin-top: 4px;">
                                Masukkan username tanpa @
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-map-marked-alt"></i>
                        Google Maps Embed
                    </h3>

                    <div class="form-group">
                        <label class="form-label">Google Maps iframe Code</label>
                        <textarea name="google_maps" 
                                class="form-control"
                                rows="5"
                                placeholder='<iframe src="https://www.google.com/maps/embed?..." ...></iframe>'><?= set_value('google_maps', $store->google_maps ?? '') ?></textarea>
                        <small style="color: #6b5947; font-size: 12px; display: block; margin-top: 8px;">
                            <i class="fas fa-info-circle"></i> 
                            Cara mendapatkan:
                            <ol style="margin: 8px 0 0 20px; line-height: 1.8;">
                                <li>Buka <a href="https://www.google.com/maps" target="_blank">Google Maps</a></li>
                                <li>Cari lokasi toko Anda</li>
                                <li>Klik "Share" atau "Bagikan"</li>
                                <li>Pilih tab "Embed a map" atau "Sematkan peta"</li>
                                <li>Copy kode HTML yang muncul</li>
                                <li>Paste di kolom ini</li>
                            </ol>
                        </small>
                    </div>
                </div>

                <!-- Jam Operasional -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-clock"></i>
                        Jam Operasional
                    </h3>

                    <div class="hours-grid">
                        <div class="hours-row">
                            <label class="day-label">Senin - Jumat</label>
                            <input type="text" 
                                   name="jam_senin_jumat" 
                                   class="form-control" 
                                   value="<?= set_value('jam_senin_jumat', $store->jam_senin_jumat ?? '08:00 - 17:00 WIB') ?>" 
                                   placeholder="08:00 - 17:00 WIB">
                        </div>

                        <div class="hours-row">
                            <label class="day-label">Sabtu</label>
                            <input type="text" 
                                   name="jam_sabtu" 
                                   class="form-control" 
                                   value="<?= set_value('jam_sabtu', $store->jam_sabtu ?? '08:00 - 15:00 WIB') ?>" 
                                   placeholder="08:00 - 15:00 WIB">
                        </div>

                        <div class="hours-row">
                            <label class="day-label">Minggu</label>
                            <input type="text" 
                                   name="jam_minggu" 
                                   class="form-control" 
                                   value="<?= set_value('jam_minggu', $store->jam_minggu ?? 'Tutup') ?>" 
                                   placeholder="Tutup">
                        </div>
                    </div>
                </div>

                <!-- Informasi Bank (Optional) -->
                <div class="form-section">
                    <h3 class="section-title">
                        <i class="fas fa-university"></i>
                        Informasi Rekening Bank
                    </h3>

                    <div class="form-group">
                        <label class="form-label">Nama Bank</label>
                        <input type="text" 
                               name="bank_name" 
                               class="form-control" 
                               value="<?= set_value('bank_name', $store->bank_name ?? '') ?>" 
                               placeholder="Contoh: Bank BCA">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nomor Rekening</label>
                            <input type="text" 
                                   name="bank_account_number" 
                                   class="form-control" 
                                   value="<?= set_value('bank_account_number', $store->bank_account_number ?? '') ?>" 
                                   placeholder="1234567890">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Atas Nama</label>
                            <input type="text" 
                                   name="bank_account_name" 
                                   class="form-control" 
                                   value="<?= set_value('bank_account_name', $store->bank_account_name ?? '') ?>" 
                                   placeholder="Nama Pemilik Rekening">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-section">
                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
                        </button>
                    </div>
                </div>

            </div>
        </div>
    <?php echo form_close(); ?>
</div>

<script>
// Preview image before upload
function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            let preview = document.getElementById(previewId);
            const container = preview ? preview.parentElement : input.parentElement.querySelector('.upload-preview');
            
            // Remove placeholder
            const placeholder = container.querySelector('.upload-placeholder');
            if (placeholder) {
                placeholder.remove();
            }
            
            // Create or update image
            if (!preview) {
                preview = document.createElement('img');
                preview.id = previewId;
                preview.alt = previewId === 'logo-preview' ? 'Logo Toko' : 'Foto Toko';
                container.appendChild(preview);
            }
            
            preview.src = e.target.result;
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>