create database litlleEcomerce;
use database litlleEcomerce;
create table ingredientes(
ing_codigo int primary key AUTO_INCREMENT,
ing_nome varchar(256)
);
create table lanches(
lan_codigo int primary key AUTO_INCREMENT,
lan_nome varchar(256),
lan_preco int
);
create table lancheCompleto(
lc_codigo int PRIMARY key AUTO_INCREMENT,
lan_codigo int,
ing_codigo int,
    FOREIGN key(lan_codigo) REFERENCES lanches(lan_codigo),
    FOREIGN key(ing_codigo) REFERENCES ingredientes(ing_codigo)
);
