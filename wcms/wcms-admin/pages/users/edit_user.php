<?php 
	$user_id 	= _get('user_id');
	$msg 		= "Adicionar Novo Usuário";

	$user_first_name = '';
	$user_last_name  = '';
	$user_email 	 = '';
	
	if ( $user_id ) {
		$msg = "Editar Usuário";
		$user = wcms_db_select('users', [ '*' ], ['ID' => $user_id] )[0];

		$user_first_name = $user->user_first_name;
		$user_last_name  = $user->user_last_name;
		$user_email 	 = $user->user_email;
	}
?>

<?php displayNotices(); ?>

<h1 class="page-header"><?= $msg; ?></h1>

<form class="form-horizontal" role="form" method="POST" action="<?= WCMS_ADMIN_URL . 'pages/users/save.php'; ?>">

	<div class="form-group">
		<label for="user_first_name" class="col-sm-1 control-label">Primeiro Nome</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="user_first_name" name="user_first_name" required placeholder="Primeiro Nome..." value="<?= $user_first_name ?>">
		</div>
	</div>

	<div class="form-group">
		<label for="user_last_name" class="col-sm-1 control-label">Último Nome</label>
		<div class="col-sm-8">
		  <input type="text" class="form-control" id="user_last_name" name="user_last_name" placeholder="Último Nome..." value="<?= $user_last_name; ?>">
		</div>
	</div>

	<div class="form-group">
		<label for="user_email" class="col-sm-1 control-label">Email</label>
		<div class="col-sm-8">
		  <input type="email" class="form-control" id="user_email" required name="user_email" placeholder="Email" value="<?= $user_email; ?>" > 
		</div> 
	</div>

	<div class="form-group">
		<label for="user_pass" class="col-sm-1 control-label">Senha</label>
		<div class="col-sm-8">
		  <input type="password" class="form-control" id="user_pass" <?php if ( ! $user_id ) : ?> required <?php endif; ?> name="user_pass" placeholder="Senha">
		</div>
	</div>

	<div class="form-group">
		<label for="inputPassword3" class="col-sm-1 control-label">Confirmação da senha</label>
		<div class="col-sm-8">
		  <input type="password" class="form-control" id="user_confirm_pass" <?php if ( ! $user_id ) : ?> required <?php endif; ?> name="user_confirm_pass"  placeholder="Confirme a senha">
		</div>
	</div>

	<?php if ( $user_id ) : ?>
		<input type="hidden" name="user_id" value="<?= $user_id; ?>">
	<?php endif; ?>


	<div class="form-group">
		<div class="col-sm-offset-1 col-sm-8">
		  <button type="submit" name="user_edit_form" class="btn btn-success">Salvar</button>
		</div>
	</div>

</form>