<?php
    class Categoria extends Conectar{
        public function get_categoria(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM categorias";
            $sql = $conectar->prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_categoria_id($cat_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM categorias WHERE id_categoria = ?";
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1, $cat_id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_categoria($cat_name){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO categorias (id_categoria, nombre_categoria) VALUES (NULL, ?);";
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1, $cat_name);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_categoria($cat_id, $cat_name){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE categorias SET nombre_categoria = ? WHERE id_categoria = ?;";
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1, $cat_name);
            $sql -> bindValue(2, $cat_id);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>