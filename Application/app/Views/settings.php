
<!-- Main Content -->
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="welcome-message">Welcome to Ad Portal</h1>
                <hr>
                <h6>You are logged in as <b><?php echo session()->get('firstname').' '.session()->get('lastname'); ?></b></h6>
            </div>
        </div>
        <br />

        <!-- All Categories -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <?= \Config\Services::validation()->listErrors(); ?>
                    </div>
                </div>
                <br />

                <div class="row">
                    <div class="col-md-12">
                        <h3><i class="fas fa-ad"></i> Settings</h3>
                        <span class="d-none alert alert-success mb-3" id="res_message"></span>
                        <br />
                        <form action="<?php echo base_url('setting/store');?>" name="categoryObj_create" id="categoryObj_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <?php
                                // Load Settings Data from Database.
                                foreach($settings as $setting) {
                                    if ($setting['option_name'] == 'site_title') {
                                        echo '<div class="form-group">';
                                            echo '<label for="site_title">Website Title</label>';
                                            echo '<input type="text" name="site_title" class="form-control" id="site_title" placeholder="Website Title" value="'.$setting['option_value'].'" required>';
                                        echo '</div>';
                                    }

                                    if ($setting['option_name'] == 'site_desc') {
                                        echo '<div class="form-group">';
                                            echo '<label for="site_desc">Website Description</label>';
                                            echo '<input type="text" name="site_desc" class="form-control" id="site_desc" placeholder="Website Description" value="'.$setting['option_value'].'" required>';
                                        echo '</div>';
                                    }

                                    if ($setting['option_name'] == 'site_logo') {
                                        echo '<div class="form-group">';
                                            echo '<label for="site_logo">Website Logo</label>';
                                            echo '<input type="file" name="site_logo" class="form-control" id="site_logo" value="'.$setting['option_value'].'" required>';
                                        echo '</div>';
                                    }

                                    if ($setting['option_name'] == 'admin_email') {
                                        echo '<div class="form-group">';
                                            echo '<label for="admin_email">Administrator Email</label>';
                                            echo '<input type="text" name="admin_email" class="form-control" id="admin_email" placeholder="Administrator Email" value="'.$setting['option_value'].'" required>';
                                        echo '</div>';
                                    }

                                    if ($setting['option_name'] == 'seo_desc') {
                                        echo '<div class="form-group">';
                                            echo '<label for="seo_desc">Meta Description</label>';
                                            echo '<input type="text" name="seo_desc" class="form-control" id="seo_desc" placeholder="Meta Description" value="'.$setting['option_value'].'" required>';
                                        echo '</div>';
                                    }

                                    if ($setting['option_name'] == 'seo_keywords') {
                                        echo '<div class="form-group">';
                                            echo '<label for="seo_keywords">Meta Keywords</label>';
                                            echo '<input type="text" name="seo_keywords" class="form-control" id="seo_keywords" placeholder="Meta Keywords" value="'.$setting['option_value'].'" required>';
                                        echo '</div>';
                                    }

                                    if ($setting['option_name'] == 'seo_authors') {
                                        echo '<div class="form-group">';
                                            echo '<label for="seo_authors">Meta Authors(s)</label>';
                                            echo '<input type="text" name="seo_authors" class="form-control" id="seo_authors" placeholder="Meta Author" value="'.$setting['option_value'].'" required>';
                                        echo '</div>';
                                    }

                                    if ($setting['option_name'] == 'site_favicon') {
                                        echo '<div class="form-group">';
                                            echo '<label for="site_favicon">Website Favicon</label>';
                                            echo '<input type="file" name="site_favicon" class="form-control" id="site_favicon" value="'.$setting['option_value'].'" required>';
                                        echo '</div>';
                                    }
                                 }
                            ?>

                            <div class="form-group">
                                <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
                            </div> 
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <br /><br /><br />
    </div>
</main>
<!-- End Main Content -->

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-md-4">
            <img src="https://w.ikman-st.com/dist/img/ikman/all/logos/header-33e2ba1f.png" alt="Ad Portal"/>
            <p style="font-weight: 400;"><br>125A, Main Street,<br>Colombo,<br>Sri Lanka</p>
            <p style="font-weight: 400; font-size: 0.75em;">&copy; <?php echo date('Y'); ?>. Developed by <a href="http://zenolk.com" alt="Zeno Innovations (Pvt) Ltd">Zeno Innovations</a>.</p>
        </div>

        <div class="col-md-4">
            <ul class="list-unstyled text-small">
                <h4>Learn More</h4>
                <li><a class="text-muted" href="#">Advertising</a></li>
                <li><a class="text-muted" href="#">Terms of Use</a></li>
                <li><a class="text-muted" href="#">Privacy Policy</a></li>
                <li><a class="text-muted" href="#">Membership</a></li>
            </ul>
        </div>

        <div class="col-md-4">
            <ul class="list-unstyled text-small">
                <h4>Company</h4>
                <li><a class="text-muted" href="#">Home</a></li>
                <li><a class="text-muted" href="#">About Us</a></li>
                <li><a class="text-muted" href="#">Contact Us</a></li>
                <li><a class="text-muted" href="#">Sitemap</a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- End Footer -->
<!-- Scripts - Data Table -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    <script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        if ($("#categoryObj_create").length > 0) {
            $("#categoryObj_create").validate({
        
                rules: {
                    category_name: {
                        required: true,
                    },
                },
                messages: {
                    category_name: {
                        required: "Please enter category name",
                    },
                },
            })
        }
    </script>
</body>
</html>