create database wiki;

use wiki;

create table `users`
(
    `user_id`  int(11)      not null,
    `username` varchar(255) default null,
    `email`    varchar(255) not null,
    `password` text         not null,
    `image`    text         not null
);
