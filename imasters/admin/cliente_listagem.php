<?php
include 'cabecalho.php';
$msg ="";

if ($_REQUEST['msg']){
	echo "<div class='alert alert-danger'>";
	$msg=$_REQUEST['msg'];
	echo $msg;
	echo "</div>";
}

?>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Estado Civil</th>
				<th>CPF</th>
				<th>Op&ccedil;&otilde;es</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = "SELECT * FROM tbl_clientes";
				$ret = mysql_query($query) or die(mysql_error());
			 	while ($dados=mysql_fetch_assoc($ret)){
			 ?>
			<tr>
				<td><?php echo $dados['cli_id']?></td>
				<td><?php echo $dados['cli_nome']?></td>
				<td><?php echo $arrayEstadoCivil[$dados['cli_estado_civil']]?></td>
				<td><?php echo $dados['cli_rg_cpf']?></td>
				<td></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>		
<?php include 'rodape.php';		