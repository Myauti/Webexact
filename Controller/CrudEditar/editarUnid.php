<?php 
    include "../conexao.php";

    $id_unidade = $_POST['id_unidade'];
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    
  

    $sql = "update unidades_ensino set nome = '$nome', sigla='$sigla', telefone= '$telefone', email='$email',
    logradouro='$logradouro', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep' 
    where id_unidade = $id_unidade";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudUnid.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editUnid.php?erro");

    }
    