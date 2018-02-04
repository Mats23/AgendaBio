<?php $this->load->view("header") ?>
	<?php $this->load->view("menu") ?>
    <?php if($_SESSION["usuario"]["id_tipo"] == 1){
        redirect("board");
      } ?>
  <div class="container">  
	  <form action="<?=base_url("usuario/buscarUser")?>" class="form-horizontal" method="post">
	  	<div class="input-group">
    		<input type="text" class="form-control" placeholder="Search" name="user">
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
          <th>Email</th>
          <th>Cargo</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($user as $users): ?>
            <tr>
              <td><?=$users["nome"]?></td>
              <td><?=$users["email"]?></td>
              <td><?=$users["cargo"]?></td>
              <form method="post" action="<?=base_url("usuario/editar")?>">
                <td><button type="submit" class="btn btn-primary" name="id_user" value="<?=$users["id"]?>">Editar</button></td>
              </form>
              <form method="post" action="<?=base_url("usuario/mudarSenha")?>">
                <td><button type="submit" class="btn btn-primary" name="id_user" value="<?=$users["id"]?>">Alterar Senha</button></td>
              </form>
            </tr> 
            <tr>
              <td></td>
            </tr>
          <?php endforeach ?>
       
      </tbody>
      
    </table>
    
  </div>
<?php $this->load->view("footer") ?>
