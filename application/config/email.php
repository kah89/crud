<?php
 //Recupera os dados do formulário
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com'; //Change for your specific needs
$config['smtp_port'] = 587; //Change for your specific needs
$config['smtp_user'] = 'SEUEMAIL@gmail.com'; //Change for your specific needs
$config['smtp_pass'] = 'SUA SENHA'; //Change for your specific needs
$config['charset'] = 'iso-8859-1';
$config['mailtype'] = 'html'; //This can be set as 'html' or 'text'

 //Inicia o processo de configuração para o envio do email
 $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
 $config['newline']  = "\r\n";
 $config['crlf']     = "\r\n";
 $config['charset']  = 'UTF-8';
?>