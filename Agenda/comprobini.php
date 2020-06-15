<html>
<head class="backgr">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Comprobación</title>
    <div id="header">
        <h1 id="title">Agenda</h1>
    </div>
</head>
<body class="backgr">
<div class="container center-h center-v">
    <?php
    $tipo = $_GET['tipo'];
    $valor = $_GET['valor'];
    switch ($tipo){
        case "reg":
            switch ($valor){
                case "userexistente";
                    echo "<p class='etiqueta'>Ese usuario ya existe.</p>";
                    echo "<a class='botones' href='../iniciosesion.php'>Volver al inicio</a>";
                    echo "<a class='botones' href='../registro.php'>Volver al registro</a>";
                    break;
                case "incorrecto";
                    echo "<p class='etiqueta'>No se ha podido completar el registro.</p>";
                    echo "<a class='botones' href='../iniciosesion.php'>Volver al inicio</a>";
                    echo "<a class='botones' href='../registro.php'>Volver al registro</a>";
                    break;
            }
            break;
        case "ini":
            switch ($valor){
                case "incorrecto";
                    echo "<p class='etiqueta'>No se ha iniciado la sesión.</p>";
                    echo "<a class='botones' href='../iniciosesion.php'>Volver al inicio</a>";
                    echo "<a class='botones' href='../registro.php'>Volver al registro</a>";
                    break;
                case "contraincorrecta";
                    echo "<p class='etiqueta'>La contraseña no es correcta.</p>";
                    echo "<a class='botones' href='../iniciosesion.php'>Volver al inicio</a>";
                    echo "<a class='botones' href='../registro.php'>Volver al registro</a>";
                    break;
            }
            break;
    }
    ?>
</div>
</body>
</html>