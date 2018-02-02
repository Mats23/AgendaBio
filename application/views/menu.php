  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url("board")?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url("agendamento")?>">Agendamento</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Pacientes
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?=base_url("paciente")?>">Novo</a>
          <a class="dropdown-item" href="<?=base_url("paciente/buscar")?>">Buscar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Usuario
        </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?=base_url("usuario")?>">Novo</a>
            <a class="dropdown-item" href="<?=base_url("usuario/buscar")?>">Buscar</a>
          </div>
      </li>
       <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href="<?=base_url("home")?>">Sair</a></li>
    </ul>
    </ul>
   </nav>
   <br>