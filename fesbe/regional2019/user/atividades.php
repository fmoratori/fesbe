<?
if($idioma==1 || $idioma==null || $idioma==2 || $idioma==3){
?>
<h1 class="ls-title-intro ls-ico-pencil2">Inscri&ccedil;&atilde;o Em Atividades</h1>
<?
    //echo "<div class='ls-alert-danger'><b>INSCRI&Ccedil;&Otilde;ES EM ATIVIDADES ESTAR&Atilde;O DISPON&Iacute;VEIS EM BREVE</b></div>";    
$sql_pagamentos = "SELECT * FROM tb_boleto WHERE `user_id` = $id_usuario";
$res_pagamentos = mysqlexecuta($id,$sql_pagamentos);
    $pagto = 0;
while($row_pagamentos = mysql_fetch_array($res_pagamentos)){
    if($row_pagamentos['situacao']=='NP' || $row_pagamentos['situacao']=='PE'){
        $pagto++;
    }
}
if($pagto>0){
        echo "<div class='ls-alert-danger'><h2>Inscri&ccedil;&otilde;es Dispon&iacute;veis Apenas para Inscritos sem Pend&ecirc;ncias de Pagamento!</h2></div>";
}
else{
$ver = $_GET['ver'];
if($ver==s && $_POST['atividade']!=''){
    $atividade = $_POST['atividade'];
    if($_POST['atividade2']==''){
        $atividade2=0;
    }
    else{
    $atividade2 = $_POST['atividade2'];
    }
if($atividade==''){
        echo "<div class='ls-alert-danger'><h2>Selecione ao menos uma atividade de cada grupo!</h2></div>";    
}

//else{
//    $sql_insere_atividade_inscrito = "UPDATE `tb_usuario` SET `inscricao_obs`='$atividade', `inscricao_obs2`='$atividade2' WHERE `id`=$id_usuario";
    $sql_insere_atividade_inscrito = "UPDATE `tb_usuario` SET `inscricao_obs`='$atividade', `inscricao_obs2`='$atividade2' WHERE `id`=$id_usuario";
    $res_insere_atividade_inscrito = mysqlexecuta($id,$sql_insere_atividade_inscrito);

$sql_atividades_inscrito = "SELECT * FROM tb_atividades WHERE id = $atividade";
$res_atividades_inscrito = mysqlexecuta($id,$sql_atividades_inscrito);
$row_atividades_inscrito = mysql_fetch_array($res_atividades_inscrito);
$nome_atividade = $row_atividades_inscrito['nome'];

$sql_atividades_inscrito2 = "SELECT * FROM tb_atividades WHERE id = $atividade2";
$res_atividades_inscrito2 = mysqlexecuta($id,$sql_atividades_inscrito2);
$row_atividades_inscrito2 = mysql_fetch_array($res_atividades_inscrito2);
$nome_atividade2 = $row_atividades_inscrito2['nome'];
    echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade</b> foi realizada com sucesso</div>";    
    
    echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade2</b> foi realizada com sucesso</div>";    
//}
}

?>
<?
$sql_inscrito = "SELECT * FROM tb_usuario WHERE id = $id_usuario";
$res_inscrito = mysqlexecuta($id,$sql_inscrito);
$row_inscrito = mysql_fetch_array($res_inscrito);
$atividade = $row_inscrito['inscricao_obs'];
$atividade2 = $row_inscrito['inscricao_obs2'];

if($atividade!=''){
$sql_atividades_inscrito = "SELECT * FROM tb_atividades WHERE id = $atividade";
$res_atividades_inscrito = mysqlexecuta($id,$sql_atividades_inscrito);
$row_atividades_inscrito = mysql_fetch_array($res_atividades_inscrito);
$nome_atividade = $row_atividades_inscrito['nome'];

$sql_atividades_inscrito2 = "SELECT * FROM tb_atividades WHERE id = $atividade2";
$res_atividades_inscrito2 = mysqlexecuta($id,$sql_atividades_inscrito2);
$row_atividades_inscrito2 = mysql_fetch_array($res_atividades_inscrito2);
$nome_atividade2 = $row_atividades_inscrito2['nome'];

    echo "<div class='ls-alert-success'>Voc&ecirc; est&aacute; inscrito na Atividade <b>$nome_atividade</b> </div>";
    echo "<div class='ls-alert-success'>Voc&ecirc; est&aacute; inscrito na Atividade <b>$nome_atividade2</b> </div>";

    }
?>

<form action="./principal.php?pg=atividades.php&ver=s" class="ls-form row" method="POST">
<h3><center>Cursos</center></h3>

<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Atividade</th>
      <th class="hidden-xs">Sala</th>
      <th>Vagas</th>
    </tr>
  </thead>
  <tbody>
<?
$sql_atividades = "SELECT * FROM tb_atividades WHERE `sessao`=6 ORDER BY id";
$res_atividades = mysqlexecuta($id,$sql_atividades);
while($row_atividades = mysql_fetch_array($res_atividades)){
    $selected = "";
    $id_atividade = $row_atividades['id'];
$sql_usuario = "SELECT * FROM tb_usuario WHERE id = $id_usuario";
$res_usuario = mysqlexecuta($id,$sql_usuario);
$row_usuario = mysql_fetch_array($res_usuario);

if($row_usuario['inscricao_obs']== $row_atividades['id']){
    $selected = "checked='checked'";
}
$inscritos=0;

$sql_inscritos = "SELECT * FROM tb_usuario WHERE inscricao_obs = $id_atividade";
$res_inscritos = mysqlexecuta($id,$sql_inscritos);
while($row_inscritos = mysql_fetch_array($res_inscritos)){
    $inscritos = $inscritos+1;
}
$disabled = '';
$vagas = $row_atividades['capacidade']-$inscritos;

$esgotado = "<b>Dispon&iacute;vel</b>";
if($inscritos>=$row_atividades['capacidade']){
    $disabled = "disabled='disabled'";
    $esgotado = "<b>ESGOTADO</b>";
}
?>
    <tr>
      <td>
      <label class="ls-label-text">
        <input type="radio" name="atividade" <? echo $selected; ?> <? echo $disabled; ?> value="<? echo $row_atividades['id']; ?>"> &nbsp;&nbsp;<? echo $row_atividades['nome']; ?></td>
      </label>
      <td class="hidden-xs"><? echo $row_atividades['sala']; ?></td>
      <td class="hidden-xs"><? echo $esgotado; ?></td>      
    </tr>
<?    
}
?>
  </tbody>
</table>
<!--
<h3><center>Cursos - GRUPO II</center></h3>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Atividade</th>
      <th class="hidden-xs">Sala</th>
      <th>Vagas</th>
    </tr>
  </thead>
  <tbody>
-->
<?
/**
$sql_atividades = "SELECT * FROM tb_atividades WHERE exibe='S' AND `sessao`=8 ORDER BY id";
$res_atividades = mysqlexecuta($id,$sql_atividades);
while($row_atividades = mysql_fetch_array($res_atividades)){
    $selected = "";
    $id_atividade = $row_atividades['id'];
$sql_usuario = "SELECT * FROM tb_usuario WHERE id = $id_usuario";
$res_usuario = mysqlexecuta($id,$sql_usuario);
$row_usuario = mysql_fetch_array($res_usuario);
if($row_usuario['inscricao_obs2']== $row_atividades['id']){
    $selected = "checked='checked'";
}
$inscritos=0;
$sql_inscritos = "SELECT * FROM tb_usuario WHERE inscricao_obs2 = $id_atividade";
$res_inscritos = mysqlexecuta($id,$sql_inscritos);
while($row_inscritos = mysql_fetch_array($res_inscritos)){
    $inscritos = $inscritos+1;
}
$disabled = '';
$vagas = $row_atividades['capacidade']-$inscritos;

if($inscritos>=$row_atividades['capacidade']){
    $disabled = "disabled='disabled'";
}
?>
    <tr>
      <td>
      <label class="ls-label-text">
        <input type="radio" name="atividade2" <? echo $selected; ?> <? echo $disabled; ?> value="<? echo $row_atividades['id']; ?>"> &nbsp;&nbsp;<? echo $row_atividades['nome']; ?></td>
      </label>
      <td class="hidden-xs"><? echo $row_atividades['sala']; ?></td>
      <td class="hidden-xs"><? // echo $vagas; ?></td>      
    </tr>
<?    
}**/
?>
  </tbody>
</table>
<?
$_POST['atividade2']=0;
?>
  <div class="ls-actions-btn">
    <button class="ls-btn">Pr&oacute;ximo</button>
  </div>
</form>
<?
}
}
?>


