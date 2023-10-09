<?php

include_once('functions/function.php');
needlogged();
if($_SESSION['role']=='1'){

$id=$_GET['d'];

$del="DELETE FROM users WHERE user_id='$id'";
if(mysqli_query($con,$del)){
    header('location: all-user.php');
}else{
    echo "Failed.";
}

}else{
    header('Location: index.php');
    // echo "Access Denied! You don't have permission to visit this page.";
  }

?>