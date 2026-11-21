<?php
define('MINUTE_IN_SECONDS',60);define('HOUR_IN_SECONDS',3600);define('DAY_IN_SECONDS',86400);
function sanitize_text_field($s){return $s;} function apply_filters($h,$v){return $v;} function wp_unslash($s){return $s;}
class DB{ public $options='wp_options'; private $m;
 function __construct(){ $this->m=new mysqli('localhost','wp','wp','wptest'); }
 function prepare($q,...$a){ foreach($a as $v){ $q=preg_replace('/%s/',"'".$this->m->real_escape_string($v)."'",$q,1);} return $q; }
 function query($q){ $r=$this->m->query($q); return $r===true ? $this->m->affected_rows : $r; }
 function get_var($q){ $r=$this->m->query($q)->fetch_row(); return $r?$r[0]:null; }
 function get_col($q){ return array_column($this->m->query($q)->fetch_all(),0); }
 function esc_like($s){ return addcslashes($s,'_%\\'); }
 function delete($t,$w){ return $this->m->query("DELETE FROM $t WHERE option_name='".$this->m->real_escape_string($w['option_name'])."'"); }
}
$wpdb=new DB(); $_SERVER['REMOTE_ADDR']=$argv[1]; if(isset($argv[3])) $_SERVER['HTTP_CF_CONNECTING_IP']=$argv[3];
$src=file_get_contents(__DIR__.'/../../wordpress/sunnah-crc/functions.php');
foreach(['sunnah_crc_cloudflare_ranges','sunnah_crc_ip_in_range','sunnah_crc_client_ip','sunnah_crc_client_key'] as $fn){ preg_match('/function '.$fn.'\(.*?\n\}\n/s',$src,$mm); eval($mm[0]); }
preg_match('/function sunnah_crc_enquiry_rate_ok\(\) \{.*?\n\}\n/s',$src,$m); eval($m[0]);
preg_match('/function sunnah_crc_rate_cleanup\(\) \{.*?\n\}\n/s',$src,$m); eval($m[0]);
if(($argv[2]??'')==='cleanup'){ sunnah_crc_rate_cleanup(); exit; }
echo sunnah_crc_enquiry_rate_ok() ? "OK\n" : "BLOCKED\n";
