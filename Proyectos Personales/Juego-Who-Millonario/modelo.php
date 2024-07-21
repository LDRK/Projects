<?php


class Calculos {
    public function preguntas(){
        $num_ganador = rand(0,4);
        $preguntas = array(
            "¿Cuál es la capital de Francia?",
            "¿Cual es la capital de Colombia",
            "¿Cual es la capital de Ecuador",
            "¿Cual es la capital de España",
            "¿Cual es la capital de Rusia"
        );
        //Metodo 1
        $resPregunta1 = array("Paris","Bogotá","Quito","Madrid","Moscú");
        $resPregunta2 = array("Londres","Medellín","Guayaquil","Barcelona","San Petersburgo");
        $resPregunta3 = array("Madrid","Cali","Cuenca","Sevilla","Novosibirsk");
        $resPregunta4 = array("Barcelona","Monteria","Cordoba","Valencia","Lima");
        $resCorectas = array("Paris","Bogotá","Quito","Madrid","Moscú");
    
        $pregunta_enviar = $preguntas[$num_ganador];
        $resSend1 = $resPregunta1[$num_ganador];
        $resSend2 = $resPregunta2[$num_ganador];
        $resSend3 = $resPregunta3[$num_ganador];
        $resSend4 = $resPregunta4[$num_ganador];
        $resSendCorect = $resCorectas[$num_ganador];

        $datos = array(
             Array("pregunta"=> $pregunta_enviar,"respuesta1"=> $resSend1,"respuesta2"=> $resSend2,"respuesta3"=> $resSend3,"respuesta4"=> $resSend4,"respuestaCorect" => $resSendCorect),
        );
        return  $fileJson=json_encode($datos);
        /*
        //metodo 2
        $respuestas = array(
            array("Paris", "Londres", "Madrid","Barcelona"),
            array("Bogotá", "Medellín", "Cali","Monteria"),
            array("Quito", "Guayaquil", "Cuenca","Cordoba"),
            array("Madrid", "Barcelona", "Sevilla","Valencia"),
            array("Moscú", "San Petersburgo", "Novosibirsk","Lima")
        );
        //Metodo 2
        $pregunta_enviar = $preguntas[$num_ganador];
        $respuestas_enviar = $respuestas[$num_ganador];
        $datos = array(
          Array("pregunta"=> $pregunta_enviar,"respuesta"=> $respuestas_enviar)   

        );
        return  $fileJson=json_encode($datos);
        */
    }

   
}

?>
