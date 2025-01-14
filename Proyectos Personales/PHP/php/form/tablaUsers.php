<?php
require_once('../../php/conexion/conexion.php');
//Mostrar los registro en la tabla

$sql = "SELECT u.id_usuario,u.nombre,u.username,l.fecha,l.hora FROM usuario u LEFT JOIN login l ON u.id_usuario = l.id_usuario";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los registros en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_usuario'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['hora'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr>
                <td colspan='5'>No se encontraron registros</td>
                </tr>";
}

?>