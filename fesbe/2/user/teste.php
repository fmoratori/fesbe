<h1 class="ls-title-intro ls-ico-pencil2">Comprovante de Categoria</h1>
<?
$filename = './categoria/'.$id_usuario.'.pdf';
if ((!file_exists($filename))||($row_usuario['categoria_valida']=='N')||($row_usuario['categoria_valida']=='P')) { 
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
   }
?>



<?
$x=0;
$y=0;
while($x<=100){
    if($x%35==0){
        echo $y."   ".$x."<br />";
        $y++;
    }
    $x++;
}
?>
   