<?php
    
include ('../connect.php');

if(!isset($_SESSION['login_user'])){
    if(isset($_POST['buy'])){
        $idInsert=$_POST['id'];
        setcookie("cookie[".$idInsert."]", $idInsert, time() + (86400 * 30), "/"); //expire in 30 days
    }
}

mysqli_close($conn);
?>   