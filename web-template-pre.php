<?php

$site_name      = get_bloginfo('name');
$site_tagline   = get_bloginfo('description');
?>
<main class="spine-page-default">
	<header class="ucomm-bookmark">
		<hgroup>
			<div class="site"><a href="<?php home_url(); ?>" title="<?php echo esc_attr( $site_name ); ?>" rel="home">Admissions</a></div>
			<div class="tagline"><a href="<?php home_url(); ?>" title="<?php echo esc_attr( $site_tagline ); ?>" rel="home"><?php echo esc_html( $site_tagline ); ?></a></div>
		</hgroup>
	</header>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<section class="row single gutter marginalize-ends">
			<?php the_content(); ?>
	</section>
	<?php endwhile; endif; ?>
	<section class="row single gutter marginalize-ends">