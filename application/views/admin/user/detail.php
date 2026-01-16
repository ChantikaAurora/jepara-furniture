<style>
/* User Detail - Dashboard Theme */
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

.badge-primary {
    background: rgba(139,94,60,0.15);
    color: #6d4a2f;
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

.order-table {
    width: 100%;
    border-collapse: collapse;
}

.order-table thead {
    background: #faf8f3;
}

.order-table th {
    padding: 14px 16px;
    text-align: left;
    font-size: 13px;
    font-weight: 700;
    color: #6b5947;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 1px solid #e5e7eb;
}

.order-table td {
    padding: 16px;
    font-size: 14px;
    color: #2d1810;
    border-bottom: 1px solid #f3f4f6;
}

.order-table tbody tr:hover {
    background: #faf8f3;
}

.empty-message {
    text-align: center;
    padding: 40px 20px;
    color: #6b7280;
}

.sidebar-section {
    background: white;
    border-radius: 18px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.action-button {
    width: 100%;
    padding: 12px 20px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.2s ease;
    margin-bottom: 12px;
}

.btn-warning {
    background: #fef3c7;
    color: #92400e;
}

.btn-warning:hover {
    background: #fde68a;
    transform: translateY(-2px);
}

.btn-success {
    background: #d1fae5;
    color: #065f46;
}

.btn-success:hover {
    background: #a7f3d0;
    transform: translateY(-2px);
}

.btn-danger {
    background: #fee2e2;
    color: #991b1b;
}

.btn-danger:hover {
    background: #fecaca;
    transform: translateY(-2px);
}

@media (max-width: 1024px) {
    .detail-layout {
        grid-template-columns: 1fr;
    }

    .detail-wrapper {
        padding: 20px;
    }
}
</style>

<div class="detail-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-user"></i>
            Detail Pengguna
        </h1>
        <a href="<?= base_url('admin/pengguna') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Detail Layout -->
    <div class="detail-layout">
        <!-- Main Content -->
        <div class="detail-main">
            <!-- Informasi Pengguna -->
            <div class="detail-section">
                <h3 class="section-title">Informasi Pengguna</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value"><strong><?= $user->nama_lengkap ?></strong></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Email</div>
                        <div class="info-value"><?= $user->email ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">No. Telepon</div>
                        <div class="info-value"><?= $user->no_telepon ?: '-' ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Role</div>
                        <div class="info-value">
                            <span class="badge badge-<?= $user->role == 'admin' ? 'primary' : 'info' ?>">
                                <?= ucfirst($user->role) ?>
                            </span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Status Akun</div>
                        <div class="info-value">
                            <span class="badge badge-<?= $user->is_active ? 'success' : 'danger' ?>">
                                <?= $user->is_active ? 'Aktif' : 'Nonaktif' ?>
                            </span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Terdaftar Sejak</div>
                        <div class="info-value"><?= date('d F Y', strtotime($user->created_at)) ?></div>
                    </div>
                    <div class="info-item full-width">
                        <div class="info-label">Alamat</div>
                        <div class="info-value"><?= $user->alamat ? nl2br($user->alamat) : '-' ?></div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Pesanan -->
            <div class="detail-section">
                <h3 class="section-title">Riwayat Pesanan</h3>
                <?php if (empty($orders)): ?>
                    <p class="empty-message">Belum ada pesanan dari pengguna ini</p>
                <?php else: ?>
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th>Kode Pesanan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><strong><?= $order->kode_pesanan ?></strong></td>
                                <td><?= date('d M Y', strtotime($order->created_at)) ?></td>
                                <td><strong style="color: #8B5E3C;">Rp <?= number_format($order->total_harga, 0, ',', '.') ?></strong></td>
                                <td><span class="badge badge-info"><?= ucfirst(str_replace('_', ' ', $order->status_pesanan)) ?></span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="detail-sidebar">
            <!-- Aksi -->
            <div class="sidebar-section">
                <h3 class="section-title">Aksi</h3>
                
                <?php if ($user->is_active): ?>
                <a href="<?= base_url('admin/pengguna/toggle/' . $user->id) ?>" 
                   class="action-button btn-warning"
                   onclick="return confirm('Nonaktifkan pengguna ini?')">
                    <i class="fas fa-ban"></i>
                    Nonaktifkan Akun
                </a>
                <?php else: ?>
                <a href="<?= base_url('admin/pengguna/toggle/' . $user->id) ?>" 
                   class="action-button btn-success"
                   onclick="return confirm('Aktifkan pengguna ini?')">
                    <i class="fas fa-check"></i>
                    Aktifkan Akun
                </a>
                <?php endif; ?>

                <?php if ($user->id != $this->session->userdata('user_id') && $user->role != 'admin'): ?>
                <a href="<?= base_url('admin/pengguna/delete/' . $user->id) ?>" 
                   class="action-button btn-danger" 
                   onclick="return confirm('Yakin ingin menghapus pengguna ini?\n\nSemua data terkait akan ikut terhapus!')">
                    <i class="fas fa-trash"></i>
                    Hapus Pengguna
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>