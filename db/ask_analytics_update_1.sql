use ask_analytics_db;
/* To change unsend_sms_alert field of user_phone int to varchar */
-- ALTER TABLE unsend_sms_alert MODIFY user_phone varchar(12) NOT NULL;
-- ALTER TABLE unsend_sms_alert ADD sms_status varchar(200) NOT NULL DEFAULT 'START';

/* Adding Course Syallaus Field in Course Master Table */
-- ALTER TABLE course_master ADD course_syllabus_file varchar(500) NOT NULL DEFAULT 'NULL';

/* Coupan Code Master is Added With User_id Field */
-- ALTER TABLE couponcode_master ADD user_id int unsigned NOT NULL;
/* Creating new table for scholarship  */
-- create table if not exists scholarship_master (
--        scholarship_id int (11) unsigned AUTO_INCREMENT,
--        user_id int unsigned NOT NULL,
--        user_fname varchar(100) NOT NULL,
--        registration_no varchar(20) NOT NULL,
--        course_id int (11) unsigned NOT NULL,
--        course_name varchar(100) NOT NULL,
--        course_fee decimal(11,2) unsigned NOT NULL,
--        scholarship_request text,
--        discount_amount int(10),
--        status_id int NOT NULL,
--        PRIMARY KEY(scholarship_id)
-- )ENGINE=INNODB CHARSET=utf8;

-- UPDATE role_master SET role_name = 'User' WHERE role_id = '1';
-- UPDATE role_master SET role_name = 'Parent' WHERE role_id = '2';
-- UPDATE role_master SET role_name = 'SPOCs' WHERE role_id = '3';
