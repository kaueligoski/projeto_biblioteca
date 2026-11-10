<?php
    class EditoraDAO {

        // CREATE - Cadastrar Editora
        public function create($editora) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO editora(nome, cidade)
                    VALUES (:n, :c)"
                );

                $query->bindValue(':n', $editora->getNome(), PDO::PARAM_STR);
                $query->bindValue(':c', $editora->getCidade(), PDO::PARAM_STR);

                if (!$query->execute()) {
                    print_r($query->errorInfo());
                }

            } 
            catch (PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        // READ - Listar Editoras
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM editora");
                
                if(!$query->execute()){
                    print_r($query->errorInfo());
                }

                $listaEditoras = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $editora = new Editora(); // Classe bean
                    $editora->setId($linha['id_editora']);
                    $editora->setNome($linha['nome']);
                    $editora->setCidade($linha['cidade']);

                    array_push($listaEditoras, $editora);
                }

                return $listaEditoras;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }

     // FIND
public function find($id) {
    try {
        $query = BD::getConexao()->prepare(
            "SELECT * FROM editora WHERE id_editora = :i"
        );

        $query->bindValue(':i', $id, PDO::PARAM_INT);

        if (!$query->execute()) {
            print_r($query->errorInfo());
        }

        $linha = $query->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            $editora = new Editora();
            $editora->setId($linha['id_editora']);
            $editora->setNome($linha['nome']);
            $editora->setCidade($linha['cidade']);

            return $editora;
        }

        return null;

    } catch (PDOException $e) {
        echo "Erro #3: " . $e->getMessage();
        return null;
    }
}

        // UPDATE -
        public function update($editora) {                                
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE editora
                    SET nome = :n, cidade = :c
                    WHERE id_editora = :i"
                );
                $query->bindValue(':n', $editora->getNome(), PDO::PARAM_STR);
                $query->bindValue(':c', $editora->getCidade(), PDO::PARAM_STR);
                $query->bindValue(':i', $editora->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM editora
                    WHERE id_editora = :i"
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