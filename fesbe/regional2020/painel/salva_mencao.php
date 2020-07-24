<?
$id_mencao = $_POST['mencao'];
$ausente = $_GET['ausente'];
$id_avaliador = $_GET['id_aval'];
$sessao_id = $_GET['sessao'];
include "mysqlconecta.php";
include "mysqlexecuta.php";

if($ausente=='1'){
    $sql53="UPDATE `tb_trabalhos` SET `mencao`='n' WHERE `avaliador_painel`='$id_avaliador' AND `sessao_id`='$sessao_id'";	
  //  echo $sql53;
    $res53 = mysqlexecuta($id,$sql53);
    echo "<meta http-equiv='refresh' content='0; url=./principal.php'>";    
}
else{
    $sql53="UPDATE `tb_trabalhos` SET `mencao`='s' WHERE `id`=$id_mencao";	
    $res53 = mysqlexecuta($id,$sql53);
    echo "<meta http-equiv='refresh' content='0; url=./principal.php'>";
}
?>