<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe (bean)
    $categoria = New Categoria ();

    //Definir os valores dos atributos a partir do formulário
    $categoria->setNome($_POST['nome']);
    $categoria->setDescricao($_POST['descricao']);
      
    $dao = new CategoriaDAO();
    $dao->create($categoria);

    header('location: index.php');