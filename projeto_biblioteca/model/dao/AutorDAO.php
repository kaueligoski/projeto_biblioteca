<?php
    class AutorDAO {

        // CREATE - Cadastrar Autor
        public function create($autor) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO autor(nome, nacionalidade)
                    VALUES (:n, :na)"
                );

                $query->bindValue(':n', $autor->getNome(), PDO::PARAM_STR);
                $query->bindValue(':na', $autor->getNacionalidade(), PDO::PARAM_STR);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                }

            } 
            catch (PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        // READ - Listar Autores
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM autor");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaAutores = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $autor = new Autor(); // Classe bean
                    $autor->setId($linha['id_autor']);
                    $autor->setNome($linha['nome']);
                    $autor->setNacionalidade($linha['nacionalidade']);

                    array_push($listaAutores, $autor);
                }

                return $listaAutores;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
// FIND - Buscar autor por ID
public function find($id) {
    try {
        $query = BD::getConexao()->prepare(
            "SELECT * FROM autor WHERE id_autor = :i"
        );

        $query->bindValue(':i', $id, PDO::PARAM_INT);

        if (!$query->execute()) {
            print_r($query->errorInfo());
        }

        $linha = $query->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            $autor = new Autor();
            $autor->setId($linha['id_autor']);
            $autor->setNome($linha['nome']);
            $autor->setNacionalidade($linha['nacionalidade']);

            return $autor;
        }

        return null;

    } catch (PDOException $e) {
        echo "Erro #3: " . $e->getMessage();
        return null;
    }
}

        // UPDATE -
        public function update($autor) {                                
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE autor
                    SET nome = :n, nacionalidade = :na
                    WHERE id_autor = :i"
                );
                $query->bindValue(':n', $autor->getNome(), PDO::PARAM_STR);
                $query->bindValue(':na', $autor->getNacionalidade(), PDO::PARAM_STR);
                $query->bindValue(':i', $autor->getId(), PDO::PARAM_INT);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                }
            } 
            catch (PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        // DESTROY -
        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM autor
                    WHERE id_autor = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                }
            } 
            catch (PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }


    }