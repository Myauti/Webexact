<?php 
    include "../conexao.php";

    $id_professor = $_GET['id_professor'];

    $sql = "delete from professores where id_professor = $id_professor";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudProf.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editProf.php?erro");

    }
    