# how to build?
# docker login
## .....input your docker id and password
#docker build . -t tinyfilemanager/tinyfilemanager:master
#docker push tinyfilemanager/tinyfilemanager:master

# how to use?
# docker run -d -v /absolute/path:/var/www/html/data -p 80:80 --restart=always --name tinyfilemanager tinyfilemanager/tinyfilemanager:master

FROM php:7.4-cli-alpine

# if run in China
# RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories

RUN apk add --no-cache \
    libzip-dev \
    oniguruma-dev

RUN docker-php-ext-install \
    zip 

WORKDIR /var/www/html

ENV TFM_USE_AUTH=1 \
    TFM_AUTH_USERS='{ \
            "admin":"$2y$10$/K.hjNr84lLNDt8fTXjoI.DBp6PpeyoJ.mGwrrLuCZfAwfSAGqhOW", \
            "user":"$2y$10$Fg6Dz8oH9fPoZ2jJan5tZuv6Z4Kp7avtQ9bDfrdRntXtPeiMAZyGO" \
        }' \
    TFM_READONLY_USERS='user' \
    TFM_GLOBAL_READONLY=0 \
    TFM_DIRECTORIES_USERS='{}' \
    TFM_USE_HIGHLIGHTJS=1 \
    TFM_HIGHLIGHTJS_STYLE='vs' \
    TFM_EDIT_FILES=1 \
    TFM_DEFAULT_TIMEZONE='Etc/UTC' \
    TFM_ROOT_PATH='/var/www/html' \
    TFM_ROOT_URL='' \
    TFM_HTTP_HOST='' \
    TFM_ICONV_INPUT_ENCODING='UTF-8' \
    TFM_DATETIME_FORMAT='m/d/Y g:i A' \
    TFM_PATH_DISPLAY_MODE='full' \
    TFM_ALLOWED_FILE_EXTENSIONS='' \
    TFM_ALLOWED_UPLOAD_EXTENSIONS='' \
    TFM_FAVICON_PATH='' \
    TFM_EXCLUDE_ITEMS='' \
    TFM_ONLINE_VIEWER='google' \
    TFM_STICKY_NAVBAR=1 \
    TFM_MAX_UPLOAD_SIZE_BYTES=5000000000 \
    TFM_UPLOAD_CHUNK_SIZE_BYTES=2000000 \
    TFM_IP_RULESET='OFF' \
    TFM_IP_SILENT=1 \
    TFM_IP_WHITELIST='127.0.0.1,::1' \
    TFM_IP_BLACKLIST='0.0.0.0,::'

COPY translation.json translation.json
COPY config.php config.php
COPY tinyfilemanager.php index.php

CMD ["sh", "-c", "php -S 0.0.0.0:80"]
