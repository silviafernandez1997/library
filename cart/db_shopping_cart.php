<?php
include ("../connect.php");

$selectCart="SELECT * FROM cart WHERE member_id='$login_id' OR member_id=-1";

$result1=mysqli_query($conn,$selectCart);

$books=mysqli_fetch_all($result1, MYSQLI_ASSOC);

$orderNum=rand(0,100000);

if ($result1->num_rows == 0){
    echo "No tienes libros en la cesta!<a href='../select/form_book_select.php'>Compra ya!</a>";
}

if(isset($_POST['buy'])){
    $insertOrders;
    $data=date("Y-m-d H:i:s");
    $bol=false;
    $deleteCart="DELETE FROM cart WHERE member_id=$login_id OR member_id=-1";
    
    if ($result1->num_rows > 0){
        foreach($books as $book1):
        $id=$book1['book_id'];
        $insertOrders="INSERT INTO orders VALUES(null,'$login_id','$id','$orderNum','$data')";
        $sqlUpdate="UPDATE book SET copias=copias-1 WHERE book_ID=$id";
        
            if(mysqli_query($conn, $insertOrders)){
                if(mysqli_query($conn,$sqlUpdate)){
                    $bol=true;
                } else{
                    echo 'error';
                }
            } else{
                $bol=false;
            }
        endforeach; 
    }    

    if($bol){
        if(mysqli_query($conn,$deleteCart)){
            echo '<p>Thank you for purchasing!</p>';
        }else{
            echo 'error';
        }
    }
    
    //When we buy the books the cookie is deleted like the localstorage
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        //echo $name;
         setcookie($name,"",time() - 3600,"/");
    }
    unset($_COOKIE['cookie']);
}

if(isset($_POST['delete'])){
    $id=$_POST["id"];
    $deleteBook="DELETE FROM cart WHERE book_id=$id AND (member_id=$login_id OR member_id=-1)";
        
    if(mysqli_query($conn, $deleteBook)){
        echo '<p>Delete one book of the cart!</p>';
    } else{
        echo 'error';
    }

}

mysqli_close($conn);

?>