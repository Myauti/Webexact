<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_aluno_disciplina'];


    $sql = "select * from aluno_disciplina where id_aluno_disciplina = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarDiscAlu.php">
            <div class="form-group">
                <label for="id_aluno_disciplina">id_aluno_disciplina</label>
                <input id="id_aluno_disciplina" class="form-control" type="number" name="id_aluno_disciplina" required
                    value="<?php echo $obj->id_aluno_disciplina; ?>">
            </div>
        <div class="form-group">
            <div class="form-group">
                <label for="aluno_vinculado">aluno_vinculado</label>
                <input id="aluno_vinculado" class="form-control" type="number" name="aluno_vinculado" required
                    value="<?php echo $obj->aluno_vinculado; ?>">
            </div>
            <label for="aluno_disciplina_vinculada">aluno_disciplina_vinculada</label>
            <input id="aluno_disciplina_vinculada" class="form-control" type="number" name="aluno_disciplina_vinculada" required
                value="<?php echo $obj->aluno_disciplina_vinculada; ?>">
        </div>

        <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudDiscAlu.php" class="btn btn-primary">Voltar</a>
        
     </form>

    </div>

</body>

</html>