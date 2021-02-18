<?php 
    include "../conexao.php";

    $id_uf = $_POST['id_uf'];
    $sigla = $_POST['sigla'];
    $estado = $_POST['estado'];
  

    $sql = "update ufs set id_uf = '$id_uf', sigla='$sigla', estado='$estado' where id_turno = $id_turno";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudUF.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editUF.php?erro");

    }
    