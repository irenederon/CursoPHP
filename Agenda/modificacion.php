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
    <title>Modificación de contactos</title>
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
<form method="post">
    <p for="contc" class="etiqueta">Elige un contacto para modificar:</p>
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
    <p><label for="nombre">Nombre:</label>
        <?php
        echo "<input type='text' name='nombre' placeholder='Nombre del contacto' id='nombre' required></p>";
        ?>
    <p><label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" placeholder="Apellidos del contacto" id="apellidos" required></p>

    <p><label for="mail">Email:</label>
        <input type="email" name="mail" placeholder="Email del contacto" id="mail" required></p>

    <p><label for="telf">Teléfono:</label>
        <input type="tel" name="telf" placeholder="Teléfono del contacto" id="telf" required></p>

    <p>
        <input type="submit" value="Enviar" class="btn-material" onclick="
        <?php
        if (isset($_POST["nombre"], $_POST["apellidos"], $_POST["mail"], $_POST["telf"]) and $_POST["nombre"] != "" and $_POST["apellidos"] != "" and $_POST["mail"] != "" and $_POST["telf"] != '') {
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $email = $_POST["mail"];
            $telf = $_POST["telf"];
            $id=$_POST["contc"];
            include 'conexion.php';
            $cons = "UPDATE contactos SET nom_contacto='$nombre' ,ape_contacto='$apellidos' ,email_contacto='$email' ,tlf_contacto='$telf' WHERE id_contacto='$id'";
            $datosCons = $mysqli->query($cons);
            $mysqli->close();
            if ($datosCons) {
                header('Location: comprobacion.php/?tipo=modif&valor=correcto');
            } else {
                header('Location: comprobacion.php/?tipo=modif&valor=incorrecto');
            }
        }
        ?> ">
        <input type="reset" value="Borrar" class="btn-material">
</body>
</html>
