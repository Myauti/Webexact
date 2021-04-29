<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_atividades'];

    $sql = "select * from atividades where id_atividades= $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarAtiv.php">
            <div class="form-group">
                <label for="id_atividades">id_atividades</label>
                <input id="id_atividades" class="form-control" type="number" name="id_atividades" required
                    value="<?php echo $obj->id_atividades; ?>">
            </div>
            <div class="form-group">
                <label for="nome">nome</label>
                <input id="nome" class="form-control" type="text" name="nome" required
                    value="<?php echo $obj->nome;?>">
            </div>
            <div class="form-group">
                <label for="disciplina_atividade">disciplina_atividade</label>
                <input id="disciplina_atividade" class="form-control" type="number" name="disciplina_atividade" required
                    value="<?php echo $obj->disciplina_atividade;?>">
            </div>
            <div class="form-group">
                <label for="descricao">descricao</label>
                <input id="descricao" class="form-control" type="text" name="descricao" required
                    value="<?php echo $obj->descricao ;?>">
            </div>
            <div class="form-group">
                <label for="categoria_atividade">categoria_atividade</label>
                <input id="categoria_atividade" class="form-control" type="number" name="categoria_atividade" required
                    value="<?php echo $obj->categoria_atividade ;?>">
            </div>
            <div class="form-group">
                <label for="data_inicio">data_inicio</label>
                <input id="data_inicio" class="form-control" type="date" name="data_inicio" required
                    value="<?php echo $obj->data_inicio ;?>">
            </div>
            <div class="form-group">
                <label for="data_fim">data_fim</label>
                <input id="data_fim" class="form-control" type="date" name="data_fim" required
                    value="<?php echo $obj->data_fim ;?>">
            </div>
            <div class="form-group">
                <label for="atividade_resposta">atividade_resposta</label>
                <input id="atividade_resposta" class="form-control" type="text" name="atividade_resposta" required
                    value="<?php echo $obj->atividade_resposta ;?>">
            </div>

        <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudAtiv.php" class="btn btn-primary">Voltar</a>
        </div>
        </form>

           

    </div>

</body>

</html>