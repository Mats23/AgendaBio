<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller {

	public function index(){
		autoriza();
		$this->load->view('cad_paciente');
	}
	public function salvar(){
		autoriza();
		$this->load->model("Paciente_model");
		$this->load->model("Contato_model");
		$this->load->model("Endereco_model");
		$this->load->helper('funcoes');
		$nome = $this->input->post("nomePaciente");
		$email = $this->input->post("emailPaciente");
		$idade = $this->input->post("idadePaciente");
		$rua = $this->input->post("rua_paciente");
		$bairro = $this->input->post("bairro_paciente");
		$cidade = $this->input->post("cidade_paciente");
		$numero = $this->input->post("numero_resd");
		$mp = rand(5, 100);
		$mp = gerar_id($mp);
		$data = array(
			"mp" => $mp,
			"nome" => $nome,
			"email" => $email,
			"idade" => $idade,	
			"numero_contato" => $this->input->post("ctt1")."/".$this->input->post("ctt2")."/".$this->input->post("ctt_comercial")."/".$this->input->post("ctt_resid"));
		$id = $this->Paciente_model->salvarPaciente($data);
		$result = $this->Endereco_model->salvar($id, $rua, $bairro, $cidade, $numero);
		/*
		if($result) {
			if($this->input->post("ctt1")){
				$ctt1 = $this->input->post("ctt1");
				$ctt1 = limpar($ctt1);
				$this->Contato_model->salvarContato($ctt1, $id, "celular");
			}
			if($this->input->post("ctt2")) {
				$ctt2 = $this->input->post("ctt2");
				$ctt2 = limpar($ctt2);
				$this->Contato_model->salvarContato($ctt2, $id, "celular2");
			}
			if($ctt_comercial = $this->input->post("ctt_comercial")) {
				$ctt_comercial = $this->input->post("ctt_comercial");
				$ctt_comercial = limpar($ctt_comercial);
				$this->Contato_model->salvarContato($ctt_comercial, $id, "comercial");
			}
			if($this->input->post("ctt_resid")) {
				$ctt_resid = $this->input->post("ctt_resid");
				$ctt_resid = limpar($ctt_resid);
				$this->Contato_model->salvarContato($ctt_resid, $id, "residencial");
			}

			
			
			
		}else{

			$dados = array("mensagem_erro" => "O paciente não foi cadastrado!");
		}
			*/
		$dados = array("mensagem" => "Paciente Cadastrado com sucesso!",
							"matricula" => "Numero da matrícula :". $mp
						);
		$this->load->view("cad_paciente", $dados);	

	}

	public function buscar(){
		autoriza();
		$this->load->model('Paciente_model');
		$result["paciente"] = $this->Paciente_model->selectAll();
		$this->load->view('buscar_paciente', $result);
	}
	public function buscarPaciente(){
		autoriza();
		$this->load->model('Paciente_model');
		$info = $this->input->post("paciente");
		if(is_numeric($info)){
			$result["paciente"] = $this->Paciente_model->buscarPorMatricula($info);
		}else{
			$result["paciente"] = $this->Paciente_model->buscarPorNome($info);
		}
		$this->load->view('buscar_paciente', $result);
	}
	public function editar(){
		autoriza();
		$this->load->model("Paciente_model");
		$id = $this->input->post("id_paciente");
		$data["dados"] = $this->Paciente_model->selectCttById($id);
		$contato = explode("/" ,$data["dados"]["numero_contato"]);
		$info = array("dados" => $this->Paciente_model->selectById($id),
						"contatos"=> $contato );	
		$this->load->view('editar_paciente', $info);
	}
	public function editarPaciente(){
		autoriza();
		$this->load->model("Paciente_model");
		$id = $this->input->post("id_paciente");
		$nome = $this->input->post("nomePaciente");
		$email = $this->input->post("emailPaciente");
		$idade = $this->input->post("idadePaciente");
		$data = array(
			"nome" => $nome,
			"idade" => $idade,
			"email" => $email
		);
		$sucesso = $this->Paciente_model->update($id, $data);
		if($sucesso){
			$info = array("mensagem" => "Paciente alterado com sucesso!",
							"dados" => $this->Paciente_model->selectById($id)
						);
		}else{
			$info = array("mensagem_erro" => "Paciente não foi alterado!",
							"dados" => $this->Paciente_model->selectById($id)
						);
		}
		$this->load->view("editar_paciente", $info);
	}

}
