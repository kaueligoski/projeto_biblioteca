<?php
    //Incluir o arquivo de autoload
    require "../../autoload.php";

    //Instanciar um objeto da classe (bean)
    $autor = New Autor ();

    //Definir os valores dos atributos a partir do formulário
    $autor->setNome($_POST['nome']);
    $autor->setNacionalidade($_POST['nacionalidade']);
      
    $dao = new AutorDAO();
    $dao->create($autor);

    header('location: index.php');