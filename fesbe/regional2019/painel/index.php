<?
session_start();
$ver = $_GET['ver'];
$idioma = $_GET['idioma'];
 $dominio= $_SERVER['HTTP_HOST'];
 $url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
 $vowels = array("?idioma=1","?idioma=2","?idioma=3");
 $url = str_replace($vowels, "", $url);
if($ver=='s1'){
include "./mysqlconecta.php";
include "./mysqlexecuta.php";
$login = $_SESSION['cpf_nova_inscricao'];
$senha = $_SESSION['senha_nova_inscricao'];
$val = base64_encode($login);
$sql = "SELECT * FROM tb_avaliador WHERE email LIKE '$login'";
$res = mysqlexecuta($id,$sql);


				while($row = mysql_fetch_array($res)){
					if($row['email']==$login && $row['senha']==$senha){
                            $_SESSION["logado"] = true;
							$_SESSION["login"] = $login;
							$_SESSION["senha"] = $senha;
                            $_SESSION['usuario'] = $row['id'];
							$_SESSION["hora"] = date("Y-n-j H:i:s");
 ?>
                            <meta http-equiv="refresh" content="0; url=./principal.php?val=<? echo $val; ?>">

<?							break;

						}

						else{
						  echo "teste";
							if($row['cpf']==$login && $row['senha']==$senha){
                            $_SESSION["logado"] = true;
							$_SESSION["login"] = $login;
							$_SESSION["senha"] = $senha;
                            $_SESSION["usuario"] = $row['id'];
							$_SESSION["hora"] = date("Y-n-j H:i:s");
 ?>
                            <meta http-equiv="refresh" content="0; url=./principal.php?val=<? echo $val; ?>">
<?							break;
								}
							}			
                }
}


if($ver=='s'){
include "./mysqlconecta.php";
include "./mysqlexecuta.php";
$login = $_POST['login'];
$senha = $_POST['senha'];
$val = base64_encode($login);
$sql = "SELECT * FROM tb_avaliador WHERE email LIKE '$login'";
$res = mysqlexecuta($id,$sql);


				while($row = mysql_fetch_array($res)){
					if($row['email']==$login && $row['senha']==$senha){
                            $_SESSION["logado"] = true;
							$_SESSION["login"] = $login;
							$_SESSION["senha"] = $senha;
                            $_SESSION['usuario'] = $row['id'];
							$_SESSION["hora"] = date("Y-n-j H:i:s");
 ?>
                            <meta http-equiv="refresh" content="0; url=./principal.php?val=<? echo $val; ?>">

<?							break;

						}

						else{
							if($row['cpf']==$login && $row['senha']==$senha){
                            $_SESSION["logado"] = true;
							$_SESSION["login"] = $login;
							$_SESSION["senha"] = $senha;
                            $_SESSION["usuario"] = $row['id'];
							$_SESSION["hora"] = date("Y-n-j H:i:s");
 ?>
                            <meta http-equiv="refresh" content="0; url=./principal.php?val=<? echo $val; ?>">

<?							break;
								}
                            else{ 
                                echo "<br /><br /><center><font color='red'><b>Login ou senha inv&aacute;lidos</b></font></center>"; 
                                }

							}			
                }
}
?>

<!DOCTYPE html>
<html class="ls-theme-green-lemon">
  <head>
    <title>FMSYS</title>

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="Sistema Para eventos">
    <link href="/fmsys/struct/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" sizes="192x192" href="/fmsys/struct/images/ico-boilerplate.png">
    <link rel="apple-touch-icon" href="/fmsys/struct/images/ico-boilerplate.png">
  </head>
  <img src="../imagens/header.jpg" width="100%" height="30%" />
<?
if($idioma==1 || $idioma==null){
?>
<body class="documentacao documentacao_exemplos documentacao_exemplos_login-screen documentacao_exemplos_login-screen_index">
<div class="ls-login-parent">
  <!--div class="ls-login-inner"-->
<p>&nbsp;</p>
    <div class="ls-login-container">

<div class="ls-login-box">
  <h1 class="ls-login-logo">Login Avaliador</h1>

  <form role="form" class="ls-form ls-login-form" action="index.php?ver=s" method="POST">
    <fieldset>

      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">Login</b>
        <input class="ls-login-bg-user ls-field-lg" id="username" name="login" required="required" type="text" placeholder="Login" required autofocus>
      </label>

      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">Senha</b>
        <div class="ls-prefix-group ls-field-lg">
          <input id="password" name="senha" required="required" class="ls-login-bg-password" type="password" placeholder="Senha" required>
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
        </div>
      </label>

      <p><!--a class="ls-login-forgot" href="./register.php?pg=form_recuperar_senha.php">Esqueci minha senha</a--></p>

      <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg">
      <!--p class="ls-txt-center ls-login-signup">N&atilde;o realizou seu cadastro ainda? <a href="./register.php?pg=form1.php&idioma=2">Cadastre-se agora</a></p-->
<p>&nbsp;</p>
    </fieldset>
  </form>
</div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;






    </div>
</div>

<script src="../../../assets/javascripts/libs/jquery-2.1.0.min.js" type="text/javascript"></script><script src="../../../assets/javascripts/locastyle.js" type="text/javascript"></script>
</body>
</html>
<?
}
?>