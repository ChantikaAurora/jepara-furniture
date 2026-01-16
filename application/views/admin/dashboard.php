<!-- Load Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<style>
/* ========================================
   ULTIMATE DASHBOARD DESIGN
   Real Data from Database
   ======================================== */

.dashboard-wrapper {
    background: linear-gradient(135deg, #f5f1e8 0%, #faf8f3 100%);
    min-height: 100vh;
    padding: 32px;
}

/* Welcome Header */
.dashboard-header {
    background: white;
    border-radius: 20px;
    padding: 32px 40px;
    margin-bottom: 32px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.1);
}

.welcome-title {
    font-size: 32px;
    font-weight: 800;
    color: #2d1810;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.wave-emoji {
    font-size: 36px;
    animation: wave 2s infinite;
}

@keyframes wave {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(20deg); }
    75% { transform: rotate(-20deg); }
}

.welcome-subtitle {
    font-size: 16px;
    color: #6b5947;
    line-height: 1.6;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 24px;
    margin-bottom: 32px;
}

.stat-card {
    background: white;
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: var(--card-gradient);
}

.stat-card.brown {
    --card-gradient: linear-gradient(90deg, #8B5E3C, #a67c52);
}

.stat-card.green {
    --card-gradient: linear-gradient(90deg, #10b981, #34d399);
}

.stat-card.orange {
    --card-gradient: linear-gradient(90deg, #f59e0b, #fbbf24);
}

.stat-card.blue {
    --card-gradient: linear-gradient(90deg, #3b82f6, #60a5fa);
}

.stat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 28px rgba(0,0,0,0.12);
}

.stat-card-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.stat-info {
    flex: 1;
}

.stat-label {
    font-size: 14px;
    font-weight: 600;
    color: #6b5947;
    margin-bottom: 12px;
}

.stat-value {
    font-size: 42px;
    font-weight: 800;
    color: #2d1810;
    line-height: 1;
    margin-bottom: 12px;
}

.stat-trend {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 600;
}

.stat-trend.up {
    color: #10b981;
}

.stat-trend.down {
    color: #ef4444;
}

.stat-trend i {
    font-size: 12px;
}

.stat-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    flex-shrink: 0;
}

.stat-card.brown .stat-icon {
    background: linear-gradient(135deg, rgba(139,94,60,0.1), rgba(139,94,60,0.15));
    color: #8B5E3C;
}

.stat-card.green .stat-icon {
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(16,185,129,0.15));
    color: #10b981;
}

.stat-card.orange .stat-icon {
    background: linear-gradient(135deg, rgba(245,158,11,0.1), rgba(245,158,11,0.15));
    color: #f59e0b;
}

.stat-card.blue .stat-icon {
    background: linear-gradient(135deg, rgba(59,130,246,0.1), rgba(59,130,246,0.15));
    color: #3b82f6;
}

/* Charts Section */
.charts-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 32px;
}

@media (max-width: 1200px) {
    .charts-grid {
        grid-template-columns: 1fr;
    }
}

.chart-card {
    background: white;
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.chart-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
}

.chart-header i {
    font-size: 20px;
    color: #8B5E3C;
}

.chart-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
}

.chart-container {
    position: relative;
    height: 300px;
}

/* Activity Section */
.activity-section {
    background: white;
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid #f3f4f6;
}

.section-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
}

.view-all-link {
    font-size: 14px;
    color: #8B5E3C;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
}

.view-all-link:hover {
    gap: 10px;
}

/* Activity List */
.activity-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.activity-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 20px;
    background: #faf8f3;
    border-radius: 14px;
    transition: all 0.2s ease;
    border: 1px solid transparent;
}

.activity-item:hover {
    background: #f5f1e8;
    border-color: rgba(139,94,60,0.2);
}

.activity-left {
    display: flex;
    align-items: center;
    gap: 16px;
    flex: 1;
}

.activity-badge {
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 700;
    text-transform: capitalize;
}

.activity-badge.transaksi {
    background: #d1fae5;
    color: #065f46;
}

.activity-badge.rehap {
    background: #fed7aa;
    color: #92400e;
}

.activity-badge.testimoni {
    background: #dbeafe;
    color: #1e40af;
}

