<?php 
    include "../conexao.php";

    $id_resolucao = $_GET['id_resolucao'];

    $sql = "delete from resolucoes where id_resolucao=$id_resolucao";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudRes.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editRes.php?erro");

    }
    