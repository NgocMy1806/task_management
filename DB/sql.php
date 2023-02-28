create table users (
    id int AUTO_INCREMENT not null,
    name varchar(250),
    email varchar (250),
    password char (40),
    
    PRIMARY KEY (id)
    );


    ALTER TABLE tasks
ADD CONSTRAINT  
FOREIGN KEY (user_id) 
REFERENCES users (id);