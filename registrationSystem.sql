create DATABASE registrationSystem ;
use registrationSystem;

	Create Table Department(
		dept_id int Auto_Increment,
		dept_name varchar(50) unique not null,
		description varchar(50),
		PRIMARY key(dept_id)
	);

	Create Table User(
		user_id int Auto_Increment,
		username varchar(20) not null,
		password varchar(200) not null,
		registration_date timestamp,
		dept_id int,
		PRIMARY key(user_id),
		Foreign key(dept_id) REFERENCES Department(dept_id)
	);

	Create Table Course(
		course_id int Auto_Increment,
		course_name varchar(30) not null,
		course_description varchar(50) not null,
		instructor_name varchar(30) not null,
		credit_hours int not null,
		dept_id int,
		PRIMARY key(course_id),
		Foreign key(dept_id) REFERENCES Department(dept_id)
	);
	
	INSERT into Department (dept_name) values ("Computer & Communications");
	INSERT into Department (dept_name) values ("Electromechanics");
	INSERT into Department (dept_name) values ("Oil & Petrochemicals");
	INSERT into Department (dept_name) values ("Construction & Architecture");
	INSERT into Department (dept_name) values ("Offshore");