<?
if($idioma==5){
?>
<h1 class="ls-title-intro ls-ico-pencil2">Activities Register</h1>



<?
    //echo "<div class='ls-alert-danger'><b>INSCRI&Ccedil;&Otilde;ES EM ATIVIDADES ESTAR&Atilde;O DISPON&Iacute;VEIS EM BREVE</b></div>";    

$sql_pagamentos = "SELECT * FROM tb_boleto WHERE `user_id` = $id_usuario";
$res_pagamentos = mysqlexecuta($id,$sql_pagamentos);

    $pagto = 0;

while($row_pagamentos = mysql_fetch_array($res_pagamentos)){
    if($row_pagamentos['situacao']=='NP' || $row_pagamentos['situacao']=='PE'){
        $pagto++;
    }

}

if($pagto>0){
        echo "<div class='ls-alert-danger'><h2>Inscri&ccedil;&otilde;es Dispon&iacute;veis Apenas para Inscritos sem Pend&ecirc;ncias de Pagamento!</h2></div>";    
}

else{
$ver = $_GET['ver'];

if($ver==s){
    $atividade = $_POST['atividade'];
    $atividade2 = $_POST['atividade2'];
if($atividade==''){
        echo "<div class='ls-alert-danger'><h2>Selecione ao menos uma atividade de cada grupo!</h2></div>";    
}
//else{

//    $sql_insere_atividade_inscrito = "UPDATE `tb_usuario` SET `inscricao_obs`='$atividade', `inscricao_obs2`='$atividade2' WHERE `id`=$id_usuario";
    $sql_insere_atividade_inscrito = "UPDATE `tb_usuario` SET `inscricao_obs`='$atividade' WHERE `id`=$id_usuario";
    $res_insere_atividade_inscrito = mysqlexecuta($id,$sql_insere_atividade_inscrito);

$sql_atividades_inscrito = "SELECT * FROM tb_atividades WHERE id = $atividade";
$res_atividades_inscrito = mysqlexecuta($id,$sql_atividades_inscrito);
$row_atividades_inscrito = mysql_fetch_array($res_atividades_inscrito);
$nome_atividade = $row_atividades_inscrito['nome'];

//$sql_atividades_inscrito2 = "SELECT * FROM tb_atividades WHERE id = $atividade2";
//$res_atividades_inscrito2 = mysqlexecuta($id,$sql_atividades_inscrito2);
//$row_atividades_inscrito2 = mysql_fetch_array($res_atividades_inscrito2);
//$nome_atividade2 = $row_atividades_inscrito2['nome'];
    echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade</b> foi realizada com sucesso</div>";    
    
//    echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade2</b> foi realizada com sucesso</div>";    
//}
}





?>
<form action="./principal.php?pg=atividades.php&ver=s" class="ls-form row" method="POST">
<h3><center>Cursos - GRUPO I</center></h3>
<table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Atividade</th>
      <th class="hidden-xs">Sala</th>
      <th>Vagas</th>
    </tr>
  </thead>
  <tbody>
<?
$sql_atividades = "SELECT * FROM tb_atividades WHERE exibe='S' AND `sessao`=7 ORDER BY id";
$res_atividades = mysqlexecuta($id,$sql_atividades);
while($row_atividades = mysql_fetch_array($res_atividades)){
    $selected = "";
    $id_atividade = $row_atividades['id'];
$sql_usuario = "SELECT * FROM tb_usuario WHERE id = $id_usuario";
$res_usuario = mysqlexecuta($id,$sql_usuario);
$row_usuario = mysql_fetch_array($res_usuario);

if($row_usuario['inscricao_obs']== $row_atividades['id']){

    $selected = "checked='checked'";
}

$inscritos=0;

$sql_inscritos = "SELECT * FROM tb_usuario WHERE inscricao_obs = $id_atividade";

$res_inscritos = mysqlexecuta($id,$sql_inscritos);

while($row_inscritos = mysql_fetch_array($res_inscritos)){

    $inscritos = $inscritos+1;

}

$disabled = '';

$vagas = $row_atividades['capacidade']-$inscritos;


if($inscritos>=$row_atividades['capacidade']){

    $disabled = "disabled='disabled'";

}

?>

    <tr>

      <td>

      <label class="ls-label-text">

        <input type="radio" name="atividade" <? echo $selected; ?> <? echo $disabled; ?> value="<? echo $row_atividades['id']; ?>"> &nbsp;&nbsp;<? echo $row_atividades['nome']; ?></td>

      </label>

      <td class="hidden-xs"><? echo $row_atividades['sala']; ?></td>

      <td class="hidden-xs"><? //echo $vagas; ?></td>      

    </tr>

<?    

}

?>

  </tbody>

</table>




<!---
<h3><center>Cursos - GRUPO II</center></h3>

<table class="ls-table ls-table-striped">

  <thead>

    <tr>

      <th>Atividade</th>

      <th class="hidden-xs">Sala</th>

      <th>Vagas</th>

    </tr>

  </thead>

  <tbody>

<?

//$sql_atividades = "SELECT * FROM tb_atividades WHERE exibe='S' AND `sessao`=6 ORDER BY id";

//$res_atividades = mysqlexecuta($id,$sql_atividades);

//while($row_atividades = mysql_fetch_array($res_atividades)){

//    $selected = "";

//    $id_atividade = $row_atividades['id'];

//$sql_usuario = "SELECT * FROM tb_usuario WHERE id = $id_usuario";

//$res_usuario = mysqlexecuta($id,$sql_usuario);

//$row_usuario = mysql_fetch_array($res_usuario);



//if($row_usuario['inscricao_obs2']== $row_atividades['id']){

  //  $selected = "checked='checked'";

//}

//$inscritos=0;

//$sql_inscritos = "SELECT * FROM tb_usuario WHERE inscricao_obs2 = $id_atividade";

//$res_inscritos = mysqlexecuta($id,$sql_inscritos);

//while($row_inscritos = mysql_fetch_array($res_inscritos)){

  //  $inscritos = $inscritos+1;

//}

//$disabled = '';

//$vagas = $row_atividades['capacidade']-$inscritos;


if($inscritos>=$row_atividades['capacidade']){

    $disabled = "disabled='disabled'";

}

?>

    <tr>

      <td>

      <label class="ls-label-text">

        <input type="radio" name="atividade2" <? echo $selected; ?> <? echo $disabled; ?> value="<? echo $row_atividades['id']; ?>"> &nbsp;&nbsp;<? echo $row_atividades['nome']; ?></td>

      </label>

      <td class="hidden-xs"><? echo $row_atividades['sala']; ?></td>

      <td class="hidden-xs"><? // echo $vagas; ?></td>      

    </tr>

<?    

//}

?>

  </tbody>

</table>



--->



  <div class="ls-actions-btn">

    <button class="ls-btn">Pr&oacute;ximo</button>

  </div>



</form>

<?

}


}
?>



