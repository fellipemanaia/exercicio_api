<?php
    session_start();
    require('conexao.php');
    $email = $_POST['email_adm'];
    $senha = $_POST['senha_adm'];

    $senha = md5($senha);


    $consulta = "SELECT * FROM adm WHERE email_adm = '$email' AND senha_adm = '$senha'";

    $resultado = $conexao->query($consulta);
    $registros = $resultado->num_rows;
    $resultado_usuario = mysqli_fetch_assoc($resultado);
    var_dump($resultado_usuario);

    if($registros<>0){
        //echo "TE ACHEI";
        $_SESSION['id_adm'] = $resultado_usuario['id_adm'];
        $_SESSION['nome_adm'] = $resultado_usuario['nome_adm'];
        $_SESSION['email_adm'] = $resultado_usuario['email_adm'];

        header('Location: aplicacao/index.php');

    }
    else{
        //echo "NÃO ACHEI";
        header('Location: ../index.html');
    }
?>