CREATE TABLE author (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  profile VARCHAR(200) NULL,
  PRIMARY KEY(id)
 );
 
 DESC author;
 
 INSERT INTO author (name, profile) VALUES ('egoing', 'Developer');
 INSERT INTO author (name, profile) VALUES ('duru', 'DBA');
 INSERT INTO author (name, profile) VALUES ('taeho', 'Data Scientis');
