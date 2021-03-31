<?php 
    include "../conexao.php";

    $id_resolucao = $_POST['id_resolucao'];
    $atividade_resolvida = $_POST['atividade_resolvida'];
    $id_aluno_resolucao = $_POST['id_aluno_resolucao']; 
    $qtd_tentativa = $_POST['qtd_tentativa'];	
    $resposta_tentativa = $_POST['resposta_tentativa'];	
    $exito = $_POST['exito'];	

    $sql = "update alunos set atividade_resolvida= '$atividade_resolvida', id_aluno_resolucao='$id_aluno_resolucao', qtd_tentativa='$qtd_tentativa',
    resposta_tentativa='$resposta_tentativa', exito='$exito' where id_resolucao = $id_resolucao";


    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudRes.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editRes.php?erro");

    }
    