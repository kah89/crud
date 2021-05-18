<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Crud extends CI_Controller {

		// A FUNÇÃO CARREGA AS LIBRARY,HELPES E O MODEL
		public function __construct(){
			parent:: __construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('array');
			$this->load->model('crud_model','crud');
			$this->load->library('session');
			$this->load->library('table');
		}
		
		
		public function index(){
			$dados = array(
				'titulo' => 'CRUD com CodeIgniter',
				'tela' => '',
				);
			$this->load->view('crud',$dados);
		}
		
		

		//VIEW CREATE, REALIZA A VALIDAÇÃO DO FORMULARIO, PEGANDO DADOS E INSERINDO NO BANCO ATRAVES DA FUNCTION 'DO_INSERT' QUE ESTÁ NO MODEL
		public function create(){
			$this->form_validation->set_rules('nome', 'NOME', 'trim|required|max_length[50]|ucwords');
			$this->form_validation->set_message('is_unique','Este %s cadastrado no sistema');			
			$this->form_validation->set_rules('email', 'EMAIL', 'trim|required|max_length[50]|strtolower|valid_email|is_unique[usuario_table.email]');
			// $this->form_validation->set_rules('email', 'EMAIL', 'trim|required|max_length[50]|strtolower|valid_email');
			$this->form_validation->set_rules('login', 'LOGIN', 'trim|required|max_length[25]|strtolower|is_unique[usuario_table.login]');
			$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|strtolower');
			$this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
			$this->form_validation->set_rules('senha2', 'REPITA SENHA', 'trim|required|strtolower|matches[senha]');
			
			if($this->form_validation->run()==TRUE):
				$dados = elements(array('nome','email','login','senha'),$this->input->post());
				$dados['senha'] = md5($dados['senha']);
				$this->crud->do_insert($dados);
			endif;	

			$dados = array(
				'titulo' => 'CRUD &raquo; Create',
				'tela' => 'create',
			);
			$this->load->view('crud',$dados);
		}	

		//CARREGANDO A VIEW RETRIEVE E CHAMANDO A FUNCTION 'GET_ALL' QUE TRAZ TODOS OS REGISTROS QUE ESTÁ NO MODEL
		public function retrieve(){
		
		$dados = array(
			'titulo' => 'CRUD &raquo; Retrieve',
			'tela' => 'retrieve',
			'usuarios' => $this->crud->get_all()->result(),
			);
		$this->load->view('crud',$dados);
		}

		//CARREGANDO A VIEW UPDATE, REALIZANDO A VALIDAÇÃO DO FORMULARIO, E ATUALIZANDO NO BANCO CHAMANDO A FUNCTION 'DO_UPDATE' QUE ESTÁ NO MODEL
		public function update(){
			$this->form_validation->set_rules('nome', 'NOME', 'trim|required|max_length[50]|ucwords');
			$this->form_validation->set_rules('senha', 'SENHA', 'trim|required|strtolower');
			$this->form_validation->set_message('matches','O campo %s está diferente do campo %s');
			$this->form_validation->set_rules('senha2', 'REPITA SENHA', 'trim|required|strtolower|matches[senha]');

			if($this->form_validation->run()==TRUE):
				$dados = elements(array('nome','senha'),$this->input->post());
				$dados['senha'] = md5($dados['senha']);
				$this->crud->do_update($dados, array('id'=>$this->input->post('idusuario')));
			endif;	

			$dados = array(
				'titulo' => 'CRUD &raquo; Update',
				'tela' => 'update',
			);
			$this->load->view('crud',$dados);
		}

		//A VIEW DELETE, VALIDA SE FOI ENVIADO VIA POST ALGUM ID E CASO TRUE ACESSA A FUNCTION 'DO_DELETE' NO MODEL E APAGA O REGISTRO REFERENTE AO ID.
		public function delete(){
			if ($this->input->post('idusuario')>0):
				$this->crud->do_delete(array('id'=>$this->input->post('idusuario')));
			endif;

			$dados = array(
				'titulo' => 'CRUD &raquo; Delete',
				'tela' => 'delete',
			);
			$this->load->view('crud',$dados);
		}
	}