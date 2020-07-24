<?
$sessao_id=0;
//$id_avaliador = $id_usuario;
if(date("Y-m-d") == "2019-05-29"){
    $sessao_id = 1;    
}  
if(date("Y-m-d") == "2019-05-30"){
    $sessao_id = 1;    
}
if(date("Y-m-d") == "2019-05-31"){
    $sessao_id = 3;    
}
    

$sql2 = "SELECT * FROM `tb_trabalhos` WHERE `status`='4' AND `nota_apresentacao` < 1 ORDER BY area_id ASC";
//$sql2 = "SELECT * FROM `tb_trabalhos` WHERE sessao_id='$sessao_id' AND `status`='4' AND `nota_apresentacao` < 1 ORDER BY area_id ASC";
$res2 = mysqlexecuta($id,$sql2);
//echo $sql2;
$x=1;
while($row2 = mysql_fetch_array($res2)){ 
if($x==1){
?>
<br />

<p><h2><center>TRABALHOS NÃO AVALIADOS</center></h2></p>
<?
}
//$descricao = $row2['titulo'];
//$descricao = substr($descricao, 0, 50);
$area_trab = $row2['area_id'];
$status = $row2['status'];
$sql8 = "SELECT * FROM `tb_status` WHERE id=$status";
$res8 = mysqlexecuta($id,$sql8);
$row8 = mysql_fetch_array($res8);
if($row2['area_id']<10){
    $area = '0'.$row2['area_id'];
}
else{
    $area = $row2['area_id'];
}
$target= "#".$x;
$id_trabalho = $row2['id'];
    $filename ='../user/exibe_trabalho.php?id_trabalho='.$id_trabalho;
?> 
 
 <br />
   <div data-ls-module="collapse" data-target="<? echo $target; ?>" class="ls-collapse ">
    <a href="#" class="ls-collapse-header">
      <h3 class="ls-collapse-title">
        <? echo $area.'.'.$row2['painel']." - NÃO AVALIADO"; ?>
      </h3>
      <p>
        <? echo utf8_encode($row2['titulo']); ?>
      </p>
    </a>
    <div class="ls-collapse-body" id="<? echo $x; ?>">
<center><a href="salva_aval.php?id_trabalho=<? echo $id_trabalho?>&ausente=1" class="ls-btn-danger">Ausente?</a></center>
<p>&nbsp;</p>

  <form role="form" class="ls-form ls-login-form" action="salva_aval.php?id_trabalho=<? echo $id_trabalho?>" method="POST">
<fieldset>

    <div class="ls-label col-md-5">
      <p>Apresentação do Trabalho:</p>
      <label class="ls-label-text">
        <input type="radio" name="apres" required="required" value="2">
        Regular
      </label>
      <label class="ls-label-text">
        <input type="radio" name="apres" required="required" value="3">
        Bom
      </label>
      <label class="ls-label-text">
        <input type="radio" name="apres" required="required" value="4">
        Ótimo
      </label>
    </div>
  </fieldset>
  <hr />
  <fieldset>
    <div class="ls-label col-md-5">
      <p>Conteúdo e Consistência dos Resultados:</p>
      <label class="ls-label-text">
        <input type="radio" name="cont" required="required" value="2">
        Regular
      </label>
      <label class="ls-label-text">
        <input type="radio" name="cont" required="required" value="3">
        Bom
      </label>
      <label class="ls-label-text">
        <input type="radio" name="cont" required="required" value="4">
        Ótimo
      </label>
    </div>
  </fieldset>
  <hr />
  <fieldset>
    <div class="ls-label col-md-5">
      <p>Clareza do Painel:</p>
      <label class="ls-label-text">
        <input type="radio" name="painel" required="required" value="2">
        Regular
      </label>
      <label class="ls-label-text">
        <input type="radio" name="painel" required="required" value="3">
        Bom
      </label>
      <label class="ls-label-text">
        <input type="radio" name="painel" required="required" value="4">
        Ótimo
      </label>
    </div>
    
  </fieldset>  
  
  <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
</form>

</div>
   <button data-ls-module="modal" data-content="<iframe src='<? echo $filename; ?>' width='99%' height='700px'></iframe>" data-class="ls-btn-danger" data-save="Voltar" data-close="Fechar" class="ls-btn-primary" data-close="Fechar" class="ls-btn-primary"> Exibir Resumo </button>

    </div>
  </div>
 

  <?
$x++;
 }
 /**
$sql53 = "SELECT * FROM `tb_trabalhos` WHERE sessao_id='$sessao_id' AND (mencao='s' OR mencao='n') ORDER BY area_id ASC";
$res53 = mysqlexecuta($id,$sql53); 
$row53 = mysql_fetch_array($res53);
if($row53['id']==''){

if($x==1){
$sql52 = "SELECT * FROM `tb_trabalhos` WHERE sessao_id='$sessao_id' ORDER BY area_id ASC";
$res52 = mysqlexecuta($id,$sql52);
$z=1;
?>
  <form role="form" class="ls-form ls-login-form" action="salva_mencao.php?id_trabalho=<? echo $id_trabalho?>" method="POST">
<?
 while($row52 = mysql_fetch_array($res52)){ 
if($z==1){
?>
<br />
<p><h2><center>Escolha o Trabalho contemplado para Menção Honrosa (Apenas 1)</center></h2></p>
<center><a href="salva_mencao.php?id_aval=<? echo $id_avaliador?>&ausente=1&sessao=<? echo $sessao_id; ?>" class="ls-btn-danger">NÃO HÁ TRABALHO PARA INDICAR</a></center>
<br />
<?
}
$area_trab = $row52['area_id'];
$status = $row52['status'];
if($row52['area_id']<10){
    $area = '0'.$row52['area_id'];
}
else{
    $area = $row52['area_id'];
}
$target= "#".$z;
$id_trabalho = $row52['id'];
?> 
<div class="ls-box ls-sm-space">
<label class="ls-label-text">
<input type="radio" name="mencao" value="<? echo $id_trabalho; ?>">
        <? echo "<b>".$area.'.'.$row52['painel']."</b> - ".utf8_encode($row52['titulo'])."<br />"; ?>
 </label>
</div>
  <?
$z++;
 }
 
 ?>
   <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
    </div>
</form><br /><br /><br />
<?
}


}
else{
    echo "<br /><div class='ls-alert-success'><strong>Avaliação Finalizada Com Sucesso! <br />Muito Obrigado.</strong> </div>";
    echo "<center><a href='./index.php' class='ls-btn-primary'>Sair</a></center>";
exit();
}

 ?>

<br />
<p><h2><center>TRABALHOS JÁ AVALIADOS</center></h2></p>


<?
$sql2 = "SELECT * FROM `tb_trabalhos` WHERE sessao_id='$sessao_id' AND  `nota_apresentacao` >= 1 ORDER BY area_id ASC";
$res2 = mysqlexecuta($id,$sql2);
$y=$x++;
 while($row2 = mysql_fetch_array($res2)){ 
$descricao = $row2['titulo'];
$descricao = substr($descricao, 0, 50);
$area_trab = $row2['area_id'];
$status = $row2['status'];
$sql8 = "SELECT * FROM `tb_status` WHERE id=$status";
$res8 = mysqlexecuta($id,$sql8);
$row8 = mysql_fetch_array($res8);
if($row2['area_id']<10){
    $area = '0'.$row2['area_id'];
}
else{
    $area = $row2['area_id'];
}
$target= "#".$y;
$id_trabalho = $row2['id'];
    $filename ='../user/exibe_trabalho.php?id_trabalho='.$id_trabalho;
?> 
 
 <br />
   <div data-ls-module="collapse" data-target="<? echo $target; ?>" class="ls-collapse ">
    <a href="#" class="ls-collapse-header">
      <h3 class="ls-collapse-title">
        <? echo $area.'.'.$row2['painel']." - AVALIADO"; ?>
      </h3>
      <p>
        <? echo utf8_encode($row2['titulo']); ?>
      </p>
    </a>
    <div class="ls-collapse-body" id="<? echo $y; ?>">
<center><a href="salva_aval.php?id_trabalho=<? echo $id_trabalho?>&ausente=1" class="ls-btn-danger">Ausente?</a></center>
<p>&nbsp;</p>

  <form role="form" class="ls-form ls-login-form" action="salva_aval.php?id_trabalho=<? echo $id_trabalho?>" method="POST">
<fieldset>

    <div class="ls-label col-md-5">
      <p>Apresentação do Trabalho:</p>
      <label class="ls-label-text">
        <input type="radio" name="apres" required="required" value="2">
        Regular
      </label>
      <label class="ls-label-text">
        <input type="radio" name="apres" required="required" value="3">
        Bom
      </label>
      <label class="ls-label-text">
        <input type="radio" name="apres" required="required" value="4">
        Ótimo
      </label>
    </div>
  </fieldset>
  <hr />
  <fieldset>
    <div class="ls-label col-md-5">
      <p>Conteúdo e Consistência dos Resultados:</p>
      <label class="ls-label-text">
        <input type="radio" name="cont" required="required" value="2">
        Regular
      </label>
      <label class="ls-label-text">
        <input type="radio" name="cont" required="required" value="3">
        Bom
      </label>
      <label class="ls-label-text">
        <input type="radio" name="cont" required="required" value="4">
        Ótimo
      </label>
    </div>
  </fieldset>
  <hr />
  <fieldset>
    <div class="ls-label col-md-5">
      <p>Clareza do Painel:</p>
      <label class="ls-label-text">
        <input type="radio" name="painel" required="required" value="2">
        Regular
      </label>
      <label class="ls-label-text">
        <input type="radio" name="painel" required="required" value="3">
        Bom
      </label>
      <label class="ls-label-text">
        <input type="radio" name="painel" required="required" value="4">
        Ótimo
      </label>
    </div>
    
  </fieldset>  
  
  <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
</form>
</div>
    <button data-ls-module="modal" data-content="<iframe src='<? echo $filename; ?>' width='99%' height='700px'></iframe>" data-class="ls-btn-danger" data-save="Voltar" data-close="Fechar" class="ls-btn-primary" data-close="Fechar" class="ls-btn-primary"> Exibir Resumo </button>

    </div>
  </div>
 

  <?
$y++;
 }
 **/
 ?>
</div>













</body>
</html>
