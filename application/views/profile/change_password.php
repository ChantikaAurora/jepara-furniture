<div class="container">
    <div class="profile-layout">
        <aside class="profile-sidebar">
            <div class="profile-card">
                <div class="profile-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h3><?= $this->session->userdata('nama_lengkap') ?></h3>
                <p class="user-email"><?= $this->session->userdata('email') ?></p>
            </div>
            
            <nav class="profile-menu">
                <a href="<?= base_url('profile') ?>"><i class="fas fa-user"></i> Profil Saya</a>
                <a href="<?= base_url('profile/orders') ?>"><i class="fas fa-box"></i> Pesanan Saya</a>
                <a href="<?= base_url('rehap/my_requests') ?>"><i class="fas fa-tools"></i> Rehap Saya</a>
                <a href="<?= base_url('testimonial/my_testimonials') ?>"><i class="fas fa-star"></i> Testimoni Saya</a>
                <a href="<?= base_url('profile/change_password') ?>" class="active"><i class="fas fa-key"></i> Ubah Password</a>
                <a href="<?= base_url('auth/logout') ?>" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </aside>
        
        <main class="profile-content">
            <div class="page-header">
                <h1>Ubah Password</h1>
            </div>
            
            <div class="form-card">
                <form action="<?= base_url('profile/change_password') ?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Password Saat Ini <span class="required">*</span></label>
                        <input type="password" id="current_password" name="current_password" required>
                        <?= form_error('current_password', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="new_password">Password Baru <span class="required">*</span></label>
                        <input type="password" id="new_password" name="new_password" required>
                        <small>Minimal 6 karakter</small>
                        <?= form_error('new_password', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm_password">Konfirmasi Password Baru <span class="required">*</span></label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                        <?= form_error('confirm_password', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <div>
                            <strong>Tips Keamanan:</strong>
                            <ul>
                                <li>Gunakan kombinasi huruf besar, kecil, angka, dan simbol</li>
                                <li>Jangan gunakan password yang sama dengan akun lain</li>
                                <li>Ubah password secara berkala</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <a href="<?= base_url('profile') ?>" class="btn btn-outline">Batal</a>
                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
