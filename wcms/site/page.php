<?php get_header(); ?>

<div class="row">
	<div class="col-sm-8 blog-main">
	  	<div class="blog-post">
	  		<?php $page = get_page(); ?>
	  		<?php if ($page) : ?>
	    		<h2 class="blog-post-title"><?= $page->post_title; ?></h2>
	    		<?= $page->post_content; ?>
	    	<?php endif; ?>
		</div>
	</div> <!-- blog-main -->
	<?php get_sidebar(); ?> 
</div> <!-- row -->

<?php get_footer(); ?>