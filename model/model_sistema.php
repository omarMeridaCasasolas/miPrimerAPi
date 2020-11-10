
<?php
//listarTableDocente()
    require_once("conexion.php");
    class Sistema extends Conexion{
        public function Sistema(){  
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->connexion_bd=null;
        }
        
        public function ingresarSistema($nombre,$enlace,$tipoSistema){
            $sql = "INSERT INTO sistema_cuerpo(nombre_sistema,imagen_sistema,tipo_sistema) VALUES(:nombre ,:enlace, :tipo)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":nombre"=>$nombre,":enlace"=>$enlace,":tipo"=>$tipoSistema));
            $sentenceSQL->closeCursor();
            return json_encode(array("respuesta"=>$respuesta));
        }

        public function mostrarSistema($idSistema){
            $sql = "SELECT * FROM sistema_cuerpo WHERE id_sistemas = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$idSistema));
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return  json_encode($respuesta[0]);
        }

        public function mostrarListaSistemas(){
            $sql = "SELECT * FROM sistema_cuerpo";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $respuesta = $sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return  json_encode($respuesta);
        }

        public function actualizarSistema($idSistema,$nombre,$enlace,$tipoSistema){
            $sql = "UPDATE sistema_cuerpo SET nombre_sistema = :nombre ,imagen_sistema = :enlace, tipo_sistema = :tipo  WHERE id_sistemas = :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":nombre"=>$nombre,":enlace"=>$enlace,":tipo"=>$tipoSistema,":id"=>$idSistema));
            $sentenceSQL->closeCursor();
            return json_encode(array("respuesta"=>$respuesta));
        }

        public function eliminarSistema($idSistema){
            $sql = "DELETE from sistema_cuerpo  WHERE id_sistemas = :idSistema";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $respuesta = $sentenceSQL->execute(array(":idSistema"=>$idSistema));
            $sentenceSQL->closeCursor();
            return json_encode($respuesta);
        }

    }