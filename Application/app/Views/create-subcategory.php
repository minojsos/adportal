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
                        <h3><i class="fas fa-ad"></i> Add New Subcategory</h3>
                        <p><span style="color:red;">*</span> Required</p>
                        <?php
                            if (session('msg')) {
                                echo '<div class="alert alert-success" role="alert">'.session('msg').'</div>';
                            }

                            if (session('error')) {
                                echo '<div class="alert alert-danger" role="alert">'.session('error').'</div>';
                            }
                        ?>
                        <br />
                        <form action="<?php echo base_url('subcategories/store');?>" name="subcategory_create" id="subcategory_create" method="post" accept-charset="utf-8">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="cat_id">Category<span style="color:red;">*</span></label>
                                </div>
                                <select class="custom-select" id="category_id" name="category_id" required>
                                    <option selected></option>
                                    <?php
                                        foreach($category as $categoryObj) {
                                            echo '<option value="'.$categoryObj['id'].'">'.$categoryObj['category_name'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sub_category_name">Subcategory Name<span style="color:red;">*</span></label>
                                <input type="text" name="sub_category_name" class="form-control" id="sub_category_name" placeholder="Please enter subcategory name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="sub_category_desc">Subcategory Description</label>
                                <input type="text" name="sub_category_desc" class="form-control" id="sub_category_desc" placeholder="Please enter subcategory description">
                            </div>

                            <div class="form-group">
                                <button type="submit" id="send_form" class="btn btn-orange">Save Subcategory</button>
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
<footer class="bg-dark">
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>               
<script>
    if ($("#subcategory_create").length > 0) {
        $("#subcategory_create").validate({ 
            rules: {
                sub_category_name: {
                    required: true,
                },
                sub_category_desc: {
                    required: true,
                },
            },
            messages: { 
                sub_category_name: {
                    required: "Please enter subcategory name",
                },
                sub_category_desc: {
                    required: "Please enter subcategory description",
                },
            },
        })
    }
</script>
</body>
</html>