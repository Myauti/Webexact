<?php 
    include "../Controller/conexao.php";
   
    
?>
<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Crud/css/style.css">
    <title>Webexact - ADM</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>
    <div class="container">
        <h3>Vincular Aluno</h3>
        <?php if(isset($_GET['erro'])) { ?>
        <div class="alert alert-danger" role="alert">
            Ocorreu um erro, tente novamente!
        </div>
        <?php } ?>
       <form method="POST" action="../Controller/vincularAluno.php">

        <div class="form-group">
            <div class="form-group">
            <select name="estudante" class="form-control">
              <option selected>Escolher...</option>
              
                <?php
                $sql = "SELECT alunos.id_aluno, usuarios.nome 
                from alunos
                inner join usuarios on alunos.usuario_aluno = usuarios.id_usuario";
                $resultado = mysqli_query($conec, $sql);

                while($row_resultados = mysqli_fetch_assoc($resultado)){ ?>
                    <option value="<?php echo $row_resultados['id_aluno'];?>">
                        <?php
                         echo $row_resultados['nome']; 
                        ?>
                    </option> 
                  <?php 
                    }
                  ?>
            </select>
              
        </div>
            <div class="form-group">
                <select name="disciplina" class="form-control">
              <option selected>Escolher...</option>
              
              <?php
                $sql = "SELECT * FROM disciplinas";
                $resultado = mysqli_query($conec, $sql);

                while($row_resultados = mysqli_fetch_assoc($resultado)){ ?>
                  <option value="<?php echo $row_resultados['id_disciplinas'];?>">
                    <?php
                      echo $row_resultados['nome']; 
                    ?>
                  </option> 
                  <?php 
                    }
                  ?>
            </select>
            </div>
     </div> 

        <button class="btn btn-success" type="submit"> Vincular </button>
        <a href="./Crud/crudDiscAlu.php" class="btn btn-primary">Voltar</a>
        
     </form>

    </div>

</body>

</html>