.activity-info {
    flex: 1;
}

.activity-name {
    font-size: 15px;
    font-weight: 600;
    color: #2d1810;
    margin-bottom: 4px;
}

.activity-desc {
    font-size: 14px;
    color: #6b5947;
}

.activity-right {
    display: flex;
    align-items: center;
    gap: 16px;
}

.activity-date {
    font-size: 13px;
    color: #9ca3af;
}

.activity-status {
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 700;
}

.activity-status.selesai,
.activity-status.approved {
    background: #d1fae5;
    color: #065f46;
}

.activity-status.proses,
.activity-status.diproses {
    background: #dbeafe;
    color: #1e40af;
}

.activity-status.pending {
    background: #fef3c7;
    color: #92400e;
}

.activity-status.dikonfirmasi {
    background: #e0e7ff;
    color: #3730a3;
}

.detail-btn {
    padding: 8px 16px;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    color: #6b7280;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
}

.detail-btn:hover {
    background: #f9fafb;
    border-color: #8B5E3C;
    color: #8B5E3C;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #9ca3af;
}

.empty-state i {
    font-size: 48px;
    margin-bottom: 16px;
    opacity: 0.3;
}

.empty-state p {
    font-size: 15px;
    font-weight: 600;
}

/* Animations */
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-up {
    animation: slideUp 0.5s ease;
}

/* Responsive */
@media (max-width: 768px) {
    .dashboard-wrapper {
        padding: 20px;
    }

    .dashboard-header {
        padding: 24px;
    }

    .welcome-title {
        font-size: 24px;
    }

    .activity-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

    .activity-right {
        width: 100%;
        justify-content: space-between;
    }
}
</style>

