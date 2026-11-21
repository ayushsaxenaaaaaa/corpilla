# Security – what the theme does and what the site owner must do

No theme alone can make a website "100% safe". Most WordPress sites are hacked through weak passwords,
outdated plugins or insecure hosting, not through the theme. This theme is written to WordPress security
standards, and the checklist below covers the rest.

## Built into the theme
- All output is escaped and all input is sanitised; every PHP file refuses direct access.
- The enquiry form uses a WordPress security token (nonce), a hidden spam trap, a signed time stamp
  (forms sent within 3 seconds, older than 2 days or with a forged stamp are refused), a link filter (messages with
  several web links are dropped), input length limits and safe email headers.
  There is no per-visitor rate limit in the theme (removed at the owner's request in 3.5.0). If the form is ever
  flooded, add the Cloudflare rate-limiting rule in step 9 (it stops traffic before it reaches the server).
- Server-side validation: department and preferred time must be one of the form's own options (any other value
  rejects the whole submission); the preferred date
  must be a real date from today up to one year ahead; the contact number must have 10–13 digits.
- **Content Security Policy (CSP)** header: browsers only load scripts, styles, fonts and frames from the site itself,
  Google Fonts, Google Maps and YouTube. Plugins needing another source can add it with the `sunnah_crc_csp_sources` filter.
  - Enforced policy: still allows inline scripts, because some plugins add them.
  - A **stricter policy (no inline scripts) is sent in Report-Only mode** at the same time: it blocks nothing, but the
    browser console (F12 → Console) lists anything it would block. The theme itself needs no inline scripts (the
    WordPress emoji script is switched off for this).
  - After the final plugins are installed, open the main pages with F12 open. If no "Content-Security-Policy-Report-Only"
    messages appear, switch the strict policy on by adding this line to a small site plugin or wp-config-loaded mu-plugin:
    `add_filter( 'sunnah_crc_csp_strict', '__return_true' );`
- **Doctor profiles have their own permissions**: only Administrators and Editors can add, edit or delete doctors.
  Authors, Contributors and Subscribers cannot (the same rules apply in the editor and through the REST API).
- No file uploads, no database writes from visitors, no third-party scripts except Google Fonts.
- XML-RPC is turned off (a common target for password-guessing attacks).
- **REST API closed to the public.** WordPress normally exposes a data interface at `/wp-json/` (the "REST API").
  The public website does not use it, so the theme refuses every REST request from visitors who are not logged in
  (they get "401 – not available"). Logged-in staff keep access because the WordPress editor needs it.
  The REST, shortlink and oEmbed discovery links are removed from every page, application passwords
  (API logins from outside the site) are switched off, and `robots.txt` disallows `/wp-json/`.
  The enquiry form does not use the REST API; it is a normal form post with a security token.
- Comments and pingbacks are switched off everywhere (they attract spam and links).
- Code editing from the WordPress admin is switched off (`DISALLOW_FILE_EDIT`), so a stolen login cannot edit PHP.
- The WordPress version number is hidden.
- Visitors cannot list usernames through `?author=` links, author pages, the REST API or the sitemap.
- Login errors don't reveal whether the username or the password was wrong.
- Security headers: X-Content-Type-Options, X-Frame-Options (stops the site being embedded by others),
  Referrer-Policy, Permissions-Policy.
- `robots.txt` keeps search engines out of `/wp-admin/` and the login page.
- Empty `index.php` files stop folder contents being listed; like every other PHP file, they refuse direct execution.

## Must be done on the live site (by whoever manages hosting)
These cannot be done inside a theme. Summary: **two-factor login** (step 3), **Cloudflare / firewall** (step 9) and
**off-server backups** (step 5).

1. **HTTPS**: install an SSL certificate (free with most hosts) and set both WordPress Address and Site Address to `https://`.
2. **Strong admin accounts**: no username "admin"; long unique passwords; give staff "Editor" role, not "Administrator".
3. **Two-factor login and login limits**: install one well-known security plugin, e.g. **Wordfence** or **Solid Security**,
   and turn on two-factor authentication and login attempt limits.
4. **Updates**: keep WordPress core, plugins and PHP (8.1 or newer) updated. Remove unused plugins and themes.
5. **Backups**: daily automatic backups stored off the server (e.g. **UpdraftPlus** to Google Drive), and test a restore once.
6. **wp-config.php**: add
   ```php
   define( 'DISALLOW_FILE_EDIT', true );   // no code editing from the admin
   define( 'WP_DEBUG', false );
   ```
   and use the unique security keys from https://api.wordpress.org/secret-key/1.1/salt/
7. **File permissions**: folders 755, files 644, `wp-config.php` 600 or 640.
8. **Email**: use an SMTP plugin with the hospital's email account so enquiries are delivered reliably.
9. **Protection against attacks that try to bring the site down (DDoS / floods)**: this cannot be done by a theme,
   because the traffic arrives before WordPress runs. Put the site behind **Cloudflare** (the free plan is enough):
   - point the domain's nameservers to Cloudflare and turn on the orange-cloud proxy for the website records;
   - SSL/TLS mode **Full (strict)**; "Always Use HTTPS" on;
   - Security → Bots: **Bot Fight Mode** on; Security level "Medium";
   - a free **rate-limiting rule**: more than 10 requests in 10 seconds to `/wp-login.php` or `/wp-admin/admin-post.php` → block for 10 minutes;
   - **Under Attack Mode** can be switched on with one click if the site is ever flooded.
   Also turn on Wordfence's **Rate Limiting** and **Brute Force Protection**, and choose a host with server-level
   firewall and DDoS protection. Cloudflare also caches pages, which keeps the site fast under heavy traffic.
10. **Privacy**: publish the Privacy Policy page. The form asks visitors not to send medical reports;
   enquiries are only emailed, not stored on the website.
