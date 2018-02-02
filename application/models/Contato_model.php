<?php 
class Contato_model extends CI_Model{
	public function salvarContato($ctt, $id, $tipo){
		$data = array(
			"id_paciente" => $id,
			"tipo" => $tipo,
			"numero" => $ctt	
		);
		 $this->db->insert("contato", $data);
		 $insert_id = $this->db->insert_id();

		return $insert_id;
	}
	public function update($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('contato',$data);

	}

}