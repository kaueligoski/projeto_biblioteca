<?php
    require "../../autoload.php";

    $categoria = new Categoria();

    $categoria->setNome($_POST['nome']);
    $categoria->setDescricao($_POST['descricao']);
    $categoria->setId($_POST['id']);

    $dao = new CategoriaDAO();

    $dao->update($categoria);

    header('location: index.php');

