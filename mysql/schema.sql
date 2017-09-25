use `vnemliru`;

drop table if exists `users`;
create table `users` (
	`id` int unsigned not null auto_increment,
	`login` varchar(255) binary not null,
	`loginHash` binary(16) not null comment 'raw md5',
	`passwordHash` binary(64) not null comment 'raw sha512',
	`data` varchar(255) not null comment 'JSON, данные пользователя',
	`roles` varchar(255) not null comment 'CSV, роли пользователя',
	`active` bool not null,
	primary key (`id`),
	unique key `loginHash` (`loginHash`)
)
engine InnoDB
comment 'Пользователи';

drop table if exists `articles`;
create table `articles` (
	`id` int unsigned not null auto_increment,
	`src` text not null comment 'исходник',
	`html` text not null comment 'сгенерённый html',
	`ct` int unsigned not null comment 'timestamp, время создания',
	primary key (`id`)
)
engine InnoDB
comment 'Статьи';