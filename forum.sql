use forum;

# create table users
    # (
          #     id       integer auto_increment,
          #     login    varchar(32)        not null,
    #     password varchar(255)       not null,
    #     admin    bool default false not null,
    #     constraint users_pk
    #         primary key (id)
    # );
create table posts
(
    id      int auto_increment,
    text    text      not null,
    date    timestamp null,
    user_id int       not null,
    constraint posts_pk
        primary key (id)
);
