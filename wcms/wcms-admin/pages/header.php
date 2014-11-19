<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WCMS | Painel Administrativo</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">

    <link href="assets/css/dataTable.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo WCMS_BASE_URL; ?>"><?php echo WCMS_PROJECT_NAME; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= do_action('edit_users', ['user_id' => wcms_get_current_user_ID() ] ); ?>">Perfil</a></li>
            <li><a href="<?= do_action('logout'); ?>">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php menu_selected('index');  ?>" ><a href="<?= do_action('index');  ?>">Painel</a></li>
            <li class="<?php menu_selected('posts', ['post_type' => 'post']);  ?>"><a href="<?= do_action('posts', ['post_type' => 'post']); ?>">Posts</a></li>
            <li class="<?php menu_selected('categories');  ?>"><a href="<?= do_action('categories'); ?>">Categorias</a></li>
            <li class="<?php menu_selected('posts', ['post_type' => 'page']);  ?>"><a href="<?= do_action('posts', ['post_type' => 'page']); ?>">Páginas</a></li>
            <li class="<?php menu_selected('media');  ?>"><a href="<?= do_action('media'); ?>">Mídia</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="<?php menu_selected('users');  ?>" ><a href="<?= do_action('users'); ?>">Usuários</a></li>

          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">