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

CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_arquivo INT NOT NULL,
    id_aluno INT NOT NULL,
    comentario TEXT NOT NULL,
    data_comentario DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_arquivo) REFERENCES arquivos(id),
    FOREIGN KEY (id_aluno) REFERENCES alunos(id_aluno)
);

INSERT INTO alunos (nome, email, senha_hash) VALUES ('Teste', 'teste@gmail.com', '$2y$10$9cfejYyQzfGJxQ4eBwleT.4OQXuVVJ8hclqGQhbB6/o32YVB4LfGm');