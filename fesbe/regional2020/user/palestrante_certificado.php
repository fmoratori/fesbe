<?
include "mysqlconecta.php";
include "mysqlexecuta.php";

$x=1;
while($x<120){
    $sql_certificado_poster = "SELECT * FROM tb_palestrantes WHERE id = $x;";
//echo $sql_certificado_poster;
$res_certificado_poster = mysqlexecuta($id,$sql_certificado_poster);
$row_certificado_poster = mysql_fetch_array($res_certificado_poster);
$palestrante = $row_certificado_poster['palestrante'];
$palestra = $row_certificado_poster['titulo'];
$email = $row_certificado_poster['email'];
echo $x."- <a href='./email_palestrante.php?id=$x' target='_blank'>".$email."</a><br /><br />";
$x++;
    }

?>