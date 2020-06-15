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
    <title>Listado</title>
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
<div class="container center-h">
    <table id="table" class="child">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Teléfono</th>
        </tr>
        <?php
        include 'conexion.php';
        $id_usuario=$_SESSION['id'];
        $query = "SELECT * FROM contactos where id_usuario='$id_usuario'";
        $datos = $mysqli->query($query);
        $mysqli->close();

        if ($datos) {
            while ($fila = $datos->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $fila["nom_contacto"]; ?></td>
                    <td><?php echo $fila["ape_contacto"]; ?></td>
                    <td><?php echo $fila["email_contacto"]; ?></td>
                    <td><?php echo $fila["tlf_contacto"]; ?></td>
                </tr>
            <?php }
        } ?>
    </table>
</div>
</body>
</html>
