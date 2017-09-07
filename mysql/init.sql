drop database if exists `vnemliru`;

create database `vnemliru`
default character set = 'utf8'
default collate = 'utf8_general_ci';

create user 'vnemliru'@'localhost'
identified by 'passw0rd';

grant select, insert, update, delete, lock tables
on `vnemliru`.*
to 'vnemliru'@'localhost';