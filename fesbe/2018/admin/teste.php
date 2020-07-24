
<!DOCTYPE html>
<html class="<? echo $row_evento['cor']; ?>">
  <head>
    <title>FMSYS</title>
    <meta charset="UTF-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descrição da página.">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>
  <body>

  <main class="ls-main ">
      <div class="container-fluid">

<?
$teste=0;
while($teste<10){
echo   "<div data-ls-module='collapse' data-target='#$teste' class='ls-collapse'>";


echo     "<a href='#' class='ls-collapse-header'>";
echo     "<h3 class='ls-collapse-title'>$teste</h3></a><div class='ls-collapse-body' id='$teste'>";
echo    "<p>$teste</p>";    
echo    "</div></div>";


$teste++;
  }
  ?>

      </div>
    </main>

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.8.4/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>