<html>

<head>
</head>

<body>

    <?php
    include_once('capa_negocio/clsEmpleado.php');

    // Valor almacena cualquier dato que hayamos colocado para buscar en el input "txtBuscar"
    // $valor = $_POST['txtBuscar'];
    ?>

    <b> REGISTRO DE EMPLEADOS </b>
    <form id="form1" name="form1" method="post" action="frmEmpleado.php">
        <table width="400" border="0">
            <tr>
                <td> </td>
                <td>
                    <input name="txtIdEmpleado" type="hidden" value="<?php echo $_GET['pidEmpleado']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100">Nombres</td>
                <td width="125">
                    <input name="txtNombre" type="text" value="<?php echo $_GET['pnombre']; ?>" " />
				</td>
			</tr>
			<tr>
				<td width=" 100">Apellido Paterno
                </td>
                <td width="125">
                    <input name="txtPaterno" type="text" value="<?php echo $paterno = $_GET['ppaterno']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100">Apellido Materno</td>
                <td width="125">
                    <input name="txtMaterno" type="text" value="<?php echo $materno = $_GET['pmaterno']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100">Tipo</td>
                <td width="125">
                    <input name="txtTipo" type="text" value="<?php echo $tipo = $_GET['ptipo']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100">Cargo</td>
                <td width="125">
                    <input name="txtCargo" type="text" value="<?php echo $cargo = $_GET['pcargo']; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100">Pago por Hora</td>
                <td width="125">
                    <input name="txtPagoHora" type="text" value="<?php echo $pagoHora = $_GET['ppagoHora']; ?>" />
                </td>
            </tr>

            <td width="100">
                Buscar:
            </td>
            <tr>
                <td width="10">
                    <input type="radio" name="switch" value="1" checked="checked" <?php if ($_POST['switch'] == "1") echo "checked"; ?> />
                    Empleados
                    <br>
                    <input type="radio" name="switch" value="2" <?php if ($_POST['switch'] == "2") echo "checked"; ?> />
                    Administrativos
                    <br>
                    <input type="radio" name="switch" value="3" <?php if ($_POST['switch'] == "3") echo "checked"; ?> />
                    Docentes
                </td>

            </tr>
            <tr>
                <td colspan="2">

                    <!-- Insertar -->
                    <input type="submit" name="botones" value="Guardar" />
                    <input type="submit" name="botones" value="Mostrar Datos" />
                </td>
            </tr>

            <tr>

            </tr>
        </table>
    </form>


    <?php

    function guardar()
    {
        if ($_POST['txtNombre']) {
            $obj = new Empleado();
            $obj->setNombre($_POST['txtNombre']);
            $obj->setPaterno($_POST['txtPaterno']);
            $obj->setMaterno($_POST['txtMaterno']);
            $obj->setTipo($_POST['txtTipos']);
            $obj->setCargo($_POST['txtCargo']);
            $obj->setPagoHora($_POST['txtPagoHora']);
            if ($obj->guardar())
                echo "Empleado Guardado";
            else
                echo "Error al guardar Empleado";
        } else
            echo "El nombre es obligatorio";
    }

    function mostrarRegistros()
    {
        $obj = new Empleado();
        $registros = $obj->mostrarEmpleados();
        echo "<table border='1' align='left'>";

        // En una fila se establecen las columnas con sus nombres
        echo "<tr> 
                <td> Codigo </td>
				<td> Nombre </td>
				<td> Paterno </td>
				<td> Materno </td>
				<td> Tipo </td>
              </tr>";
        while ($fila = mysqli_fetch_object($registros)) {
            echo "<tr>";
            echo "<td>$fila->id_emp</td>";
            echo "<td>$fila->nombre</td>";
            echo "<td>$fila->paterno</td>";
            echo "<td>$fila->materno</td>";
            echo "<td>$fila->tipo</td>";
        }
        echo "</table>";
    }
    function mostrarRegistrosDocente()
    {
        $obj = new Empleado();
        $registros = $obj->mostrarDocente();
        echo "<table border='1' align='left'>";

        // En una fila se establecen las columnas con sus nombres
        echo "<tr> 
                <td> Codigo </td>
				<td> Nombre </td>
				<td> Paterno </td>
				<td> Materno </td>
				<td> Tipo </td>
				<td> Pago por Hora </td>
              </tr>";
        while ($fila = mysqli_fetch_object($registros)) {
            echo "<tr>";
            echo "<td>$fila->id_emp</td>";
            echo "<td>$fila->nombre</td>";
            echo "<td>$fila->paterno</td>";
            echo "<td>$fila->materno</td>";
            echo "<td>$fila->tipo</td>";
            echo "<td>$fila->pagoHora</td>";
        }
        echo "</table>";
    }
    function mostrarRegistrosAdministrativo()
    {
        $obj = new Empleado();
        $registros = $obj->mostrarAdministrativo();
        echo "<table border='1' align='left'>";

        // En una fila se establecen las columnas con sus nombres
        echo "<tr> 
                <td> Codigo </td>
				<td> Nombre </td>
				<td> Paterno </td>
				<td> Materno </td>
				<td> Tipo </td>
				<td> Cargo </td>
              </tr>";
        while ($fila = mysqli_fetch_object($registros)) {
            echo "<tr>";
            echo "<td>$fila->id_emp</td>";
            echo "<td>$fila->nombre</td>";
            echo "<td>$fila->paterno</td>";
            echo "<td>$fila->materno</td>";
            echo "<td>$fila->tipo</td>";
            echo "<td>$fila->cargo</td>";
        }
        echo "</table>";
    }

    //programa principal
    switch ($_POST['botones']) {
        case "Mostrar Datos": {
                if ($_POST['switch'] == 1) {
                    mostrarRegistros();
                } elseif ($_POST['switch'] == 2) {
                    mostrarRegistrosAdministrativo();
                } elseif ($_POST['switch'] == 3) {
                    mostrarRegistrosDocente();
                } else {
                    echo "No ha seleccionado que datos mostrar";
                }
            }
            break;

        case "Guardar": {
                guardar();
            }
            break;
    }
    ?>

</body>

</html>