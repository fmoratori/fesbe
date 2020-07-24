<?
$id_bol = $_GET['external_reference'];
$status = $_GET['collection_status'];
$forma_pagamento = $_GET['payment_type'];
$id_pagamento = $_GET['collection_id'];
$hora = date("d-m-Y");
$hora = $hora."_".date("H:i:s");
//echo $id_boleto."<br />".$status."<br />".$forma_pagamento."<br />".$id_pagamento;
if($status!=''){
if($status == 'approved'){
$sql88="UPDATE `tb_boleto` SET `situacao` = 'PG',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$hora',
`status_pagto_online` = '$status',
`observacao` = '$id_pagamento'
 WHERE `id` = $id_bol";	
}
if($status == 'pending'){
$sql88="UPDATE `tb_boleto` SET `situacao` = 'PE',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$hora',
`status_pagto_online` = '$status',
`observacao` = '$id_pagamento'
 WHERE `id` = $id_bol";	
}
if($status == 'refunded'){
$sql88="UPDATE `tb_boleto` SET `situacao` = 'NP',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$hora',
`status_pagto_online` = '$status',
`observacao` = '$id_pagamento'
 WHERE `id` = $id_bol";	
}
}
else{
$sql88="UPDATE `tb_boleto` SET `situacao` = 'AG',
`forma_pgto` = '$forma_pagamento',
`data_pagto` = '$hora',
`status_pagto_online` = '$status',
`observacao` = '$id_pagamento'
 WHERE `id` = $id_bol";	
}
$res88 = mysqlexecuta($id,$sql88);

// Abre ou cria o arquivo bloco1.txt
// "a" representa que o arquivo é aberto para ser escrito
$fp = fopen("./logs_pgto/$id_bol.txt", "a");
$texto = "\n id_bol = ".$id_bol."\n Hora = ".$hora."\n status = ".$status."\n forma_pagamento = ".$forma_pagamento."\n id_pagamento = ".$id_pagamento."\n\n\n";
//$texto = $status." *** ".$data_comp." *** ".$email_comp."   \n";
//$texto = "teste de retorno";
$escreve = fwrite($fp, $texto);
// Fecha o arquivo
fclose($fp);
?>
<meta http-equiv="refresh" content=1;url="http://fmsys.com.br/fmsys/fesbe/2/user/principal.php?pg=boletos.php">