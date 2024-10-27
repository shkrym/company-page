npm run wp-env run cli wp plugin delete akismet hello
npm run wp-env run cli wp theme activate smiron-hp
npm run wp-env run cli wp rewrite structure /%postname%/
npm run wp-env run cli wp core language install ja -- --activate
npm run wp-env run cli wp option update timezone_string 'Asia/Tokyo'
npm run wp-env run cli wp core language update
npm run wp-env run cli wp rewrite flush -- --hard