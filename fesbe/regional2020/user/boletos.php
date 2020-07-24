<?
$sql_boleto = "SELECT * FROM tb_boleto WHERE user_id = $id_usuario";
$res_boleto = mysqlexecuta($id,$sql_boleto);
?>

<?
if($idioma==1 || $idioma == null || $idioma == 2 || $idioma == 3){
?>
<h1 class="ls-title-intro ls-ico-cart">Boletos</h1>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Categoria</th>
      <th class="hidden-xs">Valor</th>
      <th>Vencimento</th>
      <th class="hidden-xs">Situação do Pagamento</th>
      <th class="hidden-xs">Opções</th>
    </tr>
  </thead>
  <tbody>
<?
    while($row_boleto = mysql_fetch_array($res_boleto)){
$id_bol = $row_boleto['id'];

/**
require_once "../mercado_pago/lib/mercadopago.php";
$resto = $id_bol%2;
if($resto==0 && $row_boleto['valor']<371){
$mp = new MP('7217375728943161', '8Ob4qx6TkI38TaJxAPYvv2w3t7yTav1P');
}
else{ 
    $mp = new MP('1470310757436723', '2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS');
}

$referente = utf8_encode($row_boleto['referente']);
$preference_data = array(
	"items" => array(
		array(
			"id" => $row_boleto['id'],
			"title" => $referente,
			"currency_id" => "BRL",
			"picture_url" =>"",
			"description" => $referente,
			"category_id" => $row_boleto['categoria_id'],
			"quantity" => 1,
			"unit_price" => (float)$row_boleto['valor']
		)
	),
	"payer" => array(
		"name" => $row_usuario['nome'],
		//"surname" => "user-surname",
		"email" => $row_usuario['email'],
		//"date_created" => "2014-07-28T09:50:37.521-04:00",
		"phone" => array(
		//	"area_code" => "11",
			"number" => $row_usuario['tel']
		),
		"identification" => array(
			"type" => "CPF",
			"number" => $row_usuario['cpf']
		),
		"address" => array(
			"street_name" => $row_usuario['endereco'],
			//"street_number" => 123,
			//"zip_code" => "1430"
		)
	),
	"back_urls" => array(
		"success" => $link_usuario."principal.php?pg=get_boletos.php",
		"failure" => $link_usuario."principal.php?pg=get_boletos.php",
		"pending" => $link_usuario."principal.php?pg=get_boletos.php"
	),
	"auto_return" => "approved",
	"payment_methods" => array(
//		"excluded_payment_methods" => array(
	//		array(
		//		"id" => "amex",
			//)
	//	),
		//"excluded_payment_types" => array(
		//	array(
			//	"id" => "ticket"
		//	)
	//	),
		"installments" => 1,
		"default_payment_method_id" => null,
		"default_installments" => null,
	),
	"notification_url" => $link_usuario."retorno2.php?id=$id_bol",
	"external_reference" => $id_bol,
	"expires" => false,
	"expiration_date_from" => null,
	"expiration_date_to" => null
);
$preference = $mp->create_preference($preference_data);
***/

$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';
//$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout'; //Sandbox

//$data = 'email=seuemail@dominio.com.br&amp;token=95112EE828D94278BD394E91C4388F20&amp;currency=BRL&amp;itemId1=0001&amp;itemDescription1=Notebook Prata&amp;itemAmount1=24300.00&amp;itemQuantity1=1&amp;itemWeight1=1000&amp;itemId2=0002&amp;itemDescription2=Notebook Rosa&amp;itemAmount2=25600.00&amp;itemQuantity2=2&amp;itemWeight2=750&amp;reference=REF1234&amp;senderName=Jose Comprador&amp;senderAreaCode=11&amp;senderPhone=56273440&amp;senderEmail=comprador@uol.com.br&amp;shippingType=1&amp;shippingAddressStreet=Av. Brig. Faria Lima&amp;shippingAddressNumber=1384&amp;shippingAddressComplement=5o andar&amp;shippingAddressDistrict=Jardim Paulistano&amp;shippingAddressPostalCode=01452002&amp;shippingAddressCity=Sao Paulo&amp;shippingAddressState=SP&amp;shippingAddressCountry=BRA';
/*
Caso utilizar o formato acima remova todo código abaixo até instrução $data = http_build_query($data);
*/

//$data['email'] = 'femoratori@hotmail.com'; //sandbox
//$data['token'] = '1ADFFBCFC90D46088087D3E2624436EF'; //Sandbox
//$data['receiverEmail'] = 'femoratori@hotmail.com'; //Sandbox
$resto = $row_boleto['id']%4;

if($resto==10 && $row_boleto['valor']<200){
$data['token'] = 'F6A14731FE8548B59E792A721E6B0109';
$data['email'] = 'fmsys@fmsys.com.br';
$data['receiverEmail'] = 'fmsys@fmsys.com.br';
}
else{
$data['email'] = 'weber@fesbe.org.br';
$data['token'] = 'f019c7df-ff29-433b-b715-b48a39ee9c3c3de3b4004fa58da92b49f652054208d93061-baee-4a28-a42d-d0b422988a9b';
$data['receiverEmail'] = 'weber@fesbe.org.br';
}
$data['currency'] = 'BRL';
$data['itemId1'] = $row_boleto['categoria'];
$data['itemDescription1'] = $row_boleto['referente'];
$data['itemAmount1'] = $row_boleto['valor'].'.00';
$data['itemQuantity1'] = '1';
//$data['itemWeight1'] = '1000';
$data['reference'] = $row_boleto['id'];
$data['senderName'] = $row_usuario['nome'];
//$data['senderCPF'] = $row_usuario['cpf'];
//$data['senderAreaCode'] = '';
//$data['senderPhone'] = $row_usuario['celular'];
$data['senderEmail'] = $row_usuario['email'];
$data['shippingAddressRequired'] = 'false';
$data['excludePaymentMethodGroup'] = 'DEPOSIT,EFT';
$data['redirectURL'] = $link_usuario.'principal.php?pg=boletos.php';
$data['notificationURL'] = $link_usuario.'principal.php?pg=get_boletos.php';
//$data['shippingAddressRequired'] = 'false';
$data = http_build_query($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$xml= curl_exec($curl);

if($xml == 'Unauthorized'){
    //Insira seu código de prevenção a erros
    header('Location: erro.php?tipo=autenticacao&xml='.$xml);
    exit;//Mantenha essa linha
}

curl_close($curl);

$xml= simplexml_load_string($xml);
if(count($xml -> error) > 0){
    //Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
    header('Location: erro.php?tipo=dadosInvalidos&xml='.$xml);
    exit;
}


//header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);
$link = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code;
//header('Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code); //sandbox
//$link = 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code; //sandbox
?>
    <tr>
      <td><? echo $row_boleto['referente']; ?></td>
      <td class="hidden-xs"><? echo "R$ ".$row_boleto['valor'].",00"; ?></td>
      <td><? echo date('d/m/Y', strtotime($row_boleto['vencimento'])); ?></td>
<?
if($row_boleto['situacao']=='PG'){
?>
      <td class="hidden-xs"><? echo "Pago" ?></td>
<?
}

?>

<?

if($row_boleto['situacao']=='NP'){

?>

      <td class="hidden-xs"><? echo "Não Pago" ?></td>

<?

}

?>
<?

if($row_boleto['situacao']=='IS'){

?>

      <td class="hidden-xs"><? echo "Isento" ?></td>

<?

}

?>

<?

if($row_boleto['situacao']=='PE'){

?>

      <td class="hidden-xs"><? echo "Aguardando Pagamento" ?></td>

<?

}

?>



<?

if($row_boleto['situacao']!='PG'){

?>

      <td><a href='<? echo $link; ?>'target='_blank'> <b>Clique Aqui Para Realizar o Pagamento</b></a><!--b>Pagamento diretamente na secretaria do evento.</b-->
</td>

<?

}

else{

?>

<td></td>

<?

}

?>

    </tr>



<?        

    }

?>  

  </tbody>

</table>
<?
}
?>




<?
/***
if($idioma==2){
?>
<h1 class="ls-title-intro ls-ico-cart">Payments</h1>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Category</th>
      <th class="hidden-xs">Price</th>
      <th>Expiration Date</th>
      <th class="hidden-xs">Status</th>
      <th class="hidden-xs">Options</th>
    </tr>
  </thead>
  <tbody>
<?
    while($row_boleto = mysql_fetch_array($res_boleto)){
$id_bol = $row_boleto['id'];


require_once "../mercado_pago/lib/mercadopago.php";
$resto = $id_bol%2;;
if($resto==0 && $row_boleto['valor']<371){
$mp = new MP('7217375728943161', '8Ob4qx6TkI38TaJxAPYvv2w3t7yTav1P');
}
else{ 
    $mp = new MP('1470310757436723', '2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS');
}

$referente = utf8_encode($row_boleto['referente']);

$preference_data = array(

	"items" => array(

		array(

			"id" => $row_boleto['id'],

			"title" => $referente,

			"currency_id" => "BRL",

			"picture_url" =>"",

			"description" => $referente,

			"category_id" => $row_boleto['categoria_id'],

			"quantity" => 1,

			"unit_price" => (float)$row_boleto['valor']

		)

	),

	"payer" => array(

		"name" => $row_usuario['nome'],

		//"surname" => "user-surname",

		"email" => $row_usuario['email'],

		//"date_created" => "2014-07-28T09:50:37.521-04:00",

		"phone" => array(

		//	"area_code" => "11",

			"number" => $row_usuario['tel']

		),

		"identification" => array(

			"type" => "CPF",

			"number" => $row_usuario['cpf']

		),

		"address" => array(

			"street_name" => $row_usuario['endereco'],

			//"street_number" => 123,

			//"zip_code" => "1430"

		)

	),

	"back_urls" => array(

		"success" => "http://fmsys.com.br/fmsys/fesbe/regional2020/user/principal.php?pg=get_boletos.php",

		"failure" => "http://fmsys.com.br/fmsys/fesbe/regional2020/user/principal.php?pg=get_boletos.php",

		"pending" => "http://fmsys.com.br/fmsys/fesbe/regional2020/user/principal.php?pg=get_boletos.php"

	),

	"auto_return" => "approved",

	"payment_methods" => array(

//		"excluded_payment_methods" => array(

	//		array(

		//		"id" => "amex",

			//)

	//	),

		//"excluded_payment_types" => array(

		//	array(

			//	"id" => "ticket"

		//	)

	//	),

		"installments" => 1,

		"default_payment_method_id" => null,

		"default_installments" => null,

	),



	"notification_url" => "http://www.fmsys.com.br/fmsys/fesbe/regional2020/user/retorno2.php?id=$id_bol",

	"external_reference" => $id_bol,

	"expires" => false,

	"expiration_date_from" => null,

	"expiration_date_to" => null

);



$preference = $mp->create_preference($preference_data);





?>

    <tr>

      <td><? echo $row_boleto['referente']; ?></td>

      <td class="hidden-xs"><? echo "R$ ".$row_boleto['valor'].",00"; ?></td>

      <td><? echo date('d/m/Y', strtotime($row_boleto['vencimento'])); ?></td>

<?

if($row_boleto['situacao']=='PG'){

?>

      <td class="hidden-xs"><? echo "Pago" ?></td>

<?

}

?>

<?

if($row_boleto['situacao']=='NP'){

?>

      <td class="hidden-xs"><? echo "Não Pago" ?></td>

<?

}

?>
<?

if($row_boleto['situacao']=='IS'){

?>

      <td class="hidden-xs"><? echo "Isento" ?></td>

<?

}

?>

<?

if($row_boleto['situacao']=='PE'){

?>

      <td class="hidden-xs"><? echo "Aguardando Pagamento" ?></td>

<?

}

?>



<?

if($row_boleto['situacao']!='PG'){

?>

      <td><a href="<?php echo $preference["response"]["init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall"><b>Clique Aqui Para Realizar o Pagamento</b></a>
<!--<td><b>PAGAMENTO SOMENTE NA SECRETARIA DO EVENTO </b></td>-->
		<script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>

</td>

<?

}

else{

?>

<td></td>

<?

}

?>

    </tr>



<?        

    }

?>  

  </tbody>

</table>
<?
}
?>






<?
if($idioma==2){
?>
<h1 class="ls-title-intro ls-ico-cart">Payments</h1>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Category</th>
      <th class="hidden-xs">Price</th>
      <th>Expiration Date</th>
      <th class="hidden-xs">Status</th>
      <th class="hidden-xs">Options</th>
    </tr>
  </thead>
  <tbody>
<?
    while($row_boleto = mysql_fetch_array($res_boleto)){
$id_bol = $row_boleto['id'];


require_once "../mercado_pago/lib/mercadopago.php";
$resto = $id_bol%2;;
if($resto==0 && $row_boleto['valor']<371){
$mp = new MP('7217375728943161', '8Ob4qx6TkI38TaJxAPYvv2w3t7yTav1P');
}
else{ 
    $mp = new MP('1470310757436723', '2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS');
}

$referente = utf8_encode($row_boleto['referente']);

$preference_data = array(

	"items" => array(

		array(

			"id" => $row_boleto['id'],

			"title" => $referente,

			"currency_id" => "BRL",

			"picture_url" =>"",

			"description" => $referente,

			"category_id" => $row_boleto['categoria_id'],

			"quantity" => 1,

			"unit_price" => (float)$row_boleto['valor']

		)

	),

	"payer" => array(

		"name" => $row_usuario['nome'],

		//"surname" => "user-surname",

		"email" => $row_usuario['email'],

		//"date_created" => "2014-07-28T09:50:37.521-04:00",

		"phone" => array(

		//	"area_code" => "11",

			"number" => $row_usuario['tel']

		),

		"identification" => array(

			"type" => "CPF",

			"number" => $row_usuario['cpf']

		),

		"address" => array(

			"street_name" => $row_usuario['endereco'],

			//"street_number" => 123,

			//"zip_code" => "1430"

		)

	),

	"back_urls" => array(

		"success" => "http://fmsys.com.br/fmsys/fesbe/regional2018/user/principal.php?pg=get_boletos.php",

		"failure" => "http://fmsys.com.br/fmsys/fesbe/regional2018/user/principal.php?pg=get_boletos.php",

		"pending" => "http://fmsys.com.br/fmsys/fesbe/regional2018/user/principal.php?pg=get_boletos.php"

	),

	"auto_return" => "approved",

	"payment_methods" => array(

//		"excluded_payment_methods" => array(

	//		array(

		//		"id" => "amex",

			//)

	//	),

		//"excluded_payment_types" => array(

		//	array(

			//	"id" => "ticket"

		//	)

	//	),

		"installments" => 1,

		"default_payment_method_id" => null,

		"default_installments" => null,

	),



	"notification_url" => "http://www.fmsys.com.br/fmsys/fesbe/regional2018/user/retorno2.php?id=$id_bol",

	"external_reference" => $id_bol,

	"expires" => false,

	"expiration_date_from" => null,

	"expiration_date_to" => null

);



$preference = $mp->create_preference($preference_data);





?>

    <tr>

      <td><? echo $row_boleto['referente']; ?></td>

      <td class="hidden-xs"><? echo "R$ ".$row_boleto['valor'].",00"; ?></td>

      <td><? echo date('d/m/Y', strtotime($row_boleto['vencimento'])); ?></td>

<?

if($row_boleto['situacao']=='PG'){

?>

      <td class="hidden-xs"><? echo "Pago" ?></td>

<?

}

?>

<?

if($row_boleto['situacao']=='NP'){

?>

      <td class="hidden-xs"><? echo "Não Pago" ?></td>

<?

}

?>
<?

if($row_boleto['situacao']=='IS'){

?>

      <td class="hidden-xs"><? echo "Isento" ?></td>

<?

}

?>

<?

if($row_boleto['situacao']=='PE'){

?>

      <td class="hidden-xs"><? echo "Aguardando Pagamento" ?></td>

<?

}

?>



<?

if($row_boleto['situacao']!='PG'){

?>

      <td><a href="<?php echo $preference["response"]["init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall"><b>Clique Aqui Para Realizar o Pagamento</b></a>
<!--<td><b>PAGAMENTO SOMENTE NA SECRETARIA DO EVENTO </b></td>-->
		<script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>

</td>

<?

}

else{

?>

<td></td>

<?

}

?>

    </tr>



<?        

    }

?>  

  </tbody>

</table>
<?
}
?>



<?
if($idioma==3){
?>
<h1 class="ls-title-intro ls-ico-cart">Pagos</h1>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Category</th>
      <th class="hidden-xs">Precio</th>
      <th>	Vencimiento de La Factura</th>
      <th class="hidden-xs">Status</th>
      <th class="hidden-xs">Opciones</th>
    </tr>
  </thead>
  <tbody>
<?
    while($row_boleto = mysql_fetch_array($res_boleto)){
$id_bol = $row_boleto['id'];


require_once "../mercado_pago/lib/mercadopago.php";
$resto = $id_bol%2;;
if($resto==0 && $row_boleto['valor']<371){
$mp = new MP('7217375728943161', '8Ob4qx6TkI38TaJxAPYvv2w3t7yTav1P');
}
else{ 
    $mp = new MP('1470310757436723', '2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS');
}

$referente = utf8_encode($row_boleto['referente']);

$preference_data = array(

	"items" => array(

		array(

			"id" => $row_boleto['id'],

			"title" => $referente,

			"currency_id" => "BRL",

			"picture_url" =>"",

			"description" => $referente,

			"category_id" => $row_boleto['categoria_id'],

			"quantity" => 1,

			"unit_price" => (float)$row_boleto['valor']

		)

	),

	"payer" => array(

		"name" => $row_usuario['nome'],

		//"surname" => "user-surname",

		"email" => $row_usuario['email'],

		//"date_created" => "2014-07-28T09:50:37.521-04:00",

		"phone" => array(

		//	"area_code" => "11",

			"number" => $row_usuario['tel']

		),

		"identification" => array(

			"type" => "CPF",

			"number" => $row_usuario['cpf']

		),

		"address" => array(

			"street_name" => $row_usuario['endereco'],

			//"street_number" => 123,

			//"zip_code" => "1430"

		)

	),

	"back_urls" => array(

		"success" => "http://fmsys.com.br/fmsys/fesbe/regional2018/user/principal.php?pg=get_boletos.php",

		"failure" => "http://fmsys.com.br/fmsys/fesbe/regional2018/user/principal.php?pg=get_boletos.php",

		"pending" => "http://fmsys.com.br/fmsys/fesbe/regional2018/user/principal.php?pg=get_boletos.php"

	),

	"auto_return" => "approved",

	"payment_methods" => array(

//		"excluded_payment_methods" => array(

	//		array(

		//		"id" => "amex",

			//)

	//	),

		//"excluded_payment_types" => array(

		//	array(

			//	"id" => "ticket"

		//	)

	//	),

		"installments" => 1,

		"default_payment_method_id" => null,

		"default_installments" => null,

	),



	"notification_url" => "http://www.fmsys.com.br/fmsys/fesbe/regional2018/user/retorno2.php?id=$id_bol",

	"external_reference" => $id_bol,

	"expires" => false,

	"expiration_date_from" => null,

	"expiration_date_to" => null

);



$preference = $mp->create_preference($preference_data);





?>

    <tr>

      <td><? echo $row_boleto['referente']; ?></td>

      <td class="hidden-xs"><? echo "R$ ".$row_boleto['valor'].",00"; ?></td>

      <td><? echo date('d/m/Y', strtotime($row_boleto['vencimento'])); ?></td>

<?

if($row_boleto['situacao']=='PG'){

?>

      <td class="hidden-xs"><? echo "Pago" ?></td>

<?

}

?>

<?

if($row_boleto['situacao']=='NP'){

?>

      <td class="hidden-xs"><? echo "Não Pago" ?></td>

<?

}

?>
<?

if($row_boleto['situacao']=='IS'){

?>

      <td class="hidden-xs"><? echo "Isento" ?></td>

<?

}

?>

<?

if($row_boleto['situacao']=='PE'){

?>

      <td class="hidden-xs"><? echo "Aguardando Pagamento" ?></td>

<?

}

?>



<?

if($row_boleto['situacao']!='PG'){

?>

      <td><a href="<?php echo $preference["response"]["init_point"]; ?>" name="MP-Checkout" class="orange-ar-m-sq-arall"><b>Clique Aqui Para Realizar o Pagamento</b></a>
<!--<td><b>PAGAMENTO SOMENTE NA SECRETARIA DO EVENTO </b></td>-->
		<script type="text/javascript" src="//resources.mlstatic.com/mptools/render.js"></script>

</td>

<?

}

else{

?>

<td></td>

<?

}

?>

    </tr>



<?        

    }

?>  

  </tbody>

</table>
<?

}
**/
?>

