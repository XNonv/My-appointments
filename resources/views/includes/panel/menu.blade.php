{{--Navigation--}}
<h6 class="navbar-heading text-muted">
    @if(auth()->user()->role == 'admin') Gestionar Datos
    @else
    Menu Principal
    @endif
</h6>
<ul class="navbar-nav">
    @if(auth()->user()->role == 'admin')
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
                <i class="ni ni-circle-08 text-green"></i> Clientes
            </a>
        </li>


    @elseif (auth()->user()->role == 'masajista')


        <li class="nav-item">
            <a class="nav-link" href="./schedule">
                <i class="ni ni-calendar-grid-58 text-yellow"></i> Gestionar Horario
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="./specialties">
                <i class="ni ni-collection text-green"></i> Mis Citas
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="./clientes">
                <i class="ni ni-circle-08 text-blue"></i> Mis clientes
            </a>
        </li>

    @else {{--Cliente--}}

    <li class="nav-item">
        <a class="nav-link" href="./specialties">
            <i class="ni ni-laptop text-green"></i> Reservar cita
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="./specialties">
            <i class="ni ni-collection text-blue"></i> Mis citas
        </a>
    </li>
        
    @endif
    
    <li class="nav-item">
    <a class="nav-link" href="{{ route ('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="ni ni-button-power text-red"></i> Cerrar Sesión
    </a>
    <form action="{{ route ('logout')}}" method="POST" style="display:none" id="formLogout">
        @csrf
    </form>
    </li>
    
</ul>

@if(auth()->user()->role == 'admin')
{{--Divider--}}
<hr class="my-3">
{{--Heading--}}
<h6 class="navbar-heading text-muted">Reportes</h6>
{{--Navigation--}}
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

@endif