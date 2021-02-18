<?php 
    include "../conexao.php";

    $id_escolaridade = $_POST['id_escolaridade'];
    $escolaridade = $_POST['escolaridade'];

    $sql = "update escolaridades set escolaridade= '$nome' where id_escolaridade = $id_escolaridade";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudEsc.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editEsc.php?erro");

    }
    