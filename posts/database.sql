CREATE DATABASE IF NOT EXISTS upload;

USE upload;

CREATE TABLE arquivos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    path VARCHAR(100) NOT NULL,
    comentario TEXT,
    ip_selecionado VARCHAR(10),
    data_uploaded DATETIME DEFAULT CURRENT_TIMESTAMP
);

drop table arquivos;