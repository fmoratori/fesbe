<?
$id_trabalho = $_GET['id_trabalho'];
$tamanho = $_GET['tamanho'];
?>

<h1 class="ls-title-intro ls-ico-pencil2">Comit&ecirc; de &eacute;tica</h1>
<div data-ls-module="progressBar" role="progressbar" aria-valuenow="<? echo number_format(((100/6)*4),2); ?>" class="ls-animated"></div>
<br />
<div class="ls-box-filter">

<form action="./principal.php?pg=comite_de_etica.php&id_trabalho=<? echo $id_trabalho ?>" enctype="multipart/form-data" class="ls-form ls-form-horizontal" method="POST">
<div class="form-group">
<h3>Seu trabalho foi realizado com Seres Humanos ou Animais?</h3>
<br />
<input type='radio' name='experimentacao' value='sim'>SIM
<br /><br />
<input type='radio' name='experimentacao' value='nao' required="required">N&Atilde;O
        
 <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form>
</div>
</div>
<a href="./principal.php?pg=trabalhos.php&id_trabalho=<? echo $id_trabalho; ?>" class="ls-btn-dark ls-ico-chevron-left">Anterior</a>
