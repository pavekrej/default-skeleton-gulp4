# README

## DEFAULT SKELETON - GULP 4

Requirements:
- Localhost
- Node.js

## FIRST SETUP
```
1. Configure virtual host 'http://default-skeleton-gulp4:81/' and run Apache server (mod_rewrite must be turned on)

2. Install node_modules from package.json + init Gulp tasks

3. Configure application files

/application/config.php
/application/pages.php
/application/languages.php


4. Configure htaccess file (set domain)
/.htaccess

5. Configure gulpfile.js (host and port)

6. Run Gulp task WATCH
```

## TIPS

### Setup virtual host

**\apache\conf\httpd.conf** 
```
#Listen 12.34.56.78:80
Listen 81

# Virtual hosts
Include conf/extra/httpd-vhosts.conf
```

**\apache\conf\extra\httpd-vhosts.conf** 
```
<VirtualHost *:81>
    ServerAdmin webmaster@localhost.com
    DocumentRoot "C:/Sites/xampp/htdocs/default-skeleton-gulp4"
    ServerName default-skeleton-gulp4
</VirtualHost>
```

**\Windows\System32\drivers\etc\hosts**
```
127.0.0.1	default-skeleton-gulp4
```

### NPM installation

```
npm install
```

### NPM run custom scripts

```
npm run prettify
npm run stylelint-fix
```

### Open site on mobile device from same network
- Connect mobile device to same network as desktop
- On the desktop run CMD and type ```ipconfig```
- Try connect from mobile device to ```IPv4 Address```
- If doesn't work, use different port in vhost settings

## NOTES

### PHP server
**MAMP PRO** or **xampp (with manual setup hosts)**

- https://www.mamp.info/en/mamp-pro/
- https://www.apachefriends.org/

### Init NPM and Gulp
```
npm init => package.json
npm install --save-dev gulp
npm install --global gulp-cli
```

### Packages
- https://www.npmjs.com/

```
devDependencies
---------------
npm install --save-dev browser-sync
npm install --save-dev del
npm install --save-dev stylelint
npm install --save-dev --save-exact prettier
npm install --save-dev stylelint-config-standard

npm install --save-dev gulp-sass
npm install --save-dev gulp-rename
npm install --save-dev gulp-autoprefixer
npm install --save-dev gulp-sourcemaps
npm install --save-dev gulp-clean-css
npm install --save-dev gulp-concat-css
npm install --save-dev gulp-line-ending-corrector

npm install --save-dev gulp-imagemin
npm install --save-dev gulp-changed

npm install --save-dev gulp-stylelint
npm install --save-dev gulp-prettier

npm install --save-dev browserify
npm install --save-dev babelify
npm install --save-dev babel-core
npm install --save-dev babel-preset-env
npm install --save-dev vinyl-buffer
npm install --save-dev vinyl-source-stream
npm install --save-dev gulp-uglify

dependencies
------------
npm install --save jquery
npm install --save bootstrap
```

### Gulpfile

- https://gulpjs.com/
- *Browser sync options:* https://www.browsersync.io/docs/options

### Prettier

- .prettierrc
- .prettierignore
- *Options:* https://prettier.io/docs/en/options.html

```
NPM format: npm run prettify
PHPStorm format: CTRL + ALT + L
```

### Stylelint 

- .stylelintrc
- https://stylelint.io/
- *Standards:* https://github.com/stylelint/stylelint-config-standard
- *Clickable config:* https://maximgatilin.github.io/stylelint-config/

```
npm run stylelint-fix
```

### Gulp

- *Fix slow compilation:* https://github.com/paulmillr/chokidar/issues/328 gulp.watch usePolling: true

### Robots.txt
- https://varvy.com/robottxt.html
- https://www.contentkingapp.cz/akademie/robotstxt/

### Nice URL
- http://mike.treba.cz/mod_rewrite-a-hezke-url/

### Facebook Open Graph
- https://developers.facebook.com/docs/sharing/webmasters
- https://ogp.me/

### README.md syntax
- https://guides.github.com/features/mastering-markdown/

## UTILITIES & MANUALS

### Placeholder.com
- https://placeholder.com/
- https://via.placeholder.com/100x100.png?text=100x100

### Favicon generator
- https://realfavicongenerator.net/

### Twitter Bootstrap
- https://getbootstrap.com/

### W3C validator
- https://validator.w3.org/

### GEO meta tag generator
- http://www.geo-tag.de/generator/en.html

### Czech language generator
- https://lipsum.cz/

### HTML5 tags
- https://www.w3schools.com/tags/default.asp

## TROUBLESHOOTING

### EDGE can't load page on localhost
- Open CMD as administrator
- Copy/paste ```CheckNetIsolation LoopbackExempt -a -n=Microsoft.MicrosoftEdge_8wekyb3d8bbwe```
- Hit Enter -> Fixed

### Error 503 when directory named "examples"
- Needed to comment out the line:
- ```ProxyPass /examples ajp://127.0.0.1:8009/examples smax=0 ttl=60 retry=5```
- in \xampp\apache\conf\extra\httpd-ajp.conf

<!-- 
README.md comment
-->