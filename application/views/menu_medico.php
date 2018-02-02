  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?=base_url("board")?>">Agendamento</a>
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
  </ul>
   </nav>
   <br>