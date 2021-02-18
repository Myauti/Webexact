<?php 
    include "../conexao.php";

    $id_escolaridade = $_GET['id_escolaridade'];

    $sql = "delete from escolaridades where id_escolaridade = $id_escolaridade";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudEsc.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editEsc.php?erro");

    }
    