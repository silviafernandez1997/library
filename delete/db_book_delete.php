<?php
    
include ("../connect.php");
$bookID=0;

if(isset($_POST['select'])){
    $bookID=$_POST['libros'];
}

//This is the sql we use to show all the information of the selected book in the form
$selectBook="SELECT book_ID, title, author, isbn, editorial, category, language, location_ID FROM book where book_ID=$bookID";
    
$result1=mysqli_query($conn,$selectBook) or die (mysqli_error());

$row1=mysqli_fetch_assoc($result1);

if(isset($_POST['delete'])){
    $bookID=$_POST['idBook'];
    //Delete a book with the book id
    $deleteBook="DELETE FROM book WHERE book_ID=$bookID";
    if(mysqli_query($conn,$deleteBook)){
        echo 'The book has been deleted correctly.';
    } else{
        mysqli_error();
    }
}

mysqli_close($conn);

?>