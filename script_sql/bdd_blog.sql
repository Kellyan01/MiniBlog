CREATE DATABASE blog;
USE blog;
CREATE TABLE users(
	id INT primary key auto_increment not null,
    last_name VARCHAR(50) not null,
    first_name VARCHAR(50) not null,
    email VARCHAR(50) not null unique,
    passwrd VARCHAR(150) not null
)engine=innoDB;
CREATE TABLE articles(
	id INT primary key auto_increment not null,
    title VARCHAR(250) not null,
    abstract VARCHAR(250) not null,
    content TEXT not null,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id)
)engine=innoDB;