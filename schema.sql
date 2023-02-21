create table php_mvc.userDetails
(
    firstname    varchar(255)                          not null,
    lastname     varchar(255)                          not null,
    jobTitle     varchar(255)                          not null,
    profileImage mediumblob                            null,
    dob          date      default '1900-01-01'        null,
    phoneNumber  varchar(20)                           not null,
    created_at   timestamp default current_timestamp() not null,
    username     varchar(255)                          not null
        primary key,
    address      varchar(255)                          null
);

create table php_mvc.users
(
    id         int auto_increment
        primary key,
    email      varchar(255)                          not null,
    username   varchar(255)                          not null,
    created_at timestamp default current_timestamp() not null,
    password   varchar(512)                          not null
)
    auto_increment = 6;

