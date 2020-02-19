<?php
/* Se crea la funcion para pasar el nombre del mes al numero que corresponde en su representacion */
if ( ! function_exists('month_name_to_number')){
    function month_name_to_number($mes){
        $mes = strtolower($mes);
        $meses = array(
            "enero" => "01",
            "febrero" => "02",
            "marzo" => "03",
            "abril" => "04",
            "mayo" => "05",
            "junio" => "06",
            "julio" => "07",
            "agosto" => "08",
            "septiembre" => "09",
            "octubre" => "10",
            "noviembre" => "11",
            "diciembre" => "12"
        );
        
        return $meses[$mes];
    }
}

/* Se crea la funcion para contar el numero de dias entre dos fechas */
if ( ! function_exists('between_day_count')){
    function between_day_count($fecha_menor, $fecha_mayor){
        $fecha1 = new DateTime($fecha_menor);
        $fecha2 = new DateTime($fecha_mayor);
        $resultado = $fecha1->diff($fecha2,true);

        return $resultado->format('%a');
    }
}