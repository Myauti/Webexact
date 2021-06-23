<?php

include_once("conexao.php");

$id_professor = $_POST['professor'];
$id_disciplina = $_POST['disciplina'];

$consulta = "INSERT into professor_disciplina (professor_vinculado, disciplina_vinculada) 
             values ('$id_professor', '$id_disciplina')";

$inserir = $conec->query($consulta);

header("Location: ../View/Crud/crudVinc.php?");

?>