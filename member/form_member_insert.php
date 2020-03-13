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
            <a href="../index.php">Home</a>
             <a href="../select/form_book_select.php">Buscar libros</a>
            <a href="#">Registrarse</a>
            <a href='../cart/shopping_cart.php'><img src='../IMG/cart.png' alt='shoppingCart' class='imge' /></a>
            <a href='../cart/shopping_cart_cookie.php'>Cart cookie</a>
        </div>
        
        <h2>Página de registro</h2>

        
        <p> Rellena este formulario para registrarte en la libreria. </p>
        
        <hr>
        
        <div class="insertForm">
            <form method="post" action="#">
                <h3>Datos del usuario</h3>
                
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
                
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" required>
                
                <br><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                
                <label for="tel">Número de móvil:</label>
                <input type="number" name="tel" id="tel" maxlength="9" required>
                
                <br><br>
                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" id="pass" required>
                
                <br><br>
                <input type="submit" name="submit" value="Enviar">
            </form>
        </div>
        <?php include("db_member_insert.php"); ?>
        
    </body>
    <footer>
    <hr>
        <p>Copiryght, Silvia Fernandez 2019. Todos los derechos reservados.</p>
    </footer>

</html>