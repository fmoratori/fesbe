<?
$nivel = $_POST['nivel'];
$mensagem = $_POST['mensagem'];
$exibir = $_POST['exibir'];
if($nivel!='' && $mensagem!='' && $exibir!=''){

    $sql_insere_mensagem="INSERT INTO `tb_mensagens` (`nivel`, `mensagem`, `exibir`) VALUES ('$nivel', '$mensagem', '$exibir')";
    $res_insere_mensagem = mysqlexecuta($id,$sql_insere_mensagem);
    }
    else{
        echo 'Existem campos não preenchidos.';
    }
?>
<meta http-equiv="refresh" content="0; url=./principal_admin.php?pg=mensagens.php">