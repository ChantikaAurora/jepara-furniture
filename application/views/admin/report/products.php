<div class="container">
    <div class="page-header">
        <h1>Laporan Produk</h1>
    </div>
    
    <div class="report-filters">
        <form action="<?= base_url('admin/report_products') ?>" method="get">
            <div class="filter-row">
                <div class="form-group">
                    <label>Dari Tanggal:</label>
                    <input type="date" name="start_date" value="<?= $this->input->get('start_date') ?: date('Y-m-01') ?>">
                </div>
                <div class="form-group">
                    <label>Sampai Tanggal:</label>
                    <input type="date" name="end_date" value="<?= $this->input->get('end_date') ?: date('Y-m-d') ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="report-card">
        <h3>Produk Terlaris</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Terjual</th>
                    <th>Pendapatan</th>
                    <th>Stok Tersisa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($best_sellers)): ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
                <?php else: ?>
                    <?php $no = 1; foreach ($best_sellers as $product): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><strong><?= $product->product_name ?></strong></td>
                        <td><?= $product->category_name ?></td>
                        <td><?= $product->total_sold ?> unit</td>
                        <td>Rp <?= number_format($product->revenue, 0, ',', '.') ?></td>
                        <td>
                            <?php if ($product->current_stock < 10): ?>
                                <span class="badge badge-warning"><?= $product->current_stock ?></span>
                            <?php else: ?>
                                <?= $product->current_stock ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div class="report-card">
        <h3>Status Stok Produk</h3>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-box"></i></div>
                <div class="stat-info">
                    <h3><?= $inventory_stats->total_products ?></h3>
                    <p>Total Produk</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                <div class="stat-info">
                    <h3><?= $inventory_stats->in_stock ?></h3>
                    <p>Stok Tersedia</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="stat-info">
                    <h3><?= $inventory_stats->low_stock ?></h3>
                    <p>Stok Menipis (&lt;10)</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
                <div class="stat-info">
                    <h3><?= $inventory_stats->out_of_stock ?></h3>
                    <p>Stok Habis</p>
                </div>
            </div>
        </div>
        
        <?php if (!empty($low_stock_products)): ?>
        <h4 style="margin-top: 30px;">Produk dengan Stok Menipis</h4>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($low_stock_products as $product): ?>
                <tr>
                    <td><?= $product->name ?></td>
                    <td><?= $product->category_name ?></td>
                    <td><strong><?= $product->stock ?></strong></td>
                    <td>
                        <?php if ($product->stock == 0): ?>
                            <span class="badge badge-danger">Habis</span>
                        <?php else: ?>
                            <span class="badge badge-warning">Menipis</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>
