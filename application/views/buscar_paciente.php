<?php $this->load->view('header') ?>
	<?php $this->load->view('menu') ?>
	<div class="container">
		<form method="post" action="<?=base_url("paciente/buscarPaciente")?>">
			<div class="input-group">
	    		<input type="text" class="form-control" placeholder="Search" name="paciente">
	   			<div class="input-group-btn">
	      			<button type="submit" class="btn btn-outline-info">Buscar</button>	
	    		</div>
	  		</div>
		</form>
	</div>
	<div class="container">
	    <table class="table">
	      <thead>
	        <tr>
	          <th>Matrícula</th>
	          <th>Nome</th>
	          <th>Idade</th>
	          <th>Email</th>
	          <th>Número</th>
	        </tr>
	      </thead>
	      <tbody>
	          <?php foreach($paciente as $pacientes): ?>
	            <tr>
	              <td><?=$pacientes["mp"]?></td>
	              <td><?=$pacientes["nome"]?></td>
	              <td><?=$pacientes["idade"]?></td>
	              <td><?=$pacientes["email"]?></td>
	              <td><?=$pacientes["numero"]?></td>
	              <form method="post" action="<?=base_url("paciente/editar")?>">
	              	<td><button type="submit" class="btn btn-primary" value="<?=$pacientes["id"]?>" name="id_paciente">Editar</button></td>
	              </form>	
	            </tr>
	          <?php endforeach ?>
	       
	      </tbody>
	      
	    </table>
    
  </div>	
<?php $this->load->view('footer') ?>