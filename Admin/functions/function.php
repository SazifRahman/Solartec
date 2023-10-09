<?php session_start();

        include_once('../config.php');

    function get_header(){
        include_once('includes/header.php');
    }

    function get_sidebar(){
        include_once('includes/sidebar.php'); 
    }

    function get_footer(){
        include_once('includes/footer.php');
    }

    function LoggedID(){
        return $_SESSION['id'] ? true:false;
        }
        
        function needlogged(){
        $check=LoggedID();
        if(!$check){
        header('Location: login.php');
        }
        }

?>