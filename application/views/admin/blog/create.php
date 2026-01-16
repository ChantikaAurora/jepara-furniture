<style>
/* Blog Create - Beautiful Form Design */
.create-wrapper {
    background: linear-gradient(135deg, #f5f1e8 0%, #faf8f3 100%);
    min-height: 100vh;
    padding: 32px;
}

.page-header {
    background: white;
    border-radius: 16px;
    padding: 24px 32px;
    margin-bottom: 24px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.page-title {
    font-size: 24px;
    font-weight: 800;
    color: #2d1810;
}

.btn-back {
    background: #f3f4f6;
    color: #374151;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.form-container {
    background: white;
    border-radius: 16px;
    padding: 32px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}

.form-section {
    margin-bottom: 32px;
    padding-bottom: 32px;
    border-bottom: 1px solid #f3f4f6;
}

.form-section:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.section-title {
    font-size: 18px;
    font-weight: 700;
    color: #2d1810;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #2d1810;
    margin-bottom: 8px;
}

.form-label.required::after {
    content: ' *';
    color: #ef4444;
}

.form-control {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    font-size: 14px;
    transition: all 0.2s ease;
    background: #fafafa;
}

.form-control:focus {
    outline: none;
    border-color: #8B5E3C;
    background: white;
    box-shadow: 0 0 0 4px rgba(139,94,60,0.1);
}

select.form-control {
    cursor: pointer;
}

textarea.form-control {
    resize: vertical;
    min-height: 100px;
    font-family: inherit;
}

.form-text {
    font-size: 12px;
    color: #6b7280;
    margin-top: 6px;
}

/* HTML Editor Toolbar */
.editor-toolbar {
    display: flex;
    gap: 4px;
    padding: 12px;
    background: #f9fafb;
    border: 1.5px solid #e5e7eb;
    border-bottom: none;
    border-radius: 10px 10px 0 0;
    flex-wrap: wrap;
}

.editor-btn {
    padding: 6px 12px;
    background: white;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    transition: all 0.2s ease;
}

.editor-btn:hover {
    background: #8B5E3C;
    color: white;
    border-color: #8B5E3C;
}

.editor-btn i {
    margin-right: 4px;
}

#konten {
    border-radius: 0 0 10px 10px;
    border-top: none;
    min-height: 300px;
    font-family: 'Courier New', monospace;
}

/* Image Upload */
.image-upload {
    border: 2px dashed #e5e7eb;
    border-radius: 12px;
    padding: 24px;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s ease;
}

.image-upload:hover {
    border-color: #8B5E3C;
    background: #faf8f3;
}

.image-upload input {
    display: none;
}

.upload-icon {
    font-size: 36px;
    color: #9ca3af;
    margin-bottom: 12px;
}

.upload-text {
    font-size: 14px;
    color: #6b7280;
}

.image-preview {
    margin-top: 16px;
    display: none;
}

.image-preview img {
    max-width: 100%;
    max-height: 300px;
    border-radius: 12px;
    border: 2px solid #10b981;
}

.preview-label {
    font-size: 12px;
    color: #10b981;
    font-weight: 600;
    margin-top: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Checkbox */
.checkbox-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
}

.checkbox-wrapper input[type="checkbox"] {
    width: 20px;
    height: 20px;
    cursor: pointer;
}

.checkbox-wrapper label {
    cursor: pointer;
    margin: 0;
}

/* Action Buttons */
.form-actions {
    display: flex;
    gap: 12px;
    justify-content: flex-end;
    margin-top: 32px;
}

.btn-primary {
    background: linear-gradient(135deg, #8B5E3C 0%, #6d4a2f 100%);
    color: white;
    padding: 14px 32px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(139,94,60,0.3);
}

.btn-secondary {
    background: #f3f4f6;
    color: #374151;
    padding: 14px 32px;
    border-radius: 10px;
    border: none;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

.btn-secondary:hover {
    background: #e5e7eb;
}

@media (max-width: 768px) {
    .create-wrapper {
        padding: 20px;
    }

    .form-container {
        padding: 20px;
    }

    .editor-toolbar {
        gap: 2px;
    }

    .editor-btn {
        padding: 4px 8px;
        font-size: 11px;
    }
}
</style>

<div class="create-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Tulis Artikel Baru</h1>
        <a href="<?= base_url('admin/blog') ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    <!-- Form Container -->
    <div class="form-container">
        <form method="post" action="<?= base_url('admin/blog/store') ?>" enctype="multipart/form-data">
            
            <!-- Section 1: Informasi Artikel -->
            <div class="form-section">
                <h3 class="section-title">Informasi Artikel</h3>
                
                <div class="form-group">
                    <label class="form-label required">Judul Artikel</label>
                    <input type="text" 
                           name="judul" 
                           class="form-control" 
                           placeholder="Masukkan judul artikel yang menarik..."
                           value="<?= set_value('judul') ?>"
                           required>
                    <?= form_error('judul', '<div class="form-text" style="color: #ef4444;">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label class="form-label required">Kategori</label>
                    <select name="kategori_blog" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat ?>" <?= set_select('kategori_blog', $cat) ?>>
                            <?= $cat ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kategori_blog', '<div class="form-text" style="color: #ef4444;">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Gambar Utama</label>
                    <div class="image-upload" onclick="document.getElementById('gambar_utama').click()">
                        <input type="file" 
                               id="gambar_utama" 
                               name="gambar_utama" 
                               accept="image/*"
                               onchange="previewImage(this)">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="upload-text">
                            Klik untuk upload gambar<br>
                            <small>JPG, PNG, GIF (Max 5MB)</small>
                        </div>
                    </div>
                    <div class="image-preview" id="imagePreview">
                        <img id="preview" src="" alt="Preview">
                        <div class="preview-label">
                            <i class="fas fa-check-circle"></i>
                            Preview Gambar
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Konten Artikel -->
            <div class="form-section">
                <h3 class="section-title">Konten Artikel</h3>
                
                <div class="form-group">
                    <label class="form-label required">Konten</label>
                    <div class="editor-toolbar">
                        <button type="button" class="editor-btn" onclick="formatText('bold')">
                            <i class="fas fa-bold"></i> Bold
                        </button>
                        <button type="button" class="editor-btn" onclick="formatText('italic')">
                            <i class="fas fa-italic"></i> Italic
                        </button>
                        <button type="button" class="editor-btn" onclick="insertHeading('h2')">
                            <i class="fas fa-heading"></i> H2
                        </button>
                        <button type="button" class="editor-btn" onclick="insertHeading('h3')">
                            <i class="fas fa-heading"></i> H3
                        </button>
                        <button type="button" class="editor-btn" onclick="insertList()">
                            <i class="fas fa-list-ul"></i> List
                        </button>
                        <button type="button" class="editor-btn" onclick="insertLink()">
                            <i class="fas fa-link"></i> Link
                        </button>
                    </div>
                    <textarea name="konten" 
                              id="konten" 
                              class="form-control" 
                              placeholder="Tulis konten artikel di sini..."
                              required><?= set_value('konten') ?></textarea>
                    <div class="form-text">Gunakan HTML tags untuk formatting (contoh: &lt;h2&gt;, &lt;p&gt;, &lt;strong&gt;)</div>
                    <?= form_error('konten', '<div class="form-text" style="color: #ef4444;">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Ringkasan (Excerpt)</label>
                    <textarea name="excerpt" 
                              class="form-control" 
                              placeholder="Ringkasan singkat artikel (opsional - akan di-generate otomatis jika kosong)"
                              rows="3"><?= set_value('excerpt') ?></textarea>
                    <div class="form-text">Ringkasan yang akan tampil di preview artikel</div>
                </div>
            </div>

            <!-- Section 3: Pengaturan Publikasi -->
            <div class="form-section">
                <h3 class="section-title">Pengaturan Publikasi</h3>
                
                <div class="form-group">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" 
                               id="is_published" 
                               name="is_published" 
                               value="1"
                               <?= set_checkbox('is_published', '1') ?>>
                        <label for="is_published">Publikasikan artikel sekarang</label>
                    </div>
                    <div class="form-text">Jika tidak dicentang, artikel akan disimpan sebagai draft</div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="<?= base_url('admin/blog') ?>" class="btn-secondary">
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Image Preview
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

// HTML Editor Functions
function formatText(command) {
    const textarea = document.getElementById('konten');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const selectedText = textarea.value.substring(start, end);
    
    if (selectedText) {
        let formattedText = '';
        if (command === 'bold') {
            formattedText = '<strong>' + selectedText + '</strong>';
        } else if (command === 'italic') {
            formattedText = '<em>' + selectedText + '</em>';
        }
        
        textarea.value = textarea.value.substring(0, start) + formattedText + textarea.value.substring(end);
        textarea.focus();
    }
}

function insertHeading(level) {
    const textarea = document.getElementById('konten');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const selectedText = textarea.value.substring(start, end) || 'Judul';
    
    const heading = '<' + level + '>' + selectedText + '</' + level + '>\n';
    textarea.value = textarea.value.substring(0, start) + heading + textarea.value.substring(end);
    textarea.focus();
}

function insertList() {
    const textarea = document.getElementById('konten');
    const start = textarea.selectionStart;
    
    const list = '<ul>\n  <li>Item 1</li>\n  <li>Item 2</li>\n  <li>Item 3</li>\n</ul>\n';
    textarea.value = textarea.value.substring(0, start) + list + textarea.value.substring(start);
    textarea.focus();
}

function insertLink() {
    const textarea = document.getElementById('konten');
    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;
    const selectedText = textarea.value.substring(start, end) || 'link text';
    
    const link = '<a href="https://example.com">' + selectedText + '</a>';
    textarea.value = textarea.value.substring(0, start) + link + textarea.value.substring(end);
    textarea.focus();
}
</script>