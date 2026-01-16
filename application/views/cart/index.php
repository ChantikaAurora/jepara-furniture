<style>
/* Modern Shopping Cart - Beautiful Design */
.cart-wrapper {
    background: linear-gradient(135deg, #f5f1e8 0%, #faf8f3 100%);
    min-height: 100vh;
    padding: 60px 0;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Page Header */
.cart-header {
    background: white;
    border-radius: 20px;
    padding: 32px 40px;
    margin-bottom: 40px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    border: 1px solid rgba(139,94,60,0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart-title {
    font-size: 32px;
    font-weight: 800;
    color: #2d1810;
    display: flex;
    align-items: center;
    gap: 12px;
}

.cart-title i {
    color: #8B5E3C;
}

.cart-count {
    font-size: 16px;
    color: #6b5947;
    font-weight: 600;
}

/* Alert Messages */
.alert {
    padding: 18px 24px;
    border-radius: 12px;
    margin-bottom: 24px;
    display: flex;
    align-items: flex-start;
    gap: 14px;
    font-size: 15px;
    border: 1.5px solid;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.alert-success {
    background: #ecfdf5;
    border-color: #10b981;
    color: #065f46;
}

.alert-danger {
    background: #fef2f2;
    border-color: #ef4444;
    color: #991b1b;
}

.alert i {
    font-size: 18px;
    margin-top: 2px;
}

.btn-close {
    margin-left: auto;
    background: transparent;
    border: none;
    font-size: 20px;
    cursor: pointer;
    opacity: 0.5;
}

.btn-close:hover {
    opacity: 1;
}

/* Cart Layout */
.cart-layout {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 32px;
}

/* Cart Items */
.cart-items-section {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.cart-item {
    background: white;
    border-radius: 18px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    border: 1px solid rgba(139,94,60,0.08);
    display: grid;
    grid-template-columns: 120px 1fr auto;
    gap: 24px;
    align-items: center;
    transition: all 0.2s ease;
}

.cart-item:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
}

.item-image {
    width: 120px;
    height: 120px;
    border-radius: 12px;
    overflow: hidden;
    background: #f9fafb;
}

.item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.item-details {
    flex: 1;
}

.item-category {
    font-size: 12px;
    font-weight: 600;
    color: #8B5E3C;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 6px;
}

.item-name {
    font-size: 20px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 8px;
}

.item-price {
    font-size: 22px;
    font-weight: 800;
    color: #8B5E3C;
    margin-bottom: 16px;
}

.item-unavailable {
    display: inline-block;
    padding: 6px 12px;
    background: #fee2e2;
    color: #991b1b;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
    margin-top: 8px;
}

.item-actions {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 16px;
}

.quantity-control {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #faf8f3;
    border-radius: 10px;
    padding: 4px;
}

.qty-btn {
    width: 36px;
    height: 36px;
    border: none;
    background: white;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #8B5E3C;
    display: flex;
    align-items: center;
    justify-content: center;
}

.qty-btn:hover {
    background: #8B5E3C;
    color: white;
}

.qty-input {
    width: 60px;
    height: 36px;
    text-align: center;
    border: none;
    background: transparent;
    font-size: 16px;
    font-weight: 700;
    color: #2d1810;
}

.qty-input:focus {
    outline: none;
}

.item-subtotal {
    font-size: 24px;
    font-weight: 800;
    color: #2d1810;
}

.btn-remove {
    padding: 10px 20px;
    background: #fee2e2;
    color: #991b1b;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-remove:hover {
    background: #fecaca;
    transform: translateY(-2px);
}

/* Cart Summary */
.cart-summary {
    position: sticky;
    top: 20px;
    height: fit-content;
}

.summary-card {
    background: white;
    border-radius: 18px;
    padding: 28px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    border: 1px solid rgba(139,94,60,0.08);
}

.summary-title {
    font-size: 20px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid #f3f4f6;
    display: flex;
    align-items: center;
    gap: 10px;
}

.summary-title i {
    color: #8B5E3C;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.summary-label {
    font-size: 15px;
    color: #6b5947;
    font-weight: 600;
}

.summary-value {
    font-size: 15px;
    color: #2d1810;
    font-weight: 700;
}

.summary-total {
    padding-top: 20px;
    margin-top: 20px;
    border-top: 2px solid #8B5E3C;
}

.summary-total .summary-label {
    font-size: 18px;
    color: #2d1810;
}

.summary-total .summary-value {
    font-size: 28px;
    color: #8B5E3C;
}

.summary-actions {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 24px;
}

.btn {
    padding: 16px 24px;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    text-decoration: none;
}

.btn-primary {
    background: linear-gradient(135deg, #8B5E3C, #a67c52);
    color: white;
    box-shadow: 0 4px 12px rgba(139,94,60,0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(139,94,60,0.4);
}

.btn-secondary {
    background: #f3f4f6;
    color: #4b5563;
}

.btn-secondary:hover {
    background: #e5e7eb;
}

.btn-danger {
    background: transparent;
    color: #ef4444;
    border: 2px solid #ef4444;
}

.btn-danger:hover {
    background: #ef4444;
    color: white;
}

/* Empty Cart */
.empty-cart {
    background: white;
    border-radius: 18px;
    padding: 80px 40px;
    text-align: center;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
}

.empty-icon {
    width: 120px;
    height: 120px;
    margin: 0 auto 24px;
    background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-icon i {
    font-size: 56px;
    color: #9ca3af;
}

.empty-title {
    font-size: 28px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 12px;
}

.empty-text {
    font-size: 16px;
    color: #6b5947;
    margin-bottom: 32px;
}

/* Responsive */
@media (max-width: 1024px) {
    .cart-layout {
        grid-template-columns: 1fr;
    }

    .cart-summary {
        position: relative;
        top: 0;
    }
}

@media (max-width: 768px) {
    .container {
        padding: 0 16px;
    }

    .cart-header {
        padding: 24px;
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

    .cart-title {
        font-size: 24px;
    }

    .cart-item {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .item-image {
        width: 100%;
        height: 200px;
    }

    .item-actions {
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
    }

    .summary-card {
        padding: 20px;
    }
}
</style>

<div class="cart-wrapper">
    <div class="container">
        
        <!-- Cart Header -->
        <div class="cart-header">
            <div>
                <h1 class="cart-title">
                    <i class="fas fa-shopping-cart"></i>
                    Keranjang Belanja
                </h1>
                <?php if (!empty($cart_items)): ?>
                <p class="cart-count"><?= count($cart_items) ?> produk dalam keranjang</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Alert Messages -->
        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <div><?= $this->session->flashdata('success') ?></div>
            <button type="button" class="btn-close" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <div><?= $this->session->flashdata('error') ?></div>
            <button type="button" class="btn-close" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <?php endif; ?>

        <?php if (empty($cart_items)): ?>
            <!-- Empty Cart -->
            <div class="empty-cart">
                <div class="empty-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3 class="empty-title">Keranjang Belanja Kosong</h3>
                <p class="empty-text">Anda belum menambahkan produk ke keranjang</p>
                <a href="<?= base_url('product') ?>" class="btn btn-primary">
                    <i class="fas fa-shopping-bag"></i> Mulai Belanja
                </a>
            </div>
        <?php else: ?>
            <!-- Cart Layout -->
            <div class="cart-layout">
                
                <!-- Cart Items -->
                <div class="cart-items-section">
                    <?php foreach ($cart_items as $item): ?>
                    <div class="cart-item" data-cart-id="<?= $item->id ?>">
                        
                        <!-- Product Image -->
                        <div class="item-image">
                            <?php if (!empty($item->gambar_1)): ?>
                                <img src="<?= base_url('uploads/products/' . $item->gambar_1) ?>" 
                                     alt="<?= $item->nama_produk ?>">
                            <?php else: ?>
                                <img src="<?= base_url('assets/images/no-image.jpg') ?>" 
                                     alt="No Image">
                            <?php endif; ?>
                        </div>
                        
                        <!-- Product Details -->
                        <div class="item-details">
                            <div class="item-category">
                                <?= $item->nama_kategori ?? 'Furniture' ?>
                            </div>
                            <h3 class="item-name"><?= $item->nama_produk ?></h3>
                            <div class="item-price">
                                Rp <?= number_format($item->harga, 0, ',', '.') ?>
                            </div>
                            
                            <?php if ($item->produk_status != 'active'): ?>
                                <span class="item-unavailable">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Produk tidak tersedia
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Actions -->
                        <div class="item-actions">
                         
                            
                            <!-- Subtotal -->
                            <div class="item-subtotal">
                                Rp <span class="subtotal-value"><?= number_format($item->subtotal, 0, ',', '.') ?></span>
                            </div>
                            
                            <!-- Remove Button -->
                            <button type="button" 
                                    class="btn-remove" 
                                    data-cart-id="<?= $item->id ?>"
                                    onclick="removeItem(<?= $item->id ?>)">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Cart Summary -->
                <div class="cart-summary">
                    <div class="summary-card">
                        <h3 class="summary-title">
                            <i class="fas fa-receipt"></i>
                            Ringkasan Belanja
                        </h3>
                        
                        <div class="summary-row">
                            <span class="summary-label">Total Produk</span>
                            <span class="summary-value">
                                <span id="summary-items"><?= $cart_summary['total_items'] ?></span> item
                            </span>
                        </div>
                        
                        <div class="summary-row summary-total">
                            <span class="summary-label">Total Harga</span>
                            <span class="summary-value" id="summary-total">
                                <?= $cart_summary['formatted_price'] ?>
                            </span>
                        </div>
                        
                        <div class="summary-actions">
                            <a href="<?= base_url('cart/checkout') ?>" class="btn btn-primary">
                                <i class="fas fa-credit-card"></i>
                                Lanjut ke Pembayaran
                            </a>
                            
                            <a href="<?= base_url('product') ?>" class="btn btn-secondary">
                                <i class="fas fa-shopping-bag"></i>
                                Lanjut Belanja
                            </a>
                            
                            <button type="button" 
                                    class="btn btn-danger" 
                                    onclick="clearCart()">
                                <i class="fas fa-trash"></i>
                                Kosongkan Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php endif; ?>
        
    </div>
</div>

<script>
// Remove item from cart
function removeItem(cartId) {
    if (confirm('Hapus produk ini dari keranjang?')) {
        window.location.href = '<?= base_url('cart/remove/') ?>' + cartId;
    }
}

// Clear entire cart
function clearCart() {
    if (confirm('Kosongkan semua produk dari keranjang?')) {
        window.location.href = '<?= base_url('cart/clear') ?>';
    }
}

// Initialize quantity controls
document.addEventListener('DOMContentLoaded', function() {
    // Plus button
    document.querySelectorAll('.btn-qty-plus').forEach(btn => {
        btn.addEventListener('click', function() {
            const cartId = this.dataset.cartId;
            const input = document.querySelector(`.qty-input[data-cart-id="${cartId}"]`);
            const currentQty = parseInt(input.value);
            const newQty = currentQty + 1;
            const price = parseFloat(input.dataset.price);
            
            input.value = newQty;
            updateCartQuantity(cartId, newQty, price);
        });
    });
    
    // Minus button
    document.querySelectorAll('.btn-qty-minus').forEach(btn => {
        btn.addEventListener('click', function() {
            const cartId = this.dataset.cartId;
            const input = document.querySelector(`.qty-input[data-cart-id="${cartId}"]`);
            const currentQty = parseInt(input.value);
            
            if (currentQty > 1) {
                const newQty = currentQty - 1;
                const price = parseFloat(input.dataset.price);
                
                input.value = newQty;
                updateCartQuantity(cartId, newQty, price);
            }
        });
    });
});

// Update cart quantity via AJAX
function updateCartQuantity(cartId, quantity, price) {
    // Create FormData
    const formData = new FormData();
    formData.append('cart_id', cartId);
    formData.append('quantity', quantity);
    
    fetch('<?= base_url('cart/update') ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update item subtotal
            const subtotal = price * quantity;
            const item = document.querySelector(`.cart-item[data-cart-id="${cartId}"]`);
            item.querySelector('.subtotal-value').textContent = formatNumber(subtotal);
            
            // Update summary
            document.getElementById('summary-items').textContent = data.summary.total_items;
            document.getElementById('summary-total').textContent = data.summary.formatted_price;
            
            // Show success notification
            showNotification('success', 'Keranjang berhasil diupdate');
        } else {
            showNotification('error', data.message || 'Gagal mengupdate keranjang');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('error', 'Terjadi kesalahan, silakan coba lagi');
    });
}

// Format number to Indonesian format
function formatNumber(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Show notification
function showNotification(type, message) {
    const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
    const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
    
    const notification = document.createElement('div');
    notification.className = `alert ${alertClass}`;
    notification.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        <i class="fas ${icon}"></i>
        <div>${message}</div>
        <button type="button" class="btn-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transition = 'opacity 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}
</script>