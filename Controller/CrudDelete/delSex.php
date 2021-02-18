<?php 
    include "../conexao.php";

    $id_sexo = $_GET['id_sexo'];

    $sql = "delete from sexos where id_sexo = $id_sexo";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudSex.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editSex.php?erro");

    }
    