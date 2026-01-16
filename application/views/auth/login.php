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
            left: -100px;
        }
        
        body::after {
            width: 300px;
            height: 300px;
            bottom: -100px;
            right: -80px;
        }
        
        .container {
            position: relative;
            z-index: 1;
        }
        
        .login-wrapper {
            display: flex;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0,0,0,0.3);
            max-width: 1000px;
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
            width: 200px;
            height: 200px;
            background: rgba(139, 103, 71, 0.1);
            border-radius: 50%;
            top: 20px;
            right: 20px;
        }
        
        .furniture-icon {
            font-size: 120px;
            color: #8b6747;
            margin-bottom: 20px;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
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
        }
        
        .decorative-items {
            position: absolute;
            bottom: 30px;
            display: flex;
            gap: 15px;
        }
        
        .decorative-items i {
            font-size: 30px;
            color: rgba(139, 103, 71, 0.3);
        }
        
        .form-side {
            flex: 1;
            padding: 60px 50px;
            background: white;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 40px;
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
        
        .input-group {
            margin-bottom: 10px;
        }
        
        .input-group-text {
            background: #f5f8f7;
            border: 2px solid #e0e8e5;
            border-right: none;
            color: #5a7968;
            border-radius: 12px 0 0 12px;
        }
        
        .form-control {
            border: 2px solid #e0e8e5;
            border-left: none;
            padding: 12px 15px;
            font-size: 14px;
            border-radius: 0 12px 12px 0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #2d5a4a;
            box-shadow: none;
        }
        
        .input-group:focus-within .input-group-text {
            border-color: #2d5a4a;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #2d5a4a 0%, #1a3a2e 100%);
            border: none;
            padding: 14px;
            font-weight: 600;
            font-size: 16px;
            border-radius: 12px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(45, 90, 74, 0.3);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 90, 74, 0.4);
            background: linear-gradient(135deg, #1a3a2e 0%, #2d5a4a 100%);
        }
        
        .register-link {
            text-align: center;
            margin-top: 25px;
        }
        
        .register-link p {
            color: #7a8a84;
            font-size: 14px;
        }
        
        .register-link a {
            color: #2d5a4a;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .register-link a:hover {
            color: #1a3a2e;
        }
        
        small.text-danger {
            display: block;
            margin-top: 5px;
            font-size: 12px;
        }
        
        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
                margin: 20px;
            }
            
            .illustration-side {
                padding: 40px 20px;
            }
            
            .furniture-icon {
                font-size: 80px;
            }
            
            .brand-info h2 {
                font-size: 24px;
            }
            
            .form-side {
                padding: 40px 30px;
            }
            
            .decorative-items {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-wrapper">
            <!-- Illustration Side -->
            <div class="illustration-side">
                <div class="furniture-icon">
                    <i class="fas fa-couch"></i>
                </div>
                <div class="brand-info">
                    <h2>Jepara Indah Padang</h2>
                    <p>Furniture Berkualitas dengan<br>Desain Elegan & Modern</p>
                </div>
                <div class="decorative-items">
                    <i class="fas fa-chair"></i>
                    <i class="fas fa-bed"></i>
                    <i class="fas fa-door-open"></i>
                </div>
            </div>
            
            <!-- Form Side -->
            <div class="form-side">
                <div class="form-header">
                    <h3>Selamat Datang!</h3>
                    <p>Masuk ke akun Anda untuk melanjutkan</p>
                </div>
                
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= $this->session->flashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= $this->session->flashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?= form_open('auth/login') ?>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control" 
                                   placeholder="Masukkan email Anda" 
                                   value="<?= set_value('email') ?>" required>
                        </div>
                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control" 
                                   placeholder="Masukkan password Anda" required>
                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-login w-100">
                        <i class="fas fa-sign-in-alt me-2"></i> Masuk
                    </button>
                <?= form_close() ?>
                
                <div class="register-link">
                    <p class="mb-0">Belum punya akun? 
                        <a href="<?= base_url('auth/register') ?>">Daftar Sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>