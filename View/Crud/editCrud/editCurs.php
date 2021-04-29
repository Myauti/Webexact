<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_curso'];

    $sql = "select * from cursos where id_curso = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarCurs.php">
            <div class="form-group">
                <label for="id_curso">id_curso</label>
                <input id="id_curso" class="form-control" type="number" name="id_curso" required
                    value="<?php echo $obj->id_curso; ?>">
            </div>
            <div class="form-group">
                <label for="nome">nome</label>
                <input id="nome" class="form-control" type="text" name="nome" required
                    value="<?php echo $obj->nome;?>">
            </div>
            <div class="form-group">
                <label for="turno_curso">turno_curso</label>
                <input id="turno_curso" class="form-control" type="number" name="turno_curso" required
                    value="<?php echo $obj->turno_curso;?>">
            </div>
            <div class="form-group">
                <label for="periodos">periodos</label>
                <input id="periodos" class="form-control" type="number" name="periodos" required
                    value="<?php echo $obj->periodos;?>">
            </div>
            <div class="form-group">
                <label for="unidade">unidade</label>
                <input id="unidade" class="form-control" type="number" name="unidade" required
                    value="<?php echo $obj->unidade;?>">
            </div>

        <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudCurs.php" class="btn btn-primary">Voltar</a>
        </div>
        </form>

           

    </div>

</body>

</html>