<?php 
    header("Content-Type: application/json");
    require_once("../model/model_enfermedad.php");
    $enfermedad = new Enfermedad();
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'),true);
            $res = $enfermedad->ingresarEnfermedad($_POST['nombre_enfermedad'],$_POST['descripcion_enfermedad'],$_POST['tratamiento_enfermedad']);
            echo $res;
            break;
        case 'GET':
            if(isset($_GET['enf'])){
                $idEnfermedad = $_GET['enf'];
                $res = $enfermedad->mostrarListaDeSintomas($idEnfermedad);
                echo $res;
            }else{
                if(isset($_GET['id'])){
                    $idEnfermedad = $_GET['id'];
                    $res = $enfermedad->mostrarEnfermedad($idEnfermedad);
                    echo $res;
                }else{
                    $res = $enfermedad->mostrarListaEnfermedades();
                    echo $res;
                }
            }
            break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'),true);
            $id= $_GET['id'];
            $res = $enfermedad->actualizarEnfermedad($id,$_PUT['nombre_enfermedad'],$_PUT['descripcion_enfermedad'],$_PUT['tratamiento_enfermedad']);
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