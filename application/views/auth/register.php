<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #2d5a4a 0%, #1a3a2e 50%, #0f1e19 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 40px 0;
            position: relative;
            overflow: hidden;
        }
        
        /* Decorative circles */
        body::before, body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(139, 103, 71, 0.1);
            z-index: 0;
        }
        
        body::before {
            width: 400px;
            height: 400px;
            top: -150px;
            right: -100px;
        }
        
        body::after {
            width: 350px;
            height: 350px;
            bottom: -120px;
            left: -80px;
        }
        
        .container {
            position: relative;
            z-index: 1;
        }
        
        .register-wrapper {
            display: flex;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0,0,0,0.3);
            max-width: 1100px;
            margin: 0 auto;
        }
        
        .illustration-side {
            flex: 1;
            background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        
        .illustration-side::before {
            content: '';
            position: absolute;
            width: 250px;
            height: 250px;
            background: rgba(139, 103, 71, 0.1);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .furniture-showcase {
            position: relative;
            z-index: 1;
            text-align: center;
        }
        
        .furniture-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .furniture-item {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .furniture-item:hover {
            transform: translateY(-5px);
        }
        
        .furniture-item i {
            font-size: 40px;
            color: #8b6747;
            margin-bottom: 10px;
        }
        
        .furniture-item p {
            margin: 0;
            color: #5a7968;
            font-size: 12px;
            font-weight: 500;
        }
        
        .brand-info {
            position: relative;
            z-index: 1;
        }
        
        .brand-info h2 {
            color: #2d5a4a;
            font-weight: 700;
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .brand-info p {
            color: #5a7968;
            font-size: 16px;
            text-align: center;
            line-height: 1.6;
        }
        
        .form-side {
            flex: 1.2;
            padding: 60px 50px;
            background: white;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }
        
        .form-header h3 {
            color: #2d5a4a;
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 8px;
        }
        
        .form-header p {
            color: #7a8a84;
            font-size: 14px;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            margin-bottom: 20px;
        }
        
        .form-label {
            color: #2d5a4a;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .form-control {
            border: 2px solid #e0e8e5;
            padding: 12px 15px;
            font-size: 14px;
            border-radius: 12px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #2d5a4a;
            box-shadow: 0 0 0 0.2rem rgba(45, 90, 74, 0.1);
        }
        
        .row {
            margin-bottom: 20px;
        }
        
        .btn-register {
            background: linear-gradient(135deg, #2d5a4a 0%, #1a3a2e 100%);
            border: none;
            padding: 14px;
            font-weight: 600;
            font-size: 16px;
            border-radius: 12px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(45, 90, 74, 0.3);
            margin-top: 10px;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 90, 74, 0.4);
            background: linear-gradient(135deg, #1a3a2e 0%, #2d5a4a 100%);
        }
        
        .login-link {
            text-align: center;
            margin-top: 25px;
        }
        
        .login-link p {
            color: #7a8a84;
            font-size: 14px;
        }
        
        .login-link a {
            color: #2d5a4a;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .login-link a:hover {
            color: #1a3a2e;
        }
        
        small.text-danger {
            display: block;
            margin-top: 5px;
            font-size: 12px;
        }
        
        @media (max-width: 992px) {
            .register-wrapper {
                flex-direction: column;
                margin: 20px;
            }
            
            .illustration-side {
                padding: 40px 20px;
            }
            
            .furniture-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
            
            .furniture-item i {
                font-size: 30px;
            }
            
            .brand-info h2 {
                font-size: 24px;
            }
            
            .form-side {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-wrapper">
            <!-- Illustration Side -->
            <div class="illustration-side">
                <div class="furniture-showcase">
                    <div class="furniture-grid">
                        <div class="furniture-item">
                            <i class="fas fa-couch"></i>
                            <p>Sofa Premium</p>
                        </div>
                        <div class="furniture-item">
                            <i class="fas fa-bed"></i>
                            <p>Tempat Tidur</p>
                        </div>
                        <div class="furniture-item">
                            <i class="fas fa-chair"></i>
                            <p>Kursi Mewah</p>
                        </div>
                        <div class="furniture-item">
                            <i class="fas fa-door-open"></i>
                            <p>Lemari Kayu</p>
                        </div>
                    </div>
                    <div class="brand-info">
                        <h2>Jepara Indah Padang</h2>
                        <p>Bergabunglah dengan kami untuk<br>mendapatkan furniture terbaik</p>
                    </div>
                </div>
            </div>
            
            <!-- Form Side -->
            <div class="form-side">
                <div class="form-header">
                    <h3>Buat Akun Baru</h3>
                    <p>Lengkapi data Anda untuk mendaftar</p>
                </div>
                
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= $this->session->flashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?= form_open('auth/register') ?>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" 
                               placeholder="Masukkan nama lengkap" 
                               value="<?= set_value('nama_lengkap') ?>" required>
                        <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>') ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" 
                                   placeholder="contoh@email.com" 
                                   value="<?= set_value('email') ?>" required>
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">No. Telepon <span class="text-muted">(Opsional)</span></label>
                            <input type="text" name="no_telepon" class="form-control" 
                                   placeholder="08xxxxxxxxxx" 
                                   value="<?= set_value('no_telepon') ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" 
                                   placeholder="Minimal 6 karakter" required>
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirm" class="form-control" 
                                   placeholder="Ulangi password" required>
                            <?= form_error('password_confirm', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-register w-100">
                        <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
                    </button>
                <?= form_close() ?>
                
                <div class="login-link">
                    <p class="mb-0">Sudah punya akun? 
                        <a href="<?= base_url('auth/login') ?>">Masuk Sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>