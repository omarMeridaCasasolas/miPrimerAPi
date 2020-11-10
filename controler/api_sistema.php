<?php 
    header("Content-Type: application/json");
    require_once("../model/model_sistema.php");
    $sistema = new Sistema();
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'),true);
            $res = $sistema->ingresarSistema($_POST['nombre_sistema'],$_POST['imagen_sistema'],$_POST['tipo_sistema']);
            echo $res;
            break;
        case 'GET':
            if(isset($_GET['id'])){
                $idSistema = $_GET['id'];
                $res = $sistema->mostrarSistema($idSistema);
                echo json_encode($res);
            }else{
                $res = $sistema->mostrarListaSistemas();
                echo json_encode($res);
            }
            break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'),true);
            $id= $_GET['id'];
            $res = $sistema->actualizarSistema($id,$_PUT['nombre_sistema'],$_PUT['imagen_sistema'],$_PUT['tipo_sistema']);
            echo $res;
            break;
        case 'DELETE':
            $id= $_GET['id'];
            $res = $sistema->eliminarSistema($id);
            echo $res;
            break;
        default:
            # code...
            break;
    }
?>