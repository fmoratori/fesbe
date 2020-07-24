<?
include "mysqlconecta.php";
include "mysqlexecuta.php";
require_once("../pdf2/fpdf.php");
$sql1 = "SELECT * FROM `tb_propostas_conf` ORDER BY `id`";
$res1 = mysqlexecuta($id,$sql1);
$hora = date("d-m-Y");
$hora = $hora."_".date("H:i:s");
$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('arial','B',7);
$pdf->MultiCell(0,10, "Data Arquivo: ".$hora,0,'J');
$pdf->Ln(50);
$pdf->SetFont('arial','B',40);
$pdf->MultiCell(0,16, "PROPOSTAS",0,'C');
$pdf->Ln(50);
$pdf->SetFont('arial','B',40);
$pdf->MultiCell(0,16, "REGIONAL 2018",0,'C');
$pdf->Ln(80);
$pdf->SetFont('arial','B',40);
$pdf->MultiCell(0,16, "CONFERÊNCIAS",0,'C');

$pdf->Ln(15);
//$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,20, "Gerado em: "."$hora - ".$evento,0,'J');




$x=1;
while($row1 = mysql_fetch_array($res1)){
//$pdf= new FPDF("P","pt","A4");
$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('arial','B',7);
$pdf->MultiCell(0,10, "PROPOSTA ".$x,0,'J');
//$pdf->Ln(10);
$pdf->SetFont('arial','B',16);
$pdf->MultiCell(0,16, $row1['titulo_conf']." ",0,'C');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25,"DADOS DO PROPONENTE" ,0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25,"Nome Completo: ".strtoupper($row1['nome_prop'])."   -   "."CPF: ".$row1['doc_prop']." " ,0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "E-mail: ".$row1['email_prop']."   -   "."Telefone: ".$row1['tel_prop']." ",0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Cargo/Função: ".$row1['cargo_prop']." - "."Instituição: ".$row1['inst_prop']." ",0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Sociedade(s) de Filiação do Proponente: ".$row1['sociedade_prop']." ",0,'J');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, "Título: ".$row1['titulo_conf'],0,'J');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, "Aula 1: ".$row1['titulo_aula1'],0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, $row1['prof_aula1']." - ".$row1['email_aula1']." - ".$row1['tel_aula1']." - ".$row1['cel_aula1'],0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, $row1['depto_aula1']." - ".$row1['inst_aula1']." - ".$row1['pais_aula1'],0,'J');
$pdf->SetFont('arial','B',13);
$pdf->MultiCell(0,25, " ",0,'J');
$pdf->SetFont('arial','',13);
$pdf->MultiCell(0,25, "Justificativa: ".$row1['justificativa'],0,'J');
$pdf->SetFont('arial','',13);

//$pdf->MultiCell(0,25, "Comitê de Ética:",0,'J');
//$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,20, "$comite_etica",0,'J');
$pdf->Ln(15);
//$pdf->SetFont('arial','',13);
//$pdf->MultiCell(0,20, "Gerado em: "."$hora - ".$evento,0,'J');
$x++;
}
$pdf->Output("./arquivos/conf/proposta_conf".$hora.".pdf","F");
$filename = "./arquivos/conf/proposta_conf".$hora.".pdf";
?>
<iframe src="<? echo $filename; ?>" width="99%" height="1000px"></iframe>
