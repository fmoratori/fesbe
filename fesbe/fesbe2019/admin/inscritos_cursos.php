<h1 class="ls-title-intro ls-ico-pencil">Inscritos Cursos</h1>
<?php
//include "./mysqlconecta.php";
//include "./mysqlexecuta.php";
$ver = $_GET['ver'];
$id_atividade = $_POST['atividade'];

if($id_atividade!=''){
    $complemento = " WHERE id=$id_atividade ";
}
else{
    $complemento='';
}

if($ver==1){
$sql_atividades = "SELECT * FROM tb_atividades $complemento ORDER BY id";
$res_atividades = mysqlexecuta($id,$sql_atividades);
?>

<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th width='10%'>ID</th>
      <th width='80%'>Nome</th>
      <th width='80%'>Institui&ccedil;&atilde;o</th>      
      <th width='10%'>A&ccedil;&otilde;es</th>
    </tr>
  </thead>
  <tbody>

<?


while($row_atividades = mysql_fetch_array($res_atividades)){
    $atividade = $row_atividades['id'];
    $sql_consulta_inscritos = "SELECT * FROM tb_usuario WHERE inscricao_obs='$atividade' OR inscricao_obs2='$atividade' OR inscricao_obs3='$atividade' OR inscricao_obs4='$atividade'";
    $res_consulta_inscritos = mysqlexecuta($id,$sql_consulta_inscritos);
    
        echo "<th colspan='3'><center>".$row_atividades['id'].' - '.utf8_encode($row_atividades['nome'])."</center></th>";
        $x=1;
        while($row_consulta_inscritos = mysql_fetch_array($res_consulta_inscritos)){
        $user_atividade = $row_consulta_inscritos['id'];
        $ativ = $row_atividades['id'];
            echo "<tr><td>".$x."</td><td>".utf8_encode($row_consulta_inscritos['nome'])."</td><td>".utf8_encode($row_consulta_inscritos['email'])."</td><td></td></tr>";
            $x++;
            }
            echo "<tr><td>&nbsp;</td></tr>";
}

}
?>
  <form action="principal_admin.php?pg=inscritos_cursos.php&ver=1" class="ls-form ls-form-inline row" method="POST">
<fieldset>
    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">

<select class="ls-custom" name="atividade">
<option value="">Selecione a Atividade</option>
<?
$sql6 = "SELECT * FROM `tb_atividades` ORDER BY id ASC";
$res6 = mysqlexecuta($id,$sql6);
while ($row6 = mysql_fetch_array($res6)) {
?>
	    <option value="<? echo $row6['id'] ?>"><? echo utf8_encode($row6['nome']); ?> </option>  
<?	
}
?>
</select>
</div>
</label>
</fieldset>

<fieldset>
    <label class="ls-label col-md-2s">
        <button class="ls-btn">Buscar</button>
    </label>
</fieldset>
  </form>