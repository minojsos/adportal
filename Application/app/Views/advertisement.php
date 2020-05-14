<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Codeigniter 4 users List Example - Tutsmake.com</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
 
<div class="container mt-5">
    <a href="<?php echo site_url('advertisementController/create') ?>" class="btn btn-success mb-2">Create</a>
    <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="row">
      <div class="mx-auto">
         <h2>Advertisement</h2>
      </div>
  </div>

  <div class="row mt-3">

      <?php if($advertisement): ?>
      <?php foreach($advertisement as $advertisementObj): ?>
         <div class="col-10">
            <div class="card text-center bg-light mb-3">
               <div class="card-header">
                  <div class="row">
                     <div class="col-4">
                        <b>Posted by:</b> 
                        <?php
                           $x = false;
                           foreach($admin as $adminObj):
                              if($adminObj['user_id'] == $advertisementObj['user_id']){
                                 $x = true;
                                 echo $adminObj['username'];
                              }
                           endforeach;

                           if($x == false){
                              echo "Un named";
                           }
                        ?>
                     </div>
                     <div class="col-4">
                        <b><?php echo $advertisementObj['title']; ?></b>
                     </div>
                     <div class="col-4">
                        <a href="<?php echo base_url('advertisementController/edit/'.$advertisementObj['ad_id']);?>" class="btn btn-success">Edit</a>
                        <a href="<?php echo base_url('advertisementController/delete/'.$advertisementObj['ad_id']);?>" class="btn btn-danger">Delete</a>
                        <a href="<?php echo base_url('advertisementController/addGallery/'.$advertisementObj['ad_id']);?>" class="btn btn-warning">Add Photo</a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-3">
                        <b>Category: </b>
                        <?php
                           $x = false;
                           foreach($category as $categoryObj):
                              if($categoryObj['category_id'] == $advertisementObj['cat_id']){
                                 $x = true;
                                 echo $categoryObj['category_name'];
                              }
                           endforeach;

                           if($x == false){
                              echo "Un named";
                           }
                        ?>
                     </div>
                     <div class="col-3">
                        <b>Sub Category: </b>
                        <?php
                           $x = false;
                           foreach($subcategory as $subcategoryObj):
                              if($subcategoryObj['sub_category_id'] == $advertisementObj['subcat_id']){
                                 $x = true;
                                 echo $subcategoryObj['sub_category_name'];
                              }
                           endforeach;

                           if($x == false){
                              echo "Un named";
                           }
                        ?>
                     </div>
                     <div class="col-3">
                        <b>Post Date: </b> <?php echo $advertisementObj['post_date']; ?>
                     </div>
                     <div class="col-3">
                        <b>End Date: </b> <?php echo $advertisementObj['end_date']; ?>
                     </div>
                  </div>
                  <br/>
                  <br/>
                  <div class="row">
                     <div class="col-12">
                        <p class="card-text">
                           <b>Description: </b> <?php echo $advertisementObj['description']; ?>
                        </p>
                     </div>
                  </div>
                  <br/>
                  <br/>
                  <div class="row">
                     <div class="col-6">
                        <b>Customer: </b> Mr.Chirantha Kolonne
                     </div>
                     <div class="col-6">
                        <b>Approved Date: </b> <?php echo $advertisementObj['approved_date']; ?>
                     </div>
                  </div>
               </div>
               <div class="card-footer text-muted">
                  <div class="row">
                     <div class="col-3">
                        <img src="assets/images/like.PNG" title="Likes" height="30px" width="30px"> <p class="text-success"><?php echo $advertisementObj['positive_rating']; ?></p>
                     </div>
                     <div class="col-3">
                        <img src="assets/images/dislike.PNG" title="Dis-likes" height="30px" width="30px"> <p class="text-danger"><?php echo $advertisementObj['negative_rating']; ?></p>
                     </div>
                     <div class="col-3">
                        <img src="assets/images/report.jpg" title="Reports" height="30px" width="30px"> <p class="text-danger"> <?php echo $advertisementObj['report_count']; ?></p>
                     </div>
                     <div class="mt-3 col-3">
                        <?php
                           if($advertisementObj['status'] == 0){
                              //In-active
                              ?><b class="text-danger">In-active</b><?php
                           }
                           else if($advertisementObj['status'] == 1){
                              //Active
                              ?><b class="text-success">Active</b><?php
                           }
                           else{
                              //Renew
                              ?><b class="text-warning">Re-new</b><?php
                           }
                        ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-2">
            <h1>Gallery</h1>
         </div>
      <?php endforeach; ?>
      <?php endif; ?>

  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
 
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
 
<script>
//     $(document).ready( function () {
//       $('#category').DataTable();
//   } );
</script>
</body>
</html>