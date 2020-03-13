<?php
//This is the code to make the connection with the database
    $conn=mysqli_connect("localhost","dwes","dwes","library");
    if(!$conn){
        echo 'Conexión fallida: '.mysqli_connect_error();
    }

?>
