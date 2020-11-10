<?php 
    header("Content-Type: application/json");
    require_once("../model/model_enfermedad_sintoma.php");
    $enfermedad_Sintoma = new Enfermedad_Sintoma();
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            $_POST = json_decode(file_get_contents('php://input'),true);
            $res = $enfermedad_Sintoma->ingresarEnfermedadSintoma($_POST['id_enfermedades'],$_POST['id_sintoma']);
            echo $res;
            break;
        case 'GET':
            if(isset($_GET['idEnfermedad']) && isset($_GET['idSintoma'])){
                $idSintoma = $_GET['idSintoma'];
                $idEnfermedad = $_GET['idEnfermedad'];
                $res = $enfermedad_Sintoma->mostrarEnfermedadSintoma($idEnfermedad,$idSintoma);
                echo json_encode($res);
            }else{
                $res = $enfermedad_Sintoma->mostrarListaEnfermedadesSintomas();
                echo json_encode($res);
            }
            break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'),true);
            $idSintoma = $_GET['idSintoma'];
            $idEnfermedad = $_GET['idEnfermedad'];
            $res = $enfermedad_Sintoma->actualizarEnfermedadSintoma($idSintoma,$idEnfermedad,$_PUT['id_enfermedades'],$_PUT['id_sintoma']);
            echo $res;
            break;
        case 'DELETE':
            $idSistema = $_GET['idSintoma'];
            $idEnfermedad = $_GET['idEnfermedad'];
            $res = $enfermedad_Sintoma->eliminarEnfermedadSintoma($idSistema,$idEnfermedad);
            echo $res;
            break;
        default:
            # code...
            break;
    }
?>