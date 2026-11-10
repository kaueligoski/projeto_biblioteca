
<?php
require "../../autoload.php";

// Receber o ID pela URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("ID do livro inválido.");
}

// Buscar o livro
$dao = new LivroDAO();
$livro = $dao->find($id);

if (!$livro) {
    die("Livro não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Atualizar Livro</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .formulario {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-top: 20px;
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>

<header class="navbar sticky-top bg-dark p-0 shadow"
        data-bs-theme="dark">

    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white"
       href="#">
        Sistema de Cadastro
    </a>

</header>

<div class="container-fluid">
    <div class="row">

        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
            <?php include "../menu/navbar.php"; ?>
        </div>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">

                <h1 class="h2">Atualizar Livro</h1>

                <a href="index.php" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>

            </div>

            <p class="text-muted">
                Atualize as informações do livro.
            </p>

            <div class="formulario">

                <form action="update.php" method="POST">

                    <input type="hidden" name="id"
                           value="<?= htmlspecialchars((string) $livro->getId()) ?>">

                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título do livro</label>
                        <input type="text" class="form-control"
                               id="titulo" name="titulo"
                               value="<?= htmlspecialchars((string) $livro->getTitulo()) ?>"
                               maxlength="45" required>
                    </div>

                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control"
                               id="isbn" name="isbn"
                               value="<?= htmlspecialchars((string) $livro->getIsbn()) ?>"
                               maxlength="45" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_editora" class="form-label">ID da Editora</label>
                        <input type="number" class="form-control"
                               id="id_editora" name="id_editora"
                               value="<?= htmlspecialchars((string) $livro->getEditora()->getId()) ?>"
                               min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_categoria" class="form-label">ID da Categoria</label>
                        <input type="number" class="form-control"
                               id="id_categoria" name="id_categoria"
                               value="<?= htmlspecialchars((string) $livro->getCategoria()->getId()) ?>"
                               min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_autor" class="form-label">ID do Autor</label>
                        <input type="number" class="form-control"
                               id="id_autor" name="id_autor"
                               value="<?= htmlspecialchars((string) $livro->getAutor()->getId()) ?>"
                               min="1" required>
                    </div>

                    <div class="d-flex gap-2">

                        <a href="index.php" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Atualizar Livro
                        </button>

                    </div>

                </form>

            </div>

        </main>

    </div>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/dashboard.js"></script>

</body>
</html>
