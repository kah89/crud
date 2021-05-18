<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php 
		echo '<div class="well">';
		echo '<h1>Apagar Usuários</h1>';
		echo '</div>';
		$iduser = $this->uri->segment(3);
		if ($iduser==NULL) redirect ('crud/retrieve');
		$query = $this->crud->get_byid($iduser)->row();
		echo form_open("crud/delete/$iduser");
		echo '<div class="form-group">';
		echo form_label('Nome completo: ');
		echo form_input(array('name' => 'nome','class' => 'form-control'), set_value('nome',$query->nome),'disabled="disabled"');
		echo form_label('Email: ');
		echo form_input(array('name' => 'email','class' => 'form-control'), set_value('email', $query->email), 'disabled="disabled"');
		echo form_label('Login: ');
		echo form_input(array('name' => 'login','class' => 'form-control'), set_value('login',$query->login), 'disabled="disabled"');
		echo '</div>';
		echo form_submit(array('name' => 'excluir','class' => 'btn btn-primary'), 'Excluir Registro');
		echo form_hidden('idusuario',$query->id); //campo oculto com id de usuario para usar na condição do controller
		echo form_close();
		?>
	</div>
</div>