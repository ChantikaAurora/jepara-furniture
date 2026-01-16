<style>
/* Blog Management - Beautiful Modern Design */
.blog-wrapper {
    background: linear-gradient(135deg, #f5f1e8 0%, #faf8f3 100%);
    min-height: 100vh;
    padding: 32px;
}

.page-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 32px;
}

.page-title {
    font-size: 32px;
    font-weight: 800;
    color: #2d1810;
    margin-bottom: 8px;
}

.page-subtitle {
    font-size: 16px;
    color: #6b5947;
}

.btn-add {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    padding: 12px 24px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
}

.btn-add:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(139,94,60,0.3);
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 32px;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.stat-label {
    font-size: 14px;
    color: #6b5947;
    margin-bottom: 12px;
}

.stat-value {
    font-size: 36px;
    font-weight: 800;
    color: #2d1810;
    margin-bottom: 8px;
}

.stat-note {
    font-size: 13px;
    font-weight: 600;
}

.stat-note.green {
    color: #10b981;
}

.stat-note.orange {
    color: #f59e0b;
}

.stat-note.blue {
    color: #3b82f6;
}

/* Search Section */
.search-section {
    background: white;
    border-radius: 16px;
    padding: 20px 24px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.search-box {
    position: relative;
    width: 100%;
}

.search-box i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
}

.search-box input {
    width: 100%;
    padding: 12px 16px 12px 45px;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
}

/* Table Container */
.table-container {
    background: white;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    overflow: hidden;
}

.table-header {
    padding: 20px 24px;
    border-bottom: 1px solid #f3f4f6;
}

.table-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #faf8f3;
}

th {
    padding: 14px 20px;
    text-align: left;
    font-size: 13px;
    font-weight: 700;
    color: #6b5947;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

td {
    padding: 16px 20px;
    font-size: 14px;
    color: #2d1810;
    border-bottom: 1px solid #f3f4f6;
}

tbody tr:hover {
    background: #faf8f3;
}

.article-title {
    font-weight: 600;
    color: #2d1810;
    max-width: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Badges */
.badge {
    padding: 5px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
    display: inline-block;
}

.badge-published {
    background: #d1fae5;
    color: #065f46;
}

.badge-draft {
    background: #f3f4f6;
    color: #6b7280;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 6px;
}

.btn-action {
    padding: 6px 12px;
    border-radius: 6px;
    border: none;
    font-weight: 600;
    font-size: 11px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: all 0.2s ease;
}

.btn-view {
    background: #dbeafe;
    color: #1e40af;
}

.btn-view:hover {
    background: #bfdbfe;
}

.btn-toggle {
    background: #fef3c7;
    color: #92400e;
}

.btn-toggle:hover {
    background: #fde68a;
}

.btn-edit {
    background: #dbeafe;
    color: #1e40af;
}

.btn-edit:hover {
    background: #bfdbfe;
}

.btn-delete {
    background: #fee2e2;
    color: #991b1b;
}

.btn-delete:hover {
    background: #fecaca;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 40px;
}

.empty-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
    background: #f3f4f6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-icon i {
    font-size: 36px;
    color: #9ca3af;
}

.empty-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 8px;
}

.empty-text {
    font-size: 14px;
    color: #6b5947;
    margin-bottom: 20px;
}

@media (max-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .blog-wrapper {
        padding: 20px;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .page-header {
        flex-direction: column;
        gap: 16px;
    }
}
</style>

<div class="blog-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Blog Management</h1>
            <p class="page-subtitle">Kelola artikel dan konten blog Anda</p>
        </div>
        <a href="<?= base_url('admin/blog/create') ?>" class="btn-add">
            <i class="fas fa-plus-circle"></i>
            Tambah Artikel Baru
        </a>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">Total Artikel</div>
            <div class="stat-value"><?= $stats->total_posts ?></div>
            <div class="stat-note green">
                +<?= $stats->total_posts > 0 ? '5' : '0' ?> bulan ini
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Published</div>
            <div class="stat-value"><?= $stats->published_posts ?></div>
            <div class="stat-note green">
                Artikel aktif
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Draft</div>
            <div class="stat-value"><?= $stats->draft_posts ?></div>
            <div class="stat-note orange">
                Belum dipublikasi
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Total Views</div>
            <div class="stat-value"><?= $stats->total_views_formatted ?></div>
            <div class="stat-note blue">
                Bulan ini
            </div>
        </div>
    </div>

    <!-- Flash Messages -->
    <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success" style="background: #ecfdf5; color: #065f46; padding: 16px 20px; border-radius: 12px; margin-bottom: 20px; border: 1px solid #10b981;">
        <i class="fas fa-check-circle"></i>
        <?= $this->session->flashdata('success') ?>
    </div>
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger" style="background: #fef2f2; color: #991b1b; padding: 16px 20px; border-radius: 12px; margin-bottom: 20px; border: 1px solid #ef4444;">
        <i class="fas fa-exclamation-circle"></i>
        <?= $this->session->flashdata('error') ?>
    </div>
    <?php endif; ?>

    <!-- Search -->
    <div class="search-section">
        <form method="get" action="<?= base_url('admin/blog') ?>">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" 
                       name="search" 
                       placeholder="Cari artikel..."
                       value="<?= $this->input->get('search') ?>">
            </div>
        </form>
    </div>

    <!-- Articles Table -->
    <div class="table-container">
        <div class="table-header">
            <h3 class="table-title">Daftar Artikel</h3>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($posts)): ?>
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h3 class="empty-title">Belum Ada Artikel</h3>
                            <p class="empty-text">Mulai tulis artikel pertama Anda</p>
                            <a href="<?= base_url('admin/blog/create') ?>" class="btn-add">
                                <i class="fas fa-plus-circle"></i>
                                Tulis Artikel Pertama
                            </a>
                        </div>
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td>
                        <div class="article-title" title="<?= $post->judul ?>">
                            <?= $post->judul ?>
                        </div>
                        <small style="color: #9ca3af;">
                            <i class="fas fa-tag"></i>
                            <?= $post->kategori_blog ?>
                        </small>
                    </td>
                    <td><?= isset($post->author_name) ? $post->author_name : 'Admin' ?></td>
                    <td><?= date('Y-m-d', strtotime($post->created_at)) ?></td>
                    <td><?= number_format($post->view_count) ?></td>
                    <td>
                        <span class="badge badge-<?= $post->is_published ? 'published' : 'draft' ?>">
                            <?= $post->is_published ? 'Published' : 'Draft' ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button onclick="togglePublish(<?= $post->id ?>)" 
                                    class="btn-action btn-toggle"
                                    title="Toggle Publish">
                                <i class="fas fa-power-off"></i>
                                Toggle
                            </button>
                            <a href="<?= base_url('admin/blog/edit/' . $post->id) ?>" 
                               class="btn-action btn-edit"
                               title="Edit">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <button onclick="deletePost(<?= $post->id ?>, '<?= addslashes($post->judul) ?>')" 
                                    class="btn-action btn-delete"
                                    title="Hapus">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
// Toggle Publish Status
function togglePublish(id) {
    if(confirm('Yakin ingin mengubah status publikasi artikel ini?')) {
        window.location.href = '<?= base_url("admin/blog/toggle_publish/") ?>' + id;
    }
}

// Delete Post
function deletePost(id, title) {
    if(confirm('Yakin ingin menghapus artikel "' + title + '"?\n\nAksi ini tidak dapat dibatalkan!')) {
        window.location.href = '<?= base_url("admin/blog/delete/") ?>' + id;
    }
}

// Animate cards on load
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.stat-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>