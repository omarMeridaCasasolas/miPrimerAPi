
<?php
//listarTableDocente()
    require_once("conexion.php");
    class Sintoma extends Conexion{
        public function Sintoma(){  
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->connexion_bd=null;
        }

        public function ingresarSintoma($nombre){
            $sql = "INSERT INTO sintomas(nombre_sintoma) VALUES(:nombre)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":nombre"=>$nombre));
            $sentenceSQL->closeCursor();
            return $respuesta;
        }

        public function mostrarSintoma($idSintoma){
            $sql = "SELECT * FROM sintomas WHERE id_sintoma = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$idSintoma));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return  json_encode($respuesta[0]);
        }

        public function mostrarListaSintomas(){
            $sql = "SELECT * FROM sintomas";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return  json_encode($respuesta);
        }

        public function actualizarSintoma($idSintoma, $nombreSintoma){
            $sql = "UPDATE sintomas SET nombre_sintoma = :nombre WHERE id_sintoma = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":nombre"=>$nombreSintoma,":id"=>$idSintoma));
            $sentenceSQL->closeCursor();
            return json_encode($respuesta);
        }

        public function eliminarSintoma($idSintoma){
            $sql = "DELETE from sintomas  WHERE id_sintoma = :idSintoma";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":idSintoma"=>$idSintoma));
            $sentenceSQL->closeCursor();
            return json_encode($respuesta);
        }

    }