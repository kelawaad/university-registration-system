create DATABASE registrationSystem ;
use registrationSystem;

	Create Table Department(
		dept_id int Auto_Increment,
		dept_name varchar(50) unique not null,
		PRIMARY key(dept_id)
	);

	Create Table User(
		user_id int Auto_Increment,
		username varchar(20) unique not null,
		password varchar(50) not null,
		email varchar(30) unique not null,
		dept_id int,
		PRIMARY key(user_id),
		Foreign key(dept_id) REFERENCES Department(dept_id)
	);

	Create Table Course(
		course_code varchar(10) unique not null,
		course_name varchar(50) not null,
		instructor_name varchar(30) not null,
		credit_hours int not null,
		dept_id int,
		PRIMARY key(course_code),
		Foreign key(dept_id) REFERENCES Department(dept_id)
	);
	
	INSERT into Department (dept_name) values ('Computer & Communications');
	INSERT into Department (dept_name) values ('Electromechanics');
	INSERT into Department (dept_name) values ('Oil & Petrochemicals');
	INSERT into Department (dept_name) values ('Construction & Architecture');
	INSERT into Department (dept_name) values ('Offshore');