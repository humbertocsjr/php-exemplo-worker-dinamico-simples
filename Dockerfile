# Usa a imagem oficial do PHP versão CLI (linha de comando)
FROM php:8.2-cli

# Define o diretório de trabalho dentro do container
WORKDIR /app

# Copia os arquivos do seu projeto para dentro do container
COPY . /app

# Opcional: Se você usa o Composer, pode instalar as dependências aqui
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# RUN composer install --no-dev --optimize-autoloader

# Define o comando que vai manter o container vivo
CMD ["php", "worker-monitor.php"]