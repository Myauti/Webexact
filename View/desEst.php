<?php
include_once("../Controller/conexao.php");
include "../Controller/seguranca.php";
$id = $_GET['id'];
$id_usuario = $_SESSION['id_user'];
$grupo_usuario = $_SESSION['grupo_usuario'];

if (!isset($id)) {
    $_SESSION['loginErro'] = "<p>Por favor, acesse essa página pelo modo convencional!</p>";
    header('Location: ./disciplinas.php');
}

$nivel_necessario = 3;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['id_user']) or ($_SESSION['grupo_usuario'] < $nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: ./login.php");
    exit;
}
$sql = "SELECT usuarios.nome, alunos.id_aluno, alunos.usuario_aluno, aluno_disciplina.* FROM aluno_disciplina 
INNER JOIN disciplinas ON aluno_disciplina.aluno_disciplina_vinculada = disciplinas.id_disciplinas
INNER JOIN alunos ON aluno_disciplina.aluno_vinculado = alunos.id_aluno
INNER JOIN usuarios ON alunos.usuario_aluno = usuarios.id_usuario
WHERE aluno_disciplina_vinculada = $id";

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
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
                    <a class="btn btn-disabled" href="./professor.php?id=<?php echo $id_usuario ?>"><i class="fas fa-arrow-circle-left mr-2"></i>Voltar</a>
                </li>
            </ul>
        </div>
        <form action="../Controller/logout.php" class="form-inline my-2 my-lg-0">
            <button class="btn btn-disabled my-2 my-sm-0"><b>Logout</b><i class="fas fa-sign-out-alt ml-2"></i></button>
        </form>
    </nav>

    <br>
    <div class="container-md d-flex flex-column align-items-center">
        <h1>Desempenho dos estudantes em relação as atividades</h1>
        <div id="content" class="p-4 p-md-5 pt-5">
            <table class="table table-info rounded">
                <thead class="thead-info">
                    <tr>
                        <th scope="col">Nome do aluno</th>
                        <th scope="col">Dados</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($obj = $rs->fetch_object()) { ?>
                        <tr>
                            <th scope="row"><?php echo $obj->nome; ?></th>
                            <th scope="row"><a href="./desempenho.php?id=<?php echo $obj->usuario_aluno ?>" class="btn btn-info">Desempenho</a></th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>