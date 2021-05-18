<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

if(!function_exists('set_msg')){
	//seta uma mensagem via session para ser lida posteriormente
	function set_msg($msg=NULL){
		$ci = & get_instance();
		$ci->session->set_userdata('aviso', $msg);
	}
}


if(!function_exists('get_msg')){
	//retorna uma mensagem definida pela função set_msg
	function get_msg($destroy=TRUE){
	$ci = & get_instance();
	$retorno = $ci->session->userdata('aviso');
	if($destroy) $ci->session->unset_userdata('aviso');
	return $retorno;	
	}
}

if(!function_exists('verificar_login')):
	//verificar se o usuario esta logado, caso não esteja redirecionar para outra pagina
	function verificar_login($redirect='setup/login'){
	$ci = & get_instance();
	if($ci->session->userdata('logged') != TRUE):
		set_msg('<p>Acesso restrito! faça login para continuar.</p>');
		redirect($redirect, 'refresh');
		
	endif;
	}
endif;

if(!function_exists('config_uplod')){
	//define as configurações para upload de imagens/arquivos
	function config_upload($path='./uploads/', $types='jpg|png', $size=512){
		$config['upload_path'] = $path;
		$config['allowed_types'] = $types;
		$config['max_size'] = $size;
		return $config;
	}
}


if(!function_exists('to_bd')){
	//codificar o html para salvar no banco de dados
	function to_bd($string=NULL){
		return htmlentities($string);
	}
}

if(!function_exists('to_html')){
	//codificar o html e remover barras invertidas do conteudo
	function to_html($string=NULL){
		return html_entity_decode($string);
	}
}

if(!function_exists('resumo_post')){
	//gerar um texto parcial a partir do conteudo de um post
	function resumo_post($string=NULL, $tamanho=100){
		$string = to_html($string);
		$string = strip_tags($string);
		$string = substr($string, 0, $tamanho);
		return $string;
	}
}


