<?php
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Socios_negocio.php");
    $socios_negocio = new Socios_negocio();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opcion"]){

        case "GetSocios_negocios":
            $datos=$socios_negocio->get_socios_negocio();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$socios_negocio->get_socio_negocio($body["id"]);
            echo json_encode($datos);
        break;

        case "Insertar_Socio_negocios":
            $datos=$socios_negocio->insertar_socios_negocio($body["id"],$body["nombre"],$body["razón_social"],$body["dirección"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]);
            echo json_encode("Socio de negocios agregado");
        break;

        case "Eliminar_Socio_negocios":
            $datos=$socios_negocio->eliminar_socio_negocio($body["id"]);
            echo json_encode("Socio de negocios eliminado");   
        break;

        case "Actualizar_Socio_negocios":
            $datos=$socios_negocio->actualizar_socio_negocio($body["id"],$body["nombre"],$body["razón_social"],$body["dirección"],$body["tipo_socio"],$body["contacto"],$body["email"],$body["fecha_creado"],$body["estado"],$body["telefono"]);
            echo json_encode("Socio de negocios actualizado");   
        break;
    }
?>