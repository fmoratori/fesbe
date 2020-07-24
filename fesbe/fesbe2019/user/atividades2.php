<h1 class="ls-title-intro ls-ico-pencil2">Inscri&ccedil;&atilde;o Em Atividades</h1>
<?
    //echo "<div class='ls-alert-danger'><b>INSCRI&Ccedil;&Otilde;ES EM ATIVIDADES ESTAR&Atilde;O DISPON&Iacute;VEIS EM BREVE</b></div>";    
    $pagto = 0;
    $xyz=0;
$sql_sessao = "SELECT * FROM tb_sessao ORDER BY id ASC";
$res_sessao = mysqlexecuta($id,$sql_sessao);
echo utf8_decode("<h2>Inscrições Realizadas: </h2><br />");
if($row_usuario['inscricao_obs']!=''){
    $insc_obs = $row_usuario['inscricao_obs'];
$sql_atividades_inscrito5 = "SELECT * FROM tb_atividades WHERE id = $insc_obs";
$res_atividades_inscrito5 = mysqlexecuta($id,$sql_atividades_inscrito5);
$row_atividades_inscrito5 = mysql_fetch_array($res_atividades_inscrito5);
$nome_atividade = $row_atividades_inscrito5['nome'];
$sessao_ativ = $row_atividades_inscrito5['sessao'];
$sql_atividades_inscrito6 = "SELECT * FROM tb_sessao WHERE id = $sessao_ativ";
$res_atividades_inscrito6 = mysqlexecuta($id,$sql_atividades_inscrito6);
$row_atividades_inscrito6 = mysql_fetch_array($res_atividades_inscrito6);
$sessao_nome = $row_atividades_inscrito6['nome'];
        echo "<div class='ls-alert-danger'>".$sessao_nome.":<b> ".$nome_atividade."</b>"."</h2></div>";    
}
if($row_usuario['inscricao_obs2']!=''){
    $insc_obs = $row_usuario['inscricao_obs2'];
$sql_atividades_inscrito5 = "SELECT * FROM tb_atividades WHERE id = $insc_obs";
$res_atividades_inscrito5 = mysqlexecuta($id,$sql_atividades_inscrito5);
$row_atividades_inscrito5 = mysql_fetch_array($res_atividades_inscrito5);
$nome_atividade = $row_atividades_inscrito5['nome'];
$sessao_ativ = $row_atividades_inscrito5['sessao'];
$sql_atividades_inscrito6 = "SELECT * FROM tb_sessao WHERE id = $sessao_ativ";
$res_atividades_inscrito6 = mysqlexecuta($id,$sql_atividades_inscrito6);
$row_atividades_inscrito6 = mysql_fetch_array($res_atividades_inscrito6);
$sessao_nome = $row_atividades_inscrito6['nome'];
        echo "<div class='ls-alert-danger'>".$sessao_nome.":<b> ".$nome_atividade."</b>"."</h2></div>";    
}

if($row_usuario['inscricao_obs3']!=''){
    $insc_obs = $row_usuario['inscricao_obs3'];
$sql_atividades_inscrito5 = "SELECT * FROM tb_atividades WHERE id = $insc_obs";
$res_atividades_inscrito5 = mysqlexecuta($id,$sql_atividades_inscrito5);
$row_atividades_inscrito5 = mysql_fetch_array($res_atividades_inscrito5);
$nome_atividade = $row_atividades_inscrito5['nome'];
$sessao_ativ = $row_atividades_inscrito5['sessao'];
$sql_atividades_inscrito6 = "SELECT * FROM tb_sessao WHERE id = $sessao_ativ";
$res_atividades_inscrito6 = mysqlexecuta($id,$sql_atividades_inscrito6);
$row_atividades_inscrito6 = mysql_fetch_array($res_atividades_inscrito6);
$sessao_nome = $row_atividades_inscrito6['nome'];
        echo "<div class='ls-alert-danger'>".$sessao_nome.":<b> ".$nome_atividade."</b>"."</h2></div>";    
}

if($row_usuario['inscricao_obs4']!=''){
    $insc_obs = $row_usuario['inscricao_obs4'];
$sql_atividades_inscrito5 = "SELECT * FROM tb_atividades WHERE id = $insc_obs";
$res_atividades_inscrito5 = mysqlexecuta($id,$sql_atividades_inscrito5);
$row_atividades_inscrito5 = mysql_fetch_array($res_atividades_inscrito5);
$nome_atividade = $row_atividades_inscrito5['nome'];
$sessao_ativ = $row_atividades_inscrito5['sessao'];
$sql_atividades_inscrito6 = "SELECT * FROM tb_sessao WHERE id = $sessao_ativ";
$res_atividades_inscrito6 = mysqlexecuta($id,$sql_atividades_inscrito6);
$row_atividades_inscrito6 = mysql_fetch_array($res_atividades_inscrito6);
$sessao_nome = $row_atividades_inscrito6['nome'];
        echo "<div class='ls-alert-danger'>".$sessao_nome.":<b> ".$nome_atividade."</b>"."</h2></div>";    
}


