<?php
session_start();
include "../Controller/conexao.php";
include "../Controller/seguranca.php";
$id_usuario = $_SESSION['id_user'];

$ex = $_GET['ex'];
$atv = $_GET['atv'];
$qt = $_GET['qt'];
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Abaixo import do bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Webexact</title>
    <!--Titulo-->
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <!--Import da nossa propria estilização-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--Import do font awesome para utilização de icones-->
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
                    <a class="btn btn-disabled" href=<?php echo "./aluno.php?ex=$ex&atvreso=$atv&qt=$qt" ?>><i class="fas fa-arrow-circle-left mr-2"></i>Voltar</a>
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
        <h1>Resolução passo a passo: </h1>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td id="antes"></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td id="mudanca"></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td id="depois"></td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td id="qtPassos"></td>
                </tr>
            </tbody>
            <button class="btn btn-primary" onclick="getContent()">Exibir resolução</button>
        </table>


        <script>

            function show(dados) {
                let antes = `<h4>antes:</h4><p>${dados[0]}</p>`;
                let mudanca = `<h4>mudança:</h4><p>${dados[1]}</p>`;
                let depois = `<h4>depois:</h4><p>${dados[2]}</li>`;
                let qtPassos = `<h4>quantidade de passos:</p><li>${dados[3]}</p>`;

                document.getElementById("antes").innerHTML = antes;
                document.getElementById("mudanca").innerHTML = mudanca;
                document.getElementById("depois").innerHTML = depois;
                document.getElementById("qtPassos").innerHTML = qtPassos;
            }

            async function getContent() {
                try {
                    const response = await fetch("http://localhost:3000/");

                    const info = await response.json(); //aguardar transformar em objeto
                    console.log(info); //printar no F12(navegador) a resposta

                    show(info) //Executa a função chamada "show"

                } catch (error) {
                    console.log(error);
                }
            }
        </script>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>