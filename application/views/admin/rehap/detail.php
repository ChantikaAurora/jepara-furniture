<?php
/**
 * Admin Rehap Detail - FIXED VERSION
 * Removed menunggu_persetujuan status
 */

// Get store profile - FIXED
$this->load->model('Store_profile_model');
$store = $this->Store_profile_model->get_profile();

// Get customer info
$customer = $request; // sudah join dengan users

// Prepare photos array
$photos = [];
for ($i = 1; $i <= 6; $i++) {
    $field = 'foto_' . $i;
    $photos[] = $request->$field ?? null;
}
?>
<style>
/* Rehap Detail - Dashboard Theme */
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
    border-bottom: 1px solid #f3f4f6;
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

.badge-warning {
    background: #fef3c7;
    color: #92400e;
}

.badge-info {
    background: #dbeafe;
    color: #1e40af;
}

.badge-success {
    background: #d1fae5;
    color: #065f46;
}

.badge-danger {
    background: #fee2e2;
    color: #991b1b;
}

.badge-primary {
    background: rgba(139,94,60,0.15);
    color: #6d4a2f;
}

.photos-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}

.photo-item {
    position: relative;
}

.photos-grid a {
    display: block;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid #e5e7eb;
    transition: all 0.2s ease;
}

.photos-grid a:hover {
    border-color: #8B5E3C;
    transform: scale(1.05);
}

.photos-grid img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.photo-item p {
    text-align: center;
    font-size: 12px;
    color: #6b5947;
    margin-top: 8px;
}

.form-group {
    margin-bottom: 16px;
}

.form-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #2d1810;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    background: #fafafa;
}

.form-control:focus {
    outline: none;
    border-color: #8B5E3C;
    background: white;
    box-shadow: 0 0 0 3px rgba(139,94,60,0.1);
}

textarea.form-control {
    min-height: 80px;
    resize: vertical;
}

.btn-primary {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    padding: 12px 24px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    width: 100%;
    transition: all 0.2s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(139,94,60,0.3);
}

.btn-primary:disabled {
    background: #ccc;
    cursor: not-allowed;
}

.btn-success {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    margin-right: 8px;
    transition: all 0.2s ease;
}

