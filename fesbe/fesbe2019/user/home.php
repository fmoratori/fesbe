<?
if($idioma == 1 || $idioma == null){
?>
<meta charset="utf-8">
<h1 class="ls-title-intro ls-ico-home">Home</h1>


<?
    $sql_mensagens = "SELECT * FROM tb_mensagens WHERE exibir='S'";
    $res_mensagens = mysqlexecuta($id,$sql_mensagens);
    while($row_mensagens=mysql_fetch_array($res_mensagens)){

if($row_mensagens['exibir']=='S'){
 ?>
    <div class="<? echo $row_mensagens['nivel']; ?>"><? echo $row_mensagens['mensagem']; ?></div>
<?
}
}
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE usuario_id=$id_usuario";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos=mysql_fetch_array($res_trabalhos);

if($row_trabalhos['status']=='1'){
    ?>
    <div class="ls-alert-danger"><strong>Aten&ccedil;&atilde;o:</strong> Voc&ecirc; ainda n&atilde;o finalizou o envio do seu trabalho.</div>
<?
}
if($row_trabalhos['status']=='2'){
    ?>
    <div class="ls-alert-warning"><strong>Aten&ccedil;&atilde;o!!</strong> Seu trabalho ainda n&atilde;o foi validado pelo orientador.</div>
<?
}
if($row_trabalhos['status']=='3'){
    ?>
    <div class="ls-alert-success"><strong>Parab&eacute;ns!!</strong> Voc&ecirc; j&aacute; finalizou o envio do seu trabalho.</div>
<?
}
if($row_trabalhos['status']==NULL){
    ?>
    <div class="ls-alert-danger"><strong>Aten&ccedil;&atilde;o:</strong> Voc&ecirc; ainda n&atilde;o iniciou o envio do seu trabalho.</div>
<?
}
?>
<?
/****
if($row_usuario['categoria_valida']=='A'){
?>
    <div class="ls-alert-warning"><strong>Seu Comprovante de categoria est&aacute; em an&aacute;lise pela secretaria do evento.</strong></div>
<?    
}
?>

<?
$filename = './categoria/'.$id_usuario.'.pdf';
if((file_exists($filename))&&($row_usuario['categoria_valida']=='S')){
?>
    <div class="ls-alert-success"><strong>Seu Comprovante de categoria foi validado pela secretaria do evento.</strong></div>

<?    
}

if ((!file_exists($filename))||($row_usuario['categoria_valida']=='N')||($row_usuario['categoria_valida']=='P')) { 
if($row_usuario['categoria_valida']=='N'){
?>
    <div class="ls-alert-danger"><strong>Seu Comprovante de categoria n&atilde;o foi aceito pela secretaria do evento. Anexe um comprovante de categoria v&aacute;lido</div>
<?    
}
?>
<div class="ls-box-filter">
<form action="./principal.php?pg=salva_comprovante_categoria.php&id_usuario=<? echo $id_usuario; ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Comprovante Categoria (PDF - Tamanho M&aacute;ximo: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>
</div>
<?
   } ***/
?>
<!--div class="ls-box">
  <h5 class="ls-title-3">Avisos Importantes</h5>
  <p>O Prazo para envio de Trabalhos foi prorrogado para o dia <b>19 de Maio de 2017</b>.</p>
</div-->
<?
}
?>



