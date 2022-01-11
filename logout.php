<?php
    session_start();

    unset($_SESSION['id_login'], $_SESSION['login'], $_SESSION['nome']);
    setcookie();

    $_SESSION['msg_login'] = "<p style='color:green;'>Deslogado com sucesso!</p>";
    header("Location: login.php");

?>