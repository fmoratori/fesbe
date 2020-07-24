<?php
include "./mysqlconecta.php";
include "./mysqlexecuta.php";

$sql_atividades = "SELECT * FROM tb_atividades ORDER BY id";
$res_atividades = mysqlexecuta($id,$sql_atividades);
while($row_atividades = mysql_fetch_array($res_atividades)){
    $atividade = $row_atividades['id'];
    $sql_consulta_inscritos = "SELECT * FROM tb_usuario WHERE inscricao_obs='$atividade' OR inscricao_obs2='$atividade'";
    $res_consulta_inscritos = mysqlexecuta($id,$sql_consulta_inscritos);
        echo "<br /><br /><b>".$row_atividades['id'].' - '.$row_atividades['nome']."</b><br />";
        $x=1;
        while($row_consulta_inscritos = mysql_fetch_array($res_consulta_inscritos)){
            echo "<br />".$x." - ".$row_consulta_inscritos['nome'];
            $x++;
            }
}

?>