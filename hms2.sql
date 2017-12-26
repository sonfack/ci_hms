SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `hms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `hms` ;

-- -----------------------------------------------------
-- Table `hms`.`marital_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`marital_status` ;

CREATE  TABLE IF NOT EXISTS `hms`.`marital_status` (
  `marital_status_id` INT NOT NULL AUTO_INCREMENT ,
  `marital_status` VARCHAR(45) NULL ,
  `marital_status_status` TINYINT NULL DEFAULT 0 ,
  PRIMARY KEY (`marital_status_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`patient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`patient` ;

CREATE  TABLE IF NOT EXISTS `hms`.`patient` (
  `patient_id` INT NOT NULL AUTO_INCREMENT ,
  `patient_status` TINYINT NULL ,
  `patient_first_name` VARCHAR(45) NULL ,
  `patient_last_name` VARCHAR(45) NULL ,
  `patient_birth` DATE NULL ,
  `patient_sexe` VARCHAR(1) NULL ,
  `patient_email` VARCHAR(45) NULL ,
  `patient_phone` VARCHAR(45) NULL ,
  `patient_matricul` VARCHAR(100) NULL ,
  `patient_create_date` TIMESTAMP NULL ,
  `patient_modify_date` TIMESTAMP NULL DEFAULT NULL ,
  `patient_address` TEXT NULL ,
  `marital_status_id` INT NOT NULL ,
  PRIMARY KEY (`patient_id`) ,
  INDEX `fk_patient_marital_status1` (`marital_status_id` ASC) ,
  CONSTRAINT `fk_patient_marital_status1`
    FOREIGN KEY (`marital_status_id` )
    REFERENCES `hms`.`marital_status` (`marital_status_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`patient_relative`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`patient_relative` ;

CREATE  TABLE IF NOT EXISTS `hms`.`patient_relative` (
  `patient_relative_id` INT NOT NULL AUTO_INCREMENT ,
  `patient_relative_name` VARCHAR(45) NULL ,
  `patient_relative_phone` VARCHAR(45) NULL ,
  `patient_relative_address` TEXT NULL ,
  `patient_relative_status` TINYINT NULL ,
  PRIMARY KEY (`patient_relative_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`patient_has_patient_relative`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`patient_has_patient_relative` ;

CREATE  TABLE IF NOT EXISTS `hms`.`patient_has_patient_relative` (
  `patient_id` INT NOT NULL ,
  `patient_relative_id` INT NOT NULL ,
  PRIMARY KEY (`patient_id`, `patient_relative_id`) ,
  INDEX `fk_patient_has_patient_relative_patient_relative` (`patient_relative_id` ASC) ,
  INDEX `fk_patient_has_patient_relative_patient` (`patient_id` ASC) ,
  CONSTRAINT `fk_patient_has_patient_relative_patient`
    FOREIGN KEY (`patient_id` )
    REFERENCES `hms`.`patient` (`patient_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_patient_has_patient_relative_patient_relative`
    FOREIGN KEY (`patient_relative_id` )
    REFERENCES `hms`.`patient_relative` (`patient_relative_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
PACK_KEYS = DEFAULT;


-- -----------------------------------------------------
-- Table `hms`.`functionalities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`functionalities` ;

CREATE  TABLE IF NOT EXISTS `hms`.`functionalities` (
  `functionalities_id` INT NOT NULL AUTO_INCREMENT ,
  `functionalities_name` VARCHAR(45) NULL ,
  `functionalities_description` TEXT NULL ,
  `functionalities_status` TINYINT NULL ,
  `functionalities_functionalities_id` INT NOT NULL ,
  PRIMARY KEY (`functionalities_id`) ,
  INDEX `fk_functionalities_functionalities1` (`functionalities_functionalities_id` ASC) ,
  CONSTRAINT `fk_functionalities_functionalities1`
    FOREIGN KEY (`functionalities_functionalities_id` )
    REFERENCES `hms`.`functionalities` (`functionalities_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`type_background`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`type_background` ;

CREATE  TABLE IF NOT EXISTS `hms`.`type_background` (
  `type_background_id` INT NOT NULL AUTO_INCREMENT ,
  `type_background_name` VARCHAR(45) NULL ,
  `type_background_description` TEXT NULL ,
  `type_background_status` TINYINT NULL ,
  PRIMARY KEY (`type_background_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`medical_background`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`medical_background` ;

CREATE  TABLE IF NOT EXISTS `hms`.`medical_background` (
  `medical_background_id` INT NOT NULL AUTO_INCREMENT ,
  `medical_background` TEXT NULL ,
  `medical_background_description` TEXT NULL ,
  `medical_background_status` TINYINT NULL ,
  `type_background_id` INT NOT NULL ,
  PRIMARY KEY (`medical_background_id`) ,
  INDEX `fk_medical_background_type_background1` (`type_background_id` ASC) ,
  CONSTRAINT `fk_medical_background_type_background1`
    FOREIGN KEY (`type_background_id` )
    REFERENCES `hms`.`type_background` (`type_background_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`medical_background_has_patient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`medical_background_has_patient` ;

CREATE  TABLE IF NOT EXISTS `hms`.`medical_background_has_patient` (
  `medical_background_id` INT NOT NULL ,
  `patient_id` INT NOT NULL ,
  PRIMARY KEY (`medical_background_id`, `patient_id`) ,
  INDEX `fk_medical_background_has_patient_patient1` (`patient_id` ASC) ,
  INDEX `fk_medical_background_has_patient_medical_background1` (`medical_background_id` ASC) ,
  CONSTRAINT `fk_medical_background_has_patient_medical_background1`
    FOREIGN KEY (`medical_background_id` )
    REFERENCES `hms`.`medical_background` (`medical_background_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_medical_background_has_patient_patient1`
    FOREIGN KEY (`patient_id` )
    REFERENCES `hms`.`patient` (`patient_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`health_personnel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`health_personnel` ;

CREATE  TABLE IF NOT EXISTS `hms`.`health_personnel` (
  `health_personnel_id` INT NOT NULL AUTO_INCREMENT ,
  `health_personnel_name` VARCHAR(45) NULL ,
  `health_personnel_phone` VARCHAR(45) NULL ,
  `health_personnel_address` TEXT NULL ,
  `health_personnel_status` TINYINT NULL ,
  PRIMARY KEY (`health_personnel_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`patient_parameter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`patient_parameter` ;

CREATE  TABLE IF NOT EXISTS `hms`.`patient_parameter` (
  `patient_parameter_id` INT NOT NULL AUTO_INCREMENT ,
  `patient_parameter_height` INT NULL ,
  `patient_parameter_weight` FLOAT NULL ,
  `patient_parameter_temperature` FLOAT NULL ,
  `patient_parameter_blood_pressure` FLOAT NULL ,
  `patient_parameter_heartbeat` FLOAT NULL ,
  `patient_parameter_status` TINYINT NULL ,
  `patient_parameter_consultation` LONGTEXT NULL ,
  `patient_parameter_rhesus` VARCHAR(45) NULL ,
  `patient_parameter_date` TIMESTAMP NOT NULL ,
  `patient_patient_id` INT NOT NULL ,
  `health_personnel_health_personnel_id` INT NOT NULL ,
  PRIMARY KEY (`patient_parameter_id`) ,
  INDEX `fk_patient_parameter_patient1` (`patient_patient_id` ASC) ,
  INDEX `fk_patient_parameter_health_personnel1` (`health_personnel_health_personnel_id` ASC) ,
  CONSTRAINT `fk_patient_parameter_patient1`
    FOREIGN KEY (`patient_patient_id` )
    REFERENCES `hms`.`patient` (`patient_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_patient_parameter_health_personnel1`
    FOREIGN KEY (`health_personnel_health_personnel_id` )
    REFERENCES `hms`.`health_personnel` (`health_personnel_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`personnel_speciality`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`personnel_speciality` ;

CREATE  TABLE IF NOT EXISTS `hms`.`personnel_speciality` (
  `personnel_speciality_id` INT NOT NULL AUTO_INCREMENT ,
  `personnel_speciality` VARCHAR(45) NULL ,
  `personnel_speciality_description` TEXT NULL ,
  `personnel_speciality_status` TINYINT NULL ,
  PRIMARY KEY (`personnel_speciality_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hms`.`personnel_speciality_has_health_personnel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hms`.`personnel_speciality_has_health_personnel` ;

CREATE  TABLE IF NOT EXISTS `hms`.`personnel_speciality_has_health_personnel` (
  `personnel_speciality_id` INT NOT NULL ,
  `health_personnel_id` INT NOT NULL ,
  PRIMARY KEY (`personnel_speciality_id`, `health_personnel_id`) ,
  INDEX `fk_personnel_speciality_has_health_personnel_health_personnel1` (`health_personnel_id` ASC) ,
  INDEX `fk_personnel_speciality_has_health_personnel_personnel_specia1` (`personnel_speciality_id` ASC) ,
  CONSTRAINT `fk_personnel_speciality_has_health_personnel_personnel_specia1`
    FOREIGN KEY (`personnel_speciality_id` )
    REFERENCES `hms`.`personnel_speciality` (`personnel_speciality_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_personnel_speciality_has_health_personnel_health_personnel1`
    FOREIGN KEY (`health_personnel_id` )
    REFERENCES `hms`.`health_personnel` (`health_personnel_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
