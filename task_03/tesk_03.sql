-- 1.
select name from user where name like 'Kis%' and id NOT IN (select user from user_car group by user);
-- 2.
select name from user_car inner join user on user_car.user = user.id group by user having COUNT(*) >= 2;
-- 2.1
select name,  GROUP_CONCAT(CONCAT_WS(' ',brand, model) separator ',') as car
from user_car
inner join user on user_car.user = user.id 
inner join car on user_car.car = car.id 
group by user having COUNT(*) >= 2;
-- 3.
ALTER TABLE user ADD gender VARCHAR(10);
ALTER TABLE user ADD id_number int(10);
-- 4.
INSERT INTO car (brand, model) values ('Volkswagen', 'Arteon');
-- 5 
SET SQL_SAFE_UPDATES = 0;
UPDATE car SET model = 'Fiesta' WHERE model = 'Focus';
-- 6 
insert into user_car 
select u.id user, c.id car 
from user u 
left join car c 
on c.brand = 'volkswagen' 
and c.model = 'arteon' 
where (upper(u.name) like '%O%' or upper(u.name) like '%R%') and u.id < 10;
-- 7 
ALTER TABLE user_car ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY;