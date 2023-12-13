
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	
    <link rel="stylesheet" href="estiilos.css">
</head>
<body>
    <form method="post">
    	<h1>¡Hallacazo 2023!</h1>
        <input minlength="3" type="text" name="cedula" placeholder="Número De Cedula" required="" pattern="[0-9]+">
    	<input minlength="3" maxlength="10" type="text" name="name" placeholder="Nombre" required="" pattern="[a-zA-Z]+">
        <input minlength="3" maxlength="10" type="text" name="apellido" placeholder="Apellido" required="" pattern="[a-zA-Z]+">
    	<input minlength="10" maxlength="10"  type="text" name="numero" placeholder="Número"  required="" pattern="[0-9]+">
        <input type="text" name="sector" placeholder="Sector"  required="">
    	<input type="submit" name="register">
        <input type="reset" value="borrar">
    </form>

       <?php 
        include("registrar.php");
        require 'vendor/autoload.php';
        ?>
</body>
</html>
