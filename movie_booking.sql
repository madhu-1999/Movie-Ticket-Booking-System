create database if not exists movie_booking;
use movie_booking;

drop table if exists movie_genre;
drop table if exists movies;

CREATE TABLE IF NOT EXISTS movies(
mid INT AUTO_INCREMENT,
mname VARCHAR(40) NOT NULL,
runtime TIME NOT NULL,
rating VARCHAR(3) NOT NULL,
release_date DATE NOT NULL,
image VARCHAR(100) NOT NULL,
trailer VARCHAR(100) NOT NULL,
synopsis TEXT NOT NULL,
lang varchar(20) NOT NULL,
PRIMARY KEY(mid)
);

CREATE TABLE IF NOT EXISTS movie_genre(
mid INT NOT NULL,
genre VARCHAR(20) NOT NULL,
FOREIGN KEY(mid) REFERENCES movies(mid)
);

insert into movies values(1,"Baaghi 3","022700","UA","2020-03-06","https://drive.google.com/uc?id=1r4uDjQ9kLn_1Xns7d34Y3PWXfkAfxNu8","https://drive.google.com/uc?id=15Rko2XJK98J9wzWtibRaWqpoyjVlaj1F","Ronnie and Vikram are brothers who share an unbreakable bond. Since childhood, Ronnie always come to the rescue whenever Vikram falls in any trouble. Their journey begins when a certain turn in events, leads Vikram to travel abroad to complete some work. On this trip, Vikram gets kidnapped by people who are not to be messed with but as Ronnie witnesses, his brother getting beaten and kidnapped, he knows that he will do whatever it takes to destroy anyone and anything that stands in the way of Vikram\'s safety. Ronnie goes on a rampage of destruction to see his brother safe again, even if it means that he independently has to take on an entire country.","Hindi");
insert into movie_genre values(1,"Action");
insert into movie_genre values(1,"Thriller");

insert into movies values(2,"Thappad","022200","U","2020-02-28","https://drive.google.com/uc?id=1GCo4ws6VoStFmdWuFsz-GFHlUcHU7WJi","https://drive.google.com/uc?id=1sVKsSDoef2oZRr-1G4b5swLzMQFpIRXk","Thappad is a story of a woman who decides to stand up for herself even if it means it's against her family, her husband and generations of mental conditioning. A slap forms the catalyst for her journey and a metaphor for the stories of many other women caught up in different versions of the same problem.","Hindi");
insert into movie_genre values(2,"Drama");

insert into movies values(3,"Shubh Mangal Zyada Savdhan","020000","UA","2020-02-21","https://drive.google.com/uc?id=1nG9oZx2oOeXgs-AHGhz4MpHrxW9chgcv","","Presenting the life of two gay men who are in love, Shubh Mangal Zyada Saavdhan depicts their struggle to convince their families to accept the relationship. But things are never as easy as they seem and one of the boy's family decides to get him married to a girl. Will their 'unconventional' love prevail?","Hindi");
insert into movie_genre values(3,"Comedy");
insert into movie_genre values(3,"Drama");
insert into movie_genre values(3,"Romance");

insert into movies values(4,"Onward","014200","U","2020-03-06","https://drive.google.com/uc?id=1VG9gMXLGx8Rmpmh2MeHt_ms724R_rotx","https://drive.google.com/uc?id=1D5cnsn6DAsdmYAWGr7AtV7MNP7K7yYrL","Set in a suburban fantasy world that has forgotten magic, two elf brothers receive a prearranged gift - a magic staff - from their father, who passed away many years ago. They try to use it to bring him back but end up conjuring only the lower half of his body. The two go on a quest in search of magic so they can bring all of him back, but they`ve only got 24 hours till the spell`s effect fades away.","English");
insert into movie_genre values(4,"Adventure");
insert into movie_genre values(4,"Comedy");
insert into movie_genre values(4,"Animation");

