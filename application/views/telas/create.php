<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php
	echo '<div class="well">';
	echo '<h1>Cadastro de Usuários</h1>';
	echo '</div>';
	echo form_open('crud/create');
	echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');
	if ($this->session->flashdata('cadastrook')):
	echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('cadastrook').'</div>';
	endif;
	echo '<div class="form-group">';
	echo form_label('Nome completo: ');
	echo form_input(array('id' => 'nome', 'required' => 'true', 'maxlength' => '50', 'minlength' => '3', 'name' => 'nome','class' => 'form-control', 'placeholder' => 'Seu nome'), set_value('nome'),'autofocus');
	echo form_label('Email: ');
	echo form_input(array('id' => 'email', 'required' => 'true', 'type' => 'email', 'maxlength' => '50', 'name' => 'email','class' => 'form-control', 'placeholder' => 'Seu email'), set_value('email'));
	echo form_label('Login: ');
	echo form_input(array('id' => 'login', 'required' => 'true', 'onkeypress' => 'return alpha(event)', 'maxlength' => '25', 'minlength' => '5','name' => 'login','class' => 'form-control', 'placeholder' => 'Seu login'), set_value('login'));
	echo form_label('Senha: ');
	echo form_password(array('id' => 'senha', 'required' => 'true', 'maxlength' => '10', 'minlength' => '6','name' => 'senha','class' => 'form-control', 'placeholder' => 'Sua senha'), set_value('senha'));
	echo form_label('Repita-senha: ');
	echo form_password(array('id' => 'senha2', 'required' => 'true', 'maxlength' => '10', 'minlength' => '6','name' => 'senha2','class' => 'form-control', 'placeholder' => 'Sua senha novamente', 'onblur' => 'validarSenha(this)'), set_value('senha2'));
	echo '</div>';
  $js  =  'onClick="return validar(event);"'; 
	echo form_submit(array('name' => 'cadastrar','class' => 'btn btn-primary'),'Cadastrar', $js );
	echo form_close();
	?>
	</div>
</div>

<script type="text/javascript">
	
//  função de verificar email
  // function checarEmail(){
  //   if( document.forms[0].email.value=="" 
  //     || document.forms[0].email.value.indexOf('@')==-1 
  //       || document.forms[0].email.value.indexOf('.')==-1 )
  //     {
  //       alert( "Por favor, informe um E-MAIL válido!" );
  //       return false;
  //     }
  // }

   //função  alfanuméricos (bloqueia espaço e caracteres especiais)
  function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || (k >= 48 && k <= 57));
}


  //função de verificar se as senhas são iguais
  function validarSenha(input){
    if(input.value !== document.getElementById("senha").value){
        input.setCustomValidity('Senha não são iguais, favor repita!');
    }else{
        input.setCustomValidity('');
    }
}

//função de verificar se os campos estão vazios 
  function validar(e) {
  var valido = false;
  // pegando o valor do nome pelas ID
  var nome = document.getElementById("nome");
  var email = document.getElementById("email");
  var login = document.getElementById("login");
  var senha = document.getElementById("senha");
  var senha2 = document.getElementById("senha2");

  // verificar se o nome está vazio
  if (nome.value.trim() == "") {
    alert("Nome não informado");
    nome.focus();
    e.preventDefault();      
    return false;
  }
  if (email.value == "") {
    alert("E-mail não informado");
    email.focus();
    e.preventDefault();
    return false;
  }
  if (login.value == "") {
    alert("login não informado");
    login.focus();
    e.preventDefault();
    return false;
  }
  if (senha.value == "") {
    alert("Senha não informada");
    senha.focus();
    e.preventDefault();
    return false;
  }
  if (senha2.value == "") {
    alert("Senha não informada");
    senha2.focus();
    e.preventDefault();
    return false;
  }
  }

  </script>
