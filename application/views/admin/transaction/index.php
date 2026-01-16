<style>
/* Transaksi & Pembayaran - Beautiful Modern Design */
.transaksi-wrapper {
    background: linear-gradient(135deg, #f5f1e8 0%, #faf8f3 100%);
    min-height: 100vh;
    padding: 32px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 32px;
}

.page-title {
    font-size: 32px;
    font-weight: 800;
    color: #2d1810;
    margin-bottom: 8px;
}

.page-subtitle {
    font-size: 16px;
    color: #6b5947;
}

.btn-export {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    padding: 12px 24px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
}

.btn-export:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(139,94,60,0.3);
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 32px;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.stat-label {
    font-size: 14px;
    color: #6b5947;
    margin-bottom: 12px;
}

.stat-value {
    font-size: 36px;
    font-weight: 800;
    color: #2d1810;
    margin-bottom: 8px;
}

.stat-note {
    font-size: 13px;
    font-weight: 600;
}

.stat-note.green {
    color: #10b981;
}

.stat-note.orange {
    color: #f59e0b;
}

.stat-note.blue {
    color: #3b82f6;
}

/* Search & Filter Section */
.filter-section {
    background: white;
    border-radius: 16px;
    padding: 20px 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.filter-row {
    display: flex;
    gap: 16px;
    align-items: center;
}

.search-box {
    flex: 1;
    position: relative;
}

.search-box i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
}

.search-box input {
    width: 100%;
    padding: 12px 16px 12px 45px;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
}

.filter-box {
    min-width: 180px;
}

.filter-box select {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    background: white;
    cursor: pointer;
}

.btn-filter {
    background: white;
    color: #6b5947;
    padding: 12px 20px;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* Table Container */
.table-container {
    background: white;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    overflow: hidden;
}

.table-header {
    padding: 20px 24px;
    border-bottom: 1px solid #f3f4f6;
}

.table-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #faf8f3;
}

th {
    padding: 14px 20px;
    text-align: left;
    font-size: 13px;
    font-weight: 700;
    color: #6b5947;
}

td {
    padding: 16px 20px;
    font-size: 14px;
    color: #2d1810;
    border-bottom: 1px solid #f3f4f6;
}

tbody tr:hover {
    background: #faf8f3;
}

/* Badges */
.badge {
    padding: 5px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
    display: inline-block;
}

.badge-lunas {
    background: #d1fae5;
    color: #065f46;
}

.badge-dp {
    background: #dbeafe;
    color: #1e40af;
}

.badge-menunggu {
    background: #fef3c7;
    color: #92400e;
}

.badge-pending {
    background: #fef3c7;
    color: #92400e;
}

.badge-selesai, .badge-dikonfirmasi {
    background: #d1fae5;
    color: #065f46;
}

.badge-proses, .badge-diproses {
    background: #dbeafe;
    color: #1e40af;
}

.badge-dikirim {
    background: #e0e7ff;
    color: #3730a3;
}

.badge-dibatalkan {
    background: #fee2e2;
    color: #991b1b;
}

/* Buttons */
.btn-detail {
    background: #8B5E3C;
    color: white;
    padding: 6px 14px;
    border-radius: 6px;
    border: none;
    font-weight: 600;
    font-size: 12px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.btn-detail:hover {
    background: #6d4a2f;
}

@media (max-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .transaksi-wrapper {
        padding: 20px;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .filter-row {
        flex-direction: column;
    }

    .filter-box {
        width: 100%;
    }
}
</style>

<div class="transaksi-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Transaksi & Pembayaran</h1>
            <p class="page-subtitle">Kelola semua transaksi dan pembayaran customer</p>
        </div>
        <a href="<?= base_url('admin/transaksi/export') ?>" class="btn-export">
            <i class="fas fa-download"></i>
            Export Data
        </a>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Total Transaksi</div>
            <div class="stat-value"><?= number_format($stats->total_transaksi) ?></div>
            <div class="stat-note green">
                +<?= $monthly_growth['this_month'] ?> bulan ini
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Menunggu Pembayaran</div>
            <div class="stat-value"><?= $stats->menunggu_pembayaran ?></div>
            <div class="stat-note orange">
                Perlu follow up
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Proses</div>
            <div class="stat-value"><?= $stats->proses ?></div>
            <div class="stat-note blue">
                Dalam pengerjaan
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Total Pendapatan</div>
            <div class="stat-value">
                <?php 
                $pendapatan_jt = $stats->total_pendapatan / 1000000;
                echo 'Rp ' . number_format($pendapatan_jt, 0) . ' Jt'; 
                ?>
            </div>
            <div class="stat-note green">
                Bulan ini
            </div>
        </div>
    </div>

    <!-- Search & Filter -->
    <div class="filter-section">
        <form method="get" action="<?= base_url('admin/transaksi') ?>">
            <div class="filter-row">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" 
                           name="search" 
                           placeholder="Cari transaksi atau customer..."
                           value="<?= $this->input->get('search') ?>">
                </div>
                <div class="filter-box">
                    <select name="status" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="pending" <?= $this->input->get('status') == 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="dikonfirmasi" <?= $this->input->get('status') == 'dikonfirmasi' ? 'selected' : '' ?>>Dikonfirmasi</option>
                        <option value="diproses" <?= $this->input->get('status') == 'diproses' ? 'selected' : '' ?>>Diproses</option>
                        <option value="dikirim" <?= $this->input->get('status') == 'dikirim' ? 'selected' : '' ?>>Dikirim</option>
                        <option value="selesai" <?= $this->input->get('status') == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                    </select>
                </div>
                <button type="submit" class="btn-filter">
                    <i class="fas fa-filter"></i>
                    Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Transactions Table -->
    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">Daftar Transaksi</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Customer</th>
                    <th>Produk</th>
                    <th>Total</th>
                    <th>Status Pesanan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($transactions)): ?>
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px;">
                        Belum ada transaksi
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($transactions as $trans): ?>
                <tr>
                    <td>
                        <strong>
                            <?= isset($trans->kode_pesanan) ? $trans->kode_pesanan : '-' ?>
                        </strong>
                    </td>
                    <td><?= isset($trans->customer_name) ? $trans->customer_name : '-' ?></td>
                    <td>
                        <?php
                        $items = $this->Transaksi_model->get_transaction_items($trans->id);
                        if (!empty($items)) {
                            $first_item = isset($items[0]->nama_produk) ? $items[0]->nama_produk : '-';
                            $item_count = count($items);
                            echo $first_item;
                            if ($item_count > 1) {
                                echo ' <small>+' . ($item_count - 1) . ' lainnya</small>';
                            }
                        } else {
                            echo '-';
                        }
                        ?>
                    </td>
                    <td>
                        <strong style="color: #8B5E3C;">
                            Rp <?= number_format($trans->total_harga, 0, ',', '.') ?>
                        </strong>
                    </td>
                    <td>
                        <span class="badge badge-<?= isset($trans->status_pesanan) ? $trans->status_pesanan : 'pending' ?>">
                            <?= isset($trans->status_pesanan) ? ucfirst(str_replace('_', ' ', $trans->status_pesanan)) : 'Pending' ?>
                        </span>
                    </td>
                    <td><?= date('Y-m-d', strtotime($trans->created_at)) ?></td>
                    <td>
                        <a href="<?= base_url('admin/transaksi/detail/' . $trans->id) ?>" class="btn-detail">
                            <i class="fas fa-eye"></i>
                            Detail
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>