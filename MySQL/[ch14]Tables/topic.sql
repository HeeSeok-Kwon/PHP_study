ALTER TABLE topic ADD COLUMN author_id INT(11);

DESC topic;

UPDATE topic SET author_id = 1 WHERE id = 2;
UPDATE topic SET author_id = 1 WHERE id = 4;
UPDATE topic SET author_id = 2 WHERE id = 5;
UPDATE topic SET author_id = 3 WHERE id = 6;
UPDATE topic SET author_id = 1 WHERE id = 8;
UPDATE topic SET author_id = 1 WHERE id = 11;
