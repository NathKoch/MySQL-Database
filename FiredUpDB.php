<?php

$server="localhost";// Server address with database
$user="root"; // Username 
$password=""; // User password
$dBase="FiredUp"; // Database name
$link = mysqli_connect($server,$user,$password); // Connection to the server

mysqli_select_db($link,$dBase); // Database selection
mysqli_query($link,"SET NAMES utf8"); // Setting up communication encoding
//         Creating tables
//CUSTOMER
mysqli_query($link,"CREATE TABLE Customer (customer_id INT NOT NULL AUTO_INCREMENT,
 cust_name  VARCHAR(30) NOT NULL , phone VARCHAR(25) NOT NULL ,
 email TINYTEXT NULL , PRIMARY KEY (customer_id)) ENGINE = InnoDB;");
//BURNER
mysqli_query($link,"CREATE TABLE Burner (burner_id INT NOT NULL AUTO_INCREMENT,
 type TINYTEXT NOT NULL , version TINYTEXT NOT NULL , prod_date DATE NOT NULL , 
 PRIMARY KEY (burner_id)) ENGINE = InnoDB;");
//REPAIR
mysqli_query($link,"CREATE TABLE Repair (id INT NOT NULL AUTO_INCREMENT, account_number TINYTEXT NOT NULL ,
 burner_id INT NOT NULL , repair_date DATE NOT NULL , description TEXT NOT NULL , 
 price INT NOT NULL, customer_id INT NOT NULL, PRIMARY KEY(id),
 FOREIGN KEY (burner_id) REFERENCES Burner (burner_id),
 FOREIGN KEY (customer_id) REFERENCES Customer (customer_id)) ENGINE = InnoDB;");
 //REGISTRATION
mysqli_query($link,"CREATE TABLE Registration (id INT NOT NULL AUTO_INCREMENT, customer_id INT NOT NULL ,
burner_id INT NOT NULL , reg_date DATE NOT NULL , PRIMARY KEY(id),
FOREIGN KEY (customer_id) REFERENCES Customer (customer_id),
FOREIGN KEY (burner_id) REFERENCES Burner (burner_id)) ENGINE = InnoDB;");

//   Filling out tables
//                          
mysqli_query($link,"INSERT INTO Customer (customer_id, cust_name, phone, email) 
VALUES (NULL, 'Dima', '5555555', 'dima@gmail.com'),(NULL, 'Anton', '11111111', 'anton@gmail.com'),
(NULL, 'John', '88888888', 'john@mail.com'),(NULL, 'Anna', '44444444', NULL),
(NULL, 'Nina', '22222222', NULL), (NULL, 'Sander', '77777777', 'sander@mail.com')");

mysqli_query($link,"INSERT INTO Burner (burner_id, type, version, prod_date) 
VALUES (NULL, 'FiredNow', 'AAA', '1999-02-21'), (NULL, 'FiredNow', 'BBB', '2000-02-28'),
(NULL, 'FiredNow', 'CCC', '2002-11-01'), 
(NULL, 'FiredAlways', 'DDD', '2000-12-30'), (NULL, 'FiredAlways', 'FFF', '2003-04-19'),
(NULL, 'FiredAtCamp', 'EEE', '2004-02-12'), (NULL, 'FiredAtCamp', 'GGG', '2000-09-18')");

mysqli_query($link,"INSERT INTO Registration (id, customer_id, burner_id, reg_date) 
VALUES (NULL, '1', '1', '2000-02-01' ), (NULL, '1', '4', '2001-07-12' ), (NULL, '2', '3', '2000-02-05' ), 
(NULL, '4', '6', '2001-02-03' ), (NULL,'6', '7', '2001-01-09' ), (NULL, '6', '2', '2000-09-09' )");

mysqli_query($link,"INSERT INTO Repair ( id, account_number, burner_id, repair_date, description, price, customer_id )
VALUES ( NULL, '1001200264', '1', '2000-02-26', 'Parts replacement', '51', '1'), ( NULL, '3001200230', '3', '2000-02-27', 'Parts replacement', '56', '2'), 
(NULL, '8009200284', '7', '2002-12-28', 'Parts replacement', '40', '6'), (NULL, '9001200235', '4', '2001-11-12', 'Parts replacement', '35', '1')");




?>