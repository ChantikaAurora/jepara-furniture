</div><!-- .content-body -->
    
    <!-- Footer -->
    <footer class="admin-footer">
        <div class="footer-content">
            <div class="footer-left">
                <p class="footer-text">
                    &copy; <?= date('Y') ?> <strong>Jepara Indah Furniture</strong>. All rights reserved.
                </p>
            </div>
           <div class="footer-right">
    <p class="footer-credit">
        Made with <span class="heart">❤️</span> by
        <a href="mailto:chantikaakmal@gmail.com">chantikaakmal@gmail.com</a>
    </p>
</div>

        </div>
    </footer>
    
</main><!-- .admin-content -->

</div><!-- .admin-wrapper -->

<style>
/* ========================================
   FOOTER - BROWN COLOR
   ======================================== */

.admin-footer {
    background: #8B5E3C;
    border-top: 1px solid rgba(0,0,0,0.1);
    padding: 20px 28px;
    margin-top: auto;
}

.footer-credit {
    font-size: 14px;
    font-weight: 500;
    font-family: 'Inter', 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
    color: rgba(255,255,255,0.85);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
}

.footer-credit a {
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: opacity 0.2s ease;
}

.footer-credit a:hover {
    opacity: 0.85;
}

.footer-credit .heart {
    line-height: 1;
}

.footer-text-inline {
    font-size: 14px;
    color: rgba(255,255,255,0.85);
}
.footer-credit {
    font-size: 14px;
    color: rgba(255,255,255,0.85);
    margin: 0;
}
.footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}

.footer-left {
    flex: 1;
}

.footer-text {
    font-size: 14px;
    color: rgba(255,255,255,0.85);
    margin: 0;
}

.footer-text strong {
    font-weight: 700;
    color: white;
}

.footer-right {
    display: flex;
    align-items: center;
    gap: 12px;
}

.footer-link {
    font-size: 14px;
    color: rgba(255,255,255,0.85);
    text-decoration: none;
    transition: color 0.2s ease;
}

.footer-link:hover {
    color: white;
}

.footer-separator {
    color: rgba(255,255,255,0.4);
    font-size: 12px;
}

@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-left {
        width: 100%;
    }
}
</style>

<!-- Global Scripts -->
<script>
// Auto-hide flash messages after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 300);
        }, 5000);
    });
});

// Confirm delete actions
document.querySelectorAll('[data-confirm]').forEach(element => {
    element.addEventListener('click', function(e) {
        if (!confirm(this.getAttribute('data-confirm'))) {
            e.preventDefault();
            return false;
        }
    });
});
</script>
<script>
function toggleProfileMenu() {
    const dropdown = document.getElementById('profileDropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
}

document.addEventListener('click', function(e) {
    const profile = document.querySelector('.topbar-profile');
    const dropdown = document.getElementById('profileDropdown');

    if (dropdown && !profile.contains(e.target)) {
        dropdown.style.display = 'none';
    }
});
</script>


</body>
</html>