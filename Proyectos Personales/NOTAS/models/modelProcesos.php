<?php
require_once '../models/connection/conexion.php';
class Materia {
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

    public function crearMateria($materia,$semestre,$profesor) {
        try {
            $query = "INSERT INTO materia(nombre,id_semestre,id_profesor) VALUES(:nombre,:id_semestre,:id_profesor)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $materia);
        $stmt->bindParam(':id_semestre', $semestre);
        $stmt->bindParam(':id_profesor', $profesor);
        return $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
        
    }

    public function getProfesor(){
        try {
            $query = "SELECT u.id_usuario, u.nombre, u.apellido FROM usuario u LEFT JOIN rol r ON u.id_usuario = r.id_usuario WHERE r.rol = 'profesor'";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            //Obtengo los resultados.
            $profesor = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Registrar los resultados en los logs para depurar
            error_log("Datos del modelo: " . json_encode($profesor));
            
            // Devuelve los resultados en formato JSON
            return json_encode($profesor);
        } catch (PDOException $e) {
            error_log("Error en la consulta SQL: " . $e->getMessage());
            throw $e;
        }
    }

    
}

class Matricula{
    private $conexion;
    
    //constructor
    public function __construct() {
        try {
            $this->conexion = new Conexion();
            $this->conexion = $this -> conexion -> getConnexion();
            if ($this->conexion == null) {
            throw new Exception("Error en la conexión a la base de datos");
            }
            
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getEstudiantes(){
        try {
            $query = "SELECT u.id_usuario, u.nombre, u.apellido FROM usuario u LEFT JOIN rol r ON u.id_usuario = r.id_usuario WHERE r.rol = 'estudiante'";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            //Obtengo los resultados.
            $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Registrar los resultados en los logs para depurar
            //error_log("Datos del modelo:" . json_encode($estudiantes));
            
            // Devuelve los resultados en formato JSON
            return json_encode($estudiantes);
        } catch (PDOException $e) {
            error_log("Error en la consulta SQL:" . $e->getMessage());
            throw $e;
        }
    }

    public function getMaterias(){
        try {
            $query = "SELECT id_materia,nombre,id_semestre FROM materia";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            //Obtengo los resultados.
            $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Registrar los resultados en los logs para depurar
            //error_log("Datos del modelo:" . json_encode($materias));
            
            // Devuelve los resultados en formato JSON
            return json_encode($materias);
        } catch (PDOException $e) {
            error_log("Error en la consulta SQL:" . $e->getMessage());
            throw $e;
        }
    }

    public function getPeriodos(){
        try {
            $query = "SELECT id_periodo,n_periodo FROM periodo";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            //Obtengo los resultados.
            $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Registrar los resultados en los logs para depurar
            //error_log("Datos del modelo:" . json_encode($materias));
            
            // Devuelve los resultados en formato JSON
            return json_encode($materias);
        } catch (PDOException $e) {
            error_log("Error en la consulta SQL:" . $e->getMessage());
            throw $e;
        }
    }
    

    public function crearMatricula($estudiante,$materia,$semestre){
        try {
            $query = "INSERT INTO matricula(id_estudiante,id_materia,semestre) VALUES(:id_estudiante,:id_materia,:semestre)";
            $stmt = $this -> conexion -> prepare($query);
            $stmt->bindParam(':id_estudiante', $estudiante);
            $stmt->bindParam(':id_materia', $materia);
            $stmt->bindParam(':semestre', $semestre);
            return $stmt->execute();

        } catch (Exception $e) {
            throw $e;
        }

    }
}

class Notas{
    private $conexion;
    
    //constructor
    public function __construct() {
        try {
            $this->conexion = new Conexion();
            $this->conexion = $this -> conexion -> getConnexion();
            if ($this->conexion == null) {
            throw new Exception("Error en la conexión a la base de datos");
            }
            
        } catch (Exception $e) {
            throw $e;
        
        }
    }

    public function getEstudiantes(){
        try {
            $query = "SELECT u.id_usuario, u.nombre, u.apellido FROM usuario u LEFT JOIN rol r ON u.id_usuario = r.id_usuario WHERE r.rol = 'estudiante'";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            //Obtengo los resultados.
            $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Registrar los resultados en los logs para depurar
            //error_log("Datos del modelo:" . json_encode($estudiantes));
            
            // Devuelve los resultados en formato JSON
            return json_encode($estudiantes);
        } catch (PDOException $e) {
            error_log("Error en la consulta SQL:" . $e->getMessage());
            throw $e;
        }
    }

    public function getMaterias(){
        try {
            $query = "SELECT id_materia,nombre,id_semestre FROM materia";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            //Obtengo los resultados.
            $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Registrar los resultados en los logs para depurar
            //error_log("Datos del modelo:" . json_encode($materias));
            
            // Devuelve los resultados en formato JSON
            return json_encode($materias);
        } catch (PDOException $e) {
            error_log("Error en la consulta SQL:" . $e->getMessage());
            throw $e;
        }
    }

    public function getMateriasPorEstudinates( $id_estudiante) {
        try {
            $query = "SELECT m.id_materia, m.nombre FROM matricula AS mt INNER JOIN materia AS m ON mt.id_materia = m.id_materia WHERE mt.id_estudiante = :id_estudiante";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id_estudiante', $id_estudiante, PDO::PARAM_INT);
            $stmt->execute();
    
            $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode( $materias);
        } catch (PDOException $e) {
            error_log("Error en la consulta SQL:" . $e->getMessage());
            throw $e;
        }
    }
    

    public function getPeriodos(){
        try {
            $query = "SELECT id_periodo,n_periodo FROM periodo";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            //Obtengo los resultados.
            $materias = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Registrar los resultados en los logs para depurar
            //error_log("Datos del modelo:" . json_encode($materias));
            
            // Devuelve los resultados en formato JSON
            return json_encode($materias);
        } catch (PDOException $e) {
            error_log("Error en la consulta SQL:" . $e->getMessage());
            throw $e;
        }
    }
    
    

    public function crearNotas($estudianteId, $materiaId, $periodoId, $notaValue) {
        try {
            //Obtener id de la matricula.
            $idMatricula = $this-> obtenerIdMatricula($estudianteId,$materiaId);

            if(!$materiaId){
                throw new Exception("No se encontró la matrícula para el estudiante y materia");
            }

            $query = "INSERT INTO detalle_notas (id_matricula, id_periodo,nota) 
                      VALUES (:id_matricula,:id_periodo,:nota)";
            
            // // Aquí obtén el ID de la matrícula correspondiente al estudiante y materia
            // $idMatricula = $this->obtenerIdMatricula($estudianteId, $materiaId);
            
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id_matricula', $idMatricula, PDO::PARAM_INT);
            $stmt->bindParam(':id_periodo', $periodoId, PDO::PARAM_INT);
            $stmt->bindParam(':nota', $notaValue, PDO::PARAM_STR);
            
    
            return $stmt->execute(); // Devuelve verdadero si la inserción fue exitosa
        } catch (PDOException $e) {
            error_log("Error en la inserción de notas: " . $e->getMessage());
            throw $e;
        }
    }
    
    // Método para obtener el ID de matrícula del estudiante y materia
    private function obtenerIdMatricula($estudianteId, $materiaId) {
        $query = "SELECT id_matricula FROM matricula 
                  WHERE id_estudiante = :estudianteId AND id_materia = :materiaId";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':estudianteId', $estudianteId, PDO::PARAM_INT);
        $stmt->bindParam(':materiaId', $materiaId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Devuelve el ID de matrícula o null si no existe
        return $stmt->fetchColumn();
    }
    
}


?>