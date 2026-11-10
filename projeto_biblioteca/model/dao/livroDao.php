
<?php

class LivroDAO {

    // CREATE - Cadastrar livro
    public function create($livro) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO livro
                (titulo, isbn, categoria, id_editora, id_autor, id_categoria)
                VALUES (:t, :i, :ca, :e, :a, :c)"
            );

            $query->bindValue(':t', $livro->getTitulo(), PDO::PARAM_STR);
            $query->bindValue(':i', $livro->getIsbn(), PDO::PARAM_STR);
            $query->bindValue(':ca', $livro->getCategoria()->getNome(), PDO::PARAM_STR);

            // Chaves estrangeiras
            $query->bindValue(':e', $livro->getEditora()->getId(), PDO::PARAM_INT);
            $query->bindValue(':a', $livro->getAutor()->getId(), PDO::PARAM_INT);
            $query->bindValue(':c', $livro->getCategoria()->getId(), PDO::PARAM_INT);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

        } catch (PDOException $e) {
            echo "Erro #1: " . $e->getMessage();
        }
    }


    // READ - Listar livros
    public function read() {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM livro"
            );

            $query->execute();

            $listaLivros = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {

                $livro = new Livro();

                $livro->setId($linha['id_livro']);
                $livro->setTitulo($linha['titulo']);
                $livro->setIsbn($linha['isbn']);
               

                // Buscar editora
                $daoEditora = new EditoraDAO();
                $editora = $daoEditora->find($linha['id_editora']);
                $livro->setEditora($editora);

                // Buscar autor
                $daoAutor = new AutorDAO();
                $autor = $daoAutor->find($linha['id_autor']);
                $livro->setAutor($autor);

                // Buscar categoria
                $daoCategoria = new CategoriaDAO();
                $categoria = $daoCategoria->find($linha['id_categoria']);
                $livro->setCategoria($categoria);

                array_push($listaLivros, $livro);
            }

            return $listaLivros;

        } catch (PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
    }


    // FIND - Buscar livro por ID
    public function find($id) {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM livro WHERE id_livro = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);
            $query->execute();

            if ($linha = $query->fetch(PDO::FETCH_ASSOC)) {
            
                $livro = new Livro();

                $livro->setId($linha['id_livro']);
                $livro->setTitulo($linha['titulo']);
                $livro->setIsbn($linha['isbn']);
                $livro->setCategoria($linha['categoria']);

                // Buscar editora
                $daoEditora = new EditoraDAO();
                $editora = $daoEditora->find($linha['id_editora']);
                $livro->setEditora($editora);

                // Buscar autor
                $daoAutor = new AutorDAO();
                $autor = $daoAutor->find($linha['id_autor']);
                $livro->setAutor($autor);

                // Buscar categoria
                $daoCategoria = new CategoriaDAO();
                $categoria = $daoCategoria->find($linha['id_categoria']);
                $livro->setCategoria($categoria);

                return $livro;
            }

            return null;

        } catch (PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
            return null;
        }
    }


    // UPDATE - Atualizar livro
    public function update($livro) {
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE livro
                SET titulo = :t,
                    isbn = :i,
                    categoria = :ca,
                    id_editora = :e,
                    id_autor = :a,
                    id_categoria = :c
                WHERE id_livro = :id"
            );

            $query->bindValue(':t', $livro->getTitulo(), PDO::PARAM_STR);
            $query->bindValue(':i', $livro->getIsbn(), PDO::PARAM_STR);
            $query->bindValue(':ca', $livro->getCategoria()->getNome(), PDO::PARAM_STR);

            $query->bindValue(':e', $livro->getEditora()->getId(), PDO::PARAM_INT);
            $query->bindValue(':a', $livro->getAutor()->getId(), PDO::PARAM_INT);
            $query->bindValue(':c', $livro->getCategoria()->getId(), PDO::PARAM_INT);

            $query->bindValue(':id', $livro->getId(), PDO::PARAM_INT);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

        } catch (PDOException $e) {
            echo "Erro #4: " . $e->getMessage();
        }
    }


    // DESTROY - Excluir livro
    public function destroy($id) {
        try {
            $query = BD::getConexao()->prepare(
                "DELETE FROM livro WHERE id_livro = :i"
            );

            $query->bindValue(':i', $id, PDO::PARAM_INT);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

        } catch (PDOException $e) {
            echo "Erro #5: " . $e->getMessage();
        }
    }
}
