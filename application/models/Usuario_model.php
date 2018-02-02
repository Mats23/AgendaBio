<?php 
class Usuario_model extends CI_Model{
	public function validarUser($email, $senha){
		$this->db->where("email", $email);
		$this->db->where("senha", $senha);
		$usuario = $this->db->get("usuario")->row_array();
        return $usuario;

	}
	public function salvar($nome, $email,$id , $senha){
		$senhaMD5 = md5($senha);
		$this->db->select("email");
		$this->db->where('email', $email);
		$existe = $this->db->get("usuario")->row_array();
		if($existe){
			$result = FALSE;
			return $result;
		}else{
		$data = array(
			"nome" => $nome,
			"id_tipo" => $id,
			"email" => $email,
			"senha" => $senhaMD5
		);
		$result = $this->db->insert("usuario", $data);
		return $result;
		}
	}
	public function buscarUsuario($nome){
		$sql = "SELECT a.nome, a.email, a.id, b.cargo FROM usuario AS a, tipo_usuario AS b  WHERE  a.id_tipo = b.id AND a.nome LIKE'". $this->db->escape_like_str($nome) ."%'";
		$usuario = $this->db->query($sql);
		return $usuario->result_array();
	}
	public function selectAll(){
		$sql = "SELECT a.nome, a.email, a.id,b.cargo FROM usuario AS a, tipo_usuario AS b  WHERE  a.id_tipo = b.id";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	public function update($id ,$data){
		$this->db->where("id", $id);
		return $this->db->update("usuario", $data);


	}
	public function selectById($id){
		$this->db->select("u.id,u.nome, u.email, t.cargo");
		$this->db->from("usuario AS u,tipo_usuario AS t");
		$this->db->where("u.id_tipo = t.id");
		$this->db->where("u.id", $id);
		$result = $this->db->get("usuario")->row_array();
		return $result;
	}
	
}