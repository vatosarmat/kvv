FROM php:8.1-cli
WORKDIR /usr/src/myapp
COPY src ./src
COPY web ./web
EXPOSE 9000
CMD [ "php", "-S", "0.0.0.0:9000", "-t", "web" ]
