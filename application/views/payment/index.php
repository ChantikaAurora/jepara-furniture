<style>
/* Payment Page Styling */
.payment-wrapper {
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
    display: flex;
    align-items: center;
    gap: 15px;
}

.page-header h1 i {
    color: #f9bf29;
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

.payment-content {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 30px;
}

/* Payment Info Section */
.payment-info {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.payment-amount-card {
    background: linear-gradient(135deg, #3b5d50 0%, #2d4840 100%);
    padding: 30px;
    border-radius: 10px;
    color: white;
    text-align: center;
    box-shadow: 0 4px 15px rgba(59, 93, 80, 0.3);
}

.payment-amount-card h3 {
    font-size: 16px;
    margin-bottom: 15px;
    opacity: 0.9;
    font-weight: 500;
}

.payment-amount-card .amount {
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 10px;
    letter-spacing: -1px;
}

.payment-amount-card .payment-method {
    font-size: 14px;
    margin: 0;
    opacity: 0.8;
}

/* Bank Accounts */
.bank-accounts {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.bank-accounts h3 {
    color: #3b5d50;
    font-size: 20px;
    margin-bottom: 20px;
    border-bottom: 2px solid #f9bf29;
    padding-bottom: 10px;
}

.bank-card {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 20px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.bank-card:hover {
    border-color: #3b5d50;
    background: #f5f9f8;
}

.bank-card:last-child {
    margin-bottom: 0;
}

.bank-logo {
    width: 50px;
    height: 50px;
    background: #f5f9f8;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.bank-logo i {
    font-size: 24px;
    color: #3b5d50;
}

.bank-info {
    flex: 1;
}

.bank-info h4 {
    font-size: 16px;
    color: #333;
    margin-bottom: 8px;
    font-weight: 600;
}

.bank-info .account-number {
    font-size: 20px;
    font-weight: 700;
    color: #3b5d50;
    margin-bottom: 5px;
    letter-spacing: 1px;
    font-family: 'Courier New', monospace;
}

.bank-info .account-name {
    font-size: 13px;
    color: #666;
    margin: 0;
}

.btn-copy {
    padding: 8px 16px;
    background: #3b5d50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 5px;
}

.btn-copy:hover {
    background: #2d4840;
    transform: translateY(-2px);
}

.btn-copy.copy-success {
    background: #28a745;
}

.no-bank-info {
    background: #fff3cd;
    border: 1px solid #ffc107;
    padding: 20px;
    border-radius: 8px;
    color: #856404;
    text-align: center;
}

.no-bank-info i {
    font-size: 32px;
    margin-bottom: 10px;
    display: block;
}

/* Payment Instructions */
.payment-instructions {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.payment-instructions h3 {
    color: #3b5d50;
    font-size: 20px;
    margin-bottom: 20px;
    border-bottom: 2px solid #f9bf29;
    padding-bottom: 10px;
}

.payment-instructions ol {
    padding-left: 20px;
    margin: 0;
}

.payment-instructions li {
    margin-bottom: 12px;
    color: #555;
    line-height: 1.6;
}

.payment-instructions li:last-child {
    margin-bottom: 0;
}

.payment-instructions li strong {
    color: #3b5d50;
    font-weight: 700;
}

/* Payment Notes */
.payment-notes {
    background: #fff3cd;
    border: 1px solid #ffc107;
    padding: 20px;
    border-radius: 8px;
    display: flex;
    gap: 15px;
}

.payment-notes i {
    font-size: 24px;
    color: #856404;
    flex-shrink: 0;
}

.payment-notes h4 {
    color: #856404;
    font-size: 16px;
    margin-bottom: 10px;
}

.payment-notes ul {
    margin: 0;
    padding-left: 20px;
}

.payment-notes li {
    color: #856404;
    margin-bottom: 5px;
    font-size: 14px;
}

/* Payment Sidebar */
.payment-sidebar {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.order-summary-card {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: sticky;
    top: 20px;
}

.order-summary-card h3 {
    color: #3b5d50;
    font-size: 20px;
    margin-bottom: 20px;
    border-bottom: 2px solid #f9bf29;
    padding-bottom: 10px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
    font-size: 14px;
}

.summary-item:last-child {
    border-bottom: none;
}

.summary-item span:first-child {
    color: #666;
}

.summary-item span:last-child {
    color: #333;
    font-weight: 600;
}

.summary-item.total {
    border-top: 2px solid #3b5d50;
    padding-top: 15px;
    margin-top: 10px;
    font-size: 18px;
}

.summary-item.total span {
    color: #3b5d50;
    font-weight: 700;
}

.badge {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

.badge-warning {
    background: #fff3cd;
    color: #856404;
}

.badge-success {
    background: #d4edda;
    color: #155724;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.btn {
    padding: 14px 24px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 15px;
}

.btn-primary {
    background: #3b5d50;
    color: white;
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

.btn-block {
    width: 100%;
}

.alert {
    padding: 15px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
}

.alert-info {
    background: #d1ecf1;
    border: 1px solid #bee5eb;
    color: #0c5460;
}

.alert-info i {
    font-size: 20px;
}

/* Responsive Design */
@media (max-width: 992px) {
    .payment-content {
        grid-template-columns: 1fr;
    }
    
    .order-summary-card {
        position: static;
    }
}

@media (max-width: 768px) {
    .payment-wrapper {
        padding: 20px 0;
    }
    
    .page-header {
        padding: 20px;
    }
    
    .page-header h1 {
        font-size: 24px;
    }
    
    .payment-amount-card .amount {
        font-size: 32px;
    }
    
    .bank-card {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .btn-copy {
        width: 100%;
        justify-content: center;
    }
}
</style>

<div class="payment-wrapper">
    <div class="container">
        <div class="page-header">
            <h1><i class="fas fa-credit-card"></i> Instruksi Pembayaran</h1>
            <p>Nomor Pesanan: <strong><?= $order->kode_pesanan ?></strong></p>
        </div>
        
        <div class="payment-content">
            <div class="payment-info">
                <div class="payment-amount-card">
                    <h3>Total Pembayaran</h3>
                    <div class="amount">Rp <?= number_format($order->total_harga, 0, ',', '.') ?></div>
                    <p class="payment-method">Metode: <?= ucfirst($order->metode_pembayaran) ?></p>
                </div>
                
                <?php if ($order->metode_pembayaran == 'transfer'): ?>
                <div class="bank-accounts">
                    <h3>Rekening Tujuan Transfer</h3>
                    
                    <?php if (isset($store) && !empty($store->bank_name) && !empty($store->bank_account_number)): ?>
                        <div class="bank-card">
                            <div class="bank-logo">
                                <i class="fas fa-university"></i>
                            </div>
                            <div class="bank-info">
                                <h4><?= $store->bank_name ?></h4>
                                <p class="account-number"><?= $store->bank_account_number ?></p>
                                <p class="account-name">a.n. <?= $store->bank_account_name ?? $store->nama_toko ?></p>
                            </div>
                            <button class="btn-copy" onclick="copyToClipboard('<?= $store->bank_account_number ?>', this)">
                                <i class="fas fa-copy"></i> Salin
                            </button>
                        </div>
                    <?php else: ?>
                        <div class="no-bank-info">
                            <i class="fas fa-info-circle"></i>
                            <p><strong>Informasi rekening belum tersedia.</strong></p>
                            <p>Silakan hubungi admin melalui WhatsApp untuk informasi pembayaran.</p>
                            <?php if (isset($store) && !empty($store->whatsapp)): ?>
                                <a href="https://wa.me/<?= $store->whatsapp ?>" 
                                   class="btn btn-primary" 
                                   style="margin-top: 10px; display: inline-flex;"
                                   target="_blank">
                                    <i class="fab fa-whatsapp"></i> Hubungi Admin
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <div class="payment-instructions">
                    <h3>Cara Pembayaran</h3>
                    <ol>
                        <li>Transfer sejumlah <strong>Rp <?= number_format($order->total_harga, 0, ',', '.') ?></strong> ke rekening di atas</li>
                        <li>Simpan bukti transfer dengan baik</li>
                        <li>Upload bukti transfer melalui tombol di bawah</li>
                        <li>Tunggu konfirmasi dari admin (maksimal 1x24 jam)</li>
                        <li>Pesanan akan diproses setelah pembayaran dikonfirmasi</li>
                    </ol>
                </div>
                
                <div class="payment-notes">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <h4>Catatan Penting:</h4>
                        <ul>
                            <li>Transfer harus sesuai dengan jumlah yang tertera</li>
                            <li>Simpan bukti transfer sampai pesanan selesai</li>
                            <li>Hubungi kami jika ada kendala dalam pembayaran</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="payment-sidebar">
                <div class="order-summary-card">
                    <h3>Detail Pesanan</h3>
                    <div class="summary-item">
                        <span>Nomor Pesanan:</span>
                        <span><?= $order->kode_pesanan ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Tanggal:</span>
                        <span><?= date('d/m/Y H:i', strtotime($order->created_at)) ?></span>
                    </div>
                    <div class="summary-item">
                        <span>Status:</span>
                        <span class="badge badge-warning"><?= ucfirst(str_replace('_', ' ', $order->status_pesanan)) ?></span>
                    </div>
                    <div class="summary-item total">
                        <span>Total:</span>
                        <span>Rp <?= number_format($order->total_harga, 0, ',', '.') ?></span>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <?php if (!isset($payment) || $payment->status_bayar == 'pending'): ?>
                    <a href="<?= base_url('payment/upload/' . $order->id) ?>" class="btn btn-primary btn-block">
                        <i class="fas fa-upload"></i> Upload Bukti Pembayaran
                    </a>
                    <?php else: ?>
                    <div class="alert alert-info">
                        <i class="fas fa-check-circle"></i>
                        Bukti pembayaran sudah diunggah. Menunggu verifikasi admin.
                    </div>
                    <?php endif; ?>
                    
                    <a href="<?= base_url('profile/orders') ?>" class="btn btn-outline btn-block">
                        <i class="fas fa-list"></i> Lihat Semua Pesanan
                    </a>
                    
                    <a href="<?= base_url() ?>" class="btn btn-outline btn-block">
                        <i class="fas fa-home"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text, button) {
    navigator.clipboard.writeText(text).then(function() {
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check"></i> Tersalin!';
        button.classList.add('copy-success');
        
        setTimeout(function() {
            button.innerHTML = originalText;
            button.classList.remove('copy-success');
        }, 2000);
    }).catch(function(err) {
        alert('Gagal menyalin: ' + err);
    });
}
</script>