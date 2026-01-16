<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ========================================
// AUTH ROUTES
// ========================================
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// ========================================
// DASHBOARD ROUTES
// ========================================
$route['dashboard'] = 'dashboard/index';
$route['customer/dashboard'] = 'dashboard/index';
$route['admin'] = 'admin/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';

// ========================================
// CART & CHECKOUT ROUTES
// ========================================
$route['cart'] = 'cart/index';
$route['cart/add/(:num)'] = 'cart/add/$1';
$route['cart/update'] = 'cart/update';
$route['cart/remove/(:num)'] = 'cart/remove/$1';
$route['cart/clear'] = 'cart/clear';

$route['cart/checkout'] = 'checkout/index';
$route['checkout'] = 'checkout/index';
$route['checkout/process'] = 'checkout/process';
$route['checkout/success/(:num)'] = 'checkout/success/$1';
$route['checkout/invoice/(:num)'] = 'checkout/invoice/$1';

$route['payment/upload/(:num)'] = 'payment/upload/$1';
$route['payment/upload_proof/(:num)'] = 'payment/upload/$1';
$route['payment/process_upload/(:num)'] = 'payment/process_upload/$1';
$route['payment/index/(:num)'] = 'payment/index/$1';
$route['payment/(:num)'] = 'payment/index/$1';

// ========================================
// PROFILE & ORDER ROUTES
// ========================================
$route['profile'] = 'profile/index';
$route['profile/edit'] = 'profile/edit';
$route['profile/update'] = 'profile/update';
$route['profile/password'] = 'profile/change_password';
$route['profile/orders'] = 'profile/orders';
$route['profile/order/(:num)'] = 'profile/order_detail/$1';
$route['profile/order_detail/(:num)'] = 'profile/order_detail/$1';

// ========================================
// BLOG ROUTES - PUBLIC
// ========================================
$route['blog'] = 'blogpublic/index';
$route['blog/search'] = 'blogpublic/search';
$route['blog/detail/(:any)'] = 'blogpublic/detail/$1';
$route['blog/(:any)'] = 'blogpublic/detail/$1';

// ========================================
// TESTIMONIAL ROUTES - PUBLIC
// ========================================
$route['testimonial'] = 'testimonial/index';
$route['testimonial/my_testimonials'] = 'testimonial/my_testimonials';
$route['testimonial/create/(:num)'] = 'testimonial/create/$1';
$route['testimonial/delete/(:num)'] = 'testimonial/delete/$1';

// ========================================
// ADMIN ROUTES - Dashboard & Products
// ========================================
$route['admin'] = 'admin/dashboard';
$route['admin/dashboard'] = 'admin/dashboard';

$route['admin/produk'] = 'admin/produk';
$route['admin/produk/create'] = 'admin/produk_create';
$route['admin/produk/tambah'] = 'admin/produk_create';
$route['admin/produk/store'] = 'admin/produk_store';
$route['admin/produk/edit/(:num)'] = 'admin/produk_edit/$1';
$route['admin/produk/update/(:num)'] = 'admin/produk_update/$1';
$route['admin/produk/delete/(:num)'] = 'admin/produk_delete/$1';
$route['admin/produk/toggle/(:num)'] = 'admin/produk_toggle/$1';
$route['admin/produk/hapus/(:num)'] = 'admin/produk_delete/$1';
$route['admin/produk/toggle-status/(:num)'] = 'admin/produk_toggle_status/$1';

// ========================================
// Admin Routes - Blog Management
// ========================================
$route['admin/blog'] = 'admin/blog';
$route['admin/blog/create'] = 'admin/blog_create';
$route['admin/blog/store'] = 'admin/blog_store';
$route['admin/blog/edit/(:num)'] = 'admin/blog_edit/$1';
$route['admin/blog/update/(:num)'] = 'admin/blog_update/$1';
$route['admin/blog/toggle_publish/(:num)'] = 'admin/blog_toggle_publish/$1';
$route['admin/blog/delete/(:num)'] = 'admin/blog_delete/$1';

