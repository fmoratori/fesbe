<?
$id_trabalho = $_GET['id_trabalho'];
if($id_trabalho==$id_usuario){
$id_autor = $_GET['id_autor'];
    $sql_remove_autor="DELETE FROM `tb_autores` WHERE `id`='$id_autor' AND `trabalho_id` = '$id_trabalho'";	
    $res_remove_autor = mysqlexecuta($id,$sql_remove_autor);	
    echo "<meta http-equiv='refresh' content='0; url=./principal.php?pg=orientador.php&id_trabalho=$id_trabalho'>";
    }
?>
