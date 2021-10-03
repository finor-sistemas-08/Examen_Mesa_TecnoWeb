<?php
include_once('capa_datos/clsConexion.php');
class Empleado extends Conexion
{
    //atributos
    private $id_emp;
    private $nombre;
    private $paterno;
    private $materno;
    private $tipo;
    private $cargo;
    private $pagoHora;

    //construtor
    public function __construct()
    {
        parent::__construct();
        $this->id_emp = 0;
        $this->nombre = "";
        $this->paterno = "";
        $this->materno = "";
        $this->tipo = "";
        $this->cargo = "";
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

    public function setNombre($valor)
    {
        $this->nombre = $valor;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setPaterno($valor)
    {
        $this->paterno = $valor;
    }
    public function getPaterno()
    {
        return $this->paterno;
    }

    public function setMaterno($valor)
    {
        $this->materno = $valor;
    }
    public function getMaterno()
    {
        return $this->materno;
    }

    public function setTipo($valor)
    {
        $this->tipo = $valor;
    }
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setCargo($valor)
    {
        $this->cargo = $valor;
    }
    public function getCargo()
    {
        return $this->cargo;
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
        // Insertando EMpleado
        $sql = "insert into empleado(nombre,paterno,materno,tipo) values('$this->nombre','$this->paterno','$this->materno',$this->tipo)";
        if (parent::ejecutar($sql)) {
            $res = true;

            // Obteniendo el ID del empleado
            $sql = "select max(id_emp) from empleado";
            $aux = mysqli_fetch_object(parent::ejecutar($sql));
            $this->setIdEmpleado($aux->id_emp);

            if ($this->tipo == "Administrador") {
                // Insertando Administrador
                $sql = "insert into administrativo(id_emp,cargo)values('$this->id_emp',$this->cargo)";
                if (parent::ejecutar($sql)) {
                    $res = true;
                } else {
                    $res = false;
                }
            } elseif ($this->tipo == "Docente") {
                // Insertando docente
                $sql = "insert into docente(id_emp,pagoHora)values('$this->id_emp',$this->pagoHora)";
                if (parent::ejecutar($sql)) {
                    $res = true;
                } else {
                    $res = false;
                }
            } else {
                $res = false;
            }
        } else {
            $res = false;
        }
        return $res;
    }

    public function mostrarEmpleados()
    {
        $sql = "select id_emp, nombre, paterno, materno, tipo
                from empleado                
                ";
        return parent::ejecutar($sql);
    }

    public function mostrarAdministrativo()
    {
        $sql = "select empleado.id_emp, nombre, paterno, materno, tipo, cargo
                from empleado
                INNER JOIN administrativo
                ON empleado.id_emp = administrativo.id_emp;
                ";
        return parent::ejecutar($sql);
    }

    public function mostrarDocente()
    {
        $sql = "select empleado.id_emp, nombre, paterno, materno, tipo, pagoHora
                from empleado
                INNER JOIN docente
                ON empleado.id_emp = docente.id_emp;
                ";
        return parent::ejecutar($sql);
    }
}
