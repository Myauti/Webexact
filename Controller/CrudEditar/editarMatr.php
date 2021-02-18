<?php 
    include "../conexao.php";

    $id_situacao_matricula = $_POST['id_situacao_matricula'];
    $situacao = $_POST['situacao'];
  

    $sql = "update situacoes_matricula set situacao = '$situacao' where id_situacao_matricula = $id_situacao_matricula";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudMatr.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editMatr.php?erro");

    }
    