<?
if($idioma==7){
?>
<h1 class="ls-title-intro ls-ico-pencil2">Inscripción En Actividades</h1>



<?
    //echo "<div class='ls-alert-danger'><b>INSCRI&Ccedil;&Otilde;ES EM ATIVIDADES ESTAR&Atilde;O DISPON&Iacute;VEIS EM BREVE</b></div>";    

$sql_pagamentos = "SELECT * FROM tb_boleto WHERE `user_id` = $id_usuario";

$res_pagamentos = mysqlexecuta($id,$sql_pagamentos);

    $pagto = 0;

while($row_pagamentos = mysql_fetch_array($res_pagamentos)){

    if($row_pagamentos['situacao']=='NP' || $row_pagamentos['situacao']=='PE'){

        $pagto++;

    }

}

if($pagto>0){

        echo "<div class='ls-alert-danger'><h2>Inscri&ccedil;&otilde;es Dispon&iacute;veis Apenas para Inscritos sem Pend&ecirc;ncias de Pagamento!</h2></div>";    

    

}

else{

$ver = $_GET['ver'];

if($ver==s){

    $atividade = $_POST['atividade'];

    $atividade2 = $_POST['atividade2'];

if($atividade=='' || $atividade2==''){

        echo "<div class='ls-alert-danger'><h2>Selecione ao menos uma atividade de cada grupo!</h2></div>";    

    

}

else{

    $sql_insere_atividade_inscrito = "UPDATE `tb_usuario` SET `inscricao_obs`='$atividade', `inscricao_obs2`='$atividade2' WHERE `id`=$id_usuario";

    $res_insere_atividade_inscrito = mysqlexecuta($id,$sql_insere_atividade_inscrito);

$sql_atividades_inscrito = "SELECT * FROM tb_atividades WHERE id = $atividade";

$res_atividades_inscrito = mysqlexecuta($id,$sql_atividades_inscrito);

$row_atividades_inscrito = mysql_fetch_array($res_atividades_inscrito);

$nome_atividade = $row_atividades_inscrito['nome'];

$sql_atividades_inscrito2 = "SELECT * FROM tb_atividades WHERE id = $atividade2";

$res_atividades_inscrito2 = mysqlexecuta($id,$sql_atividades_inscrito2);

$row_atividades_inscrito2 = mysql_fetch_array($res_atividades_inscrito2);

$nome_atividade2 = $row_atividades_inscrito2['nome'];



    echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade</b> foi realizada com sucesso</div>";    



    echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade2</b> foi realizada com sucesso</div>";    

}

}



?>

<form action="./principal.php?pg=atividades.php&ver=s" class="ls-form row" method="POST">

<h3><center>Cursos - GRUPO I</center></h3>

<table class="ls-table ls-table-striped">

  <thead>

    <tr>

      <th>Atividade</th>

      <th class="hidden-xs">Sala</th>

      <th>Vagas</th>

    </tr>

  </thead>

  <tbody>

<?

$sql_atividades = "SELECT * FROM tb_atividades WHERE exibe='S' AND `sessao`=5 ORDER BY id";

$res_atividades = mysqlexecuta($id,$sql_atividades);

while($row_atividades = mysql_fetch_array($res_atividades)){

    $selected = "";

    $id_atividade = $row_atividades['id'];

$sql_usuario = "SELECT * FROM tb_usuario WHERE id = $id_usuario";

$res_usuario = mysqlexecuta($id,$sql_usuario);

$row_usuario = mysql_fetch_array($res_usuario);



if($row_usuario['inscricao_obs']== $row_atividades['id']){

    $selected = "checked='checked'";

}

$inscritos=0;

$sql_inscritos = "SELECT * FROM tb_usuario WHERE inscricao_obs = $id_atividade";

$res_inscritos = mysqlexecuta($id,$sql_inscritos);

while($row_inscritos = mysql_fetch_array($res_inscritos)){

    $inscritos = $inscritos+1;

}

$disabled = '';

$vagas = $row_atividades['capacidade']-$inscritos;

if(1==1){
	$disabled = "disabled='disabled'";
	
}

if($inscritos>=$row_atividades['capacidade']){

    $disabled = "disabled='disabled'";

}

?>

    <tr>

      <td>

      <label class="ls-label-text">

        <input type="radio" name="atividade" <? echo $selected; ?> <? echo $disabled; ?> value="<? echo $row_atividades['id']; ?>"> &nbsp;&nbsp;<? echo $row_atividades['nome']; ?></td>

      </label>

      <td class="hidden-xs"><? echo $row_atividades['sala']; ?></td>

      <td class="hidden-xs"><? //echo $vagas; ?></td>      

    </tr>

<?    

}

?>

  </tbody>

</table>





<h3><center>Cursos - GRUPO II</center></h3>

<table class="ls-table ls-table-striped">

  <thead>

    <tr>

      <th>Atividade</th>

      <th class="hidden-xs">Sala</th>

      <th>Vagas</th>

    </tr>

  </thead>

  <tbody>

<?

$sql_atividades = "SELECT * FROM tb_atividades WHERE exibe='S' AND `sessao`=6 ORDER BY id";

$res_atividades = mysqlexecuta($id,$sql_atividades);

while($row_atividades = mysql_fetch_array($res_atividades)){

    $selected = "";

    $id_atividade = $row_atividades['id'];

$sql_usuario = "SELECT * FROM tb_usuario WHERE id = $id_usuario";

$res_usuario = mysqlexecuta($id,$sql_usuario);

$row_usuario = mysql_fetch_array($res_usuario);



if($row_usuario['inscricao_obs2']== $row_atividades['id']){

    $selected = "checked='checked'";

}

$inscritos=0;

$sql_inscritos = "SELECT * FROM tb_usuario WHERE inscricao_obs2 = $id_atividade";

$res_inscritos = mysqlexecuta($id,$sql_inscritos);

while($row_inscritos = mysql_fetch_array($res_inscritos)){

    $inscritos = $inscritos+1;

}

$disabled = '';

$vagas = $row_atividades['capacidade']-$inscritos;

if(1==1){
    $disabled = "disabled='disabled'";
	
}

if($inscritos>=$row_atividades['capacidade']){

    $disabled = "disabled='disabled'";

}

?>

    <tr>

      <td>

      <label class="ls-label-text">

        <input type="radio" name="atividade2" <? echo $selected; ?> <? echo $disabled; ?> value="<? echo $row_atividades['id']; ?>"> &nbsp;&nbsp;<? echo $row_atividades['nome']; ?></td>

      </label>

      <td class="hidden-xs"><? echo $row_atividades['sala']; ?></td>

      <td class="hidden-xs"><? // echo $vagas; ?></td>      

    </tr>

<?    

}

?>

  </tbody>

</table>







  <div class="ls-actions-btn">

<!---
    <button class="ls-btn">Pr&oacute;ximo</button>
---->
  </div>



</form>

<?

}


}
?>