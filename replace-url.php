<?php 
/* 
 * Replace URL WordPress
 * Autor: Adam Macias <adammacias.com.br>
 * Versão: 2.0.0
 * 
*/

// Altere a linha abaixo caso seu arquivo wp-load.php esteja em outro diretorio 
@include_once( dirname(__FILE__) . 'wp-load.php' ); 
@include_once( '../wp-load.php' ); 
@include_once( 'wp-load.php' );

// Pré carregamento do URL atual do navegador
$url_page_current = str_replace( "/Replace-URL-WordPress/replace-url.php", "", "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] );
$url_page_current = str_replace( "/replace-url.php", "", $url_page_current );

// Atualiza dados recebidos
if($_POST) :
	$data = $_POST["data"];
	$message = '';

	if (isset($data["change_siteurl"])) {
		$update["siteurl"] = update_option('siteurl', $data["url_new"] );
		$message .= ($update["siteurl"]) ? '- <b>siteurl</b> alterado.<br>' : '';
	}

	if (isset($data["change_home"])) {
		$update["home"] = update_option('home', $data["url_new"] );
		$message .= ($update["home"]) ? '- <b>home</b> alterado.<br>' : '';
	}

	if (isset($data["change_alloptions"])) {
		$update["alloptions"] = $wpdb->query(" UPDATE $wpdb->options SET option_value = replace(option_value,'".$data["url_current"]."','".$data["url_new"]."'); ");
		$message .= ($update["alloptions"]) ? '- <b>alloptions</b> alterado '.$update["alloptions"].' registro(s).<br>' : '';
	}

	if (isset($data["change_post_content"])) {
		$update["post_content"] = $wpdb->query(" UPDATE $wpdb->posts SET post_content = replace(post_content,'".$data["url_current_posts"]."','".$data["url_new_posts"]."'); ");
		$message .= ($update["post_content"]) ? '- <b>post_content</b> alterado '.$update["post_content"].' registro(s).<br>' : '';
	}

	if (isset($data["change_post_guid"])) {
		$update["post_guid"] = $wpdb->query(" UPDATE $wpdb->posts SET guid = replace(guid,'".$data["url_current_posts"]."','".$data["url_new_posts"]."'); ");
		$message .= ($update["post_guid"]) ? '- <b>post_guid</b> alterado '.$update["post_guid"].' registro(s).<br>' : '';
	}

	if (isset($data["change_post_postmeta"])) {
		$update["post_postmeta"] = $wpdb->query(" UPDATE $wpdb->postmeta SET meta_value = replace(meta_value,'".$data["url_current_posts"]."','".$data["url_new_posts"]."'); ");
		$message .= ($update["post_postmeta"]) ? '- <b>post_postmeta</b> alterado '.$update["post_postmeta"].' registro(s).<br>' : '';
	}
endif;  
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="noindex, nofollow">
		<title>Replace URL WordPress</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<style> .container {max-width: 700px; margin: 0 auto;} </style>
	</head>
	<body>
		<div class="container">
			<br>
			<header class="jumbotron text-center">
				<h1>Replace URL WordPress</h1><br>
				<p class="lead">Altere URL's do banco de dados<br>do WordPress com 1-clique.</p>
			</header>			
			<?php if($_POST) { echo (!empty($message)) ? '<div class="alert alert-success">'.$message.'</div>' : '<div class="alert alert-info">Nenhum registro foi alterado.</div>'; } ?>
			<div class="alert alert-warning">
				<h4>Atenção!</h4>
				<b>Backup:</b> Antes começar, certifique-se de <a href="http://codex.wordpress.org/pt-br:Backups_do_Banco_de_Dados" target="_blank">fazer o backup</a> do seu banco de dados.<br>
				<b>Delete-me:</b> É importante que você mantenha esse script fora do seu servidor de produção, exclua-o após utiliza-lo.
			</div>			
			<br>
			<form action="replace-url.php" method="post" class="form-horizontal" role="form">
				<legend>URL Site</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">Substituir:</label>
					<div class="col-sm-10">
						<input type="url" name="data[url_current]" value="<?php echo get_option("siteurl"); ?>" required class="form-control">
						<p class="help-block">Atual</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Por: </label>
					<div class="col-sm-10">
						<input type="url" name="data[url_new]" placeholder="Digite seu novo url..." value="<?php echo $url_page_current; ?>" required class="form-control">
						<p class="help-block">Novo</p>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label class="checkbox"> <input type="checkbox" name="data[change_siteurl]" value="1" checked> Alterar <b>siteurl</b> URL Site.</label>
							<label class="checkbox"> <input type="checkbox" name="data[change_home]" value="1" checked> Alterar <b>home</b> URL Páginal Inicial.</label>
							<label class="checkbox"> <input type="checkbox" name="data[change_alloptions]" value="1"> Alterar <b>all options</b> URL's de todas as opções.</label>
						</div>
					</div>
				</div>	
				<br>
				<legend>URL's Posts (Conteúdo, Slug's e Metas)</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">Substituir:</label>
					<div class="col-sm-10">
						<input type="url" name="data[url_current_posts]" value="<?php echo get_option("siteurl"); ?>" required class="form-control">
						<p class="help-block">Atual</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Por: </label>
					<div class="col-sm-10">
						<input type="url" name="data[url_new_posts]" placeholder="Digite seu novo url..." value="<?php echo $url_page_current; ?>" required class="form-control">
						<p class="help-block">Novo</p>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label class="checkbox"> <input type="checkbox" name="data[change_post_content]" value="1" checked> Alterar <b>content</b> URL's do conteúdo dos posts.</label>
							<label class="checkbox"> <input type="checkbox" name="data[change_post_guid]" value="1" checked> Alterar <b>guid</b> URL's absoluto dos posts (slugs).</label>
							<label class="checkbox"> <input type="checkbox" name="data[change_post_postmeta]" value="1" checked> Alterar <b>postmeta</b> URL's dos metadados dos posts.</label>
						</div>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-danger">Executar</button>
					</div>
				</div>				
			</form>
			<footer class="text-center">
				<br><hr>
				<p><a href="https://github.com/adammacias/Replace-URL-WordPress" target="_blank">Replace URL WordPress</a> foi criado por <a href="http://www.adammacias.com.br" target="_blank" title="Adam Macias">@adammacias</a> para todos! ♥</p>
			</footer>
		</div><!-- end container -->
	</body>
</html>