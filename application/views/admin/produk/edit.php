<style>
/* Product Edit Form - Dashboard Theme (Same as Create) */
.form-wrapper {
    background: linear-gradient(135deg, #f5f1e8 0%, #faf8f3 100%);
    min-height: 100vh;
    padding: 32px;
}

.page-header {
    background: white;
    border-radius: 20px;
    padding: 32px 40px;
    margin-bottom: 32px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
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
}

.form-section {
    background: white;
    border-radius: 18px;
    padding: 28px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.section-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid #f3f4f6;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title i {
    color: #8B5E3C;
}

.form-group {
    margin-bottom: 20px;
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
}

.form-control:focus {
    outline: none;
    border-color: #8B5E3C;
    background: white;
    box-shadow: 0 0 0 4px rgba(139,94,60,0.1);
}

textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

.radio-group {
    display: flex;
    gap: 20px;
}

.radio-option {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    background: #faf8f3;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.radio-option:hover {
    border-color: #8B5E3C;
    background: #f5f1e8;
}

.radio-option input[type="radio"] {
    width: 18px;
    height: 18px;
    cursor: pointer;
}

.image-upload-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.image-upload-box {
    position: relative;
}

.upload-label {
    font-size: 13px;
    font-weight: 600;
    color: #2d1810;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.badge-primary {
    background: rgba(139,94,60,0.15);
    color: #6d4a2f;
    padding: 3px 10px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
}

.current-image {
    margin-bottom: 12px;
    position: relative;
}

.current-image img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #10b981;
}

.badge-success {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #10b981;
    color: white;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
}

.replace-text {
    font-size: 12px;
    color: #6b7280;
    margin-bottom: 10px;
}

.upload-area {
    border: 2px dashed #d1d5db;
    border-radius: 12px;
    padding: 30px 20px;
    text-align: center;
    background: #faf8f3;
    cursor: pointer;
    transition: all 0.2s ease;
    min-height: 160px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.upload-area:hover {
    border-color: #8B5E3C;
    background: #f5f1e8;
}

.upload-area i {
    font-size: 32px;
    color: #9ca3af;
    margin-bottom: 10px;
}

.upload-area p {
    font-size: 13px;
    font-weight: 600;
    color: #6b5947;
    margin-bottom: 4px;
}

.upload-area small {
    font-size: 11px;
    color: #9ca3af;
}

.image-preview {
    margin-top: 12px;
    position: relative;
    display: none;
}

.image-preview img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid #3b82f6;
}

.image-preview.show {
    display: block;
}

.badge-info {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #3b82f6;
    color: white;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
}

.action-buttons {
    display: flex;
    gap: 12px;
    align-items: center;
}

.btn-submit {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    padding: 14px 32px;
    border-radius: 12px;
    border: none;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 2px 8px rgba(139,94,60,0.2);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #6d4a2f 0%, #5A3E2B 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(139,94,60,0.3);
}

.btn-cancel {
    background: #f3f4f6;
    color: #374151;
    padding: 14px 32px;
    border-radius: 12px;
    border: none;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
}

.btn-cancel:hover {
    background: #e5e7eb;
    color: #1a1a1a;
}

.alert {
    padding: 18px 24px;
    border-radius: 12px;
    margin-bottom: 24px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    font-size: 15px;
    border: 1.5px solid;
}

.alert-danger {
    background: #fef2f2;
    border-color: #ef4444;
    color: #991b1b;
}

.alert i {
    font-size: 18px;
}

.row {
    display: flex;
    gap: 20px;
    margin: 0 -10px;
}

.col-md-4 {
    flex: 0 0 33.333%;
    padding: 0 10px;
}

.col-md-6 {
    flex: 0 0 50%;
    padding: 0 10px;
}

.col-md-8 {
    flex: 0 0 66.666%;
    padding: 0 10px;
}

