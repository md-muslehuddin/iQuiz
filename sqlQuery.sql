/* Database Creation */
CREATE DATABASE iquiz;



/* Table Creation */
CREATE TABLE usersInfo (
    `SI No` INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    `Date Of Birth` DATE NOT NULL,
    Contact BIGINT(10) NOT NULL,
    Username VARCHAR(100) NOT NULL,
    Password VARCHAR(100) NOT NULL,
    Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


