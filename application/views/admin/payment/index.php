<div class="main-content">
    <div class="page-header">
        <div>
            <h2 class="page-title"><i class="fas fa-money-check-alt"></i> Verifikasi Pembayaran</h2>
            <p class="page-subtitle">Verifikasi bukti pembayaran dari pelanggan</p>
        </div>
    </div>
    
    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle"></i> <?= $this->session->flashdata('error') ?>
    </div>
    <?php endif; ?>
    
    <!-- Filter Section -->
    <div class="filter-section">
        <form method="get" action="<?= base_url('admin/pembayaran') ?>" class="d-flex gap-2">
            <div>
                <label>Status:</label>
                <select name="status" class="form-control" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="menunggu_verifikasi" <?= ($this->input->get('status') == 'menunggu_verifikasi') ? 'selected' : '' ?>>Menunggu Verifikasi</option>
                    <option value="terverifikasi" <?= ($this->input->get('status') == 'terverifikasi') ? 'selected' : '' ?>>Terverifikasi</option>
                    <option value="ditolak" <?= ($this->input->get('status') == 'ditolak') ? 'selected' : '' ?>>Ditolak</option>
                </select>
            </div>
        </form>
    </div>
    
    <div class="card custom-table">
        <div class="card-header">
            <h5><i class="fas fa-list"></i> Daftar Pembayaran</h5>
            <small>Total: <?= count($payments) ?> pembayaran</small>
        </div>
        <div class="card-body p-0">
            <?php if (empty($payments)): ?>
            <div class="empty-state">
                <i class="fas fa-receipt"></i>
                <h4>Belum Ada Pembayaran</h4>
                <p>Pembayaran dari pelanggan akan muncul di sini</p>
            </div>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Jumlah</th>
                        <th>Metode</th>
                        <th>Bukti Bayar</th>
                        <th>Tanggal Upload</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td><strong><?= $payment->kode_pesanan ?></strong></td>
                        <td>
                            <strong><?= $payment->nama_lengkap ?></strong><br>
                            <small class="text-muted"><?= $payment->email ?></small>
                        </td>
                        <td><strong class="text-primary">Rp <?= number_format($payment->jumlah_bayar, 0, ',', '.') ?></strong></td>
                        <td><span class="badge badge-info"><?= $payment->metode_pembayaran ?></span></td>
                        <td>
                            <?php if ($payment->bukti_bayar): ?>
                            <a href="<?= base_url('uploads/payments/' . $payment->bukti_bayar) ?>" target="_blank">
                                <img src="<?= base_url('uploads/payments/' . $payment->bukti_bayar) ?>" alt="Bukti Bayar" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; cursor: pointer;">
                            </a>
                            <?php else: ?>
                            <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td><?= date('d M Y H:i', strtotime($payment->created_at)) ?></td>
                        <td>
                            <?php if ($payment->status_pembayaran == 'menunggu_verifikasi'): ?>
                                <span class="badge badge-warning">Menunggu</span>
                            <?php elseif ($payment->status_pembayaran == 'terverifikasi'): ?>
                                <span class="badge badge-success">Terverifikasi</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Ditolak</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($payment->status_pembayaran == 'menunggu_verifikasi'): ?>
                            <a href="<?= base_url('admin/pembayaran/verifikasi/' . $payment->id) ?>" class="btn btn-sm btn-success" onclick="return confirm('Verifikasi pembayaran ini?')">
                                <i class="fas fa-check"></i> Verifikasi
                            </a>
                            <a href="<?= base_url('admin/pembayaran/tolak/' . $payment->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tolak pembayaran ini?')">
                                <i class="fas fa-times"></i> Tolak
                            </a>
                            <?php else: ?>
                            <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</div>
