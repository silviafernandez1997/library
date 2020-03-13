<?php
    include ('../connect.php');
    include ('../session.php');

    $sql="SELECT title, book_ID FROM book";

    $result=mysqli_query($conn,$sql);

    $searchLocation="SELECT location_ID FROM location WHERE location_ID!= ALL (SELECT location_ID FROM book)";
    $resultLocation=mysqli_query($conn,$searchLocation);
    
    include ("db_book_update.php");
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
            <a href="#">Editar libros</a>
            <a href="../delete/form_book_delete.php">Eliminar libros</a>
            <a href="../insert/form_book_insert.php">Agregar libros</a>
            <a href="../reserve/form_book_reserve.php">Reservar libro</a>
            <a href="../reserve/form_select_reserve.php">Reservas</a>
            <a href="../cart/shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>
        </div>
        
        <h2>Actualiza un libro</h2>

        
        <p> Aquí puedes actualizar un libro de la base de datos. Solo tienes que seleccionar el libro i poner los nuevos datos! </p>
        
        <hr>
        
        <div class="insertForm">
            <form method="post" action="#" enctype="multipart/form-data">
                <!-- The enctype multipart/form-data it's necessary to make the image upload works -->
                <h3>Elige un libro</h3>
                <label for="libro">Libros:</label>
                <br>
                <!-- This select is showing all the books of the database -->
                <select name="libros">
                    <option value="selectBook">Seleccionar un libro</option>
                    <?php
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
                <input type="text" name="title" id="title" value="<?php echo $row1['title'] ?>" />
                
                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="<?php echo $row1['author'] ?>" />
                <br><br>
                
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" id="isbn" value="<?php echo $row1['isbn'] ?>" />
                
                <label for="editorial">Editorial:</label>
                <input type="text" name="editorial" id="editorial" value="<?php echo $row1['editorial'] ?>" />
                <br><br>
                
                <label for="category">Category:</label>
                <input type="text" name="category" id="category" value="<?php echo $row1['category'] ?>" />
                
                <label for="language">Language:</label>
                <input type="text" name="language" id="language" value="<?php echo $row1['language'] ?>" />
                <br><br>
                
                <label for="location">Location:</label>
                <br>
                <!-- This select it show the available locations and the current location of the book -->
                <select name="locations">
                    <option value="<?php echo $row1['location_ID'] ?>"><?php echo $row1['location_ID'] ?></option>
                    <?php
                        while($row2=mysqli_fetch_array($resultLocation)){
                            echo "<option value='".$row2['location_ID']."'>'".$row2['location_ID']."'</option>";
                        }
                    ?>
                </select>
                <br><br>
                
                <label for="image">Update image</label>
                <input type="file" name="image" id="image" >
                <br/><br/>
                
                <input type="submit" name="update" value="Actualizar"/>
                
                <br><br>
                
                <label for="resultUpdate">Resultado</label>
                <input type="text" value="<?php echo $resultUpdate ?>" size="30em" readonly/>
            </form>
        </div>
        
    </body>
    <footer>
    <hr>
        <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
    </footer>

</html>