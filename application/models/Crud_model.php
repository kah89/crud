<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Crud_model extends CI_Model{	
		

		
		public function do_insert($dados=NULL){
			if ($dados!=NULL):
				if($this->db->insert('usuario_table',$dados)){
					$this->session->set_flashdata('cadastrook', 'Cadastro efetuado com sucesso');
				}else{
					$this->session->set_flashdata('cadastrook', 'Erro ao inserir');
				}
				
				redirect('crud/create');
			endif;
		}

		
		// FUNÇÃO RESPONSAVEL POR PEGAR TODOS OS REGISTROS DA TABELA 'usuario_table' NA BASE
		public function get_all(){
			return $this->db->get('usuario_table');
		}

		// FUNÇÃO RESPONSAVEL POR IR NA BASE E PEGAR O REGISTRO REFERENTE AO ID
		public function get_byid($id=NULL){
			if ($id!=NULL):
				$this->db->where('id',$id);
				$this->db->limit(1); 
				return $this->db->get('usuario_table');
				else:
					return FALSE;
				endif;
		}

		// FUNÇÃO RESPONSAVEL POR ATUALIZAR O REGISTRO NA BASE
		public function do_update($dados=NULL,$condicao=NULL){
			if ($dados!=NULL && condicao!=NULL):
				$this->db->update('usuario_table',$dados,$condicao);	
			$this->session->set_flashdata('edicaook', 'Cadastro alterado com sucesso');
			redirect(current_url());
			endif;
		}

		// FUNÇÃO RESPONSAVEL POR DELETAR O REGISTRO NA BASE
		public function do_delete($condicao=NULL){
			if($condicao!=NULL):
				$this->db->delete('usuario_table',$condicao);
			$this->session->set_flashdata('excluirok', '<div class="alert alert-success" role="alert">Registro deletado com sucesso</div>');
			redirect('crud/retrieve');
			endif;
		}
		
	}