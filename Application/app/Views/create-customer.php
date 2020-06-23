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
                        <h3><i class="fas fa-ad"></i> Add New Customer</h3>
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
                        <form action="<?php echo base_url('customer/store');?>" name="customer_create" id="customer_create" method="post" accept-charset="utf-8">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name<span style="color:red;">*</span></label>
                                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Please Enter First Name" required> 
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span style="color:red;">*</span></label>
                                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Please Enter Last Name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email<span style="color:red;">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Please Enter Email">
                            </div>

                            <div class="form-group">
                                <label for="contact_no">Contact Number<span style="color:red;">*</span></label>
                                <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Please Enter Contact Number" required>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">Password<span style="color:red;">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Please Enter Password" required>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="confirmPassword">Confirm Password<span style="color:red;">*</span></label>
                                        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Please Re-enter Password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob">Date Of Birth<span style="color:red;">*</span></label>
                                <input type="date" name="dob" id="dob" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Notes</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Please Enter Notes">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nic">National Identity Card<span style="color:red;">*</span></label>
                                        <input type="text" name="nic" id="nic" class="form-control" placeholder="Please Enter NIC" required>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="passport_no">Passport Number<span style="color:red;">*</span></label>
                                        <input type="text" name="passport_no" id="passport_no" class="form-control" placeholder="Please Enter Passport Number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Address<span style="color:red;">*</span></label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Please Enter Address" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="city">City<span style="color:red;">*</span></label>
                                </div>
                                <select name="city" id="city" class="custom-select" requried>
                                    <option selected></option>
                                    <?php
                                        foreach($location as $loc) {
                                            echo '<option value="'.$loc['city'].'">'.$loc['city'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="send_form" class="btn btn-orange">Save Customer</button>
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
</body>
</html>