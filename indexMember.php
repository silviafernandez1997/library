<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/styles.css">
        <title>Libreria mahon</title>
    </head>
    
    <body>
        <div class="titol"><h1>Libreria Mahon</h1></div>
        <div class="nav">
            <a href="#">Home</a>
            <a href="select/form_book_select.php">Buscar libros</a>
            <a href="reserve/form_book_reserve.php">Reservar libro</a>
            <a href="reserve/form_select_reserve.php">Reservas</a>
            <a href="cart/shopping_cart.php"><img src="IMG/cart.png" alt="shoppingCart" class="imge" /></a>
            <a href="cart/shopping_cart_cookie.php">Cart cookies</a>
        </div>
        
        <h2>Home Member</h2>
   
        
        <p> Esta página web esta creada solo con fines educativos. És una prueba de como sera la libreria intentando empezar a poner php. Gracias :).
        
        Por cierto, esta página no sera responsive. De momento.</p>
        
        <hr>
        
        <div class="conAside">
            <img src="IMG/libreria.jpg" alt="imagen de una libreria">
        
            <aside class="asideParticular">
                <?php include("logout/form_logout.php");?>
            </aside>
        </div>
        
    </body>
    <footer>
    <hr>
        <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
    </footer>

</html>