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
                        <h3><i class="fas fa-ad"></i> Edit User</h3>
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
                        <form action="<?php echo base_url('user/update');?>" name="edit-user" id="edit-user" method="post" accept-charset="utf-8">

                            <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?php $user['id']; ?>">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name<span style="color:red;">*</span></label>
                                        <input type="text" name="fname" id="fname" class="form-control" placeholder="Please Enter First Name" value="<?php echo $user['fname']; ?>" required> 
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span style="color:red;">*</span></label>
                                        <input type="text" name="lname" id="lname" class="form-control" placeholder="Please Enter Last Name" value="<?php echo $user['lname']; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">Username<span style="color:red;">*</span></label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Please Enter Username" value="<?php echo $user['username']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email<span style="color:red;">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Please Enter Email" value="<?php echo $user['email']; ?>">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password">Password<span style="color:red;">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Please Enter Password">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="confirmPassword">Confirm Password<span style="color:red;">*</span></label>
                                        <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Please Re-enter Password">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob">Date Of Birth<span style="color:red;">*</span></label>
                                <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $user['dob']; ?>" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="privilege">Privilege<span style="color:red;">*</span></label>
                                </div>
                                <select class="custom-select" id="privilege" name="privilege" required>
                                    <?php
                                      if ($user['privilege'] == 1) {
                                          echo '<option value="1">Administrator</option>';
                                      } else {
                                          echo '<option value="2">Poster</option>';
                                      }
                                    ?>
                                <select>
                            </div>

                            <div class="form-group">
                                <label for="contact_no">Contact Number<span style="color:red;">*</span></label>
                                <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Please Enter Contact Number" value="<?php echo $user['contact_no']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Notes</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Please Enter Notes" value="<?php echo $user['description']; ?>">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nic">National Identity Card<span style="color:red;">*</span></label>
                                        <input type="text" name="nic" id="nic" class="form-control" placeholder="Please Enter NIC" value="<?php echo $user['nic']; ?>">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="passport_no">Passport Number<span style="color:red;">*</span></label>
                                        <input type="text" name="passport_no" id="passport_no" class="form-control" placeholder="Please Enter Passport Number" value="<?php echo $user['passport_no']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label for="status" class="input-group-text">Status<span style="color:red;">*</span></label>
                                </div>
                                <select class="custom-select" id="status" name="status" required>
                                    <?php
                                        if ($user['status'] == 0) {
                                            echo '<option value="1" selected>Active</option>';
                                        } else {
                                            echo '<option value="0">Inactive</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="address">Address<span style="color:red;">*</span></label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Please Enter Address" value="<?php echo $user['address']; ?>" required>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="country">Country<span style="color:red;">*</span></label>
                                        <input type="text" name="country" id="country" class="form-control" placeholder="Please Enter Country" value="<?php echo $user['country']; ?>" required>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="district">District<span style="color:red;">*</span></label>
                                        <input type="text" name="district" id="district" class="form-control" placeholder="Please Enter District" value="<?php echo $user['district']; ?>" required>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="city">City<span style="color:red;">*</span></label>
                                        <input type="text" name="city" id="city" class="form-control" placeholder="Please Enter City" value="<?php echo $user['city']; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="send_form" class="btn btn-primary">Update User</button>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://kit.fontawesome.com/cdee1294ee.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>               
</body>
</html>

<body>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">
        <!-- <form action="<?php //echo base_url('user/update');?>" name="edit-user" id="edit-user" method="post" accept-charset="utf-8">
 
           <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?php //echo $user['user_id'] ?>">
 
           <div class="form-group">
            <label for="formGroupExampleInput">User Name</label>
            <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="Please enter username">
             
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Password</label>
            <input type="password" name="password" class="form-control" id="formGroupExampleInput">
             
          </div> 
 
          <div class="form-group">
            <label for="email">Email Id</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
             
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">First name</label>
            <input type="text" name="fname" class="form-control" id="formGroupExampleInput" placeholder="Please enter first name">
             
          </div> 

          <div class="form-group">
            <label for="formGroupExampleInput">Last name</label>
            <input type="text" name="lname" class="form-control" id="formGroupExampleInput" placeholder="Please enter last name">
             
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Date</label>
            <input type="date" name="dob" class="form-control" id="formGroupExampleInput">
             
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Privilege</label>
            </div>
            <select class="custom-select" id="privilege" name="privilege">
                <option selected>Choose...</option>
                <option value="1">Admin</option>
                <option value="2">Ad Poster</option>
            </select>   
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Contact No</label>
            <input type="text" name="contact_no" class="form-control" id="formGroupExampleInput" placeholder="Please enter contact no">
             
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Description</label>
            <input type="text" name="description" class="form-control" id="formGroupExampleInput" placeholder="Please enter description">
             
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
            </div>
            <select class="custom-select" id="status" name="status">
                <option selected>Choose...</option>
                <option value="1">Activate</option>
                <option value="0">De-activate</option>
            </select>   
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">NIC</label>
            <input type="text" name="nic" class="form-control" id="formGroupExampleInput" placeholder="Please enter nic">
             
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Passport No</label>
            <input type="text" name="passport_no" class="form-control" id="formGroupExampleInput" placeholder="Please enter passport no">
             
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Address</label>
            <input type="text" name="address" class="form-control" id="formGroupExampleInput" placeholder="Please enter address">
             
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Country</label>
            <input type="text" name="country" class="form-control" id="formGroupExampleInput" placeholder="Please enter country">
             
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">City</label>
            <input type="text" name="city" class="form-control" id="formGroupExampleInput" placeholder="Please enter city">
             
          </div> 
 
          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
          
        </form> -->
      </div>
 
    </div>
  
</div>
 <script>
//    if ($("#edit-user").length > 0) {
//       $("#edit-user").validate({
      
//     rules: {
//       name: {
//         required: true,
//       },
  
//       email: {
//         required: true,
//         maxlength: 50,
//         email: true,
//       },   
//     },
//     messages: {
        
//       name: {
//         required: "Please enter name",
//       },
//       email: {
//         required: "Please enter valid email",
//         email: "Please enter valid email",
//         maxlength: "The email name should less than or equal to 50 characters",
//         }, 
//     },
//   })
// }
</script>
</body>
</html>