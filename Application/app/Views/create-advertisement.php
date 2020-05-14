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
        <form action="<?php echo base_url('advertisementController/store');?>" name="advertisement_create" id="advertisement_create" method="post" accept-charset="utf-8">
 
          <input hidden type="text" name="user_id" class="form-control" id="formGroupExampleInput" value="<?php echo $_SESSION['user_id']; ?>">

          <div class="row">
            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Category</label>
                    </div>
                    <select class="custom-select" id="cat_id" name="cat_id">
                        <option selected>Choose...</option>
                        <?php
                            foreach($category as $categoryObj):
                                ?>
                                    <option value="<?php echo $categoryObj['category_id']; ?>"><?php echo $categoryObj['category_name']; ?></option>
                                <?php
                             endforeach;
                        ?>
                    </select>   
                 </div>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Sub category</label>
                    </div>
                    <select class="custom-select" id="subcat_id" name="subcat_id">
                        <option selected>Choose...</option>
                        <?php
                            foreach($subcategories as $subcategoryObj):
                                ?>
                                    <option value="<?php echo $subcategoryObj['sub_category_id']; ?>"><?php echo $subcategoryObj['sub_category_name']; ?></option>
                                <?php
                             endforeach;
                        ?>
                    </select>   
                 </div>
            </div>
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Title</label>
            <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Please enter title">
          </div>
 
          <div class="row">
            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">End date</label>
                    </div>
                    <input type="date" name="end_date" class="form-control" id="formGroupExampleInput"> 
                 </div>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Sub category</label>
                    </div>
                    <select class="custom-select" id="status" name="status">
                        <option value="0">In-active</option>
                    </select>   
                 </div>
            </div>
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
          </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Customer</label>
                </div>
                <select class="custom-select" id="customer_id" name="customer_id">
                    <option selected>Choose...</option>
                    <?php
                        foreach($subcategories as $subcategoryObj):
                            ?>
                                <option value="<?php echo $subcategoryObj['sub_category_id']; ?>"><?php echo $subcategoryObj['sub_category_name']; ?></option>
                            <?php
                        endforeach;
                    ?>
                </select>   
            </div>

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
 
    </div>
  
</div>
 <script>
   if ($("#advertisement_create").length > 0) {
      $("#advertisement_create").validate({
      
    rules: {
        title: {
        required: true,
      },
  
    },
    messages: {
        
        title: {
        required: "Please enter title",
      },

    },
  })
}
</script>
</body>
</html>