<?php
include_once('capa_datos/clsConexion.php');
class Categoria extends Conexion
{
	//atributos
	private $id_categoria;
	private $nombre;
	
	//construtor
	public function __construct()
	{   parent::__construct();
		$this->id_categoria=0;
		$this->nombre="";
	}
	//propiedades de acceso
	public function setIdCategoria($valor)
	{
		$this->id_categoria=$valor;
	}
	public function getIdCategoria()
	{
		return $this->id_categoria;
	}

	public function setNombre($valor)
	{
		$this->nombre=$valor;
	}
	public function getNombre()
	{
		return $this->nombre;
	}
	
	public function guardar()
	{
        $sql="insert into categoria(nombre)
			values('$this->nombre')";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function modificar()	{
	$sql="update categoria
			set nombre='$this->nombre'
			where id_categoria=$this->id_categoria";		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function eliminar()
	{
		$sql="delete from categoria
			where id_categoria=$this->id_categoria";
		
		if(parent::ejecutar($sql))
			return true;
		else
			return false;	
	}
	
	public function buscar()
	{
		$sql="select *from categoria";
		return parent::ejecutar($sql);
	}								

}    
?>