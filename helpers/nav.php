<!-- Dropdown Structure -->
<ul id="dropdownInserts" class="dropdown-content">
  <li><a href="addstation.php"><i class="material-icons right">local_gas_station</i>Estacion</a></li>
  <li><a href="#!"><i class="material-icons right">local_play</i>Servicios</a></li>
  <li><a href="addmayorista.php"><i class="material-icons right">business</i>Mayorista</a></li>
</ul>

    <nav>
        <div class="nav-wrapper #00838f cyan darken-3">
            <a href="#!" class="brand-logo center">Mi EDS App</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="dashboard.php"><i class="material-icons right">home</i>Inicio</a></li>
                <!-- <li><a href="addstation.php"><i class="material-icons right">add_box</i>Agregar Estacion</a></li> -->
                <li><a class="dropdown-button" href="#!" data-activates="dropdownInserts">Insertar Nuevo<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="controllers/logout.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="dashboard.php"><i class="material-icons right">home</i>Inicio</a></li>
                <!-- <li><a href="addstation.php"><i class="material-icons right">add_box</i>Agregar Estacion</a></li> -->
                <!-- <li><a class="dropdown-button" href="#!" data-activates="dropdownInserts">Insertar<i class="material-icons right">arrow_drop_down</i></a></li> -->

                <li><a href="controllers/logout.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>