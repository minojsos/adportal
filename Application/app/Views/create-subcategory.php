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
        <form action="<?php echo base_url('subcategories/store');?>" name="subcategory_create" id="subcategory_create" method="post" accept-charset="utf-8">
 
          <div class="form-group">
            <label for="formGroupExampleInput">Sub-category Name</label>
            <input type="text" name="sub_category_name" class="form-control" id="formGroupExampleInput" placeholder="Please enter sub-category name">
             
          </div> 
 
          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
          
        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#subcategory_create").length > 0) {
      $("#subcategory_create").validate({
      
    rules: {
      sub_category_name: {
        required: true,
      },
    },
    messages: {
        
      sub_category_name: {
        required: "Please enter name",
      },
    },
  })
}
</script>
</body>
</html>