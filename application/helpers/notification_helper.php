<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Set success message
 */
if (!function_exists('set_success')) {
    function set_success($message) {
        $CI =& get_instance();
        $CI->session->set_flashdata('success', $message);
    }
}

/**
 * Set error message
 */
if (!function_exists('set_error')) {
    function set_error($message) {
        $CI =& get_instance();
        $CI->session->set_flashdata('error', $message);
    }
}

/**
 * Set warning message
 */
if (!function_exists('set_warning')) {
    function set_warning($message) {
        $CI =& get_instance();
        $CI->session->set_flashdata('warning', $message);
    }
}

/**
 * Set info message
 */
if (!function_exists('set_info')) {
    function set_info($message) {
        $CI =& get_instance();
        $CI->session->set_flashdata('info', $message);
    }
}

/**
 * Get flash message
 */
if (!function_exists('get_flash')) {
    function get_flash($type) {
        $CI =& get_instance();
        return $CI->session->flashdata($type);
    }
}

/**
 * Display alert messages
 */
if (!function_exists('display_alerts')) {
    function display_alerts() {
        $CI =& get_instance();
        $html = '';
        
        $types = ['success', 'error', 'warning', 'info'];
        
        foreach ($types as $type) {
            if ($message = $CI->session->flashdata($type)) {
                $class = $type;
                if ($type == 'error') $class = 'danger';
                
                $html .= '<div class="alert alert-' . $class . ' alert-dismissible fade show" role="alert">';
                $html .= $message;
                $html .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                $html .= '</div>';
            }
        }
        
        return $html;
    }
}

/**
 * Send email notification (placeholder)
 */
if (!function_exists('send_email_notification')) {
    function send_email_notification($to, $subject, $message) {
        $CI =& get_instance();
        $CI->load->library('email');
        
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'your-email@gmail.com',
            'smtp_pass' => 'your-password',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        
        $CI->email->initialize($config);
        
        $CI->email->from('noreply@jeparafurniture.com', 'Jepara Furniture');
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($message);
        
        return $CI->email->send();
    }
}

/**
 * Send WhatsApp notification (placeholder)
 */
if (!function_exists('send_whatsapp_notification')) {
    function send_whatsapp_notification($phone, $message) {
        // Implementation with WhatsApp API
        // This is a placeholder
        return true;
    }
}

/**
 * Log activity
 */
if (!function_exists('log_activity')) {
    function log_activity($user_id, $activity, $description = null) {
        $CI =& get_instance();
        
        $data = [
            'user_id' => $user_id,
            'activity' => $activity,
            'description' => $description,
            'ip_address' => $CI->input->ip_address(),
            'user_agent' => $CI->input->user_agent(),
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        // If you have activity_log table
        // $CI->db->insert('activity_log', $data);
        
        return true;
    }
}