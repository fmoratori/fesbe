<?
$ver = $_GET['ver'];
?>

<h1 class="ls-title-intro ls-ico-user">RELAT&Oacute;RIOS</h1>
<!---
<div class="ls-box-filter">

  <form action="principal_admin.php?pg=consulta_inscritos.php&ver=1" class="ls-form-row" method="POST">
<fieldset>
  <label class="ls-label col-md-4" role='search'>
        <b class="ls-label-text">Digite o Texto</b>
        <input type="text" name="texto" placeholder="Texto da Busca" value="">
    </label>
 </fieldset>
<br />
<fieldset>
    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">
        <select class="ls-custom" name="categoria">

<option value="">Selecione a Categoria</option>
<?
$sql4 = "SELECT * FROM `tb_categoria`";
$res4 = mysqlexecuta($id,$sql4);
while ($row4 = mysql_fetch_array($res4)) {
?>
	    <option value="<? echo $row4['id'] ?>"><? echo $row4['id'].'-'.utf8_encode($row4['nome']); ?> </option>  
<?	
}
?>
        </select>
        </div>
        </label>

 <br />   


    <label class="ls-label col-md-4">
      <div class="ls-custom-select ">
        <select class="ls-custom" name="pgto">

<option value="">Selecione a situação de pagamento</option>
	    <option value="NP">Não Pago</option> 
	    <option value="PG">Pago</option>         
        </select>
        </div>
        </label>



 <fieldset>
    <div class="ls-label col-md-3 ls-form" role='search'>
      <b class="ls-label-text">Critério de Busca</b>
      <label class="ls-label-text">
        <input type="radio" name="criterio" value="nome">
        Nome
        <input type="radio" name="criterio" value="email">
        E-mail
        <input type="radio" name="criterio"value="cpf">
        CPF
      </label>
    </div>
  </fieldset>
<br />
<fieldset>
    <label class="ls-label col-md-2s">
        <button class="ls-btn">Buscar</button>
    </label>
</fieldset>
  </form>
</div> -->
<?
$ver=1;
$texto = '%'.$_POST['texto'].'%';
$cat = $_POST['categoria'];
$pgto = $_POST['pgto'];
    $sql_consulta_inscritos = "SELECT * FROM tb_grade";
    $res_consulta_inscritos = mysqlexecuta($id,$sql_consulta_inscritos);
    $x=0;
    echo "<table border='1'>";
    echo "<th>Data</th><th>Sala</th><th>Atividade</th><th>TOTAL</th>";
    while($row_consulta_inscritos = mysql_fetch_array($res_consulta_inscritos)){
    $x++;
    $id1 = $row_consulta_inscritos['id'];
    $data = trim($row_consulta_inscritos['data']);
    $inicio = trim($row_consulta_inscritos['hora_inicio']);
    $fim = trim($row_consulta_inscritos['hora_fim']);
    $sala = trim($row_consulta_inscritos['sala']);
//    echo   "<div data-ls-module='collapse' data-target='#$id1' class='ls-collapse'>";
    echo     "<tr><td>".$row_consulta_inscritos['data']."</td><td> ".$row_consulta_inscritos['sala']."</td><td>".$row_consulta_inscritos['atividade']."</b></td>";
    $sql_consulta = "SELECT DISTINCT * FROM tb_usuario WHERE num_inscricao IN (SELECT cod_leitura FROM tb_dados WHERE data LIKE '%$data' AND sala LIKE '$sala' AND hora >= '$inicio' AND hora <= '$fim') ORDER BY nome ASC";
    //echo $sql_consulta;
    $res_consulta = mysqlexecuta($id,$sql_consulta);
        $y = 0;
        while($row_consulta = mysql_fetch_array($res_consulta)){
        //$cod = $row_consulta['cod_leitura']."<br />";
           // echo $y." - ".utf8_encode($row_consulta['nome'])."<br />";
            $y++;

}
echo "<td><center>".$y."</center></td></tr>";

}
echo    "</table>";

?>