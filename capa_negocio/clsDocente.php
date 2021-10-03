<?php
include_once('capa_datos/clsConexion.php');
class Docente extends Conexion
{
    //atributos
    private $id_emp;
    private $pagoHora;

    //construtor
    public function __construct()
    {
        parent::__construct();
        $this->id_emp = 0;
        $this->pagoHora = 0;
    }
    //propiedades de acceso
    public function setIdEmpleado($valor)
    {
        $this->id_emp = $valor;
    }
    public function getIdEmpleado()
    {
        return $this->id_emp;
    }

    public function setPagoHora($valor)
    {
        $this->pagoHora = $valor;
    }
    public function getPagoHora()
    {
        return $this->pagoHora;
    }

    public function guardar()
    {
        $sql = "inser into docente(id_emp,pagoHora) values('$this->id_emp','$this->pagoHora')";
        if (parent::ejecutar($sql))
            return true;
        else
            return false;
    }
}
