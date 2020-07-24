<?php
$cpf_post = $_GET['id'];
	$sql222 = "SELECT * FROM tb_avaliador WHERE id = $cpf_post";
	$res222 = mysqlexecuta($id,$sql222);
	echo $sql222;
	//break;
while($row222 = mysql_fetch_array($res222)) {
$email = $row222['email'];
$senha = $row222['senha']; 
$nome = $row222['nome'];


include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");

if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");

$validacao =  "http://fmsys.com.br/fmsys/2/avaliacao/login.php";
$mensagemHTML = "Prezado(a) $nome,<br />
<br />

Existe(m) 1 ou mais trabalhos aguardando avaliacao dentro da sua area restrita.
<br />
Acesse: o link <a href='http://fmsys.com.br/fmsys/fesbe/2/avaliacao/login.php'> http://fmsys.com.br/fmsys/fesbe/2/avaliacao/login.php</a>
<br />
Solicitamos que realize a avaliaçãoo o mais rápido possível
<br /><br />

Usuario <b>$email</b> e senha <b>$senha</b><br />

Atenciosamente,<br />
<br />
Comissao Organizadora<br />
<br />";
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

$mail->Subject = 'Trabalho Aguardando Avaliacao '.$row['nome_evento'];

//$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";

$mail->MsgHTML($mensagemHTML);

//$mail->AddAttachment("./gerados/".$email.".pdf");

//$mail->AddAttachment("files/img03.jpg");

$mail->AddAddress($row222['email'], $row222['nome']);

$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);

$mail->IsHTML(true);

 

if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

} else {

echo "Enviado para ".$row222['email']."   ".$row222['nome'];	
}
?>
<script>
window.close();
</script>
<meta http-equiv="refresh" content="0; url=/fmsys/2/admin/principal_admin.php?pg=avaliacao.php">
<?
}
?>