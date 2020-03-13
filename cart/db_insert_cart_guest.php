<?php
    
include ("../connect.php");

if(!isset($_SESSION['login_user'])){
    
    if(isset($_POST['submit'])){
        for($n=0;$n<count($_POST['id']);$n++){
            $id=$_POST['id'][$n];
            $sqlInsert="INSERT INTO cart(book_id,member_id,num_copias) VALUES($id,-1,1)";
            if(mysqli_query($conn, $sqlInsert)){
            } else{
                echo mysqli_error($conn);
            }
        }
        echo "Sended to your cart";
    }
    
}

mysqli_close($conn);

?>