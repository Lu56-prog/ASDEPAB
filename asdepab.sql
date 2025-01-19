CREATE DATABASE asdepab;

USE asdepab;

CREATE TABLE egresados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    correo VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    direccion VARCHAR(255),
    passwordEgresado VARCHAR(255),
    graduacion DATE,
    titulo VARCHAR(255)
);

CREATE TABLE empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    nit VARCHAR(50) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    email VARCHAR(255),
    sector VARCHAR(255),
    empleados INT,
    passwordEmpresa VARCHAR(255)
)