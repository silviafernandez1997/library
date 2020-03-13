<?php
    
include ('../connect.php');

if(isset($_SESSION['login_user'])){
    if(isset($_POST['buy'])){
        $idInsert=$_POST['id'];

        $sqlInsert="INSERT INTO cart(book_id,member_id,num_copias) VALUES ('$idInsert','$login_id',1)";
        if(mysqli_query($conn, $sqlInsert)){
            echo '<p>Added in the cart!</p>';
        } else{
            echo 'error';
        }
        
    }
}

mysqli_close($conn);
?>   