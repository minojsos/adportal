<!-- Main Content -->
<main>
    <div class="container-fluid">
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
                        <h3><i class="fas fa-ad"></i> Add New Advertisement</h3>
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

                        <?php 
                        if ($step == 1) {
                        ?>

                        <form action="<?php echo base_url('advertisement/step2');?>" name="advertisement_create" id="advertisement_create" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cat_id"> <b>Pick a Category</b><span style="color:red;">*</span></label>
                                        <div class="row">
                                        <?php
                                            foreach ($category as $cat) {
                                                echo '<div class="col-md-3" style="margin-bottom: 20px;">';
                                                    echo '<div class="admin-cat">';
                                                        echo '<div class="row">';
                                                            echo '<div class="col-1 my-auto" style="padding-left: 20px;">';
                                                                echo '<input class="form-check-input" type="radio" name="cat_id" id="cat_id" value="'.$cat['id'].'" onchange="category_select(this);">';
                                                            echo '</div>';

                                                            echo '<div class="col-3 my-auto">';
                                                                echo '<img class="img-icon" src="'.base_url().'/assets/uploads/'.$cat['category_icon'].'" alt="Icon for '.$cat['category_name'].' Category"/>';
                                                            echo '</div>';
            
                                                            echo '<div class="col-7 my-auto">';
                                                                echo '<a style="font-size: 12px;" href="#" alt="Category - '.$cat['category_name'].'">'.$cat['category_name'].'</a>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                                foreach ($category as $cat) {
                                    echo '<div class="row" style="display:none;" id="category_'.$cat['id'].'">';
                                        echo '<div class="col-md-12">';
                                            echo '<div class="input-group mb-3">';
                                                echo '<div class="input-group-prepend">';
                                                    echo '<label class="input-group-text" for="subcat_id">Subcategory<span style="color:red;">*</span></label>';
                                                echo '</div>';

                                                echo '<select class="custom-select" id="cat_'.$cat['id'].'" name="cat_'.$cat['id'].'">';
                                                    echo '<option selected></option>';
                                                    foreach ($subcategories as $sub_cat) {
                                                        if ($sub_cat['category_id'] == $cat['id']) {
                                                            echo '<option value="'.$sub_cat['id'].'">'.$sub_cat['sub_category_name'].'</option>';
                                                        }
                                                    }
                                                echo '</select>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';  
                                }
                            ?>

                            <div class="form-group">
                                <button type="submit" id="send_form" name="send_form" class="btn btn-orange">Next</button>
                            </div>

                        </form>
                        
                        <?php
                        } elseif ($step == 2) {
                        ?>

                        <form action="<?php echo base_url('advertisement/step3');?>" name="advertisement_create" id="advertisement_create" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            
                            <input type="hidden" name="cat_id" class="form-control" id="cat_id" value="<?php echo $cat_id; ?>">
                            <input type="hidden" name="subcat_id" class="form-control" id="subcat_id" value="<?php echo $subcat_id; ?>">
                            
                            <div class="row">
                                <div class="col-md-12" style="padding: 30px; border-bottom: 1px solid lightgray;">
                                    <b><i class="fas fa-list fa-xs"></i> Category &rarr; <?php echo $cat_name; ?> &rarr; <?php echo $subcat_name; ?></b>
                                </div>
                            </div>
                            <br />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="location_id"> <b>Pick a Location</b><span style="color:red;">*</span></label>
                                        <div class="row">
                                            <?php
                                                foreach ($district as $dist) {
                                                    echo '<div class="col-md-3" style="margin-bottom: 20px;">';
                                                        echo '<div class="admin-cat">';
                                                            echo '<div class="row">';
                                                                echo '<div class="col-2" style="padding-left: 20px;">';
                                                                    echo '<input class="form-check-input" type="radio" name="location_id" id="location_id" value="'.$dist.'" onchange="district_select(this);">';
                                                                echo '</div>';

                                                                echo '<div class="col-10 my-auto">';
                                                                    echo '<a style="font-size: 12px;" href="#" alt="Location - '.$dist.'">'.$dist.'</a>';
                                                                echo '</div>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                foreach ($district as $dist) {
                                    echo '<div class="row" style="display:none;" id="'.$dist.'">';
                                        echo '<div class="col-md-12">';
                                            echo '<div class="input-group mb-3">';
                                                echo '<div class="input-group-prepend">';
                                                    echo '<label class="input-group-text" for="loc_id">City<span style="color:red;">*</span></label>';
                                                echo '</div>';

                                                echo '<select class="custom-select" id="'.$dist.'" name="'.$dist.'">';
                                                    echo '<option selected></option>';
                                                    foreach ($location as $loc) {
                                                        if ($loc['district'] == $dist) {
                                                            echo '<option value="'.$loc['id'].'">'.$loc['city'].'</option>';
                                                        }
                                                    }
                                                echo '</select>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';  
                                }
                            ?>

                            <div class="form-group">
                                <button type="submit" id="send_form" name="send_form" class="btn btn-orange">Next</button>
                            </div>
                        </form>

                        <?php
                        } elseif ($step == 3) {
                        ?>
                        
                        <form action="<?php echo base_url('advertisement/store'); ?>" name="advertisement_create" id="advertisement_create" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            
                            <input type="hidden" name="cat_id" class="form-control" id="cat_id" value="<?php echo $cat_id; ?>">
                            <input type="hidden" name="subcat_id" class="form-control" id="subcat_id" value="<?php echo $subcat_id; ?>">
                            <input type="hidden" name="loc_id" class="form-control" id="loc_id" value="<?php echo $loc_id; ?>">

                            <div class="row">
                                <div class="col-md-12" style="padding: 30px; border-bottom: 1px solid lightgray;">
                                    <b><i class="fas fa-list fa-xs"></i> Category &rarr; <?php echo $cat_name; ?> &rarr; <?php echo $subcat_name; ?></b>
                                </div>
                            </div>
                            <br />

                            <div class="row">
                                <div class="col-md-12" style="padding: 30px; border-bottom: 1px solid lightgray;"> 
                                    <b><i class="fas fa-map-pin fa-xs"></i> Location &rarr; <?php echo $dist_name; ?> &rarr; <?php echo $city_name; ?></b>
                                </div>
                            </div>
                            <br />

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="customer_id">Customer<span style="color:red;">*</span></label>
                                </div>
                                <select name="customer_id" id="customer_id" class="custom-select" requried>
                                    <option selected></option>
                                    <?php
                                        foreach($customer as $customerObj) {
                                            echo '<option value="'.$customerObj['id'].'">'.$customerObj['fname'].' '.$customerObj['lname'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title<span style="color:red;">*</span></label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Please Enter Title" required>
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date<span style="color:red;">*</span></label>
                                <input type="date" name="end_date" class="form-control" id="end_date" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description<span style="color:red;">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="price">Price (Rs.)<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="price" id="price" min="0.01" step="0.01" placeholder="Price"/>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                    <input class="form-check-input" type="checkbox" value="" id="negotiate" name="negotiate">
                                    <label class="form-check-label" for="negotiate">
                                        Negotiate
                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h3>Add Photos</h3>
                                    <p><b><small>Upto 5 Photos</small></b></p>
                                    
                                    <div class="upload-image" id="one">
                                        <div class="row">
                                            <div class="col-3 my-auto">
                                                <div class="placeholder">
                                                    <img style="width: 100%;height:270px;" src="<?php echo base_url().'\assets\images\placeholder.png'; ?>" id="img_one_preview" name="img_one_preview" alt="Preview Featured Image"/>
                                                </div>
                                            </div>

                                            <div class="col-9 my-auto">
                                                <div class="btn btn-orange">
                                                    Select a Photo
                                                    <input type="file" name="img_one" id="img_one" class="hide-file" onchange="readURL(this,'#img_one_preview','two');" required>
                                                </div>
                                                <br /><br />
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="img_one_title" id="img_one_title" class="form-control" placeholder="Image Title"/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="alt_text">Alt Text</label>
                                                    <input type="text" name="img_one_alt_text" id="img_one_alt_text" class="form-control" placeholder="Alernate Text"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="upload-image" id="two" style="display:none;">
                                        <div class="row">
                                            <div class="col-3 my-auto">
                                                <div class="placeholder">
                                                    <img style="width: 100%;height:270px;" src="<?php echo base_url().'\assets\images\placeholder.png'; ?>" id="img_two_preview" name="img_two_preview" alt="Preview Featured Image"/>
                                                </div>
                                            </div>

                                            <div class="col-9 my-auto">
                                                <div class="btn btn-orange">
                                                    Select a Photo
                                                    <input type="file" name="img_two" id="img_one" class="hide-file" onchange="readURL(this,'#img_two_preview','three');">
                                                </div>
                                                <br /><br />
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="img_two_title" id="img_two_title" class="form-control" placeholder="Image Title"/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="alt_text">Alt Text</label>
                                                    <input type="text" name="img_two_alt_text" id="img_two_alt_text" class="form-control" placeholder="Alernate Text"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="upload-image" id="three" style="display:none;">
                                        <div class="row">
                                            <div class="col-3 my-auto">
                                                <div class="placeholder">
                                                    <img style="width: 100%;height:270px;" src="<?php echo base_url().'\assets\images\placeholder.png'; ?>" id="img_three_preview" name="img_three_preview" alt="Preview Featured Image"/>
                                                </div>
                                            </div>

                                            <div class="col-9 my-auto">
                                                <div class="btn btn-orange">
                                                    Select a Photo
                                                    <input type="file" name="img_three" id="img_three" class="hide-file" onchange="readURL(this,'#img_three_preview','four');">
                                                </div>
                                                <br /><br />
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="img_three_title" id="img_three_title" class="form-control" placeholder="Image Title"/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="alt_text">Alt Text</label>
                                                    <input type="text" name="img_three_alt_text" id="img_three_alt_text" class="form-control" placeholder="Alernate Text"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="upload-image" id="four" style="display:none;">
                                        <div class="row">
                                            <div class="col-3 my-auto">
                                                <div class="placeholder">
                                                    <img style="width: 100%;height:270px;" src="<?php echo base_url().'\assets\images\placeholder.png'; ?>" id="img_four_preview" name="img_four_preview" alt="Preview Featured Image"/>
                                                </div>
                                            </div>

                                            <div class="col-9 my-auto">
                                                <div class="btn btn-orange">
                                                    Select a Photo
                                                    <input type="file" name="img_four" id="img_four" class="hide-file" onchange="readURL(this,'#img_four_preview',null);">
                                                </div>
                                                <br /><br />
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="img_four_title" id="img_four_title" class="form-control" placeholder="Image Title"/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="alt_text">Alt Text</label>
                                                    <input type="text" name="img_four_alt_text" id="img_four_alt_text" class="form-control" placeholder="Alernate Text"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />

                            <div class="form-group">
                                <button type="submit" id="send_form" class="btn btn-orange">Save Advertisement</button>
                            </div>
                            
                        </form>

                        <?php
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
        <br /><br /><br />
    </div>
</main>
<!-- End Main Content -->

<!-- Footer -->
<footer class="bg-blue">
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
    if ($("#advertisement_create").length > 0) {
        $("#advertisement_create").validate({
    
            rules: {
                title: {
                    required: true,
                },
                cat_id: {
                    required: true,
                },
                subcat_id: {
                    required: true,
                },
                end_date: {
                    required: true,
                },
                description: {
                    required: true,
                },
                customer_id: {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: "Please enter title",
                },
                cat_id: {
                    required: "Please select category",
                },
                subcat_id: {
                    required: "Please select subcategory",
                },
                end_date: {
                    required: "Please select end date",
                },
                description: {
                    required: "Please enter category description",
                },
                customer_id: {
                    required: "Please select customer",
                },
            },
        })
    }

    var prevCat;
    var prevDist;

    function category_select(form) {
        var element = "category_"+form.value;
        document.getElementById(element).style.display = "block";
        if (prevCat != null) {
            document.getElementById(prevCat).style.display = "none";
        }
        prevCat=element;
    }

    function district_select(form) {
        var element = form.value;
        document.getElementById(element).style.display = "block";
        if (prevDist != null) {
            document.getElementById(prevDist).style.display = "none";
        }
        prevDist = element;
    }

    function readURL(input, preview, next) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(preview).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
        
        // Set Current Title and Alternate Title to Required as an image has been uploaded
        document.getElementById(input.name+"_title").required = true;
        document.getElementById(input.name+"_alt_text").required = true;

        // If another image can be uploaded, set that to display
        if (next != null) {
            document.getElementById(next).style.display="block";
        }
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

    // AutoComplete Customer
    $(document).ready(function(){

        // Initialize 
        $( "#cust" ).autocomplete({
        source: function( request, response ) {
            // Fetch data
            $.ajax({
            url: "<?=base_url()?>/customer/fetch",
            type: 'post',
            dataType: "json",
            data: {
                query: request.term
            },
            success: function( data ) {
                response( data );
            }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#cust').val(ui.item.label); // display the selected text
            $('#userid').val(ui.item.value); // save selected id to input
            return false;
        }
        });

    });
</script>
</body>
</html>