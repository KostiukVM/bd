create table student
(
    id      INTEGER AUTO_INCREMENT,
    name    varchar(255) NOT NULL ,
    surname varchar(255) NOT NULL ,
    age     int          NOT NULL,
    PRIMARY KEY (id)
);

create table faculty
(
    id   integer auto_increment,
    name varchar(255) not null,
    primary key (id)
);

create table sbuject
(
    id       int auto_increment
        primary key,
    name     varchar(255) not null,
    lecturer varchar(255) not null
);

create table mark
(
    id       int auto_increment
        primary key,
    point integer not null,
    student_id int not null,
    subject_id int not null,
    date timestamp not null
);

insert into student (name, surname, age) values ('Roma', 'Artyshevskyi', 16);
insert into student (name, surname, age) values ('Vadym', 'Kostiuk', 28);

insert into faculty (name) values ('law');
insert into faculty (name) values ('natural_sciences');
insert into faculty (name) values ('history');

insert into sbuject (name, lecturer) values ('physics', 'kostiuk');
insert into sbuject (name, lecturer) values ('chemistry', 'kostiuk');
insert into sbuject (name, lecturer) values ('astronomy', 'kostiuk');

insert into mark (point, student_id, subject_id) values (10, 1, 3);
insert into mark (point, student_id, subject_id) values (11, 1, 1);



