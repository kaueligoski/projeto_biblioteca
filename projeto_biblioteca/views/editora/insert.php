<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe (bean)
    $editora = New Editora ();

    //Definir os valores dos atributos a partir do formulário
    $editora->setNome($_POST['nome']);
    $editora->setCidade($_POST['cidade']);
      
    $dao = new EditoraDAO();
    $dao->create($editora);

    header('location: index.php');