<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php 
		echo '<div class="well">';
		echo '<h1>Lista de Usuários</h1>';
		echo '</div>';
		if ($this->session->flashdata('excluirok')):
			echo '<p>'.$this->session->flashdata('excluirok').'</p>';
		endif;
		$template = array(
			'table_open' => '<table class="table table-striped">'
		);
		$this->table->set_template($template);
		$this->table->set_heading('ID','Nome','Email','Login','Operações');
		foreach ($usuarios as $linha):
			if($linha->nivel ==0){
			$this->table->add_row($linha->id, $linha->nome, $linha->email,$linha->login, anchor("crud/update/$linha->id",'Editar').' - '.anchor("crud/delete/$linha->id",'Excluir'));
			}else{
				$this->table->add_row($linha->id, $linha->nome, $linha->email,$linha->login);
			}
		endforeach;
		echo $this->table->generate();
		?>
	</div>
</div>