<?php
/**
 * Fallback template. Only the home page is designed in this version.
 */
get_header();
?>
<main class="w" style="padding-block:60px 90px;max-width:900px">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1 style="font-size:clamp(2rem,4vw,3rem);margin-bottom:24px"><?php the_title(); ?></h1>
				<div class="entry-content"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<h1><?php esc_html_e( 'Page not found', 'sunnah-crc' ); ?></h1>
		<p style="margin-top:16px"><a class="arw" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to the home page', 'sunnah-crc' ); ?></a></p>
	<?php endif; ?>
</main>
<?php
get_footer();
