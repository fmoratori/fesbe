<?
include "mysqlconecta.php";
include "mysqlexecuta.php";
include "replace.php";
require_once("./pdf2/fpdf.php");

$x=1;
//while($x<119){
    clearstatcache();
$sql_certificado_poster='';
$res_certificado_poster='';
$row_certificado_poster='';
$id_certificado_poster = $_GET['id_certificado'];
$sql_certificado_poster = "SELECT * FROM tb_palestrantes WHERE id = $id_certificado_poster;";
//echo $sql_certificado_poster;
$res_certificado_poster = mysqlexecuta($id,$sql_certificado_poster);
$row_certificado_poster = mysql_fetch_array($res_certificado_poster);
$palestrante = utf8_encode($row_certificado_poster['palestrante']);
$palestra = utf8_encode($row_certificado_poster['titulo']);
$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);
//$nome = utf8_decode($row_usuario['nome']);
//$atividade = $row_atividade_certificados['nome'];
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

date_default_timezone_set( 'America/Sao_Paulo' );

$inicio =  strftime( ' %d de %B de %Y', strtotime( $row_evento['inicio'] ) );
$fim =  strftime( ' %d de %B de %Y', strtotime( $row_evento['fim'] ) );
//$area_id = $row_certificado_poster['area_id'];
//$painel = $row_certificado_poster['painel'];
//$titulo = acento($row_certificado_poster['titulo']);
//$id_trabalho = $row_certificado_poster['id'];

//$autenticacao = sha1($titulo_exibe);

$texto='';
$texto = "Certificamos que ".$palestrante.", ministrou a Palestra ".$palestra.", durante a ".$row_evento['nome_evento'].", realizado de ".$inicio." a ".$fim." no  ".$row_evento['local'].".";
	$pdf= new FPDF("L","pt","A4");
	$pdf->AddPage();
	$pdf->Image("./cabecalho5.jpg",0,0,842,140);
	$pdf->Ln(150);
	$pdf->SetFont('arial','B',24);
	$pdf->Cell(0,20,"CERTIFICADO",0,1,'C');
	$pdf->Ln(30);
	$pdf->SetFont('arial','',14);
	$pdf->MultiCell(0,18, utf8_decode($texto),0,'J');
	$pdf->SetFont('arial','',16);
	$pdf->MultiCell(0,18, "",0,'J');
	$pdf->Ln(10);
	$pdf->SetFont('arial','',16);
//	$pdf->Cell(0,0,utf8_decode("São Paulo, 09 de setembro de 2015."),0,250,'C');
	$pdf->Cell(0,106,"",0,250,'L');
//	$pdf->Image("./assinaturas.jpg",210,430,420,90);
	$pdf->SetFont('arial','',8);
	$pdf->Cell(0,18, utf8_decode($autenticacao),0,'J');
	$pdf->Image("./rodape5.jpg",10,485,820,100);
  //  ob_start();
  $id = $row_certificado_poster['id'];
 	$pdf->Output($id.".pdf","I");
 	$pdf->Output("./certificados_palestra/".$id.".pdf","F");
//sleep(1);
//$x++;
//}
?>