<?php  displayNotices(); ?>

<h1 class="page-header">Usuários <a href="<?= do_action('edit_user'); ?>" class="btn btn-primary">Adicionar Novo</a></h1>

<table class="table table-bordered wcms-table">
  <thead>
   	<tr>
   		<th>#</th>
   		<th>Primeiro Nome</th>
   		<th>Ultimo Nome</th>
   		<th>Email</th>
   		<th>Ações</th>
   	</tr>
 </thead>
 <tbody>
   	<?php 
   		$users = wcms_fetch_all_users();
   		foreach($users as $user) :
   	?>
   		<tr>
   			<td><?= $user->ID; ?></td>
   			<td><?= $user->user_first_name; ?></td>
   			<td><?= $user->user_last_name; ?></td>
   			<td><?= $user->user_email; ?></td>
   			<td><a href="<?= do_action('edit_user', ['user_id' => $user->ID ] ); ?>" class="btn btn-info" >Editar</a>
                <?php if ( wcms_get_current_user_ID() != $user->ID ) : ?>
                  <a href="<?= do_action('delete_user', [ 'user_id' => $user->ID ]); ?>" class="btn btn-danger">Remover</a>
                <?php endif; ?>
            </td>
   		</tr>
	<?php endforeach; ?>
</tbody>
</table>