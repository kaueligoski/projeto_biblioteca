<?php
require "../../autoload.php";
$id = $_GET['id'];

$dao = new CategoriaDAO();

$dao->destroy($id);

header('location: index.php');

