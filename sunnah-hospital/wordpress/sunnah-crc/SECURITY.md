# Security – what the theme does and what the site owner must do

No theme alone can make a website "100% safe". Most WordPress sites are hacked through weak passwords,
outdated plugins or insecure hosting, not through the theme. This theme is written to WordPress security
standards, and the checklist below covers the rest.

## Built into the theme
- All output is escaped and all input is sanitised; every PHP file refuses direct access.
- The enquiry form uses a WordPress security token (nonce), a hidden spam trap, rate limiting
  (5 requests per visitor per 10 minutes), input length limits and safe email headers.
- No file uploads, no database writes from visitors, no third-party scripts except Google Fonts.
- XML-RPC is turned off (a common target for password-guessing attacks).
- The WordPress version number is hidden.
- Visitors cannot list usernames through `?author=` links, author pages, the REST API or the sitemap.
- Login errors don't reveal whether the username or the password was wrong.
- Security headers: X-Content-Type-Options, X-Frame-Options (stops the site being embedded by others),
  Referrer-Policy, Permissions-Policy.
- `robots.txt` keeps search engines out of `/wp-admin/` and the login page.
- Empty `index.php` files stop folder contents being listed.

## Must be done on the live site (by whoever manages hosting)
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
9. **Privacy**: publish the Privacy Policy page. The form asks visitors not to send medical reports;
   enquiries are only emailed, not stored on the website.
