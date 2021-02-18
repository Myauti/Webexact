<?php 
    include "../conexao.php";

    $id_professor_disciplina = $_GET['id_professor_disciplina'];

    $sql = "delete from professor_disciplina where id_professor_disciplina = $id_professor_disciplina";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudVinc.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editVinc.php?erro");

    }
    