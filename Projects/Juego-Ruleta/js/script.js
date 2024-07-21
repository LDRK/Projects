$(document).ready(function(){


    jugadoresArray_js();
    
    //ocultar tabla
    
    $("#tabla").hide();

    $("#btn_jugar").click(function(){
        //capturar las variables
        var opc1 = $('#opc1').val();
        var opc2 = $('#opc2').val();
        var opc3 = $('#opc3').val();
        var selct_jugador = $('#jugador').val();
        
        
        //Declaracion de variables
        var valid = true;
        var errorMessage = '';

        // Validar campos vacíos
        if (!opc1) {
            errorMessage += 'La opcion Nº1 es requerida.\n';
            valid = false;
        }
        if (!opc2) {
            errorMessage += 'La opcion Nº2 es requerida.\n';
            valid = false;
        }
        if (!opc3) {
            errorMessage += 'La opcion Nº3 es requerida.\n';
            valid = false;
        }
        if (selct_jugador == 0) {
            errorMessage += 'Seleccione el jugador.\n';
            valid = false;
        }
        // Valida si hay valores negativos o mayores a 36
        if (!nums_negativos_mayores(opc1, opc2, opc3)) {
            return; // Si hay algún error, no continuar
        }

        //Validar numeros decimales
        /* if(!nums_decimals(opc1,opc2,opc3)){
            return;
        }*/

        // Si hay algún campo vacío, mostrar el mensaje de error y no continuar
        if (!valid) {
            swal("Error", errorMessage, "error");
            return;
        }
        

        //valores negativos y mayores
        nums_negativos_mayores();
        //calcular juego funcion
        calcularJuego();

        $('#result-juego').show();
        $('#tabla').hide();
        


        
    });

    $("#btn_ver_hist").click(function(){
       //mostrar la tabla
       $("#tabla").show();
       $('#result-juego').hide();
    });
   
   });

   function nums_negativos_mayores(opc1, opc2, opc3) {
    if (opc1 < 0 || opc2 < 0 || opc3 < 0) {
        swal("Error, no puedes introducir valores negativos");
        return false; // Devuelve false si hay algún valor negativo
    } else if (opc1 > 36 || opc2 > 36 || opc3 > 36) {
        swal("Error, no puedes introducir valores mayores a 36");
        return false; // Devuelve false si hay algún valor mayor a 36
    }
    return true; // Devuelve true si todos los valores son válidos
}

/* function nums_decimals(){
    if(opc1 != parseInt || opc2 != parseInt || opc3 != parseInt ){
        swal("Error, no puedes meter numeros decimales")
    }
    
} */



   function jugadoresArray_js(){
        let jugadores = new Array ("Leonardo","Pedro","Alvaro");
        for (let i = 0; i < jugadores.length; i++) {
            $("#jugador").append("<option value='"+jugadores[i]+"'>"+jugadores[i]+"</option>");
        }
    }

    function jugadoresArray() {
        $.ajax({
        beforeSend: function() {
        },
        url: "control.php?type=2",
        type: "post",
        data: $('#formulario').serialize(),
        success: function(data2json) {
        try {
            var json_obj = $.parseJSON(data2json); /* transformando el dato de llegado en Json de
            Jquery */
            for(var i in json_obj){
                var jugadores = "<option value='"+json_obj[i].nom+"'>"+json_obj[i].nom+"</option>";
                $("#jugador").append(jugadores);
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
        function calcularJuego() {
            $.ajax({
            beforeSend: function() {
            },
            url: "control.php?type=3",
            type: "post",
            data: $('#formulario').serialize(),
            success: function(data2json) {
            try {
            var json_obj = $.parseJSON(data2json); /* transformando el dato de llegado en Json de
            Jquery */
            var datos_tabla ="";
            var numero_win = 0;
            var resultado = 0;
            var penitencia_premio = '';

            for(var i in json_obj){
                    datos_tabla ="<tr>"+
                    "<td>"+json_obj[i].id+"</td>"+
                    "<td>"+json_obj[i].jugador+"</td>"+
                    "<td>"+json_obj[i].opc1+"</td>"+
                    "<td>"+json_obj[i].opc2+"</td>"+
                    "<td>"+json_obj[i].opc3+"</td>"+
                    "<td>"+json_obj[i].num_ganador+"</td>"+
                    "<td>"+json_obj[i].estado+"</td>"+
                    "<td>"+json_obj[i].premio+"</td>"+
                    "<td><button type='button' onclick=\'verPenitencia("+json_obj[i].num_ganador+");\'class='btn btn-secondary btn-sm'>Ver Detalle</button></td>"+
                    "</tr>";
                    $("#tabla").append(datos_tabla);
                   
                    numero_win = json_obj[i].num_ganador;
                    resultado = json_obj[i].estado;
                    penitencia_premio = json_obj[i].premio;
                    
                }

            //mostrar los inputs nuevos

            $('#num-win').val(numero_win);
            $('#result').val(resultado);
            $('#pen-pre').val(penitencia_premio);
            } catch (err1) {
            }
            },
            error: function(jqXHR, estado, error) {
            },
            complete: function(jqXHR, estado2) {
            },
            timeout: 90000
            });
            } 

            function verPenitencia(num_penitencia){

                let penitencia =["Hablar con acento durante 5 minutos","Cantar","Recitar el abecedario alrevés","Llorar como loro",
                "contar un chiste","rebusnar como caballo","Chiflar ni loco","Cantar Rock",
                "Caminar en una sola pierna","Cantar bolero","Bailar con compañero(a)",
                "Hacer un piropo a tu compañero(a)",
                "Imitar a un animal durante 30 segundos","Decir algo que te gusta o aprecias de cadapersona presente",
                "Hacer una mueca graciosa","Bailar con los ojos cerrados",
                "Compartir una anécdota vergonzosa","Cantar","Bailar","Llorar como loro",
                "contar un chiste","rebusnar","Chiflar","Toser",
                "Inventar una coreografía en el momento",
                "Hablar como un robot durante 2 minutos","Saltar bailando rock",
                "Cantar Vallenato","Caminar en una sola Pierna",
                "Cantar Ranchera","Escribir el nombre con la izquierda",
                "Contar una anecdota","Hacer como gallina",
                "Hacer como burro","Hacer como loro","Enamorar a tu compañero(a) cercano"];
                    
                let pen = penitencia[num_penitencia];
                $("#ver_detalle").modal('show');
                $("#penitencia").text(pen)
                }