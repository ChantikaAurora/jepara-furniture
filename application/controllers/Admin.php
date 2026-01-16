<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db
 * @property Produk_model $Produk_model
 * @property Kategori_model $Kategori_model
 * @property User_model $User_model
 * @property CI_Session $session
 * @property CI_Upload $upload
 * @property CI_Input $input
 * @property CI_Form_validation $form_validation
 */
class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('auth');
        $this->load->model('Produk_model');
        $this->load->model('Kategori_model');
        $this->load->model('User_model');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->model('Store_profile_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'upload']);
        
        // Cek login dan role admin
        check_login();
        check_admin();
    }

    private function render($view, $data = [])
    {
        // Page title untuk TOPBAR
        $data['page_title'] = $data['page_title']
            ?? ($data['title'] ?? 'Dashboard');

        // Title untuk <title> HTML
        $data['title'] = $data['title']
            ?? $data['page_title'] . ' - Jepara Furniture';

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar');
        $this->load->view($view, $data);
        $this->load->view('templates/admin_footer');
    }

    
    // ========================================
    // DASHBOARD
    // ========================================
    
    /**
 * Dashboard Admin - dengan data real dari database
 * Tambahkan method ini ke Admin Controller
 */
public function dashboard() {
    // Load required models
    $this->load->model(['Produk_model', 'Transaksi_model', 'Rehap_model', 'Testimonial_model']);
    
    // ========================================
    // STATISTICS DATA
    // ========================================
    
    // Total Produk Aktif
    $total_produk = $this->Produk_model->count_active();
    
    // Produk bulan ini vs bulan lalu
    $produk_this_month = $this->db->where('status', 'active')
        ->where('MONTH(created_at)', date('m'))
        ->where('YEAR(created_at)', date('Y'))
        ->count_all_results('produk');
    
    $produk_last_month = $this->db->where('status', 'active')
        ->where('MONTH(created_at)', date('m', strtotime('-1 month')))
        ->where('YEAR(created_at)', date('Y', strtotime('-1 month')))
        ->count_all_results('produk');
    
    $produk_trend = $produk_this_month - $produk_last_month;
    
    // Total Transaksi Bulan Ini
    $transaksi_bulan_ini = $this->db->where('MONTH(created_at)', date('m'))
        ->where('YEAR(created_at)', date('Y'))
        ->count_all_results('pesanan');
    
    // Transaksi bulan lalu
    $transaksi_last_month = $this->db->where('MONTH(created_at)', date('m', strtotime('-1 month')))
        ->where('YEAR(created_at)', date('Y', strtotime('-1 month')))
        ->count_all_results('pesanan');
    
    $transaksi_trend = $transaksi_bulan_ini - $transaksi_last_month;
    
    // Rehap Pending
    $rehap_pending = $this->db->where_in('status', ['pending', 'menunggu_penawaran'])
        ->count_all_results('rehap');
    
    // Total Customers
    $total_customers = $this->db->where('role', 'customer')
        ->count_all_results('users');
    
    // Customer bulan ini
    $customer_this_month = $this->db->where('role', 'customer')
        ->where('MONTH(created_at)', date('m'))
        ->where('YEAR(created_at)', date('Y'))
        ->count_all_results('users');
    
    $customer_trend = $customer_this_month;
    
    // Compile statistics
    $data['stats'] = [
        'total_produk' => $total_produk,
        'produk_trend' => $produk_trend,
        'transaksi_bulan_ini' => $transaksi_bulan_ini,
        'transaksi_trend' => $transaksi_trend,
        'rehap_pending' => $rehap_pending,
        'total_customers' => $total_customers,
        'customer_trend' => $customer_trend
    ];
    
    // ========================================
    // CHART DATA - 6 Bulan Terakhir
    // ========================================
    
    $chart_labels = [];
    $chart_sales = [];
    $chart_transactions = [];
    
    for ($i = 5; $i >= 0; $i--) {
        $month = date('m', strtotime("-$i month"));
        $year = date('Y', strtotime("-$i month"));
        $label = date('M', strtotime("-$i month"));
        
        $chart_labels[] = $label;
        
        // Total penjualan (sum dari total_harga)
        $this->db->select_sum('total_harga');
        $this->db->where('MONTH(created_at)', $month);
        $this->db->where('YEAR(created_at)', $year);
        $this->db->where_not_in('status_pesanan', ['dibatalkan']);
        $sales_result = $this->db->get('pesanan')->row();
        $chart_sales[] = (int) ($sales_result->total_harga ?? 0);
        
        // Total transaksi (count)
        $this->db->where('MONTH(created_at)', $month);
        $this->db->where('YEAR(created_at)', $year);
        $transactions_count = $this->db->count_all_results('pesanan');
        $chart_transactions[] = $transactions_count;
    }
    
    $data['chart_data'] = [
        'labels' => $chart_labels,
        'sales' => $chart_sales,
        'transactions' => $chart_transactions
    ];
    
    // ========================================
    // RECENT ACTIVITIES - Gabungan dari berbagai tabel
    // ========================================
    
    $recent_activities = [];
    
    // Get Recent Transactions (5 terakhir)
    $this->db->select('pesanan.id, pesanan.kode_pesanan, pesanan.status_pesanan, pesanan.created_at, 
                       users.nama_lengkap, 
                       GROUP_CONCAT(produk.nama_produk SEPARATOR ", ") as products');
    $this->db->from('pesanan');
    $this->db->join('users', 'users.id = pesanan.id_user');
    $this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan = pesanan.id', 'left');
    $this->db->join('produk', 'produk.id = detail_pesanan.id_produk', 'left');
    $this->db->group_by('pesanan.id');
    $this->db->order_by('pesanan.created_at', 'DESC');
    $this->db->limit(3);
    $transactions = $this->db->get()->result();
    
    foreach ($transactions as $trans) {
        $products = $trans->products ? $trans->products : 'N/A';
        // Limit product names to 50 chars
        if (strlen($products) > 50) {
            $products = substr($products, 0, 50) . '...';
        }
        
        $recent_activities[] = (object)[
            'type' => 'transaksi',
            'customer_name' => $trans->nama_lengkap,
            'description' => $products,
            'status' => $trans->status_pesanan,
            'created_at' => $trans->created_at,
            'detail_url' => base_url('admin/transaksi/detail/' . $trans->id)
        ];
    }
    
    // Get Recent Rehap (2 terakhir)
    $this->db->select('rehap.id, rehap.status, rehap.created_at, 
                       users.nama_lengkap,
                       rehap.deskripsi_kerusakan');
    $this->db->from('rehap');
    $this->db->join('users', 'users.id = rehap.id_user');
    $this->db->order_by('rehap.created_at', 'DESC');
    $this->db->limit(2);
    $rehaps = $this->db->get()->result();
    
    foreach ($rehaps as $rehap) {
        $desc = $rehap->deskripsi_kerusakan;
        if (strlen($desc) > 50) {
            $desc = substr($desc, 0, 50) . '...';
        }
        
        $recent_activities[] = (object)[
            'type' => 'rehap',
            'customer_name' => $rehap->nama_lengkap,
            'description' => $desc,
            'status' => $rehap->status,
            'created_at' => $rehap->created_at,
            'detail_url' => base_url('admin/rehap/detail/' . $rehap->id)
        ];
    }
    
    // Get Recent Testimonials (2 terakhir yang pending)
    $this->db->select('testimoni.id, testimoni.status, testimoni.created_at, 
                       users.nama_lengkap,
                       testimoni.judul_testimoni');
    $this->db->from('testimoni');
    $this->db->join('users', 'users.id = testimoni.id_user');
    $this->db->where('testimoni.status', 'pending');
    $this->db->order_by('testimoni.created_at', 'DESC');
    $this->db->limit(2);
    $testimonials = $this->db->get()->result();
    
    foreach ($testimonials as $testi) {
        $recent_activities[] = (object)[
            'type' => 'testimoni',
            'customer_name' => $testi->nama_lengkap,
            'description' => $testi->judul_testimoni,
            'status' => $testi->status,
            'created_at' => $testi->created_at,
            'detail_url' => base_url('admin/testimoni')
        ];
    }
    
    // Sort activities by date (newest first)
    usort($recent_activities, function($a, $b) {
        return strtotime($b->created_at) - strtotime($a->created_at);
    });
    
    // Limit to 7 most recent
    $data['recent_activities'] = array_slice($recent_activities, 0, 7);
    
    // ========================================
    // RENDER VIEW
    // ========================================
    
    $data['title'] = 'Dashboard Admin - Jepara Furniture';
    
    $this->render('admin/dashboard', $data);
}

    // ========================================
    // MANAJEMEN PRODUK (FIXED - MATCH DATABASE STRUCTURE!)
    // ========================================
    
    // List semua produk
    public function produk() {
        $data['title'] = 'Manajemen Produk - Jepara Furniture';
        $data['products'] = $this->Produk_model->get_all();
        
        $this->render('admin/produk/index', [
            'page_title' => 'Manajeman Produk',
            'products' => $this->Produk_model->get_all()
        ]);
    }
    
    // Form tambah produk
    public function produk_create() {
        $data['title'] = 'Tambah Produk - Jepara Furniture';
        $data['kategori'] = $this->Kategori_model->get_all();
        
        $this->render('admin/produk/create', [
            'page_title' => 'Tambah Produk',
            'kategori' => $this->Kategori_model->get_all()
        ]);
    }
    
    // Proses tambah produk (FIXED - DATABASE COLUMN NAMES!)
    public function produk_store() {
        // Validasi form
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/produk/create');
        } else {
            // Prepare data with CORRECT database column names
            $data = array(
                'id_kategori' => $this->input->post('id_kategori'),
                'nama_produk' => $this->input->post('nama_produk'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'bahan' => $this->input->post('bahan'),
                'dimensi' => $this->input->post('dimensi'),
                'berat' => $this->input->post('berat'),
                'tipe_produk' => $this->input->post('tipe_produk') ? $this->input->post('tipe_produk') : 'jadi',
                'status' => $this->input->post('status') ? $this->input->post('status') : 'active'
            );
            
            // Upload images (gambar_1 to gambar_6)
            for($i = 1; $i <= 6; $i++) {
                $field_name = 'gambar_' . $i;
                if(!empty($_FILES[$field_name]['name'])) {
                    $image_name = $this->_upload_image($field_name);
                    if($image_name) {
                        $data[$field_name] = $image_name;
                    }
                }
            }
            
            // Insert to database
            if($this->Produk_model->insert($data)) {
                $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
                redirect('admin/produk');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan produk!');
                redirect('admin/produk/create');
            }
        }
    }
    
    // Form edit produk
    public function produk_edit($id) {
        $data['title'] = 'Edit Produk - Jepara Furniture';
        $data['product'] = $this->Produk_model->get_by_id($id);
        $data['categories'] = $this->Kategori_model->get_all();
        
        if(!$data['product']) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan!');
            redirect('admin/produk');
        }
        
        $this->render('admin/produk/edit', [
            'page_title' => 'Edit Produk',
            'product' => $this->Produk_model->get_by_id($id),
            'categories' => $this->Kategori_model->get_all()
        ]);
    }
    
    // Proses update produk (FIXED - DATABASE COLUMN NAMES!)
    public function produk_update($id) {
        // Validasi form
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/produk/edit/' . $id);
        } else {
            // Prepare data with CORRECT database column names
            $data = array(
                'id_kategori' => $this->input->post('id_kategori'),
                'nama_produk' => $this->input->post('nama_produk'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'bahan' => $this->input->post('bahan'),
                'dimensi' => $this->input->post('dimensi'),
                'berat' => $this->input->post('berat'),
                'tipe_produk' => $this->input->post('tipe_produk') ? $this->input->post('tipe_produk') : 'jadi',
                'status' => $this->input->post('status') ? $this->input->post('status') : 'active'
            );
            
            // Upload images if exists (gambar_1 to gambar_6)
            for($i = 1; $i <= 6; $i++) {
                $field_name = 'gambar_' . $i;
                if(!empty($_FILES[$field_name]['name'])) {
                    // Delete old image
                    $old_product = $this->Produk_model->get_by_id($id);
                    if($old_product && !empty($old_product->$field_name)) {
                        $old_image = FCPATH . 'uploads/products/' . $old_product->$field_name;
                        if(file_exists($old_image)) {
                            unlink($old_image);
                        }
                    }
                    
                    $image_name = $this->_upload_image($field_name);
                    if($image_name) {
                        $data[$field_name] = $image_name;
                    }
                }
            }
            
            // Update database
            if($this->Produk_model->update($id, $data)) {
                $this->session->set_flashdata('success', 'Produk berhasil diupdate!');
                redirect('admin/produk');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate produk!');
                redirect('admin/produk/edit/' . $id);
            }
        }
    }
    
    // Hapus produk
    public function produk_delete($id) {
        if($this->Produk_model->delete($id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk!');
        }
        
        redirect('admin/produk');
    }
    
    // Toggle status produk
    public function produk_toggle($id) {
        if($this->Produk_model->toggle_status($id)) {
            $this->session->set_flashdata('success', 'Status produk berhasil diubah!');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah status produk!');
        }
        
        redirect('admin/produk');
    }
    
    // Upload image helper
    private function _upload_image($field_name) {
        // Create uploads directory if not exists
        $upload_path = FCPATH . 'uploads/products/';
        if(!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
        
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = 'product_' . time() . '_' . rand(1000, 9999);
        
        $this->upload->initialize($config);
        
        if($this->upload->do_upload($field_name)) {
            return $this->upload->data('file_name');
        } else {
            return false;
        }
    }
   
    // ========================================
    // TRANSACTION MANAGEMENT
    // ========================================     
    public function transaksi() {
    // Load models with error handling
    $this->load->model('Transaksi_model');
    
    // Get filter parameters
    $status_filter = $this->input->get('status');
    $payment_status = $this->input->get('payment_status');
    $search = $this->input->get('search');
    
    // Initialize data array with default values
    $data = [
        'title' => 'Transaksi & Pembayaran',
        'transactions' => [],
        'stats' => (object)[
            'total_transaksi' => 0,
            'menunggu_pembayaran' => 0,
            'proses' => 0,
            'total_pendapatan' => 0
        ],
        'monthly_growth' => [
            'growth' => 0,
            'this_month' => 0,
            'last_month' => 0
        ]
    ];
    
    // Try to get transactions
    try {
        $data['transactions'] = $this->Transaksi_model->get_all_transactions($status_filter, $search);
        
        // Apply payment status filter if set
        if ($payment_status) {
            $data['transactions'] = array_filter($data['transactions'], function($t) use ($payment_status) {
                return $t->status_pembayaran == $payment_status;
            });
        }
    } catch (Exception $e) {
        log_message('error', 'Error loading transactions: ' . $e->getMessage());
        $data['transactions'] = [];
    }
    
    // Try to get statistics
    try {
        $stats = $this->Transaksi_model->get_statistics();
        if ($stats) {
            $data['stats'] = $stats;
        }
    } catch (Exception $e) {
        log_message('error', 'Error loading statistics: ' . $e->getMessage());
    }
    
    // Try to get monthly growth
    try {
        $growth = $this->Transaksi_model->get_monthly_growth();
        if ($growth) {
            $data['monthly_growth'] = $growth;
        }
    } catch (Exception $e) {
        log_message('error', 'Error loading monthly growth: ' . $e->getMessage());
    }
    
    // Load view
    $this->render('admin/transaction/index', $data);
}

/**
 * Transaksi Detail - Show transaction details
 */
public function transaksi_detail($id) {
    // Load models
    $this->load->model('Transaksi_model');
    $this->load->model('Payment_model');
    $this->load->model('User_model');
    
    // Initialize data
    $data = [
        'title' => 'Detail Transaksi',
        'transaction' => null,
        'items' => [],
        'payments' => [],
        'customer' => null
    ];
    
    // Try to get transaction
    try {
        $data['transaction'] = $this->Transaksi_model->get_transaction_by_id($id);
        
        if (!$data['transaction']) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan');
            redirect('admin/transaksi');
            return;
        }
        
        // Get transaction items
        $data['items'] = $this->Transaksi_model->get_transaction_items($id);
        
        // Get payments
        $data['payments'] = $this->Payment_model->get_payments_by_transaction($id);
        
        // Get customer info
        $data['customer'] = $this->User_model->get_user_by_id($data['transaction']->id_user);
        
    } catch (Exception $e) {
        log_message('error', 'Error loading transaction detail: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat memuat data transaksi');
        redirect('admin/transaksi');
        return;
    }
    
    // Load view
    $this->render('admin/transaction/detail', $data);
}

/**
 * Update Transaction Status
 */
public function transaksi_update_status($id) {
    $this->load->model('Transaksi_model');
    
    $new_status = $this->input->post('status_pesanan');
    $catatan = $this->input->post('catatan');
    
    // Validate status
    $valid_statuses = ['pending', 'dikonfirmasi', 'diproses', 'dikirim', 'selesai', 'dibatalkan'];
    if (!in_array($new_status, $valid_statuses)) {
        $this->session->set_flashdata('error', 'Status tidak valid');
        redirect('admin/transaksi_detail/' . $id);
        return;
    }
    
    try {
        // Update transaction
        $update_data = [
            'status_pesanan' => $new_status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        if ($catatan) {
            $update_data['catatan'] = $catatan;
        }
        
        $result = $this->Transaksi_model->update_transaction($id, $update_data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Status transaksi berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate status transaksi');
        }
    } catch (Exception $e) {
        log_message('error', 'Error updating transaction status: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengupdate status');
    }
    
    redirect('admin/transaksi_detail/' . $id);
}

/**
 * Verify Payment
 */
public function transaksi_verify_payment($payment_id) {
    $this->load->model('Payment_model');
    $this->load->model('Transaksi_model');
    
    $status = $this->input->post('status');
    $catatan = $this->input->post('catatan_admin');
    
    // Validate
    if (!in_array($status, ['terverifikasi', 'ditolak'])) {
        $this->session->set_flashdata('error', 'Status pembayaran tidak valid');
        redirect('admin/transaksi');
        return;
    }
    
    try {
        // Get payment info
        $payment = $this->Payment_model->get_payment_by_id($payment_id);
        if (!$payment) {
            $this->session->set_flashdata('error', 'Pembayaran tidak ditemukan');
            redirect('admin/transaksi');
            return;
        }
        
        // Update payment status menggunakan method verify_payment yang sudah ada
        $admin_id = $this->session->userdata('user_id');
        $this->Payment_model->verify_payment($payment_id, $admin_id, $status, $catatan);
        
        // If payment is verified, update transaction status to menunggu_konfirmasi
        if ($status == 'terverifikasi') {
            $this->Transaksi_model->update_transaction($payment->id_pesanan, [
                'status_pesanan' => 'menunggu_konfirmasi'
            ]);
        }
        
        $this->session->set_flashdata('success', 'Status pembayaran berhasil diupdate');
        redirect('admin/transaksi_detail/' . $payment->id_pesanan);
        
    } catch (Exception $e) {
        log_message('error', 'Error verifying payment: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat memverifikasi pembayaran');
        redirect('admin/transaksi');
    }
}
/**
 * Private: Update transaction payment status based on payments
 */
private function _update_transaction_payment_status($transaction_id) {
    try {
        $this->load->model('Transaksi_model');
        $this->load->model('Payment_model');
        
        $transaction = $this->Transaksi_model->get_transaction_by_id($transaction_id);
        $payments = $this->Payment_model->get_payments_by_transaction($transaction_id);
        
        // Calculate total verified payments
        $total_paid = 0;
        foreach ($payments as $payment) {
            if ($payment->status_pembayaran == 'terverifikasi') {
                $total_paid += $payment->jumlah_bayar;
            }
        }
        
        // Determine payment status
        $payment_status = 'menunggu';
        if ($total_paid >= $transaction->total_harga) {
            $payment_status = 'lunas';
        } elseif ($total_paid > 0) {
            $payment_status = 'dp';
        }
        
        // Update transaction
        $this->Transaksi_model->update_transaction($transaction_id, [
            'status_pembayaran' => $payment_status
        ]);
        
    } catch (Exception $e) {
        log_message('error', 'Error updating transaction payment status: ' . $e->getMessage());
    }
}

/**
 * Export Transaksi to Excel
 * URL: admin/transaksi/export
 */
public function export() {
    // Check if user is logged in and is admin
    if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
        redirect('auth/login');
        return;
    }
    
    // Load model
    $this->load->model('Transaksi_model');
    
    // Get filters from GET parameters
    $status_filter = $this->input->get('status');
    $search = $this->input->get('search');
    
    // Call export method
    $this->Transaksi_model->export_transactions_to_excel($status_filter, $search);
}
    
    
    
    // ========================================
    // PAYMENT VERIFICATION
    // ========================================
    
    public function payment_list() {
        $this->load->model('Payment_model');
        
        $data['title'] = 'Verifikasi Pembayaran';
        $data['payments'] = $this->Payment_model->get_pending_payments(50);
        
        $this->render('admin/payment/index', [
            'page_title' => 'Verifikasi Pembayaran',
            'payments' => $this->Payment_model->get_pending_payments(50)
        ]);
    }
    
    public function payment_verify($payment_id) {
        $this->load->model('Payment_model');
        $this->load->helper('notification');
        
        $admin_id = $this->session->userdata('user_id');
        $notes = $this->input->post('notes');
        
        if ($this->Payment_model->verify_payment($payment_id, $admin_id, 'terverifikasi', $notes)) {
            // Get payment to notify user
            $payment = $this->Payment_model->get_by_id($payment_id);
            notify_payment_verified($payment->id_pesanan);
            
            $this->session->set_flashdata('success', 'Pembayaran berhasil diverifikasi');
        } else {
            $this->session->set_flashdata('error', 'Gagal memverifikasi pembayaran');
        }
        
        redirect('admin/payment_list');
    }
    
    public function payment_reject($payment_id) {
        $this->load->model('Payment_model');
        
        $admin_id = $this->session->userdata('user_id');
        $notes = $this->input->post('notes');
        
        if ($this->Payment_model->verify_payment($payment_id, $admin_id, 'ditolak', $notes)) {
            $this->session->set_flashdata('success', 'Pembayaran ditolak');
        } else {
            $this->session->set_flashdata('error', 'Gagal menolak pembayaran');
        }
        
        redirect('admin/payment_list');
    }
    
    // ========================================
    // REHAP MANAGEMENT
    // ========================================

    public function rehap() {
        $this->load->model('Rehap_model');
        
        $filters = [];
        if ($this->input->get('status')) {
            $filters['status'] = $this->input->get('status');
        }
        
        $data['title'] = 'Manajemen Rehap';
        $data['requests'] = $this->Rehap_model->get_all($filters, 50);
        
        $this->render('admin/rehap/index', [
            'page_title' => 'Manajemen Rehap',
            'requests' => $this->Rehap_model->get_all($filters, 50)
        ]);
    }

    public function rehap_detail($request_id) {
        $this->load->model('Rehap_model');
        $this->load->model('User_model');
        
        $request = $this->Rehap_model->get_by_id($request_id);
        if (!$request) {
            $this->session->set_flashdata('error', 'Permintaan tidak ditemukan');
            redirect('admin/rehap_list');
        }
        
        // Get customer info
        $customer = $this->User_model->get_by_id($request->id_user);
        
        // Prepare photos array
        $photos = [];
        for ($i = 1; $i <= 6; $i++) {
            $photo_field = 'foto_' . $i;
            if (!empty($request->$photo_field)) {
                $photos[] = $request->$photo_field;
            }
        }
        
        $data['title'] = 'Detail Rehap - ' . $request->kode_rehap;
        $data['request'] = $request;
        $data['customer'] = $customer;
        $data['photos'] = $photos;
        
        $this->render('admin/rehap/detail', [
            'page_title' => 'Detail Rehap',
            'request' => $request,
            'customer' => $customer,
            'photos' => $photos
        ]);
    }

    public function rehap_add_quote($request_id) {
        $this->load->model('Rehap_model');
       
        
        $this->form_validation->set_rules('estimasi_biaya', 'Estimasi Biaya', 'required|numeric');
        $this->form_validation->set_rules('estimasi_waktu', 'Estimasi Waktu', 'required|integer');
        
        if ($this->form_validation->run()) {
            $quoted_price = $this->input->post('estimasi_biaya');
            $estimated_days = $this->input->post('estimasi_waktu');
            $notes = $this->input->post('catatan_admin');
            
            if ($this->Rehap_model->add_quote($request_id, $quoted_price, $estimated_days, $notes)) {
                
                $this->session->set_flashdata('success', 'Penawaran harga berhasil dikirim');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengirim penawaran');
            }
        } else {
            $this->session->set_flashdata('error', validation_errors());
        }
        
        redirect('admin/rehap_detail/' . $request_id);
    }

    public function rehap_update_status($request_id) {
        $this->load->model('Rehap_model');
       
        
        $status = $this->input->post('status');
        $notes = $this->input->post('catatan_admin');
        
        if ($this->Rehap_model->update_status($request_id, $status, $notes)) {
            if ($status == 'selesai') {
               
            }
            $this->session->set_flashdata('success', 'Status rehap berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status');
        }
        
        redirect('admin/rehap_detail/' . $request_id);
    }

    public function rehap_approve_payment($request_id) {
    $this->load->model('Rehap_model');
    $this->load->model('Store_profile_model');
    
    $request = $this->Rehap_model->get_by_id($request_id);
    
    // Debug log
    log_message('debug', '=== START APPROVE PAYMENT ===');
    log_message('debug', 'Request ID: ' . $request_id);
    log_message('debug', 'Current Status: ' . ($request ? $request->status : 'NULL'));
    
    // Validasi request
    if (!$request) {
        log_message('error', 'Request not found: ' . $request_id);
        $this->session->set_flashdata('error', 'Permintaan rehap tidak ditemukan');
        redirect('admin/rehap');
        return;
    }
    
    // Validasi status
    if ($request->status != 'menunggu_review') {
        log_message('error', 'Invalid status: ' . $request->status);
        $this->session->set_flashdata('error', 'Status tidak valid. Harus dalam status "menunggu_review". Status saat ini: ' . $request->status);
        redirect('admin/rehap_detail/' . $request_id);
        return;
    }
    
    // Validasi form
    $this->form_validation->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required|numeric|greater_than[0]');
    $this->form_validation->set_rules('estimasi_waktu', 'Estimasi Waktu', 'required|numeric|greater_than[0]');
    
    if ($this->form_validation->run() == FALSE) {
        log_message('error', 'Validation failed: ' . validation_errors());
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/rehap_detail/' . $request_id);
        return;
    }
    
    // Get bank info from store profile
    $store = $this->Store_profile_model->get_profile();
    
    // Debug store info
    log_message('debug', 'Store Profile: ' . json_encode($store));
    
    // Validasi informasi bank
    if (!$store || empty($store->bank_name) || empty($store->bank_account_number)) {
        log_message('error', 'Bank info incomplete');
        $this->session->set_flashdata('error', 'Informasi bank belum lengkap. Silakan lengkapi di Profil Toko terlebih dahulu.');
        redirect('admin/rehap_detail/' . $request_id);
        return;
    }
    
    $bank_info = [
        'bank_name' => $store->bank_name,
        'bank_account_number' => $store->bank_account_number,
        'bank_account_name' => $store->bank_account_name
    ];
    
    $jumlah_bayar = $this->input->post('jumlah_bayar', TRUE);
    $estimasi_waktu = $this->input->post('estimasi_waktu', TRUE);
    $catatan_admin = $this->input->post('catatan_admin', TRUE);
    
    // Debug input
    log_message('debug', 'Jumlah Bayar: ' . $jumlah_bayar);
    log_message('debug', 'Estimasi Waktu: ' . $estimasi_waktu);
    log_message('debug', 'Catatan: ' . $catatan_admin);
    log_message('debug', 'Bank Info: ' . json_encode($bank_info));
    
    // Execute update
    $result = $this->Rehap_model->approve_and_set_payment($request_id, $jumlah_bayar, $estimasi_waktu, $bank_info, $catatan_admin);
    
    log_message('debug', 'Update Result: ' . ($result ? 'SUCCESS' : 'FAILED'));
    
    if ($result) {
        $this->session->set_flashdata('success', 
            'Penawaran disetujui! Customer sudah dapat melakukan pembayaran sebesar Rp ' . 
            number_format($jumlah_bayar, 0, ',', '.') . 
            ' dan informasi rekening telah dikirim.'
        );
        
        log_message('info', "Payment approved successfully for rehap #{$request_id}");
    } else {
        $this->session->set_flashdata('error', 'Gagal menyetujui penawaran. Silakan coba lagi.');
        log_message('error', "Failed to approve payment for rehap #{$request_id}");
    }
    
    log_message('debug', '=== END APPROVE PAYMENT ===');
    
    redirect('admin/rehap_detail/' . $request_id);
}


public function rehap_update_progress($request_id) {
    $this->load->model('Rehap_model');
    
    $progress = $this->input->post('progress_persen');
    
    log_message('debug', 'Update Progress - Request ID: ' . $request_id . ', Progress: ' . $progress);
    
    if ($progress < 0 || $progress > 100) {
        $this->session->set_flashdata('error', 'Progress harus antara 0-100');
        redirect('admin/rehap_detail/' . $request_id);
        return;
    }
    
    if ($this->Rehap_model->update_progress($request_id, $progress)) {
        $this->session->set_flashdata('success', 'Progress berhasil diupdate menjadi ' . $progress . '%');
        log_message('info', 'Progress updated successfully');
    } else {
        $this->session->set_flashdata('error', 'Gagal mengupdate progress');
        log_message('error', 'Failed to update progress');
    }
    
    redirect('admin/rehap_detail/' . $request_id);
}

public function rehap_verify_payment($request_id) {
    $this->load->model('Rehap_model');
    
    $request = $this->Rehap_model->get_by_id($request_id);
    
    if (!$request || $request->status != 'menunggu_verifikasi_bayar') {
        $this->session->set_flashdata('error', 'Status tidak valid');
        redirect('admin/rehap_detail/' . $request_id);
        return;
    }
    
    $action = $this->input->post('action');
    $notes = $this->input->post('catatan_admin');
    
    log_message('debug', 'Verify Payment - Request ID: ' . $request_id . ', Action: ' . $action);
    
    $is_approved = ($action == 'approve');
    
    if ($this->Rehap_model->verify_payment($request_id, $is_approved, $notes)) {
        if ($is_approved) {
            $this->session->set_flashdata('success', 'Pembayaran diverifikasi. Status diubah menjadi "Sedang Dikerjakan".');
        } else {
            $this->session->set_flashdata('success', 'Pembayaran ditolak. Customer perlu upload ulang bukti pembayaran.');
        }
    } else {
        $this->session->set_flashdata('error', 'Gagal memverifikasi pembayaran');
    }
    
    redirect('admin/rehap_detail/' . $request_id);
}

/**
 * Export to Excel XLSX - Tanpa Library External
 * Menggunakan format XML Excel
 */
public function rehap_export_excel() {
    $this->load->model('Rehap_model');
    
    $filters = [];
    if ($this->input->get('year')) {
        $filters['year'] = $this->input->get('year');
    }
    if ($this->input->get('month')) {
        $filters['month'] = $this->input->get('month');
    }
    
    $data = $this->Rehap_model->get_report_data($filters);
    
    $filename = 'Laporan_Rehap_' . date('YmdHis') . '.xls';
    
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    
    // Start Excel XML
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<?mso-application progid="Excel.Sheet"?>';
    echo '<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
        xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">';
    
    echo '<Styles>
        <Style ss:ID="header">
            <Font ss:Bold="1" ss:Color="#FFFFFF"/>
            <Interior ss:Color="#4472C4" ss:Pattern="Solid"/>
            <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
            <Borders>
                <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>
                <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>
                <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>
                <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>
            </Borders>
        </Style>
        <Style ss:ID="data">
            <Alignment ss:Vertical="Center"/>
            <Borders>
                <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
            </Borders>
        </Style>
        <Style ss:ID="center">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center"/>
            <Borders>
                <Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
                <Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1" ss:Color="#CCCCCC"/>
            </Borders>
        </Style>
    </Styles>';
    
    echo '<Worksheet ss:Name="Laporan Rehap">';
    echo '<Table>';
    
    // Column widths
    echo '<Column ss:Width="40"/>';  // No
    echo '<Column ss:Width="100"/>'; // Kode Rehap
    echo '<Column ss:Width="120"/>'; // Tanggal
    echo '<Column ss:Width="150"/>'; // Customer
    echo '<Column ss:Width="180"/>'; // Email
    echo '<Column ss:Width="100"/>'; // No. Telepon
    echo '<Column ss:Width="150"/>'; // Furniture
    echo '<Column ss:Width="120"/>'; // Estimasi Biaya
    echo '<Column ss:Width="100"/>'; // Estimasi Waktu
    echo '<Column ss:Width="120"/>'; // Jumlah Bayar
    echo '<Column ss:Width="80"/>';  // Progress
    echo '<Column ss:Width="120"/>'; // Status
    echo '<Column ss:Width="100"/>'; // Tanggal Selesai
    
    // Header Row
    echo '<Row ss:Height="25">';
    $headers = ['No', 'Kode Rehap', 'Tanggal', 'Customer', 'Email', 'No. Telepon', 
                'Furniture', 'Estimasi Biaya', 'Estimasi Waktu', 'Jumlah Bayar', 
                'Progress', 'Status', 'Tanggal Selesai'];
    
    foreach ($headers as $header) {
        echo '<Cell ss:StyleID="header"><Data ss:Type="String">' . htmlspecialchars($header) . '</Data></Cell>';
    }
    echo '</Row>';
    
    // Data Rows
    $no = 1;
    foreach ($data as $item) {
        echo '<Row>';
        
        // No (center aligned)
        echo '<Cell ss:StyleID="center"><Data ss:Type="Number">' . $no++ . '</Data></Cell>';
        
        // Kode Rehap
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($item->kode_rehap) . '</Data></Cell>';
        
        // Tanggal
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . date('d/m/Y H:i', strtotime($item->created_at)) . '</Data></Cell>';
        
        // Customer
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($item->nama_lengkap) . '</Data></Cell>';
        
        // Email
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($item->email) . '</Data></Cell>';
        
        // No. Telepon
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($item->no_telepon) . '</Data></Cell>';
        
        // Furniture
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . htmlspecialchars($item->nama_furniture) . '</Data></Cell>';
        
        // Estimasi Biaya
        $est_biaya = $item->estimasi_biaya ? 'Rp ' . number_format($item->estimasi_biaya, 0, ',', '.') : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . $est_biaya . '</Data></Cell>';
        
        // Estimasi Waktu
        $est_waktu = $item->estimasi_waktu ? $item->estimasi_waktu . ' hari' : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . $est_waktu . '</Data></Cell>';
        
        // Jumlah Bayar
        $jml_bayar = $item->jumlah_bayar ? 'Rp ' . number_format($item->jumlah_bayar, 0, ',', '.') : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . $jml_bayar . '</Data></Cell>';
        
        // Progress (center aligned)
        echo '<Cell ss:StyleID="center"><Data ss:Type="String">' . $item->progress_persen . '%</Data></Cell>';
        
        // Status (center aligned)
        echo '<Cell ss:StyleID="center"><Data ss:Type="String">' . ucfirst(str_replace('_', ' ', $item->status)) . '</Data></Cell>';
        
        // Tanggal Selesai
        $tgl_selesai = $item->tanggal_selesai ? date('d/m/Y', strtotime($item->tanggal_selesai)) : '-';
        echo '<Cell ss:StyleID="data"><Data ss:Type="String">' . $tgl_selesai . '</Data></Cell>';
        
        echo '</Row>';
    }
    
    echo '</Table>';
    echo '</Worksheet>';
    echo '</Workbook>';
    exit;
}

/**
 * Export to PDF - Menggunakan TCPDF (Built-in CodeIgniter)
 */
public function rehap_export_pdf() {
    $this->load->model('Rehap_model');
    $this->load->model('Store_profile_model');
    
    $filters = [];
    if ($this->input->get('year')) {
        $filters['year'] = $this->input->get('year');
    }
    if ($this->input->get('month')) {
        $filters['month'] = $this->input->get('month');
    }
    
    // Matikan error reporting untuk mencegah output sebelum PDF
    error_reporting(0);
    ini_set('display_errors', 0);
    
    $data = $this->Rehap_model->get_report_data($filters);
    $stats = $this->Rehap_model->get_statistics($filters);
    $store = $this->Store_profile_model->get_profile();
    
    // Load TCPDF library
    $this->load->library('pdf');
    
    // Create PDF
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    
    // Set document information
    $nama_author = is_array($store) ? (isset($store['nama_toko']) ? $store['nama_toko'] : 'Admin') : (isset($store->nama_toko) ? $store->nama_toko : 'Admin');
    $pdf->SetCreator('Furniture Rehap System');
    $pdf->SetAuthor($nama_author);
    $pdf->SetTitle('Laporan Rehap Furniture');
    $pdf->SetSubject('Laporan Data Rehap');
    
    // Remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    // Set margins
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(true, 10);
    
    // Add page
    $pdf->AddPage();
    
    // Set font
    $pdf->SetFont('helvetica', '', 10);
    
    // Title
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, 'LAPORAN REHAP FURNITURE', 0, 1, 'C');
    
    if ($store) {
        $pdf->SetFont('helvetica', '', 10);
        $nama_toko = is_array($store) ? (isset($store['nama_toko']) ? $store['nama_toko'] : '') : (isset($store->nama_toko) ? $store->nama_toko : '');
        $alamat = is_array($store) ? (isset($store['alamat']) ? $store['alamat'] : '') : (isset($store->alamat) ? $store->alamat : '');
        
        $pdf->Cell(0, 5, $nama_toko, 0, 1, 'C');
        $pdf->Cell(0, 5, $alamat, 0, 1, 'C');
    }
    
    $pdf->Ln(3);
    
    // Filter info
    if (!empty($filters)) {
        $pdf->SetFont('helvetica', '', 9);
        $filter_text = 'Periode: ';
        if (isset($filters['month'])) {
            $months = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                      'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $filter_text .= $months[$filters['month']] . ' ';
        }
        if (isset($filters['year'])) {
            $filter_text .= $filters['year'];
        }
        $pdf->Cell(0, 5, $filter_text, 0, 1, 'L');
    }
    
    $pdf->Ln(2);
    
    // Statistics
    if ($stats) {
        $pdf->SetFont('helvetica', 'B', 9);
        
        // Cek apakah $stats adalah array atau object
        if (is_array($stats)) {
            $total = isset($stats['total_request']) ? $stats['total_request'] : 0;
            $selesai = isset($stats['selesai']) ? $stats['selesai'] : 0;
            $proses = isset($stats['proses']) ? $stats['proses'] : 0;
            $pending = isset($stats['pending']) ? $stats['pending'] : 0;
        } else {
            $total = isset($stats->total_request) ? $stats->total_request : 0;
            $selesai = isset($stats->selesai) ? $stats->selesai : 0;
            $proses = isset($stats->proses) ? $stats->proses : 0;
            $pending = isset($stats->pending) ? $stats->pending : 0;
        }
        
        $pdf->Cell(60, 6, 'Total Request: ' . $total, 1, 0, 'L');
        $pdf->Cell(60, 6, 'Selesai: ' . $selesai, 1, 0, 'L');
        $pdf->Cell(60, 6, 'Proses: ' . $proses, 1, 0, 'L');
        $pdf->Cell(60, 6, 'Pending: ' . $pending, 1, 1, 'L');
    }
    
    $pdf->Ln(3);
    
    // Table Header
    $pdf->SetFont('helvetica', 'B', 8);
    $pdf->SetFillColor(68, 114, 196);
    $pdf->SetTextColor(255, 255, 255);
    
    $pdf->Cell(10, 7, 'No', 1, 0, 'C', true);
    $pdf->Cell(25, 7, 'Kode Rehap', 1, 0, 'C', true);
    $pdf->Cell(30, 7, 'Tanggal', 1, 0, 'C', true);
    $pdf->Cell(35, 7, 'Customer', 1, 0, 'C', true);
    $pdf->Cell(35, 7, 'Furniture', 1, 0, 'C', true);
    $pdf->Cell(30, 7, 'Est. Biaya', 1, 0, 'C', true);
    $pdf->Cell(20, 7, 'Waktu', 1, 0, 'C', true);
    $pdf->Cell(30, 7, 'Bayar', 1, 0, 'C', true);
    $pdf->Cell(20, 7, 'Progress', 1, 0, 'C', true);
    $pdf->Cell(25, 7, 'Status', 1, 1, 'C', true);
    
    // Table Data
    $pdf->SetFont('helvetica', '', 7);
    $pdf->SetTextColor(0, 0, 0);
    
    $no = 1;
    foreach ($data as $item) {
        $pdf->Cell(10, 6, $no++, 1, 0, 'C');
        $pdf->Cell(25, 6, $item->kode_rehap, 1, 0, 'L');
        $pdf->Cell(30, 6, date('d/m/Y H:i', strtotime($item->created_at)), 1, 0, 'L');
        $pdf->Cell(35, 6, substr($item->nama_lengkap, 0, 20), 1, 0, 'L');
        $pdf->Cell(35, 6, substr($item->nama_furniture, 0, 20), 1, 0, 'L');
        
        $est_biaya = $item->estimasi_biaya ? 'Rp ' . number_format($item->estimasi_biaya, 0, ',', '.') : '-';
        $pdf->Cell(30, 6, $est_biaya, 1, 0, 'R');
        
        $est_waktu = $item->estimasi_waktu ? $item->estimasi_waktu . ' hr' : '-';
        $pdf->Cell(20, 6, $est_waktu, 1, 0, 'C');
        
        $jml_bayar = $item->jumlah_bayar ? 'Rp ' . number_format($item->jumlah_bayar, 0, ',', '.') : '-';
        $pdf->Cell(30, 6, $jml_bayar, 1, 0, 'R');
        
        $pdf->Cell(20, 6, $item->progress_persen . '%', 1, 0, 'C');
        $pdf->Cell(25, 6, ucfirst(str_replace('_', ' ', $item->status)), 1, 1, 'C');
    }
    
    // Output PDF
    $filename = 'Laporan_Rehap_' . date('YmdHis') . '.pdf';
    $pdf->Output($filename, 'D');
    exit;
}

    
   
    // ========================================
    // BLOG MANAGEMENT
    // ========================================
    
    public function blog() {
        // Load Blog model
        $this->load->model('Blog_model');
        
        // Get search parameter
        $search = $this->input->get('search');
        
        // Initialize data with default values (DEFENSIVE PROGRAMMING)
        $data = [
            'title' => 'Blog Management',
            'posts' => [],
            'stats' => (object)[
                'total_posts' => 0,
                'published_posts' => 0,
                'draft_posts' => 0,
                'total_views' => 0,
                'total_views_formatted' => '0'
            ]
        ];
        
        try {
            // Get all posts
            $posts = $this->Blog_model->get_all($search);
            if ($posts) {
                $data['posts'] = $posts;
            }
            
            // Get statistics
            $stats = $this->Blog_model->get_statistics();
            if ($stats) {
                $data['stats'] = $stats;
            }
            
        } catch (Exception $e) {
            log_message('error', 'Error loading blog posts: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat memuat data blog');
        }
        
        // Load view using your existing render method
        $this->render('admin/blog/index', $data);
    }

/**
 * Blog Create - Show create form
 */
public function blog_create() {
    $data = [
        'title' => 'Tulis Artikel Baru',
        'categories' => [
            'Tips & Trik',
            'Perawatan Furniture',
            'Desain Interior',
            'Produk Terbaru',
            'Berita'
        ]
    ];
    
    $this->render('admin/blog/create', $data);
}

/**
 * Blog Store - Save new blog post
 */
public function blog_store() {
    $this->load->model('Blog_model');
    
    // Set validation rules
    $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
    $this->form_validation->set_rules('kategori_blog', 'Kategori', 'required');
    $this->form_validation->set_rules('konten', 'Konten', 'required');
    
    if ($this->form_validation->run() == FALSE) {
        $this->blog_create();
        return;
    }
    
    try {
        // Generate slug from title
        $slug = $this->_generate_blog_slug($this->input->post('judul'));
        
        // Handle image upload
        $image_name = null;
        if (!empty($_FILES['gambar_utama']['name'])) {
            $image_name = $this->_upload_blog_image('gambar_utama');
            if (!$image_name) {
                $this->session->set_flashdata('error', 'Gagal mengupload gambar');
                redirect('admin/blog_create');
                return;
            }
        }
        
        // Auto-generate excerpt if empty
        $excerpt = $this->input->post('excerpt');
        if (empty($excerpt)) {
            $excerpt = $this->_generate_excerpt($this->input->post('konten'));
        }
        
        // Prepare data
        $post_data = [
            'judul' => $this->input->post('judul'),
            'slug' => $slug,
            'konten' => $this->input->post('konten'),
            'excerpt' => $excerpt,
            'kategori_blog' => $this->input->post('kategori_blog'),
            'gambar_utama' => $image_name,
            'id_author' => $this->session->userdata('user_id'),
            'is_published' => $this->input->post('is_published') ? 1 : 0,
            'published_at' => $this->input->post('is_published') ? date('Y-m-d H:i:s') : null
        ];
        
        // Save to database
        $result = $this->Blog_model->insert($post_data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Artikel berhasil disimpan');
            redirect('admin/blog');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan artikel');
            redirect('admin/blog_create');
        }
        
    } catch (Exception $e) {
        log_message('error', 'Error creating blog post: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan artikel');
        redirect('admin/blog_create');
    }
}

/**
 * Blog Edit - Show edit form
 */
public function blog_edit($id) {
    $this->load->model('Blog_model');
    
    try {
        $post = $this->Blog_model->get_by_id($id);
        
        if (!$post) {
            $this->session->set_flashdata('error', 'Artikel tidak ditemukan');
            redirect('admin/blog');
            return;
        }
        
        $data = [
            'title' => 'Edit Artikel',
            'post' => $post,
            'categories' => [
                'Tips & Trik',
                'Perawatan Furniture',
                'Desain Interior',
                'Produk Terbaru',
                'Berita'
            ]
        ];
        
        $this->render('admin/blog/edit', $data);
        
    } catch (Exception $e) {
        log_message('error', 'Error loading blog post: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat memuat artikel');
        redirect('admin/blog');
    }
}

/**
 * Blog Update - Update blog post
 */
public function blog_update($id) {
    $this->load->model('Blog_model');
    
    // Set validation rules
    $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
    $this->form_validation->set_rules('kategori_blog', 'Kategori', 'required');
    $this->form_validation->set_rules('konten', 'Konten', 'required');
    
    if ($this->form_validation->run() == FALSE) {
        $this->blog_edit($id);
        return;
    }
    
    try {
        // Get existing post
        $existing_post = $this->Blog_model->get_by_id($id);
        if (!$existing_post) {
            $this->session->set_flashdata('error', 'Artikel tidak ditemukan');
            redirect('admin/blog');
            return;
        }
        
        // Generate slug from title
        $slug = $this->_generate_blog_slug($this->input->post('judul'), $id);
        
        // Handle image upload
        $image_name = $existing_post->gambar_utama;
        if (!empty($_FILES['gambar_utama']['name'])) {
            $new_image = $this->_upload_blog_image('gambar_utama');
            if ($new_image) {
                // Delete old image
                if ($image_name && file_exists('./uploads/blog/' . $image_name)) {
                    unlink('./uploads/blog/' . $image_name);
                }
                $image_name = $new_image;
            }
        }
        
        // Auto-generate excerpt if empty
        $excerpt = $this->input->post('excerpt');
        if (empty($excerpt)) {
            $excerpt = $this->_generate_excerpt($this->input->post('konten'));
        }
        
        // Prepare update data
        $post_data = [
            'judul' => $this->input->post('judul'),
            'slug' => $slug,
            'konten' => $this->input->post('konten'),
            'excerpt' => $excerpt,
            'kategori_blog' => $this->input->post('kategori_blog'),
            'gambar_utama' => $image_name,
            'is_published' => $this->input->post('is_published') ? 1 : 0
        ];
        
        // Update published_at if changing from draft to published
        if ($this->input->post('is_published') && !$existing_post->is_published) {
            $post_data['published_at'] = date('Y-m-d H:i:s');
        }
        
        // Update database
        $result = $this->Blog_model->update($id, $post_data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Artikel berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate artikel');
        }
        
        redirect('admin/blog');
        
    } catch (Exception $e) {
        log_message('error', 'Error updating blog post: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengupdate artikel');
        redirect('admin/blog_edit/' . $id);
    }
}

/**
 * Blog Toggle Publish - Toggle publish status
 */
public function blog_toggle_publish($id) {
    $this->load->model('Blog_model');
    
    try {
        $post = $this->Blog_model->get_by_id($id);
        
        if (!$post) {
            $this->session->set_flashdata('error', 'Artikel tidak ditemukan');
            redirect('admin/blog');
            return;
        }
        
        // Toggle status
        $new_status = $post->is_published ? 0 : 1;
        $update_data = [
            'is_published' => $new_status
        ];
        
        // Set published_at if publishing
        if ($new_status == 1 && !$post->published_at) {
            $update_data['published_at'] = date('Y-m-d H:i:s');
        }
        
        $result = $this->Blog_model->update($id, $update_data);
        
        if ($result) {
            $status_text = $new_status ? 'dipublikasikan' : 'dijadikan draft';
            $this->session->set_flashdata('success', 'Artikel berhasil ' . $status_text);
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah status artikel');
        }
        
    } catch (Exception $e) {
        log_message('error', 'Error toggling publish status: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengubah status');
    }
    
    redirect('admin/blog');
}

/**
 * Blog Delete - Delete blog post
 */
public function blog_delete($id) {
    $this->load->model('Blog_model');
    
    try {
        $post = $this->Blog_model->get_by_id($id);
        
        if (!$post) {
            $this->session->set_flashdata('error', 'Artikel tidak ditemukan');
            redirect('admin/blog');
            return;
        }
        
        // Delete image file
        if ($post->gambar_utama && file_exists('./uploads/blog/' . $post->gambar_utama)) {
            unlink('./uploads/blog/' . $post->gambar_utama);
        }
        
        // Delete from database
        $result = $this->Blog_model->delete($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Artikel berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus artikel');
        }
        
    } catch (Exception $e) {
        log_message('error', 'Error deleting blog post: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus artikel');
    }
    
    redirect('admin/blog');
}

/**
 * Private: Generate URL-friendly slug
 */
private function _generate_blog_slug($title, $exclude_id = null) {
    $this->load->model('Blog_model');
    
    // Convert to lowercase and replace spaces with hyphens
    $slug = strtolower(trim($title));
    $slug = preg_replace('/[^a-z0-9-]/', '-', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    $slug = trim($slug, '-');
    
    // Check if slug exists
    $original_slug = $slug;
    $counter = 1;
    
    while ($this->Blog_model->slug_exists($slug, $exclude_id)) {
        $slug = $original_slug . '-' . $counter;
        $counter++;
    }
    
    return $slug;
}

/**
 * Private: Upload blog image
 */
private function _upload_blog_image($field_name) {
    $config['upload_path'] = './uploads/blog/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['max_size'] = 5120; // 5MB
    $config['file_name'] = 'blog_' . time() . '_' . rand(1000, 9999);
    
    // Create directory if not exists
    if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0755, true);
    }
    
    $this->upload->initialize($config);
    
    if ($this->upload->do_upload($field_name)) {
        return $this->upload->data('file_name');
    }
    
    return false;
}

/**
 * Private: Generate excerpt from content
 */
private function _generate_excerpt($content, $length = 150) {
    // Strip HTML tags
    $text = strip_tags($content);
    
    // Limit length
    if (strlen($text) > $length) {
        $text = substr($text, 0, $length);
        $text = substr($text, 0, strrpos($text, ' ')) . '...';
    }
    
    return $text;
}
   
    // ========================================
    // TESTIMONIAL MODERATION
    // ========================================
    
    public function testimonial_list() {
        $this->load->model('Testimonial_model');
        
        $filters = [];
        if ($this->input->get('status')) {
            $filters['status'] = $this->input->get('status');
        }
        
        $data['title'] = 'Moderasi Testimoni';
        $data['testimonials'] = $this->Testimonial_model->get_all($filters, 50);
        
        $this->render('admin/testimonial/index', [
            'page_title' => 'Moderasi Testimoni',
            'testimonials' => $this->Testimonial_model->get_all($filters, 50)
        ]);
    }
    
    public function testimonial_approve($testimonial_id) {
        $this->load->model('Testimonial_model');
        
        $admin_id = $this->session->userdata('user_id');
        
        if ($this->Testimonial_model->approve($testimonial_id, $admin_id)) {
            $this->session->set_flashdata('success', 'Testimoni berhasil disetujui');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyetujui testimoni');
        }
        
        redirect('admin/testimonial_list');
    }
    
    public function testimonial_reject($testimonial_id) {
        $this->load->model('Testimonial_model');
        
        $admin_id = $this->session->userdata('user_id');
        
        if ($this->Testimonial_model->reject($testimonial_id, $admin_id)) {
            $this->session->set_flashdata('success', 'Testimoni ditolak');
        } else {
            $this->session->set_flashdata('error', 'Gagal menolak testimoni');
        }
        
        redirect('admin/testimonial_list');
    }
    
    public function testimonial_delete($testimonial_id) {
        $this->load->model('Testimonial_model');
        
        if ($this->Testimonial_model->delete($testimonial_id)) {
            $this->session->set_flashdata('success', 'Testimoni berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus testimoni');
        }
        
        redirect('admin/testimonial_list');
    }
    
    // ========================================
    // USER MANAGEMENT
    // ========================================
    
    public function user_list() {
        $data['title'] = 'Manajemen Pengguna';
        $data['users'] = $this->User_model->get_all();
        
        $this->render('admin/user/index', [
            'page_title' => 'Manajemen Pengguna',
            'users' => $this->User_model->get_all()
        ]);
    }
    
    public function user_detail($user_id) {
        $this->load->model('Order_model');
        
        $user = $this->User_model->get_by_id($user_id);
        if (!$user) {
            $this->session->set_flashdata('error', 'Pengguna tidak ditemukan');
            redirect('admin/user_list');
        }
        
        $this->render('admin/user/detail', [
            'page_title' => 'Detail Pengguna',
            'user' => $user,
            'orders' => $this->Order_model->get_by_user($user_id, 10)
        ]);
    }
    
    public function user_toggle_status($user_id) {
        $user = $this->User_model->get_by_id($user_id);
        
        if ($user) {
            $new_status = $user->is_active == 1 ? 0 : 1;
            
            if ($this->User_model->update($user_id, ['is_active' => $new_status])) {
                $this->session->set_flashdata('success', 'Status pengguna berhasil diubah');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah status pengguna');
            }
        }
        
        redirect('admin/user_list');
    }
    
    public function user_delete($user_id) {
        // Don't allow deleting own account
        if ($user_id == $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Tidak dapat menghapus akun sendiri');
            redirect('admin/user_list');
        }
        
        if ($this->User_model->delete($user_id)) {
            $this->session->set_flashdata('success', 'Pengguna berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus pengguna');
        }
        
        redirect('admin/user_list');
    }
    
    
    // ========================================
    // REPORTS
    // ========================================
    
    public function report_sales() {
        $this->load->model('Report_model');
        
        $start_date = $this->input->get('start_date') ?: date('Y-m-01');
        $end_date = $this->input->get('end_date') ?: date('Y-m-d');
        
        $data['title'] = 'Laporan Penjualan';
        $data['sales_summary'] = $this->Report_model->sales_summary($start_date, $end_date);
        $data['sales_by_category'] = $this->Report_model->sales_by_category($start_date, $end_date);
        
        $this->render('admin/report/sales', [
            'page_title' => 'Laporan Penjualan',
            'sales_summary' => $this->Report_model->sales_summary($start_date, $end_date),
            'sales_by_category' => $this->Report_model->sales_by_category($start_date, $end_date)
        ]);
    }
    
    public function report_products() {
        $this->load->model('Report_model');
        
        $start_date = $this->input->get('start_date') ?: date('Y-m-01');
        $end_date = $this->input->get('end_date') ?: date('Y-m-d');
        
        $data['title'] = 'Laporan Produk';
        $data['product_sales'] = $this->Report_model->product_sales($start_date, $end_date, 20);
        $data['inventory'] = $this->Report_model->inventory_status();
        
        $this->render('admin/report/products', [
            'page_title' => 'Laporan Produk',
            'product_sales' => $this->Report_model->product_sales($start_date, $end_date, 20),
            'inventory' => $this->Report_model->inventory_status()
        ]);
    }
    
    public function report_customers() {
        $this->load->model('Report_model');
        
        $data['title'] = 'Laporan Pelanggan';
        $data['customer_stats'] = $this->Report_model->get_customer_stats();
        $data['top_customers'] = $this->Report_model->get_top_customers(10);
        $data['recent_customers'] = $this->Report_model->get_recent_customers(10);
        $data['monthly_stats'] = $this->Report_model->get_monthly_customer_stats(6);
        
        $this->render('admin/report/customers', [
            'page_title' => 'Laporan Pelanggan',
            'customer_stats' => $this->Report_model->get_customer_stats(),
            'top_customers' => $this->Report_model->get_top_customers(10),
            'recent_customers' => $this->Report_model->get_recent_customers(10),
            'monthly_stats' => $this->Report_model->get_monthly_customer_stats(6)
        ]);
    }
    
    /**
     * Admin account settings
     */
    public function account() {
        $user_id = $this->session->userdata('user_id');
        $this->load->model('User_model');
        
        $this->render('admin/account/index', [
            'page_title' => 'Pengaturan Akun',
            'user' => $this->User_model->get_by_id($user_id)
        ]);
    }
    
    /**
     * Update admin account
     */
    public function account_update() {
        $user_id = $this->session->userdata('user_id');
        $this->load->model('User_model');
        
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->account();
            return;
        }
        
        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
            'email' => $this->input->post('email', TRUE),
            'no_telepon' => $this->input->post('no_telepon', TRUE)
        ];
        
        if ($this->User_model->update($user_id, $data)) {
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil');
        }
        
        redirect('admin/akun');
    }
    
    /**
     * Change admin password
     */
    public function account_change_password() {
        $user_id = $this->session->userdata('user_id');
        $this->load->model('User_model');
        
        $this->form_validation->set_rules('current_password', 'Password Saat Ini', 'required');
        $this->form_validation->set_rules('new_password', 'Password Baru', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[new_password]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->account();
            return;
        }
        
        $user = $this->User_model->get_by_id($user_id);
        
        if (!password_verify($this->input->post('current_password'), $user->password)) {
            $this->session->set_flashdata('error', 'Password saat ini salah');
            redirect('admin/akun');
            return;
        }
        
        $new_password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
        
        if ($this->User_model->update($user_id, ['password' => $new_password])) {
            $this->session->set_flashdata('success', 'Password berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah password');
        }
        
        redirect('admin/akun');
    }

    /**
 * Show Store Profile Edit Page
 */
