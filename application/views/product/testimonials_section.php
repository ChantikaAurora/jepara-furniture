<style>
.testimonials-product-section { 
    padding: 60px 0 !important; 
    background: #f9f9f9 !important; 
}
.testimonials-header { 
    margin-bottom: 40px !important; 
    padding-bottom: 20px !important; 
    border-bottom: 2px solid #dee2e6 !important;
}
.testimonials-header h2 { 
    font-size: 32px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin-bottom: 8px !important;
}
.testimonials-header p { 
    font-size: 15px !important; 
    color: #6a6a6a !important; 
}
.rating-summary-card { 
    background: #ffffff !important; 
    border-radius: 10px !important; 
    padding: 30px !important; 
    text-align: center !important; 
    box-shadow: 0 2px 8px rgba(0,0,0,0.05) !important;
    margin-bottom: 30px !important;
}
.rating-number { 
    font-size: 48px !important; 
    font-weight: 800 !important; 
    color: #3b5d50 !important; 
    line-height: 1 !important; 
}
.rating-stars-summary { 
    display: flex !important; 
    justify-content: center !important; 
    gap: 6px !important; 
    margin: 15px 0 !important;
}
.rating-stars-summary i { 
    font-size: 22px !important; 
}
.rating-distribution { 
    background: #ffffff !important; 
    border-radius: 10px !important; 
    padding: 30px !important; 
    margin-bottom: 40px !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05) !important;
}
.rating-distribution h5 { 
    font-size: 18px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin-bottom: 20px !important;
}
.rating-bar { 
    display: flex !important; 
    align-items: center !important; 
    gap: 15px !important; 
    margin-bottom: 12px !important;
}
.rating-bar-label { 
    width: 80px !important; 
    font-size: 14px !important; 
    font-weight: 600 !important; 
    color: #2f2f2f !important;
}
.rating-bar-track { 
    flex: 1 !important; 
    height: 10px !important; 
    background: #e9ecef !important; 
    border-radius: 20px !important; 
    overflow: hidden !important;
}
.rating-bar-fill { 
    height: 100% !important; 
    background: linear-gradient(135deg, #f9bf29, #f8a825) !important; 
    border-radius: 20px !important; 
    transition: width 0.5s ease !important;
}
.rating-bar-count { 
    width: 100px !important; 
    text-align: right !important; 
    font-size: 14px !important; 
    color: #6a6a6a !important; 
    font-weight: 600 !important;
}
.testimonials-list { 
    display: grid !important; 
    gap: 20px !important; 
}
.testimonial-item { 
    background: #ffffff !important; 
    border-radius: 10px !important; 
    padding: 30px !important; 
    transition: all 0.3s ease !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05) !important;
}
.testimonial-item:hover { 
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important; 
}
.testimonial-item-header { 
    display: flex !important; 
    justify-content: space-between !important; 
    align-items: flex-start !important; 
    margin-bottom: 20px !important; 
    padding-bottom: 15px !important; 
    border-bottom: 2px solid #f0f0f0 !important;
}
.user-info { 
    display: flex !important; 
    align-items: center !important; 
    gap: 15px !important;
}
.user-avatar { 
    width: 50px !important; 
    height: 50px !important; 
    border-radius: 50% !important; 
    background: linear-gradient(135deg, #3b5d50, #2d4a3e) !important; 
    color: #ffffff !important; 
    display: flex !important; 
    align-items: center !important; 
    justify-content: center !important; 
    font-size: 18px !important; 
    font-weight: 700 !important;
}
.user-name { 
    font-size: 16px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin-bottom: 4px !important;
}
.review-date { 
    font-size: 13px !important; 
    color: #6a6a6a !important; 
}
.review-rating { 
    display: flex !important; 
    gap: 4px !important;
}
.review-rating i { 
    font-size: 16px !important; 
}
.review-rating .fas { 
    color: #f9bf29 !important; 
}
.review-rating .far { 
    color: #ddd !important; 
}
.review-title { 
    font-size: 18px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin-bottom: 12px !important;
}
.review-text { 
    font-size: 15px !important; 
    color: #6a6a6a !important; 
    line-height: 1.7 !important; 
    margin-bottom: 15px !important;
}
.review-image { 
    margin-top: 15px !important; 
    border-radius: 8px !important; 
    overflow: hidden !important; 
    max-width: 300px !important;
}
.review-image img { 
    width: 100% !important; 
    height: auto !important; 
    cursor: pointer !important; 
    transition: transform 0.3s ease !important;
}
.review-image img:hover { 
    transform: scale(1.05) !important; 
}
.empty-testimonials { 
    text-align: center !important; 
    padding: 80px 40px !important; 
    background: #ffffff !important; 
    border-radius: 10px !important;
}
.empty-testimonials i { 
    font-size: 64px !important; 
    color: #3b5d50 !important; 
    margin-bottom: 20px !important; 
    opacity: 0.5 !important; 
}
.empty-testimonials h3 { 
    font-size: 24px !important; 
    font-weight: 700 !important; 
    color: #2f2f2f !important; 
    margin-bottom: 12px !important; 
}
.empty-testimonials p { 
    font-size: 16px !important; 
    color: #6a6a6a !important; 
}

@media (max-width: 768px) {
    .testimonial-item-header { 
        flex-direction: column !important; 
        gap: 15px !important; 
    }
    .rating-bar { 
        flex-direction: column !important; 
        align-items: flex-start !important; 
    }
}
</style>

<section class="testimonials-product-section">
    <div class="container">
        
        <!-- Section Header -->
        <div class="row">
            <div class="col-12">
                <div class="testimonials-header">
                    <h2><i class="fas fa-star" style="color: #f9bf29;"></i> Rating & Ulasan Produk</h2>
                    <?php if ($total_reviews > 0): ?>
                    <p>Berdasarkan <?= $total_reviews ?> ulasan dari pembeli</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if ($total_reviews > 0): ?>
        
        <div class="row">
            <!-- Rating Summary -->
            <div class="col-lg-4">
                <div class="rating-summary-card">
                    <div class="rating-number">
                        <?= $avg_rating ?>
                        <span style="font-size: 24px; color: #9ca3af;">/5</span>
                    </div>
                    <div class="rating-stars-summary">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= floor($avg_rating)): ?>
                                <i class="fas fa-star" style="color: #f9bf29;"></i>
                            <?php elseif ($i <= ceil($avg_rating) && $avg_rating - floor($avg_rating) >= 0.5): ?>
                                <i class="fas fa-star-half-alt" style="color: #f9bf29;"></i>
                            <?php else: ?>
                                <i class="far fa-star" style="color: #ddd;"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <p style="color: #6a6a6a; margin: 0;">Dari <?= $total_reviews ?> ulasan</p>
                </div>
            </div>

            <!-- Rating Distribution -->
            <div class="col-lg-8">
                <div class="rating-distribution">
                    <h5>Distribusi Rating</h5>
                    <?php foreach ($rating_distribution as $star => $data): ?>
                    <div class="rating-bar">
                        <div class="rating-bar-label">
                            <?= $star ?> <i class="fas fa-star" style="color: #f9bf29; font-size: 12px;"></i>
                        </div>
                        <div class="rating-bar-track">
                            <div class="rating-bar-fill" style="width: <?= $data['percentage'] ?>%;"></div>
                        </div>
                        <div class="rating-bar-count">
                            <?= $data['count'] ?> (<?= $data['percentage'] ?>%)
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Testimonials List -->
        <div class="testimonials-list">
            <?php foreach ($testimonials as $testi): ?>
            <div class="testimonial-item">
                <div class="testimonial-item-header">
                    <div class="user-info">
                        <div class="user-avatar">
                            <?= strtoupper(substr($testi->nama_lengkap, 0, 2)) ?>
                        </div>
                        <div>
                            <div class="user-name"><?= htmlspecialchars($testi->nama_lengkap) ?></div>
                            <div class="review-date">
                                <i class="fas fa-calendar"></i> 
                                <?= date('d F Y', strtotime($testi->created_at)) ?>
                            </div>
                        </div>
                    </div>
                    <div class="review-rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= $testi->rating): ?>
                                <i class="fas fa-star"></i>
                            <?php else: ?>
                                <i class="far fa-star"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
                
                <h4 class="review-title"><?= htmlspecialchars($testi->judul_testimoni) ?></h4>
                <p class="review-text"><?= nl2br(htmlspecialchars($testi->isi_testimoni)) ?></p>
                
                <?php if (!empty($testi->foto_produk)): ?>
                <div class="review-image">
                    <img src="<?= base_url('uploads/testimonials/' . $testi->foto_produk) ?>" 
                         alt="Review photo"
                         onclick="openImageModal(this.src)">
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <?php else: ?>
        
        <!-- Empty State -->
        <div class="empty-testimonials">
            <i class="fas fa-star"></i>
            <h3>Belum Ada Ulasan</h3>
            <p>Jadilah yang pertama memberikan ulasan untuk produk ini</p>
        </div>
        
        <?php endif; ?>
    </div>
</section>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border: none; border-radius: 15px;">
            <div class="modal-body p-0">
                <img id="modalImage" src="" class="img-fluid w-100" style="border-radius: 15px;">
            </div>
        </div>
    </div>
</div>

<script>
function openImageModal(src) {
    document.getElementById('modalImage').src = src;
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}
</script>