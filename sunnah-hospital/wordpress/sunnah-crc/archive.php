<?php
/**
 * Category and date archives (news categories, health articles).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-entrance.jpg', 'title' => wp_strip_all_tags( single_term_title( '', false ) ? single_term_title( '', false ) : get_the_archive_title() ), 'lead' => wp_strip_all_tags( get_the_archive_description() ) ) );
?>
<main id="content">
<section class="sec"><div class="w">
  <p style="margin-bottom:24px"><a class="arw back" href="<?php echo sunnah_url( is_category( 'health-articles' ) ? 'health-awareness' : 'news' ); ?>"><?php echo is_category( 'health-articles' ) ? 'Health Awareness &amp; Resources' : 'All news'; ?></a></p>
  <?php if ( have_posts() ) : ?>
    <div class="ncards"><?php while ( have_posts() ) { the_post(); get_template_part( 'template-parts/news-card', null, array( 'post' => get_post() ) ); } ?></div>
    <?php the_posts_pagination(); ?>
  <?php else : ?>
    <div class="empty"><h3>Nothing published yet</h3><p>Please check again later.</p></div>
  <?php endif; ?>
</div></section>
</main>
<?php
get_footer();
