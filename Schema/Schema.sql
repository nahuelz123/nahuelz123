CREATE DATABASE company;

USE company;

CREATE TABLE company
(
    id_company int auto AUTO_INCREMENT not null,
   CompanyName VARCHAR(50)NOT NULL,
   BusinessName VARCHAR(50)NOT NULL,
   CompanyAdress VARCHAR(100)NOT NULL,
   cuil FLOAT not null,
   telephone int not null,
   email VARCHAR(50)NOT NULL,
   web VARCHAR(50)NOT NULL,
constraint id_company PRIMARY KEY(id_company),
constraint unq_cuil UNIQUE (cuil),
constraint unq_name UNIQUE (CompanyName)
);


CREATE TABLE job(
    jobPositionId INT  NOT NULL,
   careerId INT NOT NULL,
    DESCRIPTION VARCHAR (100) NOT NULL,
    CONSTRAINT pk_jobPosition PRIMARY KEY (jobPositionId),
    CONSTRAINT fk_careerId FOREIGN KEY (careerId) REFERENCES career(careerId)
   
);

CREATE TABLE career(careerId INT  NOT NULL,
    DESCRIPTION VARCHAR (100) NOT NULL,
    activo BOOL CHECK(activo IN(TRUE,FALSE)),
    CONSTRAINT pk_careerId PRIMARY KEY (careerId)
);

CREATE TABLE student(
studentId INT  NOT NULL,
careerId INT NOT NULL,
firstName VARCHAR(50)NOT NULL,
lastName VARCHAR(50)NOT NULL,
dni VARCHAR(50) NOT NULL,
fileNumber VARCHAR(50) NOT NULL,
gender  VARCHAR(50)NOT NULL,
birthDate  DATE,
email   VARCHAR(100)NOT NULL,
phoneNumber VARCHAR(50)NOT NULL,
activo BOOL CHECK(activo IN(TRUE,FALSE)),
PASSWORD VARCHAR(50)NOT NULL,
CONSTRAINT pk_studentId PRIMARY KEY (studentId),
CONSTRAINT unq_dni UNIQUE(dni),
CONSTRAINT unq_email UNIQUE(email),
CONSTRAINT unq_fileNumber UNIQUE(fileNumber),
CONSTRAINT fk_career FOREIGN KEY (careerId) REFERENCES career(careerId)
);


CREATE TABLE useadmin(email VARCHAR (100)NOT NULL,
PASSWORD VARCHAR (50)NOT NULL,
CONSTRAINT pk_email PRIMARY KEY(email)
);


CREATE TABLE job_ofert (

  id_JobOfert INT AUTO_INCREMENT NOT NULL,
  id_company INT NOT NULL,
  jobPositionId INT NOT NULL,
  cargaHoraria INT NOT NULL,
  activo  BOOL CHECK(activo IN(TRUE,FALSE)), 
titulo VARCHAR(100) NOT NULL,
  descripcion VARCHAR (200) NOT NULL,
   CONSTRAINT pk_id_JobOfert PRIMARY KEY (id_JobOfert),
    CONSTRAINT fk_id_compan FOREIGN KEY (id_company) REFERENCES company (id_company),
    CONSTRAINT fk_id_jobPosition FOREIGN KEY (jobPositionId) REFERENCES job(jobPositionId)
);
