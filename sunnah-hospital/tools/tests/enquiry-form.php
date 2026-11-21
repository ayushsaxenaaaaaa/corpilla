<?php
define('ABSPATH',__DIR__.'/'); define('MINUTE_IN_SECONDS',60); define('HOUR_IN_SECONDS',3600); define('DAY_IN_SECONDS',86400); function wp_hash($d){return hash_hmac('md5',$d,'k');} function apply_filters($h,$v){return $v;} function wp_timezone(){return new DateTimeZone('Asia/Kolkata');}
function add_action(){} function add_filter(){} function remove_action(){} function __($s){return $s;} function esc_html__($s){return $s;}
function get_theme_mod($k,$d=''){return $d;} function get_option($k){return 'admin@example.com';}
function wp_get_referer(){return 'https://site.test/contact/?enquiry=old#enquiry';} function home_url($p='/'){return 'https://site.test'.$p;}
function remove_query_arg($k,$u){return preg_replace('/[?&]'.$k.'=[^&#]*/','',$u);} function add_query_arg($k,$v,$u){return $u.(strpos($u,'?')===false?'?':'&').$k.'='.$v;}
function wp_verify_nonce($n,$a){return $n==='good';} function sanitize_text_field($s){return trim(strip_tags(str_replace(["\r","\n"],' ',$s)));} function sanitize_textarea_field($s){return trim(strip_tags($s));}
function wp_html_excerpt($s,$n){return mb_substr($s,0,$n);} function sanitize_email($s){return filter_var($s,FILTER_SANITIZE_EMAIL);} function is_email($s){return (bool)filter_var($s,FILTER_VALIDATE_EMAIL);} function wp_unslash($s){return $s;}
$T=[];function get_transient($k){global $T;return $T[$k]??false;} function set_transient($k,$v,$e){global $T;$T[$k]=$v;}
$MAIL=null;function wp_mail($to,$s,$b,$h){global $MAIL;$MAIL=compact('to','s','b','h');return true;}
class Redirect extends Exception{} function wp_safe_redirect($u){ throw new Redirect($u); }
class DB{ public $options='wp_options'; private $m;
 function __construct(){ $this->m=new mysqli('localhost','wp','wp','wptest'); }
 function prepare($q,...$a){ foreach($a as $v){ $q=preg_replace('/%s/',"'".$this->m->real_escape_string($v)."'",$q,1);} return $q; }
 function query($q){ $r=$this->m->query($q); return $r===true ? $this->m->affected_rows : $r; }
 function get_var($q){ $r=$this->m->query($q)->fetch_row(); return $r?$r[0]:null; }
 function get_col($q){ return array_column($this->m->query($q)->fetch_all(),0); }
 function esc_like($s){ return addcslashes($s,'_%\\'); }
 function delete($t,$w){ return $this->m->query("DELETE FROM $t WHERE option_name='".$this->m->real_escape_string($w['option_name'])."'"); }
}
$wpdb=new DB(); $_SERVER['REMOTE_ADDR']='1.2.3.4';
// functions.php calls exit after redirect; we throw instead, so strip "exit;" lines inside the handler by loading a patched copy
$src=file_get_contents(__DIR__.'/../../wordpress/sunnah-crc/functions.php'); $src=str_replace("exit;\n","return;\n",$src); $src=preg_replace('/^<\?php/','',$src);
eval($src);
function run($post,$label,$keep=false){ global $MAIL,$T,$wpdb; if(!$keep) $wpdb->query('DELETE FROM wp_options'); $MAIL=null; $_POST=$post; try{ sunnah_crc_handle_enquiry(); echo "$label: no redirect\n"; } catch(Redirect $r){ echo str_pad($label,26).' -> '.$r->getMessage().($MAIL?'  [mail to '.$MAIL['to'].', headers: '.json_encode($MAIL['h']).']':'')."\n"; } }
$ok=time()-60; $G=['sunnah_enquiry_nonce'=>'good','sunnah_ts'=>$ok,'sunnah_sig'=>wp_hash('sunnah_ts|'.$ok)];
$tom=(new DateTime('tomorrow',wp_timezone()))->format('Y-m-d');
run(array_merge($G,['sunnah_enquiry_nonce'=>'bad'])+['patient_name'=>'A','mobile'=>'9999999999'],'bad nonce');
run(array_merge($G,['website'=>'spam','patient_name'=>'A','mobile'=>'9999999999']),'honeypot filled');
run(['sunnah_enquiry_nonce'=>'good','patient_name'=>'A','mobile'=>'9999999999'],'no time stamp');
$f=time(); run(['sunnah_enquiry_nonce'=>'good','sunnah_ts'=>$f,'sunnah_sig'=>wp_hash('sunnah_ts|'.$f),'patient_name'=>'A','mobile'=>'9999999999'],'too fast (bot)');
$o=time()-3*86400; run(['sunnah_enquiry_nonce'=>'good','sunnah_ts'=>$o,'sunnah_sig'=>wp_hash('sunnah_ts|'.$o),'patient_name'=>'A','mobile'=>'9999999999'],'stale page (3 days)');
run(array_merge($G,['sunnah_sig'=>'forged','patient_name'=>'A','mobile'=>'9999999999']),'forged stamp');
run(array_merge($G,['patient_name'=>'A','mobile'=>'9999999999','message'=>'buy http://a.com http://b.com']),'spam links');
run(array_merge($G,['patient_name'=>'A','mobile'=>'99999abc99999']),'letters in mobile');
run(array_merge($G,['patient_name'=>'A','mobile'=>'9999999999','pref_date'=>'2020-01-01']),'past date');
run(array_merge($G,['patient_name'=>'A','mobile'=>'9999999999','pref_date'=>'2026-02-30']),'impossible date');
run(array_merge($G,['patient_name'=>'A','mobile'=>'9999999999','department'=>'Hacked<dept>']),'bad department value');
run(array_merge($G,['patient_name'=>'A','mobile'=>'9999999999','pref_time'=>'Midnight']),'bad time value');
run(array_merge($G,['patient_name'=>"Asha\r\nBcc: evil@x.com",'mobile'=>'+91 99999 99999','email'=>'asha@example.com','department'=>'Dental','pref_time'=>'Morning','pref_date'=>$tom,'message'=>'<script>x</script>Hi']),'valid enquiry');
echo "mail body:\n".($GLOBALS['MAIL']['b']??'(none)')."\n";
$wpdb->query('DELETE FROM wp_options'); for($i=0;$i<7;$i++) run($G+['patient_name'=>'B','mobile'=>'9999999999','department'=>'Dental','pref_time'=>'Morning'],'repeat '.$i,true);
