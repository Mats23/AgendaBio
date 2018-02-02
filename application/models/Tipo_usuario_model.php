<?php 
class Tipo_usuario_model extends CI_Model{
	public function nivel($id){
		$this->db->select("nivel");
		$this->db->from("tipo_usuario");
		$this->db->where("nivel", $id);
		$usuario = $this->db->get("usuario")->row_array();
		return $usuario;


	}
	public function salvar($cargo){
		$this->db->select("id");
		$this->db->where("cargo", $cargo);
		$id = $this->db->get("tipo_usuario");
		return $id;
	}

	public function listarCargos(){
		$sql = "SELECT cargo, id FROM tipo_usuario";
		$cargo = $this->db->query($sql);
		return $cargo->result_array();

	}

}