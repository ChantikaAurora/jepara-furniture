<style>
    /* ============================================
   CHECKOUT PAGE STYLING
   ============================================ */

/* Checkout Wrapper */
.checkout-wrapper {
    padding: 40px 0;
}

/* Checkout Steps */
.checkout-steps {
    display: flex;
    justify-content: center;
    margin-bottom: 50px;
    position: relative;
}

.checkout-steps::before {
    content: '';
    position: absolute;
    top: 20px;
    left: 25%;
    right: 25%;
    height: 2px;
    background: #ddd;
    z-index: 0;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 1;
    flex: 1;
    max-width: 200px;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #ddd;
    color: #666;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 18px;
    margin-bottom: 10px;
    transition: all 0.3s ease;
}

.step.active .step-number {
    background: #3b5d50;
    color: white;
}

.step-title {
    font-size: 14px;
    color: #666;
    text-align: center;
}

.step.active .step-title {
    color: #3b5d50;
    font-weight: 600;
}

/* Checkout Content Layout */
.checkout-content {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 30px;
    margin-top: 30px;
}

/* Checkout Form */
.checkout-form {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.checkout-form h2 {
    color: #3b5d50;
    margin-bottom: 25px;
    font-size: 24px;
    border-bottom: 2px solid #f9bf29;
    padding-bottom: 10px;
}

.checkout-form h3 {
    color: #3b5d50;
    margin-top: 30px;
    margin-bottom: 20px;
    font-size: 18px;
}

/* Form Groups */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    font-size: 14px;
}

.form-group .required {
    color: #e74c3c;
}

.form-group input[type="text"],
.form-group input[type="tel"],
.form-group input[type="email"],
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    outline: none;
    border-color: #3b5d50;
}

.form-group textarea {
    resize: vertical;
    min-height: 80px;
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

/* Payment Methods */
.payment-methods {
    display: grid;
    gap: 15px;
    margin-bottom: 30px;
}

.payment-option {
    position: relative;
    cursor: pointer;
}

.payment-option input[type="radio"] {
    position: absolute;
    opacity: 0;
}

.payment-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    border: 2px solid #ddd;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.payment-option input[type="radio"]:checked + .payment-card {
    border-color: #3b5d50;
    background: #f5f9f8;
}

.payment-card i {
    font-size: 24px;
    color: #3b5d50;
}

.payment-info-text {
    flex: 1;
}

.payment-card strong {
    display: block;
    color: #333;
    margin-bottom: 3px;
    font-size: 15px;
}

.payment-card p {
    margin: 0;
    font-size: 12px;
    color: #666;
    line-height: 1.5;
}

.bank-details {
    background: #f8f9fa;
    padding: 12px;
    border-radius: 6px;
    margin-top: 8px;
    font-size: 13px;
    line-height: 1.6;
}

.bank-details strong {
    color: #3b5d50;
    font-size: 13px;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}

