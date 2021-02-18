<?php 
    include "../conexao.php";

    $id_sexo = $_POST['id_sexo'];
    $nome = $_POST['nome'];

    $sql = "update sexos set nome= '$nome' where id_sexo = $id_sexo";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudSex.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editSex.php?erro");

    }
    