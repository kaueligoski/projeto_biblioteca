
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastrar Livro</title>

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">

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

            <!-- Menu lateral -->
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">

                <?php
                include "../menu/navbar.php";
                ?>

            </div>

            <!-- Conteúdo principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                    <h1 class="h2">Cadastrar Livro</h1>

                    <a href="index.php" class="btn btn-secondary">
                        Voltar
                    </a>

                </div>

                <p class="text-muted">
                    Preencha os campos abaixo para cadastrar um novo livro.
                </p>

                <!-- Formulário -->
                <div class="formulario">

                    <form action="insert.php" method="POST">

                        <!-- Título -->
                        <div class="mb-3">

                            <label for="titulo" class="form-label">
                                Título do livro
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="titulo"
                                name="titulo"
                                placeholder="Digite o título do livro"
                                maxlength="45"
                                required
                            >

                        </div>

                        <!-- ISBN -->
                        <div class="mb-3">

                            <label for="isbn" class="form-label">
                                ISBN
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="isbn"
                                name="isbn"
                                placeholder="Digite o ISBN do livro"
                                maxlength="45"
                                required
                            >

                        </div>

                        <!-- Categoria -->
                        <div class="mb-3">

                            <label for="categoria" class="form-label">
                                Categoria
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="categoria"
                                name="categoria"
                                placeholder="Digite a categoria do livro"
                                maxlength="45"
                                required
                            >

                        </div>

                        <!-- ID da editora -->
                        <div class="mb-3">

                            <label for="id_editora" class="form-label">
                                ID da Editora
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="id_editora"
                                name="id_editora"
                                placeholder="Digite o ID da editora"
                                min="1"
                                required
                            >

                        </div>

                        <!-- ID da categoria -->
                        <div class="mb-3">

                            <label for="id_categoria" class="form-label">
                                ID da Categoria
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="id_categoria"
                                name="id_categoria"
                                placeholder="Digite o ID da categoria"
                                min="1"
                                required
                            >

                        </div>

                        <!-- ID do autor -->
                        <div class="mb-3">

                            <label for="id_autor" class="form-label">
                                ID do Autor
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="id_autor"
                                name="id_autor"
                                placeholder="Digite o ID do autor"
                                min="1"
                                required
                            >

                        </div>

                        <!-- Botões -->
                        <div class="d-flex gap-2">

                            <button type="reset" class="btn btn-secondary">
                                Limpar
                            </button>

                            <button type="submit" class="btn btn-success">
                                Cadastrar
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
