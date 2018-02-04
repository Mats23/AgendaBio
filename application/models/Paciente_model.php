<?php 
class Paciente_model extends CI_Model{
	public function salvarPaciente($data){
		 $this->db->insert("paciente", $data);
		 $insert_id = $this->db->insert_id();
		 

		return $insert_id;
	}
	public function selectAll(){
		#$sql = "SELECT  p.*,c.id_paciente,c.numero, c.tipo FROM paciente AS p, contato AS c WHERE c.id_paciente = p.id GROUP BY nome";
		#$usuario = $this->db->query($sql);
		$result = $this->db->get("paciente");
		return $result->result_array();
	}
		

	public function buscarPorNome($nome){
		$sql = "SELECT p.*, c.numero FROM paciente AS p, contato AS c WHERE p.id = c.id_paciente AND nome  LIKE'" . $this->db->escape_like_str($nome) ."%' GROUP BY c.id_paciente";
		$usuario = $this->db->query($sql);
		return $usuario->result_array();
	}

	public function buscarPorMatricula($mp){
		$sql ="SELECT p.*, c.numero FROM paciente AS p, contato AS c WHERE p.id = c.id_paciente AND mp = '". $this->db->escape_like_str($mp) ."' GROUP BY c.id_paciente";
		$usuario = $this->db->query($sql);
		return $usuario->result_array();
	}
	public function selectById($id){
		$this->db->select("p.*, e.rua, e.bairro, e.cidade, e.numero_residencia");
		$this->db->from("paciente AS p, endereco AS e");
		$this->db->where("p.id", $id);
		$result = $this->db->get("paciente")->row_array();
		return $result;
	}
	public function selectCttById($id){
		$sql ="SELECT numero_contato FROM paciente WHERE id = ".$id;
		$result = $this->db->query($sql);
		return $result->row_array();
	}
	public function update($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('paciente',$data);
	}
}
