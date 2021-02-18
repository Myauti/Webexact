<?php 
    include "../conexao.php";

    $id_categoria_atividades = $_GET['id_categoria_atividades'];

    $sql = "delete from categoria_atividades where id_categoria_atividades = $id_categoria_atividades";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudCat.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editCat.php?erro");

    }
    