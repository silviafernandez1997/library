<?php

$incorrect="";
if(isset($_POST['enviar'])){
    //We start a session
    session_start();
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    //This 2 sql it can be only one, you can change it
    $selectUser="SELECT name, email, password FROM member WHERE email='$email'";
    $selectAdmin="SELECT admin FROM member WHERE email='$email'";
    
    $result1=mysqli_query($conn,$selectUser);
    $resultAdmin=mysqli_query($conn,$selectAdmin);

    $user=mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $admin=mysqli_fetch_array($resultAdmin,MYSQLI_ASSOC);

    //We validate the user and password here
    if($user['email']==$email){
        $name=$user['name'];
        if($pass==$user['password']){
            //Here we are putting to the varaible session the name of the user who is connected
            $_SESSION['login_user']=$name;
            
            if($admin['admin']==0){
                //If the user is a librarian, redirect the user to this index
                header("location:indexAdmin.php");
            } else if($admin['admin']==1){
                //If the user is a member, redirect him to this index
                header("location:indexMember.php");
            }
            
        } else{
            $incorrect="Contraseña incorrecta..";
        }
    } else{
        $incorrect="Email incorrecto.";
    }
}


?>