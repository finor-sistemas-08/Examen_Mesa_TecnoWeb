<html>

<head>
</head>

<body>
	<?php
	include_once('capa_negocio/clsProducto.php');
	include_once('capa_negocio/clsCategoria.php');
	?>

	<b> REGISTRO DE PRODUCTOS </b>
	<form id="form1" name="form1" method="post" action="frmProducto.php">
		<table width="400" border="0">
			<tr>
				<td width="80"> </td>
				<td width="225">
					<input name="txtIdProducto" type="hidden" value="<?php echo $_GET['pid_producto']; ?>" id="txtIdProducto" />
				</td>
			</tr>
			<tr>
				<td width="80">Descripcion</td>
				<td width="225">
					<input name="txtDescripcion" type="text" value="<?php echo $_GET['pdescripcion']; ?>" id="txtDescripcion" />
				</td>
			</tr>

			<tr>
				<td width="80">Precio</td>
				<td width="225">
					<input name="txtPrecio" type="text" value="<?php echo $_GET['pprecio']; ?>" id="txtPrecio" />
				</td>
			</tr>
			<tr>
				<td width="80">Categoria</td>
				<td width="225">
					<?php
					$obj = new Categoria();
					$reg = $obj->buscar();
					echo "<select name='cboIdCategoria' id='$id_categoria'/>";
					while ($fila = mysqli_fetch_object($reg)) {
					?>
						<option <?php if ($_GET['pcategoria'] == $fila->nombre) echo "selected";
										else ?> value="<?php echo $fila->id_categoria; ?>"> <?php echo $fila->nombre;
																																				echo "</option>";
																																			}
																																			echo "</select>";
																																				?>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<input type="submit" name="botones" value="Nuevo" />
					<input type="submit" name="botones" value="Guardar" />
					<input type="submit" name="botones" value="Modificar" />
					<input type="submit" name="botones" value="Eliminar" />
					<input type="submit" name="botones" id="botones" value="Mostrar" />
					<input type="submit" name="botones" id="botones" value="Buscar Rango Precios" />
				</td>
			</tr>

			<tr>
				<!-- busqueda por codigo y descripcion del producto -->
				<td colspan="2">


				</td>
			</tr>
			<tr>
				<td colspan="2">
					Menor
					<input name="txtRango1" type="text" size="10" />
					Mayor																																			
					<input name="txtRango2" type="text" size="10" />
				</td>
			</tr>
		</table>
	</form>

	<?php
	function guardar()
	{
		if ($_POST['txtDescripcion']) {
			$obj = new Producto();
			$obj->setDescripcion($_POST['txtDescripcion']);
			$obj->setPrecio($_POST['txtPrecio']);
			$obj->setIdCategoria($_POST['cboIdCategoria']);
			if ($obj->guardar())
				echo "Producto Guardado..!!!";
			else
				echo "Error al guardar el Producto";
		} else
			echo "La descripcion del producto es obligatoria..!!!";
	}

	function modificar()
	{
		if ($_POST['txtIdProducto']) {
			$obj = new Producto();
			$obj->setIdProducto($_POST['txtIdProducto']);
			$obj->setDescripcion($_POST['txtDescripcion']);
			$obj->setPrecio($_POST['txtPrecio']);
			$obj->setIdCategoria($_POST['cboIdCategoria']);
			if ($obj->modificar())
				echo "Producto modificado..!!!";
			else
				echo "Error al modificar el Producto..!!!";
		} else
			echo "El Codigo del producto es obligatorio...!!!";
	}

	function eliminar()
	{
		if ($_POST['txtIdProducto']) {
			$obj = new Producto();
			$obj->setIdProducto($_POST['txtIdProducto']);
			if ($obj->eliminar())
				echo "Producto eliminado...!!!";
			else
				echo "Error al eliminar el Producto";
		} else
			echo "para eliminar el producto, debe tener el id del producto..!!!";
	}

	function buscar()
	{
		$obj = new Producto();
		$resultado = $obj->buscar($_POST['txtBuscar']);
		mostrarRegistros($resultado);
	}

	function buscarRango()
	{
		$obj = new Producto();
		$resultado = $obj->buscarRango($_POST['txtRango1'], $_POST['txtRango2']);
		mostrarRegistros($resultado);
	}

	function mostrarRegistros($registros)
	{
		echo "<table border='1' align='left'>";
		echo "<tr><td>IdProducto</td>";
		echo "<td>Descripcion</td>";
		echo "<td>Precio</td>";
		//echo "<td>Categoria</td>"; Si quiero mostrar el nombre de la categoria		 	
		echo "<td><center>*</center></td></tr>";
		while ($fila = mysqli_fetch_object($registros)) {
			echo "<tr>";
			echo "<td>$fila->id_producto</td>";
			echo "<td>$fila->descripcion</td>";
			echo "<td>$fila->precio</td>";
			//echo "<td>$fila->nombre</td>";
			echo "<td><a href='frmProducto.php? pid_producto=$fila->id_producto&pdescripcion=$fila->descripcion&pprecio=$fila->precio&pcategoria=$fila->nombre'> [Editar] </a> </td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	//programa principal
	switch ($_POST['botones']) {
		case "Nuevo": {
			}
			break;

		case "Guardar": {
				guardar();
			}
			break;

		case "Modificar": {
				modificar();
			}
			break;

		case "Eliminar": {
				eliminar();
			}
			break;

		case "Mostrar": {
				buscar();
			}
			break;

		case "Buscar Rango Precios": {
				buscarRango();
			}
			break;
	}
	?>

</body>

</html>