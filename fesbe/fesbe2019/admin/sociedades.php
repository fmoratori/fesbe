<!DOCTYPE html>

<html class="<? echo $row_evento['cor']; ?>">

  <head>
    <title>FMSYS</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descri��o da p�gina.">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>

<?
include './mysqlconecta.php';
include './mysqlexecuta.php';
$sociedade = $_GET['id_sociedade'];

    $sql_consulta_inscritos = "SELECT * FROM tb_usuario WHERE categoria IN (1,3,5,7) AND id IN (SELECT user_id FROM tb_boleto WHERE situacao = 'PG' OR situacao='IS') AND sociedade_filiada = $sociedade ORDER BY nome ASC";
//    echo $sql_consulta_inscritos;
    $res_consulta_inscritos = mysqlexecuta($id,$sql_consulta_inscritos);

    $sql_sociedade = "SELECT * FROM tb_sociedades WHERE id = $sociedade";
//    echo $sql_consulta_inscritos;
    $res_sociedade = mysqlexecuta($id,$sql_sociedade);
    $row_sociedade = mysql_fetch_array($res_sociedade);
    echo "<p align='center'><b>".$row_sociedade['nome']."</b></p>";

    ?>



<table class="ls-table ls-no-hover ls-table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>E-mail</th>
      <th>CPF</th>
      <th>Telefone</th>
      <th>Celular</th>
      <th>Categoria</th>
    </tr>
  </thead>
  <tbody>
<?
$x=0;
   while($row_consulta_inscritos = mysql_fetch_array($res_consulta_inscritos)){
    $x++;
        echo "<tr>";
        echo "<td>".$row_consulta_inscritos['nome']."</td>";
        echo "<td>".$row_consulta_inscritos['email']."</td>";
        echo "<td>".$row_consulta_inscritos['cpf']."</td>";
        echo "<td>".$row_consulta_inscritos['telefone']."</td>";
        echo "<td>".$row_consulta_inscritos['celular']."</td>";


$user_id = $row_consulta_inscritos['id'];
    $categoria = $row_consulta_inscritos['categoria'];    
    $sql_categoria_inscrito = "SELECT * FROM tb_categoria WHERE `id` = '$categoria'";
    $res_categoria_inscrito = mysqlexecuta($id,$sql_categoria_inscrito);
    $row_categoria_inscrito = mysql_fetch_array($res_categoria_inscrito);    
    $id_categoria = $row_categoria_inscrito['id'];
    $categoria_nome = $row_categoria_inscrito['nome'];
    echo "<td>".$categoria_nome."</td>";
//    echo $row_categoria_inscrito['status'];
?>
      </div>
<?
//        echo "<td><a href='./principal_admin.php?pg=dados_inscrito.php&id_inscrito=".$row_consulta_inscritos['id']."' class='ls-ico-eye' title='Dados Inscritos'></a>&nbsp;";
  //      echo "<a href='./principal_admin.php?pg=boletos.php&id_inscrito=".$row_consulta_inscritos['id']."' class='ls-ico-cart' title='Dados de Boletos'></a></td>";
        echo "</tr>";
   }

        echo "<b>Resultados: </b>".$x."</table>";

?>