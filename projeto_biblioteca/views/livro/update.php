
<?php

require "../../autoload.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Receber os dados do formulário
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $titulo = trim($_POST['titulo'] ?? '');
    $isbn = trim($_POST['isbn'] ?? '');

    $id_editora = filter_input(INPUT_POST, 'id_editora', FILTER_VALIDATE_INT);
    $id_autor = filter_input(INPUT_POST, 'id_autor', FILTER_VALIDATE_INT);
    $id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_VALIDATE_INT);

    if (!$id || !$titulo || !$isbn ||
        !$id_editora || !$id_autor || !$id_categoria) {
        die("Preencha todos os campos corretamente.");
    }

    // Criar objeto Livro
    $livro = new Livro();

    $livro->setId($id);
    $livro->setTitulo($titulo);
    $livro->setIsbn($isbn);

    // Buscar editora
    $daoEditora = new EditoraDAO();
    $editora = $daoEditora->find($id_editora);

    // Buscar autor
    $daoAutor = new AutorDAO();
    $autor = $daoAutor->find($id_autor);

    // Buscar categoria
    $daoCategoria = new CategoriaDAO();
    $categoria = $daoCategoria->find($id_categoria);

    if (!$editora || !$autor || !$categoria) {
        die("Editora, autor ou categoria não encontrados.");
    }

    $livro->setEditora($editora);
    $livro->setAutor($autor);
    $livro->setCategoria($categoria);

    // Atualizar no banco
    $dao = new LivroDAO();
    $dao->update($livro);

    // Voltar para a listagem
    header("Location: index.php");
    exit;
}

header("Location: index.php");
exit;

?>
