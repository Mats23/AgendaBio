<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agendamento extends CI_Controller {

	public function index()
	{
		autoriza();
		$this->load->model('Paciente_model');
		$result["paciente"] = $this->Paciente_model->selectAll();
		$this->load->view('agendamento', $result);
	}
	public function agendar(){
		autoriza();
		$this->load->model("Paciente_model");
		$id = $this->input->post("id_paciente");
		$data["dados"] = $this->Paciente_model->selectById($id);
		$this->load->view("agendar_paciente", $data);
	}
	public function salvar(){
		autoriza();
		$this->load->model("Agendamento_model");
		$this->load->model("Observacao_model");
		$this->load->model('Paciente_model');
		$id = $this->input->post("id");
		$data = $this->input->post("dt");
		$data = implode("-",array_reverse(explode("/",$data)));
		$obs = $this->input->post("obs_paciente");
		$id_agendamento = $this->Agendamento_model->salvar($data, $id);
		$this->Observacao_model->salvar($obs, $id_agendamento);
		$result= array( 
			"paciente" => $this->Paciente_model->selectAll(),
			"sucesso" => "Paciente agendado com sucesso!"
									);
		$this->load->view("agendamento", $result);
	}
	public function buscar(){
		autoriza();
		$this->load->model("Agendamento_model");
		#$this->input->post("id");
		#$this->Agendamento_model->buscarPorNome($id);
		$this->load->view("board", $dados);
	}
	public function detalhe(){
		autoriza();
		$id_agendamento = $this->input->post("id_detalhe");
		$this->load->model("Agendamento_model");
		$result["info"] = $this->Agendamento_model->selectById($id_agendamento);
		$result["info"]["data"] = implode("/",array_reverse(explode("-",$result["info"]["data"])));
		$this->load->view("detalhe_agendamento", $result);

	}
	public function atendido(){
		autoriza();
		$this->load->model("Agendamento_model");
		$id = $this->input->post("id_paciente");
		$success = $this->Agendamento_model->atendimento($id);
		if($success){
			$dados["agenda"] = $this->Agendamento_model->selectAll();
			$this->load->view("board", $dados);
		}
		
		
	}
	public function reagendar(){
		autoriza();
		$this->load->model("Paciente_model");
		$id = $this->input->post("id_paciente");
		$data["dados"] = $this->Paciente_model->selectById($id);
		$this->load->view("reagendar_paciente", $data);
	}
	public function replace(){
		autoriza();
		$this->load->model("Agendamento_model");
		$this->load->model("Observacao_model");
		$this->load->model("Paciente_model");
		$id = $this->input->post("id");
		$data = $this->input->post("dt");
		$obs = $this->input->post("obs_paciente");
		$data = implode("-",array_reverse(explode("/",$data)));
		$success = $this->Agendamento_model->remarcar($data, $id);
		$id_agendamento = $this->Agendamento_model->selectByDataAgendamento($data);
		if($success){
			$this->Observacao_model->replaceObs($obs, $id_agendamento["id"]);
			$result= array( 
			"paciente" => $this->Paciente_model->selectAll(),
			"sucesso" => "Paciente agendado com sucesso!");
		}else{
			$result= array( 
			"paciente" => $this->Paciente_model->selectAll(),
			"sucesso" => "Não foi possivel agendar o paciente!");
		}						
		$this->load->view("agendamento", $result);


		
	} 
}
