create database horizon_rental_car; /* creating database*/
use horizon_rental_car;

/*--------REGISTRATION_TABLE----------------------------------------------------------------------------------------------------------------------*/

/* Creating Registration Table */
CREATE TABLE horizon_signup (
  signup_id int(50) auto_increment NOT NULL,
  signup_name varchar(120) NOT NULL,
  signup_email varchar(120) NOT NULL,
  signup_birthdate varchar(50) NOT NULL,
  signup_mobile varchar(15) NOT NULL,
  signup_password varchar(50) NOT NULL,
  Primary key(signup_id)
);

/* Insert query in Registration */
INSERT INTO horizon_signup (signup_id, signup_name, signup_email, signup_birthdate, signup_mobile, signup_password) VALUES
(1, "Raj Prajapati", "rp5876907@gmail.com", "2001-02-14", "0000000000", "Abc_1234567890");


/*--------ADMIN_TABLE----------------------------------------------------------------------------------------------------------------------------*/

/* Creating Admin Table */
CREATE TABLE boss_admin (
  admin_id int(50) auto_increment NOT NULL,
  admin_email varchar(120) NOT NULL,
  admin_password varchar(20) NOT NULL,
  Primary key(admin_id)
);

/* Insert query in Admin */
INSERT INTO boss_admin (admin_id, admin_email, admin_password) VALUES
(1, "raj_admin", "admin_18110");


/*--------PRODUCTS_TABLE-------------------------------------------------------------------------------------------------------------------------*/

/* Creating Product as Cars List Table */
CREATE TABLE products (
  product_id int(50) auto_increment NOT NULL,
  product_icon varchar(200) NOT NULL,
  product_name varchar(100) NOT NULL,
  product_rate varchar(5) NOT NULL,
  product_price varchar(20) NOT NULL,
  Primary key(product_id)
);

/* Insert query in Products */
INSERT INTO products (product_id, product_icon, product_name, product_rate, product_price) VALUES
(1, "../../images/cars_on_rent/Acura_MDX-car_image.png", "Acura MDX", "3", "2,500"),
(2, "../../images/cars_on_rent/Audi_S4-car_image.png", "Audi S4", "4.5", "3,800"),
(3, "../../images/cars_on_rent/Jeep_Neon-car_image.png", "Jeep Neon", "5", "7,500"),
(4, "../../images/cars_on_rent/Subaru_WRX_STI-car_image.png", "Subaru WRX", "2.5", "2,300"),
(5, "../../images/cars_on_rent/Audi_LSD-car_image.png", "Acura LSD", "4", "9,200"),
(6, "../../images/cars_on_rent/Chevrolet_Camaro-car_image.png", "Chevrolet", "4.5", "6,100"),
(7, "../../images/cars_on_rent/BMW_i8-car_image.png", "BMW i8", "5", "12,500"),
(8, "../../images/cars_on_rent/Bugatti_Veyron_blue-car_image.png", "Bugatti", "5", "18,900");


/*End of Programing*/
/* Created by Raj using SQL on 22nd September 2023 / Friday */
