<?php

function dias_restantes($fecha_final) { 
    $fecha_actual = date("Y-m-d"); 
    $s = strtotime($fecha_final)-strtotime($fecha_actual); 
    $d = intval($s/86400); 
    return "Días restantes hasta la fecha $fecha_final: $d DIAS"; 
}

function fecha_actual() { 
    $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"); 
    $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", 
"Septiembre", "Octubre", "Noviembre", "Diciembre"); 
    $year_now = date ("Y"); 
    $month_now = date ("n"); 
    $day_now = date ("j"); 
    $week_day_now = date ("w"); 
    $date = $week_days[$week_day_now] . ", " . $day_now . " de " . 
    $months[$month_now] . " de " . $year_now;
    echo $date; 
} 

$zona = "America/Argentina/Buenos_Aires";
date_default_timezone_set($zona);

if(isset($_GET['opcion'])) {

    $opcion = $_GET['opcion'];

    if ($opcion == 1) {
        
        $prueba = date("Y/m/d");
        
        if ($prueba < "2023/11/01") {
            echo "Sitio web en mantenimiento hasta el 01/11/2023";
        } else {
             echo "Bienvenido a nuestro sitio!";
        }

    } elseif ($opcion == 2) {

        $fecha = getdate();
        $resultado = "Día: " . $fecha["mday"] . "<br/>" .
                     "Mes: " . $fecha["mon"] . "<br/>" .
                     "Año: " . $fecha["year"] . "<br/>" .
                     "Hora: " . $fecha["hours"] . "<br/>" .
                     "Minutos: " . $fecha["minutes"] . "<br/>" .
                     "Segundos: " . $fecha["seconds"];
        echo $resultado;

    } elseif ($opcion == 3){

        if(isset($_GET['fecha'])){
            $fecha = $_GET['fecha'];
            echo dias_restantes($fecha); 
        }
        
    } elseif ($opcion == 4){
        
        fecha_actual(); 
        
    } elseif ($opcion == 5){
        $dia = $_GET['dia'];
        $mes = $_GET['mes'];
        $año = $_GET['año'];

        if(isset($_GET['dia']) && isset($_GET['mes']) && isset($_GET['año'])) {

            $dia = $_GET['dia'];
            $mes = $_GET['mes'];
            $año = $_GET['año'];

            if (checkdate($mes, $dia, $año)) { 
                echo "<p>El día $dia/$mes/$año existe.</p>"; 
            } else { 
                echo "<p>El día $dia/$mes/$año no existe.</p>"; 
            }

        }

    } else {
        echo "Opción no válida xd";
    }
}

?>