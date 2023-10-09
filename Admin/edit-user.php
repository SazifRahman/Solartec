<?php

include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){
get_header();
get_sidebar();

$id=$_GET['e'];
$sel="SELECT * FROM users WHERE user_id='$id'";
$Q=mysqli_query($con,$sel);
$data=mysqli_fetch_assoc($Q);

if (!empty($_POST)) {

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  // $username = $_POST['username'];
  // $password = md5(($_POST['password']));
  // $repassword = md5(($_POST['repassword']));
  $role = $_POST['role'];
  $image = $_FILES['image'];
  $imageName = '';
  if ($image['name'] != '') {
    if(mysqli_query($con,$update)) {

    $imageName = 'user_' . time() . '_' . rand(100000, 10000000) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
  }
    $insert_query = "INSERT INTO `users`( `user_name`, `user_phone`, `user_email`, `user_username`, `user_password`, `role_id`, `user_photo`) 
    // VALUES ('$name','$phone','$email','$username','$password','$role','$imageName')";

    $update="UPDATE users SET user_name='$name', user_phone='$phone', user_email='$email', role_id='$role', WHERE user_id='$id'";

    if(mysqli_query($con,$updimg)){
      move_uploaded_file($image['tmp_name'], 'uploads/' . $imageName); }
      header('location: view-user.php?v'.$id);


  if (!empty($name)) {
    if (!empty($phone)) {
      if (!empty($email)) {
        // if (!empty($username)) {
        //   if (!empty($password)) {
        //     if (!empty($repassword)) {
        //       if ($password === $repassword) {
                if (!empty($role)) {


                  }

                    echo "User insert successfully";
                  } else {
                    echo "Something is worng";
                  }
                } else {
                  echo "OPPS! Please Select Your Role.";
                }
      //         } else {
      //           echo "Password & Repassword Didn't Match.";
      //         }
      //       } else {
      //         echo "OPPS! Enter Your Password.";
      //       }
      //     } else {
      //       echo "OPPS! Enter Your Password.";
      //     }
      //   } else {
      //     echo "OPPS! Enter Your Username.";
      //   }
      // } else {
        echo "OPPS! Enter Your Email.";
      }
    } else {
      echo "OPPS! Enter Your Phone.";
    }
  } else {
    echo "OPPS! Enter Your Name.";
  }

?>

<div class="row">
  <div class="col-md-12 ">
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">



              <i class="fab fa-gg-circle"></i>Update User Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="name" value="<?=$data['user_name'];?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Phone<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="phone" value="<?=$data['user_phone'];?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control form_control" id="" name="email" value="<?=$data['user_email'];?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="username" value="<?=$data['user_username'];?>" disabled>
            </div>
          </div>
          <!-- <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="password">
            </div>
          </div> -->
          <!-- <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="repassword">
            </div>
          </div> -->
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" id="" name="role" value="<?=$data['role_id'];?>">
                <option value="">Select Role</option>

                <?php
                $selr = "SELECT * FROM roles ORDER BY role_id ASC";
                $Qr = mysqli_query($con, $selr);
                while ($urole = mysqli_fetch_assoc($Qr)) {
                ?>
                  <option value="<?= $urole['role_id'];?>"> <?php if($urole['role_id']==$data['role_id']){ echo '(selected)';} ?> <?= $urole['role_name']; ?></option>
                <?php } ?>

              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
            <div class="col-sm-4">
              <input type="file" class="form-control form_control" id="" name="image">
            </div>
            <div class="col-md-2">
            
            <?php if($data['user_photo']!=''){ ?>
                <img height="100" src="uploads/<?= $data['user_photo']; ?>" alt="User"/> 
                <?php }else{?>
                <img height="100" class="img200" src="images/avatar.jpg" alt="User"/>
                <?php }?>

            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">Update</button>
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