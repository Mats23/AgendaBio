<?php $this->load->view("header") ?>   
	<?php $this->load->view("menu") ?>   
      <div class="container">
			<form method="post" action="<?=base_url("agendamento/buscar")?>">
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
		          <th>Nome</th>
		          <th>Data</th>
		          <th>Contato</th>
		        </tr>
		      </thead>
		      <tbody>
		          <?php foreach($agenda as $agendas): ?>
		            <tr>
		            	<td><?=$agendas["nome"]?></td>
		            	<td><?=$agendas["data"]?></td>
		            	<td><?=$agendas["numero"]?></td>
		              <form method="post" action="<?=base_url("agendamento/detalhe")?>">
		              	<td><button type="submit" class="btn btn-primary" value="<?=$agendas["id"]?>" name="id_detalhe">Detalhamento</button></td>
		              </form>		
		            </tr>
		          <?php endforeach ?>
		      </tbody>   
		    </table>
<?php $this->load->view("footer") ?>