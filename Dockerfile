FROM php:7.1-cli

ENV COMPOSER_VERSION=1.6.3

# Update and install required packages
RUN apt-get update && apt-get install -y zlib1g-dev git cmake gcc g++ python2.7 \
    && docker-php-ext-install zip

# Install WABT toolset (binaries are in: wabt/out/gcc/Release)
RUN git clone --recursive https://github.com/WebAssembly/wabt && cd wabt \
    && make gcc-release && cd out/gcc/Release \
    && chmod +x wat2wasm \
    && mv wat2wasm /usr/local/bin

# Install composer
RUN curl https://getcomposer.org/download/${COMPOSER_VERSION}/composer.phar --output composer.phar \
    && chmod +x composer.phar \
    && mv composer.phar /usr/local/bin/composer

# Clean up
RUN rm -rf /wabt

# Add a `wasm` user
RUN useradd -ms /bin/bash wasm

USER wasm

WORKDIR /app

CMD ["php", "-a"]