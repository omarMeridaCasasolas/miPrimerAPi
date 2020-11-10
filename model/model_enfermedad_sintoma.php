
<?php
//listarTableDocente()
    require_once("conexion.php");
    class Enfermedad_Sintoma extends Conexion{
        public function Enfermedad_Sintoma(){  
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->connexion_bd=null;
        }

        public function ingresarEnfermedadSintoma($idEnfermedad,$idSintoma){
            $sql = "INSERT INTO enfermedad_sintoma(id_enfermedades,id_sintoma) VALUES(:idEnfermedad,:idSintoma)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":idEnfermedad"=>$idEnfermedad,":idSintoma"=>$idSintoma));
            $sentenceSQL->closeCursor();
            return json_encode(array("respuesta"=>$respuesta));
        }

        public function mostrarEnfermedadSintoma($idEnfermedad,$idSintoma){
            $sql = "SELECT * FROM enfermedad_sintoma WHERE id_enfermedades = :idEnfermedad AND id_sintoma = :idSintoma";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":idEnfermedad"=>$idEnfermedad,":idSintoma"=>$idSintoma));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return  json_encode($respuesta[0]);
        }

        public function mostrarListaEnfermedadesSintomas(){
            $sql = "SELECT * FROM enfermedad_sintoma";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            //$respuesta = preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $respuesta);
            return  json_encode($respuesta);
        }

        public function actualizarEnfermedadSintoma($idEnfermedad,$idSintoma,$idNuevoEnfermedad,$idNuevoSintoma){
            $sql = "UPDATE enfermedad_sintoma SET id_enfermedades = :nuevaEnfermedad , id_sintoma = :nuevoSintoma WHERE id_enfermedades = :idEnfermedad AND id_sintoma = :idSintoma";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":nuevaEnfermedad"=>$idNuevoEnfermedad,":nuevoSintoma"=>$idSintoma,":idEnfermedad"=>$idEnfermedad,"idSintoma"=>$idSintoma,));
            $sentenceSQL->closeCursor();
            return json_encode(array("respuesta"=>$respuesta));
        }

        public function eliminarEnfermedadSintoma($idEnfermedad,$idSintoma){
            $sql = "DELETE from enfermedad_sintoma  WHERE id_enfermedades = :idEnfermedad AND id_sintoma = :idSintoma";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":idEnfermedad"=>$idEnfermedad,"idSintoma"=>$idSintoma));
            $sentenceSQL->closeCursor();
            return json_encode(array("respuesta"=>$respuesta));
        }

    }