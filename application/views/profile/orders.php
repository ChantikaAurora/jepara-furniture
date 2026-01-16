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
                <a href="<?= base_url('profile/orders') ?>" class="active"><i class="fas fa-box"></i> Pesanan Saya</a>
                <a href="<?= base_url('rehap/my_requests') ?>"><i class="fas fa-tools"></i> Rehap Saya</a>
                <a href="<?= base_url('testimonial/my_testimonials') ?>"><i class="fas fa-star"></i> Testimoni Saya</a>
                <a href="<?= base_url('profile/change_password') ?>"><i class="fas fa-key"></i> Ubah Password</a>
                <a href="<?= base_url('auth/logout') ?>" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </aside>
        
        <main class="profile-content">
            <div class="page-header">
                <h1>Riwayat Pesanan</h1>
            </div>
            
            <?php if (empty($orders)): ?>
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <h3>Belum Ada Pesanan</h3>
                    <p>Anda belum pernah melakukan pemesanan</p>
                    <a href="<?= base_url('product') ?>" class="btn btn-primary">Mulai Belanja</a>
                </div>
            <?php else: ?>
                <div class="orders-list">
                    <?php foreach ($orders as $order): ?>
                    <div class="order-card">
                        <div class="order-header">
                            <div>
                                <h3><?= $order->kode_pesanan ?></h3>
                                <p class="order-date"><?= date('d F Y H:i', strtotime($order->created_at)) ?></p>
                            </div>
                            <div class="order-status">
                                <?php
                                $status_class = '';
                                switch($order->status_pesanan) {
                                    case 'pending': $status_class = 'warning'; break;
                                    case 'menunggu_konfirmasi': $status_class = 'warning'; break;
                                    case 'dikonfirmasi': $status_class = 'info'; break;
                                    case 'diproses': $status_class = 'info'; break;
                                    case 'selesai': $status_class = 'success'; break;
                                    case 'dibatalkan': $status_class = 'danger'; break;
                                }
                                ?>
                                <span class="badge badge-<?= $status_class ?>"><?= ucfirst(str_replace('_', ' ', $order->status_pesanan)) ?></span>
                            </div>
                        </div>
                        
                        <div class="order-body">
                            <div class="order-info">
                                <p><strong>Total:</strong> Rp <?= number_format($order->total_harga, 0, ',', '.') ?></p>
                                <p><strong>Metode Pembayaran:</strong> <?= ucfirst($order->metode_pembayaran) ?></p>
                            </div>
                        </div>
                        
                        <div class="order-actions">
                            <a href="<?= base_url('profile/order_detail/' . $order->id) ?>" class="btn btn-outline btn-sm">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                            
                            <?php if ($order->status_pesanan == 'pending'): ?>
                            <a href="<?= base_url('payment/index/' . $order->id) ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-upload"></i> Upload Pembayaran
                            </a>
                            <?php endif; ?>
                            
                            <?php if ($order->status_pesanan == 'selesai'): ?>
                            <a href="<?= base_url('testimonial/create/' . $order->id) ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-star"></i> Beri Testimoni
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <?php if ($pagination): ?>
                <div class="pagination">
                    <?= $pagination ?>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </main>
    </div>
</div>
