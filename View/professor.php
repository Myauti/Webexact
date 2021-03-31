<?php
session_start();
include "../Controller/conexao.php";
$disciplinas = $_SESSION['disciplinas'];
$id = $_GET['id'];
//print_r($_SESSION['vetor_disciplinas']);
//echo array_search($id, $_SESSION['vetor_disciplinas']);
//die();
if(array_search($id, $_SESSION['vetor_disciplinas'])== ""){
  header("Location: disciplinas.php");
  exit();
}

$sql = "SELECT u.nome AS nome_professor, d.nome AS disciplina_nome, d.id_disciplinas, p.matricula, a.* FROM atividades AS a 
  INNER JOIN disciplinas AS d ON a.disciplina_atividade = d.id_disciplinas 
  INNER JOIN professor_disciplina AS pd ON d.id_disciplinas = pd.disciplina_vinculada 
  INNER JOIN professores AS p ON pd.professor_vinculado = p.id_professor 
  INNER JOIN usuarios AS u ON u.id_usuario = p.usuario_professor 
  WHERE pd.disciplina_vinculada = $id";

$result = $conec->query($sql);
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

        <li class="nav-item">
          <a class="nav-link" href="#">Atividades</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Turmas</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--MENU DE NAVEGAÇÃO DA PÁGINA-->

  <!--CONTEÚDO DA PÁGINA-->
  <div class="container">
    <div class="row m-3">
      <div class="col-5">
        <a href="adicionar.php" class="btn btn-primary">Adicionar atividade</a>
      </div>
      <div class="col-5">
        <a href="desempenho.php" class="btn btn-primary">Desempenho dos estudantes</a>
      </div>
      <div class="col-sm">
        <a href="#" class="btn btn-primary">Enviar Feedback</a>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="col d-flex flex-column pt-4 rounded">
      <?php while ($obj = $result->fetch_object()) { ?>
        <button class="mb-4 rounded" onclick="conteudo(<?php echo $obj->id_atividades; ?>)"><?php echo $obj->id_atividades . " " . "-" . " " . $obj->nome . " " . "->" . " " . $obj->descricao ?></button>
        <div id="conteudo-<?php echo $obj->id_atividades; ?>" class="conteudo-oculto">
          <p class="text-center">
          <div class="container text-center texto-grande">
            <p>
            <h2>
              <div class="card card-signin my-5 colorido">
                <p class="d-block"><?php echo "Nome" . " " . " : " . $obj->nome ?></p>
                <p class="d-block"><?php echo "Descrição" . " " . " : " . $obj->descricao?></p>
                <p class="d-block"><?php echo "Início da atividade" . " " . " : " . $obj->data_inicio?></p>
                <p class="d-block"><?php echo "Fim da atividade" . " " . " : " . $obj->data_fim?></p>
                <a href="../upload/<?php echo $obj->arquivo ?>" target="_blank"> <?php echo $obj->nome ?></a>
              </div>
            </h2>
            </p>
          </div>
          </p>
        </div>
      <?php } ?>
    </div>
  </div>
  <!--CONTEÚDO DA PÁGINA-->

  <script src="js/bootstrap.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

  <script>
    function conteudo(id) {
      if ($("#conteudo-" + id).css('display') == 'none') {
        //$("#conteudo-" + id).fadeIn();
        $("#conteudo-" + id).show();
      } else {
        $("#conteudo-" + id).hide()
        //$("#conteudo-" + id).fadeOut();
      }
    }
  </script>
</body>

</html>