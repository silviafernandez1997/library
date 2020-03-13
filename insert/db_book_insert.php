<?php
include('../connect.php');

if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $author=$_POST['author'];
    $isbn=$_POST['isbn'];
    $editorial=$_POST['editorial'];
    $category=$_POST['category'];
    $language=$_POST['language'];
    $selectedLoc=$_POST['locations'];
    
    //Code to insert a new image or put to a new book an existing image
    $nameImage=$_FILES['image']['name'];
    $directoryImage=$_SERVER['DOCUMENT_ROOT'].'/libreriav3/book_img/';
    move_uploaded_file($_FILES['image']['tmp_name'],$directoryImage.$nameImage);
    
    $sql2="INSERT INTO book(title,isbn,author,editorial,category,language,location_ID,image) VALUES ('$title','$isbn','$author','$editorial','$category','$language','$selectedLoc','$nameImage')";
        
    if(mysqli_query($conn, $sql2)){
        echo '<p>One new book has been inserted!</p>';
    } else{
        echo 'error';
    }
}

mysqli_close($conn);

?>