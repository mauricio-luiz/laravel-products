/*
Created		20/12/2016
Modified		20/12/2016
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/


drop table IF EXISTS categories;
drop table IF EXISTS products;
drop table IF EXISTS users;


Create table users (
	id Int NOT NULL AUTO_INCREMENT,
	full_name Varchar(80) NOT NULL,
	username Varchar(160) NOT NULL,
	email Varchar(120) NOT NULL,
	password Char(60) NOT NULL,
	remember_token Char(60),
	active Int NOT NULL,
	created_at Datetime,
	updated_at Datetime,
	UNIQUE (email),
 Primary Key (id)) ENGINE = InnoDB;

Create table products (
	product_id Int NOT NULL AUTO_INCREMENT,
	category_id Int NOT NULL,
	name Varchar(80) NOT NULL,
	price Decimal(6,2) NOT NULL,
	created_at Datetime,
	updated_at Datetime,
 Primary Key (product_id)) ENGINE = InnoDB;

Create table categories (
	category_id Int NOT NULL AUTO_INCREMENT,
	name Varchar(80) NOT NULL,
	created_at Datetime,
	updated_at Datetime,
 Primary Key (category_id)) ENGINE = InnoDB;


Alter table products add Foreign Key (category_id) references categories (category_id) on delete  restrict on update  restrict;


/* Users permissions */


