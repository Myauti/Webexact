<?php 
    session_start();
    $disciplina = $_GET['id'];
    $_SESSION['disc'] = $disciplina;
    header("Location:../View/aluno.php");




