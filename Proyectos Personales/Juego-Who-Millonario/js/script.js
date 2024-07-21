$(document).ready(function() {
    $('#btnJugar').click(function() {
      data();  
        });
    });




function data() {
    $.ajax({
        beforeSend: function() {
        },
        url: "control.php?type=2",
        type: "post",
        data: $('#formulario').serialize(),
        success: function(data2json) {
            
        try {
            var json_obj = $.parseJSON(data2json);
            for(var i in json_obj){
                $("#pregunta").text(json_obj[i].pregunta);
                $("#respuesta-A").text(json_obj[i].respuesta1);
                $("#respuesta-B").text(json_obj[i].respuesta2);
                $("#respuesta-C").text(json_obj[i].respuesta3);
                $("#respuesta-D").text(json_obj[i].respuesta4);
                console.log(json_obj[i].respuestaCorect)
                
            }
            

           
        } catch (err1) {
        }
        },
        error: function(jqXHR, estado, error) {
        },
        complete: function(jqXHR, estado2) {
        // console.log("del complete tipo 3"+estado2);
        },
        timeout: 90000
        });
        }


    function verificarRespuesta(){
        $.ajax({
            beforeSend: function() {
                },
                url: "control.php?type=2", 
                type: "post",
                data: $('#formulario').serialize(),
                success: function(data2json) {
                    try {
                        var json_obj = $.parseJSON(data2json); /* transformando el dato de llegado
                        en Json de Jquery */
                        
                         
                                } catch (err1) {
                                    }
                                    },
                                    error: function(jqXHR, estado, error) {
                                        },
                                        complete: function(jqXHR, estado2) {
                                           // console.log("del complete tipo 2"+estado2);
                                            },
                                            timeout: 90000
                                            });
                                            }

    
            
      






