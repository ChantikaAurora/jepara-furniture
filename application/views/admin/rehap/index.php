<?php
/**
 * File: application/views/admin/rehap/index.php
 * Admin Rehap Index with Export
 */
?>
<style>
/* Rehap Index - Dashboard Theme */
.rehap-wrapper {
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

.alert i {
    font-size: 18px;
}

.filter-export-section {
    background: white;
    border-radius: 18px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}

.filter-group {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
}

.filter-group label {
    font-size: 14px;
    font-weight: 600;
    color: #2d1810;
}

.filter-group select {
    padding: 10px 16px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    background: #fafafa;
    min-width: 150px;
}

.export-buttons {
    display: flex;
    gap: 10px;
}

.btn-export {
    padding: 10px 20px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.btn-excel {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.btn-excel:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(16,185,129,0.3);
}

.btn-pdf {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.btn-pdf:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(239,68,68,0.3);
}

.table-container {
    background: white;
    border-radius: 18px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
    overflow: hidden;
}

.table-header {
    padding: 24px 28px;
    border-bottom: 1px solid #f3f4f6;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
}

.table-count {
    font-size: 14px;
    color: #6b5947;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #faf8f3;
}

th {
    padding: 16px 20px;
    text-align: left;
    font-size: 13px;
    font-weight: 700;
    color: #6b5947;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 1px solid #e5e7eb;
}

td {
    padding: 18px 20px;
    font-size: 14px;
    color: #2d1810;
    border-bottom: 1px solid #f3f4f6;
}

tbody tr {
    transition: all 0.2s ease;
}

tbody tr:hover {
    background: #faf8f3;
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

.badge-secondary {
    background: #f3f4f6;
    color: #6b7280;
}

.text-muted {
    color: #9ca3af;
    font-size: 13px;
}

.text-primary {
    color: #8B5E3C;
    font-weight: 700;
}

.btn-detail {
    padding: 8px 16px;
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
}

.btn-detail:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(139,94,60,0.3);
}

.empty-state {
    text-align: center;
    padding: 80px 40px;
}

.empty-icon {
    width: 100px;
    height: 100px;
    margin: 0 auto 24px;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-icon i {
    font-size: 48px;
    color: #9ca3af;
}

.empty-title {
    font-size: 20px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 8px;
}

.empty-text {
    font-size: 15px;
    color: #6b5947;
}

@media (max-width: 1024px) {
    .filter-export-section {
        flex-direction: column;
        align-items: stretch;
    }
    
    .export-buttons {
        justify-content: stretch;
    }
    
    .btn-export {
        flex: 1;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .rehap-wrapper {
        padding: 20px;
    }

    table {
        font-size: 13px;
    }

    th, td {
        padding: 12px 14px;
    }
}
</style>

<div class="rehap-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-tools"></i>
            Pengajuan Rehap Furniture
        </h1>
        <p class="page-subtitle">
            Kelola permintaan layanan rehap furniture dari pelanggan
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

    <!-- Filter & Export Section -->
    <div class="filter-export-section">
        <div class="filter-group">
            <form method="get" action="<?= base_url('admin/rehap') ?>" style="display: flex; gap: 12px; align-items: center; flex: 1;">
                <label>Filter Status:</label>
                <select name="status" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="menunggu_review" <?= ($this->input->get('status') == 'menunggu_review') ? 'selected' : '' ?>>Menunggu Review</option>
                    <option value="menunggu_persetujuan" <?= ($this->input->get('status') == 'menunggu_persetujuan') ? 'selected' : '' ?>>Menunggu Persetujuan</option>
                    <option value="menunggu_pembayaran" <?= ($this->input->get('status') == 'menunggu_pembayaran') ? 'selected' : '' ?>>Menunggu Pembayaran</option>
                    <option value="menunggu_verifikasi_bayar" <?= ($this->input->get('status') == 'menunggu_verifikasi_bayar') ? 'selected' : '' ?>>Menunggu Verifikasi</option>
                    <option value="sedang_dikerjakan" <?= ($this->input->get('status') == 'sedang_dikerjakan') ? 'selected' : '' ?>>Sedang Dikerjakan</option>
                    <option value="selesai" <?= ($this->input->get('status') == 'selesai') ? 'selected' : '' ?>>Selesai</option>
                    <option value="dibatalkan" <?= ($this->input->get('status') == 'dibatalkan') ? 'selected' : '' ?>>Dibatalkan</option>
                </select>
            </form>
        </div>

        <div class="export-buttons">
            <button class="btn-export btn-excel" onclick="showExportModal('excel')">
                <i class="fas fa-file-excel"></i> Export Excel
            </button>
            <button class="btn-export btn-pdf" onclick="showExportModal('pdf')">
                <i class="fas fa-file-pdf"></i> Export PDF
            </button>
        </div>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">Daftar Permintaan Rehap</h3>
            <p class="table-count">Total: <?= count($requests) ?> permintaan</p>
        </div>

        <?php if (empty($requests)): ?>
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-hammer"></i>
            </div>
            <h3 class="empty-title">Belum Ada Permintaan Rehap</h3>
            <p class="empty-text">
                Permintaan layanan rehap dari pelanggan akan muncul di sini
            </p>
        </div>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Kode Rehap</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Furniture</th>
                    <th>Estimasi Biaya</th>
                    <th>Jumlah Bayar</th>
                    <th>Progress</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request): ?>
                <tr>
                    <td><strong><?= $request->kode_rehap ?></strong></td>
                    <td><?= date('d M Y', strtotime($request->created_at)) ?></td>
                    <td>
                        <strong><?= $request->nama_lengkap ?></strong><br>
                        <span class="text-muted"><?= $request->email ?></span>
                    </td>
                    <td><?= $request->nama_furniture ?></td>
                    <td>
                        <?php if ($request->estimasi_biaya): ?>
                            <span class="text-primary">Rp <?= number_format($request->estimasi_biaya, 0, ',', '.') ?></span>
                        <?php else: ?>
                            <span class="text-muted">-</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($request->jumlah_bayar): ?>
                            <strong style="color: #10b981;">Rp <?= number_format($request->jumlah_bayar, 0, ',', '.') ?></strong>
                        <?php else: ?>
                            <span class="text-muted">-</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php
                        $progress = $request->progress_persen ?? 0;
                        $progress_class = '';
                        if ($progress == 0) $progress_class = 'badge-secondary';
                        elseif ($progress < 50) $progress_class = 'badge-warning';
                        elseif ($progress < 100) $progress_class = 'badge-info';
                        else $progress_class = 'badge-success';
                        ?>
                        <span class="badge <?= $progress_class ?>"><?= $progress ?>%</span>
                    </td>
                    <td>
                        <?php
                        $status_class = '';
                        $status_text = '';
                        switch($request->status) {
                            case 'menunggu_review':
                                $status_class = 'badge-warning';
                                $status_text = 'Review';
                                break;
                            case 'menunggu_persetujuan':
                                $status_class = 'badge-info';
                                $status_text = 'Persetujuan';
                                break;
                            case 'ditolak':
                                $status_class = 'badge-danger';
                                $status_text = 'Ditolak';
                                break;
                            case 'menunggu_pembayaran':
                                $status_class = 'badge-warning';
                                $status_text = 'Pembayaran';
                                break;
                            case 'menunggu_verifikasi_bayar':
                                $status_class = 'badge-info';
                                $status_text = 'Verifikasi';
                                break;
                            case 'sedang_dikerjakan':
                                $status_class = 'badge-primary';
                                $status_text = 'Pengerjaan';
                                break;
                            case 'selesai':
                                $status_class = 'badge-success';
                                $status_text = 'Selesai';
                                break;
                            case 'dibatalkan':
                                $status_class = 'badge-danger';
                                $status_text = 'Dibatalkan';
                                break;
                            default:
                                $status_class = 'badge-secondary';
                                $status_text = ucfirst($request->status);
                        }
                        ?>
                        <span class="badge <?= $status_class ?>"><?= $status_text ?></span>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/rehap/detail/' . $request->id) ?>" class="btn-detail">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<!-- Export Modal -->
<div id="exportModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 9999; justify-content: center; align-items: center;">
    <div style="background: white; border-radius: 20px; padding: 32px; max-width: 500px; width: 90%;">
        <h3 style="font-size: 24px; font-weight: 700; color: #2d1810; margin-bottom: 24px;">
            <i class="fas fa-download"></i> Export Laporan
        </h3>
        
        <form id="exportForm" method="get">
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #2d1810;">Pilih Tahun:</label>
                <select name="year" class="form-control" style="width: 100%; padding: 12px; border: 1.5px solid #e5e7eb; border-radius: 10px;">
                    <option value="">Semua Tahun</option>
                    <?php 
                    $currentYear = date('Y');
                    for ($y = $currentYear; $y >= 2020; $y--): 
                    ?>
                        <option value="<?= $y ?>"><?= $y ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            
            <div style="margin-bottom: 24px;">
                <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #2d1810;">Pilih Bulan:</label>
                <select name="month" class="form-control" style="width: 100%; padding: 12px; border: 1.5px solid #e5e7eb; border-radius: 10px;">
                    <option value="">Semua Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            
            <div style="display: flex; gap: 12px;">
                <button type="submit" class="btn-primary" style="flex: 1; padding: 14px; border-radius: 10px; background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%); color: white; border: none; font-weight: 600; cursor: pointer;">
                    <i class="fas fa-download"></i> Download
                </button>
                <button type="button" onclick="closeExportModal()" style="flex: 1; padding: 14px; border-radius: 10px; background: #e5e7eb; color: #374151; border: none; font-weight: 600; cursor: pointer;">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
let exportType = 'excel';

function showExportModal(type) {
    exportType = type;
    document.getElementById('exportModal').style.display = 'flex';
    
    if (type === 'excel') {
        document.getElementById('exportForm').action = '<?= base_url('admin/rehap_export_excel') ?>';
    } else {
        document.getElementById('exportForm').action = '<?= base_url('admin/rehap_export_pdf') ?>';
    }
}

function closeExportModal() {
    document.getElementById('exportModal').style.display = 'none';
}

// Close modal when clicking outside
document.getElementById('exportModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeExportModal();
    }
});
</script>