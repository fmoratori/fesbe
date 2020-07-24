<?
$ver = $_GET['ver'];
?>

<h1 class="ls-title-intro ls-ico-eye">Painel de Avaliação</h1>


    <table class="ls-table ls-no-hover ls-table-striped">
    <?
	$a=0;
	$sql222 = "SELECT * FROM tb_avaliador ORDER BY nome ASC";
	$res222 = mysqlexecuta($id,$sql222);
	
	$sql224 = "SELECT * FROM tb_status";
	$res224 = mysqlexecuta($id,$sql224);
		echo "<tr><td></td><td>Total</td>";
		while($row224 = mysql_fetch_array($res224)){
			echo "<td>".utf8_encode($row224['status'])."</td>";
		}
		echo "</tr>";
	while($row222 = mysql_fetch_array($res222)){
	$id_aval = $row222['id'];
	$aval_id = $row222['id'];
		$count10 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE avaliador_id = $id_aval");
		$total2 =  mysql_result($count10, 0);

	echo "<tr>";
	echo "<td>".utf8_encode($row222['nome']);
    if($row222['convite']!='s' && $total2>0){echo "  <a href='./admin_avaliacao.php?pg=envia_email_aval_primeiro.php&id=$aval_id' target='_blank' class='ls-ico-envelope'></a>";}
	//echo "<td><center>&nbsp; <a href='./envia_email_certificado_aval.php?id=$aval_id' target='_blank' class='ls-ico-envelope'></a></center></td>";
    echo "</td>";
    
			echo "<td><center>".$total2."</center></td>";
	$sql223 = "SELECT * FROM tb_status";

	$res223 = mysqlexecuta($id,$sql223);
		while($row223 = mysql_fetch_array($res223)){
			$status = $row223['id'];
			$count9 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE avaliador_id = $id_aval AND status = $status");
			$total1 =  mysql_result($count9, 0);
			if($status==3 && $total1>0){
				echo "<td><center>$total1 &nbsp; <a href='./admin_avaliacao.php?pg=envia_email_aval.php&id=$aval_id' target='_blank' class='ls-ico-envelope'></a></center></td>";
				}
				else{
			echo "<td><center>$total1</center></td>";
				}
		}
		echo "</tr>";
			}
?>
</center></table>
