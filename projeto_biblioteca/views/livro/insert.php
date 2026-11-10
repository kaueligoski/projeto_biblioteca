
<?php

require "../../autoload.php";

$livro = new Livro();

// Receber dados do formulário
$livro->setTitulo($_POST['titulo']);
$livro->setIsbn($_POST['isbn']);

// Buscar autor
$daoAutor = new AutorDAO();
$autor = $daoAutor->find($_POST['id_autor']);

// Buscar editora
$daoEditora = new EditoraDAO();
$editora = $daoEditora->find($_POST['id_editora']);

// Buscar categoria
$daoCategoria = new CategoriaDAO();
$categoria = $daoCategoria->find($_POST['id_categoria']);

// Verificar relacionamentos
if (!$autor || !$editora || !$categoria) {
   if (!$autor) {
    die("Autor não encontrado. ID: " . $_POST['id_autor']);
}

if (!$editora) {
    die("Editora não encontrada. ID: " . $_POST['id_editora']);
}

if (!$categoria) {
    die("Categoria não encontrada. ID: " . $_POST['id_categoria']);
}
}

// Associar objetos
$livro->setAutor($autor);
$livro->setEditora($editora);
$livro->setCategoria($categoria);

// Cadastrar livro
$dao = new LivroDAO();
$dao->create($livro);

header('Location: index.php');
exit;

?>
