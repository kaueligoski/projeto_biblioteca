<?php
require "../../autoload.php";
$id = $_GET['id'];

$dao = new AlunoDAO();

$dao->destroy($id);

header('location: index.php');

