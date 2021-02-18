<?php 
    include "../conexao.php";

    $id_uf = $_GET['id_uf'];

    $sql = "delete from ufs where id_uf = $id_uf";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudUF.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editUF.php?erro");

    }
    