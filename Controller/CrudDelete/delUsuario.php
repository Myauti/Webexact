<?php 
    include "../conexao.php";

    $id_usuario = $_GET['id_usuario'];

    $sql = "delete from usuarios where id_usuario = $id_usuario";

    $rs = $conec->query($sql);

    if ($rs) {
        header ("Location: ../../View/Crud/crudUsuarios.php");
    } else {
        header("Location: ../../View/Crud/editCrud/editUsuario.php?erro");

    }
    