<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Transaksi Controller
 * Manages all transaction and payment operations
 * 
 * @package    Jepara Furniture
 * @subpackage Controllers
 * @category   Admin
 * @author     Aurora
 * @version    1.0
 */

class Transaksi extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load models
        $this->load->model('Transaksi_model');
        $this->load->model('Payment_model');
        $this->load->model('User_model');
        
        // Load libraries
        $this->load->library('form_validation');
        $this->load->library('upload');
        
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        // Check if user is admin
        if ($this->session->userdata('role') != 'admin') {
            redirect('home');
        }
    }

    /**
     * Display all transactions with statistics
     */
    public function index() {
        // Get filter parameters
        $status_filter = $this->input->get('status');
        $search = $this->input->get('search');
        
        // Get all transactions
        $data['transactions'] = $this->Transaksi_model->get_all_transactions($status_filter, $search);
        
        // Get statistics
        $data['stats'] = $this->Transaksi_model->get_statistics();
        
        // Get monthly comparison
        $data['monthly_growth'] = $this->Transaksi_model->get_monthly_growth();
        
        // Set title
        $data['title'] = 'Transaksi & Pembayaran - Admin';
        
        // Load view
        $this->render('admin/transaction/index', $data);
    }

    /**
     * Display transaction detail
     */
    public function detail($id) {
        // Get transaction with items
        $data['transaction'] = $this->Transaksi_model->get_transaction_by_id($id);
        
        if (!$data['transaction']) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan');
            redirect('admin/transaksi');
        }
        
        // Set title
        $data['title'] = 'Detail Transaksi - Admin';
        
        // Load view
        $this->render('admin/transaction/detail', $data);
    }

    /**
     * Update transaction status
     */
    public function update_status($id) {
        $new_status = $this->input->post('status_pesanan');
        $catatan_admin = $this->input->post('catatan_admin');
        
        // Validate status
        $valid_statuses = [
            'pending',
            'menunggu_konfirmasi',
            'dikonfirmasi',
            'diproses',
            'dikirim',
            'selesai',
            'dibatalkan'
        ];
        if (!in_array($new_status, $valid_statuses)) {
            $this->session->set_flashdata('error', 'Status tidak valid');
            redirect('admin/transaksi/detail/' . $id);
            return;
        }
        
        // Update transaction
        $update_data = [
            'status_pesanan' => $new_status
        ];
        
        $result = $this->Transaksi_model->update_transaction($id, $update_data);
        
        if ($result) {
            // Add admin note if provided
            if (!empty($catatan_admin)) {
                $this->Transaksi_model->add_admin_note($id, $catatan_admin);
            }
            
            $this->session->set_flashdata('success', 'Status transaksi berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate status transaksi');
        }
        
        redirect('admin/transaksi/detail/' . $id);
    }

    /**
     * Export transactions to CSV
     */
    public function export() {
        // Get filter parameters
        $status_filter = $this->input->get('status');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        
        // Get transactions
        $transactions = $this->Transaksi_model->get_transactions_for_export($status_filter, $start_date, $end_date);
        
        // Export to CSV
        $this->_export_to_csv($transactions);
    }

    /**
     * Private: Export to CSV
     */
    private function _export_to_csv($transactions) {
        // Set headers for download
        $filename = 'Transaksi_' . date('Y-m-d_His') . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        // Create output stream
        $output = fopen('php://output', 'w');
        
        // Add BOM for proper UTF-8 encoding in Excel
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Add headers
        fputcsv($output, [
            'No',
            'Kode Transaksi',
            'Tanggal',
            'Customer',
            'Email',
            'No. Telepon',
            'Total Harga',
            'Status Pesanan',
            'Metode Pembayaran',
            'Alamat Pengiriman'
        ]);
        
        // Add data
        $no = 1;
        foreach ($transactions as $trans) {
            fputcsv($output, [
                $no++,
                $trans->kode_pesanan ?? '-',
                date('d/m/Y H:i', strtotime($trans->created_at)),
                $trans->customer_name ?? '-',
                $trans->customer_email ?? '-',
                $trans->no_telepon_penerima ?? '-',
                'Rp ' . number_format($trans->total_harga, 0, ',', '.'),
                ucfirst(str_replace('_', ' ', $trans->status_pesanan ?? 'pending')),
                $trans->metode_pembayaran ?? '-',
                $trans->alamat_pengiriman ?? '-'
            ]);
        }
        
        fclose($output);
        exit;
    }

    /**
     * Print transaction
     */
    public function print($id) {
        // Get transaction
        $data['transaction'] = $this->Transaksi_model->get_transaction_by_id($id);
        
        if (!$data['transaction']) {
            show_404();
            return;
        }
        
        // Get items
        $data['items'] = $this->Transaksi_model->get_transaction_items($id);
        
        // Load print view (without header/footer)
        $this->load->view('admin/transaction/print', $data);
    }

    /**
     * Delete transaction (admin only)
     */
    public function delete($id) {
        // Get transaction
        $transaction = $this->Transaksi_model->get_transaction_by_id($id);
        
        if (!$transaction) {
            $this->session->set_flashdata('error', 'Transaksi tidak ditemukan');
            redirect('admin/transaksi');
            return;
        }
        
        // Only allow deletion of cancelled transactions
        if ($transaction->status_pesanan != 'dibatalkan') {
            $this->session->set_flashdata('error', 'Hanya transaksi yang dibatalkan yang dapat dihapus');
            redirect('admin/transaksi');
            return;
        }
        
        // Delete transaction (cascade will delete items and payments)
        $result = $this->Transaksi_model->delete_transaction($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Transaksi berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus transaksi');
        }
        
        redirect('admin/transaksi');
    }
}