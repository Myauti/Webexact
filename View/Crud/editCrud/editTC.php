<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_turno'];

    $sql = "select * from turno_cursos where id_turno = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarTC.php">
            <div class="form-group">
                <label for="id_turno">id_turno</label>
                <input id="id_turno" class="form-control" type="number" name="turno" required
                    value="<?php echo $obj->id_turno; ?>">
            </div>
            <div class="form-group">
                <label for="turno">turno</label>
                <input id="turno" class="form-control" type="number" name="turno" required 
                    value="<?php echo $obj->turno;?>">
            </div>
        </div>
        <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudTC.php" class="btn btn-primary">Voltar</a>
        </form>

           

    </div>

</body>

</html>