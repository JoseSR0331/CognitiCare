<?php
// Array de paginas disponibles para las sugerencias de la barra de busqueda
$pages = [
    "index" => "index.php",
    "inicio" => "index.php",
    "cogniticare" => "index.php",
    "mapa" => "mapa.php",
    "cemam" => "mapa.php",
    "relacionados" => "relacionados.php",
    "videos" => "relacionados.php",
    "gerontologos" => "relacionados.php",
    "material" => "relacionados.php",
    "faq" => "faq.php",
    "preguntas" => "faq.php",
    "referencias" => "referencias.php",
    "citas" => "referencias.php",
    "bibliografia" => "referencias.php",
];

// Si el usuario está logueado, añadir las rutas protegidas
if (isset($_SESSION['username'])) {
    $pages["perfil"] = "perfil.php";
    $pages["usuario"] = "perfil.php";
    $pages["pruebas"] = "pruebas.php";
    $pages["Escala de Ansiedad Geriatrica"] = "prueba_EscalaAnsiedadGeriatrica.php";
    $pages["EAG"] = "prueba_EscalaAnsiedadGeriatrica.php";
    $pages["escala de ansiedad"] = "prueba_EscalaAnsiedadGeriatrica.php";
    $pages["Escala de Quejas Subjetivas de Memoria"] = "prueba_EscalaQuejasSubjetivasdeMemoria.php";
    $pages["EQSM"] = "prueba_EscalaQuejasSubjetivasdeMemoria.php";
    $pages["quejas subjetivas"] = "prueba_EscalaQuejasSubjetivasdeMemoria.php";
    $pages["quejas de memoria"] = "prueba_EscalaQuejasSubjetivasdeMemoria.php";
    $pages["Escala de depresion geriatrica"] = "prueba_GDS.php";
    $pages["depresion"] = "prueba_GDS.php";
    $pages["gds"] = "prueba_GDS.php";
    $pages["iqcode"] = "prueba_IQCODE.php";
}
?>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <!-- Botón de Hamburguesa al extremo izquierdo -->
            <button class="navbar-toggler btn-sm me-2" type="button" id="sidebarToggle">
                <i class="bi bi-layout-sidebar-inset" style="font-size: 1.2rem;"></i>
            </button>
            <!-- Icono y Nombre del Proyecto -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="./imgs/logo-removebgNOLETTERS.png" alt="Icono CognitiCare">
                CognitiCare
            </a>
        </div>
        <!-- Menú Desplegable de Usuario y Barra de búsqueda -->
        <div class="d-flex align-items-center ms-auto position-relative" style="width: 300px;">
            <!-- Barra de búsqueda -->
            <form class="d-flex me-2" onsubmit="return searchRedirect(event)" style="width: 100%;">
                <input class="form-control form-control-dark search-bar" id="searchBar" type="search" placeholder="Buscar..." aria-label="Buscar" oninput="showSuggestions()" style="width: 100%;">
                <button class="btn btn-outline-light ms-2" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <!-- Sugerencias de búsqueda -->
            <div id="suggestions" class="position-absolute bg-light text-dark rounded mt-1" style="max-width: 100%; width: 100%; top: 100%; left: 0; z-index: 1000; display: none; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); max-height: 200px; overflow-y: auto;">
            </div>
            <!-- Menú Desplegable de Usuario -->
            <div class="dropdown ms-2">
                <button class="btn btn-dark dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="userMenu">
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php">Cerrar sesión</a></li>
                    <?php else: ?>
                        <li><a class="dropdown-item" href="login.php">Iniciar sesión</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

    <!-- Sidebar -->
    <div id="sidebar">
        <div>
            <div class="nav-heading">Navegación</div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mapa.php"><i class="bi bi-geo-alt"></i> CEMAM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="relacionados.php"><i class="bi bi-link-45deg"></i> Relacionados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php"><i class="bi bi-question-circle"></i> FAQ</a>
                </li>
            </ul>
            <!-- Verifica que haya una sesion de usuario abierta para mostrar el enlace a la pagina de pruebas -->
            <?php if (isset($_SESSION['username'])): ?>
                <div class="nav-heading">Pruebas</div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="pruebas.php"><i class="bi bi-list-check"></i> Pruebas</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
        <!-- Footer del sidebar -->
        <div class="sidebar-footer">
            <div>Bienvenido</div>
            <?php if (isset($_SESSION['username'])): ?>
                <div class="text-white fw-bold"><?php echo $_SESSION['username']; ?></div>
            <?php endif; ?>
        </div>
    </div>