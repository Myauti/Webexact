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
              <a class="nav-link" href="../index.html">Home<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Matérias
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Matemática</a>
                <a class="dropdown-item" href="#">Física</a>
                <a class="dropdown-item" href="#">Geometria</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <br>

      <div class="container">
        <h1>Cadastro de professor</h1>
      
        <form action="../Controller/cadastrarProfessor.php" method="POST" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" placeholder="Nome">
            </div>
          <div class="form-group col-md-2">
              <label for="cpf">CPF</label>
              <input type="text"  class="form-control" name="cpf" placeholder="Apenas números">
            </div>
            <div class="form-group col-md-6">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" name="senha" placeholder="Senha">
            </div>
          </div>
          <div class="form-group">
            <label for="unidade">Unidade</label>
            <select name="unidade" class="form-control">
            <option selected>Escolher...</option>
            <?php
                $sql = "SELECT * FROM unidades_ensino";
                $resultado = mysqli_query($conec, $sql);

                while($row_resultados = mysqli_fetch_assoc($resultado)){ ?>
                  <option value="<?php echo $row_resultados['id_unidade'];?>">
                    <?php
                      echo $row_resultados['nome']; 
                    ?>
                  </option> 
                  <?php 
                    }
                  ?>
            </select>
          </div>
          <div class="form-row">
          
            <div class="form-group col-md-6">
              <label for="email_pessoal">Email pessoal</label>
              <input type="email" class="form-control" name="email_pessoal" placeholder="Email Pessoal">
            </div>

            <div class="form-group col-md-6">
              <label for="email_profissional">Email profissional</label>
              <input type="email" class="form-control" name="email_profissional" placeholder="Email Profissional">
            </div>  

          </div>

          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="telefone_pessoal">Telefone pessoal</label>
              <input type="number" class="form-control" name="telefone_pessoal" placeholder="(xx)123456789" class="form-control">
            </div>

            <div class="form-group col-md-6">
              <label for="telefone_profissional">Telefone de trabalho</label>
              <input type="number" class="form-control" name="telefone_profissional" placeholder="(xx)123456789" class="form-control">
            </div>
          
          </div>



          <div class="form-row">
          <div class="form-group col-md-6">
            <label>Matrícula</label>
            <input type="text" class="form-control" name="matricula" placeholder="Matricula">
          </div>

            <div class="form-group col-md-6">
              <label for="dataNasc">Data de nascimento</label>
              <input type="date" class="form-control" name="dataNasc" placeholder="DD/MM/YYYY">
            </div>


            <div class="form-group col-md-4">
              <label for="sexo">Sexo</label>
              <select name="sexo" class="form-control">
                <option selected>Escolher...</option>
                <?php
                $sql = "SELECT * FROM sexos";
                $resultado = mysqli_query($conec, $sql);

                while($row_resultados = mysqli_fetch_assoc($resultado)){ ?>
                  <option value="<?php echo $row_resultados['id_sexo'];?>">
                    <?php
                      echo $row_resultados['nome']; 
                    ?>
                  </option> 
                  <?php 
                    }
                  ?>
              </select>
            </div>

            <div class="form-group col-md-2">
            <label for="escolaridade">Escolaridade</label>
            <select name="escolaridade" class="form-control">
              <option selected>Escolher...</option>
              <?php
                $sql = "SELECT * FROM escolaridades";
                $resultado = mysqli_query($conec, $sql);

                while($row_resultados = mysqli_fetch_assoc($resultado)){ ?>
                  <option value="<?php echo $row_resultados['id_escolaridade'];?>">
                    <?php
                      echo $row_resultados['escolaridade']; 
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
                <label for="comprovante">Comprovante</label>
                <input type="file" name="comprovante" class="form-control-file mb-2">
                <button type="submit" name="submit" class="btn btn-primary">Enviar solicitação de cadastro</button>
              </div>
          </div>
        </form>
      </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>
</html>
