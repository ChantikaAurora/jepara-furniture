<!-- Navigation -->
<?php 
    $segment = $this->uri->segment(1); 
    $is_checkout = ($segment == 'checkout' || $segment == 'cart');
?>
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= base_url('assets/images/logotoko.png') ?>" alt="Jepara Indah Furniture">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item <?= ($segment == '' || $segment == 'home') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url() ?>">Beranda</a>
                </li>
                <li class="nav-item <?= ($segment == 'product') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('product') ?>">Katalog Produk</a>
                </li>
                <li class="nav-item <?= ($segment == 'about') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('about') ?>">Tentang Kami</a>
                </li>
                <li class="nav-item <?= ($segment == 'rehap') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('rehap') ?>">Layanan Rehap</a>
                </li>
                <li class="nav-item <?= ($segment == 'blog') ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('blog') ?>">Blog</a>
                </li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <?php if ($this->session->userdata('logged_in')): ?>
                    <!-- Logged in user menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url('assets/images/user.svg') ?>" alt="User">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('profile') ?>">Profil Saya</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('profile/orders') ?>">Pesanan Saya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                        </ul>
                    </li>
                    <li class="<?= $is_checkout ? 'active-cart' : '' ?>">
                        <a class="nav-link position-relative" href="<?= base_url('cart') ?>">
                            <img src="<?= base_url('assets/images/cart.svg') ?>" alt="Cart">
                            <?php 
                            // Get cart count
                            $cart_count = 0;
                            $user_id = $this->session->userdata('user_id');

                            if ($user_id && isset($this->Cart_model)) {
                                $cart_count = (int) $this->Cart_model->get_cart_count($user_id);
                            }
                            
                            if ($cart_count > 0): 
                            ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">
                                    <?= $cart_count ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php else: ?>
                    <!-- Guest menu -->
                    <li>
                        <a class="nav-link" href="<?= base_url('auth/login') ?>">
                            <img src="<?= base_url('assets/images/user.svg') ?>" alt="Login">
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= base_url('auth/login') ?>">
                            <img src="<?= base_url('assets/images/cart.svg') ?>" alt="Cart">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navigation -->

<style>
/* Navbar Custom Styles */
.custom-navbar {
    background: #3b5d50 !important;
    padding: 0.5rem 0;
}

.custom-navbar .navbar-brand {
    display: flex;
    align-items: center;
    padding: 0;
}

.custom-navbar .navbar-brand img {
    height: 70px;
    width: auto;
    display: block;
}

.custom-navbar-nav {
    margin-right: 0 !important;
}

.custom-navbar-nav li {
    margin-left: 2rem;
}

.custom-navbar-nav li a {
    font-weight: 500;
    color: #ffffff !important;
    opacity: .8;
    transition: .3s all ease;
    position: relative;
}

.custom-navbar-nav li a:hover,
.custom-navbar-nav li.active a {
    opacity: 1;
}

.custom-navbar-nav li.active a:before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: #f9bf29;
}

.custom-navbar-cta {
    margin-left: auto !important;
}

.custom-navbar-cta li {
    margin-left: 0;
    margin-right: 1rem;
}

.custom-navbar-cta li:last-child {
    margin-right: 0;
}

.custom-navbar-cta li a img {
    width: 24px;
    height: 24px;
    filter: brightness(0) invert(1);
}

/* Active cart icon during checkout */
.custom-navbar-cta li.active-cart a {
    background: rgba(249, 191, 41, 0.2);
    padding: 8px 12px;
    border-radius: 8px;
}

.custom-navbar-cta li.active-cart a img {
    filter: brightness(0) invert(1) drop-shadow(0 0 3px rgba(249, 191, 41, 0.8));
}

.dropdown-menu {
    border: none;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.dropdown-item {
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background-color: #3b5d50;
    color: #ffffff;
}

@media (max-width: 991.98px) {
    .custom-navbar-nav li {
        margin-left: 0;
        margin-bottom: 0.5rem;
    }
    
    .custom-navbar-cta {
        margin-left: 0 !important;
        margin-top: 1rem;
    }
    
    .custom-navbar-cta li {
        display: inline-block;
        margin-right: 1rem;
    }
}
</style>