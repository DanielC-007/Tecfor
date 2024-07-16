create database conexao;
use conexao;

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

create table post_user(
id_post int not null auto_increment,
descricao varchar(1000),
curtidas_post int,
primary key (id_post)
);



create table comentarios(
id_coment int not null auto_increment,
comentario_user varchar(1000),
curtidas_coment int,
primary key (id_coment),
id_user int not null,
id_post int not null,
foreign key(id_user) references info_user(id_user),
foreign key(id_post) references post_user(id_post)
);

create table alunos(
id_aluno int not null auto_increment,
nome varchar(225),
email varchar(225),
senha_hash varchar(225),
primary key (id_aluno)
);

/* create table chats(
); */
