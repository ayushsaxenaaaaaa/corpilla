<?php
/**
 * Fallback template (blog posts, archives, search).
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-corridor.jpg', 'title' => is_search() ? 'Search results' : ( is_home() ? 'News' : wp_strip_all_tags( get_the_archive_title() ) ) ) );
?>
<main id="content"><div class="w lay">
  <div class="main">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?> style="padding-bottom:24px;border-bottom:1px solid var(--line)">
        <h2 style="font-size:1.8rem"><a href="<?php echo esc_url( get_permalink() ); ?>" style="text-decoration:none"><?php echo esc_html( get_the_title() ); ?></a></h2>
        <div class="entry"><?php the_excerpt(); ?></div>
      </article>
    <?php endwhile; ?>
    <?php the_posts_pagination(); ?>
  <?php else : ?>
    <p class="lede">Nothing was found.</p>
    <p><a class="arw" href="<?php echo sunnah_url(); ?>">Back to the home page</a></p>
  <?php endif; ?>
  </div>
  <?php get_template_part( 'template-parts/aside' ); ?>
</div></main>
<?php
get_footer();
