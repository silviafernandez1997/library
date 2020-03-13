<?php
include ("../session.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/styles.css">
        <?php if(!isset($_SESSION['login_user'])){
                    echo  '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>';
                    echo  "<script type='text/javascript' src='../select/localstorage.js'></script>";
                }else{
                    echo "<script type='text/javascript' src='shopping_cart.js'></script>";
                }
            ?>

        
        <title>Intento de libreria</title>
    </head>
    
    <body>
        <div class="titol"><h1>Libreria Mahon</h1></div>
        <div class="nav">
            <?php
            //In this page if the user is an admin we want him to see all the functionalities
            if(isset($_SESSION['login_user'])){
                if($login_admin==0){ 
                    echo" <a href='../indexAdmin.php'>Home</a> ";
                    echo"<a href='../select/form_book_select.php'>Buscar libros</a>";
                    echo"<a href='../update/form_book_update.php'>Editar libros</a>";
                    echo"<a href='../delete/form_book_delete.php'>Eliminar libros</a>";
                    echo"<a href='../insert/form_book_insert.php'>Agregar libros</a>";
                    echo"<a href='../reserve/form_book_reserve.php'>Reservar libro</a>";
                    echo"<a href='../reserve/form_select_reserve.php'>Reservas</a>";
                    echo '<a href="shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>';
                }
                //If the user is a memeber we want him to see only the functionalities for a member
                else if($login_admin==1){ 
                    echo"<a href='../indexMember.php'>Home</a>";
                    echo"<a href='../select/form_book_select.php'>Buscar libros</a>";
                    echo"<a href='../reserve/form_book_reserve.php'>Reservar libro</a>";
                    echo"<a href='../reserve/form_select_reserve.php'>Reservas</a>";
                    echo '<a href="shopping_cart.php"><img src="../IMG/cart.png" alt="shoppingCart" class="imge" /></a>';
                }
            } else{
                echo"<a href='../index.php'>Home</a>";
                echo"<a href='../select/form_book_select.php'>Buscar libros</a>";
                echo"<a href='../member/form_member_insert.php'>Registrarse</a>";
                echo"<a href='#'><img src='../IMG/cart.png' alt='shoppingCart' class='imge' /></a>";
                echo"<a href='shopping_cart_cookie.php'>Cart cookie</a>";
            }
            ?>
        </div>
        
        <h2>Carrito</h2>
        <p>Aquí puedes ver todos los libros que hay en tu cesta. </p>
        
        <hr>
    
        <div class="insertForm">
            <p id="taula"></p>
            <?php if(isset($_SESSION['login_user'])){
                    include ("db_shopping_cart.php");
                }
             ?>
            <p id="taula1"></p>
            <?php if(!isset($_SESSION['login_user'])){
                    include ("db_insert_cart_guest.php");
                    echo "<p>If you want to buy the books you have to log in</p>";
                }
            ?>
        </div>
        
        
    </body>
    <footer>
        <hr>
            <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
        </footer>
</html>