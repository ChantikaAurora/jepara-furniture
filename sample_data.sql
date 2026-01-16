-- ========================================
-- SAMPLE DATA FOR JEPARA FURNITURE
-- Execute this in phpMyAdmin or MySQL Workbench
-- ========================================

USE db_jepara_furniture;

-- ========================================
-- INSERT CATEGORIES (KATEGORI)
-- ========================================
INSERT INTO kategori (nama_kategori, slug_kategori, deskripsi_kategori, created_at) VALUES
('Kursi', 'kursi', 'Berbagai jenis kursi furniture berkualitas tinggi', NOW()),
('Meja', 'meja', 'Berbagai jenis meja furniture untuk rumah dan kantor', NOW()),
('Lemari', 'lemari', 'Berbagai jenis lemari penyimpanan', NOW()),
('Tempat Tidur', 'tempat-tidur', 'Tempat tidur berkualitas dengan desain elegan', NOW())
ON DUPLICATE KEY UPDATE nama_kategori=VALUES(nama_kategori);

-- ========================================
-- INSERT SAMPLE PRODUCTS (PRODUK)
-- ========================================
INSERT INTO produk (id_kategori, nama_produk, slug, deskripsi, harga, bahan, dimensi, berat, tipe_produk, status, created_at, updated_at) VALUES
(1, 'Kursi Jati Minimalis', 'kursi-jati-minimalis', 
'Kursi minimalis dengan bahan kayu jati berkualitas tinggi. Desain modern yang cocok untuk ruang tamu, ruang keluarga, atau ruang kerja. Finishing natural yang menampilkan keindahan serat kayu jati asli. Konstruksi kokoh dan tahan lama.', 
2500000.00, 'Kayu Jati', '50x50x80 cm', '8 kg', 'jadi', 'active', NOW(), NOW()),

(2, 'Meja Makan Set 6 Kursi', 'meja-makan-set-6-kursi', 
'Set meja makan lengkap untuk 6 orang dengan bahan kayu jati pilihan. Termasuk 1 meja dan 6 kursi dengan desain matching. Finishing natural glossy yang elegan. Cocok untuk ruang makan keluarga. Konstruksi sangat kokoh dan awet puluhan tahun.', 
8500000.00, 'Kayu Jati', '180x90x75 cm', '35 kg', 'jadi', 'active', NOW(), NOW()),

(3, 'Lemari Pakaian 3 Pintu', 'lemari-pakaian-3-pintu', 
'Lemari pakaian dengan 3 pintu sliding dan cermin besar di pintu tengah. Dilengkapi dengan laci-laci penyimpanan, gantungan baju, dan rak sepatu. Interior luas dengan pembagian ruang yang efisien. Bahan kayu mahoni berkualitas dengan finishing melamine anti rayap.', 
6200000.00, 'Kayu Mahoni', '150x60x200 cm', '80 kg', 'jadi', 'active', NOW(), NOW()),

(4, 'Tempat Tidur Minimalis Queen', 'tempat-tidur-minimalis-queen', 
'Tempat tidur ukuran queen (160x200 cm) dengan headboard elegant bermotif ukiran halus. Desain minimalis modern yang cocok untuk berbagai gaya interior. Konstruksi sangat kokoh dengan rangka kayu jati solid. Termasuk sandaran kepala dengan storage tersembunyi.', 
4800000.00, 'Kayu Jati', '160x200x120 cm', '65 kg', 'jadi', 'active', NOW(), NOW()),

(1, 'Kursi Teras Santai', 'kursi-teras-santai', 
'Kursi santai untuk teras atau taman dengan desain ergonomis. Dilengkapi dengan sandaran tangan dan bantal empuk. Bahan kayu jati tahan cuaca dengan finishing outdoor coating. Sempurna untuk bersantai sambil menikmati kopi di pagi hari.', 
1850000.00, 'Kayu Jati', '60x70x90 cm', '12 kg', 'jadi', 'active', NOW(), NOW()),

(2, 'Meja Kerja Minimalis', 'meja-kerja-minimalis', 
'Meja kerja dengan desain minimalis modern. Dilengkapi dengan 2 laci penyimpanan dan cable management. Permukaan luas untuk laptop, monitor, dan perlengkapan kerja. Cocok untuk home office atau ruang kerja. Bahan kayu mahoni dengan finishing HPL anti gores.', 
3200000.00, 'Kayu Mahoni', '120x60x75 cm', '25 kg', 'jadi', 'active', NOW(), NOW());

-- ========================================
-- VERIFY DATA
-- ========================================
SELECT 'Categories inserted:' as info, COUNT(*) as count FROM kategori;
SELECT 'Products inserted:' as info, COUNT(*) as count FROM produk;

-- ========================================
-- SHOW SAMPLE DATA
-- ========================================
SELECT 
    p.id,
    p.nama_produk,
    k.nama_kategori,
    CONCAT('Rp ', FORMAT(p.harga, 0, 'id_ID')) as harga_formatted,
    p.status
FROM produk p
LEFT JOIN kategori k ON k.id = p.id_kategori
ORDER BY p.created_at DESC;
