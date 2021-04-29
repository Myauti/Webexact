<?php
include_once("../Controller/conexao.php");
include "../Controller/seguranca.php";
$id = $_GET['id'];

$atividade = "SELECT * from atividades WHERE id_atividades = $id";
$a = $conec->query($atividade);

$tentativas = "SELECT COUNT(atividade_resolvida) FROM resolucoes WHERE atividade_resolvida = $id";

$query = $conec->query($tentativas);
$vetor = $query->fetch_array(MYSQLI_NUM);
$string = implode(",", $vetor);

$sql = "SELECT COUNT(exito) FROM resolucoes WHERE atividade_resolvida = $id AND exito = 0";
$exitoN = $conec->query($sql);
$infoN = $exitoN->fetch_array(MYSQLI_NUM);
$stringN = implode(",", $infoN);

$consulta = "SELECT COUNT(exito) FROM resolucoes WHERE atividade_resolvida = $id AND exito = 1";
$exitoS = $conec->query($consulta);
$infoS = $exitoS->fetch_array(MYSQLI_NUM);
$stringS = implode(",", $infoS);

$stringMontada = "[" . $string . "," . $stringN . "," . $stringS . "]";
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
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
  <div class="container-md d-flex flex-column align-items-center">
    <?php $objeto = $a->fetch_object();
      echo "<h1>Desempenho da atividade: " . $objeto->nome . "</h1>";
    ?> 
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <div class="card mt-5" style="width: 40rem; background-color:#deffff; border-color: #deffff;">
      <canvas id="chartCircular"></canvas>
      <script>
        var ctx = document.getElementById('chartCircular').getContext('2d');
        var myChart = new Chart(document.getElementById("chartCircular"), {
          "type": "doughnut",
          "data": {
            "labels": ["Quantidade de tentativas", "Quantidade de acertos", "Quantidade de erros"],
            "datasets": [{
              "label": "Informações do estudante",
              "data": <?php echo $stringMontada ?>,
              "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
            }]
          }
        });
      </script>
    </div>


  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>