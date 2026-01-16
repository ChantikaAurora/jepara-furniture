<?php
/**
 * File: application/views/rehap/detail.php
 * Rehap Detail - Customer View
 * FIXED VERSION - Removed menunggu_persetujuan status
 */
?>
<style>
.page-header {
    background: linear-gradient(135deg, #2d5a4a 0%, #1a3a2e 100%);
    padding: 40px 0 !important;
    margin-bottom: 40px !important;
}
.page-header h1 {
    font-size: 36px !important;
    font-weight: 700 !important;
    color: #ffffff !important;
    margin: 0 !important;
}
.detail-section {
    padding: 60px 0 !important;
    background: #ffffff !important;
}
.detail-layout {
    display: grid !important;
    grid-template-columns: 2fr 1fr !important;
    gap: 40px !important;
}
.detail-card {
    background: #ffffff !important;
    border: 1px solid #dee2e6 !important;
    border-radius: 10px !important;
    padding: 40px !important;
    margin-bottom: 25px !important;
}
.detail-card h2 {
    font-size: 24px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 25px !important;
    padding-bottom: 15px !important;
    border-bottom: 2px solid #eff2f1 !important;
}
.info-grid {
    display: grid !important;
    grid-template-columns: repeat(2, 1fr) !important;
    gap: 20px !important;
}
.info-item {
    background: #dce5e4 !important;
    padding: 18px !important;
    border-radius: 8px !important;
}
.info-item label {
    display: block !important;
    font-size: 13px !important;
    color: #6a6a6a !important;
    font-weight: 600 !important;
    margin-bottom: 6px !important;
    text-transform: uppercase !important;
}
.info-item p {
    font-size: 15px !important;
    color: #2f2f2f !important;
    margin: 0 !important;
    font-weight: 600 !important;
}
.info-item.full-width {
    grid-column: 1 / -1 !important;
}
.badge {
    display: inline-block !important;
    padding: 8px 16px !important;
    border-radius: 20px !important;
    font-size: 13px !important;
    font-weight: 600 !important;
}
.badge-warning { background: #fff3cd !important; color: #856404 !important; }
.badge-info { background: #d1ecf1 !important; color: #0c5460 !important; }
.badge-success { background: #d4edda !important; color: #155724 !important; }
.badge-danger { background: #f8d7da !important; color: #721c24 !important; }
.badge-primary { background: #cfe2ff !important; color: #084298 !important; }
.photos-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 15px !important;
}
.photos-grid a {
    display: block !important;
    border-radius: 8px !important;
    overflow: hidden !important;
    aspect-ratio: 1 !important;
}
.photos-grid img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    transition: transform 0.3s ease !important;
}
.photos-grid a:hover img {
    transform: scale(1.05) !important;
}
.action-card {
    background: #dce5e4 !important;
    border-radius: 10px !important;
    padding: 28px !important;
    margin-bottom: 20px !important;
}
.action-card h3 {
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 15px !important;
}
.action-card p {
    font-size: 14px !important;
    color: #6a6a6a !important;
    margin-bottom: 20px !important;
}
.btn { 
    padding: 14px 35px !important; 
    border-radius: 30px !important; 
    font-weight: 600 !important; 
    font-size: 16px !important; 
    text-decoration: none !important; 
    display: inline-flex !important; 
    align-items: center !important; 
    gap: 10px !important; 
    transition: all 0.3s ease !important; 
    border: none !important; 
    cursor: pointer !important; 
    width: 100% !important; 
    justify-content: center !important; 
}
.btn-whatsapp { background: #25D366 !important; color: #ffffff !important; }
.btn-whatsapp:hover { background: #128C7E !important; }
.btn-primary { background: #3b5d50 !important; color: #ffffff !important; }
.btn-primary:hover { background: #2d4a3f !important; }
.btn-outline { background: transparent !important; color: #3b5d50 !important; border: 2px solid #3b5d50 !important; }
.btn-outline:hover { background: #3b5d50 !important; color: #ffffff !important; }
.form-group { margin-bottom: 20px !important; }
.form-group label { display: block !important; margin-bottom: 8px !important; font-weight: 600 !important; color: #2f2f2f !important; }
.form-control { width: 100% !important; padding: 12px !important; border: 1px solid #dee2e6 !important; border-radius: 6px !important; }
.alert {
    padding: 15px 20px !important;
    border-radius: 8px !important;
    margin-bottom: 20px !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
}
.alert-info { background: #d1ecf1 !important; color: #0c5460 !important; border: 1px solid #bee5eb !important; }
.alert-success { background: #d4edda !important; color: #155724 !important; border: 1px solid #c3e6cb !important; }
.alert-warning { background: #fff3cd !important; color: #856404 !important; border: 1px solid #ffeaa7 !important; }
.progress-bar {
    background: #e9ecef !important;
    border-radius: 10px !important;
    height: 24px !important;
    overflow: hidden !important;
    margin-top: 10px !important;
}
.progress-fill {
    background: linear-gradient(90deg, #3b5d50 0%, #2d4a3f 100%) !important;
    height: 100% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: white !important;
    font-weight: 600 !important;
    font-size: 13px !important;
    transition: width 0.3s ease !important;
}
.payment-highlight-box {
    background: linear-gradient(135deg, #3b5d50 0%, #2d4a3f 100%) !important;
    border-radius: 15px !important;
    padding: 30px !important;
    text-align: center !important;
    color: white !important;
    margin-bottom: 25px !important;
    box-shadow: 0 8px 24px rgba(59,93,80,0.25) !important;
}
.payment-highlight-box label {
    display: block !important;
    font-size: 14px !important;
    color: rgba(255,255,255,0.85) !important;
    font-weight: 600 !important;
    margin-bottom: 12px !important;
    text-transform: uppercase !important;
    letter-spacing: 1.5px !important;
}
.payment-highlight-box .amount {
    font-size: 42px !important;
    font-weight: 800 !important;
    color: #ffffff !important;
    margin: 0 !important;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
}
.bank-info {
    background: #f8f9fa !important;
    padding: 25px !important;
    border-radius: 12px !important;
    margin-top: 20px !important;
    border: 2px solid #e9ecef !important;
}
.bank-info h4 {
    font-size: 16px !important;
    font-weight: 700 !important;
    color: #2f2f2f !important;
    margin-bottom: 18px !important;
    display: flex !important;
    align-items: center !important;
    gap: 8px !important;
}
.bank-detail {
    display: flex !important;
    justify-content: space-between !important;
    padding: 12px 0 !important;
    border-bottom: 1px solid #dee2e6 !important;
}
.bank-detail:last-child {
    border-bottom: none !important;
}
.bank-detail label {
    font-weight: 600 !important;
    color: #6a6a6a !important;
    font-size: 14px !important;
}
.bank-detail span {
    font-weight: 700 !important;
    color: #2f2f2f !important;
    font-size: 14px !important;
}
.payment-pending-box {
    background: #fff3cd !important;
    border-left: 4px solid #ffc107 !important;
    padding: 20px !important;
    border-radius: 8px !important;
    margin-bottom: 20px !important;
}
@media (max-width: 992px) {
    .detail-layout { grid-template-columns: 1fr !important; }
    .info-grid { grid-template-columns: 1fr !important; }
    .photos-grid { grid-template-columns: repeat(2, 1fr) !important; }
    .payment-highlight-box .amount { font-size: 32px !important; }
}
</style>

<?php $this->load->view('templates/navbar'); ?>

<div class="page-header">
    <div class="container">
        <h1>Detail Permintaan Rehap</h1>
        <p style="color: #ffffff; margin-top: 10px;">Kode: <?= $request->kode_rehap ?></p>
    </div>
</div>

<section class="detail-section">
    <div class="container">
        <!-- Alert Messages -->
        <?php if($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> 
            <span><?= $this->session->flashdata('success') ?></span>
        </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-circle"></i> 
            <span><?= $this->session->flashdata('error') ?></span>
        </div>
        <?php endif; ?>

        <div class="detail-layout">
            <div class="detail-main">
                <!-- Status Timeline -->
                <div class="detail-card">
                    <h2>Status Permintaan</h2>
                    <div class="info-item">
                        <label>Status Saat Ini</label>
                        <p>
                            <?php
                            $status_class = 'warning';
                            $status_text = '';
                            switch($request->status) {
                                case 'menunggu_review':
                                    $status_class = 'warning';
                                    $status_text = 'Menunggu Review Admin';
                                    break;
                                case 'ditolak':
                                    $status_class = 'danger';
                                    $status_text = 'Ditolak';
                                    break;
                                case 'menunggu_pembayaran':
                                    $status_class = 'warning';
                                    $status_text = 'Menunggu Pembayaran';
                                    break;
                                case 'menunggu_verifikasi_bayar':
                                    $status_class = 'info';
                                    $status_text = 'Menunggu Verifikasi Pembayaran';
                                    break;
                                case 'sedang_dikerjakan':
                                    $status_class = 'primary';
                                    $status_text = 'Sedang Dikerjakan';
                                    break;
                                case 'selesai':
                                    $status_class = 'success';
                                    $status_text = 'Selesai';
                                    break;
                                case 'dibatalkan':
                                    $status_class = 'danger';
                                    $status_text = 'Dibatalkan';
                                    break;
                            }
                            ?>
                            <span class="badge badge-<?= $status_class ?>"><?= $status_text ?></span>
                        </p>
                    </div>

                    <?php if ($request->status == 'sedang_dikerjakan' || $request->status == 'selesai'): ?>
                    <div class="info-item full-width" style="margin-top: 20px;">
                        <label>Progress Pengerjaan</label>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?= $request->progress_persen ?>%;">
                                <?= $request->progress_persen ?>%
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($request->catatan_admin)): ?>
                    <div class="info-item full-width" style="margin-top: 20px;">
                        <label>Catatan dari Admin</label>
                        <p><?= nl2br(htmlspecialchars($request->catatan_admin)) ?></p>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Informasi Permintaan -->
                <div class="detail-card">
                    <h2>Informasi Permintaan</h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Kode Rehap</label>
                            <p><?= $request->kode_rehap ?></p>
                        </div>
                        <div class="info-item">
                            <label>Tanggal Pengajuan</label>
                            <p><?= date('d F Y', strtotime($request->created_at)) ?></p>
                        </div>
                        <div class="info-item full-width">
                            <label>Nama Furniture</label>
                            <p><?= $request->nama_furniture ?></p>
                        </div>
                        <div class="info-item full-width">
                            <label>Deskripsi Kerusakan</label>
                            <p><?= nl2br(htmlspecialchars($request->deskripsi_kerusakan)) ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- Foto Furniture -->
                <div class="detail-card">
                    <h2>Foto Furniture</h2>
                    <div class="photos-grid">
                        <?php 
                        $has_photo = false;
                        for ($i = 1; $i <= 6; $i++) {
                            $photo_field = 'foto_' . $i;
                            if (!empty($request->$photo_field)): 
                                $has_photo = true;
                        ?>
                            <a href="<?= base_url('uploads/rehap/' . $request->$photo_field) ?>" target="_blank">
                                <img src="<?= base_url('uploads/rehap/' . $request->$photo_field) ?>" alt="Foto <?= $i ?>">
                            </a>
                        <?php 
                            endif;
                        }
                        if (!$has_photo) {
                            echo '<p style="grid-column: 1/-1; text-align: center; color: #999;">Tidak ada foto</p>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Info Pembayaran -->
                <?php if (in_array($request->status, ['menunggu_pembayaran', 'menunggu_verifikasi_bayar', 'sedang_dikerjakan', 'selesai'])): ?>
                <div class="detail-card">
                    <h2>Informasi Pembayaran</h2>
                    
                    <?php if (!empty($request->jumlah_bayar) && $request->jumlah_bayar > 0): ?>
                        <!-- Tampilkan Jumlah Bayar dengan Highlight -->
                        <div class="payment-highlight-box">
                            <label>Total yang Harus Dibayar</label>
                            <p class="amount">Rp <?= number_format($request->jumlah_bayar, 0, ',', '.') ?></p>
                        </div>

                        <?php if (!empty($request->bank_name)): ?>
                        <div class="bank-info">
                            <h4>
                                <i class="fas fa-university"></i> 
                                Transfer ke Rekening Berikut:
                            </h4>
                            <div class="bank-detail">
                                <label>Nama Bank</label>
                                <span><?= $request->bank_name ?></span>
                            </div>
                            <div class="bank-detail">
                                <label>Nomor Rekening</label>
                                <span><?= $request->bank_account_number ?></span>
                            </div>
                            <div class="bank-detail">
                                <label>Atas Nama</label>
                                <span><?= $request->bank_account_name ?></span>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($request->status == 'menunggu_pembayaran'): ?>
                        <!-- Form Upload Bukti Pembayaran -->
                        <div style="margin-top: 25px; padding: 20px; background: #f8f9fa; border-radius: 10px;">
                            <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 15px;">
                                <i class="fas fa-upload"></i> Upload Bukti Pembayaran
                            </h4>
                            <form action="<?= base_url('rehap/upload_payment') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="rehap_id" value="<?= $request->id ?>">
                                <div class="form-group">
                                    <label>Bukti Transfer (JPG, PNG, atau PDF - Max 2MB)</label>
                                    <input type="file" 
                                           name="bukti_bayar" 
                                           class="form-control" 
                                           accept="image/*,application/pdf" 
                                           required>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-upload"></i> Upload Bukti Pembayaran
                                </button>
                            </form>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($request->bukti_bayar)): ?>
                        <div style="margin-top: 25px;">
                            <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 15px;">
                                <i class="fas fa-check-circle"></i> Bukti Pembayaran Anda
                            </h4>
                            <a href="<?= base_url('uploads/rehap/payment/' . $request->bukti_bayar) ?>" 
                               target="_blank" 
                               class="btn btn-outline">
                                <i class="fas fa-file-image"></i> Lihat Bukti Pembayaran
                            </a>
                            
                            <?php if ($request->status == 'menunggu_verifikasi_bayar'): ?>
                            <div class="alert alert-info" style="margin-top: 15px;">
                                <i class="fas fa-clock"></i> 
                                <span>Bukti pembayaran Anda sedang diverifikasi oleh admin. Mohon menunggu.</span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                    <?php else: ?>
                        <!-- Jumlah bayar belum diset oleh admin -->
                        <div class="payment-pending-box">
                            <h4 style="margin: 0 0 10px 0; font-size: 16px; color: #856404;">
                                <i class="fas fa-hourglass-half"></i> 
                                Admin Sedang Memproses
                            </h4>
                            <p style="margin: 0; font-size: 14px; color: #856404;">
                                Admin sedang menentukan jumlah pembayaran yang harus dibayar. 
                                Silakan tunggu atau hubungi admin untuk informasi lebih lanjut.
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            
            <aside class="detail-sidebar">
                <div class="action-card">
                    <h3><i class="fab fa-whatsapp"></i> Konsultasi</h3>
                    <p>Hubungi admin untuk diskusi lebih lanjut tentang permintaan rehap Anda</p>
                    <a href="<?= base_url('rehap/contact_whatsapp/' . $request->id) ?>" class="btn btn-whatsapp">
                        <i class="fab fa-whatsapp"></i> Chat Admin
                    </a>
                </div>
                
                <?php if (!empty($request->jumlah_bayar)): ?>
                <div class="action-card">
                    <h3><i class="fas fa-info-circle"></i> Info Pembayaran</h3>
                    <p style="margin-bottom: 10px;">Jumlah yang harus dibayar:</p>
                    <p style="font-size: 24px; font-weight: 800; color: #3b5d50; margin: 0;">
                        Rp <?= number_format($request->jumlah_bayar, 0, ',', '.') ?>
                    </p>
                    <?php if (!empty($request->estimasi_waktu)): ?>
                    <p style="margin-top: 15px; font-size: 14px; color: #6a6a6a;">
                        Estimasi waktu: <strong><?= $request->estimasi_waktu ?> hari</strong>
                    </p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <div class="action-card">
                    <a href="<?= base_url('rehap/my_requests') ?>" class="btn btn-outline">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </aside>
        </div>
    </div>
</section>