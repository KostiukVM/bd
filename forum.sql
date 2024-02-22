use chat;
create table users
(
    id       integer auto_increment,
    login    varchar(32)        not null,
    password varchar(255)       not null,
    admin    varchar(255),
    primary key (id)
);
create table posts
(
    id      int auto_increment,
    text    text      not null,
    date    datetime default CURRENT_TIMESTAMP not null,
    login   varchar(32) not null,
    constraint posts_pk
        primary key (id)
);
INSERT INTO chat.users (login, password, admin) VALUES ('vadim', 'qwe', 'yes');
INSERT INTO chat.users (login, password, admin) VALUES ('roma', '123', 'no');
INSERT INTO chat.posts (text, login) VALUES ('hi', 'vadim');

