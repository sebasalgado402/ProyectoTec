<?php


if (isset($_SESSION["usuarioActivo"]) && $_SESSION['usu_rol'] == 1) {


    echo '
        <!--Nav-->
    <nav class="nav flex-nowrap">
        <div class="Nav_Menu-Open">
            <img src="./../assets/icons/Menu.png" class="LoginButton__Icon" />
        </div>
        <div class="TitleContainer">
        <a class="navbar-brand" href="./../ecommerce/index.php"><img src="./../assets/icons/icon.png" class="Icon" loading="lazy"></a>
        </div>
        <div class="Nav-Content-Container">

            
        </div>
        <form class="ms-auto">
        <span class="text-dark" href="#">Bienvenido/a ' . $_SESSION["usuarioActivo"] . '</span>
          <a href="./../maderastablas/principal.php" >Administrar</a>
          <a href="./../assets/js/cerrarSesion.php" >Cerrar Sesion</a>
      </form>
    </nav>
              
              ';
} else if (isset($_SESSION["usuarioActivo"]) && $_SESSION['usu_rol'] > 1) {

    /*  <!--Login Button-->
        <div class="NavButtons_Container">
            <a href="#" class="LoginButton">
                <img src="./../assets/icons/user.svg" class="LoginButton__Icon" loading="lazy">
            </a>
        </div> */

    echo '<!--Nav-->
        <nav class="nav flex-nowrap">
            <div class="Nav_Menu-Open">
                <img src="./../assets/icons/Menu.png" class="LoginButton__Icon" />
            </div>
            <div class="TitleContainer">
            <a class="navbar-brand" href="./../ecommerce/index.php"><img src="./../assets/icons/icon.png" class="Icon" loading="lazy"></a>
            </div>
            <div class="Nav-Content-Container">
                
                
            </div>
            <!--Login Button-->
        <div class="NavButtons_Container">
            <a href="./../maderastablas/index.php"" class="LoginButton">
                <img src="./../assets/icons/user.svg" class="LoginButton__Icon" loading="lazy">
            </a>
        </div>
        </nav>
        ';
   
    
} else {
    


    echo '<!--Nav-->
        <nav class="nav flex-nowrap">
            <div class="Nav_Menu-Open">
                <img src="./../assets/icons/Menu.png" class="LoginButton__Icon" />
            </div>
            <div class="TitleContainer">
            <a class="navbar-brand" href="./../ecommerce/index.php"><img src="./../assets/icons/icon.png" class="Icon" loading="lazy"></a>
            </div>
            <div class="Nav-Content-Container">
                
                
            </div>
            <!--Login Button-->
        <div class="NavButtons_Container">
            <a href="./../maderastablas/index.php" class="LoginButton">
                <img src="./../assets/icons/user.svg" class="LoginButton__Icon" loading="lazy">
            </a>
        </div>
        </nav>
        ';
}