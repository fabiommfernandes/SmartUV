CREATE DATABASE IF NOT EXISTS DB_UV DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE DB_UV;

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS Utilizador;
DROP TABLE IF EXISTS Praia;
DROP TABLE IF EXISTS Sensor;
DROP TABLE IF EXISTS Dados;


CREATE TABLE Utilizador
(
 idUtilizador int Primary Key Auto_increment,
 nome_utilizador VarChar (30),
 password_utilizador VarChar (30),
 tipo VarChar(30),
 idPraiaUtilizador int,
 Index praia_indx(idPraiaUtilizador),
 Foreign Key (idPraiaUtilizador) REFERENCES Praia(idPraia)
);

CREATE TABLE Praia
(
    idPraia int Primary Key Auto_increment,
    nome_praia VarChar(30)
);

CREATE TABLE Sensor
(
    idSensor int Primary Key Auto_increment,
    nome_sensor VarChar(30),
    idDadosSensor int,
    Index dados_indx(idDadosSensor),
    Foreign Key (idDadosSensor) REFERENCES Dados(idDados),
    idSensorPraia int,
    Index sensor_indx(idSensorPraia),
    Foreign Key (idSensorPraia) REFERENCES Praia(idPraia)
);


CREATE TABLE Dados
(
  idDados int Primary Key Auto_increment, 
  idUV_Praia float ,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SET FOREIGN_KEY_CHECKS=1;



