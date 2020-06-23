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
                        <h3><i class="fas fa-ad"></i> Edit Advertisement</h3>
                        <span class="d-none alert alert-success mb-3" id="res_message"></span>
                        <?php
                            if (session('msg')) {
                                echo '<div class="alert alert-success" role="alert">'.session('msg').'</div>';
                            }

                            if (session('error')) {
                                echo '<div class="alert alert-danger" role="alert">'.session('error').'</div>';
                            }
                        ?>
                        <br />
                        <form action="<?php echo base_url('advertisement/update');?>" name="edit-advertisement" id="edit-advertisement" method="post" accept-charset="utf-8">

                            <input type="hidden" name="advertisement_id" class="form-control" id="advertisement_id" value="<?php echo $advertisement['id']; ?>">
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="custom-select" required>
                                            <?php
                                                foreach ($category as $cat) {
                                                    if ($cat['id'] == $advertisement['cat_id']) {
                                                        echo '<option value="'.$cat['id'].'" selected>'.$cat['category_name'].'</option>';
                                                    } else {
                                                        echo '<option value="'.$cat['id'].'">'.$cat['category_name'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="subcategory">Subcategory</label>
                                        <select name="subcategory" id="subcategory" class="custom-select" required>
                                            <?php
                                                foreach ($subcategory as $subcat) {
                                                    if ($subcat['id'] == $advertisement['subcat_id']) {
                                                        echo '<option value="'.$subcat['id'].'" selected>'.$subcat['sub_category_name'].'</option>';
                                                    } else {
                                                        echo '<option value="'.$subcat['id'].'">'.$subcat['sub_category_name'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="district">District</label>
                                        <select name="district" id="district" class="custom-select" required>
                                            <?php
                                                foreach ($district as $dist) {
                                                    if ($dist == $selectedDistrict) {
                                                        echo '<option value="'.$dist.'" selected>'.$dist.'</option>';
                                                    } else {
                                                        echo '<option value="'.$dist.'">'.$dist.'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <select name="location" id="location" class="custom-select" required>
                                            <?php
                                                foreach ($location as $loc) {
                                                    if ($loc['city'] == $selectedLocation) {
                                                        echo '<option value="'.$loc['id'].'" selected>'.$loc['city'].'</option>';
                                                    } else {
                                                        echo '<option value="'.$loc['id'].'">'.$loc['city'].'</option>';
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Please enter project title" value="<?php echo $advertisement['title']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Please enter end date" value="<?php echo $advertisement['end_date']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required><?php echo $advertisement['description']; ?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="price">Price (Rs.)<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="price" id="price" min="0.01" step="0.01" value="<?php echo $advertisement['price']; ?>" placeholder="Price" required/>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                    <?php 
                                        
                                        if ($advertisement['negotiate'] == 1) {
                                            echo '<input class="form-check-input" type="checkbox" id="negotiate" name="negotiate" checked>';
                                        } else {
                                            echo '<input class="form-check-input" type="checkbox" id="negotiate" name="negotiate">';
                                        }
                                    ?>
                                    <label class="form-check-label" for="negotiate">
                                        Negotiate
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="send_form" class="btn btn-orange">Update Advertisement</button>
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
            <img src="<?php echo base_url(); ?>/assets/images/logo final 3-3.png" alt="Beluxa Advertisement Portal" style="width:156px;"/>
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
    if ($("#edit-categoryObj").length > 0) {
        $("#edit-categoryObj").validate({
            rules: {
                category_name: {
                    required: true,
                },
                category_desc: {
                    required: true,
                },
            },
            
            messages: {
                category_name: {
                    required: "Please enter category name",
                },
                category_desc: {
                    requried: "Please enter category description",
                }
            },
        })
    }

    // Add TinyMCE to Description
    tinymce.init({
      selector: '#description',
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
    });
</script>
</body>
</html>