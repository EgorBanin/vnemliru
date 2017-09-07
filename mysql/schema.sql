use `vnemliru`;

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