<?php
include('connect.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script type="text/javascript" src="showTime.js"></script>
         <script type="text/javascript" src="accuweather.js"></script>
        <title>Libreria mahon</title>
    </head>
    
    <body>
        <div class="titol"><h1>Libreria Mahon</h1></div>
        <div class="nav">
            <a href="#">Home</a>
            <a href="select/form_book_select.php">Buscar libros</a>
            <a href="member/form_member_insert.php">Registrarse</a>
            <a href="cart/shopping_cart.php"><img src="IMG/cart.png" alt="shoppingCart" class="imge"  /></a>
            <a href="cart/shopping_cart_cookie.php">Cart cookies</a>
        </div>
        
        <h2>Home</h2>
        <div id="clock">Clock</div>
        
        <p> Esta página web esta creada solo con fines educativos. És una prueba de como sera la libreria intentando empezar a poner php. Gracias :).
        
        Por cierto, esta página no sera responsive. De momento.</p>
        
        <hr>
        
        <div class="conAside">
            <img src="IMG/libreria.jpg" alt="imagen de una libreria">
        
            <aside class="asideParticular">
                <?php include("login/form_login.php");?>
            </aside>
        </div>
        <br/><br/>
        <select id="selectBox" onchange="change();">
           <option value="">Selecciona ciudad</option>
           <option value="London">London</option>
           <option value="Amsterdam">Amsterdam</option>
           <option value="Berlin">Berlin</option>
           <option value="Tokyo">Tokyo</option>
           <option value="Paris">Paris</option>
           <option value="Madrid">Madrid</option>
           <option value="Manhattan">Manhattan</option>
           <option value="Barcelona">Barcelona</option>
           <option value="Texas">Texas(Australia)</option>
           <option value="Reykjavik">Reykjavik</option>
        </select>
        <br/>
        <p id="demo"></p>
    </body>
    <footer>
    <hr>
        <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
    </footer>
    

</html>