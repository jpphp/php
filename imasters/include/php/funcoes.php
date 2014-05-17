<?php
include '../conexao.php';
include '../lib.php';
global $erro;
function validaEmail($campo){
	if (!preg_match(EXP_EMAIL, $campo)) {
			$validado = false;	
			$erro .= "Email Inválido<br><br>";
			echo $erro;
		}	
}


function campoObrigatorio($campo,$nomeCampo){
	if (!preg_match(EXP_REQUIRED, $campo)) {			
			$validado = false;
			$erro .= "O campo <strong>{$nomeCampo}</strong> deve possuir no minimo 3 caracteres<br><br>";
			echo $erro;
	}	
}

function campoRequired($campo,$nomeCampo){
	if (!preg_match(EXP_REQUIRED, $campo)) {			
			$validado = false;
			$erro .= "O campo <strong>{$nomeCampo}</strong> deve deve ser preenchido <br><br>";
			echo $erro;
	}	
}

function comboObrigatorio($campo,$nomeCampo){
	if ($campo == '') {
			$validado = false;
			$erro .= "O campo <strong>{$nomeCampo}</strong> deve ser selecionado<br><br>";
			echo $erro;
		} 
}

function verificaCpf($campo){
	switch (strlen($campo)) {
		case 11:
			if(!validaCPF($campo)){
				$validado = false;
				$erro .= "Seu CPF esta invalido<br><br>";
				echo $erro;
			}
			break;
		case 8:
			echo "Você digitou RG<br><br>";
			break;
		default:
			echo "RG ou CPF invalido<br><br>";
			break;
	}
	
}

function validaCPF($cpf)
{	// Verifiva se o número digitado contém todos os digitos
    $cpf = str_pad(preg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
	
	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999')
	{
	return false;
    }
	else
	{   // Calcula os números para verificar se o CPF é verdadeiro
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
 
            $d = ((10 * $d) % 11) % 10;
 
            if ($cpf{$c} != $d) {
                return false;
            }
        }
 
        return true;
    }
}

function validarCNPJ($cnpj){
  $cnpj = str_pad(str_replace(array('.','-','/'),'',$cnpj),14,'0',STR_PAD_LEFT);
  if (strlen($cnpj) != 14){
    return false;
	 
  }else{
    for($t = 12; $t < 14; $t++){
      for($d = 0, $p = $t - 7, $c = 0; $c < $t; $c++){
        $d += $cnpj{$c} * $p;
        $p  = ($p < 3) ? 9 : --$p;
      }
      $d = ((10 * $d) % 11) % 10;
      if($cnpj{$c} != $d){
        return false;
		   $erro .= "Seu CNPJ esta invalido<br><br>";
	 	   echo $erro;
      }
    }
    return true;
  }
  
}