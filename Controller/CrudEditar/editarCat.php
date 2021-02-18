<?php 
    include "../conexao.php";

    $id_categoria_atividades = $_POST['id_categoria_atividades'];
    $nome = $_POST['nome'];

    $sql = "update categoria_atividades set nome= '$nome' where id_categoria_atividades = $id_categoria_atividades";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudCat.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editCat.php?erro");

    }
    