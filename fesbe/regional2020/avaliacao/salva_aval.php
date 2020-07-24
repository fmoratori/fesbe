<?
$id_trabalho = $_GET['id_trabalho'];
$ausente = $_GET['ausente'];
include "mysqlconecta.php";
include "mysqlexecuta.php";

if($ausente=='1'){
    $sql53="UPDATE `tb_trabalhos` SET `nota_apresentacao`=1,`nota_conteudo`=1,`nota_painel`=1 WHERE `id`=$id_trabalho;";	
    $res53 = mysqlexecuta($id,$sql53);
    echo "<meta http-equiv='refresh' content='0; url=./admin_avaliacao_painel.php?pg=home2.php'>";
}
else{
    $nota_apresentacao = $_POST['apres'];
    $nota_conteudo = $_POST['cont'];
    $nota_painel = $_POST['painel'];
    
    $sql53="UPDATE `tb_trabalhos` SET `nota_apresentacao`='$nota_apresentacao',`nota_conteudo`='$nota_conteudo',`nota_painel`='$nota_painel', `presenca`='s' WHERE `id`=$id_trabalho;";	
    $res53 = mysqlexecuta($id,$sql53);
    echo "<meta http-equiv='refresh' content='0; url=./admin_avaliacao_painel.php?pg=home2.php'>";
}
?>