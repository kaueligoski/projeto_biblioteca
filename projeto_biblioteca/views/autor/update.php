<?php
    require "../../autoload.php";

    $autor = new Autor();

    $autor->setNome($_POST['nome']);
    $autor->setNacionalidade($_POST['nacionalidade']);
    $autor->setId($_POST['id']);

    $dao = new AutorDAO();

    $dao->update($autor);

    header('location: index.php');

