# Security tests for the sunnah-crc theme

Run from this folder. They load the theme's real `functions.php` with small WordPress stand-ins.

| Test | Needs | Command |
|---|---|---|
| Visitor IP behind Cloudflare (incl. forged headers) | PHP | `php client-ip.php` |
| Enquiry form: nonce, honeypot, time stamp, links, phone, date, dropdowns, rate limit | PHP + MySQL/MariaDB | `php enquiry-form.php` |
| Rate limit under simultaneous requests | PHP + MySQL/MariaDB | see below |

Database for the last two: a database `wptest`, user `wp` / password `wp`, with a WordPress-style table:

```sql
CREATE TABLE wp_options (option_id bigint unsigned NOT NULL AUTO_INCREMENT, option_name varchar(191) NOT NULL DEFAULT '',
  option_value longtext NOT NULL, autoload varchar(20) NOT NULL DEFAULT 'yes', PRIMARY KEY (option_id),
  UNIQUE KEY option_name (option_name)) ENGINE=InnoDB;
```

Concurrency test (40 requests at once from one visitor; expected: exactly 5 `OK`):

```sh
mysql wptest -e "DELETE FROM wp_options"
for i in $(seq 1 40); do php rate-limit.php 1.2.3.4 > out_$i.txt & done; wait
grep -c '^OK' out_*.txt | awk -F: '{s+=$2} END {print s}'; rm out_*.txt
```

Behind Cloudflare (one patient through different Cloudflare servers; expected 5):
`php rate-limit.php 162.158.N.1 x 49.36.10.5` in the same loop.
Different patients through one Cloudflare server (all should pass): `php rate-limit.php 162.158.1.1 x 49.36.20.$i`.
