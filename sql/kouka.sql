-- データベースの削除命令　shopDBが存在した場合削除
DROP DATABASE IF EXISTS kouka2249580;

-- kouka2249580データベースの作成
CREATE DATABASE kouka2249580 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- ユーザ（DBのユーザ）を作成
-- GRANT all ON kouka2249580.* TO 'stuff'@'localhost' identified BY '';

-- kouka2249580データベースを選択
USE kouka2249580;

-- テーブルを作成
CREATE TABLE users (
    id int auto_increment primary key,
    name varchar(50) not null,
    email varchar(256) not null,
    login varchar(200) not null unique, -- uniqueあとづけ
    password varchar(100) not null,
    regdate datetime not null
);

CREATE TABLE profile (
	id int auto_increment primary key,
	users_id int not null,
	prof_img varchar(300),
	prof_comment varchar(500),
	foreign key(users_id) references users(id)
);

CREATE TABLE contact (
	id int auto_increment primary key,
	users_id int not null,
	class int not null,
	contents varchar(800),
	contact_date datetime not null,
	foreign key(users_id) references users(id)
);

create table product (
	id int auto_increment primary key, 
	name varchar(200) not null, 
	price int not null
);

create table purchase (
	id int not null primary key, 
	users_id int not null, 
	foreign key(users_id) references users(id)
);

create table purchase_detail (
	purchase_id int not null, 
	product_id int not null, 
	count int not null, 
	primary key(purchase_id, product_id), 
	foreign key(purchase_id) references purchase(id), 
	foreign key(product_id) references product(id)
);

create table favorite (
	users_id int not null, 
	product_id int not null, 
	primary key(users_id, product_id), 
	foreign key(users_id) references users(id), 
	foreign key(product_id) references product(id)
);

-- データを追加
INSERT INTO users VALUES(null, 'Sample', 'Sample00@XX.XX.jp', 'Sample00', '00Sample', '2022/07/22/ 15:30:00');
INSERT INTO users VALUES(null, 'Login', 'Login01@XX.XX.jp', 'Login01', '01Login', '2022/07/22/ 15:30:01');

insert into product values(null, '松の実', 700);
insert into product values(null, 'くるみ', 270);
insert into product values(null, 'ひまわりの種', 210);
insert into product values(null, 'アーモンド', 220);
insert into product values(null, 'カシューナッツ', 250);
insert into product values(null, 'ジャイアントコーン', 180);
insert into product values(null, 'ピスタチオ', 310);
insert into product values(null, 'マカダミアナッツ', 600);
insert into product values(null, 'かぼちゃの種', 180);
insert into product values(null, 'ピーナッツ', 150);
insert into product values(null, 'クコの実', 400);
