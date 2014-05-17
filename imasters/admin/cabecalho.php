<?php
	include '../conexao.php';
	include '../lib.php';
	include '../include/php/funcoes.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo NOME_SITE?></title>

    <!-- Bootstrap -->
    <link href="../include/css/bootstrap.css" rel="stylesheet">
    <link href="../include/css/jumbotron-narrow.css" rel="stylesheet">
    
    <script src="../include/js/jquery-1.11.0.min.js"></script>
    <script src="../include/js/aplication.js"></script>
     <script src="../include/js/mask.js"></script>
    
  </head>
  <body>
	<div class="container">
		<div class="header">
			<ul class="nav nav-pills pull-right">
				<li class="active">
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">About</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
			</ul>
			<h3 class="text-muted">Curso Imasters</h3>
		</div>
		<div class="jumbotron">