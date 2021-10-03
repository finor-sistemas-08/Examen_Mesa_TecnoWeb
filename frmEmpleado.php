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
                    <input name="txtIdEmpleado" type="hidden" value="" />
                </td>
            </tr>
            <tr>
                <td width="100">Nombres</td>
                <td width="125">
                    <input name="txtNombre" type="text" value="" " />
				</td>
			</tr>
			<tr>
				<td width=" 100">Apellido Paterno
                </td>
                <td width="125">
                    <input name="txtPaterno" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td width="100">Apellido Materno</td>
                <td width="125">
                    <input name="txtMaterno" type="text" value="" />
                </td>
            </tr>

            <tr>
                <td width="100">Pago por Hora</td>
                <td width="125">
                    <input name="txtPagoHora" type="number" value="0" />
                </td>
            </tr>
            <tr>
                <td width="100">Cargo</td>
                <td width="125">
                    <input name="txtCargo" type="text" value="" />
                </td>
            </tr>
            <tr>
                <td width="100">Tipo Docente</td>
                <td width="125">
                    <input name="chbxTipoD" type="checkbox" />
                </td>
            </tr>
            <tr>
                <td width="100">Tipo Administrativo</td>
                <td width="125">
                    <input name="chbxTipoA" type="checkbox" />
                </td>
            </tr>
            <tr>
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

    // Verificar el checked de cada checkbox
    // echo "El valor de docente";
    // echo "<br>";
    // print($_POST['chbxTipoD']);
    // echo "<br>";
    // echo "El valor de administrativo";
    // echo "<br>";
    // print($_POST['chbxTipoA']);
    // echo "<br>";

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
        }
        echo "</table>";
    }

    //programa principal
    switch ($_POST['botones']) {
        case "Mostrar Datos": {
                mostrarRegistros();
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