<?php 
class Agendamento_model extends CI_Model{
	public function salvar($data, $id_paciente){
		$data = array(
			"id_paciente" => $id_paciente,
			"data" => $data,
			"atendido" => 0
		);
		$this->db->insert("agendamento", $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;


	}
	public function selectAll(){
		$sql = "SELECT p.id, p.nome, p.numero_contato, a.data, a.atendido FROM paciente AS p JOIN agendamento AS a WHERE p.id = a.id_paciente GROUP BY nome";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function selectById($id){
		$this->db->select("p.*, e.rua, e.bairro, e.cidade, e.numero_residencia, a.data, a.atendido,  o.informacao");
		$this->db->from("paciente AS p, endereco AS e, agendamento AS a, observacao AS o ");
		$this->db->where("p.id", $id);
		$this->db->where("p.id = a.id_paciente AND p.id = e.id_paciente AND a.id = o.id_agendamento ");
		$result = $this->db->get("paciente")->row_array();
		return $result;
	}
	public function buscarPorNome($nome){
		$sql = "SELECT p.nome, c.numero, a.data FROM paciente AS p JOIN contato AS c JOIN agendamento 
		AS a WHERE p.id = c.id_paciente AND p.nome LIKE '".$this->db->escape_like_str($nome)."%'' GROUP BY nome";
		$result = $this->db->query($sql);
		return $result->result_array();

	}
	public function deletar($id){
		$this->db->where("id", $id);
		$result = $this->db->delete("paciente");
		

}
	public function atendimento($id){
		$this->db->where("id_paciente", $id);
		$data = array("atendido" => 1);
		return $this->db->update("agendamento", $data);

} 

	public function selectByDataAgendamento($data){
		$this->db->select("id");
		 $this->db->where("data", $data);
		$result = $this->db->get("agendamento")->row_array();
		return $result;

	}
	public function remarcar($dt, $id){
		$this->db->where("id_paciente", $id);
		$data = array("data" => $dt,
						"atendido" => 0); 
		return $this->db->update("agendamento", $data);
		 

}
}