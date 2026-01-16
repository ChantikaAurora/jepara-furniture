<?php
/**
 * Admin Transaction Detail - Modern Dashboard Theme
 * Styled to match Rehap Detail page
 */
?>
<style>
/* Transaction Detail - Dashboard Theme */
.detail-wrapper {
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
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.page-title {
    font-size: 32px;
    font-weight: 800;
    color: #2d1810;
    display: flex;
    align-items: center;
    gap: 12px;
}

.page-title i {
    color: #8B5E3C;
}

.page-subtitle {
    font-size: 14px;
    color: #6b5947;
    margin-top: 4px;
}

.btn-back {
    background: #f3f4f6;
    color: #374151;
    padding: 12px 24px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
}

.btn-back:hover {
    background: #e5e7eb;
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

.alert-info {
    background: #dbeafe;
    border-color: #3b82f6;
    color: #1e40af;
}

.alert-warning {
    background: #fef3c7;
    border-color: #f59e0b;
    color: #92400e;
}

.alert i {
    font-size: 18px;
    margin-top: 2px;
}

.detail-layout {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
}

.detail-section {
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
    border-bottom: 2px solid #f3f4f6;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title i {
    color: #8B5E3C;
    font-size: 20px;
}

.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.info-item.full-width {
    grid-column: 1 / -1;
}

.info-label {
    font-size: 13px;
    font-weight: 600;
    color: #6b5947;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-value {
    font-size: 15px;
    color: #2d1810;
    line-height: 1.6;
}

.info-value strong {
    font-weight: 700;
}

.badge {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    display: inline-block;
}

.badge-secondary {
    background: #f3f4f6;
    color: #6b7280;
}

.badge-warning {
    background: #fef3c7;
    color: #92400e;
}

.badge-info {
    background: #dbeafe;
    color: #1e40af;
}

.badge-primary {
    background: rgba(139,94,60,0.15);
    color: #6d4a2f;
}

.badge-success {
    background: #d1fae5;
    color: #065f46;
}

.badge-danger {
    background: #fee2e2;
    color: #991b1b;
}

/* Table Styles */
.table-responsive {
    overflow-x: auto;
    margin: -8px;
    padding: 8px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #faf8f3;
}

th {
    padding: 14px 16px;
    text-align: left;
    font-size: 13px;
    font-weight: 700;
    color: #6b5947;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid #e5e7eb;
}

td {
    padding: 16px;
    font-size: 14px;
    color: #2d1810;
    border-bottom: 1px solid #f3f4f6;
    vertical-align: middle;
}

tbody tr {
    transition: all 0.2s ease;
}

tbody tr:hover {
    background: #faf8f3;
}

tfoot td {
    font-weight: 700;
    border-top: 2px solid #e5e7eb;
    border-bottom: none;
    padding-top: 20px;
}

.product-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.product-image {
    width: 60px;
    height: 60px;
    border-radius: 10px;
    object-fit: cover;
    border: 2px solid #e5e7eb;
}

.text-end {
    text-align: right;
}

.text-center {
    text-align: center;
}

.text-success {
    color: #10b981;
}

.text-muted {
    color: #9ca3af;
    font-size: 13px;
}

/* Payment Proof */
.payment-card {
    background: #faf8f3;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 16px;
    border: 1px solid #e5e7eb;
}

.payment-image-container {
    display: flex;
    justify-content: center;
    margin-bottom: 16px;
}

.payment-image {
    max-width: 100%;
    max-height: 200px;
    border-radius: 12px;
    border: 2px solid #e5e7eb;
    cursor: pointer;
    transition: all 0.2s ease;
}

.payment-image:hover {
    transform: scale(1.02);
    border-color: #8B5E3C;
}

.payment-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
}

.payment-actions {
    display: flex;
    gap: 8px;
}

/* Forms */
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

.form-control, .form-select {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    background: #fafafa;
    transition: all 0.2s ease;
}

.form-control:focus, .form-select:focus {
    outline: none;
    border-color: #8B5E3C;
    background: white;
    box-shadow: 0 0 0 3px rgba(139,94,60,0.1);
}

textarea.form-control {
    min-height: 100px;
    resize: vertical;
}

/* Buttons */
.btn {
    padding: 12px 24px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-primary {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    width: 100%;
    justify-content: center;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(139,94,60,0.3);
}

.btn-sm {
    padding: 8px 16px;
    font-size: 13px;
}

.btn-success {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(16,185,129,0.3);
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.btn-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(239,68,68,0.3);
}

.w-100 {
    width: 100%;
}

/* Sidebar */
.sidebar-section {
    background: white;
    border-radius: 18px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.status-badge-large {
    font-size: 16px;
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 700;
    display: inline-block;
    margin-bottom: 16px;
}

.info-box {
    background: #faf8f3;
    border-left: 4px solid #8B5E3C;
    padding: 16px;
    border-radius: 8px;
    margin-bottom: 16px;
}

.info-box p {
    margin: 8px 0;
    font-size: 14px;
    color: #2d1810;
}

.info-box strong {
    color: #2d1810;
    font-weight: 700;
}

.total-amount {
    font-size: 24px;
    font-weight: 800;
    color: #10b981;
    margin-top: 8px;
}

/* Responsive */
@media (max-width: 1024px) {
    .detail-layout {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .detail-wrapper {
        padding: 20px;
    }

    .page-header {
        padding: 24px;
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }

    table {
        font-size: 13px;
    }

    th, td {
        padding: 12px 10px;
    }

    .product-info {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

<div class="detail-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">
                <i class="fas fa-shopping-bag"></i>
                Detail Transaksi
            </h1>
            <p class="page-subtitle">
                Kode Pesanan: <strong><?= $transaction->kode_pesanan ?></strong>
            </p>
        </div>
        <a href="<?= base_url('admin/transaksi') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Alert Messages -->
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <div><?= $this->session->flashdata('success') ?></div>
    </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle"></i>
        <div><?= $this->session->flashdata('error') ?></div>
    </div>
    <?php endif; ?>

    <!-- Detail Layout -->
    <div class="detail-layout">
        <!-- Main Content -->
        <div class="detail-main">
            <!-- Customer Info -->
            <div class="detail-section">
                <h3 class="section-title">
                    <i class="fas fa-user"></i>
                    Informasi Customer
                </h3>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Nama Customer</div>
                        <div class="info-value"><strong><?= $customer->nama_lengkap ?></strong></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email</div>
                        <div class="info-value"><?= $customer->email ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Nama Penerima</div>
                        <div class="info-value"><strong><?= $transaction->nama_penerima ?></strong></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">No. Telepon</div>
                        <div class="info-value"><?= $transaction->no_telepon_penerima ?></div>
                    </div>
                    <div class="info-item full-width">
                        <div class="info-label">Alamat Pengiriman</div>
                        <div class="info-value"><?= nl2br($transaction->alamat_pengiriman) ?></div>
                    </div>
                    <?php if (!empty($transaction->catatan_pesanan)): ?>
                    <div class="info-item full-width">
                        <div class="alert alert-info">
                            <i class="fas fa-sticky-note"></i>
                            <div>
                                <strong>Catatan Pesanan:</strong><br>
                                <?= nl2br($transaction->catatan_pesanan) ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Order Items -->
            <div class="detail-section">
                <h3 class="section-title">
                    <i class="fas fa-shopping-cart"></i>
                    Item Pesanan
                </h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-end">Harga</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item): ?>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <?php if (!empty($item->gambar_1)): ?>
                                            <img src="<?= base_url('uploads/products/' . $item->gambar_1) ?>" 
                                                 alt="<?= $item->nama_produk ?>" 
                                                 class="product-image">
                                        <?php endif; ?>
                                        <span><strong><?= $item->nama_produk ?></strong></span>
                                    </div>
                                </td>
                                <td class="text-center"><strong><?= $item->jumlah ?></strong></td>
                                <td class="text-end">Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
                                <td class="text-end"><strong>Rp <?= number_format($item->subtotal, 0, ',', '.') ?></strong></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end">
                                    <strong style="font-size: 16px;">TOTAL:</strong>
                                </td>
                                <td class="text-end">
                                    <span class="text-success" style="font-size: 20px; font-weight: 800;">
                                        Rp <?= number_format($transaction->total_harga, 0, ',', '.') ?>
                                    </span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="detail-section">
                <h3 class="section-title">
                    <i class="fas fa-credit-card"></i>
                    Informasi Pembayaran
                </h3>
                
                <div class="info-item" style="margin-bottom: 20px;">
                    <div class="info-label">Metode Pembayaran</div>
                    <div class="info-value">
                        <strong><?= ucfirst(str_replace('_', ' ', $transaction->metode_pembayaran)) ?></strong>
                    </div>
                </div>

                <?php if (!empty($payments)): ?>
                    <?php foreach ($payments as $payment): ?>
                        <div class="payment-card">
                            <div class="info-grid" style="margin-bottom: 16px;">
                                <div class="info-item">
                                    <div class="info-label">Jumlah Bayar</div>
                                    <div class="info-value">
                                        <strong style="color: #10b981; font-size: 18px;">
                                            Rp <?= number_format($payment->jumlah_bayar, 0, ',', '.') ?>
                                        </strong>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Tanggal Upload</div>
                                    <div class="info-value">
                                        <?= date('d F Y, H:i', strtotime($payment->created_at)) ?>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Status Pembayaran</div>
                                    <div class="info-value">
                                        <?php
                                        $badge_class = 'secondary';
                                        switch($payment->status_bayar) {
                                            case 'terverifikasi': $badge_class = 'success'; break;
                                            case 'menunggu_verifikasi': $badge_class = 'warning'; break;
                                            case 'ditolak': $badge_class = 'danger'; break;
                                        }
                                        ?>
                                        <span class="badge badge-<?= $badge_class ?>">
                                            <?= ucfirst(str_replace('_', ' ', $payment->status_bayar)) ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <?php if (!empty($payment->bukti_bayar)): ?>
                                <div class="payment-image-container">
                                    <a href="<?= base_url('uploads/payments/' . $payment->bukti_bayar) ?>" target="_blank">
                                        <img src="<?= base_url('uploads/payments/' . $payment->bukti_bayar) ?>" 
                                             class="payment-image"
                                             alt="Bukti Pembayaran">
                                    </a>
                                </div>
                                <p class="text-center text-muted" style="margin: 0;">
                                    <i class="fas fa-info-circle"></i> Klik gambar untuk melihat ukuran penuh
                                </p>
                            <?php else: ?>
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    <div>Belum ada bukti pembayaran yang diupload</div>
                                </div>
                            <?php endif; ?>

                            <?php if ($payment->status_bayar == 'menunggu_verifikasi'): ?>
                                <div class="payment-actions" style="margin-top: 16px;">
                                    <form action="<?= base_url('admin/transaksi/verify-payment/' . $payment->id) ?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="status" value="terverifikasi">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i> Verifikasi
                                        </button>
                                    </form>
                                    <form action="<?= base_url('admin/transaksi/verify-payment/' . $payment->id) ?>" method="POST" style="display: inline;">
                                        <input type="hidden" name="status" value="ditolak">
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menolak pembayaran ini?')">
                                            <i class="fas fa-times"></i> Tolak
                                        </button>
                                    </form>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($payment->catatan_admin)): ?>
                                <div class="alert alert-info" style="margin-top: 16px; margin-bottom: 0;">
                                    <i class="fas fa-comment"></i>
                                    <div>
                                        <strong>Catatan Admin:</strong><br>
                                        <?= nl2br($payment->catatan_admin) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i>
                        <div>Belum ada bukti pembayaran yang diupload</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="detail-sidebar">
            <!-- Status Card -->
            <div class="sidebar-section">
                <h3 class="section-title">Status Pesanan</h3>
                
                <div class="info-item" style="margin-bottom: 20px;">
                    <div class="info-label">Status Saat Ini</div>
                    <div>
                        <?php
                        $status_badge = [
                            'pending' => 'secondary',
                            'menunggu_konfirmasi' => 'warning',
                            'dikonfirmasi' => 'info',
                            'diproses' => 'primary',
                            'selesai' => 'success',
                            'dibatalkan' => 'danger'
                        ];
                        $badge_class = $status_badge[$transaction->status_pesanan] ?? 'secondary';
                        ?>
                        <span class="badge badge-<?= $badge_class ?> status-badge-large">
                            <?= ucfirst(str_replace('_', ' ', $transaction->status_pesanan)) ?>
                        </span>
                    </div>
                </div>

                <!-- Update Status Form -->
                <form action="<?= base_url('admin/transaksi/update-status/' . $transaction->id) ?>" method="POST">
                    <div class="form-group">
                        <label class="form-label">Ubah Status</label>
                        <select name="status_pesanan" class="form-select" required>
                            <option value="pending" <?= $transaction->status_pesanan == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="menunggu_konfirmasi" <?= $transaction->status_pesanan == 'menunggu_konfirmasi' ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
                            <option value="dikonfirmasi" <?= $transaction->status_pesanan == 'dikonfirmasi' ? 'selected' : '' ?>>Dikonfirmasi</option>
                            <option value="diproses" <?= $transaction->status_pesanan == 'diproses' ? 'selected' : '' ?>>Diproses</option>
                            <option value="selesai" <?= $transaction->status_pesanan == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                            <option value="dibatalkan" <?= $transaction->status_pesanan == 'dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Catatan (Opsional)</label>
                        <textarea name="catatan" class="form-control" rows="3" placeholder="Tambahkan catatan jika diperlukan"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Status
                    </button>
                </form>
            </div>

            <!-- Transaction Info -->
            <div class="sidebar-section">
                <h3 class="section-title">Informasi Transaksi</h3>
                
                <div class="info-box">
                    <p>
                        <strong>Tanggal Pesanan:</strong><br>
                        <?= date('d F Y, H:i', strtotime($transaction->created_at)) ?> WIB
                    </p>
                    <p>
                        <strong>Terakhir Update:</strong><br>
                        <?= date('d F Y, H:i', strtotime($transaction->updated_at)) ?> WIB
                    </p>
                    <hr style="border: none; border-top: 1px solid #e5e7eb; margin: 12px 0;">
                    <p style="margin-bottom: 4px;">
                        <strong>Total Pembayaran:</strong>
                    </p>
                    <div class="total-amount">
                        Rp <?= number_format($transaction->total_harga, 0, ',', '.') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>