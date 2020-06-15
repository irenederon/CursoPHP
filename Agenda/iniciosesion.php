<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    session_destroy();
    header('Location:iniciosesion.php');
}
?>
<html>
<head class="backgr">
    <link rel="stylesheet" href="css/styles.css">
    <title>Inicio de sesión</title>
    <div id="header">
        <h1 id="title">Agenda</h1>
    </div>
</head>
<body class="backgr">
<div></br></br></div>
<div class="container center-h">
    <form action="iniciosesion.php" method="post">
        <p class="titulo">Inicio de sesión:</p>
        <p><label for="uname"><b>Usuario</b></label>
            <input type="text" placeholder="Usuario" name="uname" required></p>

        <p> <label for="psw"><b>Contraseña</b></label>
            <input type="password" placeholder="Contraseña" name="psw" required></p>
        <p>
            <input type="submit" class="btn-material" Value="Iniciar sesión" onclick="<?php
            if (isset($_POST["uname"], $_POST["psw"]) and $_POST["uname"] != "" and $_POST["psw"] != "") {
                $usuario = $_POST["uname"];
                $passw = $_POST["psw"];
                include 'conexion.php';
                $query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
                $datos = $mysqli->query($query);
                $mysqli->close();
                if ($datos) {

                    $row = $datos->fetch_assoc();
                    if ($passw==$row['password']) {
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['loggedin'] = true;
                        $_SESSION['id'] = $row['id_usuario'];
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                        header('Location: index.php');
                    } else {
                        header('Location: comprobini.php/?tipo=ini&valor=contraincorrecta');
                    }

                } else {
                    header('Location: comprobini.php/?tipo=ini&valor=incorrecto');
                }
            }
            ?>">
            <input type="button" class="btn-material" Value="Registrarme" onclick="location.href='registro.php'">
        </p>
    </form>
</div>
</body>
</html>
