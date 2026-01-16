<style>
/* Rehap Create Form Styles */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    padding: 30px 0;
    border-bottom: 2px solid rgba(139,94,60,0.1);
}

.page-header h1 {
    font-size: 32px;
    font-weight: 700;
    color: #2d1810;
    margin: 0;
}

.alert {
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.alert-danger {
    background: #fee2e2;
    border: 1px solid #fecaca;
    color: #991b1b;
}

.alert-success {
    background: #d1fae5;
    border: 1px solid #a7f3d0;
    color: #065f46;
}

.rehap-form-layout {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    margin-bottom: 60px;
}

.form-card {
    background: white;
    border-radius: 16px;
    padding: 40px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    font-weight: 600;
    color: #2d1810;
    margin-bottom: 8px;
    font-size: 15px;
}

.required {
    color: #dc3545;
}

.help-text {
    font-size: 13px;
    color: #6b5947;
    margin-top: 5px;
}

.form-group input[type="text"],
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e0ddd8;
    border-radius: 10px;
    font-size: 15px;
    transition: all 0.3s ease;
}

.form-group input[type="text"]:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #8B5E3C;
    box-shadow: 0 0 0 3px rgba(139,94,60,0.1);
}

.photo-upload-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin-top: 15px;
}

.photo-upload-item {
    position: relative;
}

.photo-upload-item input[type="file"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
    z-index: 2;
}

.upload-label {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 150px;
    border: 2px dashed #8B5E3C;
    border-radius: 12px;
    background: #faf8f3;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.upload-label:hover {
    background: #f5f1e8;
    border-color: #6d4a2f;
}

.upload-label i {
    font-size: 32px;
    color: #8B5E3C;
    margin-bottom: 8px;
}

.upload-label span {
    font-size: 13px;
    color: #6b5947;
    font-weight: 600;
}

.preview-image {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
    display: none;
}

.preview-image.show {
    display: block;
}

.form-actions {
    display: flex;
    gap: 15px;
    justify-content: flex-end;
    margin-top: 30px;
    padding-top: 30px;
    border-top: 2px solid rgba(139,94,60,0.1);
}

