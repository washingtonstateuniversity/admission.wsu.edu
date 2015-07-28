
<main class="spine-page-default">
	
	<?php get_template_part('parts/headers'); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<section class="row single gutter marginalize-ends">
			<?php the_content(); ?>
	</section>
	<?php endwhile; endif; ?>
	<section class="row single gutter marginalize-ends">