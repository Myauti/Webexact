<?php 
    include "../../../Controller/conexao.php";
    $id = $_GET['id_usuario'];

    $sql = "select * from usuarios where id_usuario = $id";
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
        <form method="POST" action="../../../Controller/CrudEditar/editarUsuario.php">
            <div class="form-group">
                <label for="id_usuario">id_usuario</label>
                <input id="id_usuario" class="form-control" type="number" name="id_usuario" required
                    value="<?php echo $obj->id_usuario; ?>">
            </div>
         <div class="form-group">
            <div class="form-group">
                <label for="nome">nome</label>
                <input id="nome" class="form-control" type="text" name="nome" required
                    value="<?php echo $obj->nome; ?>">
            </div>
            <div class="form-group">
                <label for="cpf">cpf</label>
                <input id="cpf" class="form-control" type="number" name="cpf" required 
                    value="<?php echo $obj->cpf; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="telefone">telefone</label>
                <input id="telefone" class="form-control" type="number" name="telefone" required
                    value="<?php echo $obj->telefone; ?>">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input id="email" class="form-control" type="email" name="email" required
                    value="<?php echo $obj->email; ?>">
            </div>
            <div class="form-group">
                <label for="data_nascimento">data_nasc</label>
                <input id="data_nascimento" class="form-control" type="date" name="data_nascimento" required
                    value="<?php echo $obj->data_nascimento; ?>">
            </div>
            <div class="form-group">
                <label for="sexo_usuario">sexo_usuario</label>
                <input id="sexo_usuario" class="form-control" type="text" name="sexo_usuario" required
                    value="<?php echo $obj->sexo_usuario;?>">
            </div>
            <div class="form-group">
                <label for="grupo_usuario">grupo_usuario</label>
                <input id="grupo_usuario" class="form-control" type="text" name="grupo_usuario" required
                    value="<?php echo $obj->grupo_usuario;?>">
            </div>
            <button class="btn btn-success" type="submit">Gravar </button>
        <a href="../crudUsuarios.php" class="btn btn-primary">Voltar</a>
        </div>
        </div>
        
        </form>

           

    </div>

</body>

</html>