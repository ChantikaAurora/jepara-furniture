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
                <a href="<?= base_url('profile') ?>" class="active"><i class="fas fa-user"></i> Profil Saya</a>
                <a href="<?= base_url('profile/orders') ?>"><i class="fas fa-box"></i> Pesanan Saya</a>
                <a href="<?= base_url('rehap/my_requests') ?>"><i class="fas fa-tools"></i> Rehap Saya</a>
                <a href="<?= base_url('testimonial/my_testimonials') ?>"><i class="fas fa-star"></i> Testimoni Saya</a>
                <a href="<?= base_url('profile/change_password') ?>"><i class="fas fa-key"></i> Ubah Password</a>
                <a href="<?= base_url('auth/logout') ?>" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </aside>
        
        <main class="profile-content">
            <div class="page-header">
                <h1>Informasi Profil</h1>
                <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit Profil
                </a>
            </div>
            
            <div class="info-card">
                <div class="info-grid">
                    <div class="info-item">
                        <label>Nama Lengkap</label>
                        <p><?= $user->nama_lengkap ?></p>
                    </div>
                    
                    <div class="info-item">
                        <label>Email</label>
                        <p><?= $user->email ?></p>
                    </div>
                    
                    <div class="info-item">
                        <label>Nomor Telepon</label>
                        <p><?= $user->no_telepon ?: '-' ?></p>
                    </div>
                    
                    <div class="info-item">
                        <label>Status Akun</label>
                        <p>
                            <?php if ($user->is_active): ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php else: ?>
                                <span class="badge badge-danger">Tidak Aktif</span>
                            <?php endif; ?>
                        </p>
                    </div>
                    
                    <div class="info-item full-width">
                        <label>Alamat</label>
                        <p><?= $user->alamat ? nl2br($user->alamat) : '-' ?></p>
                    </div>
                    
                    <div class="info-item">
                        <label>Bergabung Sejak</label>
                        <p><?= date('d F Y', strtotime($user->created_at)) ?></p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
