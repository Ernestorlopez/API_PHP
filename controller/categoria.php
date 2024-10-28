<?php
header('Content-Type: application/json');

require_once('../config/conexion.php');
require_once('../models/Categoria.php');
$categoria = new Categoria();

$body = json_decode(file_get_contents('php://input'), true);

switch ($_GET['op']) {
    case 'GetAllCat':
        $datos = $categoria->get_categoria();
        echo json_encode($datos);
        break;
    case 'GetIdCat':
        $datos = $categoria->get_categoria_id($body['cat_id']);
        echo json_encode($datos);
        break;
    case 'InsertCat':
        $datos = $categoria->insert_categoria($body['cat_name']);
        echo "Se insertaron correctamente los datos";
        break;
    case 'UpdateCat':
        $datos = $categoria->update_categoria($body['cat_id'], $body['cat_name']);
        echo "Se actualizaron correctamente los datos";
        break;
}
