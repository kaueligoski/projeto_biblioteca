<?php
require "../../autoload.php";
$id = $_GET['id'];

$dao = new EditoraDAO();

$dao->destroy($id);

header('location: index.php');

