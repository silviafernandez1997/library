<?php
include('connect.php');

session_start();

if(isset($_SESSION['login_user'])){
    $user_check=$_SESSION['login_user'];

    $ses_sql=mysqli_query($conn,"SELECT member_ID, name, admin FROM member WHERE name='$user_check'");
    $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    //This 2 variables will be useful in another files if we want some content to be seen only for some type of users
    $login_session=$row['name'];
    $login_admin=$row['admin'];
    $login_id=$row['member_ID'];
}

?>
