
<h1 class="page-header">Dashboard</h1>

<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Resumo</h3>
        </div>
        <div class="panel-body">
          <table class="table table-hover">
            <tr>
              <td><strong>Número de Posts:</strong> </td>
              <td><?= wcms_db_select('posts', ['count(ID) as total'], ['post_type' => 'post'])[0]->total; ?></tD>
            </tr>
            <tr>
              <td><strong>Número de Páginas:</strong> </td>
              <td><?= wcms_db_select('posts', ['count(ID) as total'], ['post_type' => 'page'])[0]->total; ?></td>
            </tr>
            <tr>
              <td><strong>Número de Categorias:</strong> </td>
              <td><?= wcms_db_select('categories', ['count(ID) as total'])[0]->total; ?></td>
            </tr>
            <tr>
              <td><strong>Número de Usuários:</strong> </td>
              <td><?= wcms_db_select('users', ['count(ID) as total'])[0]->total; ?></td>
            </tr>
          </table>
        </div>
      </div>

  </div>

    <div class="col-sm-6">

    <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Últimos Posts</h3>
        </div>

        <div class="panel-body">
          <table class="table table-hover">
            <?php 
              $latestPost = wcms_db_select('posts', ['*'], ['post_type' => 'post'], [0,5], ['post_date', 'DESC']); 
              foreach($latestPost as $post ):
            ?>
              <tr>
                <td><?= $post->post_title; ?></td>
                <td><?= date('d/m/Y', strtotime($post->post_date)); ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>

      </div>
      
  </div>
</div>
<div class="row">
    <div class="col-sm-6">

    <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Últimos Usuários Cadastrados</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
            <?php 
              $latestUsers = wcms_db_select('users', ['*'], [], [0,5], ['ID', 'DESC']); 
              foreach($latestUsers as $user ):
            ?>
              <tr>
                <td><?= $user->user_first_name . ' ' .  $user->user_last_name; ?></td>
                <td><?= $user->user_email; ?></td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
      
  </div>

</div>
