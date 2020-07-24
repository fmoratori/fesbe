<?
include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");
include "mysqlconecta.php";
include "mysqlexecuta.php";
$id2 = $_GET['id'];
$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);

$sql_certificado_poster = "SELECT * FROM tb_palestrantes WHERE id = $id2;";
echo $sql_certificado_poster;
//echo $sql_certificado_poster;
$res_certificado_poster = mysqlexecuta($id,$sql_certificado_poster);
$row_certificado_poster = mysql_fetch_array($res_certificado_poster);
    $link = "./certificados_palestra/".$id2.".pdf";   

if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
     $link = './certificados_palestra/'.$id2.'.pdf';
     echo $link;
$mensagemHTML = "Segue anexo o certificado da palestra ministrada durante a ".$row_evento['nome_evento'].".<br /><br />Atenciosamente,<br />Comiss&atilde;o Organizadora <br />".$row['nome_evento'];
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
$mail->Subject = 'Certificado Palestrante - '.$row_evento['sigla'];
$mail->MsgHTML($mensagemHTML);
$mail->AddAttachment($link);
$mail->AddAddress($row_certificado_poster['email']);
$mail->AddAddress('nao-responda@fmsys.com.br', $row_evento['sigla']);
$mail->IsHTML(true);
if(!$mail->Send()) {

  echo "Error: " . $mail->ErrorInfo;

}
else{

//   echo "<meta http-equiv='refresh' content='0; url=./palestrante_certificado.php'>";
   }

?>