<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {
	public function index(){
		autoriza();
		$this->load->model("Agendamento_model");
		$dados["agenda"] = $this->Agendamento_model->selectAll();
		$this->load->view('board', $dados);
    
	}
	
}
