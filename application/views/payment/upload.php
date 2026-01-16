<style>
/* Upload Payment Proof Styling */
.payment-upload-wrapper {
    padding: 40px 0;
    background: #f8f9fa;
}

.page-header {
    background: white;
    padding: 30px;
    border-radius: 10px;
    margin-bottom: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.page-header h1 {
    color: #3b5d50;
    font-size: 32px;
    margin-bottom: 10px;
}

.page-header p {
    color: #666;
    font-size: 16px;
    margin: 0;
}

.page-header p strong {
    color: #3b5d50;
    font-weight: 700;
}

.payment-upload-layout {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 30px;
}

/* Upload Main Section */
.upload-main {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.payment-info-card,
.upload-form-card {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.payment-info-card h3,
.upload-form-card h3 {
    color: #3b5d50;
    font-size: 20px;
    margin-bottom: 20px;
    border-bottom: 2px solid #f9bf29;
    padding-bottom: 10px;
}

.upload-form-card > p {
    color: #666;
    margin-bottom: 25px;
    line-height: 1.6;
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.info-item label {
    display: block;
    font-size: 14px;
    color: #666;
    margin-bottom: 5px;
}

.info-item strong,
.info-item p {
    font-size: 18px;
    color: #333;
    margin: 0;
}

.info-item strong.price {
    color: #3b5d50;
    font-size: 24px;
    font-weight: 700;
}

/* Form Styling */
.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 10px;
    font-size: 14px;
}

.required {
    color: #e74c3c;
}

.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    resize: vertical;
    font-family: inherit;
}

.form-group textarea:focus {
    outline: none;
    border-color: #3b5d50;
}

.form-group small {
    display: block;
    margin-top: 5px;
    color: #666;
    font-size: 12px;
}

.form-group small.error {
    color: #e74c3c;
    font-weight: 500;
}

/* File Upload Area */
.file-upload-area {
    position: relative;
    border: 2px dashed #ddd;
    border-radius: 8px;
    padding: 40px 20px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.file-upload-area:hover {
    border-color: #3b5d50;
    background: #f5f9f8;
}

.file-upload-area input[type="file"] {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}

.upload-placeholder i {
    font-size: 48px;
    color: #3b5d50;
    margin-bottom: 15px;
}

.upload-placeholder p {
    font-size: 16px;
    color: #333;
    margin-bottom: 8px;
}

.upload-placeholder small {
    color: #666;
    font-size: 13px;
}

#file-preview {
    padding: 20px;
}

#file-preview img {
    border-radius: 8px;
    margin-bottom: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

#file-preview p {
    color: #333;
    font-weight: 600;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}

.btn {
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 15px;
}

.btn-primary {
    background: #3b5d50;
    color: white;
    flex: 1;
}

.btn-primary:hover {
    background: #2d4840;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(59, 93, 80, 0.3);
}

.btn-outline {
    background: white;
    color: #3b5d50;
    border: 2px solid #3b5d50;
}

.btn-outline:hover {
    background: #3b5d50;
    color: white;
}

/* Upload Sidebar */
.upload-sidebar .info-card {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: sticky;
    top: 20px;
}

.upload-sidebar .info-card h3 {
    color: #3b5d50;
    font-size: 18px;
    margin-bottom: 20px;
    border-bottom: 2px solid #f9bf29;
    padding-bottom: 10px;
}

.upload-sidebar .info-card ul {
    padding-left: 20px;
    margin: 0;
}

.upload-sidebar .info-card li {
    color: #555;
    margin-bottom: 12px;
    line-height: 1.6;
}

.upload-sidebar .info-card li:last-child {
    margin-bottom: 0;
}

/* Alert Messages */
.alert {
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.alert-success {
    background: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

.alert-danger {
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

.alert i {
    font-size: 20px;
}

/* Responsive Design */
@media (max-width: 992px) {
    .payment-upload-layout {
        grid-template-columns: 1fr;
    }
    
    .upload-sidebar .info-card {
        position: static;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .payment-upload-wrapper {
        padding: 20px 0;
    }
    
    .page-header {
        padding: 20px;
    }
    
    .page-header h1 {
        font-size: 24px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .form-actions .btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<div class="payment-upload-wrapper">
    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-upload"></i> Upload Bukti Pembayaran</h1>
            <p>Nomor Pesanan: <strong><?= $order->kode_pesanan ?></strong></p>
        </div>
        
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?= $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <div class="payment-upload-layout">
            <div class="upload-main">
                <div class="payment-info-card">
                    <h3>Informasi Pembayaran</h3>
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Total Pembayaran:</label>
                            <strong class="price">Rp <?= number_format($order->total_harga, 0, ',', '.') ?></strong>
                        </div>
                        <div class="info-item">
                            <label>Metode Pembayaran:</label>
                            <p><?= ucfirst($order->metode_pembayaran) ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="upload-form-card">
                    <h3>Upload Bukti Pembayaran</h3>
                    <p>Silakan upload bukti transfer/pembayaran Anda. File harus berformat JPG, PNG, atau PDF dengan ukuran maksimal 2MB.</p>
                    
                    <form action="<?= base_url('payment/process_upload/' . $order->id) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="bukti_pembayaran">Bukti Pembayaran <span class="required">*</span></label>
                            <div class="file-upload-area">
                                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*,application/pdf" required onchange="previewFile(this)">
                                <div class="upload-placeholder">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <p>Klik atau drag & drop file di sini</p>
                                    <small>Format: JPG, PNG, PDF (Max 2MB)</small>
                                </div>
                                <div id="file-preview" style="display:none;">
                                    <img id="preview-image" style="max-width: 100%; max-height: 300px; display:none;">
                                    <p id="file-name"></p>
                                </div>
                            </div>
                            <?= form_error('bukti_pembayaran', '<small class="error">', '</small>') ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="catatan">Catatan (Opsional)</label>
                            <textarea id="catatan" name="catatan" rows="3" placeholder="Tambahkan catatan jika diperlukan"></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <a href="<?= base_url('payment/index/' . $order->id) ?>" class="btn btn-outline">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-upload"></i> Upload Bukti Pembayaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <aside class="upload-sidebar">
                <div class="info-card">
                    <h3><i class="fas fa-info-circle"></i> Panduan Upload</h3>
                    <ul>
                        <li>Pastikan bukti pembayaran jelas dan terbaca</li>
                        <li>Sertakan informasi tanggal dan nominal transfer</li>
                        <li>Bukti akan diverifikasi oleh admin dalam 1x24 jam</li>
                        <li>Anda akan mendapat notifikasi setelah pembayaran dikonfirmasi</li>
                    </ul>
                </div>
                
                <?php if (isset($store) && $order->metode_pembayaran == 'transfer'): ?>
                <div class="info-card">
                    <h3><i class="fas fa-university"></i> Informasi Rekening</h3>
                    <?php if (!empty($store->bank_name)): ?>
                    <p style="margin: 8px 0; color: #555; font-size: 14px;">
                        <strong>Bank:</strong> <?= $store->bank_name ?>
                    </p>
                    <p style="margin: 8px 0; color: #555; font-size: 14px;">
                        <strong>No. Rek:</strong> <?= $store->bank_account_number ?>
                    </p>
                    <p style="margin: 8px 0; color: #555; font-size: 14px;">
                        <strong>Atas Nama:</strong> <?= $store->bank_account_name ?? $store->nama_toko ?>
                    </p>
                    <?php else: ?>
                    <p style="color: #666; font-size: 13px;">
                        Hubungi admin untuk informasi rekening transfer.
                    </p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</div>

<script>
function previewFile(input) {
    const preview = document.getElementById('file-preview');
    const placeholder = document.querySelector('.upload-placeholder');
    const previewImage = document.getElementById('preview-image');
    const fileName = document.getElementById('file-name');
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        fileName.textContent = file.name;
        
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
                placeholder.style.display = 'none';
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = 'none';
            placeholder.style.display = 'none';
            preview.style.display = 'block';
        }
    }
}
</script>