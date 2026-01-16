<header class="admin-topbar">
    <div class="topbar-left">
        <button class="topbar-menu-btn d-none-desktop" onclick="toggleMobileSidebar()">
            <i class="fas fa-bars"></i>
        </button>

        <div>
            <h1 class="topbar-title">
                <?= isset($page_title) ? $page_title : 'Dashboard' ?>
            </h1>
            <div class="topbar-breadcrumb">
                <span>Admin</span>
                <i class="fas fa-chevron-right"></i>
                <span><?= isset($page_title) ? $page_title : 'Dashboard' ?></span>
            </div>
        </div>
    </div>

    <div class="topbar-right">
        <div class="topbar-icon">
            <i class="fas fa-bell"></i>
            <span class="notif-dot"></span>
        </div>

        <div class="topbar-profile" onclick="toggleProfileMenu()">
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="profile-info">
                <span class="profile-name">Admin</span>
                <span class="profile-role">Administrator</span>
            </div>
            <i class="fas fa-chevron-down"></i>

            <!-- Dropdown -->
            <div class="profile-dropdown" id="profileDropdown">
                <a href="<?= base_url('admin/akun') ?>">
                    <i class="fas fa-user-cog"></i> Akun
                </a>
                <a href="<?= base_url('admin/profil-toko') ?>">
                    <i class="fas fa-store"></i> Profil Toko
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('logout') ?>" class="dropdown-item logout-item" onclick="return confirm('Yakin ingin logout?')">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>

        </div>
    </div>
</header>
