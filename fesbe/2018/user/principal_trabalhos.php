<?

    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE usuario_id=$id_usuario";

    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);

    $data_limite = strtotime($row_evento['dia_fim_insc']);

    $data_limite_tardio = strtotime($row_evento['fim_tardio']);

    $data_inicio_tardio = strtotime($row_evento['inicio_tardio']);

    $data_atual = strtotime(date('Y-m-d'));

    $conta_trabalhos= mysql_query("SELECT COUNT(*) FROM `tb_trabalhos` WHERE usuario_id = $id_usuario");

	$status_conta_trabalhos =  mysql_result($conta_trabalhos, 0);

	$total_trabalhos = $status_conta_trabalhos;

?>

<h1 class="ls-title-intro ls-ico-pencil">Trabalhos</h1>



<?

if(($total_trabalhos < $row_evento['num_trabalhos'])&&(($data_atual <= $data_limite)||(($data_atual <= $data_limite_tardio)&&($data_atual >= $data_inicio_tardio)))){

?>

<a href="./principal.php?pg=instituicoes.php&id_trabalho=<? echo $id_usuario; ?>" class="ls-btn">Enviar Trabalho</a>

<?

}

?>





<?

/***** REMOVER APOS DATA JOVEM *****/

//if(($row_usuario['categoria']>9)&&($total_trabalhos < $row_evento['num_trabalhos'])){

?>

<!--a href="./principal.php?pg=instituicoes.php&id_trabalho=<? echo $id_usuario; ?>" class="ls-btn">Enviar Trabalho</a-->

<?

//}

/***** FIM REMOCAO JOVEM **************/

?>







<table class="ls-table ls-no-hover ls-table-striped">

  <thead>

    <tr>

      <th>T&iacute;tulo</th>

      <th class="hidden-xs">&Aacute;rea de Envio</th>

      <th>Status</th>

      <th>A&ccedil;&otilde;es</th>

    </tr>

  </thead>

  <tbody>



<?

while($row_trabalhos = mysql_fetch_array($res_trabalhos)){

    $id_trabalho = $row_trabalhos['id'];

    $id_area_trabalho = $row_trabalhos['area_id'];

    $area_trabalho = "SELECT * FROM tb_areas WHERE id=$id_area_trabalho";

    $res_area_trabalho = mysqlexecuta($id,$area_trabalho);

    $row_area_trabalho = mysql_fetch_array($res_area_trabalho);

    

    $status = $row_trabalhos['status'];

    $sql_status = "SELECT * FROM tb_status WHERE id=$status";

    $res_status = mysqlexecuta($id,$sql_status);

    $row_status = mysql_fetch_array($res_status);

    

?>    

<tr>



      <td><? echo $row_trabalhos['titulo']; ?></td>

      

      <td class="hidden-xs"><? echo $row_area_trabalho['nome_area'] ?></td>

      <td><? echo $row_status['status'] ?></td>

      <td><!--a href="<? echo $row_trabalhos['link']; ?>" target="_blank" class="ls-ico-text2"-->&nbsp;<a href="./exibe_trabalho.php?id_trabalho=<? echo $row_trabalhos['id']; ?>" target="_blank" class="ls-ico-text2"></a>

<?

if($row_trabalhos['midia']=='s'){

    /** EDITAR AUTORES **/

    ?>

        <a href="./principal.php?pg=instituicoes_2.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-ico-pencil" title="">EDITAR AUTORES</a></td>

        <? 

}

?>

<?

 if(($row_usuario['categoria']>9) && ($status==1 || $status==7) && (($data_atual <= $data_limite)||(($data_atual <= $data_limite_tardio)&&($data_atual >= $data_inicio_tardio)))){

?>

      <a href="./principal.php?pg=instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-ico-pencil" title=""></a></td>

<?

}



/***REMOVER APOS DATA JOVEM ****/

 //if(($row_usuario['categoria']>9) && ($status==1 || $status==7)){

?>

      <!--a href="./principal.php?pg=instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-ico-pencil" title=""></a></td-->

<?

//}

/****FIM REMOCAO DATA JOVEM ******/



 if($status==6 || $status==7){

?>

      <a href="./principal.php?pg=instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-ico-pencil" title=""></a></td>

<?

}

?>

</td>

    </tr>

<?    

}

?> 

  </tbody>

</table>