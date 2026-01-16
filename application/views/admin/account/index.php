<style>
/* Account Settings - Dashboard Theme */
.account-wrapper {
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

.alert-info {
    background: #dbeafe;
    border-color: #3b82f6;
    color: #1e40af;
}

.alert i {
    font-size: 18px;
}

.alert ul {
    margin-bottom: 0;
    margin-top: 8px;
    padding-left: 20px;
}

.alert ul li {
    margin-bottom: 4px;
}

.cards-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

.form-card {
    background: white;
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.card-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 1px solid #f3f4f6;
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-title i {
    color: #8B5E3C;
}

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

.required {
    color: #ef4444;
    margin-left: 4px;
}

.form-control {
    width: 100%;
    padding: 14px 18px;
    border: 1.5px solid #e5e7eb;
    border-radius: 12px;
    font-size: 15px;
    transition: all 0.2s ease;
    background: #fafafa;
}

.form-control:focus {
    outline: none;
    border-color: #8B5E3C;
    background: white;
    box-shadow: 0 0 0 4px rgba(139,94,60,0.1);
}

.form-control:disabled {
    background: #f3f4f6;
    color: #6b7280;
    cursor: not-allowed;
}

.help-text {
    font-size: 13px;
    color: #6b7280;
    margin-top: 6px;
}

.error-text {
    font-size: 13px;
    color: #ef4444;
    margin-top: 6px;
}

.btn-submit {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    padding: 14px 32px;
    border-radius: 12px;
    border: none;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 2px 8px rgba(139,94,60,0.2);
}

.btn-submit:hover {
    background: linear-gradient(135deg, #6d4a2f 0%, #5A3E2B 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 16px rgba(139,94,60,0.3);
}

@media (max-width: 1024px) {
    .cards-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .account-wrapper {
        padding: 20px;
    }
}
</style>

<div class="account-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-user-circle"></i>
            Pengaturan Akun
        </h1>
        <p class="page-subtitle">
            Kelola informasi akun admin Anda
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

    <!-- Cards Grid -->
    <div class="cards-grid">
        <!-- Profile Information Card -->
        <div class="form-card">
            <h3 class="card-title">
                <i class="fas fa-user-edit"></i>
                Informasi Profil
            </h3>

            <form action="<?= base_url('admin/akun/update') ?>" method="post">
                <div class="form-group">
                    <label class="form-label">
                        Nama Lengkap<span class="required">*</span>
                    </label>
                    <input type="text" 
                           name="nama_lengkap" 
                           class="form-control" 
                           value="<?= set_value('nama_lengkap', $user->nama_lengkap) ?>" 
                           required>
                    <?= form_error('nama_lengkap', '<small class="error-text">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Email<span class="required">*</span>
                    </label>
                    <input type="email" 
                           name="email" 
                           class="form-control" 
                           value="<?= set_value('email', $user->email) ?>" 
                           required>
                    <?= form_error('email', '<small class="error-text">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="tel" 
                           name="no_telepon" 
                           class="form-control" 
                           value="<?= set_value('no_telepon', $user->no_telepon) ?>">
                    <?= form_error('no_telepon', '<small class="error-text">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Role</label>
                    <input type="text" 
                           class="form-control" 
                           value="<?= ucfirst($user->role) ?>" 
                           disabled>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </form>
        </div>

        <!-- Password Change Card -->
        <div class="form-card">
            <h3 class="card-title">
                <i class="fas fa-lock"></i>
                Ubah Password
            </h3>

            <form action="<?= base_url('admin/akun/password') ?>" method="post">
                <div class="form-group">
                    <label class="form-label">
                        Password Saat Ini<span class="required">*</span>
                    </label>
                    <input type="password" 
                           name="current_password" 
                           class="form-control" 
                           required>
                    <?= form_error('current_password', '<small class="error-text">', '</small>') ?>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Password Baru<span class="required">*</span>
                    </label>
                    <input type="password" 
                           name="new_password" 
                           class="form-control" 
                           required>
                    <?= form_error('new_password', '<small class="error-text">', '</small>') ?>
                    <small class="help-text">Minimal 6 karakter</small>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Konfirmasi Password<span class="required">*</span>
                    </label>
                    <input type="password" 
                           name="confirm_password" 
                           class="form-control" 
                           required>
                    <?= form_error('confirm_password', '<small class="error-text">', '</small>') ?>
                </div>

                <div class="alert alert-info" style="margin-bottom: 20px;">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <strong>Tips Keamanan:</strong>
                        <ul>
                            <li>Gunakan kombinasi huruf besar, kecil, dan angka</li>
                            <li>Jangan gunakan password yang mudah ditebak</li>
                            <li>Ubah password secara berkala</li>
                        </ul>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-key"></i>
                    Ubah Password
                </button>
            </form>
        </div>
    </div>
</div>