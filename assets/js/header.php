
  
  <!-- Inicio del menu -->
  <?php 
  
  if(isset($_SESSION["usuarioActivo"]) && $_SESSION['usu_rol']==1){
   

  echo '
        <!--Nav-->
        <nav class="nav flex-nowrap">
            <div class="TitleContainer">
                <img src="./../assets/icons/logomt.png" class="Icon" loading="lazy">
                <p class="Title"><a class="navbar-brand" href="./../ecommerce/index.php">De Maderas Tablas</a></p>
            </div>
            <form class="ms-auto">
              <span class="text-dark" href="#">Bienvenido/a '.$_SESSION["usuarioActivo"].'</span>
                <a href="./../maderastablas/principal.php" >Administrar</a>
                <a href="./../assets/js/cerrarSesion.php" >Cerrar Sesion</a>
            </form>
        </nav>
        ';
    
  }else if(isset($_SESSION["usuarioActivo"]) && $_SESSION['usu_rol']>1){
    
      /* echo '
        <!--Nav-->
    <nav class="nav" id="nav">
        <div class="TitleContainer">
            <img src="./../assets/icons/logomt.jpg" class="Icon" loading="lazy">
            <p class="Title"><a class="navbar-brand" href="./../ecommerce/index.php"><a class="navbar-brand" href="./../ecommerce/index.php">De Maderas Tablas</a></a></p>
        </div>
        <form class="ms-auto">
        <span class="text-dark" href="#">Bienvenido/a '.$_SESSION["usuarioActivo"].'</span>
          <a href="./../maderastablas/principal.php" >Administrar</a>
          <a href="./../assets/js/cerrarSesion.php" >Cerrar Sesion</a>
        </form>
        <a href="#" class="NavButton" target="_blank">
            <img src="./../assets/icons/whatsapp.svg" class="NavButtonIcon" loading="lazy">
        </a>
    </nav>
    '; */
    echo '
    <!--Nav-->
    <nav class="nav flex-nowrap">
        <div class="TitleContainer">
            <img src="./../assets/icons/logomt.png" class="Icon" loading="lazy">
            <p class="Title"><a class="navbar-brand" href="./../ecommerce/index.php">De Maderas Tablas</a></p>
        </div>
        <a href="https://wa.me/573001112233?text=Hola!%20Estoy%20interesado%20en%20tu%20servicio" class="NavButton"
            target="_blank">
            <img src="./../assets/icons/whatsapp.svg" class="NavButtonIcon" loading="lazy">
        </a>
    </nav>';
   
  }else{
    /* echo '<!--Nav-->
    <nav class="nav" id="nav">
        <div class="TitleContainer">
            <img src="./../assets/icons/logomt.jpg" class="Icon" loading="lazy">
            <p class="Title"><a class="navbar-brand" href="./../ecommerce/index.php"><a class="navbar-brand" href="./../ecommerce/index.php">De Maderas Tablas</a></a></p>
        </div>
        <form class="ms-auto">
        <a href="./../maderastablas/index.php" class="btn btn-outline-success m-1">Iniciar Sesion</a>
        </form>
        <a href="#" class="NavButton" target="_blank">
            <img src="./../assets/icons/whatsapp.svg" class="NavButtonIcon" loading="lazy">
        </a>
    </nav>
  '; */

 
  echo '
        <!--Nav-->
        <nav class="nav flex-nowrap">
            <div class="TitleContainer">
                <img src="./../assets/icons/logomt.png" class="Icon" loading="lazy">
                <p class="Title"><a class="navbar-brand" href="./../ecommerce/index.php">De Maderas Tablas</a></p>
            </div>
            <form class="ms-auto">
              <a href="./../maderastablas/index.php" class="btn btn-outline-success m-1">Iniciar Sesion</a>
            </form>
            <a href="https://wa.me/573001112233?text=Hola!%20Estoy%20interesado%20en%20tu%20servicio" class="NavButton"
                target="_blank">
                <img src="./../assets/icons/whatsapp.svg" class="NavButtonIcon" loading="lazy">
            </a>
        </nav>
        
        ';

  }
  
      ?> 
  