.btn {
    padding: 12px 30px;
    border-radius: 5px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.btn-primary {
    background: #3b5d50;
    color: white;
}

.btn-primary:hover {
    background: #2d4840;
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

/* Order Summary */
.order-summary {
    position: sticky;
    top: 20px;
    height: fit-content;
}

.summary-card {
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.summary-card h3 {
    color: #3b5d50;
    margin-bottom: 20px;
    font-size: 20px;
    border-bottom: 2px solid #f9bf29;
    padding-bottom: 10px;
}

/* Order Items */
.order-items {
    margin-bottom: 20px;
}

.order-item {
    display: flex;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #eee;
}

.order-item:last-child {
    border-bottom: none;
}

.order-item img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 5px;
}

.item-info {
    flex: 1;
}

.item-info h4 {
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
}

.item-info p {
    font-size: 12px;
    color: #666;
    margin: 0;
}

.item-price {
    font-weight: 600;
    color: #3b5d50;
    font-size: 14px;
}

/* Summary Details */
.summary-details {
    border-top: 1px solid #eee;
    padding-top: 15px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    font-size: 14px;
    color: #666;
}

.summary-row.total {
    border-top: 2px solid #3b5d50;
    margin-top: 10px;
    padding-top: 15px;
    font-size: 18px;
    font-weight: 700;
    color: #3b5d50;
}

/* ============================================
   RESPONSIVE DESIGN
   ============================================ */

@media (max-width: 992px) {
    .checkout-content {
        grid-template-columns: 1fr;
    }
    
    .order-summary {
        position: static;
    }
    
    .checkout-steps::before {
        left: 15%;
        right: 15%;
    }
}

@media (max-width: 768px) {
    .checkout-wrapper {
        padding: 20px 0;
    }
    
    .checkout-form,
    .summary-card {
        padding: 20px;
    }
    
    .checkout-steps {
        margin-bottom: 30px;
    }
    
    .step-title {
        font-size: 12px;
    }
    
    .step-number {
        width: 35px;
        height: 35px;
        font-size: 16px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .form-actions .btn {
        width: 100%;
        text-align: center;
    }
}
</style>

<!-- application/views/checkout/index.php -->
<div class="container">
    <div class="checkout-wrapper">
        <div class="checkout-steps">
            <div class="step active">
                <span class="step-number">1</span>
                <span class="step-title">Informasi Pengiriman</span>
            </div>
            <div class="step">
                <span class="step-number">2</span>
                <span class="step-title">Pembayaran</span>
            </div>
            <div class="step">
                <span class="step-number">3</span>
                <span class="step-title">Selesai</span>
            </div>
        </div>
        
        <div class="checkout-content">
            <div class="checkout-form">
                <h2>Informasi Pengiriman</h2>
                
                <form action="<?= base_url('checkout/process') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_penerima">Nama Penerima <span class="required">*</span></label>
                        <input type="text" id="nama_penerima" name="nama_penerima" value="<?= $user->nama_lengkap ?>" required>
                        <?= form_error('nama_penerima', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="no_telepon">Nomor Telepon <span class="required">*</span></label>
                        <input type="tel" id="no_telepon" name="no_telepon" value="<?= $user->no_telepon ?>" required>
                        <?= form_error('no_telepon', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap <span class="required">*</span></label>
                        <textarea id="alamat" name="alamat" rows="4" required><?= $user->alamat ?></textarea>
                        <small>Masukkan alamat lengkap termasuk kecamatan, kota, dan kode pos</small>
                        <?= form_error('alamat', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="catatan">Catatan Pesanan (Opsional)</label>
                        <textarea id="catatan" name="catatan" rows="3" placeholder="Contoh: Warna, ukuran khusus, dll"></textarea>
                    </div>
                    
                    <h3>Metode Pembayaran</h3>
                    <div class="payment-methods">
                        <label class="payment-option">
                            <input type="radio" name="metode_pembayaran" value="transfer" checked>
                            <div class="payment-card">
                                <i class="fas fa-university"></i>
                                <div class="payment-info-text">
                                    <strong>Transfer Bank</strong>
                                    <?php if (isset($store) && !empty($store->bank_name)): ?>
                                        <p><?= $store->bank_name ?></p>
                                        <div class="bank-details">
                                            <strong>Rekening:</strong> <?= $store->bank_account_number ?><br>
                                            <strong>Atas Nama:</strong> <?= $store->bank_account_name ?>
                                        </div>
                                    <?php else: ?>
                                        <p>Transfer ke rekening bank yang tersedia</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </label>
                    </div>
                    
                    <div class="form-actions">
                        <a href="<?= base_url('cart') ?>" class="btn btn-outline">Kembali ke Keranjang</a>
                        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                    </div>
                </form>
            </div>
            
            <div class="order-summary">
                <div class="summary-card">
                    <h3>Ringkasan Pesanan</h3>
                    
                    <div class="summary-details">
                        <div class="summary-row">
                            <span>Subtotal Produk</span>
                            <span>Rp <?= number_format($cart_total, 0, ',', '.') ?></span>
                        </div>
                        <div class="summary-row total">
                            <span>Total Pembayaran</span>
                            <span>Rp <?= number_format($grand_total, 0, ',', '.') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>