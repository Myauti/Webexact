<?php
session_start();
include "../Controller/conexao.php";
include "../Controller/seguranca.php";

//resgatando variaveis de sessao
$disciplinas = $_SESSION['disciplinasProf'];
$id_usuario = $_SESSION['id_user'];
$grupo_usuario = $_SESSION['grupo_usuario'];

$nivel_necessario = 3;

  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['id_user']) OR ($_SESSION['grupo_usuario'] < $nivel_necessario)) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: ./login.php"); exit;
  }

$id = $_GET['id'];//Recebe o id por get na url

$_SESSION['disciplinas'] = $id;
if (array_search($id, $_SESSION['vetor_disciplinas_prof']) == "") {
  header("Location: disciplinas.php");
  exit();
}

$sql = "SELECT u.nome AS nome_professor, d.nome AS disciplina_nome, d.id_disciplinas, p.matricula, a.* FROM atividades AS a 
  INNER JOIN disciplinas AS d ON a.disciplina_atividade = d.id_disciplinas 
  INNER JOIN professor_disciplina AS pd ON d.id_disciplinas = pd.disciplina_vinculada 
  INNER JOIN professores AS p ON pd.professor_vinculado = p.id_professor 
  INNER JOIN usuarios AS u ON u.id_usuario = p.usuario_professor 
  WHERE pd.disciplina_vinculada = $id"; //Exibe todas as atividades para a disciplina que o professor está acessando.

$result = $conec->query($sql);//Realiza a consulta

$consulta = "SELECT u.nome as nome_usuario, aluno_disciplina.* FROM aluno_disciplina 
INNER JOIN alunos AS a ON aluno_disciplina.aluno_vinculado = a.id_aluno 
INNER JOIN usuarios as u ON u.id_usuario = a.usuario_aluno
WHERE aluno_disciplina_vinculada = $id"; //Essa consulta retorna os dados dos alunos que estão vinculados nessa disciplina selecionada

$consultaRes = $conec->query($consulta); //Realiza a consulta
//$variavel = $consultaRes->fetch_object();
//$nomes = $variavel->nome_usuario;
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Webexact</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
          <a class="btn btn-disabled" href="./disciplinas.php"><i class="fas fa-arrow-circle-left mr-2"></i>Voltar</a>
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
    <div class="row m-3">
      <div class="col-5">
        <!--tag a com estilo de botao-->
        <!--Envia para adicionar.php-->
        <a href="adicionar.php" class="btn btn-muted"><b>Adicionar atividade</b></a> 
      </div>
      <div class="col-5">
        <!--Envia para a página de desempenho de estudante-->
        <a href="desEst.php?id=<?php echo $id ?>" class="btn btn-muted"><b>Desempenho</b></a><!--Envia para desEst-->
      </div>
    </div>
  </div>

  <div class="container">
    <div class="col d-flex flex-column pt-4 rounded">
      <?php while ($obj = $result->fetch_object()) { ?> <!--Enquanto receber dados da consulta-->
        <button class="mb-4 rounded btn btn-info" onclick="conteudo(<?php echo $obj->id_atividades; ?>)"><?php echo $obj->id_atividades . " " . "-" . " " . $obj->nome . " " . "->" . " " . $obj->descricao ?></button>
        <div id="conteudo-<?php echo $obj->id_atividades; ?>" class="conteudo-oculto"><!--Div recebe id dinamico-->
          <p class="text-center">
          <div class="container text-center texto-grande">
            <p>
            <h2>
              <div class="card card-info my-5">
                <p class="d-block"><?php echo "Nome" . " " . " : " . $obj->nome ?></p>
                <p class="d-block"><?php echo "Descrição" . " " . " : " . $obj->descricao ?></p>
                <p class="d-block"><?php echo "Início da atividade" . " " . " : " . $obj->data_inicio ?></p>
                <p class="d-block"><?php echo "Fim da atividade" . " " . " : " . $obj->data_fim ?></p>
                <a href="../upload/<?php echo $obj->arquivo ?>" target="_blank"> <?php echo $obj->nome ?></a>
                <a href="desAtv.php?id=<?php echo $obj->id_atividades ?>" class="btn btn-info m-4">Desempenho da atividade</a>
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

  <!--<script src="js/bootstrap.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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