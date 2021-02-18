<?php 
    include "../conexao.php";

    $id_aluno = $_GET['id_aluno'];

    $sql = "delete from alunos where id_aluno=$id_aluno";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudAluno.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editAluno.php?erro");

    }
    