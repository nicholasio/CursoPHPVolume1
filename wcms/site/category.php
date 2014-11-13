<?php get_header(); ?>

<div class="row">

  <div class="col-sm-8 blog-main">

    <?php 
      $posts = get_posts(3, 'post', _get('cat_id') );
      if ( $posts ) : foreach( $posts as $post ) : 
        $link = get_permalink('single', ['post_id' => $post->ID]);
    ?>
      <div class="blog-post">
        <h2 class="blog-post-title"><?= $post->post_title; ?></h2>
        <p class="blog-post-meta"><?= date('d/m/Y', strtotime($post->post_date)); ?> por <?= get_post_author( $post ); ?></p>
        <p>
          <?= $post->post_excerpt; ?>
        </p>
        <a class="btn btn-primary" href="<?= $link; ?>" >Leia Mais</a>
      </div><!-- /.blog-post -->
    <?php endforeach; endif; ?>


    <nav>
      <ul class="pager">
        <?php 
          $previousLink = previous_posts_link( $posts );
          $nextLink     = next_posts_link( $posts );
        ?>
        <?php if ( $nextLink ) : ?>
          <li><a href="<?= get_permalink('category', ['paged' => $nextLink, 'cat_id' => _get('cat_id') ]); ?>">Anteriores</a></li>
        <?php endif; ?>

        <?php if ( $previousLink ) : ?>
          <li><a href="<?= get_permalink('category', ['paged' => $previousLink, 'cat_id' => _get('cat_id') ]); ?>">Próximos</a></li>
        <?php endif; ?>

      </ul>
    </nav>

  </div><!-- /.blog-main -->

  <?php get_sidebar(); ?>

</div><!-- /.row -->


<?php get_footer(); ?>