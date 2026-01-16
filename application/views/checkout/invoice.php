<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - <?= $order->kode_pesanan ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            color: #333;
        }
        
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border: 1px solid #ddd;
        }
        
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 3px solid #8B5E3C;
        }
        
        .company-info h1 {
            color: #8B5E3C;
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .company-info p {
            margin: 5px 0;
            font-size: 14px;
        }
        
        .invoice-meta {
            text-align: right;
        }
        
        .invoice-meta h2 {
            color: #8B5E3C;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .invoice-meta p {
            margin: 5px 0;
            font-size: 14px;
        }
        
        .invoice-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .detail-section h3 {
            color: #8B5E3C;
            font-size: 16px;
            margin-bottom: 10px;
            border-bottom: 2px solid #F5EBDD;
            padding-bottom: 5px;
        }
        
        .detail-section p {
            margin: 5px 0;
            font-size: 14px;
        }
        
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .invoice-table th {
            background-color: #8B5E3C;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }
        
        .invoice-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        
        .invoice-table tbody tr:hover {
            background-color: #F5EBDD;
        }
        
        .text-right {
            text-align: right;
        }
        
        .invoice-summary {
            margin-left: auto;
            width: 300px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            font-size: 14px;
        }
        
        .summary-total {
            border-top: 2px solid #8B5E3C;
            margin-top: 10px;
            padding-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #8B5E3C;
        }
        
        .invoice-footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-pending { background-color: #fff3cd; color: #856404; }
        .status-confirmed { background-color: #d1ecf1; color: #0c5460; }
        .status-completed { background-color: #d4edda; color: #155724; }
        .status-cancelled { background-color: #f8d7da; color: #721c24; }
        
        .print-button {
            background-color: #8B5E3C;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
        }
        
        .print-button:hover {
            background-color: #5A3E2B;
        }
        
        @media print {
            .print-button {
                display: none;
            }
            
            body {
                padding: 0;
            }
            
            .invoice-container {
                border: none;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <button class="print-button" onclick="window.print()">
        <i class="fas fa-print"></i> Cetak Invoice
    </button>
    
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="company-info">
                <h1>Jepara Indah Furniture</h1>
                <p><?= $store->alamat ?></p>
                <p>Telp: <?= $store->no_telepon ?></p>
                <p>Email: <?= $store->email ?></p>
            </div>
            <div class="invoice-meta">
                <h2>INVOICE</h2>
                <p><strong><?= $order->kode_pesanan ?></strong></p>
                <p>Tanggal: <?= date('d F Y', strtotime($order->created_at)) ?></p>
                <p>
                    <?php
                    $status_class = '';
                    $status_text = '';
                    switch($order->status_pesanan) {
                        case 'pending': 
                            $status_class = 'status-pending';
                            $status_text = 'Pending';
                            break;
                        case 'menunggu_konfirmasi':
                        case 'dikonfirmasi':
                        case 'diproses':
                            $status_class = 'status-confirmed';
                            $status_text = 'Diproses';
                            break;
                        case 'selesai':
                            $status_class = 'status-completed';
                            $status_text = 'Selesai';
                            break;
                        case 'dibatalkan':
                            $status_class = 'status-cancelled';
                            $status_text = 'Dibatalkan';
                            break;
                    }
                    ?>
                    <span class="status-badge <?= $status_class ?>"><?= $status_text ?></span>
                </p>
            </div>
        </div>
        
        <div class="invoice-details">
            <div class="detail-section">
                <h3>Informasi Pelanggan</h3>
                <p><strong><?= $customer->nama_lengkap ?></strong></p>
                <p><?= $customer->email ?></p>
                <p><?= $customer->no_telepon ?></p>
            </div>
            
            <div class="detail-section">
                <h3>Alamat Pengiriman</h3>
                <p><strong><?= $order->nama_penerima ?></strong></p>
                <p><?= $order->no_telepon_penerima ?></p>
                <p><?= nl2br($order->alamat_pengiriman) ?></p>
            </div>
        </div>
        
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($order->items as $item): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $item->nama_produk ?></td>
                    <td>Rp <?= number_format($item->harga, 0, ',', '.') ?></td>
                    <td><?= $item->jumlah ?></td>
                    <td class="text-right">Rp <?= number_format($item->subtotal, 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="invoice-summary">
            <div class="summary-row">
                <span>Subtotal:</span>
                <span>Rp <?= number_format($order->total_harga, 0, ',', '.') ?></span>
            </div>
            <div class="summary-row summary-total">
                <span>Total:</span>
                <span>Rp <?= number_format($order->total_harga, 0, ',', '.') ?></span>
            </div>
        </div>
        
        <div class="detail-section" style="margin-top: 30px;">
            <h3>Metode Pembayaran</h3>
            <p><?= ucfirst($order->metode_pembayaran) ?></p>
            <?php if ($payment && $payment->status_pembayaran == 'terverifikasi'): ?>
            <p style="color: #155724; font-weight: 600;">✓ Pembayaran Terverifikasi</p>
            <?php endif; ?>
        </div>
        
        <?php if ($order->catatan_pesanan): ?>
        <div class="detail-section" style="margin-top: 20px;">
            <h3>Catatan Pesanan</h3>
            <p><?= nl2br($order->catatan_pesanan) ?></p>
        </div>
        <?php endif; ?>
        
        <div class="invoice-footer">
            <p>Terima kasih atas pembelian Anda!</p>
            <p>Untuk pertanyaan, hubungi kami di <?= $store->no_telepon ?> atau <?= $store->email ?></p>
            <p style="margin-top: 20px; font-style: italic;">Invoice ini dicetak pada <?= date('d F Y H:i') ?></p>
        </div>
    </div>
</body>
</html>
