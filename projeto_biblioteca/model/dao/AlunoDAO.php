<?php

class AlunoDAO {

    // CREATE - Cadastrar aluno
    public function create($aluno) {
        try {
            $query = BD::getConexao()->prepare(
                "INSERT INTO aluno(nome, email, matricula)
                 VALUES (:n, :e, :m)"
            );

            $query->bindValue(':n', $aluno->getNome(), PDO::PARAM_STR);
            $query->bindValue(':e', $aluno->getEmail(), PDO::PARAM_STR);
            $query->bindValue(':m', $aluno->getMatricula(), PDO::PARAM_STR);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

        } 
        catch (PDOException $e) {
            echo "Erro #1: " . $e->getMessage();
        }
    }


    // READ - Listar alunos
    public function read() {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM aluno"
            );

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            $listaAlunos = array();

            foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                $aluno = new Aluno();
                $aluno->setId($linha['id_aluno']);
                $aluno->setNome($linha['nome']);
                $aluno->setEmail($linha['email']);
                $aluno->setMatricula($linha['matricula']);

                array_push($listaAlunos, $aluno);
            }

            return $listaAlunos;
        } 
        catch (PDOException $e) {
            echo "Erro #2: " . $e->getMessage();
        }
        
    }

    // FIND - 
    public function find($id) {
        try {
            $query = BD::getConexao()->prepare(
                "SELECT * FROM aluno WHERE id_aluno = :i"
                );
            $query->bindValue(':i', $id, PDO::PARAM_INT);

            if (!$query->execute()) {
                print_r($query->errorInfo());
            }

            if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                $aluno = new Aluno();
                $aluno->setId($linha['id_aluno']);
                $aluno->setNome($linha['nome']);
                $aluno->setEmail($linha['email']);
                $aluno->setMatricula($linha['matricula']);
            }

            return $aluno;
        } 
        catch (PDOException $e) {
            echo "Erro #3: " . $e->getMessage();
        }
        
    }

    // UPDATE -
    public function update($aluno) {                                
        try {
            $query = BD::getConexao()->prepare(
                "UPDATE aluno
                SET nome = :n, email = :e, matricula = :m
                WHERE id_aluno = :i"
            );
            $query->bindValue(':n', $aluno->getNome(), PDO::PARAM_STR);
            $query->bindValue(':e', $aluno->getEmail(), PDO::PARAM_STR);
            $query->bindValue(':m', $aluno->getMatricula(), PDO::PARAM_STR);
            $query->bindValue(':i', $aluno->getId(), PDO::PARAM_INT);

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
                "DELETE FROM aluno
                WHERE id_aluno = :i"
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