insert into movies values(5,"Little Women","021700","U","2020-02-07","https://drive.google.com/uc?id=1WxPGSTTeGUYwKCV8Dbkcv48H81BuR0Hy","https://drive.google.com/uc?id=1PUP0M3wrlwyLqrhGzAqTVLUVSWfFDjey","Writer-director Greta Gerwig (Lady Bird) has crafted a Little Women that draws on both the classic novel and the writings of Louisa May Alcott, and unfolds as the author's alter ego, Jo March, reflects back and forth on her fictional life. In Gerwig's take, the beloved story of the March sisters - four young women each determined to live life on her own terms - is both timeless and timely. Portraying Jo, Meg, Amy, and Beth March, the film stars Saoirse Ronan, Emma Watson, Florence Pugh, Eliza Scanlen, with Timothee Chalamet as their neighbor Laurie, Laura Dern as Marmee, and Meryl Streep as Aunt March.","English");
insert into movie_genre values(5,"Drama");
insert into movie_genre values(5,"Romance");

drop table if exists users;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL,
    security_ques VARCHAR(50) NOT NULL,
    security_ans VARCHAR(20) NOT NULL
);
insert into users(email,password,username,security_ques,security_ans) values ('abc@gmail.com','@sAp0123','Abhinav','What primary school did you attend?','Bishops');
insert into users(email,password,username,security_ques,security_ans) values ('xyz@gmail.com','@sAp0123','Karan','What primary school did you attend?','Bishops');
insert into users(email,password,username,security_ques,security_ans) values ('def@gmail.com','@sAp0123','Aashna','What primary school did you attend?','Bishops');
insert into users(email,password,username,security_ques,security_ans) values ('ghi@gmail.com','@sAp0123','Kriti','What primary school did you attend?','Bishops');
insert into users(email,password,username,security_ques,security_ans) values ('jkl@gmail.com','@sAp0123','Harun','What primary school did you attend?','Bishops');

drop table if exists showtimes;
CREATE TABLE showtimes (
sid INT PRIMARY KEY,
mid INT NOT NULL REFERENCES movies(mid),
theatre VARCHAR(50) NOT NULL,
show_date DATE NOT NULL,
show_time TIME NOT NULL,
status VARCHAR(20) NOT NULL
);

