<?php
    require "../../autoload.php";

    $editora = new Editora();

    $editora->setNome($_POST['nome']);
    $editora->setCidade($_POST['cidade']);
    $editora->setId($_POST['id']);

    $dao = new EditoraDAO();

    $dao->update($editora);

    header('location: index.php');

