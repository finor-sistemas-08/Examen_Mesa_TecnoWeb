<?php
include_once('capa_datos/clsConexion.php');
class Empleado extends Conexion
{
	//atributos
	private $id_emp;
	private $nombre;
	private $paterno;
	private $materno;
	private $pagoHora;
	private $cargo;
	private $tipoD;
	private $tipoA;

	//construtor
	public function __construct()
	{
		parent::__construct();
		$this->id_emp = 0;
		$this->nombre = "";
		$this->paterno = "";
		$this->materno = "";
		$this->pagoHora = 0;
		$this->cargo = "";
		$this->tipoD = 0;
		$this->tipoA = 0;
	}
	//propiedades de acceso
	/**
	 * Get the value of id_emp
	 */
	public function getIdEmp()
	{
		return $this->id_emp;
	}

	/**
	 * Set the value of id_emp
	 *
	 * @return  self
	 */
	public function setIdEmp($id_emp)
	{
		$this->id_emp = $id_emp;

		return $this;
	}

	/**
	 * Get the value of nombre
	 */
	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * Set the value of nombre
	 *
	 * @return  self
	 */
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;

		return $this;
	}

	/**
	 * Get the value of paterno
	 */
	public function getPaterno()
	{
		return $this->paterno;
	}

	/**
	 * Set the value of paterno
	 *
	 * @return  self
	 */
	public function setPaterno($paterno)
	{
		$this->paterno = $paterno;

		return $this;
	}

	/**
	 * Get the value of materno
	 */
	public function getMaterno()
	{
		return $this->materno;
	}

	/**
	 * Set the value of materno
	 *
	 * @return  self
	 */
	public function setMaterno($materno)
	{
		$this->materno = $materno;

		return $this;
	}

	/**
	 * Get the value of pagoHora
	 */
	public function getPagoHora()
	{
		return $this->pagoHora;
	}

	/**
	 * Set the value of pagoHora
	 *
	 * @return  self
	 */
	public function setPagoHora($pagoHora)
	{
		$this->pagoHora = $pagoHora;

		return $this;
	}

	/**
	 * Get the value of cargo
	 */
	public function getCargo()
	{
		return $this->cargo;
	}

	/**
	 * Set the value of cargo
	 *
	 * @return  self
	 */
	public function setCargo($cargo)
	{
		$this->cargo = $cargo;

		return $this;
	}

	/**
	 * Get the value of tipoD
	 */
	public function getTipoD()
	{
		return $this->tipoD;
	}

	/**
	 * Set the value of tipoD
	 *
	 * @return  self
	 */
	public function setTipoD($tipoD)
	{
		$this->tipoD = $tipoD;

		return $this;
	}

	/**
	 * Get the value of tipoA
	 */
	public function getTipoA()
	{
		return $this->tipoA;
	}

	/**
	 * Set the value of tipoA
	 *
	 * @return  self
	 */
	public function setTipoA($tipoA)
	{
		$this->tipoA = $tipoA;

		return $this;
	}


	// Insertando Empleado
	public function guardar()
	{
		$sql = "insert into empleado(nombre,paterno,materno,pagoHora,cargo,tipoD,tipoA)values('$this->nombre','$this->paterno','$this->materno',$this->pagoHora,'$this->cargo',$this->tipoD,$this->tipoA)";
		if (parent::ejecutar($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function modificar()
	{
		$sql = "update empleado 
				set nombre=$this->nombre,
					paterno=$this->paterno,
					materno=$this->materno,
					pagoHora=$this->pagoHora,
					cargo=$this->cargo,
					tipoD=$this->tipoD,
					tipoA=$this->tipoA
				where id_emp = $this->id_emp";
		if (parent::ejecutar($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function eliminar()
	{
		$sql = "delete from empleado WHERE id_emp=$this->id_emp;";
		if (parent::ejecutar($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function mostrar()
	{
		$sql = "select *from empleado";
		return parent::ejecutar($sql);
	}
}
