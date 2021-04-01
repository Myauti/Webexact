<?php
session_start();

include_once("conexao.php");
$sql = "SELECT * FROM usuarios";
$results = $conec->query($sql);

if ((isset($_POST["lCpf"])) && (isset($_POST["lSenha"]))) {
    $usuario = mysqli_real_escape_string($conec, $_POST['lCpf']);
    $senha = mysqli_real_escape_string($conec, $_POST['lSenha']);
    $senha = md5($senha); //criptografar senha em md5

    $sql = "SELECT * FROM usuarios WHERE cpf = '$usuario' && senha = '$senha' LIMIT 1";
    $result = mysqli_query($conec, $sql);
    $resultado = mysqli_fetch_assoc($result);
    $id_usuario = $resultado['id_usuario'];

    if (empty($resultado)) {
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: ../View/login.php");
    } elseif (isset($resultado)) {
        $_SESSION['usuarioId'] = $resultado['grupo_usuario'];

        if ($_SESSION['usuarioId'] == "3") {
            header("Location: ../View/disciplinas.php");
        } elseif ($_SESSION['usuarioId'] == "2") {
            header("Location: ../View/disciplinas_aluno.php");
        } elseif ($_SESSION['usuarioId'] == "1") {
            header("Location: ../View/adm.php");
        }
    } else {
        $_SESSION['loginErro'] = "Usuario ou senha invalida";
        header("Location: ../View/login.php");
    }

    $consulta = "SELECT pd.disciplina_vinculada FROM professor_disciplina as pd 
        INNER JOIN professores as p ON pd.professor_vinculado = p.id_professor 
        INNER JOIN usuarios as u ON p.usuario_professor = u.id_usuario 
        WHERE u.id_usuario = $id_usuario";

    $varConsulta = $conec->query($consulta);

    $datas = array();
    $p = 0;

    while ($obj = $varConsulta->fetch_object()) {
        $datas[$p] = $obj->disciplina_vinculada;
        $p++;
    }

    $consultaAluno = "SELECT ad.aluno_disciplina_vinculada FROM aluno_disciplina as ad 
        INNER JOIN alunos as a ON ad.aluno_vinculado = a.id_aluno
        INNER JOIN usuarios as u ON a.usuario_aluno = u.id_usuario 
        WHERE u.id_usuario = $id_usuario";

    $varConsultaAluno = $conec->query($consultaAluno);

    $info = array();
    $i = 0;

    while ($object = $varConsultaAluno->fetch_object()) {
        $info[$i] = $object->aluno_disciplina_vinculada;
        $i++;
    }

    $_SESSION['id_user'] = $resultado['id_usuario'];
    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    $_SESSION['disciplinasProf'] = implode(",", $datas);
    $_SESSION['disciplinasAluno'] = implode(",", $info);
    $_SESSION['vetor_disciplinas_prof'] = $datas;
    $_SESSION['vetor_disciplinas_aluno'] = $info;
    
    
} else {
    $_SESSION['loginErro'] = "Usuario ou senha invalida";
    header("Location: ../View/login.php");
}
