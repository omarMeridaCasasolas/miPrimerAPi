<?php 
    header("Content-Type: application/json");
    require_once("../model/model_sintoma.php");
    $sintoma = new Sintoma();
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            //Agregars
            $_POST = json_decode(file_get_contents('php://input'),true);
            $res = $sintoma->ingresarSintoma($_POST['nombre_sintoma']);
            echo json_encode($res);
            break;
        case 'GET':
            if(isset($_GET['id'])){
                $idSintoma = $_GET['id'];
                $res = $sintoma->mostrarSintoma($idSintoma);
                echo $res;
            }else{
                $res = $sintoma->mostrarListaSintomas();
                echo $res;
            }
            break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'),true);
            $id= $_GET['id'];
            $res = $sintoma->actualizarSintoma($id,$_PUT['nombre_sintoma']);
            echo $res;
            break;
        case 'DELETE':
            $id= $_GET['id'];
            $res = $sintoma->eliminarSintoma($id);
            echo $res;
            break;
        default:
            # code...
            break;
    }
?>