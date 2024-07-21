<?php
    class Calculos{
        public function calcular(){
            $nh = $_POST['nh'];
            $vh = $_POST['vh'];
            $salario = $nh*$vh;
            $dato['rta']=$salario;
            return json_encode($dato);
            }
        public function jugadores(){
            $i=0;
            $jugadores = array(
            Array("id"=>1,"nom"=>"Leonardo"),
            Array("id"=>2,"nom"=>"Mateo"),
            Array("id"=>3,"nom"=>"Carlos"),
            Array("id"=>4,"nom"=>"Luis"),
            );
            return $rta=json_encode($jugadores);
            }
        public function calcularJuego(){
            $i=0;
            $opc1 = $_POST['opc1'];
            $opc2 = $_POST['opc2'];
            $opc3 = $_POST['opc3'];
            $jugador = $_POST['jugador'];
            $num_ganador = rand(0,36);
            if($opc1==$num_ganador || $opc2==$num_ganador || $opc3==$num_ganador){
            $estado="Felicidades a Ganado un premio";
            $premio="Nota 5.0";
            }else{
                $estado="!!Perdiste!!";
                $premio="Pagar una penitencia";
                }
                $datos = array(
                Array("id"=>"1","opc1"=>$opc1,"opc2"=>$opc2,"opc3"=>$opc3,"jugador"=>$jugador,"premio"=>$premio,"estado"=>$estado,"num_ganador"=>$num_ganador)
                );
                return $rta=json_encode($datos);
                }
                }