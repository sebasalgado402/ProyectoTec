
  
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
            <form class="ms-auto d-flex flex-column">
              <span class="text-dark d-flex flex-column" href="#">Bienvenido/a '.$_SESSION["usuarioActivo"].'</span>
                <a href="./../maderastablas/principal.php" class="text-decoration-none text-primary" >Administrar</a>
                <a href="./../assets/js/cerrarSesion.php" class="text-decoration-none text-danger">Cerrar Sesion</a>
            </form>
        </nav>
        ';
    
  }else if(isset($_SESSION["usuarioActivo"]) && $_SESSION['usu_rol']>1){
    
   
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
   

 
  echo '
        <!--Nav-->
        <nav class="nav flex-nowrap">
            <div class="TitleContainer">
                <img src="./../assets/icons/logomt.png" class="Icon" loading="lazy">
                <p class="Title"><a class="navbar-brand" href="./../ecommerce/index.php">De Maderas Tablas</a></p>
            </div>
            <form class="ms-auto d-flex flex-column">
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
  