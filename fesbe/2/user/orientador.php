<?
$id_trabalho = $_GET['id_trabalho'];
    $sql_instituicao = "SELECT * FROM tb_instituicao WHERE trabalho_id=$id_trabalho";
    $res_instituicao = mysqlexecuta($id,$sql_instituicao);


    $sql_autores = "SELECT * FROM tb_autores WHERE trabalho_id=$id_trabalho AND `ordenacao`=100";
    $res_autores = mysqlexecuta($id,$sql_autores);
    $row_autores = mysql_fetch_array($res_autores);
    $disabled="";
    if($row_autores['id']!=null){
        $disabled = "disabled";
    }
?>
<h1 class="ls-title-intro ls-ico-pencil2">Orientador</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*1),2); ?>" class="ls-animated"></div>
<br />
<div class="ls-alert-warning"><h3>Preencha os dados do <strong>Orientador</strong> do seu trabalho que ser� respons�vel pela valida��o do mesmo.</h3></div>
<div class="ls-box-filter">
<form action="./principal.php?pg=armazena_orientador.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Nome</b>
      <input type="text" name="nome" placeholder="Nome Completo" value="" <? echo $disabled; ?> required >
    </label>
    <label class="ls-label col-md-4">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" placeholder="E-mail" <? echo $disabled; ?> required >
  </label>
    <label class="ls-label col-md-4">
      <b class="ls-label-text">Filia&ccedil;&atilde;o</b>
      <div class="ls-custom-select">
        <select class="ls-custom" name="inst" <? echo $disabled; ?> >
          <option selected="selected">Selecione</option>
<?
    while($row_instituicao = mysql_fetch_array($res_instituicao)){
?>
          <option value="<? echo $row_instituicao['id']; ?>"><? echo $row_instituicao['depto'].'/'.$row_instituicao['inst'].'/'.$row_instituicao['sigla_inst']; ?></option>
<?
}
?>
        </select>
      </div>
    </label>
<hr />

 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>
</div>
<?
    $sql_autores = "SELECT * FROM tb_autores WHERE trabalho_id=$id_trabalho AND `ordenacao`=100";
    $res_autores = mysqlexecuta($id,$sql_autores);

?>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th class="hidden-xs">Nome</th>
      <th class="hidden-xs">E-mail</th>
      <th>Nome Cient&iacute;fico</th>      
      <th class="hidden-xs">Filia&ccedil;&atilde;o</th>      
      <th></th>  
    </tr>
  </thead>
  <tbody>
<?
$x=0;
    while($row_autores = mysql_fetch_array($res_autores)){
        $inst_autor = $row_autores['inst1'];
        $sql_inst_autor = "SELECT * FROM tb_instituicao WHERE id = $inst_autor";
        $res_inst_autor = mysqlexecuta($id,$sql_inst_autor);
        $row_inst_autor = mysql_fetch_array($res_inst_autor);
?>
    <tr>
      <td><? echo $row_autores['nome']; ?></td>
      <td><? echo $row_autores['email']; ?></td>
      <td><a href="./principal.php?pg=edita_autor.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>"><? echo $row_autores['nome_cientifico']; ?></a></td>
      <td><? echo $row_inst_autor['depto'].'/'.$row_inst_autor['inst'].'/'.$row_inst_autor['sigla_inst']; ?></td>
<?
    if($row_autores['ordenacao']==100){
        ?>
              <td><B>ORIENTADOR &nbsp;&nbsp;</B><a href="./principal.php?pg=edita_autor.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-pencil2"></a></td>
        <?
    }
    else{
?>      
      <td><a href="./principal.php?pg=remove_autores.php&id_trabalho=<? echo $id_trabalho; ?>&id_autor=<? echo $row_autores['id']; ?>" class="ls-ico-remove"></a></td>
<?
}
?>    </tr>
<?              
$x++;
    }
?>
  </tbody>
</table>
<?
if($x>0){
?>
<a href="./principal.php?pg=instituicoes.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
<a href="./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-right">Pr�ximo</a>

<!--form action="./principal.php?pg=autores.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-form ls-form-horizontal" method="POST">
 <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
  </form--->

<?    
}