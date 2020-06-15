<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    session_destroy();
    header('Location:iniciosesion.php');
}
include 'conexion.php';
?>
<html>
<head class="backgr">
    <link rel="stylesheet" href="css/styles.css">
    <title>Registro</title>
    <div id="header">
        <h1 id="title">Agenda</h1>
    </div>
</head>
<body class="backgr">
<div></br></br></div>
<div class="container center-h">
    <form action="registro.php" method="post">
        <p class="titulo">Registro:</p>
        <p><label for="uname"><b>Usuario</b></label>
            <input type="text" placeholder="Usuario" name="uname" required></p>

        <p> <label for="psw"><b>Contraseña</b></label>
            <input type="password" placeholder="Contraseña" name="psw" required></p>
        <p>
            <input type="submit" class="btn-material" Value="Registrarme" onclick="
            <?php
            if (isset($_POST["uname"], $_POST["psw"]) and $_POST["uname"] != "" and $_POST["psw"] != "") {
                $usuario = $_POST["uname"];
                $comp= "SELECT * FROM usuarios WHERE usuario='$usuario'";
                $resultado = $mysqli->query($comp);
                if ($resultado) {
                    header('Location: comprobini.php/?tipo=reg&valor=userexistente');
                } else {
                    $passw = $_POST["psw"];
                    $query = "INSERT INTO usuarios (usuario, password) VALUES ('$usuario','$passw')";
                    $datos = $mysqli->query($query);

                    if ($datos) {

                        $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
                        $result = $mysqli->query($consulta);
                        if ($result) {
                            $row = $result->fetch_assoc();
                            if ($passw == $row['password']) {
                                $_SESSION['usuario'] = $usuario;
                                $_SESSION['loggedin'] = true;
                                $_SESSION['id'] = $row['id_usuario'];
                                $_SESSION['start'] = time();
                                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                                header('Location: index.php');
                            }
                        }
                    } else {
                        header('Location: comprobini.php/?tipo=reg&valor=incorrecto');
                    }
                    $mysqli->close();
                }
            }
            ?> ">
            <input type="button" class="btn-material" Value="Volver al inicio" onclick="location.href='iniciosesion.php'">
        </p>
    </form>
</div>
</body>
</html>
