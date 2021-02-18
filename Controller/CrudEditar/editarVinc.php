<?php 
    include "../conexao.php";

    $id_professor_disciplina = $_POST['id_professor_disciplina'];
    $professor_vinculado = $_POST['professor_vinculado'];
    $disciplina_vinculada = $_POST['disciplina_vinculada'];


    $sql = "update professor_disciplina set professor_vinculado= '$professor_vinculado', disciplina_vinculada= '$disciplina_vinculada' where id_professor_disciplina = $id_professor_disciplina";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudVinc.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editVinc.php?erro");

    }
    