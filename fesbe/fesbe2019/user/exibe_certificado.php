<?
session_start();
include "mysqlconecta.php";
include "mysqlexecuta.php";

//$id_usuario = $_SESSION['usuario'];
$id_certificado = $_GET['id_certificado'];
$cpf = $_GET['cpf'];
$sql_usuario = "SELECT * FROM tb_usuario WHERE cpf = $cpf";
$res_usuario = mysqlexecuta($id,$sql_usuario);
$row_usuario = mysql_fetch_array($res_usuario);
$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);
$sql_certificados = "SELECT * FROM tb_certificados WHERE id=$id_certificado";
$res_certificados = mysqlexecuta($id,$sql_certificados);
$row_certificados = mysql_fetch_array($res_certificados);
$autenticacao = $row_certificados['validacao'];
$id_atividade = $row_certificados[id_atividade];
$sql_atividade_certificados = "SELECT * FROM tb_atividades WHERE id=$id_atividade";
$res_atividade_certificados = mysqlexecuta($id,$sql_atividade_certificados);
$row_atividade_certificados = mysql_fetch_array($res_atividade_certificados);

require_once("./pdf2/fpdf.php");
$nome = utf8_decode($row_usuario['nome']);
$atividade = $row_atividade_certificados['nome'];
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

date_default_timezone_set( 'America/Sao_Paulo' );

$inicio =  strftime( ' %d de %B de %Y', strtotime( $row_evento['inicio'] ) );
$fim =  strftime( ' %d de %B de %Y', strtotime( $row_evento['fim'] ) );

	// Abre ou cria o arquivo bloco1.txt
	$fp = fopen("./logs/certificados/$id_certificado.txt", "a");
	$data = date("d-m-Y, H:i:s");
	$ip = getenv("REMOTE_ADDR");
	$referer = $_SERVER['SCRIPT_FILENAME'];
	$end_local = $_SERVER['SERVER_NAME'];
	$navegador = $_SERVER['HTTP_USER_AGENT'];
	$texto = $data." --- ".$ip." --- ".$referer." --- ".$navegador."\n";
	$escreve = fwrite($fp, $texto);
	$nome = strtoupper(utf8_encode($row_usuario['nome']));
$texto = "Certificamos que ".$nome." participou do Curso '".utf8_encode($atividade)."' durante a ".$row_evento['nome_evento'].", realizado de ".$inicio." a ".$fim." no ".$row_evento['local'].".";
	$pdf= new FPDF("L","pt","A4");
	$pdf->AddPage();
	$pdf->Image("./header_png.png",0,1,842,140);
	$pdf->Ln(150);
	$pdf->SetFont('arial','B',24);
	$pdf->Cell(0,20,"CERTIFICADO",0,1,'C');
	$pdf->Ln(30);
	$pdf->SetFont('arial','',13);
	$pdf->MultiCell(0,18, utf8_decode($texto),0,'C');
	$pdf->SetFont('arial','',16);
	$pdf->MultiCell(0,18, "",0,'J');
	$pdf->Ln(100);
	$pdf->SetFont('arial','',16);
//	$pdf->Cell(0,0,utf8_decode("São Paulo, 09 de setembro de 2015."),0,250,'C');
	$pdf->Cell(0,106,"",0,250,'L');
//	$pdf->Image("./ass_ana.jpg",421,430,180,90);
//	$pdf->SetFont('arial','',8);
//	$pdf->Image("./assinaturas.jpg",210,430,420,90);
//	$pdf->SetFont('arial','',8);
//	$pdf->Cell(0,18, utf8_decode($autenticacao),0,'J');
	$pdf->Image("./footer_png.png",0,430,840,150);
  //  ob_start();

   	$pdf->Output($autenticacao.".pdf","I");
 	$pdf->Output("./certificado_curso/".$autenticacao.".pdf","F");
?>