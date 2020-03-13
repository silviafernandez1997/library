<?php
    
include ("../connect.php");
$dataRF=date("Y-m-d");

if(isset($_POST['returnBook'])){
    $bookID=$_POST['idBook'];
    //When the book is returned we put the real final date of the current day
    $returnBook="UPDATE reservation SET real_Final_Date='$dataRF' WHERE book_ID='$bookID'";
        
    if(mysqli_query($conn, $returnBook)){
        echo '<p>You have been returned one book!</p>';
    } else{
        echo 'error';
    }
    
    //Code for nextAllowReservation, we need the final date and the real final date
    $selectDate="SELECT member_ID, final_Date FROM reservation WHERE book_ID='$bookID'";
    $result2=mysqli_query($conn,$selectDate);
    $book1=mysqli_fetch_assoc($result2);
    
    $finalDate=$book1['final_Date'];
    $member=$book1['member_ID'];
    
    //We take the two dates and pass it to miliseconds
    $ftime=strtotime($finalDate);
    $rftime=strtotime($dataRF);
    
    //If the real final date is later than the final date
    if($rftime>$ftime){
        //we get the difference in miliseconds
        $datediff=$rftime-$ftime;
        //And pass it to days
        $d=round($datediff/(60*60*24));
        //Then the difference of the days is added to the current date
        $now=date("Y-m-d",strtotime($dataRF.' + '.$d.' days'));
        //And is added to the member who returned the book later.
        $insertNextAllowReserv="UPDATE member SET next_allow_reservation='$now' WHERE member_ID=$member";
        if(mysqli_query($conn, $insertNextAllowReserv)){
            echo '<p>You have a penalization of ',$d,' days.</p>'; 
        }else{
            echo mysqli_error($conn);
        }
    }
}

mysqli_close($conn);

?>