<?php 
class Endereco_model extends CI_Model{
	public function salvar($id_paciente,$rua, $bairro, $cidade, $numero){
		$data = array(
			"id_paciente" => $id_paciente,
			"rua" => $rua,
			"bairro" => $bairro,
			"cidade" =>$cidade,
			"numero_residencia" => $numero	
		);
		 
		 $result = $this->db->insert("endereco", $data);

		return $result;
	}

}