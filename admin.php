<?php
session_start();
ob_start();
include_once 'conn.php';

if((!isset($_SESSION['id_login'])) AND (!isset($_SESSION['login']))){
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
    <a class="navbar-brand" href="admin.php">
      <img src="../assets/images/LogoSpazio.png" alt="" width="200px">
    </a>
    <p style="color: #b8716f; margin-left: 230px; margin-top: -45px" class="col-lg-2 text-center fs-6">Bem-Vindo, <?php echo $_SESSION['login'] ?></p>
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
                        <a class="nav-link" aria-current="page" href="cadastra_usuario.php">Novo Usuário</a>
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

    </header>
    
    <body>
        
        <?php
            $id = $_SESSION['id_login'];
            $result_usuario = "SELECT * FROM usuarios_sistema WHERE id= '$id' LIMIT 1";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            if($resultado_usuario){
                $row_usuario = mysqli_fetch_assoc($resultado_usuario);
        ?>
        <div class="container">
           <div class="row text-center">
               <?php
               if($row_usuario['botox']==1){
               ?>
                <div class="col-12 col-lg-3 mt-4">
                    <a data-bs-toggle="offcanvas" href="#offcanvasBottom1" role="button" aria-controls="offcanvasBottom1">
                <img src="../assets/images/Botões/BOTOX.png" alt="" width="250px">
            </a>
			</div>
			<?php
               }
               if($row_usuario['preenchimento']==1){
               ?>
			<div class="col-12 col-lg-3 mt-4">
			    <a data-bs-toggle="offcanvas" href="#offcanvasBottom2" role="button" aria-controls="offcanvasBottom2">
                <img src="../assets/images/Botões/BOTÃO PREENCHIMENTO.png" alt=""  width="250px">
            </a>
            </div>
            <?php
               }
               if($row_usuario['bioestimulador']==1){
               ?>
            <div class="col-12 col-lg-3 mt-4">
			    <a data-bs-toggle="offcanvas" href="#offcanvasBottom3" role="button" aria-controls="offcanvasBottom3">
                <img src="../assets/images/Botões/BIOESTIMULADORES.png" alt=""  width="250px">
            </a>
            </div>
            <?php
               }
               if($row_usuario['fios']==1){
               ?>
            <div class="col-12 col-lg-3 mt-4">
			    <a data-bs-toggle="offcanvas" href="#offcanvasBottom4" role="button" aria-controls="offcanvasBottom4">
                <img src="../assets/images/Botões/FIOS DE PDO.png" alt=""  width="250px">
            </a>
            </div>
            <?php
               }
            }
            ?>
            </div>
               <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom1" aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header text-center">
                        <div class="container">
                            <h1 class="offcanvas-title altera-fonts fs-3 text-center" id="offcanvasBottomLabel">Toxina Botulínica</h1>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body text-start">
                        <div class="container">
                            <p align="justify">
                            <p><b class="altera-fonts fs-5">Aulas Teóricas: </b></p><p class="altera-fonts fs-6">&#8211; Aula 01 &#8211; <b><a  class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul1.php">Introdução à Toxina Botulínica</a></b></p><p class="altera-fonts fs-6">&#8211; Aula 02 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul2.php"><b class="altera-fonts fs-6">Avaliação do Paciente</b></a></p><p class="altera-fonts fs-6">&#8211; Aula 03 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul3.php" ><b class="altera-fonts fs-6">Tipos de Toxina Botulínica, Estocagem e Diluição</b></a></p><p class="altera-fonts fs-6">&#8211; Aula 04 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul4.php"  ><b class="altera-fonts fs-6">Técnicas de Aplicação</b></a></p><p class="altera-fonts fs-6">&#8211; Aula 05 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul5.php"><b class="altera-fonts fs-6">Contraindicações, cuidados e manutenção</b></a></p><p class="altera-fonts fs-6">&#8211; Aula 06 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul6.php"><b class="altera-fonts fs-6">Intercorrências com toxina Botulínica</b></a></p><p class="altera-fonts fs-6">&#8211; Aula Bônus &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul7.php"><b class="altera-fonts fs-6">Fotodocumentação</b></a></p><p class="altera-fonts fs-6">&#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul8.php"><b class="altera-fonts fs-6">Dúvidas Frequentes</b></a></p><p><b> </b></p><p><b class="altera-fonts fs-5">Aulas Práticas:</b></p><p class="altera-fonts fs-6">&#8211; Aula 01 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul9.php"><b class="altera-fonts fs-6">Diluição</b></a></p><p class="altera-fonts fs-6">&#8211; Aula 02 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul10.php"><b class="altera-fonts fs-6">Marcação</b></a></p><p class="altera-fonts fs-6">&#8211; Aula 03 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo1/mod1aul11.php"><b class="altera-fonts fs-6">Aplicação</b></a></p><div> </div><div>• <a class="altera-fonts fs-6" href="https://spazioesthetic.com.br/hfcvds/md01/apostila_harmony_face_online.pdf" target="_blank" rel="noopener"><bclass="altera-fonts fs-6">Apostila Harmony Face</b></a></div><div> </div>						</div>
                        </p>
                        </div>
                    </div>
                </div>
                
                
                <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom2" aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header text-center">
                        <div class="container">
                            <h1 class="offcanvas-title altera-fonts fs-3 text-center" id="offcanvasBottomLabel">Preenchimento</h1>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body text-start">
                        <div class="container">
                            <p align="justify">
                            <p><b  class="altera-fonts fs-5">Aulas Teóricas:</b></p><p> </p><p  class="altera-fonts fs-6">&#8211; Aula 01 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul1.php" rel="noopener"><b  class="altera-fonts fs-6">Revisão Anatômica</b></a></p><p>&#8211; Aula 02 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul2.php" rel="noopener"><b  class="altera-fonts fs-6">Ácido Hialurônico</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 03 &#8211; <a  class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul3.php" rel="noopener"><b  class="altera-fonts fs-6">Tipos de ácido hialurônico</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 04 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul4.php" rel="noopener"><b>Avaliação do paciente</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 05 &#8211; <a  class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul5.php" rel="noopener"><b  class="altera-fonts fs-6">Técnicas de Aplicação</b></a></p><p   class="altera-fonts fs-6">&#8211; Aula 06 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul6.php" rel="noopener"><b  class="altera-fonts fs-6">Intercorrências com ácido hialurônico</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula Bônus &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul7.php" rel="noopener"><b>Fotodocumentação</b></a></p><p  class="altera-fonts fs-6">&#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul8.php" rel="noopener"><b  class="altera-fonts fs-6">Dúvidas Frequentes</b></a></p><p> </p><p><b class="altera-fonts fs-5">Aulas Práticas:</b> </p><p> </p><p  class="altera-fonts fs-6">&#8211; Aula 01 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul9.php" rel="noopener"><b  class="altera-fonts fs-6">Malar</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 02 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul110.php" rel="noopener"><b  class="altera-fonts fs-6">Mandibular</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 03 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul111.php" rel="noopener"><b  class="altera-fonts fs-6">Nasogeniano</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 04 &#8211; <a  class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul112.php" rel="noopener"><b  class="altera-fonts fs-6">Olheiras</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 05 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul113.php" rel="noopener"><b  class="altera-fonts fs-6">Pré Jolw</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 06 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul114.php" rel="noopener"><b  class="altera-fonts fs-6">Rinomodelação</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 07 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul115.php" rel="noopener"><b  class="altera-fonts fs-6">Lábios</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 08 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo2/mod2aul116.php" rel="noopener"><b  class="altera-fonts fs-6">Hialuronidase</b></a></p><div> </div>						</div>
                        </p>
                        </div>
                    </div>
                </div>
                
                
                <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom3" aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header text-center">
                        <div class="container">
                            <h1 class="offcanvas-title altera-fonts fs-3 text-center" id="offcanvasBottomLabel">Bioestimuladores</h1>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body text-start">
                        <div class="container">
                            <p align="justify">
                                <p><b  class="altera-fonts fs-5">Aulas Teóricas:</b></p><p> </p><p  class="altera-fonts fs-6">&#8211; Aula 01 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul1.php" rel="noopener"><b  class="altera-fonts fs-6">Apresentação Hidroxiapatita de Cálcio</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 02 &#8211; <a  class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul2.php" rel="noopener"><b  class="altera-fonts fs-6">Áreas de aplicação Hidroxiapatita de Cálcio</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 03 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul3.php" rel="noopener"><b  class="altera-fonts fs-6">Diluição Hidroxiapatita de Cálcio</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 04 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul4.php" rel="noopener"><b class="altera-fonts fs-6">Apresentação Ácido Polilático</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 05 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul5.php" rel="noopener"><b  class="altera-fonts fs-6">Áreas de Aplicação Ácido Polilático</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 06  &#8211; <a  class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul6.php" rel="noopener"><b  class="altera-fonts fs-6">Diluição Ácido Polilático</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 07 &#8211; <a class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul7.php" rel="noopener"><b  class="altera-fonts fs-6">Intercorrências com Bioestimuladores</b></a></p><p  class="altera-fonts fs-6">&#8211; <a href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul8.php" rel="noopener"><b  class="altera-fonts fs-6">Perguntas frequentes</b></a> </p><div> </div><p  class="altera-fonts fs-6"><b class="altera-fonts fs-6"> </b></p><p><b class="altera-fonts fs-5">Aulas Práticas:</b><span class="altera-fonts fs-6"> </span></p><p><span class="altera-fonts fs-6"> </span></p><p> </p><p  class="altera-fonts fs-6">&#8211; <a href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul9.php" rel="noopener"><b  class="altera-fonts fs-6">Aula prática 01</b></a> </p><p  class="altera-fonts fs-6">&#8211; <a  class="altera-fonts fs-6" href="https://www.spazioesthetic.com.br/sitenovo/sistema/Aulas/modulo3/mod3aul10.php" rel="noopener"><b  class="altera-fonts fs-6">Aula prática 02</b> </a></p>						</div>
                        </p>
                        </div>
                    </div>
                    
                    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom4" aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header text-center">
                        <div class="container">
                            <h1 class="offcanvas-title altera-fonts fs-3 text-center" id="offcanvasBottomLabel">Fios de PDO</h1>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body text-start">
                        <div class="container">
                            <p align="justify">
                                <p><b  class="altera-fonts fs-5">Aulas Teóricas:</b></p><p> </p><p  class="altera-fonts fs-6">&#8211; Aula 01 &#8211; <a class="altera-fonts fs-6" href="https://spazioesthetic.com.br/index.php/m4ta1/" rel="noopener"><b  class="altera-fonts fs-6">Plano de Aplicação</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 02 &#8211; <a  class="altera-fonts fs-6" href="https://spazioesthetic.com.br/index.php/m4ta2/" rel="noopener"><b  class="altera-fonts fs-6">Classificação dos Fios</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 03 &#8211; <a class="altera-fonts fs-6" href="https://spazioesthetic.com.br/index.php/m4ta3/" rel="noopener"><b  class="altera-fonts fs-6">Absorção e Propriedades</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 04 &#8211; <a class="altera-fonts fs-6" href="https://spazioesthetic.com.br/index.php/m4ta4/" rel="noopener"><b class="altera-fonts fs-6">Técnicas de Aplicação</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 05 &#8211; <a class="altera-fonts fs-6" href="https://spazioesthetic.com.br/index.php/m4ta5/" rel="noopener"><b  class="altera-fonts fs-6">Contra Indicações e Associações</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 06  &#8211; <a  class="altera-fonts fs-6" href="https://spazioesthetic.com.br/index.php/m4ta6/" rel="noopener"><b  class="altera-fonts fs-6">Intercorrências com Fios Absorvíveis</b></a></p><p  class="altera-fonts fs-6">&#8211; Aula 07 &#8211; <a class="altera-fonts fs-6" href="https://spazioesthetic.com.br/index.php/m4ta7/" rel="noopener"><b  class="altera-fonts fs-6">Perguntas Frequentes</b></a></p><div> </div><p  class="altera-fonts fs-6"><b class="altera-fonts fs-6"> </b></p><p><b class="altera-fonts fs-5">Aulas Práticas:</b><span class="altera-fonts fs-6"> </span></p><p><span class="altera-fonts fs-6"> </span></p><p> </p><p  class="altera-fonts fs-6">&#8211; <a href="https://spazioesthetic.com.br/index.php/m4pa1/" rel="noopener"><b  class="altera-fonts fs-6">Aula prática 01</b></a> </p><p  class="altera-fonts fs-6">&#8211; <a  class="altera-fonts fs-6" href="https://spazioesthetic.com.br/index.php/m4pa2/" rel="noopener"><b  class="altera-fonts fs-6">Aula prática 02</b> </a></p>	<p  class="altera-fonts fs-6">&#8211; <a href="https://spazioesthetic.com.br/index.php/m4pa1/" rel="noopener"><b  class="altera-fonts fs-6">Aula prática 03</b></a> </p>	<p  class="altera-fonts fs-6">&#8211; <a href="https://spazioesthetic.com.br/index.php/m4pa1/" rel="noopener"><b  class="altera-fonts fs-6">Aula prática 04</b></a> </p>				</div>
                        </p>
                        </div>
                    </div>
                
                    
        
        <script src="../bootstrap5/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
    
</html>