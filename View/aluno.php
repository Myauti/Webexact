<?php
session_start();
include "../Controller/conexao.php";
$id = $_SESSION['id_user'];
$disciplinas = $_SESSION['disciplinasAluno'];
$atividade = $_SESSION['disc'];
$sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
$result = $conec->query($sql);
$consulta = $result->fetch_object();

$atividades = "SELECT u.id_usuario as id_user, u.nome AS nome_aluno, d.nome AS disciplina_nome, d.id_disciplinas, al.matricula, a.* FROM atividades AS a 
INNER JOIN disciplinas AS d ON a.disciplina_atividade = d.id_disciplinas 
INNER JOIN aluno_disciplina AS ad ON d.id_disciplinas = ad.aluno_disciplina_vinculada 
INNER JOIN alunos AS al ON ad.aluno_vinculado = al.id_aluno
INNER JOIN usuarios AS u ON u.id_usuario = al.usuario_aluno
WHERE ad.aluno_disciplina_vinculada = $atividade AND u.id_usuario = $id";
$rs = $conec->query($atividades);


  $resolucoes = "SELECT atividades.disciplina_atividade, resolucoes.atividade_resolvida, resolucoes.id_aluno_resolucao, MAX(resolucoes.qtd_tentativa) as qtd_tentativa FROM resolucoes 
  INNER JOIN atividades ON resolucoes.atividade_resolvida = atividades.id_atividades
  WHERE id_aluno_resolucao = $id AND disciplina_atividade = $atividade";
  $return = $conec->query($resolucoes);
  $ret = $return->fetch_object();


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
          <a class="nav-link" href="cadastrogeral.html">Atividades</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="login.php">Turma</a>
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
  <!--MENU DE NAVEGAÇÃO DA PÁGINA-->

  <!--CONTEÚDO DA PÁGINA-->
  <div class="container">
    <h1>Olá, <?php echo $consulta->nome . "!" ?></h1>
    <div class="col d-flex flex-column pt-4 rounded">
      <?php while ($obj = $rs->fetch_object()) { ?>
        <button class="mb-4 rounded" onclick="conteudo(<?php echo $obj->id_atividades; ?>)"><?php echo $obj->nome . " " . "->" . " " . $obj->descricao ?></button>
        <div id="conteudo-<?php echo $obj->id_atividades; ?>" class="conteudo-oculto">
          <p class="text-center">
          <div class="container texto-grande">
            <p>
            <h2>
              <div class="card card-signin my-5 colorido px-5 py-4">
                <p class="d-block"><?php echo "Nome" . " " . " : " . $obj->nome ?></p>
                <p class="d-block"><?php echo "Descrição" . " " . " : " . $obj->descricao ?></p>
                <p class="d-block"><?php echo "Início da atividade" . " " . " : " . $obj->data_inicio ?></p>
                <p class="d-block"><?php echo "Fim da atividade" . " " . " : " . $obj->data_fim ?></p>
                <a href="../upload/<?php echo $obj->arquivo ?>" target="_blank"> <?php echo $obj->nome ?></a>


                <form action="../Controller/resolucao.php" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input type="hidden" class="form-control" name="id_atividade" value="<?php echo $obj->id_atividades ?>">
                    </div>
                    <div class="form-group col-md-2">
                      <input type="hidden" class="form-control" name="id_aluno" value="<?php echo $id ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="resposta">Resposta</label>
                      <input type="text" class="form-control" name="resposta" placeholder="Insira a resposta">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Enviar</button>
                  <?php
                  if ($ret->qtd_tentativa >= 3) {
                    echo '<button class="btn btn-info">Clique aqui para obter a resolução passo a passo</button>';
                  }
                  ?>
                </form>

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

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>