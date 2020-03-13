<?php
    
include ("../connect.php");
include ("../session.php");

$selectCart="SELECT * FROM cart WHERE member_id='$login_id' OR member_id=-1";

$result1=mysqli_query($conn,$selectCart);

$books=mysqli_fetch_all($result1, MYSQLI_ASSOC);

$array_json;

if(isset($_SESSION['login_user'])){
    if (!($result1->num_rows == 0)){
        $selectBook="SELECT book_ID, copias, image, title, author, precio FROM book WHERE book_ID=ANY (SELECT book_id FROM cart WHERE member_id='$login_id' OR member_id=-1)";
        $result2=mysqli_query($conn,$selectBook);
        $books1=mysqli_fetch_all($result2, MYSQLI_ASSOC);

        $array_json=json_encode($books1,true);
        echo $array_json;
    }
    
}

mysqli_close($conn);

?>