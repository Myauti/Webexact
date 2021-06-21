<?php
include_once("conexao.php");

$id_atividade = $_POST['id_atividade'];
$id_aluno = $_POST['id_aluno'];
$resposta = $_POST['resposta'];

$consulta = "SELECT * FROM atividades WHERE id_atividades = $id_atividade";
$resultado = $conec->query($consulta);
$dados = $resultado->fetch_object();
$atividade_resposta = $dados->atividade_resposta;
$disciplina_atv = $dados->disciplina_atividade;

//Comparação entre a resposta da atividade e a resposta inserida pelo aluno, definindo se a variavel exito terá um valor true(tinyint(1)) ou false(tinyint(0))
if($resposta == $atividade_resposta){
    $exito = true;
}else{
    $exito = false;
}

$sql="SELECT COUNT(atividade_resolvida) FROM resolucoes WHERE atividade_resolvida = $id_atividade AND id_aluno_resolucao = $id_aluno";
$rs = $conec->query($sql);
$obj = $rs->fetch_array(MYSQLI_NUM);
$qtd_tentativa = implode(",", $obj);

//checar se há uma resposta, caso não tenha, dar o valor 1, se tiver, somar mais 1 ao valor atual.
if($qtd_tentativa >= 1){
    $qtd_tentativa = $qtd_tentativa + 1;
}else {
    $qtd_tentativa = 1;
}



//sql="SELECT * FROM resolucoes WHERE id_aluno_resolucao = $id_aluno";
//$rs = $conec->query($sql);
//$obj = $rs->fetch_object();
//$qtd_tentativa = $obj->qtd_tentativa;



    

$inserir = "INSERT INTO resolucoes (atividade_resolvida, id_aluno_resolucao, qtd_tentativa, resposta_tentativa, exito) VALUES ('$id_atividade', '$id_aluno', '$qtd_tentativa', '$resposta', '$exito')";
$exec = $conec->query($inserir);


$resolucoes = "SELECT atividades.disciplina_atividade, resolucoes.atividade_resolvida, MAX(resolucoes.exito) as exito, resolucoes.id_aluno_resolucao, MAX(resolucoes.qtd_tentativa) as qtd_tentativa FROM resolucoes 
  INNER JOIN atividades ON resolucoes.atividade_resolvida = atividades.id_atividades
  WHERE id_aluno_resolucao = $id_aluno AND disciplina_atividade = $disciplina_atv";
  $return = $conec->query($resolucoes);
  $ret = $return->fetch_object();
  $ex = $ret->exito;
  $atv_res = $ret->atividade_resolvida;
  $qtt = $ret->qtd_tentativa;


header("Location: ../View/aluno.php?ex=$exito&atvreso=$id_atividade&qt=$qtd_tentativa");