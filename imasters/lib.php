<?php 

//Constantes Globais
define ("NOME_SITE" , "Curso Imasters");

//Expressoes Regulares
define ("EXP_EMAIL", "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/");
define ("EXP_REQUIRED", "/^.{3,}$/");

//Arrays
$arrayEstadoCivil = array(1 => "Casado",2 => "Solteiro");

$arrayUF = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amap�","BA"=>"Bahia","CE"=>"Cear�","DF"=>"Distrito Federal","ES"=>"Esp�rito Santo","GO"=>"Goi�s","MA"=>"Maranh�o","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Par�","PB"=>"Para�ba","PR"=>"Paran�","PE"=>"Pernambuco","PI"=>"Piau�","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rond�nia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"S�o Paulo","TO"=>"Tocantins");

$arrayTipoCliente = array(1 => "Pessoa F�sica",2 => "Pessoa Jur�dica");
?>