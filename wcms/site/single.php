
<?php get_header(); ?>
<div class="row">

  <div class="col-sm-8 blog-main">

    <div class="blog-post">
      <?php $post = get_post(); ?>

      <?php if ( $post ) : ?>
      	<h2 class="blog-post-title"><?= $post->post_title; ?></h2>
      	<p class="blog-post-meta"><?= date('d/m/Y', strtotime($post->post_date)); ?> por <?= get_post_author( $post ); ?></p>

      	<?= $post->post_content; ?>
  	  <?php endif; ?>
  	 </div>
      
  </div><!-- /.blog-main -->

  <?php get_sidebar(); ?>

</div><!-- /.row -->
<?php get_footer(); ?>
    
