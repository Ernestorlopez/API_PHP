<?php
 header('Access-Control-Allow-Origin: *');

 header('Access-Control-Allow-Methods: GET, POST');
 
 header("Access-Control-Allow-Headers: X-Requested-With");
    class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=api_php","root","");
                return $conectar;
            } catch (Exception $e) {
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>