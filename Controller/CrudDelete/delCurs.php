<?php 
    include "../conexao.php";

    $id_curso = $_GET['id_curso'];

    $sql = "delete from cursos where id_curso = $id_curso";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudCurs.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editCurs.php?erro");

    }
    