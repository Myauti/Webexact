<?php 
    include "../conexao.php";

    $id_turno = $_POST['id_turno'];
    $turno = $_POST['turno'];
  

    $sql = "update turno_cursos set turno = '$turno' where id_turno = $id_turno";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudTC.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editTC.php?erro");

    }
    