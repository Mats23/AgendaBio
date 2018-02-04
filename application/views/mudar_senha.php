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
   	 <?php $user ?>
	  <form class="form-horizontal" method="post" action="<?=base_url("usuario/novaSenha")?>">
	  	<div class="container">
		  	<div class="form-group">
			  	<h2>Nova Senha</h2>
			  	<label class="control-label col-sm-2">Antiga senha:</label>
			  	<div class="col-sm-8">
			  		<input type="hidden" name="id_user" value="<?=$user?>">
			  		<input type="password" class="form-control" required name="antiga_senha">
			  	 </div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2">Nova senha:</label>
				<div class="col-sm-8">
					<input type="password"  required class="form-control" name="nova_senha">	
				</div>
			</div>
		        <div class="col-sm-2">
		            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
		        </div>
		</div> 
	  </form>
<?php $this->load->view("footer") ?>