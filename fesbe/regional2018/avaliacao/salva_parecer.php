<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?						
$val_end = $_GET['val'];
$val=$val_end;
$val1 = base64_decode($val_end);
$valida = $_SESSION['login'];
$parecer1 = utf8_decode($_POST['parecer']);
$parecer2 = str_replace('"',"``",$parecer1);
$parecer = str_replace("'","`",$parecer2);
$parecer_ant = utf8_decode($_POST['parecer_ant']);
$trabalho_id = $_GET['id_trabalho'];
$hora = date("Y-n-j H:i:s");
$aval = $_GET['aval_id'];
$status = $_GET['status'];
//include "./header.php";
//include "./verifica_sessao.php";  
include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");
$sql56 = "SELECT * FROM `tb_trabalhos` WHERE `id`= $trabalho_id";
$res56 = mysqlexecuta($id,$sql56);
$row56 = mysql_fetch_array($res56);
$user_id = $row56['usuario_id'];

$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);

$sql57 = "SELECT * FROM `tb_usuario` WHERE `id`= $user_id";
$res57 = mysqlexecuta($id,$sql57);
$row57 = mysql_fetch_array($res57);

if($status==4){
$parecer = " --- ".$aval." - ".$hora." - ".$parecer." --------- ".$parecer_ant;
$sql53="UPDATE `tb_trabalhos` SET `status`=$status  WHERE `id` = $trabalho_id";	
$res53 = mysqlexecuta($id,$sql53);



if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
//$email_orient = base64_encode($row30['email']);
//$validacao =  "http://www.fesbe.org.br/jarvis3/fesbe2015/user/trabalhos/valida.php?orient=$email_orient&id_trabalho=$id_trabalho";
$mensagemHTML = "O trabalho <b>".$row56['titulo']."</b> foi aprovado pela Comiss&atilde;o de Avalia&ccedil;&atilde;o".$quebra_linha."<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".utf8_encode($row_evento['nome_evento']);
$mail = new PHPMailer();
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "email-ssl.com.br";
$mail->Port = 465;
$mail->Username = "nao-responda@fmsys.com.br";
$mail->Password = "f3d3r4c40";
$mail->From = "nao-responda@fmsys.com.br";
$mail->FromName = $row_evento['sigla'];
$mail->Subject = utf8_decode('Avaliacao Trabalho '.$row_evento['nome_evento']);
$mail->MsgHTML($mensagemHTML);
$mail->AddAddress($row57['email'], $row57['nome']);
$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);
$mail->IsHTML(true);
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} 
else {	 
	echo "Enviado";	
}

?>
<meta http-equiv="refresh" content="0; url=./principal.php">
<?
exit();
}


$status = $_POST['status'];
if($status==6){
	if($parecer==""){
		?>
		<script>
		alert("PARA FINALIZAR A AVALIAÇÃO É OBRIGATÓRIO EMITIR O PARECER NO RESPECTIVO CAMPO"); 
		window.history.back()
		</script>
        <?
		}
		else{
$parecer = " --- ".$aval." - ".$hora." - ".$parecer." --------- ".$parecer_ant;
echo $parecer;
echo $trabalho_id;
echo $status;
$sql53="UPDATE `tb_trabalhos` SET `status`=$status, `parecer` = '$parecer' WHERE `id` = $trabalho_id";	
$res53 = mysqlexecuta($id,$sql53);
echo "Inserido Com Sucesso!";
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
$mensagemHTML = "O trabalho <b>".$row56['titulo']."</b> Recebeu o seguinte parecer:<br /><br />".$parecer2. "<br />Acesse sua &aacute;rea restrita e realize as altera&ccedil;&otilde;es necess&aacute;rias. ".$quebra_linha."<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".utf8_encode($row_evento['nome_evento']);

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "email-ssl.com.br";
$mail->Port = 465;
$mail->Username = "nao-responda@fmsys.com.br";
$mail->Password = "f3d3r4c40";
$mail->From = "nao-responda@fmsys.com.br";
$mail->FromName = $row_evento['sigla'];
$mail->Subject = utf8_decode('Avaliacao Trabalho '.$row_evento['nome_evento']);
$mail->MsgHTML($mensagemHTML);
$mail->AddAddress($row57['email'], $row57['nome']);
$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);
$mail->IsHTML(true);

if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} 
else {	 
	echo "Enviado";	
}


