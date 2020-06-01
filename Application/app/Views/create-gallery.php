<body>
 <div class="container">
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <!-- <div class="row">
      <div class="col-md-9">
        <form name="upload_form" id="upload_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">
 
          <input hidden type="text" name="advertisement" class="form-control" id="formGroupExampleInput" value="<?php echo $advertisement['ad_id']; ?>">

          <div class="form-group">
            <label for="formGroupExampleInput">Gallery alt</label>
            <input type="text" name="gallery_alt" class="form-control" id="formGroupExampleInput" placeholder="Please enter gallery alt">
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">Gallery</label>
            <input type="file" id="gallery" name="gallery" size="33"/>
          </div>    

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>

      <div id="image_up" name="image_up">
      </div>
 
    </div> -->
    <div class="container">  
           <br /><br /><br />  
           <h3 align="center"><?php echo $title; ?></h3>  
           <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
                <input type="file" name="image_file" id="image_file" />  
                <br />  
                <br />  
                <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
           </form>  
           <br />  
           <br />  
           <div id="uploaded_image">  
           </div>  
      </div>  
  
</div>
 <script>
$(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
             console.log("Working1");
                $.ajax({  
                     url:"<?php echo base_url(); ?>/advertisementController/uploadGallery",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#uploaded_image').html(data);  
                     }  
                });  
             console.log("Working2");

           }  
      });  
 });  
//    if ($("#advertisement_create").length > 0) {
//       $("#advertisement_create").validate({
      
//     rules: {
//         title: {
//         required: true,
//       },
  
//     },
//     messages: {
        
//         title: {
//         required: "Please enter title",
//       },

//     },
//   })
// }
</script>
</body>
</html>