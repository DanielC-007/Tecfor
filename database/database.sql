create database conexao;
use conexao;

create table info_user(
id_user int NOT NULL AUTO_INCREMENT,
nome varchar(9999),
apelido varchar(9999),
senha varchar(9999),
email varchar(9999),
RM int(5),
primary key (id_user)
);

create table post_user(
id_post int not null auto_increment,
descricao varchar(9999),
curtidas_post int,
primary key (id_post)
);

create table comentarios(
id_coment int not null auto_increment,
comentario_user varchar(9999),
curtidas_coment int,
primary key (id_coment),
foreign key(id_user) references info_user(id_user),
foreign key(id_post) references post_user(id_post)
);

