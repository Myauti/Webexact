<?php 
  include_once("../Controller/conexao.php");
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Webexact</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">WebExact</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <br>
      <div class="container">
      <h1>Cadastro de atividades</h1>
     
      <form action="../Controller/upload.php" method="POST" enctype="multipart/form-data">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome da atividade">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="disciplina">Disciplina</label>
              <select name="disciplina" class="form-control">
                <option selected>Escolher...</option>
                
                <?php
                  $sql = "SELECT * FROM disciplinas";
                  $resultado = mysqli_query($conec, $sql);

                  while($row_resultados = mysqli_fetch_assoc($resultado)){ ?>
                    <option value="<?php echo $row_resultados['id_disciplinas'];?>">
                      <?php
                        echo $row_resultados['nome']; 
                      ?>
                    </option> 
                    <?php 
                      }
                    ?>
              </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Descrição</label>
            <input type="text" class="form-control" name="descricao" placeholder="Descrição da atividade">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="categoria">Categoria</label>
              <select name="categoria" class="form-control">
                <option selected>Escolher...</option>
                
                <?php
                  $sql = "SELECT * FROM categoria_atividades";
                  $resultado = mysqli_query($conec, $sql);

                  while($row_resultados = mysqli_fetch_assoc($resultado)){ ?>
                    <option value="<?php echo $row_resultados['id_categoria_atividades'];?>">
                      <?php
                        echo $row_resultados['nome']; 
                      ?>
                    </option> 
                    <?php 
                      }
                    ?>
              </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inicio">Início</label>
            <input type="date" class="form-control" name="inicio" placeholder="Início da atividade">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="fim">Fim</label>
            <input type="date" class="form-control" name="fim" placeholder="Fim da atividade">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="resposta">Resposta</label>
              <input type="text" class="form-control" name="resposta" placeholder="Resposta da atividade">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="arquivo">Anexo</label>
            <input type="file" name="arquivo" class="form-control-file mb-2">
            <button type="submit" name="submit" class="btn btn-primary">Enviar atividade</button>
          </div>
        </div>

      </form>
      </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>