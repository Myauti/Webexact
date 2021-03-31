<?php 
    include "../conexao.php";

    $id_aluno_disciplina = $_POST['id_aluno_disciplina'];
    $aluno_vinculado = $_POST['aluno_vinculado'];
    $aluno_disciplina_vinculada = $_POST['aluno_disciplina_vinculada']; 	

    $sql = "update alunos set aluno_vinculado= '$aluno_vinculado', aluno_disciplina_vinculada='$aluno_disciplina_vinculada' where id_aluno_disciplina = $id_aluno_disciplina";


    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudDiscAlu.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editDiscAlu.php?erro");

    }
    