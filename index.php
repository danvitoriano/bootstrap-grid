<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Portal de Ideias Oi Internet (beta)</title>
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	<link href="assets/css/main.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
  if (isset($_REQUEST['comment']))  {
  
  //Email information
  $admin_email 		= "daniel.abib@oi.net.br,wagner.renzi@oi.net.br,mauro.pezzo@oi.net.br";
  $email 			= "oi_relacionamento@oi.com.br";
  $name 			= $_REQUEST['name'];
  $subject 			= "Portal de Ideias Oi Internet - " . $_REQUEST['category'];
  $message3 		= "Sugestão:\n" . $_POST['comment'] . "\n\nCategoria:\n" . $_POST['category'] . "\n\nEnviada por:\n" . $_POST['name'];
  $assunto 			= '=?UTF-8?B?'.base64_encode($subject).'?=';

  
  //send email

  if(!mail($admin_email, $assunto, $message3, $headers ,"-r".$email)){ // Se for Postfix
    	$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
		$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
    mail($admin_email, $assunto, $message3, $headers );
	}

?>

	<div class="container">
		<div class="row row-centered">
			<div class="col-xs-12 col-sm-9 col-md-6 col-lg-3 col-centered padding-2">
				<img src="assets/img/logo-oi.png" alt="Oi Ideias" class="img-responsive">
			</div>
		</div>
		<div class="row row-centered">
			<div class="col-xs-12 col-sm-9 col-md-6 col-centered padding-2">
				<h2>Obrigado</h2>
				<p>Obrigado, sua ideia foi enviada com sucesso!</p>
				<p>
					<a href="index.php">Adicionar mais uma ideia?</a>
				</p>
			</div>
		</div>
	</div>

<?php
  }
  
  //if "email" variable is not filled out, display the form
  else  {
?>
	<div class="container">
		<div class="row row-centered">
			<div class="col-xs-12 col-sm-9 col-md-6 col-lg-3 col-centered padding-2">
				<img src="assets/img/logo-oi.png" alt="Oi Ideias" class="img-responsive">
			</div>
		</div>
		<div class="row row-centered">
			<div class="col-xs-12 col-sm-9 col-md-6 col-centered">
				<header class="text-center padding-2">
					<h1>
						Portal de Ideias Oi Internet
					</h1>
				</header>
			</div>
		</div>
		<div class="row row-centered">
			<div class="col-xs-12 col-sm-9 col-md-6 col-centered">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Envie sua ideia</h3>
				  </div>
				  <div class="panel-body">
						<form method='post'>
							<input type="hidden" name="subject" value="Ideia enviada pelo Oi Ideias" />
						 <div class="form-group">
						    <label for="exampleSelect1">Escolha uma categoria</label>
						    <select class="form-control" id="exampleSelect1" name="category">
						    	<option value="Canal de Vendas">Canal de Vendas</option>
						    	<option value="Métodos de Arrecadação">Métodos de Arrecadação</option>
						    	<option value="Melhorias de Processos">Melhorias de Processos</option>
						    	<option value="Redução de despesas">Redução de despesas</option>
								  <option value="Novo Produto">Novo Produto</option>
								  <option value="Melhorias de RH">Melhorias de RH</option>
								  <option value="Melhoria Predial / Escritório">Melhoria Predial / Escritório</option>
								  <option value="Canal de Atendimento">Canal de Atendimento</option>
								  <option value="Que tal?">Que tal?</option>
								  <option value="Outros">Outros</option>
								</select>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Descreva sua ideia</label>
						    <textarea class="form-control" rows="10" id="exampleTextarea" name='comment'></textarea>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nome (opcional)</label>
						    <input type="text" class="form-control" id="exampleInputEmail1" name='name' placeholder="Nome">
						  </div>
						  <button type="submit" class="btn btn-primary">Enviar</button>
						  <button type="reset" class="btn btn-default">Limpar</button>
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<?php
	  }
	?>
</body>
</html>