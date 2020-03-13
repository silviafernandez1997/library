<?php

include ('../connect.php');

if(isset($_POST['submit'])){
    //We are getting all the information of the user to add it to the database
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $pass=$_POST['pass'];
    
    $insertMember="INSERT INTO member(name,lastname,email,phone,admin,password) VALUES ('$nombre','$apellido','$email','$tel',1,'$pass')";
        
    if(mysqli_query($conn, $insertMember)){
        echo '<p>You are registered now!</p>';
    } else{
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);

?>