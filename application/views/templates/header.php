<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Jepara Indah Furniture Padang">
<link rel="shortcut icon" href="<?php echo base_url('assets/images/sofa.png'); ?>">
<meta name="description" content="<?php echo isset($meta_description) ? $meta_description : 'Jepara Indah Furniture Padang - Furniture berkualitas tinggi'; ?>" />
<meta name="keywords" content="furniture jepara, mebel jepara, furniture padang, kursi, meja, lemari" />

<!-- Bootstrap CSS -->
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/css/tiny-slider.css'); ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<?php 
// Load additional CSS based on segment
$segment = $this->uri->segment(1);

// Home page CSS
if (empty($segment) || $segment == 'home'): ?>
<link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
<?php endif; ?>

<?php if ($segment == 'profile' || $segment == 'checkout' || $segment == 'payment'): ?>
<link rel="stylesheet" href="<?= base_url('assets/css/profile.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/payments.css') ?>">
<?php endif; ?>

<?php if ($segment == 'testimonial'): ?>
<link rel="stylesheet" href="<?= base_url('assets/css/testimonial.css') ?>">
<?php endif; ?>

<?php if ($segment == 'cart'): ?>
<link rel="stylesheet" href="<?= base_url('assets/css/cart.css') ?>">
<?php endif; ?>

<title><?php echo isset($title) ? $title . ' - ' : ''; ?>Jepara Indah Furniture Padang</title>
</head>
<body>