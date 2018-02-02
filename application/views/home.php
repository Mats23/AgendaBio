<?php $this->load->view("header") ?>

    <div class="container">
      <h2>AgendaBio</h2>
       <?php if(isset($mensagem)){ ?>
          <p class="alert-danger"><?=$mensagem?></p>
        <?php }?>
      <form method= "post" action="<?=base_url("usuario/validar")?>">
        <div class="form-group">
          <label>Login:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Login" name="userLogin">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>
    </div>
