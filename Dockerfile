# Utilise l'image PHP officielle avec Apache
FROM php:8.3-apache

# Installe les extensions nécessaires à Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Modifie le DocumentRoot pour pointer vers /var/www/public
RUN sed -i 's|/var/www/html|/var/www/public|g' /etc/apache2/sites-available/000-default.conf

# Active le module Apache rewrite (indispensable pour Laravel)
RUN a2enmod rewrite

# Change les permissions du dossier
RUN chown -R www-data:www-data /var/www

# Démarre Apache
CMD ["apache2-foreground"]
