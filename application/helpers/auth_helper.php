<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function autoriza(){
	$ci = get_instance();
	$usuarioLogado = $ci->session->userdata("usuario");
	if(!$usuarioLogado){
			redirect("/");
		}
	}

function permissao(){
	$ci = get_instance();
	$usuarioLogado = $ci->session->userdata("usuario");
	if($usuarioLogado["id_tipo"] == 1){
		redirect("/board");
	}	

}	

