create database conexaoTecfor;
use conexaoTecfor;

create table info_user(
id_user int NOT NULL AUTO_INCREMENT,
nome varchar(255),
apelido varchar(255),
senha varchar(255),
email varchar(255),
RM int(5),
curso varchar(100),
primary key (id_user)
);

CREATE TABLE imagens (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
imagem_path VARCHAR(255) NOT NULL,
comentario TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table comentarios(
id_coment int not null auto_increment,
comentario_user varchar(1000),
curtidas_coment int,
primary key (id_coment),
id_user int not null,
id_post int not null
-- foreign key(id_user) references info_user(id_user),
-- foreign key(id_post) references post_user(id_post)
);

create table alunos(
id_aluno int not null auto_increment,
nome varchar(225),
email varchar(225),
senha_hash varchar(225),
primary key (id_aluno)
);

INSERT INTO alunos (nome, email, senha_hash) VALUES ('Teste', 'teste@gmail.com', '$2y$10$9cfejYyQzfGJxQ4eBwleT.4OQXuVVJ8hclqGQhbB6/o32YVB4LfGm');