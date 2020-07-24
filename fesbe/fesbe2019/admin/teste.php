<?
include './mysqlconecta.php';
include './mysqlexecuta.php';
$sociedade = $_GET['id_sociedade'];

    $sql_sociedade = "SELECT * FROM tb_sociedades ORDER BY id ASC";
//    echo $sql_consulta_inscritos;
    $res_sociedade = mysqlexecuta($id,$sql_sociedade);
    while($row_sociedade = mysql_fetch_array($res_sociedade)){
    $link = 'http://fmsys.com.br/fmsys/fesbe/fesbe2019/admin/sociedades.php?id_sociedade='.$row_sociedade['id'];

    echo "<p><b>".$row_sociedade['nome']."</b>  -  ";
    echo "<a href='$link'>$link</a></p>";
}
?>