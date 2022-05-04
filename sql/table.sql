CREATE TABLE students(
                         first_name VARCHAR(20) NOT NULL,
                         last_name VARCHAR(20) NOT NULL,
                         personal_id VARCHAR(11) NOT NULL PRIMARY KEY,
                         grade INT NOT NULL,
                         email VARCHAR(20) NOT NULL,
                         message VARCHAR(250) NULL
);