INSERT INTO `showtimes` (`sid`,`mid`,`theatre`,`show_date`,`show_time`,`status`) VALUES (1,5,"CiNExt-Pacific Mall","2020-12-05","06:39:08","Available"),(2,5,"CiNExt-Seasons Mall","2020-12-09","03:11:01","Available"),(3,5,"CiNExt-Pavillion Mall","2020-12-05","20:07:53","Available"),(4,5,"CiNExt-Pavillion Mall","2020-12-05","14:05:36","Available"),(5,5,"CiNExt-Pacific Mall","2020-12-07","07:35:39","Available"),(6,1,"CiNExt-Pacific Mall","2020-12-06","01:15:15","Available"),(7,1,"CiNExt-Pacific Mall","2020-12-08","05:45:52","Available"),(8,3,"CiNExt-Seasons Mall","2020-12-06","05:39:51","Available"),(9,3,"CiNExt-Pavillion Mall","2020-12-07","11:00:08","Available"),(10,2,"CiNExt-Bund Garden","2020-12-07","10:38:07","Available");
INSERT INTO `showtimes` (`sid`,`mid`,`theatre`,`show_date`,`show_time`,`status`) VALUES (11,3,"CiNExt-Pacific Mall","2020-12-06","13:06:54","Available"),(12,2,"CiNExt-Seasons Mall","2020-12-05","05:49:22","Available"),(13,5,"CiNExt-Pavillion Mall","2020-12-08","22:17:55","Available"),(14,2,"CiNExt-Pacific Mall","2020-12-06","13:54:53","Available"),(15,4,"CiNExt-Pacific Mall","2020-12-06","05:34:41","Available"),(16,3,"CiNExt-Bund Garden","2020-12-08","11:08:38","Available"),(17,4,"CiNExt-Bund Garden","2020-12-05","10:52:08","Available"),(18,4,"CiNExt-Pavillion Mall","2020-12-09","05:15:32","Available"),(19,4,"CiNExt-Pacific Mall","2020-12-05","20:58:52","Available"),(20,1,"CiNExt-Pacific Mall","2020-12-08","01:50:04","Available");
INSERT INTO `showtimes` (`sid`,`mid`,`theatre`,`show_date`,`show_time`,`status`) VALUES (21,2,"CiNExt-Pacific Mall","2020-12-05","11:23:50","Available"),(22,5,"CiNExt-Seasons Mall","2020-12-07","15:55:30","Available"),(23,5,"CiNExt-Bund Garden","2020-12-08","13:43:11","Available"),(24,5,"CiNExt-Pavillion Mall","2020-12-06","09:16:23","Available"),(25,5,"CiNExt-Bund Garden","2020-12-06","06:00:34","Available"),(26,4,"CiNExt-Pavillion Mall","2020-12-05","09:30:09","Available"),(27,2,"CiNExt-Pacific Mall","2020-12-09","19:00:50","Available"),(28,2,"CiNExt-Pacific Mall","2020-12-05","01:12:41","Available"),(29,1,"CiNExt-Seasons Mall","2020-12-09","15:28:27","Available"),(30,4,"CiNExt-Bund Garden","2020-12-07","17:03:19","Available");
INSERT INTO `showtimes` (`sid`,`mid`,`theatre`,`show_date`,`show_time`,`status`) VALUES (31,3,"CiNExt-Pacific Mall","2020-12-06","16:25:44","Available"),(32,2,"CiNExt-Pavillion Mall","2020-12-08","12:11:29","Available"),(33,4,"CiNExt-Seasons Mall","2020-12-06","20:33:11","Available"),(34,3,"CiNExt-Pacific Mall","2020-12-09","20:47:28","Available"),(35,4,"CiNExt-Pavillion Mall","2020-12-08","17:52:48","Available"),(36,3,"CiNExt-Pavillion Mall","2020-12-08","09:34:41","Available"),(37,3,"CiNExt-Seasons Mall","2020-12-09","13:09:13","Available"),(38,5,"CiNExt-Seasons Mall","2020-12-08","05:37:23","Available"),(39,3,"CiNExt-Seasons Mall","2020-12-08","18:24:55","Available"),(40,1,"CiNExt-Pavillion Mall","2020-12-09","21:42:15","Available");
INSERT INTO `showtimes` (`sid`,`mid`,`theatre`,`show_date`,`show_time`,`status`) VALUES (41,4,"CiNExt-Pavillion Mall","2020-12-07","01:07:01","Available"),(42,4,"CiNExt-Seasons Mall","2020-12-08","19:18:00","Available"),(43,5,"CiNExt-Pavillion Mall","2020-12-05","22:05:00","Available"),(44,3,"CiNExt-Pacific Mall","2020-12-05","04:42:07","Available"),(45,3,"CiNExt-Pacific Mall","2020-12-09","10:21:36","Available"),(46,4,"CiNExt-Seasons Mall","2020-12-09","00:42:05","Available"),(47,3,"CiNExt-Seasons Mall","2020-12-07","17:29:22","Available"),(48,1,"CiNExt-Pacific Mall","2020-12-05","08:18:58","Available"),(49,4,"CiNExt-Seasons Mall","2020-12-08","20:43:06","Available"),(50,1,"CiNExt-Bund Garden","2020-12-08","15:21:08","Available");

drop table if exists seat_type;
CREATE TABLE seat_type(
sid INT NOT NULL REFERENCES showtimes(sid),
type VARCHAR(20) NOT NULL,
price INT NOT NULL,
PRIMARY KEY(sid,type)
);

insert into seat_type values(1,'Platinum',300);
insert into seat_type values(1,'Gold',200);
insert into seat_type values(1,'Silver',150);
insert into seat_type values(2,'Platinum',500);
insert into seat_type values(2,'Gold',300);
insert into seat_type values(2,'Silver',250);
insert into seat_type values(3,'Platinum',500);
insert into seat_type values(3,'Gold',300);
insert into seat_type values(3,'Silver',250);
insert into seat_type values(4,'Platinum',500);
insert into seat_type values(4,'Gold',300);
insert into seat_type values(4,'Silver',250);
insert into seat_type values(5,'Platinum',500);
insert into seat_type values(5,'Gold',300);
insert into seat_type values(5,'Silver',250);

