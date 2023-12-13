<?php 

include("con_db.php");//conexion a BD

if (isset($_POST['register'])){
 if (strlen($_POST['cedula']) >= 1 &&
  strlen($_POST['name']) >= 1 &&
   strlen($_POST['apellido']) >= 1 &&
    strlen($_POST['numero']) >= 1 &&
    strlen($_POST['sector']) >= 1){ 
    //VARIABLES
    $cedula = trim($_POST['cedula']);
    $name = trim($_POST['name']);
    $apellido = trim($_POST['apellido']);
    $numero = trim($_POST['numero']);
    $sector = trim($_POST['sector']);
    
    //VERIFICAR QUE LA CEDULA NO SE REPITA LA CEDULA
    $verificarCedula = mysqli_query($conex, "SELECT * FROM datos WHERE cedula='$cedula'");

    if(mysqli_num_rows($verificarCedula) > 0){
        echo '
            <script>
            alert("Esta Cedula Ya Se Encuentra Registrada En El Sistema");
            window.location = "index.php";
            </script> 
        ';
        exit();
    }
    //CONSULTA A BASE DE DATOS
    $consulta ="INSERT INTO datos(cedula, nombre, apellido, numero_tlf, sector) VALUES ('$cedula','$name','$apellido','$numero','$sector')";
    $resultado = mysqli_query($conex,$consulta);
    if ($resultado)  {
        ?> 
        <h3 class="ok">¡Te has inscripto correctamente!</h3>
       <?php
    } else {
        ?> 
        <h3 class="bad">¡Ups ha ocurrido un error!</h3>
       <?php
    }
}   else {
        ?> 
        <h3 class="bad">¡Por favor complete los campos!</h3>
       <?php
}
}

?>