<?php 
    include "../conexao.php";

    $id_unidade = $_GET['id_unidade'];

    $sql = "delete from unidades_ensino where id_unidade = $id_unidade";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudUnid.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editUnid.php?erro");

    }
    