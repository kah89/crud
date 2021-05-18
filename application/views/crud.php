<?php 
	$this->load->view('includes/header'); //Carregando o conteúdo da view header.php
	$this->load->view('includes/menu'); //Carregando o conteúdo da view menu.php
	if($tela!='') $this->load->view('telas/'.$tela); //Carregando a view setada pela váriavel $tela via parâmetro no controller
	$this->load->view('includes/footer'); //Carregando o conteúdo da view footer.php
 ?>