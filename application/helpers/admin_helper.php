<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function pageTitleFromUri()
{
    $ci = &get_instance();
    $segment = $ci->uri->segment(2);

    $map = [
        'dashboard'   => 'Dashboard',
        'produk'      => 'Manajemen Produk',
        'rehap'       => 'Pengajuan Rehap',
        'transaksi'   => 'Transaksi & Pembayaran',
        'blog'        => 'Blog Management',
        'testimoni'   => 'Moderasi Testimoni',
        'pengguna'    => 'Manajemen Pengguna',
        'akun'        => 'Akun Admin',
        'profil-toko' => 'Profil Toko',
    ];

    return $map[$segment] ?? 'Dashboard';
}
