<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
        <link href="../../assets/css/personalizado.css" rel="stylesheet">
        <title>Login - SE</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <style>
        .btn-login-outline{
            background-color: #b8716f;
            color: white;
        }
    </style>
    <body>
        <header>
            <div class="text-center col-md-12">
                    <div class="thumbnail text-center mt-5">
                    <img src="../assets/images/LogoSpazio.png" class="img-responsive">
                </div>
        </header>

        <form method="POST" action="valida.php" class="text-center mt-3">
            <?php
                if(isset($_SESSION['msg_login'])){
                    echo $_SESSION['msg_login'];
                    unset ($_SESSION['msg_login']);
                }
            ?>
            
                <div class="text-start form-group col-md-4 offset-md-4">
                    <label>Login:</label>
                        <input type="text" name="login" id="login" placeholder="Digite seu login" required autofocus class="form-control mt-2">
                    
                </div>
                
                <div class="text-start form-group col-md-4 offset-md-4 mt-2">
                    <label>Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required class="form-control mt-2">
                </div>
            
            <div class="text-center mt-3">
                <input type="submit" name="btnLogin" value="Acessar" class="btn btn-login-outline">
            </div>
            
        </form>


    </body>
    <footer class="text-center mt-5">
        <br><br><br><br><br><br><br><br><br>
        <small>&copyDesenvolvido por MegaPontoCom</small>
    </footer>

    </html>