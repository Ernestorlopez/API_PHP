<?php
class Producto extends Conectar
{
    public function get_producto()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
                p.id_producto AS id,
                p.titulo,
                p.imagen,
                p.precio,
                c.id_categoria AS categoria_id,
                c.nombre_categoria AS nombre_categoria
            FROM productos p
            INNER JOIN categorias c ON p.categoria = c.id_categoria";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
        $productos = [];
        foreach ($resultados as $fila) {
            $productos[] = [
                'id' => $fila['id'],
                'titulo' => $fila['titulo'],
                'imagen' => $fila['imagen'],
                'categoria' => [
                    'nombre' => $fila['nombre_categoria'],
                    'id' => $fila['categoria_id']
                ],
                'precio' => $fila['precio']
            ];
        }

        return $productos;
    }

    public function get_producto_id($prod_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM productos WHERE id_producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_producto($prod_tit, $prod_img, $prod_cat, $prod_prec)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO productos (id_producto, titulo, imagen, categoria, precio) VALUES (NULL, ?, ?, ?, ?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_tit);
        $sql->bindValue(1, $prod_img);
        $sql->bindValue(1, $prod_cat);
        $sql->bindValue(1, $prod_prec);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_producto($prod_id, $prod_tit, $prod_img, $prod_cat, $prod_prec)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE productos SET titulo = ?, imagen = ?, categoria = ?, precio = ? WHERE id_producto = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_tit);
        $sql->bindValue(2, $prod_img);
        $sql->bindValue(3, $prod_cat);
        $sql->bindValue(4, $prod_prec);
        $sql->bindValue(5, $prod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
