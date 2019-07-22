create database cms default charset utf8;

// ユーザがまだ作られていない場合は grant 文を実行する
grant all privileges on *.* to myuser@'%' identified by 'password' with grant option;

create table users(
  id int not null auto_increment primary key,
  name varchar(255) not null,
  login_id varchar(255) not null unique,
  password varchar(255) not null
);

create table authority(
  id int not null auto_increment primary key,
  name varchar(255) not null
);

create table users_authority(
  id int not null auto_increment primary key,
  authority_id int not null,
  users_id int not null
);

create table categorys(
  id int not null auto_increment primary key,
  name varchar(255)
);

create table contents(
  id int not null auto_increment primary key,
  title varchar(255) not null,
  up_date varchar(255) not null,
  content varchar(255) not null,
  category_id int not null,
  foreign key(category_id) references categorys(id)
);

insert into 
users_authority(authority_id, users_id)
 values (1, 1);

 select contents.content, contents.title
   from contents where id=1;