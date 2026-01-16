<!-- Admin Sidebar -->
<aside class="admin-sidebar" id="adminSidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <i class="fas fa-store"></i>
            <div>
                <div class="sidebar-brand">Toko Jepara Indah Furniture Padang</div>
            </div>
        </div>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="sidebar-nav">
        <div class="nav-section">
            <div class="nav-section-title">MAIN MENU</div>
            
            <div class="nav-item">
                <a href="<?= base_url('admin/dashboard') ?>" 
                   class="nav-link <?= $this->uri->segment(2) == 'dashboard' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="<?= base_url('admin/produk') ?>" 
                   class="nav-link <?= $this->uri->segment(2) == 'produk' ? 'active' : '' ?>">
                    <i class="fas fa-box"></i>
                    <span>Produk</span>
                </a>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">LAYANAN</div>
            
            <div class="nav-item">
                <a href="<?= base_url('admin/rehap') ?>" 
                   class="nav-link <?= $this->uri->segment(2) == 'rehap' ? 'active' : '' ?>">
                    <i class="fas fa-tools"></i>
                    <span>Rehap Furniture</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="<?= base_url('admin/transaksi') ?>" 
                   class="nav-link <?= $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Transaksi</span>
                </a>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">KONTEN</div>
            
            <div class="nav-item">
                <a href="<?= base_url('admin/blog') ?>" 
                   class="nav-link <?= $this->uri->segment(2) == 'blog' ? 'active' : '' ?>">
                    <i class="fas fa-newspaper"></i>
                    <span>Blog</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="<?= base_url('admin/testimoni') ?>" 
                   class="nav-link <?= $this->uri->segment(2) == 'testimoni' ? 'active' : '' ?>">
                    <i class="fas fa-star"></i>
                    <span>Testimoni</span>
                </a>
            </div>
        </div>

        <div class="nav-section">
            <div class="nav-section-title">PENGATURAN</div>
            
            <div class="nav-item">
                <a href="<?= base_url('admin/pengguna') ?>" 
                   class="nav-link <?= $this->uri->segment(2) == 'pengguna' ? 'active' : '' ?>">
                    <i class="fas fa-users"></i>
                    <span>Pengguna</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="<?= base_url('admin/profil-toko') ?>" 
                   class="nav-link <?= $this->uri->segment(2) == 'profil-toko' ? 'active' : '' ?>">
                    <i class="fas fa-store-alt"></i>
                    <span>Profil Toko</span>
                </a>
            </div>
        </div>
    </nav>
</aside>

<!-- Main Content Area -->
<main class="admin-content">
     <?php $this->load->view('templates/admin_topbar'); ?>
    <div class="content-body">

<style>
/* Sidebar Specific Styles */
.sidebar-header {
    padding: 32px 24px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    background: rgba(0,0,0,0.1);
}

.sidebar-logo {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 8px;
}

.sidebar-logo i {
    font-size: 32px;
    color: #fbbf24;
}

.sidebar-brand {
    font-size: 22px;
    font-weight: 700;
    color: white;
    line-height: 1.2;
}

.sidebar-subtitle {
    font-size: 13px;
    color: rgba(255,255,255,0.7);
    font-weight: 400;
    margin-left: 46px;
}

.sidebar-nav {
    padding: 24px 0;
}

.nav-section-title {
    font-size: 11px;
    font-weight: 700;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 1.2px;
    padding: 0 24px 12px 24px;
}

.nav-item {
    margin: 0 12px 8px 12px;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 18px;
    color: rgba(255,255,255,0.85);
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.2s ease;
    font-size: 15px;
    font-weight: 500;
}

.nav-link i {
    font-size: 18px;
    width: 24px;
    text-align: center;
}

.nav-link:hover {
    background: rgba(255,255,255,0.1);
    color: white;
    transform: translateX(4px);
}

.nav-link.active {
    background: rgba(255,255,255,0.15);
    color: white;
    font-weight: 600;
}

.nav-link.active i {
    color: #fbbf24;
}

.sidebar-footer {
    padding: 20px 24px;
    border-top: 1px solid rgba(255,255,255,0.1);
    margin-top: auto;
}

.sidebar-footer .nav-link {
    margin: 0;
    color: rgba(255,255,255,0.7);
}

.sidebar-footer .nav-link:hover {
    color: #fbbf24;
    background: rgba(255,255,255,0.05);
}
</style>

<script>
// Mobile Sidebar Toggle Function
function toggleMobileSidebar() {
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('mobileOverlay');
    
    sidebar.classList.toggle('mobile-open');
    overlay.classList.toggle('active');
}

// Close sidebar when clicking nav link on mobile
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 1024) {
                const sidebar = document.getElementById('adminSidebar');
                const overlay = document.getElementById('mobileOverlay');
                sidebar.classList.remove('mobile-open');
                overlay.classList.remove('active');
            }
        });
    });
});
</script>