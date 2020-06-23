
<header>
    <div id="header-three" class="header-style1 header-fixed">
        <div class="header-top-bar top-bar-style1">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-8">
                        <div class="top-bar-left">
                            <a href="<?php echo base_url(); ?>/how-it-works" class="cp-default-btn d-lg-none">Post Your Ad</a>
                            <p class="d-none d-lg-block">
                                <i class="fa fa-life-ring" aria-hidden="true"></i>Have any questions? +94 77 123 4567 or sales@beluxa.lk
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-4">
                        <!--
                        <div class="top-bar-right">
                            <ul>
                                <li class="hidden-mb">
                                    <a class="login-btn" href="#" id="login-button">
                                        <i class="fa fa-comments-o" aria-hidden="true"></i>Live Chat
                                    </a>
                                </li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-area bg-primary" id="sticker" style="box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.15);">
            <div class="container">
                <div class="row no-gutters d-flex align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-3">
                        <div class="logo-area">
                            <a href="<?php echo base_url(); ?>" class="img-fluid">
                                <?php 
                                    $site_title = "";
                                    foreach ($settings as $set) {
                                        if ($set['option_name'] == 'site_title') {
                                            $site_title = $set['option_value'];
                                        }
                                        if ($set['option_name'] == 'site_logo') {
                                            echo '<img src="'.base_url().'/assets/images/'.$set['option_value'].'" alt="'.$site_title.'">';
                                        }
                                    }
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 possition-static">
                        <div class="cp-main-menu">
                            <nav>
                                <ul>
                                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                    <li><a href="<?php echo base_url(); ?>/about-us">Who We Are</a></li>
                                    <li><a href="<?php echo base_url(); ?>/how-it-works">How It Works?</a></li>
                                    <li><a href="<?php echo base_url(); ?>/contact-us">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 text-right">
                        <a href="<?php echo base_url(); ?>/how-it-works" class="cp-default-btn">Post Your Ad</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area Start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="<?php echo base_url(); ?>/about-us">Who We Are</a></li>
                                <li><a href="<?php echo base_url(); ?>/how-it-works">How It Works?</a></li>
                                <li><a href="<?php echo base_url(); ?>/contact-us">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End -->
</header>