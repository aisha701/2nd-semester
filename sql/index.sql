create database 2302c2;
use 2302c2;

create table result(
id int primary key,
stdname varchar(40) not null,
age tinyint not null check(age >17),
percentage float not null,
city varchar(225) not null default"karachi"
);
select * from result;
insert into result values
(1,"arisha aslam",19,77,"karachi"),
(2,"aiisha aslam",18,76,"lahore"),
(3,"ashabl",19,76,"islamabad"),
(4,"areeba",21,81,"sukkur"),
(5,"aiman",20,45,"rawalpindi"),
(6,"dania",21,96,"karachi");

select city,stdname from result;
select distinct city from result;

drop table result;
truncate table result;

rename table result to res;
insert into res (id,age,percentage,stdname) values(7,20,76,"aisha");
select * from res;

alter table res modify stdname varchar(50) not null;
alter table res add country varchar(50) not null;
alter table res drop country;
alter table res change stdname sname varchar(50) not null;

update res
set country="pakistan",
city="karachi"
where percentage<80;

select * from res
where id=3 and percentage>60;

select * from res
where id=3 or percentage>60;

select * from res 
where percentage between 70 and 80;

select * from res where city in("karachi","lahore");
 select * from res where sname like"%a%";
 select * from res where sname like"%a%" order by percentage asc;
 
create table fees(
ID int primary key,
stdname varchar(50) not null,
city varchar(50) not null,
payment_method varchar(50) not null,
amount float not null
);
select * from fees;
insert into fees values
(1,"owais","daidu","paypal",25000), 
(2,"asher","hala","cash",10000), 
(3,"hasan","karachi","card",5000), 
(4,"ahsan","islamabad","paypal",42000), 
(5,"usama","karachi","card",42000);

select payment_method,avg(amount)  as avg_amount from fees
group  by payment_method; 

select payment_method,avg(amount) as avg_amount, count(id) as total_std from fees
group  by payment_method
having not payment_method="card";

create table city(
id int primary key,
cityname varchar(225) not null,
country varchar(225) not null
);
insert into city values
(1,"karachi","pakistan"),
(2,"lahore","pakistan"),
(3,"banglore","india"),
(4,"chennai","india"),
(5,"beijing","china");

select * from city;
create table details(
id int primary key auto_increment,
sname varchar(225) not null,
percent float not null,
city_id int,
foreign key(city_id) references city(id)
);

insert into details (sname,percent,city_id) values
("usama",56,1),
("owais",75,1),
("asher",68,2),
("ebad",80,3),
("hassan",65,4),
("harooon",90,null);

select * from details;
select d.id,d.sname,d.percent,c.cityname,c.country from details as d
inner join city as c
on d.city_id =c.id;

select d.id,d.sname,d.percent,c.cityname,c.country from details as d
left join city as c
on d.city_id =c.id;

select d.id,d.sname,d.percent,c.cityname,c.country from details as d
right join city as c
on d.city_id =c.id;

create table emp(
id int primary key,
ename varchar(225) not null,
salary int not null,
manager_id int
);
select * from emp;
insert into emp values
(1,"ayesha",40000,null),
(2,"arisha",32000,2),
(3,"aiman",22000,5),
(4,"dania",37000,4),
(5,"ashbal",29000,3);

select e1.id,e1.ename,e1.salary,e2.ename as manager_name  from emp as e1
join emp as e2
on e1.manager_id=e2.id;
