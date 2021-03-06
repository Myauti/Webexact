<?php
session_start();
include "../Controller/conexao.php";
include "../Controller/seguranca.php";
$id = $_SESSION['id_user'];
$sql = "SELECT d.nome as nome_disciplina, u.nome, a.usuario_aluno, ad.* FROM aluno_disciplina AS ad 
INNER JOIN alunos AS a ON ad.aluno_vinculado = a.id_aluno 
INNER JOIN usuarios AS u ON u.id_usuario = a.usuario_aluno 
INNER JOIN disciplinas as d ON ad.aluno_disciplina_vinculada = d.id_disciplinas 
WHERE a.usuario_aluno = $id";
$rs = $conec->query($sql);
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Webexact</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

  <!--MENU DE NAVEGAÇÃO DA PÁGINA-->
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
    <form action="../Controller/logout.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-disabled my-2 my-sm-0"><b>Logout</b><i class="fas fa-sign-out-alt ml-2"></i></button>
    </form>
  </nav>
  <!--MENU DE NAVEGAÇÃO DA PÁGINA-->

  <!--CONTEÚDO DA PÁGINA-->
  <div class="container">
    <h1>Selecione a disciplina desejada:</h1>
    <div class="h-75 container d-flex justify-content-around  mt-5">
      <div class="d-flex p-2">
        <?php while ($obj = $rs->fetch_object()) { ?>
          <button onclick="window.location.href = '../Controller/manage.php?id=<?php echo $obj->aluno_disciplina_vinculada ?>'" type="button" class="mb-4 mr-4 rounded btn btn-outline-primary btn-lg ml-xxl-3"><?php echo $obj->nome_disciplina ?></button>
        <?php } ?>
      </div>
    </div>
  </div>
  <!--CONTEÚDO DA PÁGINA-->


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>