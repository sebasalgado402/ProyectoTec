<!DOCTYPE html>
<html lang="en">

<head>
     
<meta charset="UTF-8">
    <?php 
    session_start();
    include("./../assets/js/funciones.php");
    comprobarUsuario();
    ?>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Link a mis estilos -->
    <link rel="stylesheet" href="./../assets/css/style.css"> 
    <!--Icono en la pestaña -->
    <link rel="shortcut icon" href="./../assets/icons/favicon.png">
    <!--Iconos de bootstrap  -->
    <!-- <link rel="stylesheet" href="./../bootstrapIcons/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--Estilos Bootstrap -->
    <!-- <link href="./../bootstrap/css/bootstrap.min.css" rel="stylesheet" > -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Estilos jQueryUI -->
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.structure.css">
    <link rel="stylesheet" href="./../jQueryUI/jquery-ui.theme.css">

   
    <title>Balance</title>
</head>

<body>
    <?php include ('./../assets/js/header.php'); ?>
        <!--Balance Calculator-->
        <form class="main-balance">
            <p class="Title-balance">Calculo de Balance</p>
            <div class="PercentageContainer-balance PercentageContainer_Text-balance">
                <p class="PercentageContainer_Text-balance" id="recibeBalance">$0</p>
            </div>
            <div class="FormContainer-balance">
                <div class="InputContainer-balance">
                    <label for="FechaIncio">Ingrese la fecha de Inicio:</label>
                    <input type="text" id='date_Inicio-balance'  class="Input-balance" required>
                </div>
                <div class="InputContainer-balance">
                    <label for="FechaFin">Ingrese la fecha de Finalización:</label>
                    <input type="text" id='date_Final-balance' class="Input-balance" required>
                </div>
            </div>
            <input type="submit" id="btn_Calcular-balance" class="ButtonCalcular-balance" value="Calcular el Balance">
        </form>
        <!--Tabla Gastos-->
        <div class="container-fluid col-4">
            <table  class="table table-hover" >
                <thead class="table-dark ">
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Gasto</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="Tabla-Gastos__Row-Content">1</td>
                        <td scope="Tabla-Gastos__Row-Content">Comida</td>
                        <td scope="Tabla-Gastos__Row-Content">$20</td>
                        <td scope="Tabla-Gastos__Row-Content">2023-05-10</td>
                    </tr>
                    <tr>
                        <td scope="Tabla-Gastos__Row-Content">2</td>
                        <td scope="Tabla-Gastos__Row-Content">Gasolina</td>
                        <td scope="Tabla-Gastos__Row-Content">$40</td>
                        <td scope="Tabla-Gastos__Row-Content">2023-05-08</td>
                    </tr>
                    <tr>
                        <td scope="Tabla-Gastos__Row-Content">3</td>
                        <td scope="Tabla-Gastos__Row-Content">Renta</td>
                        <td scope="Tabla-Gastos__Row-Content">$800</td>
                        <td scope="Tabla-Gastos__Row-Content">2023-05-01</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<!--Importa librería jquery -->
    <!-- <script src="./../jQuery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!--Importa librería jQueryUI -->
    <script src="./../jQueryUI/jquery-ui.min.js"></script>
    <!--Importa librería boostrap -->
    <!-- <script src="./../bootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Importo javascript propio -->
    <script src="./../assets/js/functions.js"></script>
    <!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    -->
</html>