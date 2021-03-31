<?php 
    include "../conexao.php";

    $id_aluno_disciplina = $_GET['id_aluno_disciplina'];

    $sql = "delete from aluno_disciplina where id_aluno_disciplina=$id_aluno_disciplina";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudDiscAlu.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editDiscAlu.php?erro");

    }
    