<div class="container">
    <div class="page-header">
        <h1>Laporan Pelanggan</h1>
    </div>
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-users"></i></div>
            <div class="stat-info">
                <h3><?= $customer_stats->total_customers ?></h3>
                <p>Total Pelanggan</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-user-check"></i></div>
            <div class="stat-info">
                <h3><?= $customer_stats->active_customers ?></h3>
                <p>Pelanggan Aktif</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
            <div class="stat-info">
                <h3><?= $customer_stats->customers_with_orders ?></h3>
                <p>Pernah Berbelanja</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-user-plus"></i></div>
            <div class="stat-info">
                <h3><?= $customer_stats->new_this_month ?></h3>
                <p>Pelanggan Baru (Bulan Ini)</p>
            </div>
        </div>
    </div>
    
    <div class="report-card">
        <h3>Top Pelanggan (Berdasarkan Total Pembelian)</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Total Pesanan</th>
                    <th>Total Pembelian</th>
                    <th>Bergabung</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($top_customers)): ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($top_customers as $customer): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><strong><?= $customer->nama_lengkap ?></strong></td>
                        <td><?= $customer->email ?></td>
                        <td><?= $customer->total_orders ?> pesanan</td>
                        <td><strong>Rp <?= number_format($customer->total_spent, 0, ',', '.') ?></strong></td>
                        <td><?= date('d/m/Y', strtotime($customer->created_at)) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div class="report-card">
        <h3>Pelanggan Terbaru</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($recent_customers)): ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($recent_customers as $customer): ?>
                    <tr>
                        <td><?= $customer->nama_lengkap ?></td>
                        <td><?= $customer->email ?></td>
                        <td><?= $customer->no_telepon ?: '-' ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($customer->created_at)) ?></td>
                        <td>
                            <span class="badge badge-<?= $customer->is_active ? 'success' : 'danger' ?>">
                                <?= $customer->is_active ? 'Active' : 'Inactive' ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div class="report-card">
        <h3>Statistik Pelanggan per Bulan</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Pelanggan Baru</th>
                    <th>Total Pesanan</th>
                    <th>Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($monthly_stats)): ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php foreach ($monthly_stats as $stat): ?>
                    <tr>
                        <td><?= date('F Y', strtotime($stat->month . '-01')) ?></td>
                        <td><?= $stat->new_customers ?></td>
                        <td><?= $stat->total_orders ?></td>
                        <td>Rp <?= number_format($stat->total_revenue, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
