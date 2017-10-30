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
	INSERT into Department (dept_name) values ('Offshore & Coastal');
	INSERT into Department (dept_name) values ('General');

	/* Computer & Communications */
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('CC441', 'Analog Communication Theory', 'Mohamed Rizk', 3, 1);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('CC371', 'Analysis and Design of Algorithms', 'Amr Elmasry', 3, 1);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('CC373', 'Operating Systems', 'Ahmed Elsayed', 3, 1);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('CC471', 'Database systems', 'Yasser Fouad', 4, 1);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('CC489', 'Numerical Analysis', 'Amira Youssef', 3, 1);

	/* Electromechanics */
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('EME401', 'Thermal Power Plants', 'Mostafa Ahmed', 3, 2);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('EME403', 'Fluid Machinery', 'Ahmed Mohamed', 3, 2);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('EME402', 'Internal Combusion Engines', 'Mohamed Zaatout', 3, 2);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('EME406', 'Electromechanical Drives', 'Khaled Abdelsalam', 3, 2);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('EME304', 'Mechanical Vibrations', 'Adel Elfahhar', 3, 2);

	/* Gas & Petrochemicals */
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('GPE413', 'Corrosion Engineering', 'Ibrahim Zaatout', 3, 3);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('GPE421', 'Kinetics and Reactions Engineering', 'Nahla Mahmoud', 4, 3);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('GPE423', 'Petroleum Refining Engineering', 'Mostafa Magdy', 3, 3);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('GPE426', 'Modeling and Simulation', 'Sherif Rabiaa', 3, 3);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('GPE422', 'Petrochemical Industries', 'Noha Abdo', 3, 3);

	/* Construction & Architecture */
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('CAE405', 'Design Studio-3', 'Nagwa Elsayed', 3, 4);	
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('CAE401', 'Design of R.C Structured-1', 'Abdelaziz Konsoa', 3, 4);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('CAE406', 'Theory of Architecture-1', 'Wael Ahmed', 3, 4);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('CAE310', 'Soil Mechanics', 'Ibrahim Maarouf', 3, 4);

	/* Offshore & Coastal */
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('OCE213', 'Marine Hydraulics', 'Mostafa Arafa', 3, 5);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('OCE311', 'Water Wave Theory', 'Mahmoud Meshref', 3, 5);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('OCE511', 'Design of Offshore Platforms', 'Ahmed Ashraf', 3, 5);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('OCE301', 'Marine Foundations', 'Noha Mohamed', 4, 5);

	/* General */
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS402a', 'Foundations of Marketing', 'Nevine', 2, 6);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS302d', 'Accounting', 'Haybat', 2, 6);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS101', 'English Language', 'Maha Hegazy', 2, 6);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS102', 'Human Rights', 'Nehal', 1, 6);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS402a', 'History of Engineering Sciences', 'Nehal', 1, 6);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS301', 'Project Management', 'Remon Fayek', 2, 6);
	INSERT into Course (course_code, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS201', 'Technical Writing', 'Ahmed Emad', 2, 6);
