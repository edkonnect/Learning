git branch
git pull  git@git.egrovetech.com:root/edkonnect.git dev
php artisan cache:clear;php artisan config:clear;php artisan config:cache;php artisan route:clear;php artisan view:clear
rm -rf /var/www/html/edkonnect/bootstrap/cache/*.php
composer dump-autoload
chown -R www-data:www-data /var/www/html/edkonnect

