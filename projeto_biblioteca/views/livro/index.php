
<?php
    // Incluir o arquivo para carregamento das classes
    require "../../autoload.php";

    // Instanciar o DAO e buscar os livros
    $dao = new LivroDAO();
    $livros = $dao->read();

    // Evitar erro caso a consulta não retorne uma lista
    if (!is_array($livros)) {
        $livros = [];
    }
?>

<!doctype html>
<html lang="pt-br" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciamento de Livros</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">

    <style>
        body {
            font-size: 14px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .titulo-pagina {
            margin-bottom: 20px;
        }

        .acoes {
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <!-- Cabeçalho -->
    <header class="navbar sticky-top bg-dark p-0 shadow" data-bs-theme="dark">

        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">
            Biblioteca
        </a>

        <button
            class="navbar-toggler d-md-none me-2"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu"
            aria-label="Abrir menu">

            <span class="navbar-toggler-icon"></span>
        </button>

    </header>

    <div class="container-fluid">

        <div class="row">

            <!-- Menu lateral -->
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">

                <div
                    class="offcanvas-md offcanvas-start bg-body-tertiary"
                    tabindex="-1"
                    id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">

                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">
                            Biblioteca
                        </h5>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu"
                            aria-label="Fechar">
                        </button>
                    </div>

                    <?php include "../menu/navbar.php"; ?>

                </div>

            </div>

            <!-- Conteúdo principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom titulo-pagina">

                    <h1 class="h2">Gerenciamento de Livros</h1>

                </div>

                <!-- Botão cadastrar -->
                <div class="mb-3">

                    <a href="create.php" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i>
                        Novo Livro
                    </a>

                </div>

                <!-- Tabela -->
                <div class="table-responsive">

                    <table class="table table-hover table-striped align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>ISBN</th>
                                <th>Editora</th>
                                <th>Autor</th>
                                <th>Categoria</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if (count($livros) > 0): ?>

                                <?php foreach ($livros as $livro): ?>

                                    <tr>

                                        <!-- ID -->
                                        <td>
                                            <?= htmlspecialchars((string) $livro->getId()) ?>
                                        </td>

                                        <!-- Título -->
                                        <td>
                                            <?= htmlspecialchars((string) $livro->getTitulo()) ?>
                                        </td>

                                        <!-- ISBN -->
                                        <td>
                                            <?= htmlspecialchars((string) $livro->getIsbn()) ?>
                                        </td>

                                        <!-- Editora -->
                                        <td>
                                            <?php
                                                $editora = $livro->getEditora();

                                                echo htmlspecialchars(
                                                    (string) ($editora ? $editora->getNome() : 'Não informada')
                                                );
                                            ?>
                                        </td>

                                        <!-- Autor -->
                                        <td>
                                            <?php
                                                $autor = $livro->getAutor();

                                                echo htmlspecialchars(
                                                    (string) ($autor ? $autor->getNome() : 'Não informado')
                                                );
                                            ?>
                                        </td>

                                        <!-- Categoria -->
                                        <td>
                                            <?php
                                                $categoria = $livro->getCategoria();

                                                echo htmlspecialchars(
                                                    (string) ($categoria ? $categoria->getNome() : 'Não informada')
                                                );
                                            ?>
                                        </td>

                                        <!-- Ações -->
                                        <td class="acoes">

                                            <a
                                                href="edit.php?id=<?= urlencode((string) $livro->getId()) ?>"
                                                class="btn btn-warning btn-sm"
                                                title="Editar">

                                                <i class="bi bi-pencil"></i>

                                            </a>

                                            <a
                                                href="destroy.php?id=<?= urlencode((string) $livro->getId()) ?>"
                                                class="btn btn-danger btn-sm"
                                                title="Excluir"
                                                onclick="return confirm('Tem certeza que deseja excluir este livro?');">

                                                <i class="bi bi-trash"></i>

                                            </a>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <i class="bi bi-book fs-3"></i>
                                        <p class="mb-0 mt-2">
                                            Nenhum livro cadastrado.
                                        </p>
                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </main>

        </div>

    </div>

    <!-- Scripts -->
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/dashboard.js"></script>

</body>
</html>
