<?php 
class Observacao_model extends CI_Model{

	public function salvar($obs, $id_agendamento){
		$data = array(
			"id_agendamento" => $id_agendamento,
			"informacao" => $obs
		);
		 $result= $this->db->insert("observacao", $data);
		 return $result;
	}


}