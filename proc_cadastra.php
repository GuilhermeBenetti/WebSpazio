<?php
session_start();
include_once 'conn.php';


        $nome_cad = filter_input(INPUT_POST, 'nome_cad', FILTER_SANITIZE_STRING);
        $login_cad = filter_input(INPUT_POST, 'login_cad', FILTER_SANITIZE_STRING);
        $senha_cad = filter_input(INPUT_POST, 'senha_cad', FILTER_SANITIZE_STRING);
        
        $botox = filter_input(INPUT_POST, 'Check1', FILTER_SANITIZE_STRING);
        $preenchimento = filter_input(INPUT_POST, 'Check2', FILTER_SANITIZE_STRING);
        $bioestimuladores = filter_input(INPUT_POST, 'Check3', FILTER_SANITIZE_STRING);
        $fios = filter_input(INPUT_POST, 'Check4', FILTER_SANITIZE_STRING);
        
        
        
        $senha = crypt($senha_cad);

        $result_usuario = "INSERT INTO usuarios_sistema (nome, login, senha, privilegios, botox, preenchimento, bioestimulador, fios) VALUES ('$nome_cad', '$login_cad', '$senha', '0', '$botox', '$preenchimento', '$bioestimuladores', '$fios')";
        $resultado_usuario = mysqli_query($conn, $result_usuario);

        if(mysqli_insert_id($conn)){
	        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	        header("Location: cadastra_usuario.php");
        }else{
	        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
        	header("Location: cadastra_usuario.php");
        }
        
    
?>