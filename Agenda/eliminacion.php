<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
    header('Location:iniciosesion.php');
}

$now = time();

if($now > $_SESSION['expire']) {
    session_destroy();
    header('Location:iniciosesion.php');
}
?>
<html>
<head class="backgr">
    <link rel="stylesheet" href="css/styles.css">
    <title>Eliminación de contactos</title>
    <div id="header">
        <h1 id="title">Agenda</h1>
    </div>
</head>
<body class="backgr">
<div id="menu">
    <img class="image" src="images/agendaIcon.png">
    <ul class="nav">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="mantenimiento.php">Mantenimiento ▾</a>
            <ul>
                <li><a href="listado.php">Listado de los contactos</a></li>
                <li><a href="insercion.php">Insertar un nuevo contacto</a></li>
                <li><a href="modificacion.php">Modificar un contacto existente</a></li>
                <li><a href="eliminacion.php">Eliminar un contacto existente</a></li>
            </ul>
        </li>
        <li><a href="mensajeria.php">Mensajería ▾</a>
            <ul>
                <li><a href="mensaje.php">Ver mis mensajes</a></li>
                <li><a href="enviomensaje.php">Enviar mensaje</a></li>
            </ul>
        </li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="logout.php">Salir de la cuenta</a></li>
    </ul>
</div>
<div id="separators"><hr></div>
<div class="container center-h center-v">
    <form method="post">
        <p for="contc" class="etiqueta">Elige un contacto para eliminar:</p>
       <p><select name="contc" id="contc">
            <?php
            include 'conexion.php';
            $id_usuario=$_SESSION['id'];
            $query = "SELECT * FROM contactos where id_usuario='$id_usuario'";
            $datos = $mysqli->query($query);
            $mysqli->close();

            if ($datos) {
                while ($fila = $datos->fetch_assoc()) {

                    echo '<option value="' . $fila["id_contacto"] . '">' . $fila["nom_contacto"] . " " .$fila["ape_contacto"] . '</option>';
                }
            }
            ?>
        </select></p>
            <input type="submit" value="Eliminar" class="btn-material" onclick="
            <?php
                if(isset($_POST["contc"])){
                    include 'conexion.php';
                    $id=$_POST["contc"];
                    $consulta = "DELETE FROM contactos WHERE id_contacto=($id)";
                    $datosCons = $mysqli->query($consulta);
                    $mysqli->close();
                    if ($datosCons) {
                        header('Location: comprobacion.php/?tipo=delete&valor=correcto');
                    } else {
                        header('Location: comprobacion.php/?tipo=delete&valor=incorrecto');
                    }
                }
              ?> ">
          </p>
        </form>
    </div>
</body>
</html>
