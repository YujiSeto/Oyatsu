FROM php:8.2-apache

# Habilitar extensão mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Configurar o Apache para usar a pasta atual e permitir mod_rewrite se necessário
COPY . /var/www/html/

# Ajustar permissões e habilitar modulo rewrite (útil para rotas e segurança)
RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# Expor porta 80 que o Render lerá nativamente de serviços web
EXPOSE 80
