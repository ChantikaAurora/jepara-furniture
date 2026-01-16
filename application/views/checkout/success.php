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

.payment-card strong {
    display: block;
    color: #333;
    margin-bottom: 3px;
}

.payment-card p {
    margin: 0;
    font-size: 12px;
    color: #666;
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
   SUCCESS PAGE STYLING
   ============================================ */

.success-page {
    max-width: 900px;
    margin: 50px auto;
    padding: 50px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 4px 30px rgba(0,0,0,0.1);
    text-align: center;
}

.success-icon {
    margin-bottom: 20px;
}

.success-icon i {
    font-size: 100px;
    color: #28a745;
    animation: successPop 0.6s ease-out;
}

@keyframes successPop {
    0% {
        transform: scale(0);
        opacity: 0;
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.success-page h1 {
    color: #3b5d50;
    font-size: 32px;
    margin-bottom: 15px;
}

.order-number {
    font-size: 20px;
    color: #666;
    margin-bottom: 30px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    display: inline-block;
}

.order-number strong {
    color: #3b5d50;
    font-size: 22px;
}

.success-message {
    background: linear-gradient(135deg, #f5f9f8 0%, #e8f5e9 100%);
    padding: 25px;
    border-radius: 10px;
    margin-bottom: 35px;
    border-left: 4px solid #28a745;
}

.success-message p {
    margin: 8px 0;
    color: #555;
    font-size: 16px;
    line-height: 1.6;
}

/* Order Info Card */
.order-info-card {
    background: #fff;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 35px;
    text-align: left;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.order-info-card h3 {
    color: #3b5d50;
    margin-bottom: 25px;
    border-bottom: 3px solid #f9bf29;
    padding-bottom: 12px;
    font-size: 20px;
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.info-item {
    display: flex;
    flex-direction: column;
}

.info-item .label {
    font-size: 13px;
    color: #888;
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
}

.info-item .value {
    font-size: 17px;
    font-weight: 600;
    color: #333;
}

.badge {
    display: inline-block;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    text-transform: capitalize;
}

.badge-warning {
    background: linear-gradient(135deg, #fff3cd 0%, #ffe69c 100%);
    color: #856404;
    border: 1px solid #ffc107;
}

/* Next Steps */
.next-steps {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 25px 30px;
    border-radius: 12px;
    margin-bottom: 35px;
    text-align: left;
    border-left: 4px solid #3b5d50;
}

.next-steps h3 {
    color: #3b5d50;
    margin-bottom: 18px;
    font-size: 18px;
}

.next-steps ol {
    padding-left: 25px;
    margin: 0;
}

.next-steps li {
    margin-bottom: 12px;
    color: #555;
    line-height: 1.7;
    font-size: 15px;
    padding-left: 8px;
}

.next-steps li::marker {
    color: #3b5d50;
    font-weight: bold;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 40px;
}

.action-buttons .btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 28px;
    font-size: 15px;
    transition: all 0.3s ease;
}

.action-buttons .btn i {
    font-size: 16px;
}

.action-buttons .btn-primary {
    background: linear-gradient(135deg, #3b5d50 0%, #2d4840 100%);
    box-shadow: 0 4px 15px rgba(59, 93, 80, 0.3);
}

.action-buttons .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(59, 93, 80, 0.4);
}

.action-buttons .btn-outline:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(59, 93, 80, 0.2);
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
    
    .info-grid {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .action-buttons .btn {
        width: 100%;
        justify-content: center;
    }
    
    .success-page {
        padding: 25px;
        margin: 20px;
    }
    
    .success-page h1 {
        font-size: 24px;
    }
    
    .success-icon i {
        font-size: 60px;
    }
}
</style>

<div class="container">
    <div class="success-page">
        <div class="success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        
        <h1>Pesanan Berhasil Dibuat!</h1>
        <p class="order-number">Nomor Pesanan: <strong><?= $order->kode_pesanan ?></strong></p>
        
        <div class="success-message">
            <p>Terima kasih telah berbelanja di Toko Jepara Indah Furniture Padang.</p>
            <p>Pesanan Anda telah berhasil dibuat dan menunggu pembayaran.</p>
        </div>
        
        <div class="order-info-card">
            <h3>Informasi Pesanan</h3>
            <div class="info-grid">
                <div class="info-item">
                    <span class="label">Tanggal Pesanan:</span>
                    <span class="value"><?= date('d F Y H:i', strtotime($order->created_at)) ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Total Pembayaran:</span>
                    <span class="value">Rp <?= number_format($order->total_harga, 0, ',', '.') ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Metode Pembayaran:</span>
                    <span class="value"><?= ucfirst($order->metode_pembayaran) ?></span>
                </div>
                <div class="info-item">
                    <span class="label">Status:</span>
                    <span class="badge badge-warning"><?= ucfirst($order->status_pesanan) ?></span>
                </div>
            </div>
        </div>
        
        <div class="next-steps">
            <h3>Langkah Selanjutnya:</h3>
            <ol>
                <li>Lakukan pembayaran sesuai metode yang dipilih</li>
                <li>Upload bukti pembayaran melalui halaman pesanan</li>
                <li>Tunggu konfirmasi dari admin</li>
                <li>Pesanan akan diproses setelah pembayaran dikonfirmasi</li>
            </ol>
        </div>
        
        <div class="action-buttons">
            <a href="<?= base_url('payment/index/' . $order->id) ?>" class="btn btn-primary">
                <i class="fas fa-upload"></i> Upload Bukti Pembayaran
            </a>
            <a href="<?= base_url('profile/order_detail/' . $order->id) ?>" class="btn btn-outline">
                <i class="fas fa-file-invoice"></i> Lihat Detail Pesanan
            </a>
            <a href="<?= base_url('product') ?>" class="btn btn-outline">
                <i class="fas fa-shopping-bag"></i> Lanjut Belanja
            </a>
        </div>
    </div>
</div>
