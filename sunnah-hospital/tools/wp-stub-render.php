<?php
// Minimal WordPress stand-in for rendering theme templates. Usage: php stub2.php <template> <slug> <withdocs 0|1> [query]
error_reporting(E_ALL); ini_set('display_errors','stderr');
[$_, $TPL, $SLUG, $WITHDOCS] = $argv; $QS = $argv[4] ?? '';
parse_str($QS, $_GET);
define('ABSPATH', __DIR__.'/'); define('MINUTE_IN_SECONDS',60); define('THEME', getenv('THEME'));
$GLOBALS['A']=[]; function add_action($h,$f,$p=10,$n=1){ $GLOBALS['A'][$h][$p][]=$f; } function add_filter($h,$f,$p=10,$n=1){}
function do_action($h,...$x){ if(empty($GLOBALS['A'][$h])) return; ksort($GLOBALS['A'][$h]); foreach($GLOBALS['A'][$h] as $fs) foreach($fs as $f) if(is_string($f)||is_callable($f)) $f(...$x); }
function remove_action(){} function add_theme_support(){} function add_image_size(){} function register_post_type(){} function __($s){return $s;} function esc_html__($s){return htmlspecialchars($s);} function esc_attr__($s){return htmlspecialchars($s);} function esc_html_e($s){echo htmlspecialchars($s);}
$GLOBALS['st']=[];$GLOBALS['sc']=[];$GLOBALS['inl']='';
function wp_enqueue_style($h,$u){ $GLOBALS['st'][]=$u; } function wp_enqueue_script($h,$u){ $GLOBALS['sc'][]=$u; } function wp_add_inline_script($h,$c){ $GLOBALS['inl'].=$c; }
function get_theme_file_uri($p){ return $p; } function home_url($p='/'){ return '/site'.$p; } function admin_url($p=''){ return '/site/wp-admin/'.$p; }
function esc_url($u){ return htmlspecialchars($u,ENT_QUOTES); } function esc_attr($s){ return htmlspecialchars((string)$s,ENT_QUOTES); } function esc_html($s){ return htmlspecialchars((string)$s,ENT_QUOTES); } function esc_url_raw($u){return $u;}
function wp_json_encode($a){ return json_encode($a, JSON_UNESCAPED_SLASHES); } function trailingslashit($s){ return rtrim($s,'/').'/'; } function wp_parse_args($a,$d){ return array_merge($d,(array)$a); }
function get_theme_mod($k,$d=''){ return $d; } function get_option($k){ return $k==='admin_email' ? 'admin@example.com' : ($GLOBALS['OPT'][$k] ?? false); }
function language_attributes(){ echo 'lang="en-US"'; } function bloginfo($k){ echo 'UTF-8'; } function body_class(){ echo 'class="page"'; } function wp_body_open(){}
function wp_head(){ echo '<title>Sunnah</title>'; do_action('wp_head'); foreach($GLOBALS['st'] as $s) echo '<link rel="stylesheet" href="'.$s.'">'."\n"; }
function wp_footer(){ echo '<script>'.$GLOBALS['inl'].'</script>'; foreach($GLOBALS['sc'] as $s) echo '<script src="'.$s.'"></script>'."\n"; }
function get_header(){ include THEME.'/header.php'; } function get_footer(){ include THEME.'/footer.php'; }
function get_template_part($slug,$name=null,$args=[]){ include THEME.'/'.$slug.'.php'; }
function is_front_page(){ return $GLOBALS['SLUG']==='home'; } function is_page($s=''){ return $s==='' ? true : in_array($GLOBALS['SLUG'], (array)$s, true); }
function is_singular($t=''){ return $GLOBALS['TPL']==='single-doctor.php' ? ($t===''||$t==='doctor') : ($t==='' && $GLOBALS['TPL']!=='index.php'); }
function is_search(){return false;} function is_home(){return false;} function get_the_archive_title(){return 'Archive';} function wp_strip_all_tags($s){return strip_tags($s);}
function has_post_thumbnail($p=null){ return false; } function get_the_post_thumbnail_url(){ return ''; } function get_the_post_thumbnail(){ return ''; } function the_post_thumbnail(){}
function get_queried_object_id(){ return 1; } function get_post_field($f,$id){ return $GLOBALS['SLUG']; }
function wp_nonce_field($a,$n){ echo '<input type="hidden" name="'.$n.'" value="x">'; } function selected($a,$b,$e=true){ $r=$a===$b?' selected':''; if($e) echo $r; return $r; }
function sanitize_key($s){ return strtolower(preg_replace('/[^a-z0-9_\-]/i','',$s)); } function wp_unslash($s){return $s;} function sanitize_title($s){ return trim(preg_replace('/[^a-z0-9]+/','-',strtolower($s)),'-'); } function sanitize_text_field($s){return trim($s);}
class P { public $ID; public $post_title; function __construct($i,$t){$this->ID=$i;$this->post_title=$t;} }
$GLOBALS['DOCS'] = $WITHDOCS ? [ new P(1,'Dr. Name Surname'), new P(2,'Dr. Name Surname'), new P(3,'Dr. Name Surname'), new P(4,'Name Surname') ] : [];
$GLOBALS['META']=[1=>['speciality'=>'Surgical Oncology','role'=>'Head of Department','qualification'=>'MS, MCh','experience'=>'15','languages'=>'English, Hindi, Marathi','opd'=>'Mon–Sat, 10 am – 2 pm'],2=>['speciality'=>'Medical Oncology','role'=>'Consultant','qualification'=>'MD, DM'],3=>['speciality'=>'Surgical Oncology','role'=>'Consultant','qualification'=>'MS, DNB'],4=>['speciality'=>'Oncology Nutrition','role'=>'Oncology Dietitian','qualification'=>'MSc']];
function get_posts($a){ if(($a['post_type']??'')==='post') return []; $d=$GLOBALS['DOCS']; if(!empty($a['meta_query'])){ $v=(array)$a['meta_query'][0]['value']; $d=array_values(array_filter($d,fn($p)=>in_array($GLOBALS['META'][$p->ID]['speciality'],$v,true))); } return $d; }
function get_post_meta($id,$k,$s){ $k=str_replace('_sunnah_','',$k); return $GLOBALS['META'][$id][$k] ?? ''; }
function get_permalink($p=null){ if(isset($p->post_name)) return $GLOBALS['PERMA']==='plain' ? '/site/?page_id='.$p->ID : '/site/'.$p->post_name.'/'; return '/site/doctor/'.($p->ID??1).'/'; }
function has_site_icon(){return false;} function wp_get_document_title(){return 'Sunnah Hospital';} function get_the_content(){return '';} function date_i18n($f,$t){return date($f,$t);} function is_admin(){return false;}
function get_theme_file_path($p){ return THEME.'/'.$p; }
$GLOBALS['PERMA']=getenv('PLAIN')?'plain':'pretty'; $GLOBALS['OPT']=[]; $GLOBALS['INSERTED']=[];
function get_page_by_path($s){ static $ids=['about-us'=>11,'cancer-care'=>12,'surgical-oncology'=>13,'medical-oncology'=>14,'doctors'=>15,'patient-care'=>16,'infrastructure'=>17,'research'=>18,'contact'=>19,'privacy-policy'=>20,'diagnostics'=>21,'dental-care'=>22,'departments'=>23,'news'=>24,'community'=>25,'health-awareness'=>26,'terms-and-conditions'=>27]; if(getenv('NOPAGES')) return null; return isset($ids[$s]) ? (object)['ID'=>$ids[$s],'post_status'=>'publish','post_name'=>$s] : null; }
function get_option_real($k){ return $GLOBALS['OPT'][$k] ?? false; } function update_option($k,$v){ $GLOBALS['OPT'][$k]=$v; }
function wp_insert_post($a){ $GLOBALS['INSERTED'][]=$a['post_name']; return 1; } function flush_rewrite_rules(){}

