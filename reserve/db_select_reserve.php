<?php
    
include ("../connect.php");

//This is the sql we use to show the reserves of the member connected
$selectReserve="SELECT book.title, book.image, reservation.book_ID, member.name, member.member_ID, reservation.initial_Date, reservation.final_Date FROM reservation JOIN book ON reservation.book_id=book.book_ID JOIN member ON member.member_ID=reservation.member_ID where member.name= '$login_session' AND real_Final_Date IS NULL";

//This sql is used to show to the librarians all the books which are currently reserved
$selectReserveAdmins="SELECT book.title, book.image, reservation.book_ID, member.name, member.member_ID, reservation.initial_Date, reservation.final_Date FROM reservation JOIN book ON reservation.book_id=book.book_ID JOIN member ON member.member_ID=reservation.member_ID WHERE real_Final_Date IS NULL";
$result1;

//If the member who's connected is a librarian we will use the sql which shows all the reserves
if($login_admin==0){
    $result1=mysqli_query($conn,$selectReserveAdmins);
    $resultForSelectOption=mysqli_query($conn,$selectReserveAdmins);
} else if($login_admin==1){
    //If the member is not a librarian we use the sql which shows only his books reserved.
    $result1=mysqli_query($conn,$selectReserve);
    $resultForSelectOption=mysqli_query($conn,$selectReserve);
}

$books=mysqli_fetch_all($result1, MYSQLI_ASSOC);

//If the user connected doesn't have any book reserved it will tell him if he want to reserve one.
if ($result1->num_rows == 0){
    echo "No tienes ninguna reserva hecha! Quieres reservar un libro? <a href='form_book_reserve.php'>Pulsa aquí!</a>";
} else{
    //If the member it has books reserved we shows him in a table
    echo "<table>
        <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Member</th>
        <th>Initial date</th>
        <th>Final date</th>
        </tr>";

    if ($result1->num_rows > 0) {
        foreach($books as $book):
            echo "<tr>";
            echo '<td>'?><img src="../book_img/<?php echo $book['image']; ?>" alt="libro"/>
            <?php 
            echo '</td>';
            echo "<td>". $book["title"] . "</td>";
            echo "<td>". $book["name"] . "</td>";
            echo "<td>". $book["initial_Date"] . "</td>";
            echo "<td>". $book["final_Date"] . "</td>";
            echo "</tr>";
        endforeach; 
    } 
    echo "</table>";
}

mysqli_close($conn);

?>