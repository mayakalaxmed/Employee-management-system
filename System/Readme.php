Employee Management System

    

Create DATABASE
CREATE DATABASE ems_db;
USE ems_db;
CREATE TABLE admin (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),
password VARCHAR(50)
);
INSERT INTO admin (username, password) VALUES ('admin','123');
CREATE TABLE employees (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
description VARCHAR(100),
status VARCHAR(20)
);




Username:admin
Password:1234


project Structure


db_connect.php
 login.php
 login_process.php
logout.php
 index.php
 sidebar.php
add.php
 save.php
 view.php
update.php
update_process.php
delete.php
 search.php
 README.md
