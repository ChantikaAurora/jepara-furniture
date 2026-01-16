<style>
.page-header { 
    background: #3b5d50 !important; 
    padding: 40px 0 !important; 
    margin-bottom: 40px !important; 
    border-radius: 0 !important;
}
.page-header .container {
    border-radius: 0 !important;
}
.page-header * {
    border-radius: 0 !important;
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
.orders-section { 
    padding: 60px 0 !important; 
    background: #ffffff !important; 
}
.orders-grid { 
    display: grid !important; 
    gap: 25px !important; 
}
.order-card { 
    background: #ffffff !important; 
    border: 1px solid #dee2e6 !important; 
    border-radius: 10px !important; 
    padding: 30px !important; 
    transition: all 0.3s ease !important; 
}
.order-card:hover { 
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important; 
}
.order-header { 
    display: flex !important; 
    justify-content: space-between !important; 
    align-items: flex-start !important; 
    margin-bottom: 20px !important; 
    padding-bottom: 15px !important; 
    border-bottom: 2px solid #eff2f1 !important; 
}
.order-header h3 { 
    font-size: 20px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin: 0 0 8px !important; 
}
.order-header p { 
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
.badge-success { 
    background: #d4edda !important; 
    color: #155724 !important; 
}
.order-body { 
    margin-bottom: 20px !important; 
}
.products-list { 
    font-size: 15px !important; 
    color: #6a6a6a !important; 
    line-height: 1.7 !important; 
}
.order-actions { 
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
.btn-primary { 
    background: #f9bf29 !important; 
    color: #2f2f2f !important; 
}
.btn-primary:hover { 
    background: #e6ac1a !important; 
    transform: translateY(-2px) !important;
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
.alert { 
    padding: 18px 24px !important; 
    border-radius: 8px !important; 
    margin-bottom: 30px !important; 
    border: none !important;
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
}
.alert-danger { 
    background: #f8d7da !important; 
    color: #721c24 !important; 
}
.alert-success { 
    background: #d4edda !important; 
    color: #155724 !important; 
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
    .order-header { 
        flex-direction: column !important; 
        gap: 15px !important; 
    }
    .order-actions { 
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
                <h1>Buat Testimoni</h1>
                <p>Pilih pesanan yang ingin Anda review</p>
            </div>
            <a href="<?= base_url('testimonial/my_testimonials') ?>" class="btn-back">
                <i class="fas fa-list"></i> Testimoni Saya
            </a>
        </div>
    </div>
</div>

<section class="orders-section">
    <div class="container">
        
        <!-- Alert Messages -->
        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <div><?= $this->session->flashdata('error') ?></div>
        </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <div><?= $this->session->flashdata('success') ?></div>
        </div>
        <?php endif; ?>

        <?php if (empty($completed_orders)): ?>
        <div class="empty-state">
            <i class="fas fa-box-open"></i>
            <h3>Belum Ada Pesanan Selesai</h3>
            <p>Anda belum memiliki pesanan yang selesai untuk direview</p>
            <a href="<?= base_url('product') ?>" class="btn btn-primary">
                <i class="fas fa-shopping-cart"></i> Belanja Sekarang
            </a>
        </div>
        <?php else: ?>
        <div class="orders-grid">
            <?php foreach ($completed_orders as $order): ?>
            <div class="order-card">
                <div class="order-header">
                    <div>
                        <h3><?= $order->kode_pesanan ?></h3>
                        <p><i class="fas fa-calendar"></i> <?= date('d F Y', strtotime($order->created_at)) ?></p>
                    </div>
                    <div>
                        <span class="badge badge-success">
                            <i class="fas fa-check-circle"></i> Selesai
                        </span>
                    </div>
                </div>
                <div class="order-body">
                    <p style="font-size: 13px; color: #6a6a6a; margin-bottom: 8px;">Produk:</p>
                    <p class="products-list"><?= $order->products ?></p>
                </div>
                <div class="order-actions">
                    <a href="<?= base_url('testimonial/create/' . $order->id) ?>" class="btn btn-primary">
                        <i class="fas fa-star"></i> Tulis Testimoni
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
// Auto-hide alerts after 5 seconds
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        alert.style.opacity = '0';
        alert.style.transition = 'opacity 0.3s ease';
        setTimeout(function() {
            alert.remove();
        }, 300);
    });
}, 5000);
</script>