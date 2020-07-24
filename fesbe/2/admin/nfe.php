<!DOCTYPE html>
<html>
<body>
<form action="./teste.php?var=2" method='POST'>
  CHAVE ANTIGA:<br>
  <input type="text" name="num">
  <br>
  <input type="submit" value="Submit">
</form> 
</body>
</html>

<?php
include "./mysqlconecta.php";
include "./mysqlexecuta.php";

function calcula_dv($chave43) {
    $multiplicadores = array(2,3,4,5,6,7,8,9);
    $i = 42;
    while ($i >= 0) {
        for ($m=0; $m<count($multiplicadores) && $i>=0; $m++) {
            $soma_ponderada+= $chave43[$i] * $multiplicadores[$m];
            $i--;
        }
    }
    $resto = $soma_ponderada % 11;
    if ($resto == '0' || $resto == '1') {
        return 0;
    } else {
        return (11 - $resto);
   }
}





        $sql10 = "SELECT * FROM invoice_3";
        $res10 = mysqlexecuta($id,$sql10);
        while($row10 = mysql_fetch_array($res10)){
        //echo $row10['nfe'];
$num = $row10['nfe'];






//$nfe = "3520465699133400012955001000084522118461541";
//echo $nfe."<br /><br />";
$nfe=$num;
$string = $nfe; 
         
$string[4]=0;
$string[5]=1; 
$string[43]='';
//echo $string;
$digito=calcula_dv($string);
//$nfe.=calcula_dv($nfe); 
//echo "<br />".$digito;
echo "<br />UPDATE invoice_eletronic SET chave_nfe='".$string.$digito."' WHERE code LIKE '".$row10['code']."';";
}
?> 
