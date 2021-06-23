<?php
    session_start();
    include "../Controller/seguranca.php";
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./Crud/css/style.css">
    <title>Webexact</title>
    <link rel="stylesheet" type="text/css" href="./estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <!--MENU DE NAVEGAÇÃO DA PÁGINA-->
    <!--MENU DE NAVEGAÇÃO DA PÁGINA-->

    <!--CONTEÚDO DA PÁGINA-->
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <h1><a href="adm.php" class="logo">Tabelas</a></h1>
            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="./Crud/crudAluno.php"><span class="fa fa-group  mr-3"></span> Alunos</a>
                </li>
                <li>
                    <a href="./Crud/crudUsuarios.php"><span class="fa fa-group mr-3"></span> Usuários</a>
                </li>
                <li>
                    <a href="./Crud/crudProf.php"><span class="fa fa-group mr-3"></span> Professores</a>
                </li>
                <li>
                    <a href="./Crud/crudDisc.php"><span class="fa fa-folder-open mr-3"></span> Disciplinas</a>
                </li>
                <li>
                    <a href="./Crud/crudSex.php"><span class="fa fa-book mr-3"></span> Sexos</a>
                </li>
                <li>
                    <a href="./Crud/crudAtiv.php"><span class="fa fa-book mr-3"></span> Atividades</a>
                </li>
                <li>
                    <a href="./Crud/crudCat.php"><span class="fa fa-book mr-3"></span> Categoria de atividades</a>
                </li>
                <li>
                    <a href="./Crud/crudCurs.php"><span class="fa fa-book mr-3"></span> Cursos</a>
                </li>
                <li>
                    <a href="./Crud/crudEsc.php"><span class="fa fa-book mr-3"></span> Escolaridades</a>
                </li>
                <li>
                    <a href="./Crud/crudVinc.php"><span class="fa fa-book mr-3"></span> Vinculo professor-disciplina</a>
                </li>
                <li>
                    <a href="./Crud/crudMatr.php"><span class="fa fa-book mr-3"></span> Situaçoes da matrícula</a>
                </li>
                <li>
                    <a href="./Crud/crudTC.php"><span class="fa fa-book mr-3"></span> Turno dos cursos</a>
                </li>
                <li>
                    <a href="./Crud/crudUF.php"><span class="fa fa-book mr-3"></span> Unidades Federativas</a>
                </li>
                <li>
                    <a href="./Crud/crudUnid.php"><span class="fa fa-book mr-3"></span> Unidades de ensino</a>
                </li>
                <li>
                    <a href="./Crud/crudRes.php"><span class="fa fa-book mr-3"></span> Resoluções</a>
                </li>
                <li>
                    <a href="./Crud/crudDiscAlu.php"><span class="fa fa-book mr-3"></span> Vinculo aluno-disciplina</a>
                </li>

            </ul>
            <form action="../Controller/logout.php" class="form-inline my-2 my-lg-0">
      <button class="btn btn-disabled my-2 my-sm-0"><b>Logout</b><i class="fas fa-sign-out-alt ml-2"></i></button>
    </form>
        </nav>
        <div id="content" class="p-4 p-md-5 pt-5">
            <h3 class="mb-4">Selecione uma tabela para editar</h3>
        </div>

    </div>

    <script src="./Crud/js/jquery.min.js"></script>
    <script src="./Crud/js/popper.js"></script>
    <script src="./Crud/js/bootstrap.min.js"></script>
    <script src="./Crud/js/main.js"></script>
</body>

</html>