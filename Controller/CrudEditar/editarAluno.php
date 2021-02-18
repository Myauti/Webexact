<?php 
    include "../conexao.php";

    $id_aluno = $_POST['id_aluno'];
    $usuario_aluno = $_POST['usuario_aluno'];
    $unidade_ensino_aluno = $_POST['unidade_ensino_aluno']; 
    $aluno_curso = $_POST['aluno_curso'];	
    $matricula = $_POST['matricula'];	
    $data_ingresso = $_POST['data_ingresso'];	
    $data_conclusao = $_POST['data_conclusao'];	
    $aluno_escolaridade = $_POST['aluno_escolaridade'];	
    $aluno_matricula_situacao = $_POST['aluno_matricula_situacao'];	
    

    $sql = "update alunos set usuario_aluno= '$usuario_aluno', unidade_ensino_aluno='$unidade_ensino_aluno', aluno_curso='$aluno_curso',
    matricula='$matricula', data_ingresso='$data_ingresso', data_conclusao='$data_conclusao', aluno_escolaridade='$aluno_escolaridade', 
    aluno_matricula_situacao='$aluno_matricula_situacao' where id_aluno = $id_aluno";


    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudAluno.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editAluno.php?erro");

    }
    