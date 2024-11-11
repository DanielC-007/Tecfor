create database conexaoTecfor;
use conexaoTecfor;

create table alunos(
id_aluno int not null auto_increment,
nome varchar(225),
email varchar(225),
senha_hash varchar(225),
foto_perfil VARCHAR(225),
primary key (id_aluno)
);

INSERT INTO alunos (nome, email, senha_hash) VALUES ('Teste', 'teste@gmail.com', '$2y$10$9cfejYyQzfGJxQ4eBwleT.4OQXuVVJ8hclqGQhbB6/o32YVB4LfGm');

CREATE TABLE arquivos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    path VARCHAR(100) NOT NULL,
    comentario TEXT,
    ip_selecionado VARCHAR(10),
    data_uploaded DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_aluno INT,
    titulo VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_aluno) REFERENCES alunos (id_aluno)
);