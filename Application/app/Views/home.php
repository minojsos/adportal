<div id="wrapper">
    <!-- CONTENT -->
    <!-- Map Area Start Here -->
    <section class="map-layout1 fixed-menu-mt full-width-container" style="background-image: url('<?php echo base_url(); ?>/assets/images/banner.jpg');background-size:cover;background-attachment:fixed;background-position:center center;">
        <div class="container-fluid" style="padding-left:0px!important;padding-right:0px!important;">
            <div class="google-map-area">
                <div id="googleMap" style="background-color: rgba(0,0,0,0.5); width: 100%; height: 400px; position: relative; overflow: hidden;"></div>
            </div>
        </div>
    </section>
    <!-- Map Area End Here -->
    <!-- Search Area Start Here -->
    <section class="search-layout2 bg-accent">
        <div class="search-layout2-holder">
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
                                <select id="categories" class="select2" name="category" id="category">
                                    <option class="first" value="">All Categories</option>
                                    <?php
                                        foreach($category as $cat) {
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
        </div>
    </section>

    <!-- Service Area Start Here -->
    <section class="service-layout1 bg-accent s-space-custom3">
        <div class="container">
            <div class="section-title-dark">
                <h2>Browse Our Categories</h2>
            </div>
            <div class="row">
                <?php
                    foreach ($category as $cat) {
                        echo '<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">';
                            echo '<div class="service-box1 bg-body text-center">';
                                echo '<img src="'.base_url().'/assets/uploads/'.$cat['category_icon'].'" alt="'.$cat['category_name'].' category service" class="img-fluid" style="width: 64px;">';;
                                echo '<h3 class="title-medium-dark mb-none" style="font-size:16px!important;">';
                                    echo '<a href="'.base_url().'/search/index/sri-lanka/'.$cat['category_slug'].'">'.$cat['category_name'].'</a>';
                                echo '</h3>';
                                foreach ($count as $c) {
                                    if ($c['id'] == $cat['id']) {
                                        echo '<div class="view">('.number_format($c['count']).')</div>';
                                        break;
                                    }
                                }
                            echo '</div>';
                        echo '</div>';
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- Service Area End Here -->
    <!-- Selling Process Area Start Here -->
    <section class="bg-white s-space-regular">
        <div class="container">
            <div class="section-title-dark">
                <h2>How To Start Selling Your Products</h2>
                <p>We post your advertisement to allow you to grow your business.</p>
            </div>
            <ul class="process-area">
                <li>
                    <img src="<?php echo base_url(); ?>/assets/images/step1ad.png" alt="process" class="img-fluid cstm-img-step">
                    <h3>Send Your Advertisement</h3>
                    <p> Get in touch with us and send us the details of the products & services that you sell.</p>
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>/assets/images/step2ad.png" alt="process" class="img-fluid cstm-img-step">
                    <h3>We Post It</h3>
                    <p> Our expert team will compile the detail provided by you and post the advertisement.</p>
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>/assets/images/step3ad.png" alt="process" class="img-fluid cstm-img-step">
                    <h3>You Start Selling</h3>
                    <p> Your advertisements will reach more people allowing you to sell faster and grow.</p>
                </li>
            </ul>
        </div>
    </section>
    <!-- Selling Process Area End Here -->

    <!-- Start Selling & Get In Touch Area Start Here -->
    <section class="bg-accent s-space-regular">
        <div class="container">
            <div class="text-center item-mt item-mb">
                <h2 class="title-bold-dark mb-none">Do you have Something to Sell?</h2>
                <p>Get in touch with us to get your advertisement on our website.</p>
                <a href="#" class="cp-default-btn direction-img">Contact Us!</a>
            </div>
        </div>
    </section>
    <!-- Start Selling & Get In Touch Area End Here -->

    <!-- Subscribe Area Start Here -->
    <section class="bg-primary s-space full-width-border-top">
        <div class="container">
            <div class="section-title-light">
                <h2 class="size-lg">Subscribe to Newsletter</h2>
                <p>Stay in touch with us to receive the latest news about our services</p>
            </div>
            <div id="subscribe-box">
                <form id="subscribe">
                    <div class="input-group subscribe-area">
                        <input type="email" placeholder="Type your e-mail address" class="form-control" name="email" id="email">
                        <span class="input-group-addon">
                            <button type="submit" class="cp-default-btn-xl">Subscribe</button>                        
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Subscribe Area End Here -->

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
<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
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
<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
<script type="text/javascript">
    $('#cp-search-form').on('submit', function(event){
        $('[name=location]').prop('disabled', true)
        $('[name=category]').prop('disabled', true)
        $('[name=term]').prop('disabled', true)
        if ($('[name=category]').val() == "") {
            url = '<?php echo base_url(); ?>' + '/search/index' + $('[name=location]').val() + '?term=' + $('[name=term]').val();
            $(this).attr('action', url);
        } else {
            url = '<?php echo base_url(); ?>' + '/search/index/' + $('[name=location]').val() + '/' + $('[name=category]').val() + '?term=' + $('[name=term]').val();
            $(this).attr('action', url);
        }
    });

    // Variable to hold request
    var request;
    
    $('#subscribe').submit(function(event) {

        event.preventDefault();

        // Abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
            url: "<?php echo base_url(); ?>/home/subscribe",
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            document.getElementById("subscribe-box").innerHTML = "<h4 style='text-align:center;font-family:'Poppins',sans-serif;color:rgba(255,255,255,1.0);font-weight:600;'>"+response+"</h4>";
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });
    });

    $('.popup-close').click(function(e) {
        $('.popup-wrap').fadeOut(500);
        $('.popup-box').removeClass('transform-in').addClass('transform-out');

        e.preventDefault();
    });
    
</script>
</body>
</html>
