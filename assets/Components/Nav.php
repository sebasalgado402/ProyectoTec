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
            <!--Categories List-->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle Nav-DropdownButton" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Categorias
                </button>
                <ul class="dropdown-menu border border-dark Nav-DropMenu">
                    <li><a class="dropdown-item" href="#">Cajas</a></li>
                    <li><a class="dropdown-item" href="#">Descuentos</a></li>
                    <li><a class="dropdown-item" href="#">Estanterias</a></li>
                    <li><a class="dropdown-item" href="#">Llaveros</a></li>
                    <li><a class="dropdown-item" href="#">Marcos</a></li>
                    <li><a class="dropdown-item" href="#">Materas</a></li>
                    <li><a class="dropdown-item" href="#">Mesas</a></li>
                    <li><a class="dropdown-item" href="#">Otros Accesorios</a></li>
                    <li><a class="dropdown-item" href="#">Percheros</a></li>
                    <li><a class="dropdown-item" href="#">Pinos Navidad</a></li>
                    <li><a class="dropdown-item" href="#">Sillas</a></li>
                    <li><a class="dropdown-item" href="#">Tablas y Cuencos</a></li>
                </ul>
            </div>
            <input type="search" name="txt_search" id="txt_search" class="Nav-InputSearch" placeholder="Buscar: ">
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
                <!--Categories List-->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle Nav-DropdownButton" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorias
                    </button>
                    <ul class="dropdown-menu border border-dark Nav-DropMenu">
                        <li><a class="dropdown-item" href="#">Cajas</a></li>
                        <li><a class="dropdown-item" href="#">Descuentos</a></li>
                        <li><a class="dropdown-item" href="#">Estanterias</a></li>
                        <li><a class="dropdown-item" href="#">Llaveros</a></li>
                        <li><a class="dropdown-item" href="#">Marcos</a></li>
                        <li><a class="dropdown-item" href="#">Materas</a></li>
                        <li><a class="dropdown-item" href="#">Mesas</a></li>
                        <li><a class="dropdown-item" href="#">Otros Accesorios</a></li>
                        <li><a class="dropdown-item" href="#">Percheros</a></li>
                        <li><a class="dropdown-item" href="#">Pinos Navidad</a></li>
                        <li><a class="dropdown-item" href="#">Sillas</a></li>
                        <li><a class="dropdown-item" href="#">Tablas y Cuencos</a></li>
                    </ul>
                </div>
                <input type="search" name="txt_search" id="txt_search" class="Nav-InputSearch" placeholder="Buscar: ">
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
                <!--Categories List-->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle Nav-DropdownButton" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorias
                    </button>
                    <ul class="dropdown-menu border border-dark Nav-DropMenu">
                        <li><a class="dropdown-item" href="#">Cajas</a></li>
                        <li><a class="dropdown-item" href="#">Descuentos</a></li>
                        <li><a class="dropdown-item" href="#">Estanterias</a></li>
                        <li><a class="dropdown-item" href="#">Llaveros</a></li>
                        <li><a class="dropdown-item" href="#">Marcos</a></li>
                        <li><a class="dropdown-item" href="#">Materas</a></li>
                        <li><a class="dropdown-item" href="#">Mesas</a></li>
                        <li><a class="dropdown-item" href="#">Otros Accesorios</a></li>
                        <li><a class="dropdown-item" href="#">Percheros</a></li>
                        <li><a class="dropdown-item" href="#">Pinos Navidad</a></li>
                        <li><a class="dropdown-item" href="#">Sillas</a></li>
                        <li><a class="dropdown-item" href="#">Tablas y Cuencos</a></li>
                    </ul>
                </div>
                <input type="search" name="txt_search" id="txt_search" class="Nav-InputSearch" placeholder="Buscar: ">
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
