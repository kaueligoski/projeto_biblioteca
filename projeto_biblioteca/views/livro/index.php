
<?php
    // Incluir o arquivo para carregamento das classes
    require "../../autoload.php";

    // Instanciar o DAO
    $dao = new LivroDAO();
?>

<!doctype html>
<html lang="pt-br" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gerenciamento de Livros</title>

    <script src="../../js/color-modes.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">

</head>

<body>

    <!-- Cabeçalho -->
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow"
        data-bs-theme="dark">

        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white"
            href="#">
            Biblioteca
        </a>

        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button
                    class="nav-link px-3 text-white"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu"
                    aria-label="Abrir menu">

                    <i class="bi bi-list"></i>

                </button>
            </li>
        </ul>

    </header>

    <div class="container-fluid">

        <div class="row">

            <!-- Menu lateral -->
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">

                <div
                    class="offcanvas-md offcanvas-end bg-body-tertiary"
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

                <!-- Título -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <h1 class="h2">Gerenciamento de Livros</h1>

                </div>

                <!-- Botão cadastrar -->
                <p>
                    <a href="create.php">Novo Livro</a>
                </p>

                <!-- Tabela -->
                <div class="table-responsive small">

                    <table class="table table-hover">

                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>ISBN</th>
                            <th>Editora</th>
                            <th>Autor</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>

                        <?php foreach ($dao->read() as $livro): ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars((string) $livro->getId()) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars((string) $livro->getTitulo()) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars((string) $livro->getIsbn()) ?>
                                </td>

                                <td>
                                    <?php
                                        $editora = $livro->getEditora();
                                        echo htmlspecialchars(
                                            (string) ($editora ? $editora->getNome() : 'Não informada')
                                        );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                        $autor = $livro->getAutor();
                                        echo htmlspecialchars(
                                            (string) ($autor ? $autor->getNome() : 'Não informado')
                                        );
                                    ?>
                                </td>

                                <td>
                                    <?php
                                        $categoria = $livro->getCategoria();
                                        echo htmlspecialchars(
                                            (string) ($categoria ? $categoria->getNome() : 'Não informada')
                                        );
                                    ?>
                                </td>

                                <td>

                                    <!-- Editar -->
                                    <a title="Editar"
                                        href="edit.php?id=<?= urlencode((string) $livro->getId()) ?>">

                                        <i class="bi bi-pencil"></i>

                                    </a>

                                    <!-- Excluir -->
                                    <a class="link-danger"
                                        title="Excluir"
                                        href="destroy.php?id=<?= urlencode((string) $livro->getId()) ?>"
                                        onclick="return confirm('Tem certeza que deseja excluir este livro?');">

                                        <i class="bi bi-trash"></i>

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

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
