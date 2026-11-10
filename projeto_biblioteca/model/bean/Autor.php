<?php
    class Autor {
        // Atributos
        private $id;
        private $nome;
        private $nacionalidade;

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

        public function getNacionalidade() {
            return $this->nacionalidade;
        }

        public function setNacionalidade($nacionalidade) {
            $this->nacionalidade = $nacionalidade;
        }

    }