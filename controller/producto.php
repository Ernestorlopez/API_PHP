<?php
header('Content-Type: application/json');

require_once('../config/conexion.php');
require_once('../models/Producto.php');
$producto = new Producto();

$body = json_decode(file_get_contents('php://input'), true);

switch ($_GET['op']) {
    case 'GetAllProd':
        $datos = $producto->get_producto();
        echo json_encode($datos);
        break;
    case 'GetIdProd':
        $datos = $producto->get_producto_id($body['prod_id']);
        echo json_encode($datos);
        break;
    case 'InsertProd':
        $datos = $producto->insert_producto($body['prod_tit'], $body['prod_img'], $body['prod_cat'], $body['prod_prec']);
        echo "Se insertaron correctamente los datos";
        break;
    case 'UpdateProd':
        $datos = $producto->update_producto($body['prod_id'], $body['prod_tit'], $body['prod_img'], $body['prod_cat'], $body['prod_prec']);
        echo "Se actualizaron correctamente los datos";
        break;
}
