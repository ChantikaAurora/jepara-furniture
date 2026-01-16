<?php
/**
 * File: application/views/rehap/my_requests.php
 * My Requests - Furni Style with Back Button
 */
?>
<style>
.page-header { 
    background: #3b5d50 !important; 
    padding: 40px 0 !important; 
    margin-bottom: 40px !important; 
}
.page-header-content {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
}
.page-header h1 { 
    font-size: 36px !important; 
    font-weight: 700 !important; 
    color: #ffffff !important; 
    margin: 0 !important; 
}
.page-header p {
    color: #ffffff !important;
    opacity: 0.9 !important;
    margin-top: 8px !important;
}
.btn-back {
    background: rgba(255, 255, 255, 0.2) !important;
    color: #ffffff !important;
    padding: 12px 24px !important;
    border-radius: 30px !important;
    font-weight: 600 !important;
    font-size: 14px !important;
    text-decoration: none !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
    transition: all 0.3s ease !important;
    border: 2px solid rgba(255, 255, 255, 0.3) !important;
}
.btn-back:hover {
    background: rgba(255, 255, 255, 0.3) !important;
    border-color: rgba(255, 255, 255, 0.5) !important;
}
.requests-section { 
    padding: 60px 0 !important; 
    background: #ffffff !important; 
}
.requests-grid { 
    display: grid !important; 
    gap: 25px !important; 
}
.request-card { 
    background: #ffffff !important; 
    border: 1px solid #dee2e6 !important; 
    border-radius: 10px !important; 
    padding: 30px !important; 
    transition: all 0.3s ease !important; 
}
.request-card:hover { 
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important; 
}
.request-header { 
    display: flex !important; 
    justify-content: space-between !important; 
    align-items: flex-start !important; 
    margin-bottom: 20px !important; 
    padding-bottom: 15px !important; 
    border-bottom: 2px solid #eff2f1 !important; 
}
.request-header h3 { 
    font-size: 20px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin: 0 0 8px !important; 
}
.request-header p { 
    font-size: 14px !important; 
    color: #6a6a6a !important; 
    margin: 0 !important; 
}
.badge { 
    display: inline-block !important; 
    padding: 8px 16px !important; 
    border-radius: 20px !important; 
    font-size: 13px !important; 
    font-weight: 600 !important; 
}
.badge-warning { background: #fff3cd !important; color: #856404 !important; }
.badge-info { background: #d1ecf1 !important; color: #0c5460 !important; }
.badge-success { background: #d4edda !important; color: #155724 !important; }
.badge-danger { background: #f8d7da !important; color: #721c24 !important; }
.badge-primary { background: #cfe2ff !important; color: #084298 !important; }
.request-body { 
    margin-bottom: 20px !important; 
}
.description { 
    font-size: 15px !important; 
    color: #6a6a6a !important; 
    line-height: 1.7 !important; 
}
.request-actions { 
    display: flex !important; 
    gap: 12px !important; 
    flex-wrap: wrap !important; 
}
.btn { 
    padding: 12px 28px !important; 
    border-radius: 30px !important; 
    font-weight: 600 !important; 
    font-size: 14px !important; 
    text-decoration: none !important; 
    display: inline-flex !important; 
    align-items: center !important; 
    gap: 8px !important; 
    transition: all 0.3s ease !important; 
    border: none !important; 
}
.btn-outline { 
    background: transparent !important; 
    color: #3b5d50 !important; 
    border: 2px solid #3b5d50 !important; 
}
.btn-outline:hover { 
    background: #3b5d50 !important; 
    color: #ffffff !important; 
}
.btn-primary { 
    background: #f9bf29 !important; 
    color: #2f2f2f !important; 
}
.btn-primary:hover { 
    background: #e6ac1a !important; 
}
.empty-state { 
    text-align: center !important; 
    padding: 80px 40px !important; 
    background: #dce5e4 !important; 
    border-radius: 10px !important; 
}
.empty-state i { 
    font-size: 64px !important; 
    color: #3b5d50 !important; 
    margin-bottom: 20px !important; 
    opacity: 0.5 !important; 
}
.empty-state h3 { 
    font-size: 24px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin-bottom: 12px !important; 
}
.empty-state p { 
    font-size: 16px !important; 
    color: #6a6a6a !important; 
    margin-bottom: 30px !important; 
}

@media (max-width: 768px) {
    .page-header-content { 
        flex-direction: column !important; 
        gap: 20px !important; 
        align-items: flex-start !important;
    }
    .btn-back {
        order: -1 !important;
    }
    .request-header { 
        flex-direction: column !important; 
        gap: 15px !important; 
    }
    .request-actions { 
        flex-direction: column !important; 
    }
    .btn { 
        width: 100% !important; 
        justify-content: center !important; 
    }
}
</style>

<?php $this->load->view('templates/navbar'); ?>

<div class="page-header">
    <div class="container">
        <div class="page-header-content">
            <div>
                <h1>Permintaan Rehap Saya</h1>
                <p>Daftar semua permintaan rehap yang Anda ajukan</p>
            </div>
            <a href="<?= base_url('profile') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Profile
            </a>
        </div>
    </div>
</div>

<section class="requests-section">
    <div class="container">
        <?php if (empty($requests)): ?>
        <div class="empty-state">
            <i class="fas fa-tools"></i>
            <h3>Belum Ada Permintaan Rehap</h3>
            <p>Anda belum pernah mengajukan permintaan rehap furniture</p>
            <a href="<?= base_url('rehap/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Ajukan Sekarang
            </a>
        </div>
        <?php else: ?>
        <div class="requests-grid">
            <?php foreach ($requests as $request): ?>
            <div class="request-card">
                <div class="request-header">
                    <div>
                        <h3><?= $request->kode_rehap ?></h3>
                        <p><?= $request->nama_furniture ?></p>
                        <p style="font-size: 13px; margin-top: 4px;"><?= date('d F Y', strtotime($request->created_at)) ?></p>
                    </div>
                    <div>
                        <?php
                        $status_class = 'warning';
                        $status_text = '';
                        switch($request->status) {
                            case 'menunggu_review':
                                $status_class = 'warning';
                                $status_text = 'Menunggu Review';
                                break;
                            case 'ditolak':
                                $status_class = 'danger';
                                $status_text = 'Ditolak';
                                break;
                            case 'menunggu_pembayaran':
                                $status_class = 'warning';
                                $status_text = 'Menunggu Pembayaran';
                                break;
                            case 'menunggu_verifikasi_bayar':
                                $status_class = 'info';
                                $status_text = 'Menunggu Verifikasi';
                                break;
                            case 'sedang_dikerjakan':
                                $status_class = 'primary';
                                $status_text = 'Sedang Dikerjakan';
                                break;
                            case 'selesai':
                                $status_class = 'success';
                                $status_text = 'Selesai';
                                break;
                            case 'dibatalkan':
                                $status_class = 'danger';
                                $status_text = 'Dibatalkan';
                                break;
                            default:
                                $status_text = ucfirst(str_replace('_', ' ', $request->status));
                        }
                        ?>
                        <span class="badge badge-<?= $status_class ?>"><?= $status_text ?></span>
                    </div>
                </div>
                <div class="request-body">
                    <p class="description"><?= substr($request->deskripsi_kerusakan, 0, 150) ?>...</p>
                </div>
                <div class="request-actions">
                    <a href="<?= base_url('rehap/detail/' . $request->id) ?>" class="btn btn-outline">
                        <i class="fas fa-eye"></i> Lihat Detail
                    </a>
                    <a href="<?= base_url('rehap/contact_whatsapp/' . $request->id) ?>" class="btn btn-primary">
                        <i class="fab fa-whatsapp"></i> Chat Admin
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>