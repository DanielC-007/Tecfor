create database conexao;
use conexao;

create table entrada(
codigo_usuario int NOT NULL AUTO_INCREMENT,
nome_usuario varchar(100),
senha_usuario varchar(100),
email_usuario varchar(100)
);

create table posts(
codigo_Complementares int NOT NULL AUTO_INCREMENT,
codigo_usuario int NOT NULL,
publicacao_usuario varchar(100),
comentarios_usuario varchar(200)
);

create table chats(
codigo_salas int NOT NULL AUTO_INCREMENT,
codigo_usuario int NOT NULL,
mensagens varchar(200)
);

/* INSERT INTO entrada (codigo_usuario, nome_usuario, senha_usuario, email_usuario) 
VALUES (1, 'Maísa', 'Maísa123$', 'maisa.souza32@etec.sp.gov.br'); */