<?php
    include ('../connect.php');
    include ("../session.php");

    $sql="SELECT name, member_ID FROM member WHERE name= '$login_session'";

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
            <?php
            //Here we want the user to see all the functionalities if it's a librarian
            if($login_admin==0){ 
                echo" <a href='../indexAdmin.php'>Home</a> ";
                echo"<a href='../select/form_book_select.php'>Buscar libros</a>";
                echo"<a href='../update/form_book_update.php'>Editar libros</a>";
                echo"<a href='../delete/form_book_delete.php'>Eliminar libros</a>";
                echo"<a href='../insert/form_book_insert.php'>Agregar libros</a>";
                echo"<a href='#'>Reservar libro</a>";
                echo"<a href='form_select_reserve.php'>Reservas</a>";
                echo '<a href="../cart/shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>';
            }
            //And if it's a member we want him to see only the pages for members
            else if($login_admin==1){ 
                echo"<a href='../indexMember.php'>Home</a>";
                echo"<a href='../select/form_book_select.php'>Buscar libros</a>";
                echo"<a href='#'>Reservar libro</a>";
                echo"<a href='form_select_reserve.php'>Reservas</a>";
                echo '<a href="../cart/shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>';
            }
                
            ?>
        </div>
        
        <h2>Reserva un libro</h2>

        
        <p> Elige el libro y haz tu reserva! </p>
        
        <hr>
        
        <div class="insertForm">
            <form method="post" action="#">
                <h3>Elige un libro</h3>
                <label for="filtro">Filtrar por:</label>
                <select name="selectFilter">
                    <option value="title">Título</option>
                    <option value="author">Autor</option>
                    <option value="editorial">Editorial</option>
                    <option value="category">Categoria</option>
                    <option value="language">Lenguaje</option>
                </select>
                <input type="text" name="filtro" />
                <br>
                
                <input type="submit" name="filtrar" value="Filtrar"/>
                <br><br>
                
                <?php include ("db_book_reserve.php"); ?>
                
                <hr>
                <br>
                <h3>Reserva el libro</h3>
                
                <label for="idB">Libro</label>
                <select name="idBook">
                    <option value="selectBook">Seleccionar un libro</option>
                    <?php
                    //In this select you will only see the books available which are like the filter.
                        while($row=mysqli_fetch_array($resultForSelectOption)){
                            echo "<option value='".$row['book_ID']."'>'".$row['title']."'</option>";
                        }
                    ?>
                </select>
                <br><br>
                
                <label for="members">Miembro:</label>
                <select name="members">
                    <?php
                    //This it shows only the name of the user connected
                        while($row1=mysqli_fetch_array($result)){
                            echo "<option value='".$row1['member_ID']."'>'".$row1['name']."'</option>";
                        }
                    ?>
                </select>
                <br><br>
                
                <input type="submit" name="reserve" value="Reservar"/>
                
            </form>
        </div>
        
    </body>
    <footer>
    <hr>
        <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
    </footer>

</html>