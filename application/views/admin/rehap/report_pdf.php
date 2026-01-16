<!DOCTYPE html>
<html>
<head>
    <title>Laporan Rehap Furniture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0 0 5px 0;
            font-size: 18px;
        }
        .header p {
            margin: 2px 0;
            font-size: 10px;
        }
        .info-box {
            background: #f5f5f5;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .info-box h3 {
            margin: 0 0 10px 0;
            font-size: 13px;
        }
        .stats {
            display: table;
            width: 100%;
            margin-bottom: 15px;
        }
        .stat-item {
            display: table-cell;
            width: 25%;
            text-align: center;
            padding: 10px;
            background: #fff;
            border: 1px solid #ddd;
        }
        .stat-label {
            font-size: 9px;
            color: #666;
            text-transform: uppercase;
        }
        .stat-value {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-top: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th {
            background: #8B5E3C;
            color: white;
            padding: 8px 5px;
            text-align: left;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
        }
        td {
            padding: 6px 5px;
            border-bottom: 1px solid #ddd;
            font-size: 9px;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .badge {
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 8px;
            font-weight: bold;
            display: inline-block;
        }
        .badge-success { background: #d1fae5; color: #065f46; }
        .badge-warning { background: #fef3c7; color: #92400e; }
        .badge-info { background: #dbeafe; color: #1e40af; }
        .badge-danger { background: #fee2e2; color: #991b1b; }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 9px;
            color: #666;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1><?= $store->nama_toko ?></h1>
        <p><?= $store->alamat ?></p>
        <p>Telp: <?= $store->no_telepon ?> | Email: <?= $store->email ?></p>
    </div>

    <h2 style="text-align: center; margin: 20px 0;">LAPORAN REHAP FURNITURE</h2>

    <!-- Period Info -->
    <div class="info-box">
        <h3>Periode Laporan</h3>
        <p>
            <?php 
            if (!empty($filters['year'])) {
                echo 'Tahun: ' . $filters['year'];
                if (!empty($filters['month'])) {
                    $monthName = date('F', mktime(0, 0, 0, $filters['month'], 1));
                    echo ' - Bulan: ' . $monthName;
                }
            } else {
                echo 'Semua Periode';
            }
            ?>
        </p>
        <p>Tanggal Cetak: <?= date('d F Y H:i') ?></p>
    </div>

    <!-- Statistics -->
    <div class="stats">
        <div class="stat-item">
            <div class="stat-label">Total Permintaan</div>
            <div class="stat-value"><?= $stats['total'] ?></div>
        </div>
        <div class="stat-item">
            <div class="stat-label">Selesai</div>
            <div class="stat-value" style="color: #10b981;"><?= $stats['selesai'] ?></div>
        </div>
        <div class="stat-item">
            <div class="stat-label">Dalam Proses</div>
            <div class="stat-value" style="color: #3b82f6;"><?= $stats['sedang_dikerjakan'] ?></div>
        </div>
        <div class="stat-item">
            <div class="stat-label">Total Revenue</div>
            <div class="stat-value" style="color: #8B5E3C; font-size: 12px;">
                Rp <?= number_format($stats['total_revenue'], 0, ',', '.') ?>
            </div>
        </div>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="12%">Kode</th>
                <th width="10%">Tanggal</th>
                <th width="15%">Customer</th>
                <th width="18%">Furniture</th>
                <th width="12%">Est. Biaya</th>
                <th width="12%">Jumlah Bayar</th>
                <th width="8%">Progress</th>
                <th width="8%">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach ($requests as $req): 
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><strong><?= $req->kode_rehap ?></strong></td>
                <td><?= date('d/m/Y', strtotime($req->created_at)) ?></td>
                <td><?= $req->nama_lengkap ?></td>
                <td><?= substr($req->nama_furniture, 0, 30) ?><?= strlen($req->nama_furniture) > 30 ? '...' : '' ?></td>
                <td>
                    <?php if ($req->estimasi_biaya): ?>
                        Rp <?= number_format($req->estimasi_biaya, 0, ',', '.') ?>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($req->jumlah_bayar): ?>
                        <strong>Rp <?= number_format($req->jumlah_bayar, 0, ',', '.') ?></strong>
                    <?php else: ?>
                        -
                    <?php endif; ?>
                </td>
                <td><?= $req->progress_persen ?>%</td>
                <td>
                    <?php
                    $badge_class = 'badge-warning';
                    $status_text = '';
                    switch($req->status) {
                        case 'menunggu_review':
                            $badge_class = 'badge-warning';
                            $status_text = 'Review';
                            break;
                        case 'menunggu_persetujuan':
                            $badge_class = 'badge-info';
                            $status_text = 'Persetujuan';
                            break;
                        case 'menunggu_pembayaran':
                            $badge_class = 'badge-warning';
                            $status_text = 'Pembayaran';
                            break;
                        case 'menunggu_verifikasi_bayar':
                            $badge_class = 'badge-info';
                            $status_text = 'Verifikasi';
                            break;
                        case 'sedang_dikerjakan':
                            $badge_class = 'badge-info';
                            $status_text = 'Pengerjaan';
                            break;
                        case 'selesai':
                            $badge_class = 'badge-success';
                            $status_text = 'Selesai';
                            break;
                        case 'dibatalkan':
                            $badge_class = 'badge-danger';
                            $status_text = 'Batal';
                            break;
                    }
                    ?>
                    <span class="badge <?= $badge_class ?>"><?= $status_text ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis oleh sistem <?= $store->nama_toko ?></p>
    </div>
</body>
</html>