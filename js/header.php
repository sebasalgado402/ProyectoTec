

  <!-- Inicio del menu -->
  <?php 
  if(isset($_SESSION["usuarioActivo"]) && $_SESSION['usu_rol']==1){
    echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
        <!-- icono o nombre -->

        <a class="navbar-brand" href="./../ecommerce/index.php">
          <img src="./../icons/demadera.png" height="50">
          <span class="text-warning">MADERAS TABLAS</span>
        </a>
        
            
        <!-- boton del menu -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

          <!-- elementos del menu colapsable -->

        <div class="collapse navbar-collapse" id="menu">
        <form class="ms-auto">
        <span class="text-light" href="#">Bienvenido/a '.$_SESSION["usuarioActivo"].'</span>
          <a href="./../maderastablas/principal.php" class="btn btn-outline-success m-1">Administrar</a>
          <a href="./../js/cerrarSesion.php" class="btn btn-outline-danger m-1">Cerrar Sesion</a>
        </form>
        

          <hr class="d-md-none text-white-50">

          
          
        </div>
     
        </div>  
      </nav>';
    
  }else if(isset($_SESSION["usuarioActivo"]) && $_SESSION['usu_rol']>1){
    echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
        <!-- icono o nombre -->

        <a class="navbar-brand" href="./../ecommerce/index.php">
          <img src="./../icons/demadera.png" height="50">
          <span class="text-warning">MADERAS TABLAS</span>
        </a>
        
            
        <!-- boton del menu -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

          <!-- elementos del menu colapsable -->

        <div class="collapse navbar-collapse" id="menu">
        <form class="ms-auto">
        <span class="text-light" href="#">Bienvenido/a '.$_SESSION["usuarioActivo"].'</span>
          <a href="./../ecommerce/index.php" class="btn btn-outline-success m-1">INICIO</a>
          <a href="./../js/cerrarSesion.php" class="btn btn-outline-danger m-1">Cerrar Sesion</a>
        </form>
        

          <hr class="d-md-none text-white-50">

          
          
        </div>
     
        </div>  
      </nav>'; 
      echo '
  <header class="HeaderContainer">
      <input type="search" name="InputSearch" class="InputSearch" placeholder="Ejemplo: Silla">
      <div class="CategoriesContainer">
          <p class="CatTitle">Categorias: </p>
          <div class="Categories">
              <a href="#" class="CatLink">
                  <p class="CatLinkName">Sillas</p>                    
              </a>
              <a href="#" class="CatLink">
                  <p class="CatLinkName">Mesas</p>                    
              </a>
              <a href="#" class="CatLink">
                  <p class="CatLinkName">Tablas</p>                    
              </a>
              <a href="#" class="CatLink">
                  <p class="CatLinkName">Materas</p>                    
              </a>
              <a href="#" class="CatLink">
                  <p class="CatLinkName">Llaveros</p>                    
              </a>
          </div>
      </div>
  </header>';
  }else{
    echo '<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
        <!-- icono o nombre -->

        <a class="navbar-brand" href="./../ecommerce/index.php">
          <img src="./../icons/demadera.png" height="50">
          <span class="text-warning">MADERAS TABLAS</span>
        </a>
        
            
        <!-- boton del menu -->

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

          <!-- elementos del menu colapsable -->

        <div class="collapse navbar-collapse" id="menu">
        <form class="ms-auto">
        <span class="text-light" href="#">Bienvenido/a</span>
          <a href="./../maderastablas/index.php" class="btn btn-outline-success m-1">Iniciar Sesion</a>
          
        </form>
        

          <hr class="d-md-none text-white-50">

          
          
        </div>
     
        </div>  
      </nav>';
  }
  
      ?> 
  