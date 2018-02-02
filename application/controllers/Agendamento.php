<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agendamento extends CI_Controller {

	public function index()
	{
		$this->load->model('Paciente_model');
		$result["paciente"] = $this->Paciente_model->selectAll();
		$this->load->view('agendamento', $result);
	}
	public function agendar(){
		$this->load->model("Paciente_model");
		$id = $this->input->post("id_paciente");
		$data["dados"] = $this->Paciente_model->selectById($id);
		$this->load->view("agendar_paciente", $data);
	}
	public function salvar(){
		$this->load->model("Agendamento_model");
		$this->load->model("Observacao_model");
		$this->load->model('Paciente_model');
		$id = $this->input->post("id");
		$data = $this->input->post("dt");
		$data = implode("-",array_reverse(explode("/",$data)));
		$tipo_atendimento = $this->input->post("tipo_atendimento");
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
		$this->load->model("Agendamento_model");
		#$this->input->post("id");
		#$this->Agendamento_model->buscarPorNome($id);
		$this->load->view("board", $dados);
	}
	public function detalhe(){
		$id_agendamento = $this->input->post("id_detalhe");
		$this->load->model("Agendamento_model");
		$result["info"] = $this->Agendamento_model->selectById($id_agendamento);
		$result["info"]["data"] = implode("/",array_reverse(explode("-",$result["info"]["data"])));
		$this->load->view("detalhe_agendamento", $result);
	}
	public function atendido(){
		$this->load->model("Agendamento_model");
		$id = $this->input->post("id_paciente");
		$result = $this->Agendamento_model->atendimento($id);
		$this->load->view("board");
	}
}
