<?php

include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();


$id=$_GET['p'];
$sel="SELECT * FROM users NATURAL JOIN roles WHERE user_id='$id'";
$Q=mysqli_query($con, $sel);
$data=mysqli_fetch_assoc($Q);
$pw=$data['user_password'];

if($_POST){
$opw=md5($_POST['old_password']);
$npw=md5($_POST['new_password']);
$rpw=md5($_POST['repassword']);

$update="UPDATE users SET user_password='$npw' WHERE user_id='$id'";

              if(!empty($opw)){
              if(!empty($npw)){
              if(!empty($rpw)){
              if($npw===$rpw){
              if($pw===$opw){
              if(mysqli_query($con,$update)){
              header('Location: logout.php');
                }else{
                echo "OPPS! Pasword change failed.";
                }
                }else{
                echo "Old Password didn't match.";
                }
                }else{
                echo "Old Password & New Password didn't match.";
                }
                }else{
                  echo "Enter Confirm Password.";
                }
                }else{
                  echo "Enter New Password.";
                }
                }else{
                  echo "Enter Old Password.";
                }
            }

?>

<div class="row">
  <div class="col-md-12 ">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">



              <i class="fab fa-gg-circle"></i> Change Password
            </div>
            <div class="col-md-4 card_button_part">
              <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Old Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="old_password">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">New Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="new_password">
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Confirm Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="repassword">
            </div>
          </div>
          
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php
get_footer();

}else{
  header('Location: index.php');
  // echo "Access Denied! You don't have permission to visit this page.";
}
?>