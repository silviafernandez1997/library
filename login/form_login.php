<?php
include('db_login.php');
?>

<h3>Log In</h3>
<form method="post" action="#">
    <label for="email">Email</label>
    <input type="email" name="email" required/>
    <br><br>
    <label for="pass">Contraseña</label>
    <input type="password" name="pass" required/>
    <br><br>
    <input type="submit" name="enviar" value="Log In" />
<br>
<p>No estas registrado?<a href="member/form_member_insert.php"> Registrate aquí.</a></p>

<input type="text" name="resultat" value="<?php echo $incorrect ?>" readonly/>
    
</form>
