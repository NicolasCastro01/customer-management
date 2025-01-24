FROM php:latest

# Instala o Composer
RUN apt-get update && apt-get install -y curl unzip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Define o diretório de trabalho
WORKDIR /app

# Copia os arquivos do backend
COPY . /app

# Expõe a porta 8000
EXPOSE 8000

# Comando para rodar o servidor PHP embutido
CMD ["php", "-S", "0.0.0.0:8000", "-t", "/app"]
