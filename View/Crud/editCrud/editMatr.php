<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_situacao_matricula'];

    $sql = "select * from situacoes_matricula where id_situacao_matricula = $id";
    $rs = $conec->query($sql);
    $obj = $rs->fetch_object();
   

?>
<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Webexact - ADM</title>
    <link rel="stylesheet" type="text/css" href="../estilo.css">
</head>

<body>
    <div class="container">
        <h3>Editar</h3>
        <?php if(isset($_GET['erro'])) { ?>
        <div class="alert alert-danger" role="alert">
            Ocorreu um erro, tente novamente!
        </div>
        <?php } ?>
        <form method="POST" action="../../../Controller/CrudEditar/editarMatr.php">
            <div class="form-group">
                <label for="id_situacao_matricula">id_situacao_matricula</label>
                <input id="id_situacao_matricula" class="form-control" type="number" name="id_situacao_matricula" required
                    value="<?php echo $obj->id_situacao_matricula; ?>">
            </div>
            <div class="form-group">
                <label for="situacao">situacao</label>
                <input id="situacao" class="form-control" type="text" name="situacao" required 
                    value="<?php echo $obj->situacao;?>">
            </div>
                <button class="btn btn-success" type="submit">Gravar </button>
                <a href="../crudMatr.php" class="btn btn-primary">Voltar</a>
            </div>
        
        </form>

    </div>

</body>

</html>