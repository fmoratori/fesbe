<head>
	<title>Validade Senha</title>
<script>
function validaSenha (input){ 
    if (input.value != document.getElementById('senha1').value) {
    input.setCustomValidity('Repita a senha corretamente');
  } else {
    input.setCustomValidity('');
  }
} 
</script>
</head>
<meta charset="utf-8">
        <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
        <script type='text/javascript' src='cep.js'></script>
<h1 class="ls-title-intro ls-ico-home">Atualizar Dados</h1>

<?
$verifica_cadastro = 0;
$ver = $_GET['ver'];
$ponto = '.';
$traco = '-';
$cpf = $_POST['cpf'];
$cpf_consulta = str_replace($ponto, '', $cpf);
$cpf_consulta = str_replace($traco, '', $cpf_consulta);
$sql_consulta_cadastro = "SELECT * FROM tb_usuario WHERE cpf LIKE '$cpf_consulta'";
$res_consulta_cadastro = mysqlexecuta($id,$sql_consulta_cadastro);
if($ver == 's2'){
   echo  "<div class='ls-alert-success'>Dados Atualizados com sucesso!</div>";
    
}
/**while($row_consulta_cadastro = mysql_fetch_array($res_consulta_cadastro)){
   echo  "<div class='ls-alert-danger'><strong>CPF j� cadastrado</strong> <a href='./recuperar_senha.php'>Clique aqui para recuperar sua senha.</a></div>";
   $verifica_cadastro=2;
}**/
if($verifica_cadastro<=0){
include './mysqlconecta_bd_geral.php';
$ponto = '.';
$traco = '-';
$cpf_consulta = str_replace($ponto, '', $cpf);
$cpf_consulta = str_replace($traco, '', $cpf_consulta);
$sql_cpf = "SELECT * FROM tb_usuario WHERE cpf LIKE '$cpf_consulta'";
$res_cpf = mysqlexecuta($id,$sql_cpf);
$row_cpf = mysql_fetch_array($res_cpf);
?>

<form id="form1" action="./principal.php?pg=salva_dados.php" name="f1" class="ls-form ls-form-horizontal row" data-ls-module="form" method="POST">
<fieldset>
<label class="ls-label col-md-3">
    <b class="ls-label-text">CPF</b>
    <input type="text" name="cpf" class="ls-mask-cpf" placeholder="000.000.000-00" required="required" disabled="disabled" value="<? echo $row_usuario['cpf']; ?>" > 
  </label>
</fieldset>
<fieldset>
<label class="ls-label col-md-4">
    <b class="ls-label-text">Nome Completo</b>
    <input type="text" name="nome" class="" required="required" value="<? echo $row_usuario['nome']; ?>" > 
  </label>
<label class="ls-label col-md-3">
    <b class="ls-label-text">E-mail</b>
    <input type="email" name="email" class="" required="required" value="<? echo $row_usuario['email']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Telefone</b>
    <input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(00)0000-0000" required="required" value="<? echo $row_usuario['telefone']; ?>" > 
  </label>
<label class="ls-label col-md-2">
    <b class="ls-label-text">Celular</b>
    <input type="text" name="celular" class="ls-mask-phone9_with_ddd" placeholder="(00)90000-0000" required="required" value="<? echo $row_usuario['celular']; ?>" > 
  </label>
</fieldset>
<fieldset>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Senha</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha1" name="senha1" value="<? echo $row_usuario['senha']; ?>">
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha1" href="#">
          </a>
      </div>
    </label>
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Confirme sua senha</b>
      <div class="ls-prefix-group">
        <input type="password" maxlength="20" id="senha2" name="senha2" oninput="validaSenha(this)"  value="<? echo $row_usuario['senha']; ?>" >
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha2" href="#">
          </a>
      </div>
    </label>

</fieldset>
<fieldset>
            <label class="ls-label col-md-2">
            <b class="ls-label-text">CEP</b>
            <input type="text" name="cep" id="cep" class="ls-mask-cep" placeholder="00000-000" maxlength="8" required="required" value="<? echo $row_usuario['cep']; ?>" />
            </label>
</fieldset>
<fieldset>
            <label class="ls-label col-md-5">
            <b class="ls-label-text">Rua</b>
            <input type="text" name="rua" id="rua" size="45"  value="<? echo $row_usuario['endereco']; ?>" />
            </label> 

 
            <label class="ls-label col-md-3">
            <b class="ls-label-text">N�mero</b>
            <input type="text" name="numero" id="numero" size="5" required="required"  value="<? echo $row_usuario['numero']; ?>" />
            </label>
            
            <label class="ls-label col-md-3">
            <b class="ls-label-text">Complemento</b>
            <input type="text" name="complemento" id="complemento" size="5"  value="<? echo $row_usuario['complemento']; ?>" />
            </label>


            <label class="ls-label col-md-5">
            <b class="ls-label-text">Bairro</b>
            <input type="text" name="bairro" id="bairro" size="25"  value="<? echo $row_usuario['bairro']; ?>" />
            </label>
            
            <label class="ls-label col-md-4">
            <b class="ls-label-text">Cidade</b>
            <input type="text" name="cidade" id="cidade" size="25"  value="<? echo $row_usuario['cidade']; ?>" />
            </label>
            
 
            <label class="ls-label col-md-2">
            <b class="ls-label-text">Estado</b>
            <input type="text" name="estado" id="estado" size="2"  value="<? echo $row_usuario['estado']; ?>" />
            </label>
</fieldset>


<fieldset>
            <label class="ls-label col-md-4">
            <b class="ls-label-text">Departamento</b>
            <input type="text" name="departamento" id="departamento" size="25" value="<? echo $row_usuario['departamento']; ?>" />
            </label>

            <label class="ls-label col-md-3">
            <b class="ls-label-text">Instituto</b>
            <input type="text" name="instituto" id="instituto" size="25" value="<? echo $row_usuario['instituto']; ?>" />
            </label>

            <label class="ls-label col-md-4">
            <b class="ls-label-text">Institui��o</b>
            <input type="text" name="instituicao" id="instituicao" size="25" value="<? echo $row_usuario['instituicao']; ?>"  />
            </label>
    <label class="ls-label col-md-8 col-sm-8">
      <b class="ls-label-text">Sociedade Filiada</b>
      <div class="ls-custom-select">
        <select name="sociedade" class="ls-select">
<?
include 'mysqlconecta.php';
$id_sociedade = $row_usuario['sociedade_filiada'];

if($id_sociedade != NULL){
$sql_sociedade_usuario = "SELECT * FROM tb_sociedades WHERE id = $id_sociedade";
$res_sociedade_usuario = mysqlexecuta($id,$sql_sociedade_usuario);
$row_sociedade_usuario=mysql_fetch_array($res_sociedade_usuario);
$sociedade_usuario = $row_sociedade_usuario['nome'];
}
else{
    $sociedade_usuario = "Selecione a Sociedade";
}

$sql_sociedades = "SELECT * FROM tb_sociedades";
$res_sociedades = mysqlexecuta($id,$sql_sociedades);
    echo "<option value=".$row_usuario['sociedade_filiada'].">".$sociedade_usuario."</option><br />";
    while($row_sociedades=mysql_fetch_array($res_sociedades)){
        //echo "<option value='14'>"."1"."</option>";
        echo "<option value='".$row_sociedades['id']."'>".$row_sociedades['nome']."</option>";
    }
?>
        </select>
      </div>
    </label>

</fieldset>
  
  
<div class=""></div>
    <button class="ls-btn">Salvar</button>
</div>
<?
}
?>
</form>