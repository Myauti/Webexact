<?php
    include_once("conexao.php");
    //CADASTRO DE USUARIO

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $senha = md5($senha);
    $telefone = $_POST['telefone_pessoal'];
    $dataNasc = $_POST['dataNasc'];
    $sexo = $_POST['sexo'];
    $email_pessoal = $_POST['email_pessoal'];
    $grupo = 3;
    
    //CAMPOS DO PROFESSOR
    $unidade = $_POST['unidade'];
    $matricula = $_POST['matricula'];
    $escolaridade = $_POST['escolaridade'];
    $telefone_profissional = $_POST['telefone_profissional'];
    $email_profissional = $_POST['email_profissional'];
    
    $inserir = "INSERT INTO usuarios (nome, cpf, senha, telefone, email, data_nascimento, sexo_usuario, grupo_usuario) 
    VALUES ('$nome', '$cpf', '$senha', '$telefone', '$email_pessoal', '$dataNasc', '$sexo', '$grupo')";

    $resultado_inserir = $conec->query($inserir); // Realiza a inserção no banco
    $id_inserido = $conec->insert_id; // Todas as duas funcionam
    //$id_inserido = mysqli_insert_id($conec); // Escolha a que você achar mais fácil

    $inserir_professor = "INSERT INTO professores (usuario_professor, unidade_ensino_professor, email_profissional, telefone_profissional, matricula, professor_escolaridade) 
    VALUES ('$id_inserido','$unidade', '$email_profissional', '$telefone_profissional', '$matricula', '$escolaridade')";
    $resultado_inserir_aluno = mysqli_query($conec, $inserir_professor);

    header("Location: ../View/login.php");
?>