<?php
require "../../autoload.php";
$id = $_GET['id'];

$dao = new AutorDAO();

$dao->destroy($id);

header('location: index.php');

