<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter 4 User Form With Validation Example</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
 
</head>
<body>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">
        <form action="<?php echo base_url('user/store');?>" name="user_create" id="user_create" method="post" accept-charset="utf-8">
 
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
          
        </form>
      </div>
 
    </div>
  
</div>
 <script>
//    if ($("#user_create").length > 0) {
//       $("#user_create").validate({
      
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