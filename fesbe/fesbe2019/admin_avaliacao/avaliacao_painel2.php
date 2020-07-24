<p><h2>SESSÃO 1</h2></p>
<table class="ls-table ls-no-hover ls-table-striped">
<tr><th>Avaliador</th><th>Total</th><th>Não Avaliados</th><th>Avaliados</th></tr>
<?
	$sql222 = "SELECT * FROM tb_avaliador ORDER BY nome ASC";
	$res222 = mysqlexecuta($id,$sql222);

$total_geral='0';
	while($row222 = mysql_fetch_array($res222)){
    
    $id_aval = $row222['id'];
    $nome_aval = $row222['nome'];
		$count10 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE avaliador_painel = $id_aval AND `sessao_id`='1'");
		$total2 =  mysql_result($count10, 0);
			if($total2>0){
                		$count11 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE avaliador_painel = $id_aval AND `sessao_id`='1' AND `nota_apresentacao`>0");
                		$avaliados =  mysql_result($count11, 0);
                		$count16 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE avaliador_painel = $id_aval AND `sessao_id`='1' AND `nota_apresentacao`=0");
                		$nao_avaliados =  mysql_result($count16, 0);

            echo "<tr>";
            echo "<td width='25%'><a href='http://fmsys.com.br/fmsys/fesbe/regional2019/painel/principal.php?aval_id=$id_aval' target='_blank'>".utf8_encode($nome_aval)."</a> - ".$row222['email']." - ".$row222['senha']."   <a href='../avaliacao/envia_email_aval_painel.php?id=$id_aval' target='_blank' class='ls-ico-envelope'></a></td><td width='25%'><center>".$total2."</center></td><td width='25%'><center>".$nao_avaliados."</center></td><td width='25%'><center>".$avaliados."</center></td>";
            echo "</tr>";
            $total_geral=$total_geral+$total2;
            }
}
echo "<tr><td colspan='4'><center><b>TOTAL Sessão</b>: ".$total_geral."</center></td></tr>";
?>
</table>
<?

?>
<p><h2>SESSÃO 3</h2></p>
<table class="ls-table ls-no-hover ls-table-striped">
<tr><th>Avaliador</th><th>Total</th><th>Não Avaliados</th><th>Avaliados</th></tr>
<?
	$sql222 = "SELECT * FROM tb_avaliador ORDER BY nome ASC";
	$res222 = mysqlexecuta($id,$sql222);

$total_geral='0';
	while($row222 = mysql_fetch_array($res222)){
    
    $id_aval = $row222['id'];
    $nome_aval = $row222['nome'];
		$count10 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE avaliador_painel = $id_aval AND `sessao_id`='3'");
		$total2 =  mysql_result($count10, 0);
			if($total2>0){
                		$count11 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE avaliador_painel = $id_aval AND `sessao_id`='3' AND `nota_apresentacao`>0");
                		$avaliados =  mysql_result($count11, 0);
                		$count16 = mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE avaliador_painel = $id_aval AND `sessao_id`='3' AND `nota_apresentacao`=0");
                		$nao_avaliados =  mysql_result($count16, 0);

            echo "<tr>";
            echo "<td width='25%'><a href='http://fmsys.com.br/fmsys/fesbe/regional2019/painel/principal.php?aval_id=$id_aval' target='_blank'>".utf8_encode($nome_aval)."</a> - ".$row222['email']." - ".$row222['senha']."   <a href='../avaliacao/envia_email_aval_painel.php?id=$id_aval' target='_blank' class='ls-ico-envelope'></a></td><td width='25%'><center>".$total2."</center></td><td width='25%'><center>".$nao_avaliados."</center></td><td width='25%'><center>".$avaliados."</center></td>";

            echo "</tr>";
            $total_geral=$total_geral+$total2;
            }
}
echo "<tr><td colspan='4'><center><b>TOTAL Sessão:</b> ".$total_geral."</center></td></tr>";
?>
</table>
