<?php

$cpf_post = $_GET['id_trabalho'];
$id_trabalho=$cpf_post;
	$sql222 = "SELECT * FROM tb_usuario WHERE id = $cpf_post";
    echo $sql222;
	$res222 = mysqlexecuta($id,$sql222);
	//break;
while($row222 = mysql_fetch_array($res222)) {
$email = $row222['email'];
$senha = $row222['senha']; 
$nome = $row222['nome'];








$sql66 = "SELECT * FROM tb_trabalhos WHERE id = $id_trabalho";
$res66 = mysqlexecuta($id,$sql66);
$row66 = mysql_fetch_array($res66);
$id_usuario = $row66['usuario_id'];
$titulo = $row66['titulo'];
if($row66['status']==4){
$sql661 = "SELECT * FROM tb_usuario WHERE id = $id_usuario";
$res661 = mysqlexecuta($id,$sql661);
$row661 = mysql_fetch_array($res661);
$inscrito = $row661['nome'];

$sql_autores = "SELECT * FROM `tb_autores` WHERE trabalho_id = $id_trabalho ORDER BY `ordenacao` ASC";
$res_autores = mysqlexecuta($id,$sql_autores);
$autores ='';
$x=0;
while($row_autores = mysql_fetch_array($res_autores)){
if($x==0){
    $primeiro_autor = utf8_encode($row_autores['nome']);
}
if($autores==''){
    $autores = $row_autores['nome_cientifico'];
}    
else{
    $autores = $autores.', '.$row_autores['nome_cientifico'];
    }
    $x++;
}

setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
$inicio =  strftime( ' %d de %B de %Y', strtotime( $row['inicio'] ) );
$fim =  strftime( ' %d de %B de %Y', strtotime( $row['fim'] ) );
    if($row66['area_id']<10){
        $area = '0'.$row66['area_id'];
    }    
    else{
        $area=$row66['area_id'];
    }
    
    $sql_area = "SELECT * FROM tb_areas WHERE id=$area";
    $res_area = mysqlexecuta($id,$sql_area);    
    $row_area = mysql_fetch_array($res_area);
    $nome_area = $row_area['nome_area'];
    
    $sessao = $row66['sessao_id'];    
    $sql_sessao = "SELECT * FROM tb_sessao WHERE id=$sessao";
    $res_sessao = mysqlexecuta($id,$sql_sessao);
    $row_sessao = mysql_fetch_array($res_sessao);
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $dia_hora_apresent = strftime('%d de %B de %Y', strtotime($row_sessao['data_inicio']))." -  Das ".date("H:i",strtotime($row_sessao['hora_inicio']))." às ".date("H:i",strtotime($row_sessao['hora_fim']));
    $dia_apresenta = strftime('%d de %B de %Y', strtotime($row_sessao['data_inicio']));






}







include("../phpmailer/class.phpmailer.php");
include("../phpmailer/class.smtp.php");

if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");

$validacao =  "http://fmsys.com.br/fmsys/fesbe2019/avaliacao/login.php";

$imagem = "<center><img src='http://fmsys.com.br/fmsys/fesbe/fesbe2019/imagens/header2019.png'></center>";
$texto = "I am pleased to inform you that your abstract <b>".utf8_encode($titulo)."</b>, autores ".utf8_encode($autores).", has been accepted for poster presentation at the XXXIV FeSBE Annual Metting in Campos do Jordão to be held September 9-13, 2019";
$texto2 = "<br /><br /><b><u>POSTER PRESENTATION INFORMATION</u></b><br /><br />Abstract ID number: ".$area.".".$row66['painel']."<br />".
"First author: ".$primeiro_autor."<br />".
"Poster Session Title: ".$nome_area."<br />".
"Day of presentation: <b><u>".$dia_apresenta."</u></b><br />".
"Poster presentation time: 16:00 - 18:00<br /> 
Location: Campos do Jordao Convention Center 
Presenters must hang their posters on the appropriate poster board no later than 10:00 AM on the day of presentation";
$texto3 = "<br /><br /><b><u>INSTRUCTIONS FOR POSTER PREPARATION</u></b><br /><br /> -	Poster should be in English.<br /> -	The dimensions of the poster should not exceed 110 x 96 cm (height x width).<br /> -	Allocate the top of the poster for the title, authors and affiliations. Title and authors as stated on the submitted abstract.<br /> -	Poster title should be readable by viewers 3 m away (Arial 60 or bigger). The text, illustration, etc. should be readable from 2 m.<br />";
$texto4 = "<br /><br /><b><u>REGISTRATION</u></b><br /><br />All abstract presenters must register for the meeting. Become a member of one of FeSBE affiliated societies to receive best rates.<br />For information regarding the conference please visit the conference website. 
<br />Regards,
<br />FeSBE secretariat";

$mensagemHTML= $imagem."<br />".$texto."<br />".$texto2."<br />".$texto3."<br />".$texto4;
/****
$mensagemHTML = "Prezado(a) Prof.(a) $nome,<br />
<br />
Gostar&iacute;amos de convid&aacute;-lo(a) para avaliar alguns resumos enviados para a XII Reuni&atilde;o Regional da FeSBE.<br />
O prazo m&aacute;ximo para avalia&ccedil;&atilde;o &eacute; 16 de abril de 2018.<br />
<br />
Para uniformizar as avalia&ccedil;&otilde;es, solicitamos sua especial aten&ccedil;&atilde;o para que:<br />
1. O resumo contenha: uma introdu&ccedil;&atilde;o sucinta seguida dos objetivos, m&eacute;todos, resultados com valores num&eacute;ricos (p.ex.: n&uacute;mero de amostras, m&eacute;dia e erro padr&atilde;o; porcentagem do controle, etc.), e conclus&otilde;es. N&atilde;o poder&atilde;o ser aceitos resumos que n&atilde;o apresentem resultados num&eacute;ricos, se pertinentes. Estes dever&atilde;o ser devolvidos ao respons&aacute;vel, condicionando a aprova&ccedil;&atilde;o do mesmo &agrave; inclus&atilde;o dos resultados num&eacute;ricos; <br />
2. Projetos que utilizaram animais ou humanos s&oacute; possam ser aceitos se apresentarem o c&oacute;digo da aprova&ccedil;&atilde;o (protocolo/ processo/ n&uacute;mero) em comit&ecirc; de &eacute;tica em experimenta&ccedil;&atilde;o inserido no item material e m&eacute;todos do resumo. No caso de experimentos realizados com animais e humanos, os resumos devem ser acompanhados do documento digitalizado (pdf) da aprova&ccedil;&atilde;o do Comit&ecirc; de &Eacute;tica Experimental da Institui&ccedil;&atilde;o, o qual se encontra dispon&iacute;vel no respectivo link acima do resumo. Sem documento de &eacute;tica compat&iacute;vel com o resumo, o mesmo n&atilde;o dever&aacute; ser aceito e deve ser devolvido ao respons&aacute;vel, condicionando a aprova&ccedil;&atilde;o do mesmo &agrave; inser&ccedil;&atilde;o do c&oacute;digo no corpo do resumo e &agrave; anexa&ccedil;&atilde;o do pdf correspondente no sistema, como descrito nas regras para prepara&ccedil;&atilde;o e envio do resumo.<br />
Se os crit&eacute;rios acima forem cumpridos, os avaliadores dever&atilde;o analisar os resumos contidos na sua lista quanto &agrave; clareza e relev&acirc;ncia cient&iacute;fica.<br />
Todos os avaliadores receber&atilde;o de volta na sua &aacute;rea de avalia&ccedil;&atilde;o aqueles resumos para os quais solicitaram &ldquo;CORRE&Ccedil;&Atilde;O&rdquo; at&eacute; o dia 17 de abril de 2018 Caber&aacute;, portanto, ao pr&oacute;prio avaliador a decis&atilde;o final (aceite ou rejei&ccedil;&atilde;o) dos resumos revisados at&eacute; o dia 18 de abril de 2018. <br />
A avalia&ccedil;&atilde;o dever&aacute; ser realizada on-line no Sistema FeSBE. Para tal, acesse o portal <a href='http://fmsys.com.br/fmsys/fesbe/regional2018/avaliacao/login.php'>http://fmsys.com.br/fmsys/fesbe/regional2018/avaliacao/login.php</a> utilizando o <br />
<br />
<b>Usu&aacute;rio:</b> $email e a <b>Senha:</b> $senha. <br />
<br />
Clique no &iacute;cone do resumo para visualizar. Em &ldquo;Parecer&rdquo; digite qual a sua avalia&ccedil;&atilde;o em rela&ccedil;&atilde;o ao resumo e selecione a op&ccedil;&atilde;o desejada; em seguida, clique em &ldquo;Salvar&rdquo;. No caso de o resumo ser aceito sem observa&ccedil;&otilde;es, n&atilde;o ser&aacute; necess&aacute;rio digitar coment&aacute;rio algum na caixa de texto.<br />
Desde j&aacute; agradecemos a sua aten&ccedil;&atilde;o e colabora&ccedil;&atilde;o com a Diretoria da FeSBE. Por favor, em caso de d&uacute;vidas ou problemas t&eacute;cnicos com o acesso on-line, entrem em contato com a secretaria da empresa organizadora (e-mail: fesbe@cwyeventos.com.br a/c Cristiane Yoshizato). <br />
<br />
<br />
Atenciosamente,<br />
Secretaria FeSBE<br />
11-3091 7369<br /><br />";
****/

$mail = new PHPMailer();

$mail->IsSMTP();

$mail->SMTPAuth = true;

$mail->SMTPSecure = "ssl";

$mail->Host = "smtp.gmail.com";

$mail->Port = 465;

$mail->Username = "secretaria@fesbe.org.br";

$mail->Password = "fesbe2013";

$mail->From = "secretaria@fesbe.org.br";

$mail->FromName = $row_evento['sigla'];

$mail->Subject = utf8_decode('Data Apresentação Trabalho ')."- FeSBE 2019";

//$mail->AltBody = "Hola, te doy mi nuevo numero\nxxxx.";

$mail->MsgHTML($mensagemHTML);

//$mail->AddAttachment("./gerados/".$email.".pdf");

//$mail->AddAttachment("files/img03.jpg");

$mail->AddAddress($row222['email'], $row222['nome']);

$mail->AddAddress('secretaria@fesbe.org.br', $row_evento['sigla']);

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
<meta http-equiv="refresh" content="0; url=/fmsys/fesbe/fesbe2019/admin/principal_admin.php?pg=envia_email_aceite.php">
<?
}
?>