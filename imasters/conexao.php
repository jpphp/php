<?php
//Definido Conexão com banco
$server = "localhost";
$usuario = "root";
$senha = "";
$db="curso_imasters";

$conn = mysql_connect($server,$usuario,$senha)

or die(mysql_error());

$database = mysql_select_db($db)

or die(mysql_errno());
?>