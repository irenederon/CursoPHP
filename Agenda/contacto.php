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
    <title>Contacto</title>
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
<div class="container center-h center-v paragraph"><p class='etiqueta'>Creado por Irene de Ron Andrés para el Curso F181363AA/32/001 26/03/2020 - 08/06/2020 - IFCD044PO PROGRAMACIÓN WEB CON PHP (SOFTWARE LIBRE).
        Actividad: PROYECTO FINAL IFCD44PO. Caso Práctico</p>
</div>
</body>
</html>
