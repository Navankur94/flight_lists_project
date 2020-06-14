CREATE TABLE `flight_details`.`tbl_login_details` ( `login_id` BIGINT(20) NOT NULL AUTO_INCREMENT , `user_name` VARCHAR(50) NOT NULL , `password` VARCHAR(200) NOT NULL , `deleted_flag` TINYINT(2) NOT NULL , PRIMARY KEY (`login_id`)) ENGINE = InnoDB;

INSERT INTO `tbl_login_details` (`login_id`, `user_name`, `password`, `deleted_flag`) VALUES ('1', 'test', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0');

CREATE TABLE `flight_details`.`tbl_flight_details` ( `flight_details_id` INT(11) NOT NULL , `login_id` BIGINT(20) NOT NULL , `details_json` JSON NOT NULL ) ENGINE = InnoDB;
ALTER TABLE `tbl_flight_details` ADD PRIMARY KEY(`flight_details_id`);

ALTER TABLE `tbl_flight_details` ADD CONSTRAINT `login_id_fbk` FOREIGN KEY (`login_id`) REFERENCES `tbl_login_details`(`login_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

