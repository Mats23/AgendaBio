<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index(){
		$this->load->model("Tipo_usuario_model"); 
 	 	$dados["cargo"] = $this->Tipo_usuario_model->listarCargos();  
		$this->load->view('cad_usuario', $dados);
	}
	public function validar(){
		$this->load->model("Usuario_model");
        $this->load->model("tipo_usuario_model");
        $this->load->model("Agendamento_model");
		$dados["agenda"] = 
        $email = $this->input->post("userLogin");
        $senha = $this->input->post("pswd"); 
        $senhaMD5 = md5($senha);
        $usuario = $this->Usuario_model->validarUser($email,$senhaMD5); 
        $result = $this->tipo_usuario_model->nivel($usuario["id_tipo"]);  
		if($result["nivel"] == 3){
			$dados =array(
				"nivel" => $this->load->view('menu'),
				"agenda" => $this->Agendamento_model->selectAll()
			);
		}elseif($result["nivel"] == 2) {
			$dados =array(
				"nivel" => $this->load->view('menu_medico'),
				"agenda" => $this->Agendamento_model->selectAll()
			);
		}elseif($result["nivel"] == 1){
			$dados =array(
				"nivel" => $this->load->view('menu_telefonista'),
				"agenda" => $this->Agendamento_model->selectAll()
			);
		}	
		  		
        if($usuario){
            $this->session->set_userdata("adm", $usuario);
            $this->load->view('board', $dados);
        }else{
            $dados = array("mensagem" => "Não foi possível fazer o Login!");
            $this->load->view("home", $dados);
        
    }
	}
	public function salvar(){
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
		$this->load->model("Usuario_model");
		$this->load->model("Tipo_usuario_model");
		$dados["user"] = $this->Usuario_model->selectAll();
		$this->load->view("buscar_usuario", $dados);
	}

	public function buscarUser(){
		$this->load->model("Usuario_model");
		$user = $this->input->post("user");
		$result["user"] = $this->Usuario_model->buscarUsuario($user);
		$this->load->view('buscar_usuario', $result);
		}


	public function editar(){
		$id = $this->input->post("id_user");
		$this->load->model("Tipo_usuario_model");
		$this->load->model("Usuario_model");
		$dados = array("cargo" => $this->Tipo_usuario_model->listarCargos(),
						"user" => $this->Usuario_model->selectById($id)
					);
		$this->load->view("editar_usuario", $dados);
	}
	public function editarUser(){
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

	}

