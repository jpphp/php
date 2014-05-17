<?php include 'cabecalho.php';	

//print_r ($_POST);
if ($_POST['postado']){
	
	$validado = true;
	
	//Dados Cliente
	$tipo_cliente		= trim(addslashes($_POST['tipo_cliente']));
	$nome 				= trim(addslashes($_POST['nome']));	
	$razao_social		= trim(addslashes($_POST['razao_social']));	
	$estado_civil 		= $_POST['estado_civil'];
	$rg_cpf 			= trim(addslashes($_POST['rg_cpf']));	 
	$cnpj				= trim(addslashes($_POST['cnpj']));
	
	//Dados Contato Cliente
	
	$telefone_fixo 		= trim(addslashes($_POST['cont_telefone_fixo']));
	$telefone_celular 	= trim(addslashes($_POST['cont_telefone_celular']));
	$telefone_celular2 	= trim(addslashes($_POST['cont_telefone_celular2']));
	$email1 			= trim(addslashes($_POST['cont_email1']));		
	$email2 			= trim(addslashes($_POST['cont_email2']));
	 	
	//Dados Endereco Cliente
	
	$logradouro			= trim(addslashes($_POST['end_logradouro']));
	$numero 			= trim(addslashes($_POST['end_numero']));
	$complemento		= trim(addslashes($_POST['end_complemento']));
	$bairro 			= trim(addslashes($_POST['end_bairro']));
	$cidade 			= trim(addslashes($_POST['end_cidade']));
	$uf 				= $_POST['end_uf'];
	$cep 				= trim(addslashes($_POST['end_cep']));
	
	//Validacao de Campos
	
	//echo ($validaCNPJ == 0) ? "CNPJ Invalido" : "CNPJ valido";  
	if (isset($validado)){
			$validaTipoCliente = comboObrigatorio($tipo_cliente,'Tipo Cliente');
			
			if($tipo_cliente == 1){
				$validaNome = campoObrigatorio($nome,'Nome');
				verificaCpf($rg_cpf);
				$razao_social ="null";
				$cnpj = "null";
			}elseif($tipo_cliente == 2){
				$validaRazao = campoObrigatorio($razao_social, 'Raz&atilde;o Social');	
				$validaCNPJR = campoRequired($cnpj, 'CNPJ');		
				$validaCNPJ = validarCNPJ($cnpj);
				/*if ($validaCNPJ == false){
					$erro = "Seu CNPJ esta invalido<br><br>";
		 			//echo $erro;
				} */
				$nome ="null";
				$estado_civil ="null";
				$rg_cpf ="null";
			}
				
			validaEmail($email1);
			validaEmail($email2);
		if($erro != ""){
			echo "<div class='alert alert-danger'>";
			//var_dump($validado);
			$erro = "<strong>O seu formulario possui erros!</strong><br><br>";
			echo $erro;			
			echo "</div>";
		}
		else{
		
			//Query cadastro de Cliente
			$query_cliente = "INSERT INTO tbl_clientes(
							cli_tipo,       cli_nome,	 cli_estado_civil,  cli_rg_cpf, cli_cnpj) 
							VALUES (
							$tipo_cliente,	'$nome',     $estado_civil,	    '$rg_cpf',   '$cnpj'  )";
							
			
							$ret = mysql_query($query_cliente,$conn) or die(mysql_error());
							
							//Pega o ID do ultimo registro inserido
							$cliente_id = mysql_insert_id($conn);
							
			//Query cadastro de contatos				
			$query__contato_cliente = "INSERT INTO tbl_cliente_contato (
							cont_cli_id, cont_telefone_fixo, cont_telefone_celular, cont_telefone_celular2,	cont_email1, cont_email2) 
							VALUES (
							$cliente_id, '$telefone_fixo ',  '$telefone_celular',	'$telefone_celular2',	 '$email1',   '$email1');";
			
							$ret = mysql_query($query__contato_cliente,$conn) or die(mysql_error());
							
			//Query endereco do cliente				
			$query__endereco_cliente = "INSERT INTO tbl_cliente_endereco (
							end_cli_id, end_cep, end_logradouro, end_numero, end_bairro, end_complemento, end_cidade, end_uf) 
							VALUES (
							$cliente_id,'$cep',  '$logradouro',  '$numero',	'$bairro',	 '$complemento',   '$cidade', $uf);";
			 
							$ret = mysql_query($query__endereco_cliente,$conn) or die(mysql_error());
			header("location: cliente_listagem.php?msg=Cadastro Realizado com sucesso!");	
			}							
}	
?>

	<form class="form-horizontal" role="form" id="cliente_cadastro" method="post">
		<fieldset>
		<legend>Dados Cliente:</legend>	
			<input type="hidden" name="postado" id="postado" value="1"/>
			<div class="form-group">
				<label for="tipo_cliente" class="col-sm-2 control-label">Tipo Cliente:</label>
				<div class="col-sm-10">
					<select class="form-control" name="tipo_cliente" id="tipo_cliente">
						<option value=""></option>
					  <?php foreach ($arrayTipoCliente as $id => $label){?>
					  	<option value="<?php echo $id?>" <?php  echo $tipo_cliente==$id ?  'selected=selected' : ''; ?> ><?php echo $label?></option>
					  <?php }?>	
					</select>
				</div>
			</div>
			<div id="dv_nome" class="form-group">
				<label for="nome" class="col-sm-2 control-label">Nome:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $nome?>">
				</div>
			</div>
			<div id="dv_razao" class="form-group">
				<label for="razao_social" class="col-sm-2 control-label">Raz&atilde;o Social:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="razao_social" name="razao_social" value="<?php echo $razao_social?>" placeholder="Raz�o Social:">
				</div>
			</div>
		
			<div id="dv_estadocivil"class="form-group">
				<label for="estado_civil" class="col-sm-2 control-label">Estado Civil:</label>
				<div class="col-sm-10">
					<select class="form-control" name="estado_civil" id="estado_civil">
						<option value=""></option>
					  <?php foreach ($arrayEstadoCivil as $id => $label){?>
					  	<option value="<?php echo $id?>" <?php  echo $estado_civil==$id ?  'selected=selected' : '';?>><?php echo $label?></option>
					  <?php }?>	
					</select>
				</div>
			</div>
			<div id="dv_cpf" class="form-group">
				<label for="rg_cpf" class="col-sm-2 control-label">RG ou CPF:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="rg_cpf" name="rg_cpf" placeholder="Rg ou CPF" value="<?php echo $rg_cpf?>">
				</div>
			</div>
			<div id="dv_cnpj" class="form-group">
				<label for="cnpj" class="col-sm-2 control-label">CNPJ:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" value="<?php echo $cnpj ?>" id="cnpj" name="cnpj" placeholder="CNPJ">
				</div>
			</div>
			
		</fieldset>
		<!--Dados contato-->
		<fieldset>
		<legend>Dados de Contato do Cliente:</legend>
			<div class="form-group">
				<label for="cont_telefone_fixo" class="col-sm-2 control-label">Telefone:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control telefone" id="cont_telefone_fixo" name="cont_telefone_fixo"	placeholder="Telefone" value="<?php echo $telefone_fixo?>">
				</div>
			</div>
			<div class="form-group">
				<label for="cont_telefone_celular" class="col-sm-2 control-label">Telefone Celular:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control telefone" id="cont_telefone_celular" name="cont_telefone_celular" placeholder="Telefone Celular" value="<?php echo $telefone_celular?>">
				</div>
			</div>
			<div class="form-group">
				<label for="telefoneCel2" class="col-sm-2 control-label">Telefone Celular 2:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control telefone" id="cont_telefone_celular2" name="cont_telefone_celular2" placeholder="Telefone Celular 2" value="<?php echo $telefone_celular2?>">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">E-mail:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="cont_email1" name="cont_email1" placeholder="E-mail:" value="<?php echo $email1?>">
				</div>
			</div>
			<div class="form-group">
				<label for="email2" class="col-sm-2 control-label">E-mail 2:</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="cont_email2" name="cont_email2" placeholder="E-mail 2:" value="<?php echo $email2?>">
				</div>
			</div>
		</fieldset>
		<fieldset>
		<legend>Dados de Endere&ccedil;o do Cliente:</legend>
		<div class="form-group">
				<label for="end_logradouro" class="col-sm-2 control-label">Endere&ccedil;o:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="end_logradouro" name="end_logradouro"	placeholder="Endere&ccedil;o" value="<?php echo $logradouro?>">
				</div>
			</div>
			<div class="form-group">
				<label for="end_numero" class="col-sm-2 control-label">N&uacute;mero:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="end_numero" name="end_numero" placeholder="N&uacute;mero" value="<?php echo $numero?>">
				</div>
			</div>
			<div class="form-group">
				<label for="end_complemento" class="col-sm-2 control-label">Complemento:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="end_complemento" name="end_complemento"	placeholder="Complemento" value="<?php echo $complemento?>">
				</div>
			</div>
			<div class="form-group">
				<label for="end_bairro" class="col-sm-2 control-label">Bairro:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="end_bairro" name="end_bairro" placeholder="Bairro" value="<?php echo $bairro?>">
				</div>
			</div>
			<div class="form-group">
				<label for="end_cidade" class="col-sm-2 control-label">Cidade:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="end_cidade" name="end_cidade" placeholder="Cidade" value="<?php echo $cidade?>">
				</div>
			</div>
			<div class="form-group">
				<label for="end_uf" class="col-sm-2 control-label">UF:</label>
				<div class="col-sm-10">
					<select class="form-control" name="end_uf" id="end_uf">
						<option value=""></option>
					  <?php foreach ($arrayUF as  $id => $label){?>
					  	<option value="<?php echo $id?>"<?php  echo $uf ==$id ?  'selected=selected' : '';?>><?php echo $label?></option>
					  <?php }?>	
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="end_cep" class="col-sm-2 control-label">CEP:</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="end_cep" name="end_cep"	placeholder="CEP" value="<?php echo $cep ?>">
				</div>
			</div>
			
		</fieldset>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" id="cadastrar" name="cadastrar" class="btn btn-success">Cadastrar</button>
				<button type="submit" id="atualizar" name="atualizar" class="btn btn-success">Atualizar</button>
				<button type="button" id="cancelar" name="cancelar" class="btn btn-success">Cancelar</button>
			</div>
			
		</div>
	</form>
<?php include 'rodape.php';	?>