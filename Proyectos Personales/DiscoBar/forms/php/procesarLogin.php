<?php
    
    if(isset($_POST['iIngresar'])){
        $usuario = $_POST['usuario'];
        $pswUsu = $_POST['password'];
        
        $sql = mysqli_query($conexion, "SELECT id_usuario FROM usuario WHERE id_usuario='$usuario' AND contrasena = $pswUsu");
        if ($usuario = 'id_usuario' and $pswUsu = 'contrasena') {
            header('location:welcome.html');
            
        } else {
            echo "Error de autenticación";
        }
        

        
    }else{
        
    }
    
?>