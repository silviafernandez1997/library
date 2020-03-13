<?php
    include ('../connect.php');
    include("../session.php");
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
            <?php
            //Here we want the user to see all the functionalities if it's a librarian
            if($login_admin==0){ 
                echo" <a href='../indexAdmin.php'>Home</a> ";
                echo"<a href='../select/form_book_select.php'>Buscar libros</a>";
                echo"<a href='../update/form_book_update.php'>Editar libros</a>";
                echo"<a href='../delete/form_book_delete.php'>Eliminar libros</a>";
                echo"<a href='../insert/form_book_insert.php'>Agregar libros</a>";
                echo"<a href='form_book_reserve.php'>Reservar libro</a>";
                echo"<a href='#'>Reservas</a>";
                echo '<a href="../cart/shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>';
            }
            //And if it's a member we want him to see only the pages for members
            else if($login_admin==1){ 
                echo"<a href='../indexMember.php'>Home</a>";
                echo"<a href='../select/form_book_select.php'>Buscar libros</a>";
                echo"<a href='form_book_reserve.php'>Reservar libro</a>";
                echo"<a href='#'>Reservas</a>";
                echo '<a href="../cart/shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>';
            }
                
            ?>
        </div>
        
        <h2>Reservas hechas</h2>

        
        <p>Estas són las reservas hechas. </p>
        
        <hr>
        
        <div class="insertForm">
            <?php include ("db_select_reserve.php"); ?>
            <?php include ("db_book_return.php"); ?>
            <form method="post" action="#">           
                
                <?php
                //This is the code what it makes possible to return a book, we only want this for the librarians, we don't want a member returning a book.
                //That is why the code is only visible for the librarians
                if($login_admin==0){
                    echo"<h3>Elige una reserva</h3>
                
                    <label for='idB'>Libro</label>
                    <select name='idBook'>
                        <option value='selectBook'>Seleccionar un libro</option>";
                        
                        while($row=mysqli_fetch_array($resultForSelectOption)){
                            echo "<option value='".$row['book_ID']."'>'".$row['title']."'</option>";
                        }

                    echo "</select>
                    <br><br>
                    <input type='submit' name='returnBook' value='Devolver Libro'/> ";
                }
                ?>
                
            </form>
        </div>
        
    </body>
    <footer>
    <hr>
        <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
    </footer>

</html>