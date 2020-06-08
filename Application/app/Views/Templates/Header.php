<!DOCTYPE html>
<html>
<head>
<?php
        foreach($settings as $setting) {

            if ($setting['option_name'] == 'site_title') {
                $site_title = $setting['option_value'];
            }

            if ($setting['option_name'] == 'site_desc') {
                $site_desc = $setting['option_value'];
            }
            
            if ($setting['option_name'] == 'site_logo') {
                $site_logo = $setting['option_value'];
            }

            if ($setting['option_name'] == 'admin_email') {
                $admin_email = $setting['option_value'];
            }
            
            if ($setting['option_name'] == 'seo_desc') {
                $seo_desc = $setting['option_value'];
            }

            if ($setting['option_name'] == 'seo_keywords') {
                $seo_keywords = $setting['option_value'];
            }

            if ($setting['option_name'] == 'seo_authors') {
                $seo_authors = $setting['option_value'];
            }
        }
    ?>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $site_desc; ?>">
    <meta name="keywords" content="<?php echo $seo_keywords; ?>">
    <meta name="author" content="<?php echo $seo_authors; ?>">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?php echo $title.' | '.$site_title.' | '.$site_desc; ?></title>

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
    <!-- Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/select2.min.css"/>
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <!-- Magnific -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/magnific-popup.css"/>
    <!-- Meanmenu -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/meanmenu.min.css"/>
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.theme.default.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/animate.min.css">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/6n6eyo2p15wf1uqy0ql5po0yma3r9fwhkvi1zqoxov7gtgaa/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
    <!-- Typeahead -->
    <script src="<?php echo base_url(); ?>/assets/js/typeahead/typeahead.bundle.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script> -->

    <!-- Custom CSS -->
    <?php
        if ($admin == true) {
    ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css"/>
    <?php
        } else {
    ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/home.css"/>
    <?php
        }
    ?>

</head>
<body>