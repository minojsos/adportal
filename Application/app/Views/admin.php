<!-- Main Content -->
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="welcome-message">Welcome to Ad Portal</h2>
                <hr>
                <h6>You are logged in as <b><?php echo session()->get('firstname').' '.session()->get('lastname'); ?></b></h6>
            </div>
        </div>
        <br />

        <!-- Statistics -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3" style="margin-bottom: 30px;">
                        <div id="stat-box-admin">
                            <div class="content">
                                <?php echo $countAd; ?>
                            </div>
                            <div class="title">Advertisments</div>
                        </div>
                    </div>
                    
                    <div class="col-md-3" style="margin-bottom: 30px;">
                        <div id="stat-box-admin">
                            <div class="content">
                                <?php echo $countCust; ?>
                            </div>
                            <div class="title">Customers</div>
                        </div>
                    </div>
                    
                    <div class="col-md-3" style="margin-bottom: 30px;">
                        <div id="stat-box-admin">
                            <div class="content">
                                <?php echo $countCat; ?>
                            </div>
                            <div class="title">Categories</div>
                        </div>
                    </div>
                    
                    <div class="col-md-3" style="margin-bottom: 30px;">
                        <div id="stat-box-admin">
                            <div class="content">
                                240
                            </div>
                            <div class="title">Page Count</div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br /><br />
            
            <?php if ($_SESSION['privilege'] == 1): ?>
            <!-- Plot Number of Advertisements By Month -->
            <div class="col-md-6">
                <h5>Advertisements by Month - 2020</h5>
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="month-ads" style="width:100%;height:400px;"></canvas>    
                    </div>
                </div>
            </div>

            <!-- Plot Views By Month -->
            <div class="col-md-6">
                <h5>Views By Month - 2020</h5>
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="month-views" style="width:100%;height:400px;"></canvas>    
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <br /><br />
        <!-- End of Statistics -->

        <!-- Latest Posts -->
        <div class="row">
        <div class="col-md-12">
                <h3><i class="fas fa-ad"></i> Latest Advertisements</h3>
                <div class="row">
                    <?php
                        if ($advertisement) {
                            foreach ($advertisement as $advert) {
                                echo '<div class="col-md-6" style="margin-bottom:30px;">';
                                    echo '<div class="advert-slider">';
                                        echo '<div class="advert-slider__wrp swiper-wrapper">';
                                            echo '<div class="advert-slider__item swiper-slide">';
                                                echo '<div class="advert-slider__img">';
                                                    foreach($media as $img) {
                                                        if (($img['ad_id'] == $advert['id']) && ($img['featured'] == 1)) {
                                                            echo '<img src="'.base_url().'/assets/uploads/'.$img['path'].'" alt="'.$img['alt'].'"/>';
                                                            break;
                                                        }
                                                    }
                                                echo '</div>';

                                                echo '<div class="advert-slider__content">';
                                                    echo '<span class="advert-slider__code">'.$advert['post_date'].' To '.$advert['end_date'].'</span>';
                                                    echo '<div class="advert-slider__tile">'.$advert['title'].'</div>';
                                                    echo '<div class="advert-sider__text">'.substr($advert['description'], 0, 100).'</div>';
                                                    echo '<a href="#" class="advert-slider__button">Read More</a>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';

                                        echo '<div class="advert-slider__pagination"></div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="col-md-12">';
                                echo '<div class="alert alert-warning" role="alert">';
                                    echo 'No Advertisements Found!';
                                echo '</div>';
                            echo '</div>';
                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <br /><br />
        <!-- End Posts -->
        
        <!-- Categories -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fas fa-list-alt"></i> Categories</h3>
                <p>All Categories of Products</p>

                <div class="row">
                    <div class="swiper-container" style="padding-top: 20px;padding-bottom: 40px;">
                        <div class="swiper-wrapper">
                            <?php
                                foreach ($category as $cat) {
                                    echo '<div class="swiper-slide">';
                                        echo '<div class="col-12">';
                                            echo '<div class="admin-cat">';
                                                echo '<div class="row">';
                                                    echo '<div class="col-4 my-auto">';
                                                        echo '<img class="img-icon" src="'.base_url().'/assets/uploads/'.$cat['category_icon'].'" alt="Icon for '.$cat['category_name'].' Category"/>';
                                                    echo '</div>';

                                                    echo '<div class="col-8 my-auto">';
                                                        echo '<a href="#" alt="Category - '.$cat['category_name'].'">'.$cat['category_name'].'</a>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <br /><br />
        <!-- End Categories -->

        <!-- Latest Customers -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fas fa-users"></i> Latest Customers</h3>
                <p>Latest 3 Customers</p>
                <div class="row">
                    <?php
                        if ($customer) {
                            foreach ($customer as $cust) {
                                echo '<div class="col-4">';
                                    echo '<div id="latest-customer-admin">';
                                        echo '<div class="name">';
                                            echo $cust['fname'].' '.$cust['lname'];
                                        echo '</div>';
                                        echo '<hr>';
                                        echo '<div class="content">';
                                            echo '<div class="email">'.$cust['email'].'</div>';
                                            echo '<div class="phone">'.$cust['contact_no'].'</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<div class="col-md-12">';
                                echo '<div class="alert alert-warning" role="alert">';
                                    echo 'No Advertisements Found!';
                                echo '</div>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- End of Latest Customers -->
        <br /><br />

        <!-- Districts -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fas fa-globe-asia"></i> Districts</h3>
                <p>All Districts in Sri Lanka</p>
                <div class="row">
                    <?php
                        foreach ($district as $dist) {
                            echo '<div class="col-md-2">';
                                echo '<a href="#" alt="'.$dist.'">'.$dist.'</a>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <br /><br />
        <!-- End of Districts -->
    </div>
</main>
<!-- End Main Content -->

<!-- Footer -->
<footer class="bg-blue">
    <div class="row">
        <div class="col-md-4">
            <img src="https://w.ikman-st.com/dist/img/ikman/all/logos/header-33e2ba1f.png" alt="Ad Portal"/>
            <p style="font-weight: 400;"><br>125A, Main Street,<br>Colombo,<br>Sri Lanka</p>
            <p style="font-weight: 400; font-size: 0.75em;">&copy; <?php echo date('Y'); ?>. Developed by <a href="http://zenolk.com" alt="Zeno Innovations (Pvt) Ltd">Zeno Innovations</a>.</p>
        </div>

        <div class="col-md-4">
            <ul class="list-unstyled text-small">
                <h4>Learn More</h4>
                <li><a href="#">Advertising</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Membership</a></li>
            </ul>
        </div>

        <div class="col-md-4">
            <ul class="list-unstyled text-small">
                <h4>Company</h4>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Sitemap</a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- End Footer -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
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
<script>
    new Chart(document.getElementById("month-ads"), {
        type: 'line',
        data: {
        labels: ['January','February','March','April','May','June','July','August','September','October','November','December'],
        datasets: [{ 
            data: [0,0,0,0,0,10,19,45,78,105,341,289],
            label: "Advertisements",
            borderColor: "#3e95cd",
            fill: false
            }
        ]
        },
        options: {
        title: {
            display: true,
            text: 'Number of Advertisements by Month'
        }
        }
    });

    new Chart(document.getElementById("month-views"), {
        type: 'line',
        data: {
        labels: ['January','February','March','April','May','June','July','August','September','October','November','December'],
        datasets: [{ 
            data: [0,0,0,0,0,10,19,45,78,105,341,289],
            label: "Views",
            borderColor: "#3e95cd",
            fill: false
            }
        ]
        },
        options: {
        title: {
            display: true,
            text: 'Number of Advertisements by Month'
        }
        }
    });

    var swiper = new Swiper('.blog-slider', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      mousewheel: {
        invert: false,
      },
      // autoHeight: true,
      pagination: {
        el: '.blog-slider__pagination',
        clickable: true,
      }
    });

    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
</script>
</body>
</html>