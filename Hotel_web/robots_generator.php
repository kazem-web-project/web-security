<?php
header('Content-Type: text/plain');
echo <<<TXT
User-agent: *
Disallow: /Hotel_web/inc/
Disallow: /Hotel_web/uploads/
Disallow: /logs/
Allow: /Hotel_web/

Sitemap: https://NirvanaHotel.com/sitemap.xml
TXT;
