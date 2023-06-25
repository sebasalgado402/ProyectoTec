<?php
    $nombreBD = 'barredadb';
    //$nombreBD = 'id19677335_barredadb';
       /*  if(!$conexion || !$conexionIp){
            echo "no se ha conectado a la base de datos";
        }
 */
        
    try {
        $conexion = mysqli_connect("localhost", "root", "","$nombreBD");
       //   $conexion = mysqli_connect("192.168.1.16", "wsserver@192.168.2.14", "server23","$nombreBD");
        
    } catch(\Throwable $th) {
    
        try {
            $conexionIp = mysqli_connect("192.168.1.234", "root", "","$nombreBD");
           // $conexion = mysqli_connect("192.168.1.18", "wsserver@192.168.2.14", "server23","$nombreBD");
        
        } catch(\Throwable $th) {
            echo 'Error al conectar a ambas bases de datos: ' . $e->getMessage();
        }
    }
   
        /* 
           $host = "localhost";
            $username="id19677335_barredadb";
            $nombreBD = 'id19677335_barredadb';
            $conexion = mysqli_connect("localhost", "id19677335_admin", "Proyecto(utu)123","$nombreBD");
                if(!$conexion){
                    echo "no se ha conectado a la base de datos";
                }
         */
       
?>