<?php
class conexion{
    private $conexion, $result, $preparar;

    public function __construct($server, $user, $clave){
            $this->conexion = new PDO($server, $user, $clave, 
            array(PDO::ATTR_EMULATE_PREPARES=>false,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)) or die('Nose puede conectar a la BD');
    }
    public function consultas($sql=''){
        try{
            $parametros = func_get_args();//obtener los parametros que se envian.
            array_shift($parametros); //borrar el primer elemento porque es la consulta.
            $this->preparar = $this->conexion->prepare($sql);
            $this->result = $this->preparar->execute($parametros);
            return $this->result;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function obtener_datos(){
        return $this->preparar->fetchAll(PDO::FETCH_ASSOC);      
    }  
}


?>