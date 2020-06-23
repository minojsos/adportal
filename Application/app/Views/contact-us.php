<div id="wrapper">
    <!-- Search Area Start Here -->
    <section class="search-layout1 bg-body full-width-border-bottom fixed-menu-mt">
            <div class="container">
                <form name="search" accept-charset="utf-8" id="cp-search-form" class="bg-body search-layout2-inner" method="POST">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-location">
                                <select id="location" class="select2" name="location" id="location">
                                    <option class="first" value="sri-lanka">All Districts</option>
                                    <?php
                                        foreach($district as $dist) {
                                            echo '<option value="'.$dist.'">'.$dist.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-category">
                                <select id="categories" class="select2" name="categories">
                                    <option class="first" value="">All Categories</option>
                                    <?php
                                        foreach($categories as $cat) {
                                            echo '<option value="'.$cat['category_slug'].'">'.$cat['category_name'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="form-group search-input-area input-icon-keywords">
                                <input placeholder="Enter Keywords here ..." value="" name="term" id="term" type="text">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-right text-left-mb">
                            <button type="submit" href="#" class="cp-search-btn"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Search Area End Here -->
        <!-- Contact Area Start Here -->
        <section class="s-space-bottom-full bg-accent-shadow-body">
            <div class="container">
                <div class="breadcrumbs-area">
                    <ul>
                        <li><a href="#">Home</a> -</li>
                        <li class="active">Contact Page</li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="gradient-wrapper mb--sm">
                            <div class="gradient-title">
                                <h2>Contact With us</h2>
                            </div>
                            <div class="contact-layout1 gradient-padding">
                                <div class="google-map-area">
                                    <div id="googleMap" style="width:100%; height:400px;"></div>
                                </div>
                                <p>If you did not find the answer to your question or problem, please get in touch with us using the form below and we will respond to your message as soon as possible.</p>
                                <form id="contact-form" class="contact-form" action="<?php echo base_url(); ?>/Contact" method="POST">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Your Name" class="form-control" name="name" id="form-name" data-error="Name field is required" required>
                                                    <div class="help-block with-errors" style="color:#e74c3c;"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="email" placeholder="Your E-mail" class="form-control" name="email" id="form-email" data-error="Email field is required" required>
                                                    <div class="help-block with-errors" style="color:#e74c3c;"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Subject" class="form-control" name="subject" id="form-subject" data-error="Subject field is required" required>
                                                    <div class="help-block with-errors" style="color:#e74c3c;"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Message" class="textarea form-control" name="message" id="form-message" rows="7" cols="20" data-error="Message field is required" required></textarea>
                                                    <div class="help-block with-errors" style="color:#e74c3c;"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="cp-default-btn">Send Message</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12 col-12">
                                                <div class='form-response'>
                                                    <?php
                                                        if (isset($success)) {
                                                            echo $success;
                                                        }
                                                        if (isset($error)) {
                                                            echo $error;
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-item-box">
                            <ul class="sidebar-more-option">
                                <li>
                                    <a href="<?php echo base_url(); ?>/how-it-works"><img src="<?php echo base_url(); ?>/assets/images/more1.png" alt="more" class="img-fluid">Post a Free Ad</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>/favourite-ad-list"><img src="<?php echo base_url(); ?>/assets/images/more3.png" alt="more" class="img-fluid">Favorite Ad list</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Area End Here -->

    <!-- Footer Area Start Here -->
    <footer>
        <div class="footer-area-top s-space-equal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg">About us</h3>
                            <ul class="useful-link">
                                <li>
                                    <a href="about.html">About us</a>
                                </li>
                                <li>
                                    <a href="#">Career</a>
                                </li>
                                <li>
                                    <a href="#">Terms &amp; Conditions</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Sitemap</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg">How to sell fast</h3>
                            <ul class="useful-link">
                                <li>
                                    <a href="#">How to sell fast</a>
                                </li>
                                <li>
                                    <a href="#">Buy Now on Classipost</a>
                                </li>
                                <li>
                                    <a href="#">Membership</a>
                                </li>
                                <li>
                                    <a href="#">Banner Advertising</a>
                                </li>
                                <li>
                                    <a href="#">Promote your ad</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg">Help &amp; Support</h3>
                            <ul class="useful-link">
                                <li>
                                    <a href="#">Live Chat</a>
                                </li>
                                <li>
                                    <a href="faq.html">FAQ</a>
                                </li>
                                <li>
                                    <a href="#">Stay safe on classipost</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg">Follow Us On</h3>
                            <ul class="social-link">
                                <li class="fa-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/facebook.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="tw-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/twitter.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="yo-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/youtube.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="pi-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/pinterest.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="li-classipost">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>/assets/images/linkedin.jpg" alt="social">
                                    </a>
                                </li>
                            </ul>
                            <br>
                            <ul class="useful-link">
                                <li><a>+94 77 101 8743</a></li>
                                <li><a>sales@beluxa.lk</a></li>
                                <li><a>info@beluxa.lk</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-center-mb">
                        <p>Copyright © <?php echo date('Y'); ?> Beluxa. Designed and Developed By <a href="http://zenolk.com" alt="Zeno Innovations (Pvt) Ltd">Zeno Innovations<a/>.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End Here -->
</div>
<script src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<!-- Font Awesome-->
<script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
<!-- Data Tables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<!-- Swiper -->
<script src="https://unpkg.com/swiper/js/swiper.js"></script>
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<!-- Chart JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.meanmenu.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.scrollUp.min.js"></script>
<!-- Validtor JS -->
<script src="<?php echo base_url(); ?>/assets/js/validator.min.js"></script>
<!-- Google Map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtmXSwv4YmAKtcZyyad9W7D4AC08z0Rb4"></script>
<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
</body>
</html>