// ========================================
// Admin Transaksi Routes
// ========================================
$route['admin/transaksi'] = 'admin/transaksi';
$route['admin/transaksi/detail/(:num)'] = 'admin/transaksi_detail/$1';
$route['admin/transaksi/update-status/(:num)'] = 'admin/transaksi_update_status/$1';
$route['admin/transaksi/verify-payment/(:num)'] = 'admin/transaksi_verify_payment/$1';
$route['admin/transaksi/export'] = 'admin/transaksi_export';

$route['admin/pesanan'] = 'admin/transaksi';
$route['admin/pesanan/detail/(:num)'] = 'admin/transaksi_detail/$1';
$route['admin/pesanan/update-status/(:num)'] = 'admin/transaksi_update_status/$1';
$route['admin/pesanan/export'] = 'admin/transaksi_export';

// ========================================
// Admin Routes - Payment, Rehap, Testimonial
// ========================================
$route['admin/pembayaran'] = 'admin/payment_list';
$route['admin/pembayaran/verifikasi/(:num)'] = 'admin/payment_verify/$1';
$route['admin/pembayaran/tolak/(:num)'] = 'admin/payment_reject/$1';

$route['admin/rehap'] = 'admin/rehap';
$route['admin/rehap/detail/(:num)'] = 'admin/rehap_detail/$1';
$route['admin/rehap/quote/(:num)'] = 'admin/rehap_add_quote/$1';
$route['admin/rehap/update-status/(:num)'] = 'admin/rehap_update_status/$1';
$route['admin/rehap/update-progress/(:num)'] = 'admin/rehap_update_progress/$1';
$route['admin/rehap/approve-payment/(:num)'] = 'admin/rehap_approve_payment/$1';
$route['admin/rehap/verify-payment/(:num)'] = 'admin/rehap_verify_payment/$1';
$route['admin/rehap/export-excel'] = 'admin/rehap_export_excel';
$route['admin/rehap/export-pdf'] = 'admin/rehap_export_pdf';

$route['admin/testimoni'] = 'admin/testimonial_list';
$route['admin/testimoni/approve/(:num)'] = 'admin/testimonial_approve/$1';
$route['admin/testimoni/reject/(:num)'] = 'admin/testimonial_reject/$1';
$route['admin/testimoni/delete/(:num)'] = 'admin/testimonial_delete/$1';

// ========================================
// Admin Routes - User Management
// ========================================
$route['admin/pengguna'] = 'admin/user_list';
$route['admin/pengguna/detail/(:num)'] = 'admin/user_detail/$1';
$route['admin/pengguna/toggle-status/(:num)'] = 'admin/user_toggle_status/$1';
$route['admin/pengguna/hapus/(:num)'] = 'admin/user_delete/$1';

// ========================================
// Store Profile Routes 
// ========================================
$route['admin/profil-toko'] = 'admin/profil_toko';
$route['admin/profil-toko/update'] = 'admin/profil_toko_update';

// ========================================
// Admin Routes - Account Settings
// ========================================
$route['admin/akun'] = 'admin/account';
$route['admin/akun/update'] = 'admin/account_update';
$route['admin/akun/password'] = 'admin/account_change_password';

// ========================================
// Admin Routes - Reports
// ========================================
$route['admin/laporan'] = 'admin/report_sales';
$route['admin/laporan/penjualan'] = 'admin/report_sales';
$route['admin/laporan/produk'] = 'admin/report_products';
$route['admin/laporan/pelanggan'] = 'admin/report_customers';

// ========================================
// PRODUCT ROUTES - PUBLIC
// ========================================
$route['product'] = 'product/index';
$route['product/category/(:any)'] = 'product/category/$1';
$route['product/(:any)'] = 'product/detail/$1';

// ========================================
// STATIC PAGES
// ========================================
$route['about'] = 'page/about';
$route['contact'] = 'page/contact';

// ========================================
// Rehap Routes
// ========================================
$route['rehap'] = 'rehap/index';
$route['rehap/create'] = 'rehap/create';
$route['rehap/success/(:num)'] = 'rehap/success/$1';
$route['rehap/my_requests'] = 'rehap/my_requests';
$route['rehap/detail/(:num)'] = 'rehap/detail/$1';
$route['rehap/contact_whatsapp/(:num)'] = 'rehap/contact_whatsapp/$1';