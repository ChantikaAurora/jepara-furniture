<div class="container">
    <div class="page-header">
        <h1>Laporan Penjualan</h1>
    </div>
    
    <div class="report-filters">
        <form action="<?= base_url('admin/report_sales') ?>" method="get">
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
    
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
            <div class="stat-info">
                <h3><?= $sales_summary->total_orders ?></h3>
                <p>Total Pesanan</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-money-bill-wave"></i></div>
            <div class="stat-info">
                <h3>Rp <?= number_format($sales_summary->total_revenue, 0, ',', '.') ?></h3>
                <p>Total Pendapatan</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-chart-line"></i></div>
            <div class="stat-info">
                <h3>Rp <?= number_format($sales_summary->avg_order_value, 0, ',', '.') ?></h3>
                <p>Rata-rata Nilai Pesanan</p>
            </div>
        </div>
    </div>
    
    <div class="report-card">
        <h3>Penjualan per Kategori</h3>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Jumlah Terjual</th>
                    <th>Total Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales_by_category as $category): ?>
                <tr>
                    <td><?= $category->category_name ?></td>
                    <td><?= $category->total_quantity ?></td>
                    <td>Rp <?= number_format($category->total_revenue, 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
