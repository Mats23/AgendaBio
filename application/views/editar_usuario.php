<?php $this->load->view("header") ?>
  <?php $this->load->view("menu") ?>
    <div class="container">
      <?php if(isset($mensagem)){ ?>
      	  <center>
      	  	<p class="alert-success"><?=$mensagem?></p>	
      	  </center>
      <?php }?>
        <?php if(isset($mensagem_erro)){ ?>
        	<center>
        		<p class="alert-danger"><?=$mensagem_erro?></p>
        	</center>  
      <?php }?>	
   </div> 	 
	  <form class="form-horizontal" method="post" action="<?=base_url("usuario/editarUser")?>">
	  	<div class="container">
		  	<div class="form-group">
			  	<h2>Editar Usuário</h2>
			  	<label class="control-label col-sm-2">Nome:</label>
			  	<div class="col-sm-8">
			  		<input type="hidden" name="id_usuario" value="<?php echo "".isset($user["id"])?$user["id"]: '' ?>">
			  		<input type="text" class="form-control" name="nome_usuario"  value="<?php echo "".isset($user["nome"])?$user["nome"]: '' ?>">
			  	 </div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Email:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="email_usuario" value="<?php echo "".isset($user["email"])?$user["email"]: '' ?>">	
				</div>
			</div>
			 <div class="form-group">
				<select name="id_tipo_usuario"  class="form-control col-sm-2">
					<?php foreach ($cargo as $cargos):?>
						<?php $selected = ($user["cargo"] == $cargos["cargo"])? "selected=\"selected\"" : null; ?>
						<option value="<?=$cargos["id"]?>"><?=$cargos["cargo"]?></option>

					<?php endforeach ?>
				</select>	
			</div>
			<div class="container">
		        <div class="col-sm-2">
		            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
		        </div>
		    </div>
	
	  </form>
<?php $this->load->view("footer") ?>