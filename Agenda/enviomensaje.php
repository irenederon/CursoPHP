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
    <title>Enviar mensaje</title>
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
    <form action="enviomensaje.php" method="post" id="mensaje">
        <p for="user" class="etiqueta">Elige un usuario al que enviarle un mensaje:</p>
        <p><select name="user" id="user">
                <?php
                include 'conexion.php';
                $id_usuario=$_SESSION['id'];
                $query = "SELECT * FROM usuarios where id_usuario!='$id_usuario'";
                $datos = $mysqli->query($query);
                $mysqli->close();

                if ($datos) {
                    while ($fila = $datos->fetch_assoc()) {

                        echo '<option value="' . $fila["id_usuario"] . '">' . $fila["usuario"] . '</option>';
                    }
                }
                ?>
            </select></p>
        <p> <label for="mens">Escribe tu mensaje: </label> </p>
        <p> <textarea form="mensaje" id="mens" name="mens"></textarea></p>
       <p> <input type="submit" value="Enviar" class="btn-material" onclick="
        <?php
        if(isset($_POST["user"])){
            $mysqli = new mysqli("localhost", "root", "abc123.", "agenda") or die ("No se encuentra la base de datos");
            $destino=$_POST["user"];
            $origen=$_SESSION["id"];
            $mensaje=$_POST["mens"];
            $consulta = "INSERT INTO mensaje (origen, destino, mensaje) VALUES ('$origen','$destino','$mensaje')";
            $datosCons = $mysqli->query($consulta);
            $mysqli->close();
            if ($datosCons) {
                header('Location: comprobacion.php/?tipo=envio&valor=correcto');
            } else {
                header('Location: comprobacion.php/?tipo=envio&valor=incorrecto');
            }
        }
        ?> ">
        </p>
    </form>
</div>
</body>
</html>
