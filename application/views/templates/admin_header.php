<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Admin Panel - Jepara Furniture' ?></title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Admin Layout Styles -->
    <style>
        /* ===============================
   ADMIN TOPBAR (HEADER)
   =============================== */

.admin-topbar {
    position: sticky;
    top: 0;
    z-index: 800;
    background: #ffffff;
    padding: 16px 28px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.topbar-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.topbar-title {
    font-size: 24px;
    font-weight: 700;
    color: #8B5E3C;
    line-height: 1.2;
}

.topbar-breadcrumb {
    font-size: 13px;
    color: #6b7280;
    display: flex;
    align-items: center;
    gap: 6px;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 20px;
}

.topbar-icon {
    position: relative;
    font-size: 18px;
    color: #6b7280;
    cursor: pointer;
}

.notif-dot {
    position: absolute;
    top: 2px;
    right: 2px;
    width: 8px;
    height: 8px;
    background: #ef4444;
    border-radius: 50%;
}

.topbar-profile {
    position: relative;
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
}

.profile-avatar {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #8B5E3C, #6d4a2f);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-info {
    display: flex;
    flex-direction: column;
    line-height: 1.1;
}

.profile-name {
    font-size: 14px;
    font-weight: 600;
}

.profile-role {
    font-size: 12px;
    color: #6b7280;
}

.profile-dropdown {
    position: absolute;
    top: 110%;
    right: 0;
    width: 200px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 8px 0;
    display: none;
}

.profile-dropdown a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 16px;
    font-size: 14px;
    color: #374151;
    text-decoration: none;
}

.profile-dropdown a:hover {
    background: #f9fafb;
}

.profile-dropdown .logout {
    color: #dc2626;
}

.dropdown-divider {
    height: 1px;
    background: #e5e7eb;
    margin: 6px 0;
}

/* Mobile */
.d-none-desktop {
    display: none;
}

@media (max-width: 1024px) {
    .d-none-desktop {
        display: inline-flex;
    }
}

        /* ========================================
           COMPLETE ADMIN PANEL LAYOUT SYSTEM
           ======================================== */
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #f8f9fa;
            color: #1a1a1a;
            overflow-x: hidden;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 280px;
            background: linear-gradient(180deg, #8B5E3C 0%, #6d4a2f 100%);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 4px 0 24px rgba(0,0,0,0.1);
        }

        .admin-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .admin-sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }

        .admin-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 3px;
        }

        /* Main Content */
        .admin-content {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            background: #f8f9fa;
            width: calc(100% - 280px);
        }

        /* Content Body */
        .content-body {
            padding: 0;
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .admin-sidebar.mobile-open {
                transform: translateX(0);
            }
            
            .admin-content {
                margin-left: 0;
                width: 100%;
            }
        }

        .mobile-menu-toggle {
            display: none;
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            font-size: 24px;
            box-shadow: 0 4px 16px rgba(139,94,60,0.4);
            z-index: 999;
        }

        @media (max-width: 1024px) {
            .mobile-menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }

        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
        }

        .mobile-overlay.active {
            display: block;
        }

        /* Utility Classes */
        .d-none { display: none; }
        .d-block { display: block; }
        .d-flex { display: flex; }
        .justify-content-between { justify-content: space-between; }
        .align-items-center { align-items: center; }
        .align-items-start { align-items: flex-start; }
        .gap-1 { gap: 4px; }
        .gap-2 { gap: 8px; }
        .gap-3 { gap: 16px; }
        .mb-0 { margin-bottom: 0; }
        .mb-2 { margin-bottom: 8px; }
        .mb-3 { margin-bottom: 16px; }
        .mb-4 { margin-bottom: 24px; }
        .mt-2 { margin-top: 8px; }
        .mt-3 { margin-top: 16px; }
        .mt-4 { margin-top: 24px; }
        .me-2 { margin-right: 8px; }
        .text-muted { color: #6b7280; }
        .text-primary { color: #8B5E3C; }
        .fw-semibold { font-weight: 600; }
        .fw-bold { font-weight: 700; }
        .badge { 
            padding: 4px 10px; 
            border-radius: 6px; 
            font-size: 11px; 
            font-weight: 600;
            display: inline-block;
        }
        .badge-success { background: #d1fae5; color: #065f46; }
        .badge-warning { background: #fef3c7; color: #92400e; }
        .badge-danger { background: #fee2e2; color: #991b1b; }
        .badge-secondary { background: #f3f4f6; color: #4b5563; }
        .badge-info { background: #dbeafe; color: #1e40af; }
    </style>
</head>
<body>

<!-- Mobile Menu Toggle -->
<button class="mobile-menu-toggle" onclick="toggleMobileSidebar()">
    <i class="fas fa-bars"></i>
</button>

<!-- Mobile Overlay -->
<div class="mobile-overlay" id="mobileOverlay" onclick="toggleMobileSidebar()"></div>

<!-- Admin Wrapper Start -->
<div class="admin-wrapper">