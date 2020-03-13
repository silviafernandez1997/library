<?php
    include("../session.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Intento de libreria</title>
        <script type="text/javascript" src="suggestion.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="localstorage.js"></script>
    </head>
    
    <body>
        <div class="titol"><h1>Libreria Mahon</h1></div>
        <div class="nav">
            <?php
            //In this page if the user is an admin we want him to see all the rest of the functionalities
            if(isset($_SESSION['login_user'])){
                if($login_admin==0){ 
                    echo" <a href='../indexAdmin.php'>Home</a> ";
                    echo"<a href='#'>Buscar libros</a>";
                    echo"<a href='../update/form_book_update.php'>Editar libros</a>";
                    echo"<a href='../delete/form_book_delete.php'>Eliminar libros</a>";
                    echo"<a href='../insert/form_book_insert.php'>Agregar libros</a>";
                    echo"<a href='../reserve/form_book_reserve.php'>Reservar libro</a>";
                    echo"<a href='../reserve/form_select_reserve.php'>Reservas</a>";
                    echo '<a href="../cart/shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>';
                }
                //If the user is a memeber we want him to see only the functionalities for a member
                else if($login_admin==1){ 
                    echo"<a href='../indexMember.php'>Home</a>";
                    echo"<a href='#'>Buscar libros</a>";
                    echo"<a href='../reserve/form_book_reserve.php'>Reservar libro</a>";
                    echo"<a href='../reserve/form_select_reserve.php'>Reservas</a>";
                    echo '<a href="../cart/shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>';
                }
            //If is a guest we want him to see only the search books page and the register page
            }else{ 
                echo"<a href='../index.php'>Home</a>";
                echo"<a href='#'>Buscar libros</a>";
                echo"<a href='../member/form_member_insert.php'>Registrarse</a>";
                echo"<a href='../cart/shopping_cart.php'><img src='../IMG/cart.png' alt='shoppingCart' class='imge' /></a>";
                echo"<a href='../cart/shopping_cart_cookie.php'>Cart cookie</a>";
            }
            ?>
        </div>
        
        <h2>Nuestros libros</h2>
        <p>Aquí puedes buscar los libros que tenemos en la biblioteca disponibles en este momento. </p>
        
        <hr>
    
        <div class="insertForm">
            <form method="post" action="#">
                <h3>Buscar libros</h3>
                <label for="filtrar">Filtrar por:</label>
                <select name="selectFilter">
                    <option value="title">Título</option>
                    <option value="author">Autor</option>
                    <option value="editorial">Editorial</option>
                    <option value="category">Categoria</option>
                    <option value="language">Lenguaje</option>
                </select>
                <input type="text" name="filtro" onkeyup="showHint(this.value)" />
                <br>
                <p>Suggestions: <span id="txtHint"></span></p>
                
                <input type="submit" name="filtrar" value="Filtrar"/>
                <input type="submit" name="selectAll" value="Buscar todos"/>
                <br><br>
                
                <?php include ('db_book_select.php') ?>
                <?php include('db_cart_insert.php'); ?>
                <?php include('cookies.php'); ?>
                
                <div style="visibility:hidden"><?php include('db_suggestion.php'); ?>
                    <p id="taula1"></p></div>
                
                
            </form>
        </div>
        
        
        
    </body>
    <footer>
        <hr>
            <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
        </footer>
</html>