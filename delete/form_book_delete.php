<?php
    include ('../connect.php');

    $sql="SELECT title, book_ID FROM book";

    $result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Intento de libreria</title>
    </head>
    
    <body>
        <div class="titol"><h1>Libreria Mahon</h1></div>
        <div class="nav">
            <a href="../indexAdmin.php">Home</a>
            <a href="../select/form_book_select.php">Buscar libros</a>
            <a href="../update/form_book_update.php">Editar libros</a>
            <a href="#">Eliminar libros</a>
            <a href="../insert/form_book_insert.php">Agregar libros</a>
            <a href="../reserve/form_book_reserve.php">Reservar libro</a>
            <a href="../reserve/form_select_reserve.php">Reservas</a>
            <a href="../cart/shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>
        </div>
        
        <h2>Elimina un libro</h2>

        
        <p> Aquí puedes eliminar un libro de la base de datos. Solo tienes que seleccionar el libro i eliminarlo! </p>
        
        <hr>
        
        <div class="insertForm">
            <form method="post" action="#">
                <?php include ("db_book_delete.php"); ?>
                <h3>Elige un libro</h3>
                <label for="libro">Libros:</label>
                <br>
                <select name="libros">
                    <option value="selectBook">Seleccionar un libro</option>
                    <?php
                    //This select is showing all the books of the database
                        while($row=mysqli_fetch_array($result)){
                            echo "<option value='".$row['book_ID']."'>'".$row['title']."'</option>";
                        }
                    ?>
                </select>
                <br>
                <input type="submit" name="select" value="Seleccionar"/>
                <br><br>
                <hr>
                <br>
                <h3>Datos del libro</h3>
                
                <input type="text" hidden value="<?php echo $row1['book_ID'] ?>" name="idBook"/>
                
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?php echo $row1['title'] ?>" readonly/>
                
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="<?php echo $row1['author'] ?>" readonly/>
                <br><br>
                
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" id="isbn" value="<?php echo $row1['isbn'] ?>" readonly/>
                
                <label for="editorial">Editorial:</label>
                <input type="text" name="editorial" id="editorial" value="<?php echo $row1['editorial'] ?>" readonly/>
                <br><br>
                
                <label for="category">Category:</label>
                <input type="text" name="category" id="category" value="<?php echo $row1['category'] ?>" readonly/>
                
                <label for="language">Language:</label>
                <input type="text" name="language" id="language" value="<?php echo $row1['language'] ?>" readonly/>
                <br><br>
                
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" value="<?php echo $row1['location_ID'] ?>" readonly/>
                <br><br>
                
                <input type="submit" name="delete" value="Eliminar"/>
                
            </form>
        </div>
        
    </body>
    <footer>
    <hr>
        <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
    </footer>

</html>