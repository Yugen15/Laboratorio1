create database lospioresnada;

use lospioresnada;

create table categorias
(
    idcategoria int auto_increment
        primary key,
    nombre  varchar(40) null,
    descripcion  varchar(40) null
);

create table productos
(
    idproducto int auto_increment
        primary key,
    idcategoria   int         null,
    nombre  varchar(40) null,
    costo double not null ,
    precio double not null ,
    stock int (10) null,
    constraint fk_producto_categoria
        foreign key (idcategoria) references categorias (idcategoria)
);