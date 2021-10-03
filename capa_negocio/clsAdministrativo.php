<?php
include_once('capa_datos/clsConexion.php');
class Administrativo extends Conexion
{
    //atributos
    private $id_emp;
    private $cargo;

    //construtor
    public function __construct()
    {
        parent::__construct();
        $this->id_emp = 0;
        $this->cargo = "";
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

    public function setCargo($valor)
    {
        $this->cargo = $valor;
    }
    public function getCargo()
    {
        return $this->cargo;
    }

    public function guardar()
    {
        $sql = "insert into administrativo(cargo) values('$this->cargo')";
        if (parent::ejecutar($sql))
            return true;
        else
            return false;
    }
}
