<?php
include ('../connect.php');

$filter=$_REQUEST["q"];

$selectBook="SELECT title FROM book where author LIKE '%$filter%' OR title LIKE '%$filter%'";

$result2=mysqli_query($conn,$selectBook);
$books1=mysqli_fetch_all($result2, MYSQLI_ASSOC);
            
$array_json=json_encode($books1,true);
echo $array_json;

mysqli_close($conn);
?>