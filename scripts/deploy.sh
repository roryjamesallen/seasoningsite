#!/bin/bash
printf '(1/3) Generating XML Sitemap\n'
php generate_sitemap.php && printf '(2/3) Pushing Git\n' && git add ../sitemap.xml && git commit -m 'Automatic Sitemap Update' && git push && printf '(2/3) Pulling Git\n' && ssh -p 9284 seasoning@seasoning.live "cd public_html;git pull;cd ~/test/seasoningsite;git pull"
