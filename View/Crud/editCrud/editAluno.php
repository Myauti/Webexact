<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_aluno'];


    $sql = "select * from alunos where id_aluno = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarAluno.php">
            <div class="form-group">
                <label for="id_aluno">id_aluno</label>
                <input id="id_aluno" class="form-control" type="number" name="id_aluno" required
                    value="<?php echo $obj->id_aluno; ?>">
            </div>
        <div class="form-group">
            <div class="form-group">
                <label for="usuario_aluno">usuario_aluno</label>
                <input id="usuario_aluno" class="form-control" type="number" name="usuario_aluno" required
                    value="<?php echo $obj->usuario_aluno; ?>">
            </div>
            <label for="unidade_ensino_aluno">unidade_ensino_aluno</label>
            <input id="unidade_ensino_aluno" class="form-control" type="number" name="unidade_ensino_aluno" required
                value="<?php echo $obj->unidade_ensino_aluno; ?>">
        </div>
        <div class="form-group">
            <label for="aluno_curso">aluno_curso</label>
            <input id="aluno_curso" class="form-control" type="number" name="aluno_curso" required
                value="<?php echo $obj->aluno_curso; ?>">
        </div>
        <div class="form-group">
            <label for="matricula">matricula</label>
            <input id="matricula" class="form-control" type="number" name="matricula" required
                value="<?php echo $obj->matricula; ?>">
        </div>
        <div class="form-group">
            <label for="data_ingresso">data_ingresso</label>
            <input id="data_ingresso" class="form-control" type="text" name="data_ingresso" required
                value="<?php echo $obj->data_ingresso; ?>">
        </div>
        <div class="form-group">
            <label for="data_conclusao">data_conclusao</label>
            <input id="data_conclusao" class="form-control" type="text" name="data_conclusao" required
                value="<?php echo $obj->data_conclusao; ?>">
        </div>
        <div class="form-group">
            <label for="aluno_escolaridade">aluno_escolaridade</label>
            <input id="aluno_escolaridade" class="form-control" type="number" name="aluno_escolaridade" required
                value="<?php echo $obj->aluno_escolaridade; ?>">
        </div>
        <div class="form-group">
            <label for="aluno_matricula_situacao">aluno_matricula_situacao</label>
            <input id="aluno_matricula_situacao" class="form-control" type="number" name="aluno_matricula_situacao"
                required value="<?php echo $obj->aluno_matricula_situacao; ?>">
        </div>
        <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudAluno.php" class="btn btn-primary">Voltar</a>
        
     </form>

    </div>

</body>

</html>