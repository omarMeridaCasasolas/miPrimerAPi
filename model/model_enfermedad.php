
<?php
//listarTableDocente()
    require_once("../model/model_sintoma.php"); 
    require_once("conexion.php");
    class Enfermedad extends Conexion{
        public function Enfermedad(){  
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->connexion_bd=null;
        }

        public function mostrarListaDeSintomas($idEnfermedad){
            $sql = "SELECT * FROM sintomas WHERE id_sintoma IN (SELECT id_sintoma FROM enfermedad_sintoma WHERE id_enfermedades = :idEnfermedad)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":idEnfermedad"=>$idEnfermedad));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            $res = str_replace (array("\r\n", "\n", "\r"), ' ', $respuesta);
            return  json_encode($res);
        }

        public function ingresarEnfermedad($nombre,$descripcion,$tratamiento){
            $sql = "INSERT INTO enfermedad(nombre_enfermedad, descripcion_enfermedad, tratamiento_enfermedad ) VALUES(:nombre,:descripcion,:tratamiento)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":nombre"=>$nombre,":descripcion"=>$descripcion,":tratamiento"=>$tratamiento));
            $sentenceSQL->closeCursor();
            return json_encode(array("respuesta"=>$respuesta));
        }

        public function mostrarEnfermedad($idEnfermedad){
            $sql = "SELECT * FROM enfermedad WHERE id_enfermedades = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$idEnfermedad));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            $res = str_replace (array("\r\n", "\n", "\r"), ' ', $respuesta);
            return  json_encode($respuesta[0]);
        }

        public function mostrarListaEnfermedades(){
            $sql = "SELECT * FROM enfermedad";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            $res = str_replace (array("\r\n", "\n", "\r"), ' ', $respuesta);
            return  json_encode($res);
        }

        public function actualizarEnfermedad($idEnfermedad,$nombre,$descripcion,$tratamiento){
            $sql = "UPDATE enfermedad SET nombre_enfermedad = :nombre, descripcion_enfermedad = :descripcion, tratamiento_enfermedad = :tratamiento  WHERE id_enfermedades = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":id"=>$idEnfermedad,":nombre"=>$nombre,":descripcion"=>$descripcion,":tratamiento"=>$tratamiento));
            $sentenceSQL->closeCursor();
            return json_encode(array("respuesta"=>$respuesta));
        }

        public function eliminarEnfermedad($idEnfermedad){
            $sql = "DELETE from enfermedad  WHERE id_enfermedades = :idEnfermedad";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":idEnfermedad"=>$idEnfermedad));
            $sentenceSQL->closeCursor();
            return json_encode(array("respuesta"=>$respuesta));
        }

    }