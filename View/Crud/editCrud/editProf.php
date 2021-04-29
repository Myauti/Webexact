<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_professor'];

    $sql = "select * from professores where id_professor = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarProf.php">
            <div class="form-group">
                <label for="id_professor">id_professor</label>
                <input id="id_professor" class="form-control" type="number" name="id_professor" required
                    value="<?php echo $obj->id_professor; ?>">
            </div>
        <div class="form-group">
            <label for="usuario_professor">usuario_professor</label>
            <input id="usuario_professor" class="form-control" type="number" name="usuario_professor" required
                value="<?php echo $obj->usuario_professor; ?>">
        </div>
        <div class="form-group">
            <label for="unidade_ensino_professor">unidade_ensino_professor</label>
            <input id="unidade_ensino_professor" class="form-control" type="number" name="unidade_ensino_professor" required
                value="<?php echo $obj->unidade_ensino_professor;?>">
        </div>
        <div class="form-group">
            <label for="email_profissional">email_profissional</label>
            <input id="email_profissional" class="form-control" type="email" name="email_profissional" required
                value="<?php echo $obj->email_profissional;?>">
        </div>
        <div class="form-group">
            <label for="telefone_profissional">telefone_profissional</label>
            <input id="telefone_profissional" class="form-control" type="number" name="telefone_profissional" required
                value="<?php echo $obj->telefone_profissional;?>">
        </div>
        <div class="form-group">
            <label for="matricula">matricula</label>
            <input id="matricula" class="form-control" type="number" name="matricula" required
                value="<?php echo $obj->matricula;?>">
        </div>
        <div class="form-group">
            <label for="professor_escolaridade">professor_escolaridade</label>
            <input id="professor_escolaridade " class="form-control" type="number" name="professor_escolaridade" required
                value="<?php echo $obj->professor_escolaridade;?>">
        </div>
        
        <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudProf.php" class="btn btn-primary">Voltar</a>
        </div>
        </form>

           

    </div>

</body>

</html>