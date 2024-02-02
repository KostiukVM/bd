use forum;

# create table users
    # (
    #     id       integer auto_increment,
    #     login    varchar(32)        not null,
    #     password varchar(255)       not null,
    #     admin    bool varchar(255),
    #     constraint users_pk
    #         primary key (id)
    # );
# create table posts
# (
#     id      int auto_increment,
#     text    text      not null,
#     date    datetime default CURRENT_TIMESTAMP not null,
#     login   varchar(32) not null,
#     constraint posts_pk
#         primary key (id)
# );
insert into users (login, password, admin) value ('vadim', 'qwe123', 'yes');
insert into users (login, password, admin) value ('roma', '123', 'no');
insert into posts (text, login) value ('Hi', 'Vadim' );