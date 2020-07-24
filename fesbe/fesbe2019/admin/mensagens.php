<?
$ver = $_GET['ver'];
?>

<h1 class="ls-title-intro ls-ico-user">Mensagens</h1>


<form action="./principal_admin.php?pg=insere_mensagem.php" class="ls-form row" method="POST">
  <fieldset>
      <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Nível</b>
      <div class="ls-custom-select">
        <select name="nivel" class="ls-select">
        <option value='ls-alert-success'>VERDE</option><br />";
        <option value='ls-alert-info'>AZUL</option><br />";
        <option value='ls-alert-warning'>AMARELO</option><br />";
        <option value='ls-alert-danger'>VERMELHO</option><br />";
       </select>
      </div>
      </label>
      <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Mensagem</b>
      <textarea name="mensagem" rows="2" required ><? echo $row_trabalhos['introducao']; ?></textarea>
    </label>
      <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Exibir?</b>
      <label class="ls-label-text">
        <input type="radio" name="exibir" value="S" required="required">SIM
        <input type="radio" name="exibir" value="N" required="required">NÃO

      </label>        
    </label>
  </fieldset>
  <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form>
<?
    $sql_consulta_mensagens = "SELECT * FROM tb_mensagens";
//    echo $sql_consulta_inscritos;
    $res_consulta_mensagens = mysqlexecuta($id,$sql_consulta_mensagens);
    ?>
<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th width='5%'>ID</th>
      <th width='10%'>Nível</th>
      <th class="hidden-xs">Mensagem</th>
      <th width='8%'>Exibe</th>
      <th width='8%'>Opções</th>
    </tr>
  </thead>
  <tbody>
<?
$x=0;
   while($row_consulta_mensagens = mysql_fetch_array($res_consulta_mensagens)){
    $x++;
    $id_mensagem=$row_consulta_mensagens['id'];
        echo "<tr>";
        echo "<td>".utf8_encode($row_consulta_mensagens['id'])."</td>";
        if($row_consulta_mensagens['nivel']=='ls-alert-warning'){
            $cor = 'Atenção - amarelo';
        }
        if($row_consulta_mensagens['nivel']=='ls-alert-danger'){
            $cor = 'Perigo - vermelho';
        }
        if($row_consulta_mensagens['nivel']=='ls-alert-sucess'){
            $cor = 'Sucesso - verde';
        }
        if($row_consulta_mensagens['nivel']=='ls-alert-info'){
            $cor = 'Info - azul';
        }
        echo "<td>".$cor."</td>";
        echo "<td>".utf8_encode($row_consulta_mensagens['mensagem'])."</td>";
        echo "<td>".$row_consulta_mensagens['exibir']."</td>";
        echo "<td><a href='./principal_admin.php?pg=mensagens.php&edita=sim&id=$id_mensagem' class='ls-ico-pencil'></td>";        
        echo "</tr>";
   }

        echo "<b>Resultados: </b>".$x."</table>";
?>