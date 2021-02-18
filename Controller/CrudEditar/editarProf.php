<?php 
    include "../conexao.php";

    $id_professor = $_POST['id_professor'];
    $usuario_professor = $_POST['usuario_professor'];
    $unidade_ensino_professor = $_POST['unidade_ensino_professor'];
    $email_profissional = $_POST['email_professional'];
    $telefone_profissional = $_POST['telefone_profissional'];
    $matricula = $_POST['matricula'];
    $professor_escolaridade = $_POST['professor_escolaridade'];
   
    

    $sql = "update professores set usuario_professor= '$usuario_professor', unidade_ensino_professor= '$unidade_ensino_professor',
    email_profissional= '$email_profissional', telefone_profissional= '$telefone_profissional', matricula= '$matricula', 
    professor_escolaridade= '$professor_escolaridade' where id_professor = $id_professor";


    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudProf.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editProf.php?erro");

    }
    