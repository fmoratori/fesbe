<?
session_start();
include "mysqlconecta.php";
include "mysqlexecuta.php";

//include "valida.php";

$pg = $_GET['pg'];
$id_usuario = $_SESSION['usuario'];
$sql_usuario = "SELECT * FROM tb_usuario WHERE id = $id_usuario";
$res_usuario = mysqlexecuta($id,$sql_usuario);
$row_usuario = mysql_fetch_array($res_usuario);

$sql_evento = "SELECT * FROM tb_evento";
$res_evento = mysqlexecuta($id,$sql_evento);
$row_evento = mysql_fetch_array($res_evento);



            $ip = $_SERVER['REMOTE_ADDR'];
			$registra = "Pagina: ".$_SERVER['REQUEST_URI']." # ".$_SESSION["hora"]." # ".$data_atual." # ".$ip." # ".$_SESSION['login']." # ".$_SESSION['usuario']."; \r\n";
			$abre = fopen("./logs/".$_SESSION['usuario']."_log.txt", "r");
			$conta = fread($abre, filesize("./logs/".$_SESSION['usuario']."_log.txt"));
			fclose($abre);
			#Adiciona o novo texto
			$fp = fopen("./logs/".$_SESSION['usuario']."_log.txt", "a");
			fputs ($fp, $registra);
			fclose ($fp);


?>
<!DOCTYPE html>
<html class="<? echo $row_evento['cor']; ?>">
  <head>
    <title>FMSYS</title>

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Insira aqui a descri��o da p�gina.">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>
  <body>
    <div class="ls-topbar ">

  <!-- Barra de Notifica��es -->
  <div class="ls-notification-topbar">

    <!-- Links de apoio -->
    <div class="ls-alerts-list">
      <a href="#" class="ls-ico-bell-o" data-counter="8" data-ls-module="topbarCurtain" data-target="#ls-notification-curtain"><span>Notifica��es</span></a>
      <a href="#" class="ls-ico-bullhorn" data-ls-module="topbarCurtain" data-target="#ls-help-curtain"><span>Ajuda</span></a>
      <a href="#" class="ls-ico-question" data-ls-module="topbarCurtain" data-target="#ls-feedback-curtain"><span>Sugest�es</span></a>
    </div>

    <!-- Dropdown com detalhes da conta de usu�rio -->
    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
      <a href="#" class="ls-ico-user">
        <!--img src="/fmsys/struct/images/locastyle/avatar-example.jpg" alt="" /-->
        <span class="ls-name"><? echo utf8_encode($row_usuario['nome']); ?></span>
      </a>

      <nav class="ls-dropdown-nav ls-user-menu">
        <ul>
          <!--li><a href="#">Meus dados</a></li>
          <li><a href="#">Faturas</a></li>
          <li><a href="#">Planos</a></li-->
          <li><a href="logout.php">Sair</a></li>
         </ul>
      </nav>
    </div>
  </div>

  <span class="ls-show-sidebar ls-ico-menu"></span>

  <a href="/locawebstyle/documentacao/exemplos//pre-painel"  class="ls-go-next"><span class="ls-text">Voltar � lista de servi�os</span></a>

  <!-- Nome do produto/marca com sidebar -->
    <h1 class="ls-brand-name">
      <a href="home" class="ls-ico-earth">
        <small>FMSYS</small>
        <? echo $row_evento['sigla']; ?>
      </a>
    </h1>

  <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>


    <aside class="ls-sidebar">

  <div class="ls-sidebar-inner">