.btn-danger {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-success:hover, .btn-danger:hover {
    transform: translateY(-2px);
}

.sidebar-section {
    background: white;
    border-radius: 18px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.progress-bar-container {
    background: #f3f4f6;
    border-radius: 10px;
    height: 24px;
    overflow: hidden;
    margin-top: 12px;
}

.progress-bar {
    background: linear-gradient(90deg, #8B5E3C 0%, #6d4a2f 100%);
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 12px;
    font-weight: 700;
    transition: width 0.3s ease;
}

.payment-proof {
    margin-top: 16px;
    padding: 16px;
    background: #f9fafb;
    border-radius: 10px;
}

.payment-proof img {
    width: 100%;
    max-height: 400px;
    object-fit: contain;
    border-radius: 12px;
    border: 2px solid #e5e7eb;
    margin-top: 12px;
}

.bank-info-box {
    background: #faf8f3;
    border-left: 4px solid #8B5E3C;
    padding: 16px;
    border-radius: 8px;
    margin-bottom: 16px;
}

.bank-info-box strong {
    display: block;
    color: #2d1810;
    margin-bottom: 8px;
    font-size: 15px;
}

.bank-info-box p {
    margin: 4px 0;
    font-size: 14px;
    color: #6b5947;
}

.action-buttons {
    display: flex;
    gap: 10px;
    margin-top: 16px;
}

@media (max-width: 1024px) {
    .detail-layout {
        grid-template-columns: 1fr;
    }

    .photos-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>

<div class="detail-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-file-alt"></i>
            Detail Rehap - <?= $request->kode_rehap ?>
        </h1>
        <a href="<?= base_url('admin/rehap') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
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

    <!-- Detail Layout -->
    <div class="detail-layout">
        <!-- Main Content -->
        <div class="detail-main">
            <!-- Informasi Permintaan -->
            <div class="detail-section">
                <h3 class="section-title">Informasi Permintaan</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Kode Rehap</div>
                        <div class="info-value"><strong><?= $request->kode_rehap ?></strong></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tanggal</div>
                        <div class="info-value"><?= date('d F Y H:i', strtotime($request->created_at)) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Pelanggan</div>
                        <div class="info-value">
                            <strong><?= $customer->nama_lengkap ?></strong><br>
                            <?= $customer->email ?><br>
                            <?= $request->no_telepon_customer ?>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            <?php
                            $status_class = '';
                            $status_text = '';
                            switch($request->status) {
                                case 'menunggu_review':
                                    $status_class = 'warning';
                                    $status_text = 'Menunggu Review';
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
                                    $status_text = 'Menunggu Verifikasi Bayar';
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
                            <span class="badge badge-<?= $status_class ?>">
                                <?= $status_text ?>
                            </span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Nama Furniture</div>
                        <div class="info-value"><?= $request->nama_furniture ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Progress</div>
                        <div class="info-value">
                            <strong><?= $request->progress_persen ?>%</strong>
                            <div class="progress-bar-container">
                                <div class="progress-bar" style="width: <?= $request->progress_persen ?>%">
                                    <?= $request->progress_persen ?>%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-item full-width">
                        <div class="info-label">Alamat Customer</div>
                        <div class="info-value"><?= $request->alamat_customer ?></div>
                    </div>
                    <div class="info-item full-width">
                        <div class="info-label">Deskripsi Kerusakan</div>
                        <div class="info-value"><?= nl2br($request->deskripsi_kerusakan) ?></div>
                    </div>
                </div>
            </div>

            <!-- Foto Furniture -->
            <div class="detail-section">
                <h3 class="section-title">Foto Furniture</h3>
                <div class="photos-grid">
                   <?php
                   $has_photos = false;
                   foreach ($photos as $index => $photo) {
                       if (!empty($photo)) {
                           $has_photos = true;
                           $photo_num = $index + 1;
                           ?>
                           <div class="photo-item">
                               <a href="<?= base_url('uploads/rehap/' . $photo) ?>" 
                                  target="_blank">
                                <img src="<?= base_url('uploads/rehap/' . $photo) ?>" 
                                     alt="Foto <?= $photo_num ?>"
                                     onerror="this.src='<?= base_url('assets/images/no-image.png') ?>'">
                            </a>
                            <p>Foto <?= $photo_num ?></p>
                        </div>
                        <?php
                       }
                   }
                   
                   if (!$has_photos) {
                       echo '<p style="color: #9ca3af;">Belum ada foto yang diupload</p>';
                   }
                   ?>
                </div>
            </div>

            <!-- Form Set Pembayaran (jika menunggu review) -->
            <?php if ($request->status == 'menunggu_review'): ?>
            <div class="detail-section">
                <h3 class="section-title">Setujui & Kirim Info Pembayaran</h3>
                
                <!-- Info Bank -->
                <?php if ($store && !empty($store->bank_name)): ?>
                <div class="bank-info-box">
                    <strong>Informasi Bank Toko:</strong>
                    <p>Bank: <?= $store->bank_name ?></p>
                    <p>Rekening: <?= $store->bank_account_number ?></p>
                    <p>Atas Nama: <?= $store->bank_account_name ?></p>
                </div>
                <?php else: ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        <strong>Informasi bank belum lengkap!</strong><br>
                        Silakan lengkapi informasi bank di <a href="<?= base_url('admin/store_profile') ?>">Profil Toko</a> terlebih dahulu.
                    </div>
                </div>
                <?php endif; ?>

                <form action="<?= base_url('admin/rehap_approve_payment/' . $request->id) ?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Total yang Harus Dibayar (Rp) *</label>
                        <input type="number" 
                            name="jumlah_bayar" 
                            class="form-control" 
                            placeholder="Masukkan jumlah yang harus dibayar"
                            min="0"
                            step="1000"
                            required>
                        <small style="color: #6b5947; font-size: 12px; margin-top: 4px; display: block;">
                            Masukkan jumlah pembayaran yang harus dibayar customer (dalam Rupiah).
                        </small>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Estimasi Waktu Pengerjaan (hari) *</label>
                        <input type="number" 
                            name="estimasi_waktu" 
                            class="form-control" 
                            placeholder="Estimasi hari pengerjaan"
                            min="1"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Catatan untuk Customer (opsional)</label>
                        <textarea name="catatan_admin" 
                                  class="form-control" 
                                  rows="3" 
                                  placeholder="Tambahkan catatan atau informasi tambahan"></textarea>
                    </div>
                    <button type="submit" 
                            class="btn-primary" 
                            <?= (!$store || !$store->bank_name) ? 'disabled' : '' ?>>
                        <i class="fas fa-check"></i> Setujui & Kirim Info Pembayaran
                    </button>
                </form>
            </div>
            <?php endif; ?>

            <!-- Info Pembayaran (jika sudah ada) -->
            <?php if (!empty($request->jumlah_bayar)): ?>
            <div class="detail-section">
                <h3 class="section-title">Detail Pembayaran</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Jumlah yang Harus Dibayar</div>
                        <div class="info-value" style="color: #10b981;">
                            <strong>Rp <?= number_format($request->jumlah_bayar, 0, ',', '.') ?></strong>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Estimasi Waktu</div>
                        <div class="info-value">
                            <strong><?= $request->estimasi_waktu ?> hari</strong>
                        </div>
                    </div>
                    <?php if (!empty($request->bank_name)): ?>
                    <div class="info-item full-width">
                        <div class="info-label">Informasi Bank Transfer</div>
                        <div class="info-value">
                            <strong><?= $request->bank_name ?></strong> - 
                            <?= $request->bank_account_number ?> 
                            a.n. <?= $request->bank_account_name ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="info-item">
                        <div class="info-label">Status Pembayaran</div>
                        <div class="info-value">
                            <?php
                            switch($request->status) {
                                case 'menunggu_pembayaran':
                                    echo '<span class="badge badge-warning">Menunggu Pembayaran</span>';
                                    break;
                                case 'menunggu_verifikasi_bayar':
                                    echo '<span class="badge badge-info">Menunggu Verifikasi</span>';
                                    break;
                                case 'sedang_dikerjakan':
                                case 'selesai':
                                    echo '<span class="badge badge-success">Lunas</span>';
                                    break;
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Bukti Pembayaran (jika ada) -->
                <?php if (!empty($request->bukti_bayar) && $request->status == 'menunggu_verifikasi_bayar'): ?>
                <div class="payment-proof">
                    <strong>Bukti Pembayaran Customer:</strong>
                    <a href="<?= base_url('uploads/rehap/payment/' . $request->bukti_bayar) ?>" target="_blank">
                        <img src="<?= base_url('uploads/rehap/payment/' . $request->bukti_bayar) ?>" alt="Bukti Pembayaran">
                    </a>
                    <div class="action-buttons">
                        <form action="<?= base_url('admin/rehap_verify_payment/' . $request->id) ?>" method="post" style="display: inline;">
                            <input type="hidden" name="action" value="approve">
                            <button type="submit" class="btn-success">
                                <i class="fas fa-check"></i> Verifikasi Pembayaran
                            </button>
                        </form>
                        <form action="<?= base_url('admin/rehap_verify_payment/' . $request->id) ?>" method="post" style="display: inline;">
                            <input type="hidden" name="action" value="reject">
                            <button type="submit" class="btn-danger">
                                <i class="fas fa-times"></i> Tolak Pembayaran
                            </button>
                        </form>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="detail-sidebar">
            <!-- Update Status -->
            <div class="sidebar-section">
                <h3 class="section-title">Update Status</h3>
                <form action="<?= base_url('admin/rehap_update_status/' . $request->id) ?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="menunggu_review" <?= $request->status == 'menunggu_review' ? 'selected' : '' ?>>Menunggu Review</option>
                            <option value="ditolak" <?= $request->status == 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                            <option value="menunggu_pembayaran" <?= $request->status == 'menunggu_pembayaran' ? 'selected' : '' ?>>Menunggu Pembayaran</option>
                            <option value="menunggu_verifikasi_bayar" <?= $request->status == 'menunggu_verifikasi_bayar' ? 'selected' : '' ?>>Menunggu Verifikasi Bayar</option>
                            <option value="sedang_dikerjakan" <?= $request->status == 'sedang_dikerjakan' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                            <option value="selesai" <?= $request->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                            <option value="dibatalkan" <?= $request->status == 'dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Catatan</label>
                        <textarea name="catatan_admin" class="form-control" rows="3" placeholder="Tambahkan catatan untuk customer (opsional)"><?= $request->catatan_admin ?></textarea>
                    </div>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-save"></i> Update Status
                    </button>
                </form>
            </div>

            <!-- Update Progress (jika sedang dikerjakan) -->
            <?php if ($request->status == 'sedang_dikerjakan'): ?>
            <div class="sidebar-section">
                <h3 class="section-title">Update Progress</h3>
                <form action="<?= base_url('admin/rehap_update_progress/' . $request->id) ?>" method="post">
                    <div class="form-group">
                        <label class="form-label">Progress (%)</label>
                        <input type="number" 
                               name="progress_persen" 
                               class="form-control" 
                               value="<?= $request->progress_persen ?>" 
                               min="0" 
                               max="100" 
                               required>
                        <small style="color: #6b5947; font-size: 12px; margin-top: 4px; display: block;">
                            Progress saat ini: <?= $request->progress_persen ?>%
                        </small>
                    </div>
                    <button type="submit" class="btn-primary">
                        <i class="fas fa-percentage"></i> Update Progress
                    </button>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>