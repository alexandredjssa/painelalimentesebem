use siad03;

create table usuario(
	idUsuario int primary key auto_increment,
    Nome varchar(60) not null,
    Email varchar(60) not null,
    Senha varchar(16) not null,
    Idade int(3) not null,
    Peso decimal(3,1) not null,
    Altura decimal(3,1) not null
);
drop table usuario;
select * from usuario;
desc usuario;

create table alimentos(
	idAlimento int primary key auto_increment,
    Grupo int(2) not null,
    Nome varchar(45) not null,
    Imagem varchar(50) not null,
    Descricao varchar(10000) not null,
    Porcao decimal(4,1) not null,
    Peso decimal(4,1) not null,
    ImgTabela varchar(50) not null
);

INSERT INTO alimentos (Grupo, Nome, Imagem, Descricao, Porcao, ImgTabela) VALUES (02,"Alface","alface.jpeg", "Alface", 80.0 , "tabela_alface.png");

drop table alimentos;
select * from alimentos;
desc alimentos;

create table gadgets(
	idGadgets int primary key auto_increment,
    Nome varchar(45) not null,
    Imagem varchar(45) not null,
    Descricao varchar(10000) not null
);
drop table gadgets;
select * from gadgets;
desc gadgets;

create table adm(
	idAdm int primary key auto_increment,
    Nome varchar(45) not null,
    email varchar(45) not null,
    senha varchar(16) not null
);

select * from adm;


create table mensagem(
	idMsg int primary key auto_increment,
    nome varchar(45) not null,
    email varchar(45) not null,
    assunto varchar(45) not null,
    msg varchar(500) not null,
    dataMsg varchar(10),
	horaMsg varchar(5)
);