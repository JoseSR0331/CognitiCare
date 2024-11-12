<!-- Top Bar -->
<div class="top-bar fixed-top">
    <div class="logo d-flex align-items-center">
        <img src="./imgs/logo.jpg" alt="Logo">
    </div>
    <div class="user-info">
        <?php 
            $usuario = isset($_SESSION['username']) ? $_SESSION['username'] : '';
            echo "<span>Bienvenido" . ($usuario ? ", $usuario" : "") . "</span>";
        ?>
    </div>
</div>

<!-- Navbar -->
<nav class="navbar navbar-dark navbar-custom fixed-top" style="top: 120px;">
    <div class="container-fluid">
        <button class="navbar-toggler ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">Inicio</a>
        <a class="navbar-brand" href="mapa.php">CEMAM</a>
        <a class="navbar-brand" href="relacionados.php">Relacionados</a>
        <a class="navbar-brand" href="faq.php">FAQ</a>

        <!-- Offcanvas with Static Backdrop -->
        <div class="offcanvas offcanvas-start text-bg-dark" id="offcanvasDarkNavbar" data-bs-backdrop="static">
            <div class="offcanvas-header">
                <h5>Menu de Usuario</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 pe-3">
                    <?php if (isset($_SESSION['username'])): ?>
                        <!-- Botón de perfil de usuario cuando está conectado -->
                        <li class="nav-item d-flex align-items-center">
                            <img src="./imgs/user.png" alt="Usuario" style="width: 30px; height: 30px; margin-right: 10px;">
                            <a class="nav-link" href="perfil.php"><?php echo $_SESSION['username']; ?></a>
                        </li>
                        <!-- Botón de página de pruebas -->
                        <li class="nav-item">
                            <a class="nav-link" href="pruebas.php">Pruebas</a>
                        </li>
                    <?php else: ?>
                        <!-- Botón para iniciar sesión o registrarse cuando no hay usuario conectado -->
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Iniciar Sesión / Registrarse</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- Botón de Cerrar sesión al fondo del offcanvas cuando el usuario está conectado -->
                    <div class="offcanvas-footer">
                        <a class="btn btn-danger w-100" href="logout.php">Cerrar sesión</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
