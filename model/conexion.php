<?php 
    class Conexion {
        protected $connexion_bd;
        public function Conexion(){
            try {
                // $this->connexion_bd = new PDO("pgsql:host=localhost;port=5434;dbname=Ruben","postgres","kirium");
                //$this->connexion_bd = new PDO("pgsql:host=localhost;port=5434;dbname=localHost_asistencia","postgres","kirium");
                $this->connexion_bd = new PDO("pgsql:host=ec2-52-201-55-4.compute-1.amazonaws.com;port=5432;dbname=ddm5k6l3g5nntm","erpgwqxdcmmizk","d764438378b6a33d99872ff2f4321949530f5f26e8271e10fb80ece8311e701a");
                $this->connexion_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->connexion_bd;
            } catch(Exception $e){
                echo $e->getMessage()."<br>";
                echo "Error en la linea ".$e->getLine();
            }
        }
    }