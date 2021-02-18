<?php 
    include "../conexao.php";

    $id_disciplinas = $_GET['id_disciplinas'];

    $sql = "delete from disciplinas where id_disciplinas = $id_disciplinas";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudDisc.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editDisc.php?erro");

    }
    