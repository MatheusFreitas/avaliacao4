<?php

function validaPessoa($nome, $cpf, $nascimento, $sexo, $estado, $telefone, $observacoes){

    $formValido = true;

$nome = $_REQUEST["nome"];
$nome = trim($nome);
if(empty($nome)){
    echo " O campo nome é obrigatório. ";
    $formValido = false;
}
if (!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇ\s]+$/", $nome)){
 echo "Formato inválido para o campo nome. </br>";
 $formValido = false;
}
$observacoes = $_REQUEST["observacoes"];
$observacoes = trim($observacoes);
if(empty($observacoes)){
    echo "Por favor, preencha o campo observações. </br>";
    $formValido = false;
}
if (!preg_match("/^[a-zA-ZãÃáÁàÀêÊéÉèÈíÍìÌôÔõÕóÓòÒúÚùÙûÛçÇ\s\\.\\,]+$/", $observacoes)){
 echo "Formato inválido para o campo observações. </br>";
 $formValido = false;
}


if(isset($_REQUEST["validar"])){
        $nascimento = $_REQUEST["nascimento"];
        
}    
$nascimento = trim($nascimento);
if(empty($nascimento)){
    echo "O campo data de nascimento é obrigatório. </br>";
    $formValido = false;
}
if(!preg_match("/^\d{2}\\/\d{2}\\/\d{4}$/", $nascimento)){
    echo "Formato do campo data de nascimento inválido.Utilize o formato dd/mm/aaaa </br>";
    $formValido = false;
}   
    else{
            $pedacos = explode('/', $nascimento);
            $dia = $pedacos[0];
            $mes = $pedacos[1];
            $ano = $pedacos[2];    

            if(!checkdate($mes, $dia, $ano)){
                echo "Data inválida";
                $formValido = false;                           
            }
            
            else{
                
                $dataYmd = $ano.$mes.$dia;
                $nascimentoYmd = date('Ymd');
                 if($nascimentoYmd < $dataYmd){
                    echo "Data de nascimento é no futuro. <br>" ;
                     $formValido = false;  
                }

            }
        }       

$telefone = $_REQUEST["telefone"];
$telefone = trim($telefone);
if(empty($telefone)){
    echo "Por favor, preencha o campo telefone <br>";
    $formValido = false;
}
else if (!preg_match("/^\\(\d{3}\\)\s\d{4}\\-\d{4}$/", $telefone) and !preg_match("/^\d{4}\\-\d{4}$/", $telefone)){
    echo "Formato inválido para o campo telefone. Somente no formato (000) 0000-0000 ou no formato 0000-0000. <br>";
    $formValido = false;
}

$cpf = $_REQUEST["cpf"];
$cpf = trim($cpf);
if(empty($cpf)){
    echo "O campo CPF é obrigatório. </br>";
    $formValido = false;
}
else if(!preg_match("/^\d{3}\\.\d{3}\\.\d{3}\\-\d{2}$/", $cpf)){
    echo "Formato do campo CPF é inválido. Somente no formato 000.000.000-00. <br>";
    $formValido = false;
}
$sexo = null;
if(isset($_REQUEST["sexo"])){
    $sexo = $_REQUEST["sexo"];   
}
else{
    echo "Selecione uma opção no campo sexo. <br>";
    $formValido = false;
}
$estado = $_REQUEST["estado"];
if($estado == -1){
    echo "Por favor, preencha o campo estado <br>";
    $formValido = false;
}
    
    
    return $formValido;
}
?>
