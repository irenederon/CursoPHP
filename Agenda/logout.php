<?php
session_start();
unset ($_SESSION['usuario']);
unset ($_SESSION['loggedin']);
unset ($_SESSION['id']);
unset ($_SESSION['start']);
unset ($_SESSION['expire']);
session_destroy();
header('Location:iniciosesion.php');
exit;
?>