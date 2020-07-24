<?
$sql_boleto = "SELECT * FROM tb_boleto WHERE user_id = $id_usuario";
$res_boleto = mysqlexecuta($id,$sql_boleto);
?>

<?
if($idioma==1 || $idioma == null){
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


require_once "../mercado_pago/lib/mercadopago.php";
//$resto = $id_bol%1;
//if(($resto==0) && ($row_boleto['categoria']<9)){
$mp = new MP('7217375728943161', '8Ob4qx6TkI38TaJxAPYvv2w3t7yTav1P');
//}
//else{ 
  //  $mp = new MP('1470310757436723', '2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS');
//}

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
//$resto = $id_bol%1;
//if(($resto==0) && ($row_boleto['categoria']<9)){
//$mp = new MP('7217375728943161', '8Ob4qx6TkI38TaJxAPYvv2w3t7yTav1P');
//}
//else{ 
    $mp = new MP('1470310757436723', '2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS');
//}

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
//$resto = $id_bol%1;
//if(($resto==0) && ($row_boleto['categoria']<9)){
//$mp = new MP('7217375728943161', '8Ob4qx6TkI38TaJxAPYvv2w3t7yTav1P');
//}
//else{ 
    $mp = new MP('1470310757436723', '2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS');
//}

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
//$resto = $id_bol%1;
//if(($resto==0) && ($row_boleto['categoria']<9)){
$mp = new MP('7217375728943161', '8Ob4qx6TkI38TaJxAPYvv2w3t7yTav1P');
//}
//else{ 
   // $mp = new MP('1470310757436723', '2O70mwZY5VDHXsUWrEXzux9s4ta7VVnS');
//}

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