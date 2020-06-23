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
    <!-- Product Area Start Here -->
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="<?php echo base_url(); ?>/search">Home</a> -</li>
                    <li><a href="<?php echo base_url(); ?>/search/index/sri-lanka/<?php echo $category['category_slug']; ?>"><?php echo $category['category_name']; ?></a> -</li>
                    <li class="active"><a href="<?php echo base_url(); ?>/search/index/sri-lanka/<?php echo $category['category_slug'].'/'.$subcategory['sub_category_slug']; ?>"><?php echo $subcategory['sub_category_name']; ?></a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper item-mb">
                        <div class="gradient-title">
                            <h2><?php echo $advertisement['title']; ?></h2>
                        </div>
                        <div class="gradient-padding reduce-padding">
                            <div class="single-product-img-layout1 d-flex mb-50">
                                <ul class="nav tab-nav tab-nav-list">
                                    <?php
                                        $i=1;
                                        foreach ($media as $md) {
                                            echo '<li class="nav-item">';
                                                if ($md['featured'] == 1) {
                                                    echo '<a class="active" href="#related'.$i.'" data-toggle="tab" aria-expanded="false"><img alt="'.$md['alt'].'" src="'.base_url().'/assets/uploads/'.$md['path'].'" class="img-fluid"></a>';
                                                } else {
                                                    echo '<a href="#related'.$i.'" data-toggle="tab" aria-expanded="false"><img alt="'.$md['alt'].'" src="'.base_url().'/assets/uploads/'.$md['path'].'" class="img-fluid"></a>';
                                                }
                                            echo '</li>';
                                            $i=$i+1;
                                        }
                                    ?>
                                </ul>
                                <div class="tab-content">
                                    <span class="price" style="background-image: url(<?php echo base_url(); ?>/assets/images/product-price-back.png)!important;">
                                    <?php
                                        echo '<small>LKR </small>'.number_format($advertisement['price'],2);
                                        if ($advertisement['negotiate'] == 1) {
                                            echo '<br><small style="font-size:11px;font-weight:600;">Negotiable</small>';
                                        }
                                    ?>
                                    </span>
                                    <?php
                                        $i=1;
                                        foreach ($media as $md) {
                                            if ($i == 1) {
                                                echo '<div class="tab-pane fade active show" id="related'.$i.'">';
                                                    echo '<a href="#" class="zoom ex1"><img alt="'.$md['alt'].'" src="'.base_url().'/assets/uploads/'.$md['path'].'" class="img-fluid"></a>';
                                                echo '</div>';
                                            } else {
                                                echo '<div class="tab-pane fade" id="related'.$i.'">';
                                                    echo '<a href="#" class="zoom ex1"><img alt="'.$md['alt'].'" src="'.base_url().'/assets/uploads/'.$md['path'].'" class="img-fluid"></a>';
                                                echo '</div>';
                                            }
                                            $i=$i+1;
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="section-title-left-dark child-size-xl title-bar item-mb">
                                <h3>Further Details:</h3>
                                <p class="text-medium-dark">
                                <?php 
                                    echo $advertisement['description'];
                                ?>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <ul class="specification-layout2 mb-40">
                                        <li>
                                            <?php
                                                echo '<a href="'.base_url().'/search/index/sri-lanka/'.$category['category_slug'].'" alt="'.$category['category_name'].' - Category">'.$category['category_name'].'</a>';
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                                echo '<a href="'.base_url().'/search/index/sri-lanka/'.$category['category_slug'].'/'.$subcategory['sub_category_slug'].'" alt="'.$subcategory['sub_category_name'].' - Subcategory">'.$subcategory['sub_category_name'].'</a>';
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                                echo '<a href="'.base_url().'/search/index/'.$location['district'].'" alt="'.$location['district'].' - District">'.$location['district'].'</a>, ';
                                                echo '<a href="'.base_url().'/search/index/'.$location['district'].'/'.$location['city'].'" alt="'.$location['city'].' - City">'.$location['city'].'</a>';
                                            ?>
                                        </li>
                                        <li>
                                            <?php
                                                echo 'LKR '.number_format($advertisement['price'],2);
                                            ?>
                                        </li>
                                        <?php
                                            if ($advertisement['negotiate'] == 1) {
                                                echo '<li>Negotiable</li>';
                                            } else {
                                                echo '<li>Not Negotiable</li>';
                                            }
                                        ?>
                                        <li>
                                            <ul class="sidebar-social">
                                                <li>Share:</li>
                                                <li><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url().'/ad/'.$advertisement['slug']; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="http://twitter.com/share?url=<?php echo base_url().'/ad/'.$advertisement['slug']; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url().'/ad/'.$advertisement['slug']; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="item-actions border-top">
                                <li>
                                    <a href="#" onclick="savead(<?php echo $advertisement['id']; ?>, '<?php echo $advertisement['title']; ?>');"><i class="fa fa-heart" aria-hidden="true" id="saveadicon"></i><span id="saveadbtn">Save Ad</span></a>
                                </li>
                                <li><a href="<?php echo base_url().'/Home/report/'.$advertisement['id'] ?>"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Report abuse</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 item-mb">
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>Seller Information</h3>
                            </div>
                            <ul class="sidebar-seller-information">
                                <li>
                                    <div class="media">
                                        <i class="fas fa-user-tie fa-1x img-fluid pull-left" style="font-size: 1.5em; color: #f8640e; margin-right: 15px;"></i>
                                        <div class="media-body">
                                            <span>Posted By</span>
                                            <h4><?php echo $customer['fname'].' '.$customer['lname']; ?></h4>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="media">
                                        <i class="far fa-clock fa-1x img-fluid pull-left" style="font-size: 1.5em; color: #f8640e; margin-right: 15px;"></i>
                                        <div class="media-body">
                                            <span>Posted On</span>
                                            <h4><?php echo date_format(new DateTime($advertisement['post_date']),"d M, Y"); ?></h4>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="media">
                                        <i class="fas fa-globe-asia fa-1x img-fluid pull-left" style="font-size: 1.5em; color: #f8640e; margin-right: 15px;"></i>
                                        <div class="media-body">
                                            <span>Location</span>
                                            <h4><?php echo $customer['city']; ?></h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <i class="fas fa-mobile-alt fa-1x img-fluid pull-left" style="font-size: 1.5em; color: #f8640e; margin-right: 15px;"></i>
                                        <div class="media-body">
                                            <span>Contact Number</span>
                                            <h4><?php echo $customer['contact_no']; ?></h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <i class="far fa-paper-plane fa-1x img-fluid pull-left" style="font-size: 1.5em; color: #f8640e; margin-right: 15px;"></i>
                                        <div class="media-body">
                                            <span>Email</span>
                                            <h4 style="text-transform:none!important;"><?php echo $customer['email']; ?></h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>Safety Tips</h3>
                            </div>
                            <ul class="sidebar-safety-tips">
                                <li>Meet seller at a public place</li>
                                <li>Check The item before you buy</li>
                                <li>Pay only after collecting The item</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gradient-wrapper">
                <div class="gradient-title">
                    <h2>Latest Ads In This Category </h2>
                </div>
                <div class="gradient-padding">
                    <?php
                        if (count($advertisements) == 1) {
                            echo '<div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="1" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="true" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="1" data-r-Large-nav="true" data-r-Large-dots="false">';
                        } elseif (count($advertisements) == 2) {
                            echo '<div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="2" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="true" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="1" data-r-Large-nav="true" data-r-Large-dots="false">';
                        } elseif (count($advertisements) == 3) {
                            echo '<div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="true" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="1" data-r-Large-nav="true" data-r-Large-dots="false">';
                        } elseif (count($advertisements) == 4) {
                            echo '<div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="true" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="1" data-r-Large-nav="true" data-r-Large-dots="false">';
                        } else {
                            echo '<div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="true" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="1" data-r-Large-nav="true" data-r-Large-dots="false">';
                        }
                    ?>
                    <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="1" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="5" data-r-Large-nav="true" data-r-Large-dots="false">
                        <?php 
                            if ($advertisements) {
                                foreach ($advertisements as $ad) {
                                    echo '<div class="product-box item-mb zoom-gallery">';
                                        echo '<div class="item-mask-wrapper">';
                                            echo '<div class="item-mask secondary-bg-box">';
                                            foreach ($medias as $md) {
                                                if ($md['ad_id'] == $ad['id']) {
                                                    echo '<img src="'.base_url().'/assets/uploads/'.$md['path'].'" alt="'.$md['alt'].'" class="img-fluid" style="height:96px;"/>';
                                                    break;
                                                }
                                            }
                                            foreach ($categories as $cat) {
                                                if ($cat['id'] == $ad['cat_id']) {
                                                    echo '<div class="title-ctg">'.$cat['category_name'].'</div>';
                                                    break;
                                                }
                                            }
                                            echo '<ul class="info-link">';
                                            foreach ($medias as $md) {
                                                if ($md['ad_id'] == $ad['id']) {
                                                    echo '<li><a href="'.base_url().'/assets/uploads/'.$md['path'].'" class="elv-zoom" data-fancybox-group="gallery" title="'.$md['title'].'"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>';
                                                    echo '<li><a href="'.base_url().'/ad/'.$ad['slug'].'" alt="'.$ad['title'].'"><i class="fa fa-link"></i></a></li>';
                                                    break;
                                                }
                                            }
                                            echo '</ul>';
                                            // Featured Symbol
                                            // echo '<div class="symbol-featured"><img src="'.base_url().'/assets/images/symbol-featured.png" alt="symbol" class="img-fluid"></div>';
                                            echo '</div>';
                                        echo '</div>';

                                        echo '<div class="item-content">';
                                            foreach ($categories as $cat) {
                                                if ($cat['id'] == $ad['cat_id']) {
                                                    echo '<div class="title-ctg">'.$cat['category_name'].'</div>';
                                                    break;
                                                }
                                            }
                                            echo '<h3 class="short-title"><a href="'.base_url().'/ad/'.$ad['slug'].'">'.$ad['title'].'</a></h3>';
                                            echo '<h3 class="long-title"><a href="'.base_url().'/ad/'.$ad['slug'].'">'.$ad['title'].'</a></h3>';
                                            echo '<ul class="upload-info">';
                                                echo '<li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>'.date_format(new DateTime($ad['post_date']),"d M, Y").'</li>';
                                                foreach ($locations as $loc) {
                                                    if ($ad['location'] == $loc['id']) {
                                                        echo '<li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>'.$loc['city'].', '.$loc['district'].'<li>';
                                                        break;
                                                    }
                                                }

                                                foreach ($categories as $cat) {
                                                    if ($ad['cat_id'] == $cat['id']) {
                                                        echo '<li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>'.$cat['category_name'].'</li>';
                                                        break;
                                                    }
                                                }
                                            echo '</ul>';
                                            echo '<p></p>';
                                            echo '<div class="price"></div>';
                                            echo '<a href="'.base_url().'/ad/'.$ad['slug'].'" alt="'.$ad['title'].'" class="product-details-btn">Details</a>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo 'No Other Advertisements Found!';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Area End Here -->
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
                                    <a href="<?php echo base_url(); ?>/about-us">About us</a>
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
                                    <a href="#">Membership</a>
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
                                    <a href="<?php echo base_url(); ?>/faq">FAQ</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>/contact-us">Contact us</a>
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
<!-- jquery.counterup js -->
<script src="<?php echo base_url(); ?>/assets/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/waypoints.min.js"></script>
<!-- Magnific Popup -->
<script src="<?php echo base_url(); ?>/assets/js/jquery.magnific-popup.min.js"></script>
<!-- Owl Cauosel JS -->
<script src="<?php echo base_url(); ?>/assets/js/owl.carousel.min.js "></script>
<!-- jQuery Zoom -->
<script src="<?php echo base_url(); ?>/assets/js/jquery.zoom.min.js"></script>
<!-- Popper js -->
<script src="<?php echo base_url(); ?>/assets/js/popper.js"></script>
<!-- Isotope js -->
<script src="<?php echo base_url(); ?>/assets/js/isotope.pkgd.min.js "></script>
<!-- Custom JS -->
<script src="<?php echo base_url(); ?>/assets/js/custom.js"></script>
<script type="text/JavaScript">
    $('#cp-search-form').on('submit', function(event){
        $('[name=location]').prop('disabled', true);
        $('[name=categories]').prop('disabled', true);
        $('[name=term]').prop('disabled', true);

        if ($('[name=categories]').val() == "") {
            url = '<?php echo base_url(); ?>' + '/search/index' + $('[name=location]').val() + '?term=' + $('[name=term]').val();
            $(this).attr('action', url);
        } else {
            url = '<?php echo base_url(); ?>' + '/search/index/' + $('[name=location]').val() + '/' + $('[name=categories]').val() + '?term=' + $('[name=term]').val();
            $(this).attr('action', url);
        }
    });

    function savead(id,title) {
        var itm = localStorage.getItem(id);
        
        if (itm == null) {
            localStorage.setItem(id, title);
            document.getElementById('saveadbtn').innerHTML = "Saved";
            document.getElementById('saveadbtn').style.color = "#e74c3c";
            document.getElementById('saveadicon').style.color = "#e74c3c";
        } else {
            // Remove Item
            localStorage.removeItem(id);
            document.getElementById('saveadbtn').innerHTML = "Save Ad";
            document.getElementById('saveadbtn').style.color = "";
            document.getElementById('saveadicon').style.color = "";
        }
    }

    $(document).ready(function() {
        var itm = localStorage.getItem(<?php echo $advertisement['id']; ?>);
        if (itm != null) {
            document.getElementById('saveadbtn').innerHTML = "Saved";
            document.getElementById('saveadbtn').style.color = "#e74c3c";
            document.getElementById('saveadicon').style.color = "#e74c3c";
        }
    });
</script>
</body>
</html>