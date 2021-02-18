<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_unidade'];

    $sql = "select * from unidades_ensiono where id_unidade = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarUnid.php">
            <div class="form-group">
                <label for="id_unidade">id_unidade</label>
                <input id="id_unidade" class="form-control" type="number" name="id_unidade" required
                    value="<?php echo $obj->id_unidade; ?>">
            </div>
            <div class="form-group">
                <label for="nome">nome</label>
                <input id="nome" class="form-control" type="text" name="nome">
            </div>

        </div>
        <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudUnid.php" class="btn btn-primary">Voltar</a>
        </form>

           

    </div>

</body>

</html>