FROM mysql:8.0
ENV MYSQL_ROOT_PASSWORD test
ENV MYSQL_DATABASE test
ENV MYSQL_USER test
ENV MYSQL_PASSWORD test
ADD setup.sql /docker-entrypoint-initdb.d
EXPOSE 3306


