SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `wcms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `wcms` ;

-- -----------------------------------------------------
-- Table `wcms`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wcms`.`users` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `user_email` VARCHAR(60) NULL,
  `user_pass` CHAR(40) NULL,
  `user_first_name` VARCHAR(60) NULL,
  `user_last_name` VARCHAR(60) NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wcms`.`uploads`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wcms`.`uploads` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `upload_name` TEXT NULL,
  `upload_file_name` TEXT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wcms`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wcms`.`posts` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `post_author` INT NOT NULL,
  `post_image` INT NULL,
  `post_type` VARCHAR(20) NULL,
  `post_title` TEXT NULL,
  `post_date` DATETIME NULL,
  `post_content` LONGTEXT NULL,
  `post_excerpt` VARCHAR(45) NULL,
  `post_status` CHAR(2) NULL,
  `post_order` INT NULL,
  PRIMARY KEY (`ID`, `post_author`),
  INDEX `fk_posts_users1_idx` (`post_author` ASC),
  INDEX `fk_posts_uploads1_idx` (`post_image` ASC),
  CONSTRAINT `fk_posts_users1`
    FOREIGN KEY (`post_author`)
    REFERENCES `wcms`.`users` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_uploads1`
    FOREIGN KEY (`post_image`)
    REFERENCES `wcms`.`uploads` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wcms`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wcms`.`categories` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `cat_name` VARCHAR(200) NULL,
  `cat_description` TEXT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wcms`.`post_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wcms`.`post_categories` (
  `posts_categories_ID` INT NOT NULL AUTO_INCREMENT,
  `categories_ID` INT NOT NULL,
  `posts_ID` INT NOT NULL,
  PRIMARY KEY (`posts_categories_ID`, `categories_ID`, `posts_ID`),
  INDEX `fk_categories_has_posts_posts1_idx` (`posts_ID` ASC),
  INDEX `fk_categories_has_posts_categories1_idx` (`categories_ID` ASC),
  CONSTRAINT `fk_categories_has_posts_categories1`
    FOREIGN KEY (`categories_ID`)
    REFERENCES `wcms`.`categories` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_categories_has_posts_posts1`
    FOREIGN KEY (`posts_ID`)
    REFERENCES `wcms`.`posts` (`ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
