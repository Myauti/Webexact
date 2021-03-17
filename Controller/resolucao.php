<?php
include_once("conexao.php");

$id_atividade = $_POST['id_atividade'];
$id_aluno = $_POST['id_aluno'];
$resposta = $_POST['resposta'];

$consulta = "SELECT * FROM atividades WHERE id_atividades = $id_atividade";
$resultado = $conec->query($consulta);
$dados = $resultado->fetch_object();
$atividade_resposta = $dados->atividade_resposta;

//Comparação entre a resposta da atividade e a resposta inserida pelo aluno, definindo se a variavel exito terá um valor true(tinyint(1)) ou false(tinyint(0))
if($resposta == $atividade_resposta){
    $exito = true;
}else{
    $exito = false;
}

$inserir = "INSERT INTO resolucoes (atividade_resolvida, id_aluno_resolucao, resposta_tentativa, exito) VALUES ('$id_atividade', '$id_aluno', '$resposta', '$exito')";
$exec = $conec->query($inserir);



$sql="SELECT * FROM resolucoes WHERE id_aluno_resolucao = $id_aluno";
$rs = $conec->query($sql);
$obj = $rs->fetch_object();
$qtd_tentativa = $obj->qtd_tentativa;

//checar se há uma resposta, caso não tenha, dar o valor 1, se tiver, somar mais 1 ao valor atual.

    if($qtd_tentativa >= 1){
        $qtd_tentativa = $qtd_tentativa + 1;
    }else {
        $qtd_tentativa = 1;
    }

    $atualizar = "UPDATE resolucoes set qtd_tentativa = '$qtd_tentativa' WHERE id_aluno_resolucao = $id_aluno";
    $rs_atualizar = $conec->query($atualizar);

header("Location: ../View/aluno.php");