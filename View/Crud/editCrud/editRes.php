<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_resolucao'];


    $sql = "select * from resolucoes where id_resolucao = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarRes.php">
            <div class="form-group">
                <label for="id_resolucao">id_resolucao</label>
                <input id="id_resolucao" class="form-control" type="number" name="id_resolucao" required
                    value="<?php echo $obj->id_resolucao; ?>">
            </div>
        <div class="form-group">
            <label for="id_aluno_resolucao">id_aluno_resolucao</label>
            <input id="id_aluno_resolucao" class="form-control" type="number" name="id_aluno_resolucao" required
                value="<?php echo $obj->id_aluno_resolucao; ?>">
        </div>
        <div class="form-group">
            <label for="qtd_tentativa">qtd_tentativa</label>
            <input id="qtd_tentativa" class="form-control" type="number" name="qtd_tentativa" required
                value="<?php echo $obj->qtd_tentativa; ?>">
        </div>
        <div class="form-group">
            <label for="resposta_tentativa">resposta_tentativa</label>
            <input id="resposta_tentativa" class="form-control" type="number" name="resposta_tentativa" required
                value="<?php echo $obj->resposta_tentativa; ?>">
        </div>
        <div class="form-group">
            <label for="exito">exito</label>
            <input id="exito" class="form-control" type="number" name="exito" required
                value="<?php echo $obj->exito; ?>">
        </div>
        <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudRes.php" class="btn btn-primary">Voltar</a>
        
     </form>

    </div>

</body>

</html>