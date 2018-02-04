<?php $this->load->view('header') ?>
	<?php $this->load->view('menu') ?>
	<div class="container">
		<ul class="list-group">
		  <li class="list-group-item active"><?=$info["nome"]?></li>
		  <li class="list-group-item"><?=$info["mp"]?></li>
		  <li class="list-group-item"><?=$info["rua"]?> <br> Bairro: <?=$info["bairro"]?> <br> Cidade: <?=$info["cidade"]?> </li>
		  <li class="list-group-item">Contato: <?=$info["numero_contato"]?></li>
		  <li class="list-group-item">Observação: <?=$info["informacao"]?></li>
		  <li class="list-group-item">Dia agendado: <?=$info["data"]?></li>
		  <?php if($info["atendido"] == 1) {?>
		 	 <li class="list-group-item">Atendido</li>
		  <?php }elseif ($info["atendido"] == 0) { ?>
		 	 <li class="list-group-item">Agendado</li>
		  <?php } ?>
		</ul>
	<br>
	<div class="container">
		<div class="form-group">
			<div class="row">	
				<form action="<?=base_url("board")?>">
					<button type="submit" class="btn btn-primary">Voltar</button>
				</form>
				<div class="col-sm-4">
					<form method="post" action="<?=base_url("agendamento/atendido")?>">
						<input type="hidden" name="id_paciente" value="<?=$info["id"]?>">

						<button type="submit" id="atendeu" class="btn btn-success">Atendido</button>
					</form>
				</div>		
			</div>	
		</div>		
	</div>
<?php $this->load->view('footer') ?>	