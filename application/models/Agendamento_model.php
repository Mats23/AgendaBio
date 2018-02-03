<?php 
class Agendamento_model extends CI_Model{
	public function salvar($data, $id_paciente){
		$data = array(
			"id_paciente" => $id_paciente,
			"data" => $data
		);
		$this->db->insert("agendamento", $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;


	}
	public function selectAll(){
		$sql = "SELECT p.id, p.nome, c.numero, a.data, a.atendido FROM paciente AS p JOIN contato AS c JOIN agendamento AS a WHERE p.id = c.id_paciente GROUP BY nome";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function selectById($id){
		$this->db->select("p.*, c.numero, c.tipo, e.rua, e.bairro, e.cidade, e.numero_residencia, o.informacao, a.data");
		$this->db->from("paciente AS p, contato AS c, endereco AS e, observacao AS o, agendamento AS a");
		$this->db->where("p.id = c.id_paciente");
		$this->db->where("p.id", $id);
		$this->db->group_by("p.nome");
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
		$result = $this->db->update("agendamento", $data);
		return $result;

} 

}