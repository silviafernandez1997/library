<?php
    
include ('../connect.php');
//include ('../session.php');

$selectFilter=0;
$filter=0;

if(isset($_POST['filtrar'])){
    $selectFilter=$_POST['selectFilter'];
    $filter=$_POST['filtro'];
    
    //Select for available books with a filter
    $selectBook="SELECT * FROM book where $selectFilter LIKE '%$filter%' AND book_ID!=ALL(SELECT book_ID FROM reservation WHERE real_Final_Date IS NULL)";
    
    $result1=mysqli_query($conn,$selectBook);

    $books=mysqli_fetch_all($result1, MYSQLI_ASSOC);
    
    
    //Select for currently booked books with a filter
    $selectReserved="SELECT * FROM book where $selectFilter LIKE '%$filter%' AND book_ID=ANY(SELECT book_ID FROM reservation WHERE real_Final_Date IS NULL)";
    
    $resultReserved=mysqli_query($conn,$selectReserved);
    
    $booksReserved=mysqli_fetch_all($resultReserved, MYSQLI_ASSOC);

    //Table for available books
    echo "<h3>Libros disponibles</h3>";
    echo "<table>
            <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Editorial</th>
            <th>Precio</th>
            </tr>";

    if ($result1->num_rows > 0) {
        foreach($books as $book):
            echo "<tr>";
            echo '<td>'?><img src="../book_img/<?php echo $book['image']; ?>" alt="libro"/>
            <?php 
            echo '</td>';
            echo "<td class='title'>". $book["title"] . "</td>";
            echo "<td>". $book["author"] . "</td>";
            echo "<td>". $book["editorial"] . "</td> " ;
            
            if($book["copias"]>0){
                echo "<td>". $book["precio"] ."€</td>";
                echo "<form method='post'>";
                echo "<td>"."<input type='submit' name='buy' value='Buy' id='".$book['book_ID']."' onclick='shoppingCart(this.id)' class='boto'/>"."</td>";
                echo "<td>"."<input type='text' name='id' value='".$book['book_ID']."' hidden/>"."</td>";
                echo "</form>";
            }
            
            echo "</tr>";
        endforeach; 
    }
    echo "</table>";
    
    //Table for currently booked books
    echo "<h3>Libros reservados</h3>";
    echo "<table>
            <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Editorial</th>
            <th>Precio</th>
            </tr>";

    if ($resultReserved->num_rows > 0) {
        foreach($booksReserved as $book1):
            echo "<tr>";
            echo '<td>'?><img src="../book_img/<?php echo $book1['image']; ?>" alt="libro"/>
            <?php 
            echo '</td>';
            echo "<td class='title'>". $book1["title"] . "</td>";
            echo "<td>". $book1["author"] . "</td>";
            echo "<td>". $book1["editorial"] . "</td> " ;
            
            if($book["copias"]>0){
                echo "<td>". $book1["precio"] ."€</td>";
                echo "<form method='post'>";
                echo "<td>"."<input type='submit' name='buy' value='Buy' id='".$book1['book_ID']."' onclick='shoppingCart(this.id)' class='boto'/>"."</td>";
                echo "<td>"."<input type='text' name='id' value='".$book1['book_ID']."' hidden/>"."</td>";
                echo "</form>";
            }
            echo "</tr>";
        endforeach; 
    }
    echo "</table>";
}

if(isset($_POST['selectAll'])){
    //Select for all available books
    $selectBook="SELECT * FROM book WHERE book_ID!=ALL(SELECT book_ID FROM reservation WHERE real_Final_Date IS NULL)";
    
    $result1=mysqli_query($conn,$selectBook);

    $books=mysqli_fetch_all($result1, MYSQLI_ASSOC);
    
    //Select for all currently booked books
    $selectReserved="SELECT * FROM book where book_ID=ANY(SELECT book_ID FROM reservation WHERE real_Final_Date IS NULL)";
    
    $resultReserved=mysqli_query($conn,$selectReserved);
    
    $booksReserved=mysqli_fetch_all($resultReserved, MYSQLI_ASSOC);

    //Table for available books
    echo "<h3>Libros disponibles</h3>";
    echo "<table>
            <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Editorial</th>
            <th>Precio</th>
            </tr>";

    if ($result1->num_rows > 0) {
        foreach($books as $book):
            echo "<tr>";
            echo '<td>'?><img src="../book_img/<?php echo $book['image']; ?>" alt="libro"/>
            <?php 
            echo '</td>';
            echo "<td class='title'>". $book["title"] . "</td>";
            echo "<td>". $book["author"] . "</td>";
            echo "<td>". $book["editorial"] . "</td> " ;
            
            if($book["copias"]>0){
                echo "<td>". $book["precio"] ."€</td>";
                echo "<form method='post'>";
                echo "<td>"."<input type='submit' name='buy' value='Buy' id='".$book['book_ID']."' onclick='shoppingCart(this.id)' class='boto'/>"."</td>";
                echo "<td>"."<input type='text' name='id' value='".$book['book_ID']."' hidden/>"."</td>";
                echo "</form>";
            }
            echo "</tr>";
        endforeach; 
    }
    echo "</table>";
    
    //Table for currently booked books
    echo "<h3>Libros reservados</h3>";
    echo "<table>
            <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
            <th>Editorial</th>
            <th>Precio</th>
            </tr>";

    if ($resultReserved->num_rows > 0) {
        foreach($booksReserved as $book1):
            echo "<tr>";
            echo '<td>'?><img src="../book_img/<?php echo $book1['image']; ?>" alt="libro"/>
            <?php 
            echo '</td>';
            echo "<td class='title'>". $book1["title"] . "</td>";
            echo "<td>". $book1["author"] . "</td>";
            echo "<td>". $book1["editorial"] . "</td> " ;
            
            if($book["copias"]>0){
                echo "<td>". $book1["precio"] ."€</td>";
                echo "<form method='post'>";
                echo "<td>"."<input type='submit' name='buy' value='Buy' id='".$book1['book_ID']."' onclick='shoppingCart(this.id)' class='boto'/>"."</td>";
                echo "<td>"."<input type='text' name='id' value='".$book1['book_ID']."' hidden/>"."</td>";
                echo "</form>";
            }
            echo "</tr>";
        endforeach; 
    }
    echo "</table>";
}

mysqli_close($conn);
?>    