public function profil_toko() {
    $data['store'] = $this->Store_profile_model->get_profile();
    $data['page_title'] = 'Profil Toko';
    $data['active_menu'] = 'profil_toko';
    
    $this->render('admin/store_profile/edit', $data);
}

/**
 * Update Store Profile 
 */
public function profil_toko_update() {
    // Validation rules
    $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
    $this->form_validation->set_rules('whatsapp', 'WhatsApp', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    
    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        redirect('admin/profil-toko');
        return;
    }
    
    // Get current profile
    $current_profile = $this->Store_profile_model->get_profile();
    
    // Clean WhatsApp number
    $whatsapp_raw = $this->input->post('whatsapp');
    $whatsapp_clean = preg_replace('/[^0-9]/', '', $whatsapp_raw);
    if (substr($whatsapp_clean, 0, 1) === '0') {
        $whatsapp_clean = '62' . substr($whatsapp_clean, 1);
    }
    if (substr($whatsapp_clean, 0, 2) !== '62') {
        $whatsapp_clean = '62' . $whatsapp_clean;
    }
    
    // Prepare data
    $update_data = [
        'nama_toko' => $this->input->post('nama_toko'),
        'deskripsi_toko' => $this->input->post('deskripsi_toko'),
        'email' => $this->input->post('email'),
        'whatsapp' => $whatsapp_clean,
        'no_telepon' => $this->input->post('no_telepon'),
        'alamat' => $this->input->post('alamat'),
        'instagram' => str_replace('@', '', $this->input->post('instagram')),
        'facebook' => $this->input->post('facebook'),
        'tiktok' => str_replace('@', '', $this->input->post('tiktok')),
        'jam_senin_jumat' => $this->input->post('jam_senin_jumat'),
        'jam_sabtu' => $this->input->post('jam_sabtu'),
        'jam_minggu' => $this->input->post('jam_minggu'),
        'bank_name' => $this->input->post('bank_name'),
        'bank_account_number' => $this->input->post('bank_account_number'),
        'bank_account_name' => $this->input->post('bank_account_name'),
        'google_maps' => $this->input->post('google_maps')
    ];
    
    if (!empty($_FILES['foto_toko']['name'])) {
        $photo_upload = $this->_upload_store_file('foto_toko', 'photo');
        
        if ($photo_upload['status']) {
            // Delete old photo if exists
            if (!empty($current_profile->foto_toko)) {
                $this->Store_profile_model->delete_old_file($current_profile->foto_toko, 'photo');
            }
            $update_data['foto_toko'] = $photo_upload['file_name'];
        } else {
            $this->session->set_flashdata('error', 'Upload foto gagal: ' . $photo_upload['message']);
            redirect('admin/profil-toko');
            return;
        }
    }
    
    // Update profile
    $updated = $this->Store_profile_model->update_profile($update_data);
    
    if ($updated) {
        $this->session->set_flashdata('success', 'Profil toko berhasil diperbarui!');
    } else {
        $this->session->set_flashdata('error', 'Gagal memperbarui profil toko. Silakan coba lagi.');
    }
    
    redirect('admin/profil-toko');
}

/**
 * Private method to handle store file upload
 */
private function _upload_store_file($field_name, $type = 'logo') {
    // Create upload directory if not exists
    $upload_path = FCPATH . 'uploads/store/';
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, true);
    }
    
    // Set upload configuration based on type
    if ($type == 'logo') {
        $config['max_size'] = 2048; // 2MB
        $allowed_types = 'jpg|jpeg|png|gif';
    } else {
        $config['max_size'] = 5120; // 5MB
        $allowed_types = 'jpg|jpeg|png';
    }
    
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = $allowed_types;
    $config['file_name'] = $type . '_' . time() . '_' . rand(1000, 9999);
    $config['encrypt_name'] = FALSE;
    
    $this->upload->initialize($config);
    
    if ($this->upload->do_upload($field_name)) {
        $upload_data = $this->upload->data();
        return [
            'status' => true,
            'file_name' => $upload_data['file_name'],
            'message' => 'Upload berhasil'
        ];
    } else {
        return [
            'status' => false,
            'message' => $this->upload->display_errors('', '')
        ];
    }
}

    

    

}