<!--      <a href="/locawebstyle/documentacao/exemplos//pre-painel"  class="ls-go-prev"><span class="ls-text">Voltar � lista de servi�os</span></a>--->

      <nav class="ls-menu">
        <ul>
           <li><a href="./principal.php" class="ls-ico-home" title="Home">Home</a></li>
           <li>
           <a href="./principal.php?pg=trabalhos.php" class="ls-ico-user" title="Dados Usuario">Dados do Usu�rio</a>
            <ul>
                <li><a href="./principal.php?pg=alterar_dados.php" title="Alterar Dados"> Atualizar Dados</a></li>
            </ul>
           </li>

           <li>
           <a href="./principal.php?pg=trabalhos.php" class="ls-ico-pencil" title="Trabalhos">Trabalhos</a>
            <ul>
                <li><a href="./principal.php?pg=principal_trabalhos.php" title="Trabalhos"> Enviar Trabalho</a></li>
                <li><a href="./principal.php?pg=resultado_avaliacao.php" title="Resultado Avalia��o"> Resultado da Avalia��o </a></li>
                <!--li><a href="./principal.php?pg=carta_aceite.php" title="Carta Aceite"> Carta de Aceite</a></li-->
            </ul>
           </li>
           <li>
            <a href="./principal.php?pg=atividades.php" class="ls-ico-edit-admin" title="Pagamentos">Atividades</a>
                <ul>
                    <li><a href="./principal.php?pg=atividades.php" title="Atividades"> Inscri��o em Atividades</a></li>
                </ul>
           </li>
           
           <li>
            <a href="./principal.php?pg=pagamentos.php" class="ls-ico-cart" title="Pagamentos">Pagamentos</a>
                <ul>
                    <li><a href="./principal.php?pg=boletos.php" title="Boletos"> Boletos</a></li>
                    <li><a href="./principal.php?pg=recibos.php" title="Recibos"> Recibos </a></li>
                </ul>
           </li>
           <li>
            <a href="#" class="ls-ico-docs" title="Certificados">Certificados</a>
            <ul>
              <li><a href="./principal.php?pg=certificados.php">Certificados Dispon�veis</a></li>
            </ul>
          </li--->
        </ul>
      </nav>


  </div>
</aside>
  <main class="ls-main ">
      <div class="container-fluid">
<?
if($pg!=''){
    include $pg;
}
else{
    include 'home.php';    
}
?>


<!--
        <p>Este � nosso boilerplate com a estrutura inicial de um projeto. Voc� pode <a href="http://locaweb.github.io/locawebstyle/documentacao/exemplos/">ver exemplos completos neste link</a>.</p>
        <p>Confira nossa <a href="http://locaweb.github.io/locawebstyle/documentacao/componentes/">documenta��o com os componentes</a> que voc� usar aqui.</p>
        <hr>
        <h6 class="ls-title-5">English disclaimer</h6>
        <p>This is your boilerplate with start structure. You can see <a href="http://locaweb.github.io/locawebstyle/documentacao/exemplos/">completed examples here</a>.</p>
        <p>Check out the docs to <a href="http://locaweb.github.io/locawebstyle/documentacao/componentes/">see the components that you can use</a>.</p>
-->
      </div>
    </main>

    <aside class="ls-notification">
      <nav class="ls-notification-list" id="ls-notification-curtain" style="left: 1716px;">
        <h3 class="ls-title-2">Notifica��es</h3>
        <ul>
          <li class="ls-dismissable">
            <a href="#">Blanditiis est est dolorem iure voluptatem eos deleniti repellat et laborum consequatur</a>
            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
          </li>
          <li class="ls-dismissable">
            <a href="#">Similique eos rerum perferendis voluptatibus</a>
            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
          </li>
          <li class="ls-dismissable">
            <a href="#">Qui numquam iusto suscipit nisi qui unde</a>
            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
          </li>
          <li class="ls-dismissable">
            <a href="#">Nisi aut assumenda dignissimos qui ea in deserunt quo deleniti dolorum quo et consequatur</a>
            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
          </li>
          <li class="ls-dismissable">
            <a href="#">Sunt consequuntur aut aut a molestiae veritatis assumenda voluptas nam placeat eius ad</a>
            <a href="#" data-ls-module="dismiss" class="ls-ico-close ls-close-notification"></a>
          </li>
        </ul>
      </nav>

      <nav class="ls-notification-list" id="ls-help-curtain" style="left: 1756px;">
        <h3 class="ls-title-2">Feedback</h3>
        <ul>
          <li><a href="#">&gt; quo fugiat facilis nulla perspiciatis consequatur</a></li>
          <li><a href="#">&gt; enim et labore repellat enim debitis</a></li>
        </ul>
      </nav>

      <nav class="ls-notification-list" id="ls-feedback-curtain" style="left: 1796px;">
        <h3 class="ls-title-2">Ajuda</h3>
        <ul>
          <li class="ls-txt-center hidden-xs">
            <a href="#" class="ls-btn-dark ls-btn-tour">Fazer um Tour</a>
          </li>
          <li><a href="#">&gt; Guia</a></li>
          <li><a href="#">&gt; Wiki</a></li>
        </ul>
      </nav>
    </aside>

    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.8.4/javascripts/locastyle.js" type="text/javascript"></script>
  </body>
</html>