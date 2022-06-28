drop database school;
create database school;
use school;
create table students(
id int not null auto_increment,
name varchar(26) not null,
age int,
email varchar(26),
image varchar(255),
primary key (id)
);

#drop table students;

insert into students (name, age, email, image)
values
("student1", 25, "student1@gmail.com", 'https://i.insider.com/5cb8b133b8342c1b45130629?width=1300&format=jpeg&auto=webp'),
("student2", 42, "student2@gmail.com", 'https://www.masterclass.com/course-images/attachments/rBJAtj5pz7vfNYdcbNsjkHeE?width=400&height=400&fit=cover&dpr=2'),
("student3", 24, "student3@gmail.com", 'https://i.insider.com/61f14a0ce996470011907119?width=600&format=jpeg&auto=webp'),
("student4", 26, "student4@gmail.com", 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2RHj5aBArvQQQtkpqkJU3MzDrr2ji2rg00w&usqp=CAU');
select * from students;
 SELECT * FROM students Where name = "student1";
 #DELETE FROM students WHERE name = "yuda";
 SELECT * FROM students ORDER BY name DESC;