insert into seat_type values(6,'Platinum',500);
insert into seat_type values(6,'Gold',300);
insert into seat_type values(6,'Silver',250);
insert into seat_type values(7,'Platinum',500);
insert into seat_type values(7,'Gold',300);
insert into seat_type values(7,'Silver',250);
insert into seat_type values(8,'Platinum',500);
insert into seat_type values(8,'Gold',300);
insert into seat_type values(8,'Silver',250);
insert into seat_type values(9,'Platinum',500);
insert into seat_type values(9,'Gold',300);
insert into seat_type values(9,'Silver',250);
insert into seat_type values(10,'Platinum',500);
insert into seat_type values(10,'Gold',300);
insert into seat_type values(10,'Silver',250);
insert into seat_type values(11,'Platinum',500);
insert into seat_type values(11,'Gold',300);
insert into seat_type values(11,'Silver',250);
insert into seat_type values(12,'Platinum',500);
insert into seat_type values(12,'Gold',300);
insert into seat_type values(12,'Silver',250);
insert into seat_type values(13,'Platinum',500);
insert into seat_type values(13,'Gold',300);
insert into seat_type values(13,'Silver',250);
insert into seat_type values(14,'Platinum',500);
insert into seat_type values(14,'Gold',300);
insert into seat_type values(14,'Silver',250);
insert into seat_type values(15,'Platinum',500);
insert into seat_type values(15,'Gold',300);
insert into seat_type values(15,'Silver',250);
insert into seat_type values(16,'Platinum',500);
insert into seat_type values(16,'Gold',300);
insert into seat_type values(16,'Silver',250);
insert into seat_type values(17,'Platinum',500);
insert into seat_type values(17,'Gold',300);
insert into seat_type values(17,'Silver',250);
insert into seat_type values(18,'Platinum',500);
insert into seat_type values(18,'Gold',300);
insert into seat_type values(18,'Silver',250);
insert into seat_type values(19,'Platinum',500);
insert into seat_type values(19,'Gold',300);
insert into seat_type values(19,'Silver',250);
insert into seat_type values(20,'Platinum',500);
insert into seat_type values(20,'Gold',300);
insert into seat_type values(20,'Silver',250);
insert into seat_type values(21,'Platinum',500);
insert into seat_type values(21,'Gold',300);
insert into seat_type values(21,'Silver',250);
insert into seat_type values(22,'Platinum',500);
insert into seat_type values(22,'Gold',300);
insert into seat_type values(22,'Silver',250);
insert into seat_type values(23,'Platinum',500);
insert into seat_type values(23,'Gold',300);
insert into seat_type values(23,'Silver',250);
insert into seat_type values(24,'Platinum',500);
insert into seat_type values(24,'Gold',300);
insert into seat_type values(24,'Silver',250);
insert into seat_type values(25,'Platinum',500);
insert into seat_type values(25,'Gold',300);
insert into seat_type values(25,'Silver',250);
insert into seat_type values(26,'Platinum',500);
insert into seat_type values(26,'Gold',300);
insert into seat_type values(26,'Silver',250);
insert into seat_type values(27,'Platinum',500);
insert into seat_type values(27,'Gold',300);
insert into seat_type values(27,'Silver',250);
insert into seat_type values(28,'Platinum',500);
insert into seat_type values(28,'Gold',300);
insert into seat_type values(28,'Silver',250);
insert into seat_type values(29,'Platinum',500);
insert into seat_type values(29,'Gold',300);
insert into seat_type values(29,'Silver',250);
insert into seat_type values(30,'Platinum',500);
insert into seat_type values(30,'Gold',300);
insert into seat_type values(30,'Silver',250);
insert into seat_type values(31,'Platinum',500);
insert into seat_type values(31,'Gold',300);
insert into seat_type values(31,'Silver',250);
insert into seat_type values(32,'Platinum',500);
insert into seat_type values(32,'Gold',300);
insert into seat_type values(32,'Silver',250);
insert into seat_type values(33,'Platinum',500);
insert into seat_type values(33,'Gold',300);
insert into seat_type values(33,'Silver',250);
insert into seat_type values(34,'Platinum',500);
insert into seat_type values(34,'Gold',300);
insert into seat_type values(34,'Silver',250);
insert into seat_type values(35,'Platinum',500);
insert into seat_type values(35,'Gold',300);
insert into seat_type values(35,'Silver',250);
insert into seat_type values(36,'Platinum',500);
insert into seat_type values(36,'Gold',300);
insert into seat_type values(36,'Silver',250);
insert into seat_type values(37,'Platinum',500);
insert into seat_type values(37,'Gold',300);
insert into seat_type values(37,'Silver',250);
insert into seat_type values(38,'Platinum',500);
insert into seat_type values(38,'Gold',300);
insert into seat_type values(38,'Silver',250);
insert into seat_type values(39,'Platinum',500);
insert into seat_type values(39,'Gold',300);
insert into seat_type values(39,'Silver',250);
insert into seat_type values(40,'Platinum',500);
insert into seat_type values(40,'Gold',300);
insert into seat_type values(40,'Silver',250);
insert into seat_type values(41,'Platinum',500);
insert into seat_type values(41,'Gold',300);
insert into seat_type values(41,'Silver',250);
insert into seat_type values(42,'Platinum',500);
insert into seat_type values(42,'Gold',300);
insert into seat_type values(42,'Silver',250);
insert into seat_type values(43,'Platinum',500);
insert into seat_type values(43,'Gold',300);
insert into seat_type values(43,'Silver',250);
insert into seat_type values(44,'Platinum',500);
insert into seat_type values(44,'Gold',300);
insert into seat_type values(44,'Silver',250);
insert into seat_type values(45,'Platinum',500);
insert into seat_type values(45,'Gold',300);
insert into seat_type values(45,'Silver',250);
insert into seat_type values(46,'Platinum',500);
insert into seat_type values(46,'Gold',300);
insert into seat_type values(46,'Silver',250);
insert into seat_type values(47,'Platinum',450);
insert into seat_type values(47,'Gold',320);
insert into seat_type values(47,'Silver',200);
insert into seat_type values(48,'Platinum',550);
insert into seat_type values(48,'Gold',312);
insert into seat_type values(48,'Silver',250);
insert into seat_type values(49,'Platinum',500);
insert into seat_type values(49,'Gold',330);
insert into seat_type values(49,'Silver',250);
insert into seat_type values(50,'Platinum',450);
insert into seat_type values(50,'Gold',323);
insert into seat_type values(50,'Silver',150);

