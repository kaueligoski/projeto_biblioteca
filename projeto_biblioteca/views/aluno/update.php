<?php
    require "../../autoload.php";

    $aluno = new Aluno();

    $aluno->setNome($_POST['nome']);
    $aluno->setEmail($_POST['email']);
    $aluno->setMatricula($_POST['matricula']);
    $aluno->setId($_POST['id']);

    $dao = new AlunoDAO();

    $dao->update($aluno);

    header('location: index.php');

