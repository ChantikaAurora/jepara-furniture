<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Format number to Indonesian Rupiah currency
 * @param int $number
 * @return string
 */
if (!function_exists('rupiah')) {
    function rupiah($number) {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}

/**
 * Format date to Indonesian format
 * @param string $date
 * @param string $format
 * @return string
 */
if (!function_exists('format_tanggal_indonesia')) {
    function format_tanggal_indonesia($date, $format = 'full') {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        
        $hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );
        
        $timestamp = strtotime($date);
        $day = date('d', $timestamp);
        $month = $bulan[date('n', $timestamp)];
        $year = date('Y', $timestamp);
        $dayName = $hari[date('l', $timestamp)];
        
        if ($format == 'full') {
            return $dayName . ', ' . $day . ' ' . $month . ' ' . $year;
        } elseif ($format == 'short') {
            return $day . ' ' . $month . ' ' . $year;
        } else {
            return $day . ' ' . $month . ' ' . $year;
        }
    }
}

/**
 * Format datetime to Indonesian format
 * @param string $datetime
 * @return string
 */
if (!function_exists('format_datetime_indonesia')) {
    function format_datetime_indonesia($datetime) {
        $timestamp = strtotime($datetime);
        $date = format_tanggal_indonesia($datetime);
        $time = date('H:i', $timestamp);
        
        return $date . ' ' . $time . ' WIB';
    }
}

/**
 * Convert number to Indonesian words
 * @param int $number
 * @return string
 */
if (!function_exists('terbilang')) {
    function terbilang($number) {
        $angka = array('', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas');
        
        if ($number < 12) {
            $temp = $angka[$number];
        } elseif ($number < 20) {
            $temp = terbilang($number - 10) . ' belas';
        } elseif ($number < 100) {
            $temp = terbilang($number / 10) . ' puluh ' . terbilang($number % 10);
        } elseif ($number < 200) {
            $temp = 'seratus ' . terbilang($number - 100);
        } elseif ($number < 1000) {
            $temp = terbilang($number / 100) . ' ratus ' . terbilang($number % 100);
        } elseif ($number < 2000) {
            $temp = 'seribu ' . terbilang($number - 1000);
        } elseif ($number < 1000000) {
            $temp = terbilang($number / 1000) . ' ribu ' . terbilang($number % 1000);
        } elseif ($number < 1000000000) {
            $temp = terbilang($number / 1000000) . ' juta ' . terbilang($number % 1000000);
        } elseif ($number < 1000000000000) {
            $temp = terbilang($number / 1000000000) . ' milyar ' . terbilang($number % 1000000000);
        } else {
            $temp = 'Angka terlalu besar';
        }
        
        return trim($temp);
    }
}

/**
 * Shorten text with ellipsis
 * @param string $text
 * @param int $length
 * @return string
 */
if (!function_exists('shorten_text')) {
    function shorten_text($text, $length = 100) {
        if (strlen($text) > $length) {
            $text = substr($text, 0, $length);
            $text = substr($text, 0, strrpos($text, ' '));
            $text .= '...';
        }
        return $text;
    }
}

/**
 * Get time ago in Indonesian
 * @param string $datetime
 * @return string
 */
if (!function_exists('time_ago_indonesia')) {
    function time_ago_indonesia($datetime) {
        $timestamp = strtotime($datetime);
        $difference = time() - $timestamp;
        
        $periods = array(
            'detik' => 60,
            'menit' => 60,
            'jam' => 24,
            'hari' => 7,
            'minggu' => 4.35,
            'bulan' => 12,
            'tahun' => 10
        );
        
        foreach ($periods as $unit => $value) {
            if ($difference < $value) {
                break;
            }
            $difference /= $value;
        }
        
        $difference = round($difference);
        
        return $difference . ' ' . $unit . ' yang lalu';
    }
}

/**
 * Format phone number to Indonesian format
 * @param string $phone
 * @return string
 */
if (!function_exists('format_phone_indonesia')) {
    function format_phone_indonesia($phone) {
        // Remove all non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // Format: 08xx-xxxx-xxxx
        if (strlen($phone) >= 10) {
            return substr($phone, 0, 4) . '-' . substr($phone, 4, 4) . '-' . substr($phone, 8);
        }
        
        return $phone;
    }
}

/**
 * Generate slug from text
 * @param string $text
 * @return string
 */
if (!function_exists('create_slug')) {
    function create_slug($text) {
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        
        // Transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        
        // Trim
        $text = trim($text, '-');
        
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        
        // Lowercase
        $text = strtolower($text);
        
        if (empty($text)) {
            return 'n-a';
        }
        
        return $text;
    }
}