import re, sys, os, shutil
src, out = sys.argv[1], sys.argv[2]   # src = sunnah-hospital dir, out = theme dir
html = open(os.path.join(src, 'index.html')).read()
T = out
for d in ['assets/css','assets/js','assets/img']:
    os.makedirs(os.path.join(T,d), exist_ok=True)

css = re.search(r'<style>(.*?)</style>', html, re.S).group(1).strip()
js = re.search(r'<script>(.*?)</script>', html, re.S).group(1).strip()
body = re.search(r'<body>(.*?)<script>', html, re.S).group(1)

slug = {'index.html':'', 'about.html':'about-us/', 'departments.html':'cancer-care/', 'doctors.html':'doctors/',
        'patient-care.html':'patient-care/', 'infrastructure.html':'infrastructure/', 'research.html':'research/',
        'contact.html':'contact/', 'surgical-oncology.html':'surgical-oncology/', 'medical-oncology.html':'medical-oncology/'}
def fix_links(s):
    def h(m):
        page, anchor = m.group(1), m.group(2) or ''
        return 'href="<?php echo esc_url( home_url( \'/%s\' ) ); ?>%s"' % (slug[page], anchor)
    s = re.sub(r'href="([a-z-]+\.html)(#[a-z-]+)?"', h, s)
    s = re.sub(r'src="assets/((?:img/)?[A-Za-z0-9_.-]+)"', lambda m: 'src="<?php echo esc_url( get_theme_file_uri( \'assets/%s\' ) ); ?>"' % ('img/'+m.group(1) if not m.group(1).startswith('img/') else m.group(1)), s)
    return s
body = fix_links(body)
assert '.html"' not in body and 'src="assets' not in body, 'unconverted links'

i_main = body.index('<main>'); i_end = body.index('</main>') + len('</main>')
head_part, main_part, foot_part = body[:i_main], body[i_main:i_end], body[i_end:]

open(os.path.join(T,'assets/css/home.css'),'w').write(css + '\n')
js2 = js
for page, sl in slug.items():
    js2 = js2.replace("'" + page, "'" + sl)
js2 = js2.replace('`<a href="${x[1]}">', '`<a href="${B+x[1]}">').replace('<a href="contact.html">', '<a href="${B}contact/">')
js2 = js2.replace(":'<a href=\"${B}contact/\">No match. Ask our care team →</a>'", ":`<a href=\"${B}contact/\">No match. Ask our care team →</a>`")
assert '.html' not in js2, [l for l in js2.split('\n') if '.html' in l]
open(os.path.join(T,'assets/js/home.js'),'w').write('(function(){\nconst B=(window.SUNNAH_CRC&&window.SUNNAH_CRC.home)||"/";\n' + js2 + '\n})();\n')

open(os.path.join(T,'style.css'),'w').write('''/*
Theme Name: Sunnah Cancer Research Center
Theme URI: https://sunnahhospital.com
Author: Sunnah Hospital
Description: Custom theme for Sunnah Hospital – Cancer Research Center, Akola. Version 1 contains the home page design only.
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: sunnah-crc
*/

/* Home page styles are in assets/css/home.css. */
''')

open(os.path.join(T,'functions.php'),'w').write('''<?php
/**
 * Sunnah Cancer Research Center theme functions.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function sunnah_crc_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'sunnah_crc_setup' );

function sunnah_crc_assets() {
	$ver = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'sunnah-crc-fonts', 'https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;500&family=Barlow:wght@400;500;600&family=Barlow+Condensed:wght@500;600&display=swap', array(), null );
	wp_enqueue_style( 'sunnah-crc-home', get_theme_file_uri( 'assets/css/home.css' ), array( 'sunnah-crc-fonts' ), $ver );
	wp_enqueue_script( 'sunnah-crc-home', get_theme_file_uri( 'assets/js/home.js' ), array(), $ver, true );
	wp_add_inline_script( 'sunnah-crc-home', 'window.SUNNAH_CRC = ' . wp_json_encode( array( 'home' => trailingslashit( home_url( '/' ) ) ) ) . ';', 'before' );
}
add_action( 'wp_enqueue_scripts', 'sunnah_crc_assets' );

function sunnah_crc_preconnect( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.gstatic.com', 'crossorigin' );
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'sunnah_crc_preconnect', 10, 2 );

function sunnah_crc_meta_description() {
	if ( is_front_page() ) {
		echo '<meta name="description" content="' . esc_attr__( 'Sunnah Hospital – Cancer Research Center, Akola: comprehensive, compassionate and affordable cancer care for Vidarbha. Surgical & medical oncology, chemotherapy day care, diagnostics, ICU, HDU and PM-JAY cashless treatment.', 'sunnah-crc' ) . '">' . "\\n";
	}
}
add_action( 'wp_head', 'sunnah_crc_meta_description', 1 );
''')

open(os.path.join(T,'header.php'),'w').write('''<?php
/**
 * Site header: top strip, logo header and main menu bar.
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
''' + head_part.strip() + '\n')

open(os.path.join(T,'footer.php'),'w').write('''<?php
/**
 * Site footer, mobile action bar.
 */
?>
''' + foot_part.strip() + '\n<?php wp_footer(); ?>\n</body>\n</html>\n')

open(os.path.join(T,'front-page.php'),'w').write('''<?php
/**
 * Home page template.
 */
get_header();
?>
''' + main_part.strip() + '\n<?php\nget_footer();\n')

open(os.path.join(T,'index.php'),'w').write('''<?php
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
''')

# images used
used = set(re.findall(r"get_theme_file_uri\( 'assets/(img/[^']+)' \)", head_part + main_part + foot_part))
for u in used:
    name = u[4:]
    cand = [os.path.join(src,'assets','img',name), os.path.join(src,'assets',name)]
    p = next(c for c in cand if os.path.exists(c))
    shutil.copy(p, os.path.join(T,'assets','img',name))
print('images:', sorted(used))
