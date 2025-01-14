<?php
require_once('../../php/conexion/conexion.php');

//Mostrar los registro en la tabla

$sql = "SELECT * FROM persona";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los registros en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='" . $row['foto'] . "' alt='Foto' style='width:50px;height:50px;'></td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido_paterno'] . "</td>";
        echo "<td>" . $row['apellido_materno'] . "</td>";
        echo "<td>" . $row['correo'] . "</td>";
        echo "<td>" . $row['departamento'] . "</td>";
        echo "<td>
            <form id='' action='' method='post' class='btnModificar'>
                <input type='hidden' value='$row[id_persona]' name='idPersona'>
                <button type='submit' class='btn btn-warning btn-sm' data-bs-toggle='modal'
                          name='btnBuscarR' value='buscar'>Modificar</button>
            </form>
            <form action='../../php/form/registroPersonal.php' method='post' class='btnEliminar'>
               <input type='hidden' value='$row[id_persona]' name='idPersona'>
               <button type='submit' class='btn btn-danger btn-sm' name='iEliminar'>Eliminar</button>
            </form>
                </td>";
        echo "</tr>";
    }
} else {
    echo "<tr>
                <td colspan='6'>No se encontraron registros</td>
                </tr>";
}

?>