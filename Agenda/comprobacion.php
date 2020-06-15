<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $now = time();

    if($now > $_SESSION['expire']) {
        session_destroy();
        header('Location:../iniciosesion.php');
    }
} else {
    header('Location:iniciosesion.php');
}
?>
<html>
    <head class="backgr">
      <link rel="stylesheet" href="../css/styles.css">
      <title>Comprobación</title>
      <div id="header">
          <h1 id="title">Agenda</h1>
      </div>
    </head>
    <body class="backgr">
        <div id="menu">
            <img class="image" src="../images/agendaIcon.png">
            <ul class="nav">
                <li><a href="../principal.php">Inicio</a></li>
                <li><a href="../mantenimiento.php">Mantenimiento ▾</a>
                    <ul>
                        <li><a href="../listado.php">Listado de los contactos</a></li>
                        <li><a href="../insercion.php">Insertar un nuevo contacto</a></li>
                        <li><a href="../modificacion.php">Modificar un contacto existente</a></li>
                        <li><a href="../eliminacion.php">Eliminar un contacto existente</a></li>
                    </ul>
                </li>
                <li><a href="../mensajeria.php">Mensajería ▾</a>
                    <ul>
                        <li><a href="../mensaje.php">Ver mis mensajes</a></li>
                        <li><a href="../enviomensaje.php">Enviar mensaje</a></li>
                    </ul>
                </li>
                <li><a href="../contacto.php">Contacto</a></li>
                <li><a href="../logout.php">Salir de la cuenta</a></li>
            </ul>
        </div>
        <div id="separators">
                <hr>
        </div>
        <div class="container center-h center-v">
            <?php
                $tipo = $_GET['tipo'];
                $valor = $_GET['valor'];
                switch ($tipo){
                    case "insert":
                        switch ($valor){
                            case "correcto":
                                echo "<p class='etiqueta'>Se ha insertado el contacto.</p>";
                                break;
                            case "incorrecto":
                                echo "<p class='etiqueta'>No se ha podido insertar el contacto.</p>";
                                break;
                        }
                        break;
                    case "modif":
                        switch ($valor) {
                            case "correcto":
                                echo "<p class='etiqueta'>Se ha modificado el contacto.</p>";
                                break;
                            case "incorrecto":
                                echo "<p class='etiqueta'>No se ha podido modificar el contacto.</p>";
                                break;
                        }
                        break;
                    case "delete":
                        switch ($valor){
                            case "correcto":
                                echo "<p class='etiqueta'>Se ha borrado el contacto.</p>";
                                break;
                            case "incorrecto";
                                echo "<p class='etiqueta'>No se ha podido borrar el contacto o no se ha seleccionado ningún contacto.</p>";
                                break;
                        }
                        break;
                    case "envio":
                        switch ($valor){
                            case "correcto":
                                echo "<p class='etiqueta'>Se ha enviado el mensaje.</p>";
                                break;
                            case "incorrecto";
                                echo "<p class='etiqueta'>No se ha enviado el mensaje.</p>";
                                break;
                        }
                        break;
                    case "mens":
                        switch ($valor){
                            case "incorrecto";
                                echo "<p class='etiqueta'>No tienes mensajes.</p>";
                                break;
                        }
                        break;
                    case "reg":
                        switch ($valor){
                            case "incorrecto";
                                echo "<p class='etiqueta'>No se ha podido completar el registro.</p>";
                                echo "<a class=\"botones\" href=\"../iniciosesion.php\">Volver al inicio</a>";
                                echo "<a class=\"botones\" href=\"../registro.php\">Volver al registro</a>";
                                break;
                        }
                        break;
                    case "ini":
                        switch ($valor){
                            case "incorrecto";
                                echo "<p class='etiqueta'>No se ha iniciado la sesión.</p>";
                                echo "<a class=\"botones\" href=\"../iniciosesion.php\">Volver al inicio</a>";
                                echo "<a class=\"botones\" href=\"../registro.php\">Volver al registro</a>";
                                break;
                        }
                        break;
                }
            ?>
        </div>
    </body>
</html>