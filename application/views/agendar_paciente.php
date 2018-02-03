<?php $this->load->view("header") ?> 
  <?php $this->load->view("menu") ?>
  <div class="container">
	 <div class="form-group">
	    <div class="col-sm-10">
	      <p class="form-control-static">Nome: <?=$dados["nome"]?></p>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-10">
	      <p class="form-control-static">Matrícula: <?=$dados["mp"]?></p>
	    </div>
	  </div>
	  <form method="post" action="<?=base_url("agendamento/salvar")?>">
	  	<div class="form-group">
	  		<div class="col-sm-4">
	  			<input type="text" id="datepicker" class="form-control" name="dt">
	  		</div>
	  	</div>
	  	<div class="form-group">
	  		<input type="hidden" name="id" value="<?=$dados["id"]?>">
	  	</div>
	  	<div class="form-group">
			<div class="col-sm-4">
				<textarea name="obs_paciente" required class="form-control" rows="4" cols="5"></textarea>
			</div>	  		
	  	</div>
	  	<div class="container">
		  	<div class="form-group">
		  		<button type="submit" class="btn btn-primary">Agendar</button>
		  	</div>
		</div>	  			
	  </form>		
	</div> 
<?php $this->load->view("footer") ?>  