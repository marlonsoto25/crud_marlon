CREATE DATABASE sena_bd;
USE sena_bd;
CREATE TABLE usuarios(
    usua_id INT(10)PRIMARY KEY,
    usua_nomuser CHAR(50),
    usua_contra CHAR(20),
    usua_tipo CHAR(30)
);
CREATE TABLE tiposprograma(
    tiposp_id INT(10) PRIMARY KEY,
    tiposp_tipo CHAR(30)
);
CREATE TABLE programa(
    progra_id INT(10),
    progra_nombre CHAR(20),
    progra_tipo INT(5),
    CONSTRAINT PK_PROGRAMA PRIMARY KEY (progra_id),
    CONSTRAINT FK_TIPOSPROGRAMA FOREIGN KEY (progra_tipo) REFERENCES tiposprograma(tiposp_id)
);
CREATE TABLE fichas(
    ficha_numero INT(10),
    ficha_progra INT(10),
    CONSTRAINT PK_FICHAS PRIMARY KEY (ficha_numero),
    CONSTRAINT FK_PROGRAMA FOREIGN KEY (ficha_progra) REFERENCES programa(progra_id)
);
CREATE TABLE aprendices(
    apre_id INT(10),
    apre_tipoid CHAR(3),
    apre_numid CHAR(20),
    apre_nombres CHAR(60),
    apre_apellidos CHAR(60),
    apre_direccion CHAR(80),
    apre_telefono CHAR(20),
    apre_ficha INT (10),
    CONSTRAINT PK_APRENDICES PRIMARY KEY (apre_id),
    CONSTRAINT FK_FICHAS FOREIGN KEY (apre_ficha) REFERENCES fichas(ficha_numero)
);

INSERT INTO usuarios VALUES (123,'ADMIN',12345,'ADMINISTRADOR');

CREATE TABLE programa(
    progra_id INT(10), AUTO_INCREMENT

CREATE TABLE aprendices(
    apre_id INT(10), AUTO_INCREMENT

