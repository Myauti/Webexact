<?php 
    include "../conexao.php";

    $id_situacao_matricula = $_GET['id_situacao_matricula'];

    $sql = "delete from situacoes_matricula where id_situacao_matricula = $id_situacao_matricula";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudMatr.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editMatr.php?erro");

    }
    