$ver = $_GET['ver'];
if($ver==s){
    $atividade = $_POST['1'];
    $atividade2 = $_POST['2'];
    $atividade3 = $_POST['3'];
    $atividade4 = $_POST['4'];            
    if($atividade==''){
        if($row_usuario['inscricao_obs']==''){
        $atividade=129;
        }
        else{
            $atividade = $row_usuario['inscricao_obs'];
        }
    }
    if($atividade2==''){
        if($row_usuario['inscricao_obs2']==''){
        $atividade2=130;
        }
        else{
            $atividade2 = $row_usuario['inscricao_obs2'];
        }
    }
    if($atividade3==''){
       if($row_usuario['inscricao_obs3']==''){
        $atividade3=131;
        }
        else{
            $atividade3 = $row_usuario['inscricao_obs3'];
        }
     }
    if($atividade4==''){
       if($row_usuario['inscricao_obs4']==''){
        $atividade4=132;
        }
        else{
            $atividade4 = $row_usuario['inscricao_obs4'];
        }

    }
    



//else{
//    $sql_insere_atividade_inscrito = "UPDATE `tb_usuario` SET `inscricao_obs`='$atividade', `inscricao_obs2`='$atividade2' WHERE `id`=$id_usuario";
    $sql_insere_atividade_inscrito = "UPDATE `tb_usuario` SET `inscricao_obs`='$atividade', `inscricao_obs2`='$atividade2', `inscricao_obs3`='$atividade3', `inscricao_obs4`='$atividade4' WHERE `id`=$id_usuario";
    $res_insere_atividade_inscrito = mysqlexecuta($id,$sql_insere_atividade_inscrito);
header("Refresh: 1; url = ./principal.php?pg=atividades2.php");
$sql_atividades_inscrito = "SELECT * FROM tb_atividades WHERE id = $atividade";
$res_atividades_inscrito = mysqlexecuta($id,$sql_atividades_inscrito);
$row_atividades_inscrito = mysql_fetch_array($res_atividades_inscrito);
$nome_atividade = $row_atividades_inscrito['nome'];

$sql_atividades_inscrito2 = "SELECT * FROM tb_atividades WHERE id = $atividade2";
$res_atividades_inscrito2 = mysqlexecuta($id,$sql_atividades_inscrito2);
$row_atividades_inscrito2 = mysql_fetch_array($res_atividades_inscrito2);
$nome_atividade2 = $row_atividades_inscrito2['nome'];
 //   echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade</b> foi realizada com sucesso</div>";    
    
  //  echo "<div class='ls-alert-success'>Sua Inscri&ccedil;&atilde;o na Atividade <b>$nome_atividade2</b> foi realizada com sucesso</div>";    
//}
}



echo "<div class='ls-alert-success'><center><b>Per&iacute;odo Para Inscri&ccedil;&otilde;es Em Atividades Encerrado.</b></center></div>";
?>
<form action="./principal.php?pg=atividades2.php&ver=s" class="ls-form row" method="POST">
<?
while($row_sessao = mysql_fetch_array($res_sessao)){
    $id_sessao = $row_sessao['id'];
?>
  <div data-ls-module="collapse" data-target="<? echo "#".$id_sessao; ?>" class="ls-collapse ">
    <a href="#" class="ls-collapse-header">
      <h3 class="ls-collapse-title"><? echo $row_sessao['nome']; ?></h3>
    </a>
<?
$sql_atividades = "SELECT * FROM tb_atividades WHERE sessao='$id_sessao'";
$res_atividades = mysqlexecuta($id,$sql_atividades);
while($row_atividades = mysql_fetch_array($res_atividades)){
$sessao = $row_atividades['sessao'];
$id_atividade = $row_atividades['id'];
?>
    <div class="ls-collapse-body" id="<? echo $id_sessao; ?>">
      <p>
      <?
      $selected='';
      $disabled = '';
      
$count = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE inscricao_obs=$id_atividade");
$inscritos =  mysql_result($count, 0);
if($inscritos>=$row_atividades['capacidade']){
    $disabled= "disabled = 'disabled'";
}
$count2 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE inscricao_obs2=$id_atividade");
$inscritos2 =  mysql_result($count2, 0);
if($inscritos2>=$row_atividades['capacidade']){
    $disabled= "disabled = 'disabled'";
}     
$count3 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE inscricao_obs3=$id_atividade");
$inscritos3 =  mysql_result($count3, 0);
if($inscritos3>=$row_atividades['capacidade']){
    $disabled= "disabled = 'disabled'";
}
$count4 = mysql_query("SELECT COUNT(*) FROM `tb_usuario` WHERE inscricao_obs4=$id_atividade");
$inscritos4 =  mysql_result($count4, 0);
if($inscritos4>=$row_atividades['capacidade']){
    $disabled= "disabled = 'disabled'";
}       
      if($sessao==1 && $id_atividade== $row_usuario['inscricao_obs']){
        $selected = "checked='checked'";
        //$disabled = "disabled = 'disabled'";
      }
      if($sessao==2 && $id_atividade== $row_usuario['inscricao_obs2']){
        $selected = "checked='checked'";
      }
      if($sessao==3 && $id_atividade== $row_usuario['inscricao_obs3']){
        $selected = "checked='checked'";
      }
      if($sessao==4 && $id_atividade== $row_usuario['inscricao_obs4']){
        $selected = "checked='checked'";
      }
$disabled = "disabled = 'disabled'";
      ?>
        <input type="radio" name="<? echo $id_sessao; ?>" <? echo $selected; ?><? echo $disabled; ?> value="<? echo $row_atividades['id']; ?>"> &nbsp;&nbsp;      <a href="#" class="" data-custom-class="ls-color-success" data-ls-module="popover" data-trigger="hover" data-title="<? echo $row_atividades['nome']; ?>" data-content="<p><? echo $row_atividades['exibe']; ?></p>" data-placement="right"><? echo $row_atividades['nome']; ?></td>
        </a>
      </p>
    </div>

<?
}
?>
  </div>
<?
}
?>
  <div class="ls-actions-btn">
    <button class="ls-btn">Salvar</button>
  </div>
</form>
