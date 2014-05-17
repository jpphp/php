<?php 

//Constantes Globais
define ("NOME_SITE" , "Curso Imasters");

//Expressoes Regulares
define ("EXP_EMAIL", "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/");
define ("EXP_REQUIRED", "/^.{3,}$/");

//Arrays
$arrayEstadoCivil = array(1 => "Casado",2 => "Solteiro");

$arrayUF = array("AC"=>"Acre", "AL"=>"Alagoas", "AM"=>"Amazonas", "AP"=>"Amapá","BA"=>"Bahia","CE"=>"Ceará","DF"=>"Distrito Federal","ES"=>"Espírito Santo","GO"=>"Goiás","MA"=>"Maranhão","MT"=>"Mato Grosso","MS"=>"Mato Grosso do Sul","MG"=>"Minas Gerais","PA"=>"Pará","PB"=>"Paraíba","PR"=>"Paraná","PE"=>"Pernambuco","PI"=>"Piauí","RJ"=>"Rio de Janeiro","RN"=>"Rio Grande do Norte","RO"=>"Rondônia","RS"=>"Rio Grande do Sul","RR"=>"Roraima","SC"=>"Santa Catarina","SE"=>"Sergipe","SP"=>"São Paulo","TO"=>"Tocantins");

$arrayTipoCliente = array(1 => "Pessoa Física",2 => "Pessoa Jurídica");
?>