<div class="dashboard-wrapper">
    <!-- Welcome Header -->
    <div class="dashboard-header animate-slide-up">
        <h1 class="welcome-title">
            <span class="wave-emoji">👋</span>
            Selamat Datang, <?= $this->session->userdata('nama_lengkap') ?>
        </h1>
        <p class="welcome-subtitle">
            Kelola seluruh aktivitas toko dari satu tempat — produk, transaksi, pelanggan, dan rehap furniture.
        </p>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <!-- Total Produk -->
        <div class="stat-card brown" style="animation-delay: 0.1s;">
            <div class="stat-card-content">
                <div class="stat-info">
                    <div class="stat-label">Produk Aktif</div>
                    <div class="stat-value"><?= number_format($stats['total_produk']) ?></div>
                    <div class="stat-trend <?= $stats['produk_trend'] >= 0 ? 'up' : 'down' ?>">
                        <i class="fas fa-arrow-<?= $stats['produk_trend'] >= 0 ? 'up' : 'down' ?>"></i>
                        <span><?= abs($stats['produk_trend']) ?> bulan ini</span>
                    </div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-box-open"></i>
                </div>
            </div>
        </div>

        <!-- Total Transaksi -->
        <div class="stat-card green" style="animation-delay: 0.2s;">
            <div class="stat-card-content">
                <div class="stat-info">
                    <div class="stat-label">Transaksi Bulan Ini</div>
                    <div class="stat-value"><?= number_format($stats['transaksi_bulan_ini']) ?></div>
                    <div class="stat-trend <?= $stats['transaksi_trend'] >= 0 ? 'up' : 'down' ?>">
                        <i class="fas fa-arrow-<?= $stats['transaksi_trend'] >= 0 ? 'up' : 'down' ?>"></i>
                        <span><?= abs($stats['transaksi_trend']) ?> dari bulan lalu</span>
                    </div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
            </div>
        </div>

        <!-- Rehap Pending -->
        <div class="stat-card orange" style="animation-delay: 0.3s;">
            <div class="stat-card-content">
                <div class="stat-info">
                    <div class="stat-label">Pengajuan Rehap</div>
                    <div class="stat-value"><?= number_format($stats['rehap_pending']) ?></div>
                    <div class="stat-trend up">
                        <i class="fas fa-tools"></i>
                        <span>Menunggu review</span>
                    </div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-hammer"></i>
                </div>
            </div>
        </div>

        <!-- Total Pelanggan -->
        <div class="stat-card blue" style="animation-delay: 0.4s;">
            <div class="stat-card-content">
                <div class="stat-info">
                    <div class="stat-label">Total Pelanggan</div>
                    <div class="stat-value"><?= number_format($stats['total_customers']) ?></div>
                    <div class="stat-trend <?= $stats['customer_trend'] >= 0 ? 'up' : 'down' ?>">
                        <i class="fas fa-arrow-<?= $stats['customer_trend'] >= 0 ? 'up' : 'down' ?>"></i>
                        <span>+<?= abs($stats['customer_trend']) ?> bulan ini</span>
                    </div>
                </div>
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-grid">
        <!-- Sales Chart -->
        <div class="chart-card">
            <div class="chart-header">
                <i class="fas fa-chart-line"></i>
                <h3 class="chart-title">Penjualan 6 Bulan Terakhir</h3>
            </div>
            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Transactions Chart -->
        <div class="chart-card">
            <div class="chart-header">
                <i class="fas fa-shopping-cart"></i>
                <h3 class="chart-title">Total Transaksi per Bulan</h3>
            </div>
            <div class="chart-container">
                <canvas id="transactionsChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="activity-section">
        <div class="section-header">
            <h3 class="section-title">Aktivitas Terbaru</h3>
            <a href="<?= base_url('admin/transaksi') ?>" class="view-all-link">
                Lihat Semua
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="activity-list">
            <?php if (empty($recent_activities)): ?>
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <p>Belum ada aktivitas terbaru</p>
            </div>
            <?php else: ?>
                <?php foreach ($recent_activities as $activity): ?>
                <div class="activity-item">
                    <div class="activity-left">
                        <span class="activity-badge <?= strtolower($activity->type) ?>">
                            <?= ucfirst($activity->type) ?>
                        </span>
                        <div class="activity-info">
                            <div class="activity-name"><?= $activity->customer_name ?></div>
                            <div class="activity-desc"><?= $activity->description ?></div>
                        </div>
                    </div>
                    <div class="activity-right">
                        <span class="activity-date">
                            <?= date('d M Y', strtotime($activity->created_at)) ?>
                        </span>
                        <span class="activity-status <?= strtolower($activity->status) ?>">
                            <?= ucfirst(str_replace('_', ' ', $activity->status)) ?>
                        </span>
                        <a href="<?= $activity->detail_url ?>" class="detail-btn">
                            <i class="fas fa-eye"></i>
                            Detail
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
// Sales Chart Data from PHP
const salesData = <?= json_encode($chart_data['sales']) ?>;
const salesLabels = <?= json_encode($chart_data['labels']) ?>;

// Sales Chart (Bar)
const salesCtx = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(salesCtx, {
    type: 'bar',
    data: {
        labels: salesLabels,
        datasets: [{
            label: 'Penjualan (Rp)',
            data: salesData,
            backgroundColor: 'rgba(139, 94, 60, 0.8)',
            borderColor: '#8B5E3C',
            borderWidth: 2,
            borderRadius: 8,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let label = context.dataset.label || '';
                        if (label) {
                            label += ': ';
                        }
                        if (context.parsed.y !== null) {
                            label += 'Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                        }
                        return label;
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)'
                },
                ticks: {
                    callback: function(value) {
                        return 'Rp ' + (value / 1000000).toFixed(0) + 'jt';
                    }
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

// Transactions Chart Data from PHP
const transactionsData = <?= json_encode($chart_data['transactions']) ?>;

// Transactions Chart (Line)
const transactionsCtx = document.getElementById('transactionsChart').getContext('2d');
const transactionsChart = new Chart(transactionsCtx, {
    type: 'line',
    data: {
        labels: salesLabels,
        datasets: [{
            label: 'Total Transaksi',
            data: transactionsData,
            backgroundColor: 'rgba(16, 185, 129, 0.1)',
            borderColor: '#10b981',
            borderWidth: 3,
            tension: 0.4,
            fill: true,
            pointBackgroundColor: '#10b981',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 5,
            pointHoverRadius: 7
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.05)'
                },
                ticks: {
                    stepSize: 1
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

// Animate elements on load
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.stat-card, .chart-card, .activity-section');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>