<?
if($idioma == 2){
?>
<meta charset="utf-8">
<h1 class="ls-title-intro ls-ico-home">Home</h1>

<?
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE usuario_id=$id_usuario";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos=mysql_fetch_array($res_trabalhos);

if($row_trabalhos['status']=='1'){
    ?>
    <div class="ls-alert-danger"><strong></strong> You didn't started send your abstract.</div>
<?
}
if($row_trabalhos['status']=='2'){
    ?>
    <div class="ls-alert-warning"><strong></strong> Your Abstract was not validated by the advisor.</div>
<?
}
if($row_trabalhos['status']=='3'){
    ?>
    <div class="ls-alert-success"><strong>Success!</strong> You finished your abstract.</div>
<?
}
if($row_trabalhos['status']==NULL){
    ?>
    <div class="ls-alert-danger"><strong></strong> You didn't started send your abstract.</div>
<?
}
?>
<?
/*****
if($row_usuario['categoria_valida']=='A'){
?>
    <div class="ls-alert-warning"><strong>Your Category Receipt are under analysing of secretary.</strong></div>
<?    
}
?>

<?
$filename = './categoria/'.$id_usuario.'.pdf';
if((file_exists($filename))&&($row_usuario['categoria_valida']=='S')){
?>
    <div class="ls-alert-success"><strong>Your Category Receipt was validate.</strong></div>

<?    
}

if ((!file_exists($filename))||($row_usuario['categoria_valida']=='N')||($row_usuario['categoria_valida']=='P')) { 
if($row_usuario['categoria_valida']=='N'){
?>
    <div class="ls-alert-danger"><strong>Your Category Receipt was not validate. Attach a new Category Receipt.</div>
<?    
}
?>
<div class="ls-box-filter">
<form action="./principal.php?pg=salva_comprovante_categoria.php&id_usuario=<? echo $id_usuario; ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Category Receipt (PDF - Max Lenght: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Save</button>
  </div>
</form>
</div>
<?
   } ***/
?>
<!--div class="ls-box">
  <h5 class="ls-title-3">Avisos Importantes</h5>
  <p>O Prazo para envio de Trabalhos foi prorrogado para o dia <b>19 de Maio de 2017</b>.</p>
</div-->
<?
}
?>



<?
if($idioma == 3){
?>
<meta charset="utf-8">
<h1 class="ls-title-intro ls-ico-home">Home</h1>

<?
    $sql_trabalhos = "SELECT * FROM tb_trabalhos WHERE usuario_id=$id_usuario";
    $res_trabalhos = mysqlexecuta($id,$sql_trabalhos);
    $row_trabalhos=mysql_fetch_array($res_trabalhos);

if($row_trabalhos['status']=='1'){
    ?>
    <div class="ls-alert-danger"><strong>Attenci�n!</strong> Trabajo no Finalizado.</div>
<?
}
if($row_trabalhos['status']=='2'){
    ?>
    <div class="ls-alert-warning"><strong>Attenci�n!</strong> trabajo no validado por el orientador.</div>
<?
}
if($row_trabalhos['status']=='3'){
    ?>
    <div class="ls-alert-success"><strong>Sucesso!</strong> Trabajo Finalizado.</div>
<?
}
if($row_trabalhos['status']==NULL){
    ?>
    <div class="ls-alert-danger"><strong>Caution!</strong>No inici� el env�o del trabajo.</div>
<?
}
?>
<?
/*****
if($row_usuario['categoria_valida']=='A'){
?>
    <div class="ls-alert-warning"><strong>Your Category Receipt are under analysing of secretary.</strong></div>
<?    
}
?>

<?
$filename = './categoria/'.$id_usuario.'.pdf';
if((file_exists($filename))&&($row_usuario['categoria_valida']=='S')){
?>
    <div class="ls-alert-success"><strong>Your Category Receipt was validate.</strong></div>

<?    
}

if ((!file_exists($filename))||($row_usuario['categoria_valida']=='N')||($row_usuario['categoria_valida']=='P')) { 
if($row_usuario['categoria_valida']=='N'){
?>
    <div class="ls-alert-danger"><strong>Your Category Receipt was not validate. Attach a new Category Receipt.</div>
<?    
}
?>
<div class="ls-box-filter">
<form action="./principal.php?pg=salva_comprovante_categoria.php&id_usuario=<? echo $id_usuario; ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
			<label for="exampleInputFile">Category Receipt (PDF - Max Lenght: 2mb)</label><br />
			<p><input type="file" name="pdf" id="pdf" /></p>
		</div>        
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Save</button>
  </div>
</form>
</div>
<?
   } ****/
?>
<!--div class="ls-box">
  <h5 class="ls-title-3">Avisos Importantes</h5>
  <p>O Prazo para envio de Trabalhos foi prorrogado para o dia <b>19 de Maio de 2017</b>.</p>
</div-->
<?
}
?>