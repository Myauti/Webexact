<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_professor_disciplina'];

    $sql = "select * from professor_disciplina where id_professor_disciplina = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarVinc.php">
            <div class="form-group">
                <label for="id_professor_disciplina">id_professor_disciplina</label>
                <input id="id_professor_disciplina" class="form-control" type="number" name="id_professor_disciplina" required
                    value="<?php echo $obj->id_professor_disciplina; ?>">
            </div>
            <div class="form-group">
                <label for="professor_vinculado">professor_vinculado</label>
                <input id="professor_vinculado" class="form-control" type="number" name="professor_vinculado" required
                    value="<?php echo $obj->professor_vinculado;?>">
            </div>
            <div class="form-group">
                <label for="disciplina_vinculada">disciplina_vinculada</label>
                <input id="disciplina_vinculada" class="form-control" type="number" name="disciplina_vinculada" required
                    value="<?php echo $obj->disciplina_vinculada;?>">
            </div>
            <button class="btn btn-success" type="submit">Gravar </button>
            <a href="../crudVinc.php" class="btn btn-primary">Voltar</a>
        </div>
        
        </form>

           

    </div>

</body>

</html>