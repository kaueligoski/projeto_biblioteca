<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                "mysql:host=localhost;dbname=biblioteca",
                "root", 
                "root"
            );

            return $conn;
        }
    }