<?php
session_start();
include "../Controller/seguranca.php";//Inclui a verificação de segurança
include "../Controller/conexao.php"; //arquivo de conexão
$id = $_SESSION['id_user']; //pega o id da sessão do usuário que está logado
$grupo_usuario = $_SESSION['grupo_usuario'];//pegando o grupo do usuário que está logado

$nivel_necessario = 3; // para acessar essa página é necessário que o grupo de usuário seja 3
  if(isset($_SESSION['loginErro'])){
        echo '<script>alert("Por favor, acesse essa página de maneira convencional!")</script>';
      }
  // Verifica se não há a variável da sessão que identifica o usuário
  if (!isset($_SESSION['id_user']) OR ($_SESSION['grupo_usuario'] < $nivel_necessario)) {
      // Destrói a sessão por segurança
      session_destroy();
      // Redireciona o visitante de volta pro login
      header("Location: ./login.php"); exit;
  }
$sql = "SELECT d.nome as nome_disciplina, u.nome, p.usuario_professor, pd.* FROM professor_disciplina AS pd 
  INNER JOIN professores AS p ON pd.professor_vinculado = p.id_professor
  INNER JOIN usuarios AS u ON u.id_usuario = p.usuario_professor
  INNER JOIN disciplinas as d ON pd.disciplina_vinculada = d.id_disciplinas
  WHERE p.usuario_professor = $id"; //Seleciona alguns campos de professor disciplina.
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
          <button onclick="window.location.href = 'professor.php?id=<?php echo $obj->disciplina_vinculada?>'" type="button" class="mb-4  mr-3 rounded btn btn-outline-primary btn-lg ml-xxl-3"><?php echo $obj->nome_disciplina ?></button>
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