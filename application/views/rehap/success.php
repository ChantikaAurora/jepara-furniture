<?php
/**
 * File: application/views/rehap/success.php
 * Success Page - Furni Style
 */
?>
<style>
.success-section { padding: 100px 0 !important; background: #ffffff !important; min-height: 70vh !important; display: flex !important; align-items: center !important; }
.success-card { max-width: 600px !important; margin: 0 auto !important; text-align: center !important; }
.success-icon { width: 100px !important; height: 100px !important; background: #10b981 !important; border-radius: 50% !important; display: flex !important; align-items: center !important; justify-content: center !important; margin: 0 auto 30px !important; animation: scaleIn 0.5s ease !important; }
.success-icon i { font-size: 50px !important; color: #ffffff !important; }
@keyframes scaleIn { from { transform: scale(0); opacity: 0; } to { transform: scale(1); opacity: 1; } }
.success-card h1 { font-size: 36px !important; font-weight: 700 !important; color: #2f2f2f !important; margin-bottom: 15px !important; }
.success-card > p { font-size: 16px !important; color: #6a6a6a !important; margin-bottom: 35px !important; }
.request-info { background: #dce5e4 !important; border-radius: 10px !important; padding: 25px !important; margin-bottom: 30px !important; }
.info-row { display: flex !important; justify-content: space-between !important; padding: 12px 0 !important; border-bottom: 1px solid rgba(0,0,0,0.05) !important; }
.info-row:last-child { border-bottom: none !important; }
.info-row label { font-weight: 600 !important; color: #6a6a6a !important; font-size: 14px !important; }
.info-row strong { color: #2f2f2f !important; font-size: 15px !important; }
.btn { padding: 14px 35px !important; border-radius: 30px !important; font-weight: 600 !important; font-size: 16px !important; text-decoration: none !important; display: inline-flex !important; align-items: center !important; gap: 10px !important; transition: all 0.3s ease !important; border: none !important; }
.btn-whatsapp { background: #25D366 !important; color: #ffffff !important; margin-bottom: 20px !important; }
.btn-whatsapp:hover { background: #128C7E !important; }
.countdown { font-size: 14px !important; color: #6a6a6a !important; margin-top: 15px !important; }
.countdown strong { color: #25D366 !important; font-size: 16px !important; }
.secondary-links { margin-top: 30px !important; padding-top: 25px !important; border-top: 2px solid #eff2f1 !important; }
.secondary-links a { color: #3b5d50 !important; text-decoration: none !important; font-weight: 600 !important; margin: 0 15px !important; }
.secondary-links a:hover { color: #2d4840 !important; text-decoration: underline !important; }
</style>
 <?php $this->load->view('templates/navbar'); ?>
<section class="success-section">
    <div class="container">
        <div class="success-card">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            
            <h1>Permintaan Berhasil Dikirim!</h1>
            <p>Permintaan rehap furniture Anda telah berhasil disimpan. Silakan lanjutkan konsultasi dengan admin kami melalui WhatsApp.</p>
            
            <div class="request-info">
                <div class="info-row">
                    <label>Kode Rehap:</label>
                    <strong><?= $request->kode_rehap ?></strong>
                </div>
                <div class="info-row">
                    <label>Furniture:</label>
                    <strong><?= $request->nama_furniture ?></strong>
                </div>
                <div class="info-row">
                    <label>Status:</label>
                    <strong>Menunggu Review</strong>
                </div>
            </div>
            
            <?php if ($wa_url): ?>
            <a href="<?= $wa_url ?>" class="btn btn-whatsapp" id="wa-button">
                <i class="fab fa-whatsapp"></i>
                Lanjut ke WhatsApp
            </a>
            
            <div class="countdown">
                Anda akan otomatis diarahkan ke WhatsApp dalam <strong id="countdown">5</strong> detik
            </div>
            <?php endif; ?>
            
            <div class="secondary-links">
                <a href="<?= base_url('rehap/my_requests') ?>">
                    <i class="fas fa-list"></i> Lihat Semua Permintaan
                </a>
                <a href="<?= base_url() ?>">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

<?php if ($wa_url): ?>
<script>
let countdown = 5;
const countdownElement = document.getElementById('countdown');
const waButton = document.getElementById('wa-button');
const timer = setInterval(function() {
    countdown--;
    countdownElement.textContent = countdown;
    if (countdown <= 0) {
        clearInterval(timer);
        window.location.href = waButton.href;
    }
}, 1000);
waButton.addEventListener('click', function() {
    clearInterval(timer);
});
</script>
<?php endif; ?>