//header("location:principal.php?val=$val&aval=$aval");
?>
<meta http-equiv="refresh" content="0; url=./principal.php">
<?
}


	}
	
	
	
	
	
	if($status==5){
	if($parecer==""){
		?>
		<script>
		alert("PARA FINALIZAR A AVALIAÇÃO É OBRIGATÓRIO EMITIR O PARECER NO RESPECTIVO CAMPO"); 
		window.history.back()
		</script>
        <?
		}
		else{
$parecer = " --- ".$aval." - ".$hora." - ".$parecer." --------- ".$parecer_ant;
echo $parecer;
echo $trabalho_id;
echo $status;
$sql53="UPDATE `tb_trabalhos` SET `status`=$status, `parecer` = '$parecer' WHERE `id` = $trabalho_id";	
$res53 = mysqlexecuta($id,$sql53);
echo "Inserido Com Sucesso!";
if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao eta preparado para funcionar com o sistema operacional de seu servidor");
$mensagemHTML = "O trabalho <b>".$row56['titulo']."</b> Foi Recusado. Segue abaixo o motivo da recusa:<br /><br />".$parecer2. "<br />".$quebra_linha."<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".utf8_encode($row_evento['nome_evento']);
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "email-ssl.com.br";
$mail->Port = 465;
$mail->Username = "nao-responda@fmsys.com.br";
$mail->Password = "f3d3r4c40";
$mail->From = "nao-responda@fmsys.com.br";
$mail->FromName = $row_evento['sigla'];
$mail->Subject = utf8_decode('Avaliacao Trabalho '.$row_evento['nome_evento']);
$mail->MsgHTML($mensagemHTML);
$mail->AddAddress($row57['email'], $row57['nome']);
$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);
$mail->IsHTML(true);
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} 
else {	 
	echo "Enviado";	
}


//header("location:principal.php?val=$val&aval=$aval");
?>
<meta http-equiv="refresh" content="0; url=./principal.php">
<?
}


	}

	
	
	
	
	
	
if($status==4){
$parecer = " --- ".$aval."-  ".$status."  -"." - ".$hora." - ".$parecer." --------- ".$parecer_ant;
$sql="UPDATE `tb_trabalhos` SET `status`=$status, `parecer` = '$parecer'  WHERE `id` = $trabalho_id";	
$res = mysqlexecuta($id,$sql);



if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
//$email_orient = base64_encode($row30['email']);
//$validacao =  "http://www.fesbe.org.br/jarvis3/fesbe2015/user/trabalhos/valida.php?orient=$email_orient&id_trabalho=$id_trabalho";
$mensagemHTML = "O trabalho <b>".$row56['titulo']."</b> foi aprovado pela Comiss&atilde;o de Avalia&ccedil;&atilde;o".$quebra_linha."<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".utf8_encode($row_evento['nome_evento']);
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "email-ssl.com.br";
$mail->Port = 465;
$mail->Username = "nao-responda@fmsys.com.br";
$mail->Password = "f3d3r4c40";
$mail->From = "nao-responda@fmsys.com.br";
$mail->FromName = $row_evento['sigla'];
$mail->Subject = 'Avaliacao Trabalho'.$row_evento['nome_evento'];
$mail->MsgHTML($mensagemHTML);
$mail->AddAddress($row57['email'], $row57['nome']);
$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);
$mail->IsHTML(true);
if(!$mail->Send()) {
  echo "Error: " . $mail->ErrorInfo;
} 
else {	 
	echo "Enviado";	
}

?>
<meta http-equiv="refresh" content="0; url=./principal.php">
<?
exit();	
}
if($status==""){
			?>
		<script>
		alert("PARA FINALIZAR A AVALIAÇÃO É OBRIGATÓRIO SELECIONAR UMA DAS OPÇÕES (APROVAR, SOLICITAR CORREÇÃO ou RECUSAR)"); 
		window.history.back()
		</script>
        <?
}
?>