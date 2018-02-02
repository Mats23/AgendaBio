<?php $this->load->view('header') ?>
	<?php $this->load->view('menu') ?>
	<div class="container">
		<ul class="list-group">
		  <li class="list-group-item active"><?=$info["nome"]?></li>
		  <li class="list-group-item"><?=$info["mp"]?></li>
		  <li class="list-group-item"><?=$info["rua"]?> <br> Bairro: <?=$info["bairro"]?> <br> Cidade: <?=$info["cidade"]?> </li>
		  <li class="list-group-item">Contato: <?=$info["numero"]?></li>
		  <li class="list-group-item">Observação: <?=$info["informacao"]?></li>
		  <li class="list-group-item">Dia agendado: <?=$info["data"]?></li>
		</ul>
		<br>
		<form action="<?=base_url("board")?>">
			<button type="submit" class="btn btn-primary">Voltar</button>
		</form>
	</div>
<?php $this->load->view('footer') ?>	