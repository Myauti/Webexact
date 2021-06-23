<?php

include_once("conexao.php");

$id_aluno = $_POST['estudante'];
$id_disciplina = $_POST['disciplina'];

$consulta = "INSERT into aluno_disciplina (aluno_vinculado, aluno_disciplina_vinculada) 
             values ('$id_aluno', '$id_disciplina')";

$inserir = $conec->query($consulta);

header("Location: ../View/vincAluno.php?");

?>