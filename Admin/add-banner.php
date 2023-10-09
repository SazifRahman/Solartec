<?php

include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

?>

<div class="row">
  <div class="col-md-12 ">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">



              <i class="fab fa-gg-circle"></i> Add Banner Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="all-banner.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i> All Banneer </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label"> Banner Title <span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="title">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label"> Banner Subtitle <span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="subtitle">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label"> Banner Button <span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="btn">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label"> Button URL <span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="url">
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label"> Banner Image </label>
            <div class="col-sm-4">
              <input type="file" class="form-control form_control" id="" name="image">
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark"> UPLOAD </button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
get_footer();

}else{
  header('Location: index.php');
}
?>