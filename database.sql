    DROP DATABASE IF EXISTS Calendar;

    CREATE DATABASE Calendar;

    USE Calendar;

	CREATE TABLE User(
	 	id INT AUTO_INCREMENT,
	 	name VARCHAR(255) UNIQUE NOT NULL,
		username VARCHAR(255) UNIQUE NOT NULL,
	 	password VARCHAR(255) NOT NULL,
	 	admin INT DEFAULT(0),
	 	PRIMARY KEY(id) 
	 	
	 );

    CREATE TABLE Schedule(
        id INT AUTO_INCREMENT,
		  year VARCHAR(255) NOT NULL,	
		  month INT NOT NULL,
		  day INT NOT NULL,
		  inithour VARCHAR(255) NOT NULL,
		  endhour VARCHAR(255) NOT NULL,
		  description MEDIUMTEXT,
		  expire DATETIME NOT NULL,
		  supervisor INT DEFAULT(1), 
        
        FOREIGN KEY(supervisor) REFERENCES User(id),
        PRIMARY KEY(id) 
    );
    
    INSERT INTO user (name, PASSWORD, admin, username) VALUES ('admin', '$2y$10$RKrzd0pqpJMyjaHNwlO97e/ZSR0vEpP532bzVGM8p4K.gLaGQILqq', 1, 'admin')