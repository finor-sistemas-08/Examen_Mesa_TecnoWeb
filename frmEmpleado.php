<html>

<head>
</head>

<body>

    <?php
    include_once('capa_negocio/clsEmpleado.php');

    ?>

    <b> REGISTRO DE EMPLEADOS </b>
    <form id="form1" name="form1" method="post" action="frmEmpleado.php">
        <table width="400" border="0">
            <tr>
                <td> </td>
                <td>
                    <?php $idemp = $_GET['idemp']; ?>
                    <input name="txtIdEmpleado" type="text" value="<?php echo $idemp; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100">Nombres</td>
                <td width="125">
                    <?php $nombre = $_GET['nombre']; ?>
                    <input name="txtNombre" type="text" value="<?php echo $nombre; ?>" />
                </td>
            </tr>
            <tr>
                <td width=" 100">Apellido Paterno
                </td>
                <td width="125">
                    <?php $paterno = $_GET['paterno']; ?>
                    <input name="txtPaterno" type="text" value="<?php echo $paterno; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100">Apellido Materno</td>
                <td width="125">
                    <?php $materno = $_GET['materno']; ?>
                    <input name="txtMaterno" type="text" value="<?php echo $materno; ?>" />
                </td>
            </tr>

            <tr>
                <td width="100">Pago por Hora</td>
                <td width="125">
                    <?php $pagoHora = $_GET['pagoHora']; ?>
                    <input name="txtPagoHora" type="text" value="<?php echo $pagoHora; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100">Cargo</td>
                <td width="125">
                    <?php $cargo = $_GET['cargo']; ?>
                    <input name="txtCargo" type="text" value="<?php echo $cargo; ?>" />
                </td>
            </tr>
            <tr>
                <td width="100">Tipo Docente</td>
                <td width="125">
                    <?php $tipoD = $_GET['tipoD']; ?>
                    <input name="chbxTipoD" type="checkbox" <?php if ($tipoD == 1) { echo "checked"; } ?> />
                </td>
            </tr>
            <tr>
                <td width="100">Tipo Administrativo</td>
                <td width="125">
                    <?php $tipoA = $_GET['tipoA']; ?>
                    <input name="chbxTipoA" type="checkbox" <?php if ($tipoA == 1) {echo "checked";} ?> />
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td colspan="2">

                    <!-- Insertar -->
                    <input type="submit" name="botones" value="Guardar" />
                    <input type="submit" name="botones" value="Modificar" />
                    <input type="submit" name="botones" value="Eliminar" />
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
            $obj->setPagoHora($_POST['txtPagoHora']);
            $obj->setCargo($_POST['txtCargo']);

            if (isset($_POST['chbxTipoD'])) {
                $obj->setTipoD(1);
            }
            if (isset($_POST['chbxTipoA'])) {
                $obj->setTipoA(1);
            }

            if ($obj->guardar())
                echo "Empleado Guardado";
            else
                echo "Error al guardar Empleado";
        } else
            echo "El nombre es obligatorio";
    }

    function modificar()
    {
        if ($_POST['txtNombre']) {
            $obj = new Empleado();
            $obj->setIdEmp($_POST['txtIdEmpleado']);
            $obj->setNombre($_POST['txtNombre']);
            $obj->setPaterno($_POST['txtPaterno']);
            $obj->setMaterno($_POST['txtMaterno']);
            $obj->setPagoHora($_POST['txtPagoHora']);
            $obj->setCargo($_POST['txtCargo']);

            if (isset($_POST['chbxTipoD'])) {
                $obj->setTipoD(1);
            }
            if (isset($_POST['chbxTipoA'])) {
                $obj->setTipoA(1);
            }

            if ($obj->modificar())
                echo "Empleado Modificado";
            else
                echo "Error al modificar Empleado";
        } else
            echo "El nombre es obligatorio";
    }

    function eliminar()
    {
        if ($_POST['txtIdEmpleado']) {
            $obj = new Empleado();
            $obj->setIdEmp($_POST['txtIdEmpleado']);
            if ($obj->eliminar()) {
                echo "Registro eliminado";
            } else {
                echo "fallo al eliminar";
            }
        } else {
            echo "Debe seleccionar un ID";
        }
    }

    function mostrarRegistros()
    {
        $obj = new Empleado();
        $registros = $obj->mostrar();
        echo "<table border='1' align='left'>";

        // En una fila se establecen las columnas con sus nombres
        echo "<tr> 
                <td> Codigo </td>
				<td> Nombre </td>
				<td> Paterno </td>
				<td> Materno </td>
				<td> Pago por Hora </td>
				<td> Cargo </td>
				<td> Docente </td>
				<td> Administrativo </td>
				<td> * </td>
              </tr>";
        while ($fila = mysqli_fetch_object($registros)) {
            echo "<tr>";
            echo "<td>$fila->id_emp</td>";
            echo "<td>$fila->nombre</td>";
            echo "<td>$fila->paterno</td>";
            echo "<td>$fila->materno</td>";
            echo "<td>$fila->pagoHora</td>";
            echo "<td>$fila->cargo</td>";
            echo "<td>$fila->tipoD</td>";
            echo "<td>$fila->tipoA</td>";
            echo "<td>
                    <a href='frmEmpleado.php?
                        idemp=$fila->id_emp
                        &nombre=$fila->nombre
                        &paterno=$fila->paterno
                        &materno=$fila->materno
                        &pagoHora=$fila->pagoHora
                        &cargo=$fila->cargo
                        &tipoD=$fila->tipoD
                        &tipoA=$fila->tipoA'>
                        << 
                    </a>
                </td>";
        }
        echo "</table>";
    }

    //programa principal
    switch ($_POST['botones']) {
        case "Mostrar Datos": {
                mostrarRegistros();
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
        case "Guardar": {
                guardar();
            }
            break;
    }
    ?>

</body>

</html>