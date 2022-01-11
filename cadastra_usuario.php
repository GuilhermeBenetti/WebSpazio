<?php
session_start();
ob_start();
include_once 'conn.php';

if((!isset($_SESSION['id_login'])) AND (!isset($_SESSION['login']))){
    $_SESSION['msg_login'] = "<p style='color: #ff0000'>Erro: Área Restrita! Necessário realizar o login para acessar a página!</p>";
        header("Location: login.php");
}
    if( ($_SESSION['privilegio']!=100)){
        $_SESSION['msg_login'] = "<p style='color: #ff0000'>Erro: Área Restrita! Necessário realizar o login para acessar a página!</p>";
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link href="../bootstrap5/css/bootstrap.min.css" rel="stylesheet">
        <link href="../style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:400;700;&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Spazio Esthetic</title>
        <link rel="icon" href="assets/images/icon32x32.png">
        
        <style>
        .altera-fonts{
            font-size: 22px;
            font-family: 'Montserrat', sans-serif; 
        }
        .titulo-font{
            font-family: 'Alex Brush', cursive;
        }
        </style>
    </head>
    
    <header>
        
        <nav class="navbar navbar-expand-lg navbar-light navbar-center bg-light">
  <div class="container">
    <div class="container">
    <a class="navbar-brand" href="#">
      <img src="../assets/images/LogoSpazio.png" alt="" width="200px">
      <h3 class="text-start fs-6" style="color: #b8716f">Bem-Vindo, <?php echo $_SESSION['login'] ?></h3>
    </a>
  </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <?php
            $id = $_SESSION['id_login'];
            $result_usuario = "SELECT * FROM usuarios_sistema WHERE id= '$id' LIMIT 1";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            if($resultado_usuario){
                $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                if($row_usuario['privilegios']==100){
        ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="cadastra_usuário.php">Cadastrar Usuário</a>
                    </li>
                    <?php
                }
                }
        ?>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="logout.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php
                if(isset($_SESSION['msg_login'])){
                    echo $_SESSION['msg_login'];
                    unset ($_SESSION['msg_login']);
                }
            ?>
</header>

        <body>
            
            <div class="container">
                    <div class="row">
                    <div class="col-md-3"></div>
                    <form class="col-md-6" method="POST" action="proc_cadastra.php">
                        
                        <h2 class="mt-5 altera-fonts fs-3 text-center">Cadastrar um novo usuário</h2>
                        <div class="form-group mt-5">
                        <div class="mb-3 col-md-12">
                            <label for="nome_cad" class="form-label">Nome Completo:</label>
                            <input type="text" class="form-control" name="nome_cad" id="nome_cad">
                        </div>
                        <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="login_cad" class="form-label">Login:</label>
                            <input type="text" class="form-control" name="login_cad" id="login_cad">
                        </div>
                        <div class="mb-3 col-md-8">
                            <label for="senha_cad" class="form-label">Senha:</label>
                            <input type="text" class="form-control" name="senha_cad" id="senha_cad">
                        </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" value="1" id="Check1" name="Check1">
                                <label class="form-check-label" for="Check1">Botox</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" value="1" id="Check2" name="Check2">
                                <label class="form-check-label" for="Check2">Preenchimento</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" value="1" id="Check3" name="Check3">
                                <label class="form-check-label" for="Check3">Bioestimuladores</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" value="1" id="Check4" name="Check4">
                                <label class="form-check-label" for="Check4">Fios de PDO</label>
                            </div>
                        </div>
                        <div class="text-center">
                        <button type="submit" style="width: 120px" name="cadastrar" value="cadastrar" id="cadastrar" class="btn btn-estilo col-md-12 mb-5">Cadastrar</button>
                        </div>
                        </div>
                    </form>
                    <div class="col-md-3"></div>
                </div>
                </div>





<script src="../bootstrap5/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
    
</html>