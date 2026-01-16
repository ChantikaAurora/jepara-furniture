<div class="container">
    <div class="profile-layout">
        <aside class="profile-sidebar">
            <div class="profile-card">
                <div class="profile-avatar">
                    <?php if ($user->foto_profil): ?>
                        <img src="<?= base_url('uploads/users/' . $user->foto_profil) ?>" alt="<?= $user->nama_lengkap ?>">
                    <?php else: ?>
                        <i class="fas fa-user-circle"></i>
                    <?php endif; ?>
                </div>
                <h3><?= $user->nama_lengkap ?></h3>
                <p class="user-email"><?= $user->email ?></p>
            </div>
            
            <nav class="profile-menu">
                <a href="<?= base_url('profile') ?>"><i class="fas fa-user"></i> Profil Saya</a>
                <a href="<?= base_url('profile/orders') ?>"><i class="fas fa-box"></i> Pesanan Saya</a>
                <a href="<?= base_url('rehap/my_requests') ?>"><i class="fas fa-tools"></i> Rehap Saya</a>
                <a href="<?= base_url('testimonial/my_testimonials') ?>"><i class="fas fa-star"></i> Testimoni Saya</a>
                <a href="<?= base_url('profile/change_password') ?>"><i class="fas fa-key"></i> Ubah Password</a>
                <a href="<?= base_url('auth/logout') ?>" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </aside>
        
        <main class="profile-content">
            <div class="page-header">
                <h1>Edit Profil</h1>
            </div>
            
            <div class="form-card">
                <form action="<?= base_url('profile/edit') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap <span class="required">*</span></label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= set_value('nama_lengkap', $user->nama_lengkap) ?>" required>
                        <?= form_error('nama_lengkap', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email <span class="required">*</span></label>
                        <input type="email" id="email" name="email" value="<?= set_value('email', $user->email) ?>" required>
                        <?= form_error('email', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="no_telepon">Nomor Telepon</label>
                        <input type="tel" id="no_telepon" name="no_telepon" value="<?= set_value('no_telepon', $user->no_telepon) ?>">
                        <?= form_error('no_telepon', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea id="alamat" name="alamat" rows="4"><?= set_value('alamat', $user->alamat) ?></textarea>
                        <?= form_error('alamat', '<small class="error">', '</small>') ?>
                    </div>
                    
                    <div class="form-actions">
                        <a href="<?= base_url('profile') ?>" class="btn btn-outline">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
