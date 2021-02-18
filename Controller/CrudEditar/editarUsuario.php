<?php 
    include "../conexao.php";

    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf']; 
    $senha = $_POST['senha'];	
    $telefone = $_POST['telefone'];	
    $email = $_POST['email'];	
    $grupo_usuario = $_POST['grupo_usuario'];	
    $data_nascimento = $_POST['data_nascimento'];	
    $sexo_usuario = $_POST['sexo_usuario'];	
    

    $sql = "update usuarios set nome= '$nome', cpf='$cpf', senha='$senha',
    telefone='$telefone', email='$email', grupo_usuario='$grupo_usuario', data_nascimento='$data_nascimento', 
    sexo_usuario='$sexo_usuario' where id_usuario = $id_usuario";


    $rs = $conec->query($sql);

    if ($rs) {
        Header ("Location: ../../View/Crud/crudUsuarios.php");
    } else {
        Header("Location: ../../View/Crud/editCrud/editUsuario.php?erro");

    }
    