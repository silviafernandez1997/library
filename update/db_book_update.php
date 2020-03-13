<?php
    
include ("../connect.php");
$bookID=0;
$resultUpdate="";

if(isset($_POST['select'])){
    $bookID=$_POST['libros'];
}

$selectBook="SELECT book_ID, title, author, isbn, editorial, category, language, location_ID FROM book where book_ID=$bookID";
    
$result1=mysqli_query($conn,$selectBook) or die (mysqli_error());

$row1=mysqli_fetch_assoc($result1);

if(isset($_POST['update'])){
    //Here we're taking all the information of the book, not only the updated
    $title=$_POST['title'];
    $author=$_POST['author'];
    $isbn=$_POST['isbn'];
    $editorial=$_POST['editorial'];
    $category=$_POST['category'];
    $language=$_POST['language'];
    $selectedLoc=$_POST['locations'];
    $bookID=$_POST['idBook'];
    
    //Code to upload an image
    $nameImage=$_FILES['image']['name'];
    $directoryImage=$_SERVER['DOCUMENT_ROOT'].'/libreriav3/book_img/';
    move_uploaded_file($_FILES['image']['tmp_name'],$directoryImage.$nameImage);
    
    //If we have put a inamge in the input type file
    if($nameImage!=null){
        $updateBook="UPDATE book set title='$title', author='$author', isbn='$isbn', editorial='$editorial', category='$category', language='$language', location_ID='$selectedLoc', image='$nameImage' WHERE book_ID='$bookID'";
    }else{
        //If the input type file is empty we don't update the image
        $updateBook="UPDATE book set title='$title', author='$author', isbn='$isbn', editorial='$editorial', category='$category', language='$language', location_ID='$selectedLoc' WHERE book_ID='$bookID'";
    }
    
    if(mysqli_query($conn,$updateBook)){
        $resultUpdate='The book has been updated correctly.';
    } else{
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);

?>