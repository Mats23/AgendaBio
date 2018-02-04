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
        		<p class="alert-danger"><?=$mensagem?></p>
        	</center>  
      <?php }?>	 	 
	  <h2 style="text-align: center">Paciente</h2>
	  <form method="post" action="<?=base_url("paciente/editarPaciente")?>" class="form-horizontal">
			  	<div class="form-group">
			  		<input type="hidden" value="<?php echo "".isset($dados["id"])?$dados["id"]: '' ?>" name="id_paciente">
			  		<label class="control-label col-sm-2">Nome:</label>
			  		<div class="col-sm-4">
			  			<input type="text" class="form-control" name="nomePaciente" value="<?php echo "".isset($dados["nome"])?$dados["nome"]: '' ?>">
			  		</div>
			  		<label class="control-label col-sm-2">Idade:</label>
			  		<div class="col-sm-2">
			  			<input type="number" class="form-control" onkeypress="negativo(this)" name="idadePaciente" value="<?php echo "".isset($dados["idade"])?$dados["idade"]: '' ?>">
			  		</div>	
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-3">Email:</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" name="emailPaciente" value="<?php echo "".isset($dados["email"])?$dados["email"]: '' ?>">
					</div>	
				</div>
				<div class='container'>
					<div class="form-inline">
					  	<div class="form-group">
						  	<label class="control-label col-md-4">Contato 1:</label>
						  	<div class="row">
							  	<div class="col-sm-4">
							  		<input type="tel" class="form-control" maxlength="15" onkeypress="mascara(this)" name="ctt1" value="<?php echo "".isset($contatos["0"])?$contatos["0"]: '' ?>">
							  	</div>
							</div>
						</div>
						<div class="form-group">	  	
						  	<label class="control-label col-md-4">Contato 2:</label>
							<div class="row">  	
							  	<div class="col-sm-4">
							  		<input type="tel" class="form-control"  maxlength="15" onkeypress="mascara(this)" name="ctt2" value="<?php echo "".isset($contatos["1"])?$contatos["1"]: '' ?>">
							  	</div>
							</div>
						</div>
					</div>
				</div>		
				<div class="form-group">
					<label class="control-label col-sm-3">Contato Comercial:</label>	  
						<div class="col-sm-4">
						  	<input type="tel" class="form-control" maxlength="15" onkeypress="mascara(this)" name="ctt_comercial" value="<?php echo "".isset($contatos["2"])?$contatos["2"]: '' ?>">			
					</div>  	
				</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3">Contato Residencial:</label>	  
							<div class="col-sm-4">
						  		<input type="tel" class="form-control" id="4" maxlength="15" onkeypress="mascara(this)" name="ctt_resid" value="<?php echo "".isset($contatos["3"])?$contatos["3"]: '' ?>">
							</div>	
				  	</div>
				 <div class="container">
						<div class="form-group">
							<label class="control-label col-sm-1">Rua:</label>
							<div class="row">
								<div class="col-sm-4">
									<input type="text" class="form-control" name="rua_paciente" value="<?php echo "".isset($dados["rua"])?$dados["rua"]: '' ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label class="control-label col-sm-1">Bairro:</label>
									<input type="text" class="form-control" name="bairro_paciente" value="<?php echo "".isset($dados["bairro"])?$dados["bairro"]: '' ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-4">
									<label class="control-label col-sm-1">Cidade:</label>
									<input type="text" class="form-control" name="cidade_paciente" value="<?php echo "".isset($dados["cidade"])?$dados["cidade"]: '' ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
							 <div class="row">
								<div class="col-sm-1">
									<label class="control-label col-sm-1">Nº:</label>
									<input type="text" class="form-control" name="numero_resd" value="<?php echo "".isset($dados["numero_residencia"])?$dados["numero_residencia"]: '' ?>">
								</div>
							 </div>
						</div> 	
				</div>
				<br>
			    <div class="col-sm-2">
			        <button type="submit" class="btn btn-primary btn-block">Editar</button>
			    </div>

	  </form>
  </div>   
<?php $this->load->view("footer") ?>