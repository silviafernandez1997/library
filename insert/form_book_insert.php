<?php
    include ('../connect.php');

    $sql="SELECT location_ID FROM location WHERE location_ID!= ALL (SELECT location_ID FROM book)";
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
            <a href="../delete/form_book_delete.php">Eliminar libros</a>
            <a href="#">Agregar libros</a>
            <a href="../reserve/form_book_reserve.php">Reservar libro</a>
            <a href="../reserve/form_select_reserve.php">Reservas</a>
            <a href="../cart/shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>
        </div>
        
        <h2>Inserta un libro</h2>

        
        <p> Rellena este formulario para insertar un libro </p>
        
        <hr>
        
        <div class="insertForm">
            <?php include('db_book_insert.php'); ?>
            <form method="post" action="" enctype="multipart/form-data">
                <h3>Datos del libro</h3>
                <label for="title">Title</label>               
                <input type="text" name="title" id="title" required>
                
                <label for="author">Author</label>
                <input type="text" name="author" id="author" required>
                <br><br>
                
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" id="isbn" required>
                
                <label for="editorial">Editorial:</label>
                <input type="text" name="editorial" id="editorial" required>
                <br><br>
                
                <label for="category">Category:</label>
                <input type="text" name="category" id="category">
                
                <label for="language">Language:</label>
                <input type="text" name="language" id="language">
                <br><br>
                
                <label for="location">Locations:</label>
                <br>
                <select name="locations">
                    <option value="selectLocation">Selecciona ubicación</option>
                    <?php
                    //This select only shows the available locations
                        while($row=mysqli_fetch_array($result)){
                            echo "<option value='".$row['location_ID']."'>'".$row['location_ID']."'</option>";
                        }
                    ?>
                </select>
                <br><br>
                
                <label for="image">Select image</label>
                <input type="file" name="image" id="image" >
                <br/><br/>
                
                <input type="submit" name="submit" value="Enviar">
            </form>
        </div>
        
    </body>
    <footer>
    <hr>
        <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
    </footer>

</html>