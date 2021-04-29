<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_escolaridade'];

    $sql = "select * from escolaridades where id_escolaridade = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarSex.php">
            <div class="form-group">
                <label for="id_escolaridade">id_escolaridade</label>
                <input id="id_escolaridade" class="form-control" type="number" name="id_escolaridade" required
                    value="<?php echo $obj->id_escolaridade; ?>">
            </div>
            <div class="form-group">
                <label for="escolaridade">escolaridade</label>
                <input id="escolaridade" class="form-control" type="text" name="escolaridade" required
                    value="<?php echo $obj->escolaridade;?>">
            </div>
       
        <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudEsc.php" class="btn btn-primary">Voltar</a>
        </div>
        </form>

           

    </div>

</body>

</html>