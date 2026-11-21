# Security tests for the sunnah-crc theme

Run from this folder. They load the theme's real `functions.php` with small WordPress stand-ins.

| Test | Needs | Command |
|---|---|---|
| Enquiry form: nonce, honeypot, time stamp, links, phone, date, dropdowns | PHP | `php enquiry-form.php` |

(The rate limit and its tests were removed in theme 3.5.0 at the owner's request.)
