<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>I/O Blog | Seu Blog de Tecnologia</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= WCMS_SITE_URL ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= WCMS_SITE_URL ?>/assets/css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item <?php if ( is_menu_selected('index') ) echo 'active' ?>" href="<?= WCMS_BASE_URL; ?>">Home</a>
          <?php 
          	$menu_pages = wcms_get_menu_pages( 6 );
          	if ( $menu_pages ) : foreach($menu_pages as $page):
          ?>
      		<a class="blog-nav-item <?php if ( is_menu_selected('page', ['post_id' => $page->ID]) ) echo 'active' ?>" href="<?= get_permalink('page', ['post_id' => $page->ID]); ?>"><?= $page->post_title; ?></a>
      	  <?php endforeach; endif; ?>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">I/O Blog</h1>
        <p class="lead blog-description">O Seu blog de Tecnologia.</p>
      </div>