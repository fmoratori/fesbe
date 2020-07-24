<?
/* Este arquivo conecta um banco de dados MySQL - Servidor = localhost*/
$dbname="fmsys_2018"; // Indique o nome do banco de dados que serÃ¡ aberto
$usuario="fmsys_2018"; // Indique o nome do usuÃ¡rio que tem acesso
$password="felipe2013"; // Indique a senha do usuÃ¡rio
$hostname = 'fmsys_2018.mysql.dbaas.com.br';
	 
//1Âº passo - Conecta ao servidor MySQL
//mysql_connect("200.144.57.2",$usuario,$password);
//echo "conecta";

$conn = mysql_connect($hostname,$usuario,$password); mysql_select_db($dbname);
if (!$conn) {
	$hostname = '186.202.152.168';
	echo "2";
	 }
else {
	//echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!.";
	}
mysql_close();


if(!($id = mysql_connect($hostname,$usuario,$password))) {
   echo "N&atilde;o foi poss&iacute;vel estabelecer uma conex&atilde;o com o gerenciador MySQL. Favor Contactar o Administrador1.";
   exit;
}
//2Âº passo - Seleciona o Banco de Dados
if(!($con=mysql_select_db($dbname,$id))) {
   echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL. Favor Contactar o Administrador.";
   exit;
}


/*
Esta funÃ§Ã£o executa um comando SQL no banco de dados MySQL
$id - Ponteiro da ConexÃ£o
$sql - ClÃ¡usula SQL a executar
$erro - Especifica se a função exibe ou não(0=não, 1=sim)
$res - Resposta
*/
function mysqlexecuta($id,$sql,$erro = 1) {
    if(empty($sql) OR !($id))
       return 0; //Erro na conexão ou no comando SQL   
   if (!($res = @mysql_query($sql,$id))) {
      if($erro)
        echo "Ocorreu um erro na execução do Comando SQL no banco de dados. Favor Contactar o Administrador.";
      exit;
   }
    return $res;
 }
 

$x=1;
$sql_leitores = "SELECT * FROM dados_leitores WHERE sala LIKE 'ROOM3' AND data BETWEEN '2018-09-03' AND '2018-09-06' AND hora BETWEEN '15:00:00' AND '17:00:00' ORDER BY user_id ASC ";
//$sql_leitores = "SELECT * FROM dados_leitores WHERE sala LIKE 'ROOM3' AND data BETWEEN '2018-09-04' AND '2018-09-05' AND hora BETWEEN '20:30:00' AND '22:00:00' ORDER BY user_id ASC ";
$res_leitores = mysqlexecuta($id,$sql_leitores);
while($row_leitores = mysql_fetch_array($res_leitores)){
    $id_usuario = $row_leitores['user_id'];
$sql_dado = "SELECT * FROM dados_local WHERE id LIKE $id_usuario";

$res_dado = mysqlexecuta($id,$sql_dado);
$row_dado = mysql_fetch_array($res_dado);

if($id_usuario==$id_anterior){
    $x = $x+1;
 //   echo ";".$x.";";
    
}
else{
    $x=1;
   // echo $x;
}
if($x==3){
    echo $row_leitores['user_id'].";";
    echo $row_dado['nome'].";";
    echo $row_leitores['data'].";";
    echo $row_leitores['hora'].";";  
    echo "<br />";
}

$id_anterior = $id_usuario;
}


?>