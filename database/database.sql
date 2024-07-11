create database conexao;
use conexao;

create table info_user(
id_user int NOT NULL AUTO_INCREMENT,
nome varchar(10000),
apelido varchar(10000),
senha varchar(10000),
email varchar(10000),
RM int(5),
curso varchar(100),
primary key (id_user)
);

create table post_user(
id_post int not null auto_increment,
descricao varchar(10000),
curtidas_post int,
primary key (id_post)
);

create table comentarios(
id_coment int not null auto_increment,
comentario_user varchar(10000),
curtidas_coment int,
primary key (id_coment),
foreign key(id_user) references info_user(id_user),
foreign key(id_post) references post_user(id_post)
);

/* create table chats(
); */