@media (max-width: 768px) {
    .form-wrapper {
        padding: 20px;
    }

    .row {
        flex-direction: column;
    }

    .col-md-4,
    .col-md-6,
    .col-md-8 {
        flex: 0 0 100%;
    }

    .image-upload-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="form-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-edit"></i>
            Edit Produk
        </h1>
        <p class="page-subtitle">
            Update informasi produk: <strong><?= $product->nama_produk ?></strong>
        </p>
    </div>

    <!-- Alert Messages -->
    <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle"></i>
        <div><?= $this->session->flashdata('error') ?></div>
    </div>
    <?php endif; ?>

    <!-- Form -->
    <form action="<?= base_url('admin/produk/update/'.$product->id) ?>" method="post" enctype="multipart/form-data">
        
        <!-- Basic Information Section -->
        <div class="form-section">
            <h3 class="section-title">
                <i class="fas fa-info-circle"></i>
                Informasi Dasar
            </h3>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="form-label">
                            Nama Produk<span class="required">*</span>
                        </label>
                        <input type="text" 
                               name="nama_produk" 
                               class="form-control" 
                               value="<?= $product->nama_produk ?>"
                               required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">
                            Kategori<span class="required">*</span>
                        </label>
                        <select name="id_kategori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach($categories as $cat): ?>
                                <option value="<?= $cat->id ?>" <?= $cat->id == $product->id_kategori ? 'selected' : '' ?>>
                                    <?= $cat->nama_kategori ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">
                    Deskripsi Produk<span class="required">*</span>
                </label>
                <textarea name="deskripsi" 
                          class="form-control" 
                          required><?= $product->deskripsi ?></textarea>
            </div>
        </div>

        <!-- Price & Type Section -->
        <div class="form-section">
            <h3 class="section-title">
                <i class="fas fa-tag"></i>
                Harga & Tipe Produk
            </h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            Harga (Rp)<span class="required">*</span>
                        </label>
                        <input type="number" 
                               name="harga" 
                               class="form-control" 
                               value="<?= $product->harga ?>"
                               min="0"
                               step="1000"
                               required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            Tipe Produk<span class="required">*</span>
                        </label>
                        <div class="radio-group">
                            <div class="radio-option">
                                <input type="radio" name="tipe_produk" value="jadi" id="tipe_jadi" 
                                       <?= $product->tipe_produk == 'jadi' ? 'checked' : '' ?>>
                                <label for="tipe_jadi">Produk Jadi</label>
                            </div>
                            <div class="radio-option">
                                <input type="radio" name="tipe_produk" value="setengah_jadi" id="tipe_setengah"
                                       <?= $product->tipe_produk == 'setengah_jadi' ? 'checked' : '' ?>>
                                <label for="tipe_setengah">Setengah Jadi</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Specifications Section -->
        <div class="form-section">
            <h3 class="section-title">
                <i class="fas fa-ruler-combined"></i>
                Spesifikasi Produk
            </h3>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Bahan</label>
                        <input type="text" 
                               name="bahan" 
                               class="form-control" 
                               value="<?= $product->bahan ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Dimensi</label>
                        <input type="text" 
                               name="dimensi" 
                               class="form-control" 
                               value="<?= $product->dimensi ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Berat</label>
                        <input type="text" 
                               name="berat" 
                               class="form-control" 
                               value="<?= $product->berat ?>">
                    </div>
                </div>
            </div>
        </div>

        <!-- Images Upload Section -->
        <div class="form-section">
            <h3 class="section-title">
                <i class="fas fa-images"></i>
                Gambar Produk
            </h3>

            <div class="image-upload-grid">
                <?php for($i = 1; $i <= 6; $i++): ?>
                <div class="image-upload-box">
                    <div class="upload-label">
                        Gambar <?= $i ?>
                        <?php if($i == 1): ?>
                            <span class="badge-primary">Utama</span>
                        <?php endif; ?>
                    </div>
                    
                    <?php 
                    $field_name = 'gambar_' . $i;
                    if(!empty($product->$field_name)): 
                    ?>
                        <div class="current-image">
                            <img src="<?= base_url('uploads/products/'.$product->$field_name) ?>" alt="Gambar <?= $i ?>">
                            <span class="badge-success">✓ Tersimpan</span>
                        </div>
                        <p class="replace-text">Upload gambar baru untuk mengganti</p>
                    <?php endif; ?>
                    
                    <div class="upload-area" onclick="document.getElementById('gambar_<?= $i ?>').click()">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p><?= !empty($product->$field_name) ? 'Ganti Gambar' : 'Upload Gambar' ?></p>
                        <small>JPG, PNG, WEBP (Max 2MB)</small>
                    </div>
                    
                    <input type="file" 
                           name="gambar_<?= $i ?>" 
                           id="gambar_<?= $i ?>" 
                           style="display: none;" 
                           accept="image/*"
                           onchange="previewImage(this, <?= $i ?>)">
                    
                    <div class="image-preview" id="preview_<?= $i ?>">
                        <img src="" alt="Preview Baru">
                        <span class="badge-info">⟳ Gambar Baru</span>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Status Section -->
        <div class="form-section">
            <h3 class="section-title">
                <i class="fas fa-toggle-on"></i>
                Status Publikasi
            </h3>

            <div class="form-group">
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" name="status" value="active" id="status_active" 
                               <?= $product->status == 'active' ? 'checked' : '' ?>>
                        <label for="status_active">Aktif (Tampil di website)</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" name="status" value="inactive" id="status_inactive"
                               <?= $product->status == 'inactive' ? 'checked' : '' ?>>
                        <label for="status_inactive">Nonaktif (Tersembunyi)</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="form-section">
            <div class="action-buttons">
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    Update Produk
                </button>
                <a href="<?= base_url('admin/produk') ?>" class="btn-cancel">
                    <i class="fas fa-times"></i>
                    Batal
                </a>
            </div>
        </div>

    </form>
</div>

<script>
// Image Preview Function
function previewImage(input, number) {
    const preview = document.getElementById('preview_' + number);
    const img = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.add('show');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>