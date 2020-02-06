SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
CREATE SCHEMA IF NOT EXISTS Hospital DEFAULT CHARACTER SET utf8 ;
USE  Hospital;
			CREATE TABLE IF NOT EXISTS Hospital.Facultad (
				idFacultad INT NOT NULL,				
				nombre VARCHAR (40) NOT NULL,				
						PRIMARY KEY (idFacultad)

)
			ENGINE = InnoDB;

			CREATE TABLE IF NOT EXISTS Hospital.Carrera (
				idCarrera INT NOT NULL,				
				nombre VARCHAR (40) NOT NULL,				
				idFacultad INT NOT NULL,				
						PRIMARY KEY (idCarrera),

				CONSTRAINT fk_Carrera_Facultad1
					FOREIGN KEY (idFacultad) 
					REFERENCES Hospital.Facultad (idFacultad)
					ON DELETE NO ACTION
    				ON UPDATE NO ACTION
)
			ENGINE = InnoDB;

			CREATE TABLE IF NOT EXISTS Hospital.Estudiante (
				idEstudiante VARCHAR (40) NOT NULL,				
				nombre VARCHAR (40) NOT NULL,				
				apellido VARCHAR (40) NOT NULL,				
				email VARCHAR (40) NOT NULL,				
				idCarrera INT NOT NULL,				
				esBecado Boolean NOT NULL,				
				edad INT NOT NULL,				
				fechanacimiento VARCHAR (40) NOT NULL,				
						PRIMARY KEY (idEstudiante),

				CONSTRAINT fk_Estudiante_Carrera1
					FOREIGN KEY (idCarrera) 
					REFERENCES Hospital.Carrera (idCarrera)
					ON DELETE NO ACTION
    				ON UPDATE NO ACTION
)
			ENGINE = InnoDB;
