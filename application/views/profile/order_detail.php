<div class="container">
    <div class="page-header">
        <h1>Detail Pesanan</h1>
        <a href="<?= base_url('profile/orders') ?>" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    
    <div class="order-detail-layout">
        <div class="order-main">
            <div class="order-info-card">
                <h3>Informasi Pesanan</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <label>Nomor Pesanan</label>
                        <p><strong><?= $order->kode_pesanan ?></strong></p>
                    </div>
                    <div class="info-item">
                        <label>Tanggal Pesanan</label>
                        <p><?= date('d F Y H:i', strtotime($order->created_at)) ?></p>
                    </div>
                    <div class="info-item">
                        <label>Status</label>
                        <p>
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
                        </p>
                    </div>
                    <div class="info-item">
                        <label>Metode Pembayaran</label>
                        <p><?= ucfirst($order->metode_pembayaran) ?></p>
                    </div>
                </div>
            </div>
            
            <div class="shipping-info-card">
                <h3>Informasi Pengiriman</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <label>Nama Penerima</label>
                        <p><?= $order->nama_penerima ?></p>
                    </div>
                    <div class="info-item">
                        <label>Nomor Telepon</label>
                        <p><?= $order->no_telepon_penerima ?></p>
                    </div>
                    <div class="info-item full-width">
                        <label>Alamat Pengiriman</label>
                        <p><?= nl2br($order->alamat_pengiriman) ?></p>
                    </div>
                    <?php if ($order->catatan_pesanan): ?>
                    <div class="info-item full-width">
                        <label>Catatan Pesanan</label>
                        <p><?= nl2br($order->catatan_pesanan) ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="order-items-card">
                <h3>Produk yang Dipesan</h3>
                <table class="order-items-table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order->items as $item): ?>
                        <tr>
                            <td><?= $item->nama_produk ?></td>
                            <td>Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
                            <td><?= $item->jumlah ?></td>
                            <td>Rp <?= number_format($item->subtotal, 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td><strong>Rp <?= number_format($order->total_harga, 0, ',', '.') ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
        <aside class="order-sidebar">
            <?php if ($payment): ?>
            <div class="payment-card">
                <h3>Status Pembayaran</h3>
                <div class="payment-status">
                    <?php
                    $payment_class = '';
                    switch($payment->status_bayar) {
                        case 'menunggu': $payment_class = 'warning'; break;
                        case 'menunggu_verifikasi': $payment_class = 'info'; break;
                        case 'terverifikasi': $payment_class = 'success'; break;
                        case 'ditolak': $payment_class = 'danger'; break;
                    }
                    ?>
                    <span class="badge badge-<?= $payment_class ?>"><?= ucfirst(str_replace('_', ' ', $payment->status_bayar)) ?></span>
                </div>
                
                <?php if ($payment->bukti_bayar): ?>
                <div class="payment-proof">
                    <label>Bukti Pembayaran:</label>
                    <img src="<?= base_url('uploads/payments/' . $payment->bukti_bayar) ?>" alt="Bukti Pembayaran">
                </div>
                <?php endif; ?>
                
                <?php if ($payment->catatan_admin): ?>
                <div class="admin-notes">
                    <label>Catatan Admin:</label>
                    <p><?= $payment->catatan_admin ?></p>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
            <div class="action-buttons">
                <?php if ($order->status_pesanan == 'pending'): ?>
                <a href="<?= base_url('payment/index/' . $order->id) ?>" class="btn btn-primary btn-block">
                    <i class="fas fa-upload"></i> Upload Pembayaran
                </a>
                <?php endif; ?>
                
                <!-- Bank Transfer Info -->
                <?php if (isset($store) && $order->metode_pembayaran == 'transfer'): ?>
                <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-top: 10px;">
                    <h4 style="color: #3b5d50; font-size: 14px; margin-bottom: 10px;">
                        <i class="fas fa-university"></i> Informasi Transfer
                    </h4>
                    <?php if (!empty($store->bank_name)): ?>
                    <p style="font-size: 13px; margin: 5px 0; color: #555;">
                        <strong>Bank:</strong> <?= $store->bank_name ?>
                    </p>
                    <p style="font-size: 13px; margin: 5px 0; color: #555;">
                        <strong>No. Rekening:</strong> <?= $store->bank_account_number ?>
                    </p>
                    <p style="font-size: 13px; margin: 5px 0; color: #555;">
                        <strong>Atas Nama:</strong> <?= $store->bank_account_name ?>
                    </p>
                    <?php else: ?>
                    <p style="font-size: 13px; color: #666;">
                        Silakan hubungi admin untuk informasi rekening transfer.
                    </p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <!-- <a href="<?= base_url('checkout/invoice/' . $order->kode_pesanan) ?>" class="btn btn-outline btn-block" target="_blank">
                    <i class="fas fa-file-invoice"></i> Cetak Invoice
                </a> -->
                
                <?php if ($order->status_pesanan == 'selesai'): ?>
                <a href="<?= base_url('testimonial/create/' . $order->id) ?>" class="btn btn-primary btn-block">
                    <i class="fas fa-star"></i> Beri Testimoni
                </a>
                <?php endif; ?>
            </div>
        </aside>
    </div>
</div>
