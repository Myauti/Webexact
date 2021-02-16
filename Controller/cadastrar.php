<?php
    include_once("conexao.php");
    //CADASTRO DE ALUNO

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $senha = md5($senha); //criptografar senha
    $email = $_POST['email'];
    $unidade = $_POST['unidade'];
    $telefone = $_POST['telefone'];
    $dataNasc = $_POST['dataNasc'];
    $sexo = $_POST['sexo'];
    $id = $_POST['tipoUsuario'];
    $inserir = "INSERT INTO cadastro (nome, cpf, senha, email, unidadesEnsino, telefone, dataNasc, sexo, id) VALUES ('$nome', '$cpf', '$senha', '$email', '$unidade', '$telefone', '$dataNasc', '$sexo', '$id')";

    $resultado_inserir = mysqli_query($conec, $inserir);
?>