drop table if exists seat_reserved;
CREATE TABLE seat_reserved(
  row_no CHAR(1) NOT NULL,
  col_no INT NOT NULL,
  sid INT NOT NULL REFERENCES showtimes(sid),
  PRIMARY KEY (row_no, col_no, sid)
);

INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",15,35);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",8,44);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("C",3,45);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("C",15,12);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",8,35);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("C",17,27);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",13,4);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("H",10,12);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",16,32);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",5,18);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("A",11,37);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",15,6);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",10,14);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",8,5);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",1,8);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",5,24);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",6,34);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",17,24);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("A",10,10);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("I",10,33);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",6,16);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",7,27);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",2,50);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",7,42);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",1,24);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",12,23);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",9,47);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",2,22);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",16,45);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",17,49);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("I",7,35);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",6,1);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",8,4);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("C",1,45);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",9,1);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",7,24);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",10,3);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",16,9);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",6,31);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",11,15);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",10,11);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("A",5,9);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("A",12,1);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("A",1,13);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("A",12,23);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",9,13);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",12,49);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("I",10,16);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("H",54,15);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",7,35);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("I",9,33);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",5,13);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",8,27);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",8,1);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",13,36);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("I",9,44);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("H",7,9);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("H",55,17);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("H",5,32);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",3,8);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",16,11);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("H",55,50);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",13,30);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",17,21);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("C",16,2);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("H",8,37);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",12,23);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("I",11,7);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("I",5,12);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",7,31);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",12,4);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",5,20);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",17,9);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",13,29);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",11,48);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("A",12,41);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",16,29);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("A",11,31);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("H",10,29);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",10,19);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",15,26);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("C",1,8);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",17,10);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",15,30);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("I",10,17);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("F",3,47);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",5,19);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("C",11,8);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",6,48);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",8,15);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("I",9,11);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",1,20);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("B",10,17);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("A",12,4);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("C",12,21);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("C",10,23);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",7,47);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("E",7,32);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("D",15,44);
INSERT INTO `seat_reserved` (`row_no`,`col_no`,`sid`) VALUES ("G",12,16);


drop table if exists booking;
CREATE TABLE booking(
bid INT PRIMARY KEY AUTO_INCREMENT,
user_id INT REFERENCES users(id),
sid INT REFERENCES showtimes(sid),
price INT NOT NULL,
booked_time timestamp
);

