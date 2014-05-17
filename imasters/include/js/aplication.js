
$(document).ready(function(){
	$("#tipo_cliente").change(function(){
			$("#dv_nome").hide();
			$("#dv_razao").hide();
			$("#dv_cpf").hide();
			$("#dv_cnpj").hide();
			$("#dv_estadocivil").hide();
		var $tipo_cliente = (this.value);
		if ($tipo_cliente == 1){
			$("#dv_nome").show();
			$("#dv_cpf").show();
			$("#dv_estadocivil").show();
		}else if($tipo_cliente == 2){
			$("#dv_razao").show();
			$("#dv_cnpj").show();
		}
	});
	$("#tipo_cliente").change();
	
	//Mascaras dos campos
	$("#cnpj").mask("99.999.999/9999-99");
    $("#cpf").mask("999.999.999-99");	
	$("#end_cep").mask("99999-999");
    $(".telefone").mask("(99) 9999-9999");
});
