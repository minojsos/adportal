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
                        <h3><i class="fas fa-ad"></i> Edit Media</h3>
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
                        <form action="<?php echo base_url('media/update');?>" name="edit-mediaObj" id="edit-mediaObj" method="post" accept-charset="utf-8">

                            <input type="hidden" name="media_id" class="form-control" id="media_id" value="<?php echo $mediaObj['id']; ?>">
                            
                            <div class="upload-image" id="one">
                                <div class="row">
                                    <div class="col-3 my-auto">
                                        <div class="placeholder">
                                            <img style="width: 100%;height:270px;" src="<?php echo base_url().'/assets/uploads/'.$mediaObj['path']; ?>" id="img_preview" name="img_preview" alt="Preview Featured Image"/>
                                        </div>
                                    </div>

                                    <div class="col-9 my-auto">
                                        <div class="btn btn-orange">
                                            Select a Photo
                                            <input type="file" name="img" id="img" class="hide-file" onchange="readURL(this,'#img_preview');" value="<?php echo base_url().'/assets/uploads/'.$mediaObj['path']; ?>" required>
                                        </div>
                                        <br /><br />
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="img_one_title" id="img_one_title" class="form-control" value="<?php echo $mediaObj['title']; ?>" placeholder="Image Title" required/>
                                        </div>

                                        <div class="form-group">
                                            <label for="alt_text">Alt Text</label>
                                            <input type="text" name="img_one_alt_text" id="img_one_alt_text" class="form-control" value="<?php echo $mediaObj['alt']; ?>" placeholder="Alernate Text" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="send_form" class="btn btn-orange">Update Media</button>
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
    function readURL(input, preview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(preview).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>