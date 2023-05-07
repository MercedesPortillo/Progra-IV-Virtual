<?php
    include('../config/Config.php'); 
    extract($_REQUEST);
    $alumnos = isset($alumnos) ? $alumnos : [''];
    $accion = isset($accion) ? $accion : '';

    $objAlumnos = new Alumnos($conexion);
    print_r( $objAlumnos->recibir_datos($alumnos) );

    $objAlumnos = new Alumnos($conexion);
    if($accion=='consultar'){
        print_r( json_encode($objAlumnos->obtener_datos()) );
    }else if($accion=='eliminar'){
        print_r( json_encode($objAlumnos->eliminar_datos()) );
    }else{
        print_r( $objAlumnos->recibir_datos($alumnos) );
    }

    class Alumnos{
        private $datos=[], $db;
        public $resp = ['msg'=>'ok'];

        public function __construct($db){
            $this->db=$db;
        }
        public function obtener_datos(){
            $this->db->consultas('SELECT * FROM alumnos_progra_iv');
            return $this->db->obtener_datos();
        }
        public function eliminar_datos(){
            global $idAlumnos;
            return $this->db->consultas('
                DELETE alumnos_progra_iv FROM alumnos_progra_iv
                WHERE idAlumnos=?', $idAlumnos
            );
        }
        public function recibir_datos($alumnos_progra_iv){
            $this->datos = json_decode($alumnos_progra_iv, true);
            $this->validar_datos();
            return $this->validar_datos();
        }
        private fucntion validar_dato(){
        private function validar_datos(){
            if( empty($this->datos['nombre']) ){
                $this->resp['msg', 'Por favor ingrese un nombre'];
            }
                $this->resp['msg'] = 'Por favor ingrese un nombre';
            } 
            if( empty($this->datos['direccion']) ){
                $this->resp['msg', 'Por favor ingrese una direccion'];
                $this->resp['msg'] = 'Por favor ingrese una direccion';
            }
            if( empty($this->datos['telefono']) ){
                $this->resp['msg', 'Por favor ingrese un numero de telefono'];
                $this->resp['msg'] = 'Por favor ingrese un numero de telefono';
            }
            if( empty($this->datos['dui']) ){
                $this->resp['msg', 'Por favor ingrese el numero de DUI'];
                //$this->resp['msg'] = 'Por favor ingrese el numero de DUI';
            }
            $this->administrar_alumnos();
            return $this->administrar_alumnos();
        }
        private function administrar_alumnos(){

            global $accion;
            if( $this->resp['msg']=='ok' ){
                if( $accion=='nuevo' ){
                    return $this->db->consultas('
                        INSERT INTO alumnos (nombre, direccion, telefono, dui)
                        VALUES(?,?,?,?)',$this->datos['nombre'], $this->datos['direccion'],
                        $this->datos['telefono'], $this->datos['dui']
                    );
                }else if( $accion=='modificar' ){
                    return $this->db->consultas('
                        UPDATE alumnos SET nombre=?, direccion=?, telefono=?, dui=?
                        WHERE idAlumnos=?', $this->datos['nombre'], $this->datos['direccion'],
                        $this->datos['telefono'], $this->datos['dui'], $this->datos['idDocente']
                    );
                }
            }else{
                return $this->resp;
            }

        }
    }
?>