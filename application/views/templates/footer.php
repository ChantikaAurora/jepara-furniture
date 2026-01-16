<!-- Start Footer Section -->
<footer class="footer-section">
    <div class="container">
        <!-- Main Footer Content -->
        <div class="row align-items-center py-4">
            <!-- Company Name & Social Media -->
            <div class="col-md-4 mb-3 mb-md-0">
                <a href="<?php echo base_url(); ?>" class="footer-logo">
                    Jepara Indah Furniture<span>.</span>
                </a>
                <ul class="list-unstyled custom-social mt-3 mb-0">
                    <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-whatsapp"></span></a></li>
                    <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                     <li><a href="#"><span class="fa fa-brands fa-tiktok"></span></a></li>
                </ul>
            </div>
            
            <!-- Quick Links -->
            <div class="col-md-4 mb-3 mb-md-0 text-center">
                <!-- <ul class="list-unstyled footer-links mb-0">
                    <li><a href="<?php echo base_url('about'); ?>">Tentang Kami</a></li>
                    <li><a href="<?php echo base_url('product'); ?>">Produk</a></li>
                    <li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
                    <li><a href="<?php echo base_url('contact'); ?>">Kontak</a></li>
                </ul> -->
            </div>
            
            <!-- Contact Info -->
            <div class="col-md-4 text-md-end">
                <p class="mb-1"><strong>Jepara Indah Furniture</strong></p>
                <p class="mb-1 small">Jl. Prof. Dr. Hamka no 25 Air tawar barat, Kota Padang, Sumatera Barat, Indonesia 25132</p>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="border-top copyright">
            <div class="row py-3">
                <div class="col-12 text-center">
                    <p class="mb-0 small">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Jepara Indah Furniture. All Rights Reserved. 
                        <span class="d-none d-md-inline">| Designed with love by Chantika Aurora Akmal</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Section -->

<style>
/* Footer Simplified Styles */
.footer-section {
    background-color: #ffffff;
    padding: 20px 0 0 0; /* Reduced from 80px to 20px */
}

.footer-logo {
    font-size: 24px;
    font-weight: 700;
    color: #2f2f2f;
    text-decoration: none;
}

.footer-logo span {
    color: #3b5d50;
}

.footer-logo:hover {
    color: #3b5d50;
}

/* Social Media Icons - Horizontal */
.custom-social {
    display: flex;
    gap: 10px;
    padding: 0;
    margin: 0;
}

.custom-social li {
    list-style: none;
}

.custom-social li a {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #dce5e4;
    color: #3b5d50;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.custom-social li a:hover {
    background: #3b5d50;
    color: #ffffff;
}

/* Footer Links - Horizontal */
.footer-links {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
}

.footer-links li {
    list-style: none;
}

.footer-links li a {
    color: #6a6a6a;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}

.footer-links li a:hover {
    color: #3b5d50;
}

/* Copyright Section */
.copyright {
    border-top: 1px solid #eff2f1 !important;
    margin-top: 20px; /* Reduced */
}

.copyright p {
    color: #6a6a6a;
    font-size: 13px;
}

.copyright a {
    color: #3b5d50;
    text-decoration: none;
}

.copyright a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    .footer-section {
        padding: 15px 0 0 0;
    }
    
    .footer-links {
        justify-content: center;
        gap: 15px;
    }
    
    .custom-social {
        justify-content: flex-start;
    }
}
</style>

<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/tiny-slider.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>
<!-- Additional Scripts -->
<?php if(isset($additional_scripts)): ?>
<?php echo $additional_scripts; ?>
<?php endif; ?>
</body>
</html>