function wp_date($f){return date($f);} function wpautop($s){return '<p>'.$s.'</p>';} function wp_kses_post($s){return $s;} function sanitize_textarea_field($s){return $s;}
function wp_list_pluck($l,$f){ return array_map(fn($x)=>is_array($x)?$x[$f]:$x->$f,$l); } function get_term_by(){return false;} function get_category_link(){return '';}
class WP_Query{ public $posts=[]; public $max_num_pages=0; function __construct($a){} function have_posts(){return false;} }
function paginate_links(){return '';} function wp_reset_postdata(){} function get_the_category(){return [];} function has_category(){return false;}
function get_the_date($f){return date($f);} function get_the_excerpt(){return '';} function has_excerpt(){return false;} function single_term_title(){return '';} function get_the_archive_description(){return '';}
function is_category(){return false;} function wp_html_excerpt($s,$n,$m=''){return mb_substr($s,0,$n);} function sanitize_email($s){return $s;} function is_user_logged_in(){return false;} function get_post(){return null;}
function get_query_var($k){return 0;} function is_author(){return false;} function is_404(){return false;}
$GLOBALS['looped']=false; function have_posts(){ return !$GLOBALS['looped']; } function the_post(){ $GLOBALS['looped']=true; }
function get_the_ID(){ return 1; } function get_the_title($p=null){ return $GLOBALS['TPL']==='single-doctor.php' ? 'Dr. Name Surname' : 'Privacy Policy'; } function the_title(){ echo get_the_title(); }
function the_content(){ echo '<p>Profile text written by the hospital goes here.</p>'; } function the_excerpt(){} function post_class(){} function the_permalink(){} function the_posts_pagination(){}
function wp_get_theme(){ return new class{ function get($k){return '2';} }; }
include THEME.'/functions.php'; do_action('after_setup_theme'); do_action('wp_enqueue_scripts');
include THEME.'/'.$TPL;
