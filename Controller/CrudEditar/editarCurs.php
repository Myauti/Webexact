<?php 
    include "../conexao.php";

    $id_curso = $_POST['id_curso'];
    $nome = $_POST['nome'];
    $turno_curso = $_POST['turno_curso'];
    $periodos = $_POST['periodos'];
    $unidade = $_POST['unidade'];
    
    $sql = "update cursos set nome= '$nome', turno_curso= '$turno_curso', periodos='$periodos', unidade='$unidade',
    where id_curso= $id_curso";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudCurs.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editCurs.php?erro");

    }
    