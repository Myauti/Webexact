<?php 
    include "../conexao.php";

    $id_atividades = $_POST['id_atividades'];
    $nome = $_POST['nome'];
    $disciplina_atividade = $_POST['disciplina_atividade'];
    $descricao = $_POST['descricao'];
    $categoria_atividade = $_POST['categoria_atividade'];
    $data_inicio = $_POST['data_inicio'];
    $data_fim = $_POST['data_fim'];
    $atividade_resposta = $_POST['atividade_resposta'];

    $sql = "update atividades set nome= '$nome', disciplina_atividade= '$disciplina_atividade', descricao='$descricao', categoria_atividade='$categoria_atividade',
    data_inicio='$data_inicio', data_fim='$data_fim', atividade_resposta='$atividade_resposta' where id_atividades = $id_atividades";

    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudAtiv.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editAtiv.php?erro");

    }
    