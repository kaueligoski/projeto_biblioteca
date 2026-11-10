<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe (bean)
    $aluno = New Aluno ();

    //Definir os valores dos atributos a partir do formulário
    $aluno->setNome($_POST['nome']);
    $aluno->setEmail($_POST['email']);
    $aluno->setMatricula($_POST['matricula']);
      
    $dao = new AlunoDAO();
    $dao->create($aluno);

    header('location: index.php');