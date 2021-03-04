<?php
    include "conexao.php";

    $nome = $_POST['nome'];
    $disciplina = $_POST['disciplina'];
    $descricao = $_POST['descricao'];
    $categoria_atividade = $_POST['categoria'];
    $inicio = $_POST['inicio'];
    $fim = $_POST['fim'];
    $resposta = $_POST['resposta'];

    $sql = "INSERT INTO atividades(nome, disciplina_atividade, descricao, categoria_atividade, data_inicio, data_fim, atividade_resposta)
            VALUES ('$nome', '$disciplina', '$descricao', '$categoria_atividade', '$inicio', '$fim', '$resposta')";

    $result = $conec->query($sql);

    $id = mysqli_insert_id($conec);

    if(isset($_POST['submit'])){
        $file = $_FILES['arquivo'];
        
        $fileName = $_FILES['arquivo']['name'];
        $fileTmpName = $_FILES['arquivo']['tmp_name'];
        $fileSize = $_FILES['arquivo']['size'];
        $fileError = $_FILES['arquivo']['error'];
        $fileType = $_FILES['arquivo']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExtension = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'pdf', 'png', 'docx', 'odt');

        if(in_array($fileActualExtension, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExtension;
                    $fileDestination = '../upload/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "update atividades set arquivo='$fileNameNew' where id_atividades = $id";
                    $conec->query($sql);
                    header("Location: ../View/professor.php?uploadsuccess");
                } else {
                    echo "Seu arquivo é muito grande!";
                }
            } else {
                echo "Houve um erro ao fazer o upload deste arquivo!";
            }
        }else {
                echo "Você não pode enviar arquivos deste tipo!";
            }
    }

