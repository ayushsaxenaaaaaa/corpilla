<?php
function sanitize_text_field($s){return trim($s);} function wp_unslash($s){return $s;} function apply_filters($h,$v){return $v;}
$src=file_get_contents(__DIR__.'/../../wordpress/sunnah-crc/functions.php');
foreach(['sunnah_crc_cloudflare_ranges','sunnah_crc_ip_in_range','sunnah_crc_client_ip','sunnah_crc_client_key'] as $fn){ preg_match('/function '.$fn.'\(.*?\n\}\n/s',$src,$m); eval($m[0]); }
function t($label,$remote,$cf,$expect){ $_SERVER=['REMOTE_ADDR'=>$remote]; if($cf!==null) $_SERVER['HTTP_CF_CONNECTING_IP']=$cf; $got=sunnah_crc_client_key(); printf("%-52s %-28s %s\n",$label,$got,$got===$expect?'PASS':"FAIL (expected $expect)"); }
t('Direct visitor, no Cloudflare','49.36.10.5',null,'49.36.10.5');
t('Via Cloudflare IPv4 proxy (162.158.x)','162.158.1.20','49.36.10.5','49.36.10.5');
t('Via Cloudflare IPv4 proxy (104.16.x)','104.16.5.9','117.200.4.8','117.200.4.8');
t('Via Cloudflare IPv6 proxy','2606:4700:10::ac43:1','49.36.10.5','49.36.10.5');
t('ATTACK: fake CF header from a normal IP','45.10.20.30','1.1.1.1','45.10.20.30');
t('ATTACK: garbage CF header from Cloudflare','162.158.1.20','not-an-ip','162.158.1.20');
t('Just outside Cloudflare range (162.160.x)','162.160.0.1','1.1.1.1','162.160.0.1');
t('Server already restored real IP (nginx real_ip)','49.36.10.5','49.36.10.5','49.36.10.5');
t('IPv6 visitor grouped by /64','2401:4900:1c2a:5d3e:1111:2222:3333:4444',null,'240149001c2a5d3e::/64');
t('Same /64, different address','2401:4900:1c2a:5d3e:9999:8888:7777:6666',null,'240149001c2a5d3e::/64');
t('Missing REMOTE_ADDR','',null,'unknown');