.btn {
    padding: 12px 28px;
    border-radius: 10px;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-primary {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(139,94,60,0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(139,94,60,0.4);
}

.btn-outline {
    background: white;
    color: #8B5E3C;
    border: 2px solid #8B5E3C;
}

.btn-outline:hover {
    background: #8B5E3C;
    color: white;
}

.form-sidebar .info-card {
    background: white;
    border-radius: 16px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
}

.info-card h3 {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 15px;
}

.info-card ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info-card li {
    padding: 8px 0;
    padding-left: 24px;
    position: relative;
    font-size: 14px;
    color: #6b5947;
}

.info-card li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #8B5E3C;
    font-weight: 700;
}

.info-card p {
    font-size: 14px;
    color: #6b5947;
    line-height: 1.6;
    margin: 0;
}

@media (max-width: 768px) {
    .rehap-form-layout {
        grid-template-columns: 1fr;
    }
    
    .photo-upload-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>
 <?php $this->load->view('templates/navbar'); ?>
<div class="container">
    <div class="page-header">
        <h1>Ajukan Permintaan Rehap</h1>
        <a href="<?= base_url('rehap') ?>" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle"></i>
        <?= $this->session->flashdata('error') ?>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <?= $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>
    
    <div class="rehap-form-layout">
        <div class="form-main">
            <div class="form-card">
                <?php echo form_open_multipart('rehap/create'); ?>
                    <div class="form-group">
                        <label for="nama_furniture">Nama/Jenis Furniture <span class="required">*</span></label>
                        <input type="text" 
                               id="nama_furniture" 
                               name="nama_furniture" 
                               placeholder="Contoh: Kursi Tamu Kayu Jati, Lemari 3 Pintu" 
                               value="<?= set_value('nama_furniture') ?>"
                               required>
                        <p class="help-text">Sebutkan jenis furniture yang ingin di-rehap</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="deskripsi_kerusakan">Deskripsi Kerusakan/Keinginan <span class="required">*</span></label>
                        <textarea id="deskripsi_kerusakan" 
                                  name="deskripsi_kerusakan" 
                                  rows="5" 
                                  placeholder="Jelaskan kondisi furniture dan apa yang ingin diperbaiki/diubah. Contoh: Catnya sudah pudar, ada bagian yang patah, ingin ganti warna, dll."
                                  required><?= set_value('deskripsi_kerusakan') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="alamat_customer">Alamat Lengkap (Opsional)</label>
                        <textarea id="alamat_customer" 
                                  name="alamat_customer" 
                                  rows="3" 
                                  placeholder="Alamat lengkap untuk pickup furniture (opsional, bisa dibicarakan via WhatsApp)"><?= set_value('alamat_customer', $user->alamat ?? '') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="no_telepon_customer">Nomor Telepon (Opsional)</label>
                        <input type="text" 
                               id="no_telepon_customer" 
                               name="no_telepon_customer" 
                               placeholder="08xx xxxx xxxx"
                               value="<?= set_value('no_telepon_customer', $user->no_telepon ?? '') ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Foto Furniture <span class="required">*</span> (Min. 3 foto)</label>
                        <p class="help-text">Upload minimal 3 foto, maksimal 6 foto (format: JPG/PNG, max 2MB per foto)</p>
                        
                        <div class="photo-upload-grid">
                            <?php for ($i = 1; $i <= 6; $i++): ?>
                            <div class="photo-upload-item">
                                <input type="file" 
                                       id="foto_<?= $i ?>" 
                                       name="foto_<?= $i ?>" 
                                       accept="image/jpeg,image/png,image/jpg" 
                                       <?= $i <= 3 ? 'required' : '' ?> 
                                       onchange="previewImage(this, <?= $i ?>)">
                                <label for="foto_<?= $i ?>" class="upload-label">
                                    <i class="fas fa-camera"></i>
                                    <span>Foto <?= $i ?><?= $i <= 3 ? ' *' : '' ?></span>
                                    <img id="preview_<?= $i ?>" class="preview-image" alt="Preview">
                                </label>
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <a href="<?= base_url('rehap') ?>" class="btn btn-outline">Batal</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Kirim Permintaan
                        </button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        
        <aside class="form-sidebar">
            <div class="info-card">
                <h3><i class="fas fa-info-circle"></i> Panduan Upload Foto</h3>
                <ul>
                    <li>Ambil foto dari berbagai sudut</li>
                    <li>Pastikan foto jelas dan terang</li>
                    <li>Foto bagian yang rusak secara detail</li>
                    <li>Sertakan foto keseluruhan furniture</li>
                    <li>Format JPG/PNG, maksimal 2MB per foto</li>
                </ul>
            </div>
            
            <div class="info-card">
                <h3><i class="fas fa-clock"></i> Proses Selanjutnya</h3>
                <p>Setelah mengirim permintaan, Anda akan langsung terhubung ke WhatsApp admin untuk konsultasi lebih lanjut mengenai estimasi biaya dan waktu pengerjaan.</p>
            </div>

            <div class="info-card">
                <h3><i class="fas fa-shield-alt"></i> Jaminan</h3>
                <ul>
                    <li>Garansi hasil rehap</li>
                    <li>Konsultasi gratis</li>
                    <li>Craftsman berpengalaman</li>
                    <li>Material berkualitas</li>
                </ul>
            </div>
        </aside>
    </div>
</div>

<script>
function previewImage(input, number) {
    const preview = document.getElementById('preview_' + number);
    const label = input.nextElementSibling;
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.add('show');
            label.querySelector('i').style.display = 'none';
            label.querySelector('span').style.display = 'none';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>