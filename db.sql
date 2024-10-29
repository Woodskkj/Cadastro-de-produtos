create database produtos;

use produtos;

create table produtos(
    id int not null auto_increment primary key,
    name varchar(255) not null,
    price decimal (10,2) not null,
    description text
);