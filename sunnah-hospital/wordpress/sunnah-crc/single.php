<?php
/**
 * Single news item or health article.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
while ( have_posts() ) :
	the_post();
	$sunnah_cats    = get_the_category();
	$sunnah_health  = has_category( 'health-articles' );
	$sunnah_source  = get_post_meta( get_the_ID(), 'source', true );
	?>
<main id="content">
<div class="dtop"><div class="w"><a class="arw back" href="<?php echo sunnah_url( $sunnah_health ? 'health-awareness' : 'news' ); ?>"><?php echo $sunnah_health ? 'Health Awareness &amp; Resources' : 'News &amp; Medical Achievements'; ?></a></div></div>
<article class="w art">
  <p class="kick"><?php echo esc_html( $sunnah_cats ? $sunnah_cats[0]->name : 'News' ); ?> · <time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'j F Y' ) ); ?></time></p>
  <h1><?php echo esc_html( get_the_title() ); ?></h1>
  <?php if ( has_excerpt() ) : ?><p class="lede"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
  <?php if ( has_post_thumbnail() ) : ?><figure class="artimg"><?php the_post_thumbnail( 'large' ); ?></figure><?php endif; ?>
  <div class="entry"><?php the_content(); ?></div>
  <?php if ( $sunnah_source ) : ?><p class="fsmall src">Source: <?php echo filter_var( $sunnah_source, FILTER_VALIDATE_URL ) ? '<a href="' . esc_url( $sunnah_source ) . '" rel="noopener nofollow" target="_blank">' . esc_html( $sunnah_source ) . '</a>' : esc_html( $sunnah_source ); ?></p><?php endif; ?>
  <?php if ( $sunnah_health ) : ?><p class="note">This information is educational and does not replace individual medical consultation, diagnosis or treatment. Please consult a doctor about your own health.</p><?php endif; ?>
</article>
</main>
	<?php
endwhile;
get_footer();
