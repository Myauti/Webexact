<?php 
    include "../conexao.php";

    $id_disciplinas = $_POST['id_disciplinas'];
    $nome =  $_POST['nome'];
    $curso_disciplina =  $_POST['curso_disciplina'];
    $periodos_disciplina = $_POST['periodos_disciplina'];
   
   
    

    $sql = "update disciplinas set nome = '$nome',
    curso_disciplina= '$curso_disciplina', periodos_disciplina= '$periodos_disciplina' where id_disciplinas = $id_disciplinas";


    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudDisc.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editDisc.php?erro");

    }
    