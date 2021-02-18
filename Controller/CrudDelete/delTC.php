<?php 
    include "../conexao.php";

    $id_turno = $_GET['id_turno'];

    $sql = "delete from turno_cursos where id_turno = $id_turno";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudTC.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editTC.php?erro");

    }
    