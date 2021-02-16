<?php
    include_once("conexao.php");
    //CADASTRO DE USUARIO

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $senha = md5($senha); //criptografar senha
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $dataNasc = $_POST['dataNasc'];
    $sexo = $_POST['sexo'];
    $grupo = 2;

    //CAMPOS DO ALUNO
    $unidade = $_POST['unidade'];
    $curso = $_POST['cursos'];
    $matricula = $_POST['matricula'];
    $dataIngresso = $_POST['dataIngresso'];
    $dataConclusao = $_POST['dataConclusao'];
    $escolaridade = $_POST['escolaridade'];
    $situacaoMatricula = $_POST['situacaoMatricula'];

    $inserir = "INSERT INTO usuarios (nome, cpf, senha, telefone, email, data_nascimento, sexo_usuario, grupo_usuario) 
    VALUES ('$nome', '$cpf', '$senha', '$telefone', '$email', '$dataNasc', '$sexo', '$grupo')";
    $resultado_inserir = mysqli_query($conec, $inserir);

    $resultado_inserir = $conec->query($inserir);
    $id_inserido = $conec->insert_id;
    
    $inserir_aluno = "INSERT INTO alunos (usuario_aluno, unidade_ensino_aluno, aluno_curso, matricula, data_ingresso, data_conclusao, aluno_escolaridade, aluno_matricula_situacao) 
    VALUES ('$id_inserido', '$unidade', '$curso', '$matricula', '$dataIngresso', '$dataConclusao', '$escolaridade', '$situacaoMatricula')";
    $resultado_inserir_aluno = mysqli_query($conec, $inserir_aluno);

    header("Location: ../View/login.php");
?>