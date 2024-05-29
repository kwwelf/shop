db tables 

create table registration

(
    id       serial
        constraint users_pk
            primary key,
    name varchar;
    fio      varchar,
    login    varchar not null,
    username varchar not null,
    password varchar not null,
    is_admin boolean default false
);

create table trending
  id       serial
        constraint users_pk
            primary key,
    id  integer not null;
    image      varchar,
    followers    varchar not null,
   );
