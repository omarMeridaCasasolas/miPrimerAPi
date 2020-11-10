
<?php
//listarTableDocente()
    require_once("conexion.php");
    class Enfermedad extends Conexion{
        public function Enfermedad(){  
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->connexion_bd=null;
        }

        public function ingresarEnfermedad($idSistemas,$nombre,$descripcion,$enlace){
            $sql = "INSERT INTO enfermedad(id_sistemas, nombre_enfermedad, descripcion_enfermedad, enlace_enfermedad) VALUES(:id,:nombre,:descripcion,:enlace)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":id"=>$idSistemas,":nombre"=>$nombre,":descripcion"=>$descripcion,":enlace"=>$enlace));
            $sentenceSQL->closeCursor();
            return json_encode(array("respuesta"=>$respuesta));
        }

        public function mostrarEnfermedad($idEnfermedad){
            $sql = "SELECT * FROM enfermedad WHERE id_enfermedades = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$idEnfermedad));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return  json_encode($respuesta[0]);
        }

        public function mostrarListaEnfermedades(){
            $sql = "SELECT * FROM enfermedad";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            //$respuesta = preg_replace("/[\r\n|\n|\r]+/", PHP_EOL, $respuesta);
            return  json_encode($respuesta);
        }

        public function actualizarEnfermedad($idEnfermedad,$idSistemas,$nombre,$descripcion,$enlace){
            $sql = "UPDATE enfermedad SET nombre_enfermedad = :nombre, descripcion_enfermedad = :descripcion, enlace_enfermedad = :enlace ,id_sistemas = :idSistema WHERE id_enfermedades = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":id"=>$idEnfermedad,":nombre"=>$nombre,":descripcion"=>$descripcion,":enlace"=>$enlace,":idSistema"=>$idSistemas));
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