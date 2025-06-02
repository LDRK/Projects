<?php
require_once '../models/connection/conexion.php';

class Usuario
{
    private $conexion;

    //constructor
    public function __construct()
    {
        try {
            $this->conexion = new Conexion();
            $this->conexion = $this->conexion->getConnexion();

            if ($this->conexion == null) {
                throw new Exception("Error en la conexión a la base de datos");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //Metodo para Crear Usuario

    public function crearUsuario($id_usuario, $nombre, $apellido, $username, $contrasena, $rol)
    {
        try {
            // Iniciar una transacción para asegurar que ambas inserciones (usuario y rol) se realicen juntas
            $this->conexion->beginTransaction();
            $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);
            // Insertar el usuario en la base de datos
            $queryUser = "INSERT INTO usuario(id_usuario,nombre,apellido,username,contrasena) VALUES (:id_usuario,:nombre,:apellido,:username,:contrasena)";

            $stmtUser = $this->conexion->prepare($queryUser);
            $stmtUser->bindParam(":id_usuario", $id_usuario);
            $stmtUser->bindParam(":nombre", $nombre);
            $stmtUser->bindParam(":apellido", $apellido);
            $stmtUser->bindParam(":username", $username,);
            $stmtUser->bindParam(":contrasena", $hashedPassword);
            $stmtUser->execute();

            $queryRol = "INSERT INTO rol(id_usuario,rol) VALUES (:id_usuario,:rol)";

            $stmtRol = $this->conexion->prepare($queryRol);
            $stmtRol->bindParam(":id_usuario", $id_usuario);
            $stmtRol->bindParam(":rol", $rol);
            $stmtRol->execute();

            // Si ambas inserciones fueron exitosas, confirmamos la transacción
            $this->conexion->commit();

            return true; //exito de la operacion.

        } catch (PDOException $e) {
            // Si hay algún error, revertimos la transacción
            $this->conexion->rollBack();
            throw $e;
        }
        //return json_encode();
    }


    //Metodo para modificar Usuario
    public function modificarUsuario($id_usuario, $nombre, $apellido, $username)
    {
        try {
            $query = "UPDATE usuario SET nombre = :nombre, apellido = :apellido, username = :username WHERE id_usuario = :id";

            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":id", $id_usuario);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->bindParam(":username", $username);


            return $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    //Metodo para eliminar Usuario
    public function eliminarUsuario($id_usuario)
    {
        try {
            $query = "DELETE FROM usuario WHERE id_usuario = :id";

            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":id", $id_usuario);

            return $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    // Método para verificar las credenciales del usuario
    // Método para verificar las credenciales del usuario
    public function login($usuario, $contrasena)
    {
        try {
            // Consulta SQL para verificar las credenciales
            $query = "SELECT u.id_usuario, u.contrasena, r.rol FROM usuario u JOIN rol r ON u.id_usuario = r.id_usuario WHERE u.username = :username";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(":username", $usuario);
            $stmt->execute();

            // Si se encuentra el usuario
            if ($stmt->rowCount() === 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verificar la contraseña
                if (password_verify($contrasena, $row['contrasena'])) {
                    return [
                        'id_usuario' => $row['id_usuario'],
                        'rol' => $row['rol']
                    ];  // Credenciales correctas y rol del usuario
                }
            }
        } catch (PDOException $e) {
            throw $e;
        }

        return false;  // Credenciales incorrectas
    }

    public function getUsuarios()
    {
        try {
            $query = "SELECT u.id_usuario,u.nombre,u.apellido,u.username,r.rol FROM usuario u JOIN rol r ON u.id_usuario = r.id_usuario WHERE r.rol IN ( 'profesor', 'estudiante');";
            $stmt = $this->conexion->prepare($query);
            $stmt->execute();

            //Obtengo los resultados.
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Registrar los resultados en los logs para depurar
            error_log("Datos del modelo: " . json_encode($usuarios));

            // Devuelve los resultados en formato JSON
            return json_encode($usuarios);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getProfesor()
    {
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

    public function getEstudiantes()
    {
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
}