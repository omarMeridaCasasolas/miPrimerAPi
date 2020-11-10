<?php 
    header("Content-Type: application/json");
    require_once("../model/model_enfermedad.php");
    $enfermedad = new Enfermedad();
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'),true);
            $res = $enfermedad->ingresarEnfermedad($_POST['id_sistemas'],$_POST['nombre_enfermedad'],$_POST['descripcion_enfermedad'],$_POST['enlace_enfermedad']);
            echo $res;
            break;
        case 'GET':
            if(isset($_GET['id'])){
                $idSistema = $_GET['id'];
                $res = $enfermedad->mostrarEnfermedad($idSistema);
                echo json_encode($res);
            }else{
                $res = $enfermedad->mostrarListaEnfermedades();
                echo json_encode($res);
            }
            break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'),true);
            $id= $_GET['id'];
            $res = $enfermedad->actualizarEnfermedad($id,$_PUT['id_sistemas'],$_PUT['nombre_enfermedad'],$_PUT['descripcion_enfermedad'],$_PUT['enlace_enfermedad']);
            echo $res;
            break;
        case 'DELETE':
            $id= $_GET['id'];
            $res = $enfermedad->eliminarEnfermedad($id);
            echo $res;
            break;
        default:
            # code...
            break;
    }
?>