<?php $this->load->view("header") ?>
    <?php $this->load->view("menu") ?>
  <div class="container"> 
      <?php if(isset($mensagem)){ ?>
      	  <center>
      	  	<p class="alert-success"><?=$mensagem?></p>	
      	  	<p class="alert-success"><?=$matricula?></p>
      	  </center>
      <?php }?>
        <?php if(isset($mensagem_erro)){ ?>
        	<center>
        		<p class="alert-danger"><?=$mensagem?></p>
        	</center>  
      <?php }?>	 	 
	  <h2 style="text-align: center">Novo Paciente</h2>	
	  <form method="post" action="<?=base_url("paciente/salvar")?>" class="form-horizontal">
			  	<div class="form-group">
			  		<label class="control-label col-sm-2">Nome:</label>
			  		<div class="row">
				  		<div class="col-sm-4">
				  			<input type="text" class="form-control" name="nomePaciente">
				  		</div>
				  	</div>	
			  		<label class="control-label col-sm-2">Idade:</label>
			  		<div class="row">
				  		<div class="col-sm-2">
				  			<input type="number" class="form-control" onkeypress="negativo(this)" name="idadePaciente">
				  		</div>
				  	</div>		
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-3">Email:</label>
					<div class="row">
						<div class="col-sm-4">
							<input type="email" class="form-control" name="emailPaciente">
						</div>
					</div>			
				</div>
				<div class="form-inline">
				  	<div class="form-group">
					  	<label class="control-label col-md-4">Contato 1:</label>
					  	<div class="row">
						  	<div class="col-sm-4">
						  		<input type="tel" class="form-control" maxlength="15" onkeypress="mascara(this)" name="ctt1">
						  	</div>
						</div>
					</div>
					<div class="form-group">	  	
					  	<label class="control-label col-md-4">Contato 2:</label>
						<div class="row">  	
						  	<div class="col-sm-4">
						  		<input type="tel" class="form-control" id="2" maxlength="15" onkeypress="mascara(this)" name="ctt2">
						  	</div>
						</div>
					</div>
				</div>
				<div class="form-group">
						<label class="control-label col-sm-3">Contato Comercial:</label>
						<div class="row">			  
							<div class="col-sm-4">
						  		<input type="tel" class="form-control" id="3" maxlength="15" onkeypress="mascara(this)" name="ctt_comercial">
							</div>
						</div>  	
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3">Contato Residencial:</label>
						<div class="row">			  
							<div class="col-sm-4">
						  		<input type="tel" class="form-control" id="4" maxlength="15" onkeypress="mascara(this)" name="ctt_resid">
							</div>
						</div>  	
				  	</div>		
			</div>
		<div class="container">
					<div class="form-group">
						<label class="control-label col-sm-1">Rua:</label>
						<div class="row">
							<div class="col-sm-4">
								<input type="text" class="form-control" name="rua_paciente">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label col-sm-1">Bairro:</label>
								<input type="text" class="form-control" name="bairro_paciente">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label col-sm-1">Cidade:</label>
								<input type="text" class="form-control" name="cidade_paciente">
							</div>
						</div>
					</div>
					<div class="form-group">
						 <div class="row">
							<div class="col-sm-1">
								<label class="control-label col-sm-1">Nº:</label>
								<input type="text" class="form-control" name="numero_resd">
							</div>
						 </div>
					</div>
				<br>
			    <div class="col-sm-2">
			        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
			    </div>	
		  </form>
		 </div> 
  </div>   
<?php $this->load->view("footer") ?>