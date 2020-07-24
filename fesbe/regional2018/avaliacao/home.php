<?
$sql2 = "SELECT * FROM `tb_trabalhos` WHERE avaliador_id = $id_usuario ORDER BY id ASC";
//echo $sql2;
$res2 = mysqlexecuta($id,$sql2);
//echo "<h3><center><a href='./certificado.php?user_id=$id_usuario' target='_blank'>CERTIFICADO DE AVALIAÇÃO ONLINE</a></center></h3>";
?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th class="hidden-xs">T&iacute;tulo</th>
      <th>Status</th>
      <th>A&ccedil;&otilde;es</th>
    </tr>
  </thead>
  <tbody>
<?
//echo "Estamos em Manutenção!";
//break;
 while($row2 = mysql_fetch_array($res2)){ 
$descricao = $row2['titulo'];
$descricao = substr($descricao, 0, 50);
$area_trab = $row2['area_id'];
$status = $row2['status'];
$sql8 = "SELECT * FROM `tb_status` WHERE id=$status";
$res8 = mysqlexecuta($id,$sql8);
$row8 = mysql_fetch_array($res8);
 
 ?>
 <tr>
 <td><? echo $row2['id']; ?>  </p></td>
 <td><? echo utf8_encode($row2['titulo'])."..."; ?>  </p></td>
 <td><? echo utf8_encode($row8['status']); ?> </p></td>
  <?
  if(($row2['status']=='3')||($row2['status']=='5')||($row2['status']=='6')){
  ?>
  <td><a href="./principal.php?pg=avalia.php&id_trabalho=<? echo $row2['id'] ?>&aval=<? echo $usuario_id; ?>" class="ls-ico-text2"></a>
  <?
  }
  else{
    ?>
    <td></td>
    <?
  }
  ?>
  </tr>
  <?
 }
 ?>
</tbody>
</table>
  </div>
</div>

</body>
</html>
