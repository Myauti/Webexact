<?php 
    include "../conexao.php";

    $id_atividades = $_GET['id_atividades'];

    $sql = "delete from atividades where id_atividades = $id_atividades";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudAtiv.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editAtiv.php?erro");

    }
    