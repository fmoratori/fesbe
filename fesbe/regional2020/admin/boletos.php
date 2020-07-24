<h1 class="ls-title-intro ls-ico-user">Boletos</h1>
<?
$id_usuario = $_GET['id_inscrito'];
    $sql_lista_boletos = "SELECT * FROM tb_boleto WHERE `user_id` = '$id_usuario' ORDER BY `id`";
    $res_lista_boletos = mysqlexecuta($id,$sql_lista_boletos);
    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>Referente</th>
      <th class="hidden-xs">Valor</th>
      <th>Vencimento</th>
      <th>Situacao</th>
      <th>Ações</th>
      <th><a href='./principal_admin.php?pg=gera_boleto.php&id_usuario=<? echo $id_usuario; ?>' class='ls-ico-cart' title='Gerar Boleto'>Gerar Novo Boleto</a></th>
    </tr>
  </thead>
  <tbody>
<?
   while($row_lista_boletos = mysql_fetch_array($res_lista_boletos)){
        echo "<tr>";
        echo "<td>".utf8_encode($row_lista_boletos['referente'])."</td>";
        echo "<td>R$ ".$row_lista_boletos['valor']."</td>";
        echo "<td>".$row_lista_boletos['vencimento']."</td>";
        echo "<td>".$row_lista_boletos['situacao']."</td>";
        echo "<td>"."<a href='../boleto/boleto_banespa.php?id_boleto=".$row_lista_boletos['id']."' target='_blank' class='ls-ico-text' title='Exibe Boleto'></a>&nbsp;&nbsp;";
        echo "<a href='./principal_admin.php?pg=edita_boleto.php&id_boleto=".$row_lista_boletos['id']."' class='ls-ico-pencil' title='Dados Boleto'></a></td>";
        echo "<td></td>";
        echo "</tr>";
   }
?>
</table>