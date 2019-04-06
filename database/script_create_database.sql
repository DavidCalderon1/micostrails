
--
-- Base de datos: `prueba_backend`
--

CREATE DATABASE prueba_backend;

--
-- Usuario: `prueba_backend_usr`
--

CREATE USER 'prueba_backend_usr'@'localhost' IDENTIFIED VIA mysql_native_password USING 'sMoKN54EP7hoB4qH';

GRANT USAGE ON *.* TO 'prueba_backend_usr'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

GRANT ALL PRIVILEGES ON `prueba_backend`.* TO 'prueba_backend_usr'@'localhost';