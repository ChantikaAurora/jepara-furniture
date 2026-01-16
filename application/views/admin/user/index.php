<style>
/* User Index - Dashboard Theme */
.user-wrapper {
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

.filter-section {
    background: white;
    border-radius: 18px;
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.filter-row {
    display: flex;
    gap: 16px;
    align-items: flex-end;
}

.filter-group {
    flex: 0 0 200px;
}

.filter-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #6b5947;
    margin-bottom: 8px;
}

.filter-select {
    width: 100%;
    padding: 12px 18px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    background: #fafafa;
    cursor: pointer;
}

.filter-select:focus {
    outline: none;
    border-color: #8B5E3C;
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

.btn-sm {
    padding: 8px 12px;
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
    margin: 0 2px;
}

.btn-info {
    background: #dbeafe;
    color: #1e40af;
}

.btn-info:hover {
    background: #bfdbfe;
    transform: translateY(-2px);
}

.btn-warning {
    background: #fef3c7;
    color: #92400e;
}

.btn-warning:hover {
    background: #fde68a;
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

@media (max-width: 768px) {
    .user-wrapper {
        padding: 20px;
    }

    .filter-row {
        flex-direction: column;
    }

    .filter-group {
        flex: 0 0 100%;
        width: 100%;
    }
}
</style>

<div class="user-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-users"></i>
            Manajemen Pengguna
        </h1>
        <p class="page-subtitle">
            Kelola akun pengguna dan pelanggan
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

    <!-- Filter Section -->
    <div class="filter-section">
        <form method="get" action="<?= base_url('admin/pengguna') ?>">
            <div class="filter-row">
                <div class="filter-group">
                    <label class="filter-label">Filter Role:</label>
                    <select name="role" class="filter-select" onchange="this.form.submit()">
                        <option value="">Semua Role</option>
                        <option value="admin" <?= ($this->input->get('role') == 'admin') ? 'selected' : '' ?>>Admin</option>
                        <option value="customer" <?= ($this->input->get('role') == 'customer') ? 'selected' : '' ?>>Customer</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Filter Status:</label>
                    <select name="status" class="filter-select" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="1" <?= ($this->input->get('status') == '1') ? 'selected' : '' ?>>Aktif</option>
                        <option value="0" <?= ($this->input->get('status') == '0') ? 'selected' : '' ?>>Nonaktif</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">Daftar Pengguna</h3>
            <p class="table-count">Total: <?= count($users) ?> pengguna</p>
        </div>

        <?php if (empty($users)): ?>
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-user-slash"></i>
            </div>
            <h3 class="empty-title">Belum Ada Pengguna</h3>
            <p class="empty-text">
                Data pengguna akan muncul di sini
            </p>
        </div>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Terdaftar</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><strong><?= $user->nama_lengkap ?></strong></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->no_telepon ?? '-' ?></td>
                    <td>
                        <?php if ($user->role == 'admin'): ?>
                            <span class="badge badge-primary">Admin</span>
                        <?php else: ?>
                            <span class="badge badge-info">Customer</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($user->is_active): ?>
                            <span class="badge badge-success">Aktif</span>
                        <?php else: ?>
                            <span class="badge badge-danger">Nonaktif</span>
                        <?php endif; ?>
                    </td>
                    <td><?= date('d M Y', strtotime($user->created_at)) ?></td>
                    <td>
                        <a href="<?= base_url('admin/pengguna/detail/' . $user->id) ?>" 
                           class="btn-sm btn-info" 
                           title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?= base_url('admin/pengguna/toggle/' . $user->id) ?>" 
                           class="btn-sm btn-warning" 
                           title="Toggle Status"
                           onclick="return confirm('Ubah status pengguna ini?')">
                            <i class="fas fa-power-off"></i>
                        </a>
                        <?php if ($user->role != 'admin' && $user->id != $this->session->userdata('user_id')): ?>
                        <a href="<?= base_url('admin/pengguna/delete/' . $user->id) ?>" 
                           class="btn-sm btn-danger" 
                           onclick="return confirm('Yakin ingin menghapus pengguna ini?\n\nSemua data terkait akan ikut terhapus!')" 
                           title="Hapus">
                            <i class="fas fa-trash"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>