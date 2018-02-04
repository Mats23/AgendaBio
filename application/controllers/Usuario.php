<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index(){
		autoriza();
		permissao();
		$this->load->model("Tipo_usuario_model"); 
 	 	$dados["cargo"] = $this->Tipo_usuario_model->listarCargos();  
		$this->load->view('cad_usuario', $dados);
	}
	public function validar(){
		$this->load->model("Usuario_model");
        $this->load->model("Tipo_usuario_model");
        $this->load->model("Agendamento_model");
        $email = $this->input->post("userLogin");
        $senha = $this->input->post("pswd"); 
        $senhaMD5 = md5($senha);
        $usuario = $this->Usuario_model->validarUser($email,$senhaMD5); 
        $dados["agenda"] = $this->Agendamento_model->selectAll(); 		
        if($usuario){
            $this->session->set_userdata("usuario", $usuario);
            $this->load->view('board', $dados);
        }else{
            $dados = array("mensagem" => "Não foi possível fazer o Login!");
            $this->load->view("home", $dados);
        
    }
	}
	public function salvar(){
		autoriza();
		permissao();
		$this->load->model("Usuario_model");
		$this->load->model("Tipo_usuario_model");
		$user = $this->input->post("email_usuario");
		$nome = $this->input->post("nome_usuario");
		$senha = $this->input->post("pswd_usuario");
		$id = $this->input->post("id_tipo_usuario");
		$result = $this->Usuario_model->salvar($nome, $user, $id, $senha);
		if($result){
			$dados = array("mensagem" => "Usuario Cadastrado com sucesso!",
						   "cargo" => $this->Tipo_usuario_model->listarCargos());
		}else{
			$dados = array("mensagem_erro" => "O usuario já foi cadastrado!",
						   "cargo" => $this->Tipo_usuario_model->listarCargos());
		}
		$this->load->view("cad_usuario", $dados);
	}

	public function buscar(){
		autoriza();
		permissao();
		$this->load->model("Usuario_model");
		$this->load->model("Tipo_usuario_model");
		$dados["user"] = $this->Usuario_model->selectAll();
		$this->load->view("buscar_usuario", $dados);
	}

	public function buscarUser(){
		autoriza();
		permissao();
		$this->load->model("Usuario_model");
		$user = $this->input->post("user");
		$result["user"] = $this->Usuario_model->buscarUsuario($user);
		$this->load->view('buscar_usuario', $result);
		}


	public function editar(){
		autoriza();
		permissao();
		$id = $this->input->post("id_user");
		$this->load->model("Tipo_usuario_model");
		$this->load->model("Usuario_model");
		$dados = array("cargo" => $this->Tipo_usuario_model->listarCargos(),
						"user" => $this->Usuario_model->selectById($id)
					);
		$this->load->view("editar_usuario", $dados);
	}
	public function editarUser(){
		autoriza();
		permissao();
		$this->load->model("Usuario_model");
		$this->load->model("Tipo_usuario_model");
		$id = $this->input->post("id_usuario");
		$user = $this->input->post("email_usuario");
		$nome = $this->input->post("nome_usuario");
		$senha = $this->input->post("pswd_usuario");
		$id_tipo = $this->input->post("id_tipo_usuario");
		$data = array(
			"nome" => $nome,
			"id_tipo" => $id_tipo,
			"email" => $user
		);
		$result = $this->Usuario_model->update($id, $data);
		if($result){
			$dados = array("mensagem" => "Usuario Alterado com sucesso!",
						   "cargo" => $this->Tipo_usuario_model->listarCargos());
		}else{
			$dados = array("mensagem_erro" => "Erro nos dados",
						   "cargo" => $this->Tipo_usuario_model->listarCargos());
		}
		$this->load->view("editar_usuario", $dados);

	}	
	public function mudarSenha(){
		autoriza();
		permissao();
		$dado["user"] = $this->input->post("id_user");
		$this->load->view("mudar_senha", $dado);
	}
	public function novaSenha(){
		autoriza();
		permissao();
		$this->load->model("Usuario_model");
		$antiga = $this->input->post("antiga_senha");
		$nova = $this->input->post("nova_senha");
		$id = $this->input->post("id_user");
		
		$successo = $this->Usuario_model->mudar_senha($antiga, $nova, $id);
		if($successo){
			$dados = array("mensagem" => "Senha alterada com sucesso",
							"user" => $id);
		}else{
			$dados = array("mensagem_erro" => "Senha alterada com sucesso",
							"user" => $id);
		}
		$this->load->view("mudar_senha", $dados);

	}
}

