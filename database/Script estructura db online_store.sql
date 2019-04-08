-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema online_store
-- -----------------------------------------------------

--
-- DATABASE: `online_store`
--

CREATE DATABASE IF NOT EXISTS online_store;

--
-- User: `online_store_usr`
--

CREATE USER IF NOT EXISTS 'online_store_usr'@'localhost' IDENTIFIED BY 'sMoKN54EP7hoB4qH';

GRANT USAGE ON *.* TO 'online_store_usr'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

GRANT ALL PRIVILEGES ON `online_store`.* TO 'online_store_usr'@'localhost';

-- -----------------------------------------------------
-- Schema online_store
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `online_store` DEFAULT CHARACTER SET latin1 ;
USE `online_store` ;

-- -----------------------------------------------------
-- Table `online_store`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`migrations` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `online_store`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`password_resets` (
  `email` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `token` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `online_store`.`providers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`providers` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `phone` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `online_store`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`products` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `description` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `online_store`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`cities` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `online_store`.`type_vehicle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`type_vehicle` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `online_store`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`roles` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `online_store`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`status` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `position` TINYINT(1) NULL,
  `color` VARCHAR(10) NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- -----------------------------------------------------
-- Table `online_store`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `email` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `password` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `remember_token` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;




-- -----------------------------------------------------
-- Table `online_store`.`products_has_providers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`products_has_providers` (
  `products_id` INT(10) NOT NULL,
  `providers_id` INT(10) NOT NULL,
  `cost` DOUBLE(11,2) NOT NULL,
  PRIMARY KEY (`products_id`, `providers_id`),
  INDEX `fk_products_has_providers_providers1_idx` (`providers_id` ASC),
  INDEX `fk_products_has_providers_products_idx` (`products_id` ASC),
  CONSTRAINT `fk_products_has_providers_products`
    FOREIGN KEY (`products_id`)
    REFERENCES `online_store`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_has_providers_providers1`
    FOREIGN KEY (`providers_id`)
    REFERENCES `online_store`.`providers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;



-- -----------------------------------------------------
-- Table `online_store`.`storages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`storages` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `city_id` INT(10) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_storages_cities1_idx` (`city_id` ASC),
  CONSTRAINT `fk_storages_cities1`
    FOREIGN KEY (`city_id`)
    REFERENCES `online_store`.`cities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `online_store`.`storages_has_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`storages_has_products` (
  `storages_id` INT(10) NOT NULL,
  `products_id` INT(10) NOT NULL,
  `price` DOUBLE(11,2) NULL,
  PRIMARY KEY (`storages_id`, `products_id`),
  INDEX `fk_storages_has_products_products1_idx` (`products_id` ASC),
  INDEX `fk_storages_has_products_storages1_idx` (`storages_id` ASC),
  CONSTRAINT `fk_storages_has_products_storages1`
    FOREIGN KEY (`storages_id`)
    REFERENCES `online_store`.`storages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_storages_has_products_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `online_store`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;




-- -----------------------------------------------------
-- Table `online_store`.`vehicles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`vehicles` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `type_vehicle_id` INT(10) NOT NULL,
  `brand` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `model` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `license_plate` VARCHAR(191) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`model` ASC),
  INDEX `fk_vehicles_type_vehicle1_idx` (`type_vehicle_id` ASC),
  CONSTRAINT `fk_vehicles_type_vehicle1`
    FOREIGN KEY (`type_vehicle_id`)
    REFERENCES `online_store`.`type_vehicle` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `online_store`.`transporters_has_vehicles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`transporters_has_vehicles` (
  `users_id` INT(10) NOT NULL,
  `vehicles_id` INT(10) NOT NULL,
  PRIMARY KEY (`users_id`, `vehicles_id`),
  INDEX `fk_transporters_has_vehicles_vehicles1_idx` (`vehicles_id` ASC),
  CONSTRAINT `fk_transporters_has_vehicles_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `online_store`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transporters_has_vehicles_vehicles1`
    FOREIGN KEY (`vehicles_id`)
    REFERENCES `online_store`.`vehicles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;




-- -----------------------------------------------------
-- Table `online_store`.`users_has_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`users_has_roles` (
  `users_id` INT(10) NOT NULL,
  `roles_id` INT(10) NOT NULL,
  PRIMARY KEY (`users_id`, `roles_id`),
  INDEX `fk_users_has_roles_roles1_idx` (`roles_id` ASC),
  INDEX `fk_users_has_roles_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_users_has_roles_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `online_store`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_roles_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `online_store`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `online_store`.`users_addresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`users_addresses` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `user_id` INT(10) NOT NULL,
  `address` VARCHAR(80) NOT NULL,
  `latitude` VARCHAR(20) NULL,
  `longitude` VARCHAR(20) NULL,
  `city_id` INT(10) NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_addresses_users1_idx` (`user_id` ASC),
  INDEX `fk_users_addresses_cities1_idx` (`city_id` ASC),
  CONSTRAINT `fk_users_addresses_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `online_store`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_addresses_cities1`
    FOREIGN KEY (`city_id`)
    REFERENCES `online_store`.`cities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;




-- -----------------------------------------------------
-- Table `online_store`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`orders` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `creator_id` INT(10) NOT NULL,
  `client_id` INT(10) NOT NULL,
  `transporter_id` INT(10) NULL,
  `storage_id` INT(10) NOT NULL,
  `users_addresses_id` INT(10) NOT NULL,
  `delivery_date` TIMESTAMP NULL,
  `priority` TINYINT(1) NULL,
  `status_id` INT(10) NULL,
  `paid` TINYINT(1) NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_users1_idx` (`creator_id` ASC),
  INDEX `fk_orders_users2_idx` (`client_id` ASC),
  INDEX `fk_orders_users3_idx` (`transporter_id` ASC),
  INDEX `fk_orders_storages1_idx` (`storage_id` ASC),
  INDEX `fk_orders_users_addresses1_idx` (`users_addresses_id` ASC),
  INDEX `fk_orders_status1_idx` (`status_id` ASC),
  CONSTRAINT `fk_orders_users1`
    FOREIGN KEY (`creator_id`)
    REFERENCES `online_store`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users2`
    FOREIGN KEY (`client_id`)
    REFERENCES `online_store`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users3`
    FOREIGN KEY (`transporter_id`)
    REFERENCES `online_store`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_storages1`
    FOREIGN KEY (`storage_id`)
    REFERENCES `online_store`.`storages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_users_addresses1`
    FOREIGN KEY (`users_addresses_id`)
    REFERENCES `online_store`.`users_addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_status1`
    FOREIGN KEY (`status_id`)
    REFERENCES `online_store`.`status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `online_store`.`purchases`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`purchases` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `providers_id` INT(10) NOT NULL,
  `storage_id` INT(10) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_purchases_providers1_idx` (`providers_id` ASC),
  INDEX `fk_purchases_storages1_idx` (`storage_id` ASC),
  CONSTRAINT `fk_purchases_providers1`
    FOREIGN KEY (`providers_id`)
    REFERENCES `online_store`.`providers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_purchases_storages1`
    FOREIGN KEY (`storage_id`)
    REFERENCES `online_store`.`storages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `online_store`.`purchases_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`purchases_detail` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `purchases_id` INT(10) NOT NULL,
  `product_id` INT(10) NOT NULL,
  `quantity` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_purchases_detail_purchases1_idx` (`purchases_id` ASC),
  INDEX `fk_purchases_detail_products1_idx` (`product_id` ASC),
  CONSTRAINT `fk_purchases_detail_purchases1`
    FOREIGN KEY (`purchases_id`)
    REFERENCES `online_store`.`purchases` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_purchases_detail_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `online_store`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `online_store`.`sales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `online_store`.`sales` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `orders_id` INT(10) NOT NULL,
  `product_id` INT(10) NOT NULL,
  `quantity` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sales_orders1_idx` (`orders_id` ASC),
  INDEX `fk_sales_products1_idx` (`product_id` ASC),
  CONSTRAINT `fk_sales_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `online_store`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sales_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `online_store`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
