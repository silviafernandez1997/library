<?php
    
include ("../connect.php");
$selectFilter=0;
$filter=0;
$dataI=date("Y-m-d");
//This it's adding 30 days to the current date
$dataF=date("Y-m-d",strtotime($dataI.' + 30 days'));

if(isset($_POST['filtrar'])){
    $selectFilter=$_POST['selectFilter'];
    $filter=$_POST['filtro'];
    
    $selectBook="SELECT book_ID, title, author, editorial, image FROM book where $selectFilter LIKE '%$filter%' AND book_ID!=ALL(SELECT book_ID FROM reservation WHERE real_Final_Date IS NULL)";
    
    $result1=mysqli_query($conn,$selectBook);
    
    $resultForSelectOption=mysqli_query($conn,$selectBook);

    $books=mysqli_fetch_all($result1, MYSQLI_ASSOC);

    //We show in a table the available books of the filtered search
    echo "<table>
            <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Editorial</th>
            </tr>";

    if ($result1->num_rows > 0) {
        foreach($books as $book):
            echo "<tr>";
            echo '<td>'?><img src="../book_img/<?php echo $book['image']; ?>" alt="libro"/>
            <?php 
            echo '</td>';
            echo "<td>". $book["title"] . "</td>";
            echo "<td>". $book["author"] . "</td>";
            echo "<td>". $book["editorial"] . "</td> " ;
            echo "</tr>";
        endforeach; 
    }
    echo "</table>";
}



if(isset($_POST['reserve'])){
    $bookID=$_POST['idBook'];
    $member=$_POST['members'];
    
    //See next allow reservation
    $selectAllowReserv="SELECT next_allow_reservation FROM member WHERE member_ID=$member";
    $resultAllow=mysqli_query($conn, $selectAllowReserv);
    $dateReserv=mysqli_fetch_assoc($resultAllow);
    $dateAllow=$dateReserv['next_allow_reservation'];
    
    //if next allow reservation is > of date now
    if($dateAllow>=$dataI){
        echo'<p> You can not reserve a book until: </p>',$dateAllow;
    } else{
        $insertReserve="INSERT INTO reservation(book_ID,member_ID,initial_Date,final_Date) VALUES ('$bookID','$member','$dataI','$dataF')";
        $deleteOldReservations="DELETE FROM reservation WHERE book_ID='$bookID' AND real_Final_Date IS NOT NULL";
        
        //First we need to delete any reserve with the same book ID which is already returned, because if we don't do that we will have problems with the next allow reservation when we return a book.
        if(!mysqli_query($conn,$deleteOldReservations)){
             echo 'error';
        } else{
            //When we have delete any reserve with the same book id we make the new reserve for the book
            if(mysqli_query($conn, $insertReserve)){
                echo '<p>You have been reserved one book!</p>';

            } else{
                //This is just in case of any problem, but with the delete sql we won't have any problem
                echo 'Nuestra política no permite reservar un mismo libro al mismo miembro, lo sentimos!';
            }
        }
        
    }
    
}

mysqli_close($conn);

?>