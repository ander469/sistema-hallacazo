<?php 

$inc = include("con_db.php");//conexion a BD
if ($inc) { //consulta a la BD
    $consulta = "SELECT * FROM datos";
    $resultado = mysqli_query($conex,$consulta);
    if ($resultado){ 
        //VARIABLES
        while($row = $resultado->fetch_array()){
            $id = $row['id'];
            $cedula = $row['cedula'];
            $name = $row['nombre'];
            $apellido = $row['apellido'];
            $numero = $row['numero_tlf'];
            $sector = $row['sector'];
            ?>
            <div>
                <h2><?php echo $name; ?></h2>
                <div>
                    <p>
                        <b>ID: </b> <?php echo $id; ?><br>
                        <b>Cedula: <?php echo $cedula; ?></b><br>
                        <b>Name: <?php echo $name; ?></b><br>
                        <b>Apellido: <?php echo $apellido; ?></b><br>
                        <b>Numero de tlf: <?php echo $numero; ?></b><br>
                        <b>Sector: <?php echo $sector; ?></b><br>
                    </p>
                </div>
            </div>
            <?php
        }
    }
}

?>