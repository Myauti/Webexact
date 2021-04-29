<?php 
    include "../../Controller/conexao.php";
    $sql = "select * from resolucoes";
    $rs = $conec->query($sql);
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Webexact</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
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
            <h1><a href="../adm.php" class="logo">Tabelas</a></h1>
            <ul class="list-unstyled components mb-5">
                <li>
                    <a href="crudAluno.php"><span class="fa fa-group  mr-3"></span> Alunos</a>
                </li>
                <li>
                    <a href="crudUsuarios.php"><span class="fa fa-group mr-3"></span> Usuários</a>
                </li>
                <li>
                    <a href="crudProf.php"><span class="fa fa-group mr-3"></span> Professores</a>
                </li>
                <li>
                    <a href="crudDisc.php"><span class="fa fa-folder-open-o mr-3"></span> Disciplinas</a>
                </li>
                <li>
                    <a href="crudSex.php"><span class="fa fa-book mr-3"></span> Sexos</a>
                </li>
                <li>
                    <a href="crudAtiv.php"><span class="fa fa-book mr-3"></span> Atividades</a>
                </li>
                <li>
                    <a href="crudCat.php"><span class="fa fa-book mr-3"></span> Categoria de atividades</a>
                </li>
                <li>
                    <a href="crudCurs.php"><span class="fa fa-book mr-3"></span> Cursos</a>
                </li>
                <li>
                    <a href="crudEsc.php"><span class="fa fa-book mr-3"></span> Escolaridades</a>
                </li>
                <li>
                    <a href="crudVinc.php"><span class="fa fa-book mr-3"></span> Vinculo professor-disciplina</a>
                </li>
                <li>
                    <a href="crudMatr.php"><span class="fa fa-book mr-3"></span> Situaçoes da matrícula</a>
                </li>
                <li>
                    <a href="crudTC.php"><span class="fa fa-book mr-3"></span> Turno dos cursos</a>
                </li>
                <li>
                    <a href="crudUF.php"><span class="fa fa-book mr-3"></span> Unidades Federativas</a>
                </li>
                <li>
                    <a href="crudUnid.php"><span class="fa fa-book mr-3"></span> Unidades de ensino</a>
                </li>
                <li>
                    <a href="crudRes.php"><span class="fa fa-book mr-3"></span> Resoluções</a>
                </li>
                <li>
                    <a href="crudDiscAlu.php"><span class="fa fa-book mr-3"></span> Disciplina aluno</a>
                </li>

            </ul>

        </nav>
        <div id="content" class="p-4 p-md-5 pt-5">
            <table class="table">
                <thead class = "thead-dark">
                    <tr>
                        <th scope="col">id_resolucao</th>
                        <th scope="col">atividade_resolvida</th>
                        <th scope="col">id_aluno_resolucaoo</th>
                        <th scope="col">qtd_tentativao</th>
                        <th scope="col">resposta_tentativa</th>
                        <th scope="col">exito</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($obj = $rs->fetch_object()) { ?>
                        <tr>
                        <th scope="row"><?php echo $obj->id_resolucao; ?></th>
                        <th scope="row"><?php echo $obj->atividade_resolvida; ?></th>
                        <th scope="row"><?php echo $obj->id_aluno_resolucao; ?></th>
                        <th scope="row"><?php echo $obj->qtd_tentativa; ?></th>
                        <th scope="row"><?php echo $obj->resposta_tentativa; ?></th>
                        <th scope="row"><?php echo $obj->exito; ?></th>
                        <td>

                            <a href="./editCrud/editRes.php?id_resolucao=<?php echo $obj->id_resolucao; ?>" class="btn btn-sm btn-warning" > Editar </a>
                            <a href="#" onclick="excluir(<?php echo $obj->id_resolucao; ?>)" class="btn btn-sm btn-danger" > Excluir </a>
                       
                        </td>
                    
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

    <script>
        function excluir(id_resolucao){
            if (confirm("Deseja excluir essa resolucao?")) {
                window.location.href = "../../Controller/CrudDelete/delRes.php?id_resolucao=" + id_resolucao;
            }s
        }

    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>