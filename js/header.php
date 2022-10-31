
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Bienvenido/a <?php 
     
    echo $_SESSION['usuarioActivo']; ?>
    </a>
    
    <form class="d-flex">
      <a href='./../maderastablas/principal.php' class="btn btn-outline-success m-1">INICIO</a>
      <a href='./../js/cerrarSesion.php' class="btn btn-outline-danger m-1">Cerrar Sesion</a>
    </form>
  </div>

  