<?php
/**
 * News & Medical Achievements page (slug: news). Shows WordPress Posts from the news categories.
 *
 * @package sunnah-crc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
get_template_part( 'template-parts/banner', null, array( 'image' => 'sh-entrance.jpg', 'title' => 'News & Medical Achievements', 'lead' => 'Verified developments, hospital activities, medical achievements and important announcements.' ) );
$sunnah_cats  = sunnah_crc_news_categories();
unset( $sunnah_cats['health-articles'] );
$sunnah_paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$sunnah_q     = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 9,
		'paged'               => $sunnah_paged,
		'ignore_sticky_posts' => true,
		'category_name'       => implode( ',', array_keys( $sunnah_cats ) ),
	)
);
?>
<main id="content">
<section class="sec"><div class="w">
  <nav class="catnav" aria-label="News categories">
    <a href="<?php echo sunnah_url( 'news' ); ?>" aria-current="page">All</a>
    <?php
    foreach ( $sunnah_cats as $slug => $name ) :
		$term = get_term_by( 'slug', $slug, 'category' );
		if ( ! $term ) {
			continue;
		}
		?>
      <a href="<?php echo esc_url( get_category_link( $term ) ); ?>"><?php echo esc_html( $name ); ?></a>
    <?php endforeach; ?>
  </nav>
  <?php if ( $sunnah_q->have_posts() ) : ?>
    <div class="ncards"><?php foreach ( $sunnah_q->posts as $n ) { get_template_part( 'template-parts/news-card', null, array( 'post' => $n ) ); } ?></div>
    <?php
    $sunnah_links = paginate_links( array( 'total' => $sunnah_q->max_num_pages, 'current' => $sunnah_paged, 'type' => 'list' ) );
    if ( $sunnah_links ) {
		echo '<nav class="pgn" aria-label="More news">' . wp_kses_post( $sunnah_links ) . '</nav>';
	}
	?>
  <?php else : ?>
    <div class="empty"><h3>News will be published here</h3><p>Hospital announcements, medical achievements, health awareness activities, events and media coverage will appear on this page.</p></div>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</div></section>
<section class="sec grey"><div class="w">
  <h2 class="c">What we publish</h2>
  <div class="svcg sup">
    <div class="svcc"><svg><use href="#i-news"/></svg><h3>Hospital Announcements</h3><p>Important institutional announcements, new services, changes in consultation schedules and facility updates.</p></div>
    <div class="svcc"><svg><use href="#i-shield"/></svg><h3>Medical Achievements</h3><p>Verified medical milestones, significant procedures and institutional achievements.</p></div>
    <div class="svcc"><svg><use href="#i-ppl"/></svg><h3>Health Awareness Activities</h3><p>Health awareness programmes, screening initiatives, educational sessions and community health activities.</p></div>
    <div class="svcc"><svg><use href="#i-cal"/></svg><h3>Events &amp; Programmes</h3><p>Hospital events, professional meetings, medical camps and other institutional programmes.</p></div>
    <div class="svcc"><svg><use href="#i-plan"/></svg><h3>Media Coverage</h3><p>Published news articles, newspaper reports, interviews and other verified media coverage.</p></div>
  </div>
</div></section>
</main>
<?php
get_footer();
