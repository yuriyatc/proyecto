<?php
header('Content-Type: aplication/json');

require_once("../config/conexion.php");
require_once("../models/categoria.php");
//require_once("./includes/load.php");
$categoria = new Categoria();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){

    case "GetAll":
        $datos=$categoria->get_categoria();
        echo json_encode($datos);
        break;

        case "GetId":
            $datos=$categoria->get_categoria_x_id($body["id"]);
            echo json_encode($datos);
            break;

            case "Insert":
                $datos=$categoria->insert_categoria($body["nombre"],$body["direccion"],$body["poblacion"],$body["estado"],$body["telefono"],$body["descripcion"],$body["fecha_inicio"]);
                echo json_encode("Insert Correcto");
            break;

            case "Update":
                $datos=$categoria->update_categoria($body["id"],$body["nombre"],$body["direccion"],$body["poblacion"],$body["estado"],$body["telefono"],$body["descripcion"]);
                echo json_encode("Update Correcto");
            break;

            case "Deleteid":
                $datos=$categoria->delete_categoria($body["id"]); 
                echo json_encode("Delete  Correcto");
            break;

            case "Eliminar":
                $datos=$categoria->eliminar_categoria($body["id"]);
                echo json_encode("Eliminacion  Correcta");
            break;
}


?>