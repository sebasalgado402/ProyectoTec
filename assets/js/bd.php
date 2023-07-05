<?php
    set_time_limit(0); // Ignorar el tiempo de ejecución máximo

    $nombreBD = 'barredadb';
    $tiempoEspera = 0.2;
    
    $context = stream_context_create([
        'socket' => [
            'connect_timeout' => $tiempoEspera, // Establecer tiempo de espera en segundos
        ],
    ]);
   // $conn = @stream_socket_client("localhost", $errno, $errstr, $tiempoEspera, STREAM_CLIENT_CONNECT, $context);
    $conexion = @stream_socket_client("tcp://192.168.1.10:3306", $errno, $errstr, $tiempoEspera, STREAM_CLIENT_CONNECT, $context);
    
    if ($conexion === false) {
        // La conexión no se pudo establecer dentro del tiempo de espera
        $mensajeError = "Error al conectar a la base de datos.";
        
    } else {
        
        //$conexion = mysqli_connect("192.168.2.18", "wsserver2", "tabla23", $nombreBD);
        $conexion = mysqli_connect("localhost", "root", "", $nombreBD);
        // La conexión se estableció correctamente
        // Realizar las operaciones necesarias con la conexión a la base de datos
        // ...
    }
    
    if (isset($mensajeError)) {
        $conexion = @stream_socket_client("tcp://192.168.1.16:3306", $errno, $errstr, $tiempoEspera, STREAM_CLIENT_CONNECT, $context);
        if ($conexion) {
           
            //$conexion = mysqli_connect("192.168.2.16", "wsserver2", "tabla23", $nombreBD);
            $conexion = mysqli_connect("localhost", "root", "", $nombreBD);
        }else{
            echo 'no se conecto a nada';
        }
    }
    

    //servidores
    /* set_time_limit(0); // Ignorar el tiempo de ejecución máximo

    $nombreBD = 'barredadb';
    $tiempoEspera = 0.2;
    
    $context = stream_context_create([
        'socket' => [
            'connect_timeout' => $tiempoEspera, // Establecer tiempo de espera en segundos
        ],
    ]);
   // $conn = @stream_socket_client("localhost", $errno, $errstr, $tiempoEspera, STREAM_CLIENT_CONNECT, $context);
    $conexion = @stream_socket_client("tcp://192.168.2.18:3306", $errno, $errstr, $tiempoEspera, STREAM_CLIENT_CONNECT, $context);
    
    if ($conexion === false) {
        // La conexión no se pudo establecer dentro del tiempo de espera
        $mensajeError = "Error al conectar a la base de datos.";
        
    } else {
        echo 'se conecto 1';
        $conexion = mysqli_connect("192.168.2.18", "wsserver2", "tabla23", $nombreBD);
        // La conexión se estableció correctamente
        // Realizar las operaciones necesarias con la conexión a la base de datos
        // ...
    }
    
    if (isset($mensajeError)) {
        $conexion = @stream_socket_client("tcp://192.168.2.16:3306", $errno, $errstr, $tiempoEspera, STREAM_CLIENT_CONNECT, $context);
        if ($conexion) {
            echo 'se conecto 2';
            $conexion = mysqli_connect("192.168.2.16", "wsserver22", "tabla23", $nombreBD);
        }else{
            echo 'no se conecto a nada';
        }
    }
     */
?>


   
