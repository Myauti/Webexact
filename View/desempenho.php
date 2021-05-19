<?php
session_start();
$disciplina = $_SESSION['disciplinas'];
include_once("../Controller/conexao.php");
include "../Controller/seguranca.php";
$id = $_GET['id'];

$consulta = "SELECT * from usuarios where id_usuario = $id";
$result = $conec->query($consulta);

$sql = "SELECT atividades.nome, atividades.descricao, atividades.disciplina_atividade, resolucoes.atividade_resolvida, atividades.atividade_resposta,
resolucoes.id_aluno_resolucao, resolucoes.qtd_tentativa, resolucoes.resposta_tentativa, resolucoes.exito 
FROM resolucoes 
INNER JOIN atividades ON resolucoes.atividade_resolvida = atividades.id_atividades
WHERE id_aluno_resolucao = $id AND disciplina_atividade = $disciplina";
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

    <br>
    <div class="container-md d-flex flex-column align-items-center">
        <?php 
        $object = $result->fetch_object();
        echo "<h1>Informações de desempenho do aluno:" . " " . "<b>" . $object->nome . "</b>". "</h1>"?>
        <div id="content" class="p-4 p-md-5 pt-5">
            <table class="table table-info">
                <thead class="thead-info">
                    <tr>
                        <th scope="col">Nome da atividade</th>
                        <th scope="col">Descricao</th>
                        <th scope="col">Quantidade de tentativas</th>
                        <th scope="col">Resposta do aluno</th>
                        <th scope="col">Resposta da atividade</th>
                        <th scope="col">Exito</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($obj = $rs->fetch_object()) { 
                        if($obj->exito == false){
                            $exito = '<i class="fas fa-times-circle" style="color:red;"></i>';
                        }else{
                            $exito = '<i class="fas fa-check-circle" style="color:#00ba28;"></i>';
                        }
                        ?>
                        <tr>
                            <th scope="row"><?php echo $obj->nome; ?></th>
                            <th scope="row"><?php echo $obj->descricao; ?></th>
                            <th scope="row"><?php echo $obj->qtd_tentativa; ?></th>
                            <th scope="row"><?php echo $obj->resposta_tentativa; ?></th>
                            <th scope="row"><?php echo $obj->atividade_resposta; ?></th>
                            <th scope="row"><?php echo $exito; ?></th>
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