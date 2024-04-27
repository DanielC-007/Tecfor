/*create database alunos;*/
use alunos;
create table infoAlunos(
nome char not null,
dataNascimento date not null,
curso char not null,
RM int not null,
codEtec int(3) not null,
emailInstitucional char not null
);