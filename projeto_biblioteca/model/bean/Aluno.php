<?php
    class Aluno {
        // Atributos
        private $id;
        private $nome;
        private $email;
        private $matricula;

        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getMatricula() {
            return $this->matricula;
        }

        public function setMatricula($matricula) {
            $this->matricula = $matricula;
        }
        
    }