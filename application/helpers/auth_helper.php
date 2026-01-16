<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('check_login')) {
    function check_login() {
        $CI =& get_instance();
        
        if (!$CI->session->userdata('logged_in')) {
            $CI->session->set_flashdata('error', 'Silakan login terlebih dahulu!');
            redirect('auth/login');
        }
    }
}

if (!function_exists('check_admin')) {
    function check_admin() {
        $CI =& get_instance();
        
        // Cek login dulu
        if (!$CI->session->userdata('logged_in')) {
            $CI->session->set_flashdata('error', 'Silakan login terlebih dahulu!');
            redirect('auth/login');
        }
        
        // Cek role admin
        if ($CI->session->userdata('role') !== 'admin') {
            $CI->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman admin!');
            redirect('profile');
        }
    }
}

if (!function_exists('check_customer')) {
    function check_customer() {
        $CI =& get_instance();
        
        // Cek login dulu
        if (!$CI->session->userdata('logged_in')) {
            $CI->session->set_flashdata('error', 'Silakan login terlebih dahulu!');
            redirect('auth/login');
        }
        
        // Cek role customer
        if ($CI->session->userdata('role') !== 'customer') {
            $CI->session->set_flashdata('error', 'Halaman ini hanya untuk customer!');
            redirect('admin/dashboard');
        }
    }
}

if (!function_exists('is_logged_in')) {
    function is_logged_in() {
        $CI =& get_instance();
        return $CI->session->userdata('logged_in') == TRUE;
    }
}

if (!function_exists('is_admin')) {
    function is_admin() {
        $CI =& get_instance();
        return $CI->session->userdata('role') == 'admin';
    }
}

if (!function_exists('is_customer')) {
    function is_customer() {
        $CI =& get_instance();
        return $CI->session->userdata('role') == 'customer';
    }
}