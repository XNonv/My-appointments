<!-- Navigation -->
<h6 class="navbar-heading text-muted">Gestionar Datos</h6>
<ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" href="./home">
        <i class="ni ni-tv-2 text-orange"></i> Dashboard
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="./specialties">
        <i class="ni ni-planet text-blue"></i> Tipo de Masajes
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="./masajistas">
        <i class="ni ni-badge text-yellow"></i> Masajistas
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="./clientes">
        <i class="ni ni-satisfied text-green"></i> Clientes
    </a>
    </li>
    
    <li class="nav-item">
    <a class="nav-link" href="{{ route ('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="ni ni-button-power text-red"></i> Cerrar Sesión
    </a>
    <form action="{{ route ('logout')}}" method="POST" style="display:none" id="formLogout">
        @csrf
    </form>
    </li>
    
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
    <a class="nav-link" href="#">
        <i class="ni ni-calendar-grid-58 text-green"></i> Frecuencia de citas
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">
        <i class="ni ni-chart-bar-32 text-blue"></i> Masajistas mas Activos
    </a>
    </li>
    
</ul>