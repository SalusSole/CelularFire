<header>
    <div class="top">
        <div class=" container" >
           
           
            <div class="text-center">

                <a href="index.php"><img class="img-fluid logo" width="350em" src="img/home/cf.png" alt="Celular Fire"/></a>

            </div>
            
        </div>
    </div>
<div class="text-center top bottom ">
    <nav class="nav blue" style="background: #155264">
        <?php if(!isset($_SESSION["user_id"])):?>
        
        <a href="index.php" class="nav-item nav-link">
            <img class="icon" src="img/iconos/icons/Home.png" width="25em">
            <span class="font-nav ref1"></span>
        </a>
        <a href="login.php" class="nav-item nav-link">
            <img class="icon" src="img/iconos/icons/Usuario.png" width="25em">
            <span class="font-nav ref2"></span>
        </a>
        <a href="registro.php" class="nav-item nav-link">
            <img class="icon" src="img/iconos/icons/Nuevo_usuario.png" width="25em">
            <span class="font-nav ref3"></span>
        </a>
        <?php else:?>
        <a href="index.php" class="nav-item nav-link">
            <img class="icon" src="img/iconos/icons/Home.png" width="25em">
            <span class="font-nav ref1"></span>
        </a>
        <a href="mi_cesta.php" class="nav-item nav-link">
            <img class="icon" src="img/iconos/icons/Bag.png" width="25em">
            <span class="font-nav ref4"></span>
        </a>
        <a href="php/logout.php" class="nav-item nav-link">
            <img class="icon" src="img/iconos/icons/Logout.png" width="25em">
            <span class="font-nav ref5"></span>
        </a>
        <span class="nav-indicator"></span>  
        <?php endif;?>
        
    </nav>
</div>
<!--<nav class="">
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item text-right">
        <a class="nav-link" href="#">Crear Cuenta</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorías
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Display</a>
          <a class="dropdown-item" href="#">Touch</a>
          <a class="dropdown-item" href="#">Flexores</a>
          <a class="dropdown-item" href="#">Baterias</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Marcas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Samsung</a>
          <a class="dropdown-item" href="#">Motorola</a>
          <a class="dropdown-item" href="#">Apple</a>
          <a class="dropdown-item" href="#">Huawei</a>
          <a class="dropdown-item" href="#">Sony</a>
          <a class="dropdown-item" href="#">Xiaomi</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Mi cuenta</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Carrito</a>
      </li>
    </ul>
</nav>-->

</header>

