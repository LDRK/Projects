<?php
require_once '../models/connection/conexion.php';


class Notas {
    private $conexion;
    
    //constructor
    public function __construct() {
        try {
            $this->conexion = new Conexion();
            $this->conexion = $this -> conexion ->getConnexion();

            if ($this->conexion == null) {
            throw new Exception("Error en la conexión a la base de datos");
            }
        } catch (Exception $e) {
            throw $e;
        }
        
    }

    public function consolidado(){
        try {
            $query = "SELECT u.id_usuario, u.nombre, u.apellido, m.nombre AS materia, c.periodo_1,c.periodo_2,c.periodo_3 FROM usuario u JOIN matricula mt ON u.id_usuario = mt.id_estudiante JOIN materia m ON mt.id_materia = m.id_materia JOIN consolidado c ON mt.id_matricula = c.id_matricula";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();
            $consolidado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return  json_encode($consolidado);
        } catch (PDOException $e) {
            error_log("Error en la consulta SQL:". $e->getMessage());
            throw $e;
        }
    }

    public function getNotasEstudiante($id_usuario) {
        try {
            $query = "SELECT m.nombre AS materia, dn.nota, dn.id_periodo FROM detalle_notas dn JOIN matricula ma ON dn.id_matricula = ma.id_matricula JOIN materia m ON ma.id_materia = m.id_materia WHERE ma.id_estudiante = :id_usuario";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $detalleNotas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($detalleNotas);
        } catch (Exception $e) {
            error_log("Error en getNotasEstudiante: " . $e->getMessage());
            throw $e;
        }
       
    }
    
}
?>