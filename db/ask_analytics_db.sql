drop database if exists ask_analytics_db;
create database ask_analytics_db CHARACTER SET utf8 COLLATE utf8_general_ci;

grant all on ask_analytics_db.* to 'askadmin'@'localhost' identified by 'askadmin@123#';
-- grant all on ask_analytics_db.* to 'askadmin'@'104.237.128.165' identified by 'askadmin@123#';

use ask_analytics_db;

create table if not exists `user_sessions` (
       session_id varchar(40) DEFAULT '0' NOT NULL,
       ip_address varchar(45) DEFAULT '0' NOT NULL,
       user_agent varchar(120) NOT NULL,
       last_activity int(10) unsigned DEFAULT 0 NOT NULL,
       user_data text NOT NULL,
       PRIMARY KEY (session_id),
       KEY `last_activity_idx` (`last_activity`)
)ENGINE=INNODB CHARSET=utf8;

create table if not exists status_master(
       status_id int auto_increment primary key,
       status_name varchar(50) not null unique,
       status_created  timestamp default '0000-00-00 00:00:00',
       status_updated timestamp default current_timestamp on update current_timestamp,
       unique key(status_name)
)ENGINE=INNODB CHARSET=utf8;

create table if not exists role_master(
       role_id int auto_increment primary key,
       role_name varchar(50) not null unique,
       role_created  timestamp default '0000-00-00 00:00:00',
       role_updated timestamp default current_timestamp on update current_timestamp,
       unique key(role_name)
)ENGINE=INNODB CHARSET=utf8;

create table if not exists user_master(
       user_id int unsigned not null auto_increment primary key,
       registration_no varchar(20) not null unique,
       user_fname varchar(100) not null,
       user_mname varchar(100),
       user_lname varchar(100) not null,
       user_password varchar(100) not null  default 'e99a18c428cb38d5f260853678922e03',
       user_address varchar(500) not null default "Address",
       user_city varchar(100) not null default "City",
       user_district varchar(100) not null default "District",
       user_state varchar(100) not null default "State",
       user_country varchar(100) not null default "India",
       user_pin varchar(10) not null default "111111",
       user_photo varchar(100) not null default "NULL",
       user_phone varchar(12) not null default "9999999999",
       user_email varchar(100) not null,
       user_status int not null default 4,
       user_role int not null default 1,
       user_created timestamp DEFAULT '0000-00-00 00:00:00',
       user_updated timestamp DEFAULT current_timestamp on update current_timestamp,
       foreign key(user_role) references role_master(role_id),
       unique key(user_email)
) ENGINE=INNODB CHARSET=utf8;

CREATE TABLE IF NOT EXISTS india_pincode_master (
       pin_code bigint NOT NULL primary key,
       district_name varchar(50),
       state_name varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table if not exists student_parent_map(
       student_id int unsigned not null,
       parent_id int unsigned not null,
       foreign key(student_id) references user_master(user_id) on delete cascade,
       foreign key(parent_id) references user_master(user_id) on delete cascade,
       map_created timestamp DEFAULT current_timestamp on update current_timestamp,
       primary key(student_id, parent_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS associate_details_master(
    user_id INT UNSIGNED NOT NULL,
    organization_name varchar(100) NOT NULL,
    student_count INT UNSIGNED NOT NULL DEFAULT '1',
    intent_letter varchar(250) NOT NULL DEFAULT 'Not Filled',
    payment_status varchar(50) DEFAULT 'NotPaid',
    details_created timestamp DEFAULT '0000-00-00 00:00:00',
    details_updated timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id),
    CONSTRAINT fk_map_associate FOREIGN KEY (user_id) REFERENCES user_master(user_id) on delete cascade
) ENGINE=InnoDB CHARSET=utf8;

create table if not exists student_associate_map(
       student_id int unsigned not null,
       associate_id int unsigned not null,
       foreign key(student_id) references user_master(user_id) on delete cascade,
       foreign key(associate_id) references user_master(user_id) on delete cascade,
       map_created timestamp DEFAULT current_timestamp on update current_timestamp,
       primary key(student_id, associate_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table if not exists passwd_master(
    passwd_id int unsigned auto_increment,
    user_id int unsigned not null,
    passwd_token varchar(250) not null unique,
    foreign key(user_id) references user_master(user_id) on delete cascade,
    passwd_created timestamp DEFAULT current_timestamp on update current_timestamp,
    PRIMARY KEY(passwd_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* Module Table for Course Subject Map */
CREATE TABLE IF NOT EXISTS module_list (
    module_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    module_name varchar(100),
    module_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    module_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(module_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Group Table for Course Subject Map */
CREATE TABLE IF NOT EXISTS group_list(
    group_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    group_name varchar(100),
    group_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    group_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(group_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Subject Master With Subject Fee */
CREATE TABLE IF NOT EXISTS subject_master (
       subject_id int (11) unsigned NOT NULL AUTO_INCREMENT,
       subject_name varchar(100) not null unique,
       subject_description text NOT NULL,
       subject_fee decimal(11,2) unsigned NOT NULL DEFAULT '1000.00',
       subject_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
       subject_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
       PRIMARY KEY(subject_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Reource Master Collection of Resources */
CREATE TABLE IF NOT EXISTS resource_master (
    resource_id int (11) unsigned NOT NULL AUTO_INCREMENT,
    resource_name varchar(100) NOT NULL UNIQUE,
    resource_type varchar(40) NOT NULL,
    resource_link varchar(500) NOT NULL,
    resource_tag TEXT NOT NULL,
    subject_name varchar(100) NOT NULL DEFAULT 'Maths',
    uploaded_user_id int (11) unsigned NOT NULL DEFAULT '1',
    resource_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    resource_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT ck_uploaded_user_id FOREIGN KEY (uploaded_user_id) REFERENCES user_master(user_id),
    PRIMARY KEY (resource_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/* Assessment Master Collection of all Test */
CREATE TABLE IF NOT EXISTS assessment_master(
    test_id int (11) unsigned NOT NULL AUTO_INCREMENT,
    test_no int (11) unsigned NOT NULL UNIQUE,
    test_subject varchar(100) NOT NULL,
    test_name varchar(100) NOT NULL ,
    test_description text NOT NULL,
    no_of_questions int(11) unsigned NOT NULL,
    no_of_options   int(11) unsigned NOT NULL DEFAULT '4',
    correct_mark    int(11) NOT NULL DEFAULT '4',
    negative_mark   int(11) NOT NULL DEFAULT '1',
    test_type varchar(100) NOT NULL,
    test_duration varchar(50) NOT NULL,
    upload_ques_paper varchar(255) NOT NULL,
    uploaded_user_id int (11) unsigned NOT NULL DEFAULT '1',
    answer_key text NOT NULL,
    ans_key_status int NOT NULL DEFAULT'0',
    test_date date NOT NULL DEFAULT '0000-00-00',
    start_time time NOT NULL DEFAULT '09:00:00',
    end_time time NOT NULL DEFAULT '19:00:00',
    test_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    test_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT ck_uploaded_userid FOREIGN KEY (uploaded_user_id) REFERENCES user_master(user_id),
    PRIMARY KEY(test_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Course Master Collection of All Course */
CREATE TABLE IF NOT EXISTS course_master (
   course_id int (11) unsigned NOT NULL AUTO_INCREMENT,
   course_name varchar(100) NOT NULL UNIQUE,
   course_description text NOT NULL,
   course_duration int (11) unsigned NOT NULL DEFAULT '6',
   course_type varchar(100) NOT NULL DEFAULT 'Student',
   course_fee decimal(11,2) unsigned NOT NULL DEFAULT '0.00',
   course_syllabus_file varchar(500) NOT NULL DEFAULT 'NULL',
   course_status varchar(20) NOT NULL DEFAULT 'Published',
   course_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
   course_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY(course_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Important Table Course Subject Resource Assessment Mapping Used in Admin */
CREATE TABLE IF NOT EXISTS course_subject_resource_map (
    map_id int (11) unsigned NOT NULL AUTO_INCREMENT,
    course_id int (11) unsigned NOT NULL,
    module_name varchar(100) NOT NULL DEFAULT 'Module 1',
    group_name varchar(100) NOT NULL DEFAULT 'Group I',
    subject_name varchar(100) NOT NULL,
    syllabus_type varchar(100) NOT NULL DEFAULT 'RESOURCE',
    resource_id int (11) unsigned NOT NULL,
    schedule DATE NOT NULL DEFAULT '2015-02-23',
    resource_status varchar(20) NOT NULL DEFAULT 'UnPublished',
    res_order int (11) unsigned NOT NULL DEFAULT '0',
    map_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    map_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(map_id),
    CONSTRAINT fk_map_courses FOREIGN KEY (course_id) REFERENCES course_master(course_id) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Content Directors Table */
CREATE TABLE IF NOT EXISTS content_directors(
    director_id INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT UNSIGNED NOT NULL,
    subject_id INT UNSIGNED NOT NULL,
    map_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    map_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(director_id),
    CONSTRAINT fk_map_subject FOREIGN KEY (subject_id) REFERENCES subject_master(subject_id) on delete CASCADE
)  ENGINE=InnoDB DEFAULT CHARSET=utf8;

--  CONSTRAINT fk_map_user FOREIGN KEY (user_id) REFERENCES user_master(user_id) on delete CASCADE,

/* Student Bulk Upload Table  */
CREATE TABLE IF NOT EXISTS student_bulk_upload (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT primary key,
    first_name varchar(50),
    last_name varchar(50),
    email varchar(50),
    mobile varchar(12),
    parent_name varchar(40),
    address varchar(40),
    course varchar(100),
    associate_id varchar(50),
    cost int(5),
    transaction_id int(11) unsigned NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Table for Coupon Code */
create table if not exists couponcode_master(
  coupon_id int auto_increment primary key,
  user_id int unsigned NOT NULL,
  coupon_code varchar(50) not null,
  registration_no varchar(20) ,
  discount_amount varchar(10) not null,
  valid_till varchar(10) not null,
  coupon_status int not null default 1,
  role_created  timestamp default '0000-00-00 00:00:00',
  role_updated timestamp default current_timestamp on update current_timestamp,
  foreign key(coupon_status) references status_master(status_id),
  unique key(coupon_code)
)ENGINE=INNODB CHARSET=utf8;

/* Table Creted for Send Email Function */
create table if not exists send_email(
  id int auto_increment primary key,
  email_id varchar(50) not null,
  email_subject varchar(150) not null,
  email_body text not null,
  invalid int(10) not null default '0'
)ENGINE=INNODB CHARSET=utf8;

/* This is Transaction Table.It has the list of all the trascations */
CREATE TABLE IF NOT EXISTS payment_master(
    transaction_id int(11) unsigned NOT NULL AUTO_INCREMENT,
    user_id int unsigned NOT NULL,
    transaction_number varchar(50) DEFAULT '0000000000',
    transaction_description text ,
    bank_name text ,
    total_amount varchar(20) DEFAULT '00',
    amount_paid varchar(20) DEFAULT '00',
    paid_date date DEFAULT '00-00-0000',
    payment_mode varchar(10) DEFAULT 'OFFLINE',
    payment_status varchar(20) DEFAULT 'NotPaid',
    PRIMARY KEY(transaction_id),
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES user_master(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* This is an Important Table in Student Side */
/* Batch Master Batch - Type - USER - Map USER - Course - Fee- Payment */
CREATE TABLE IF NOT EXISTS batch_master (
    batch_id int (11) unsigned NOT NULL AUTO_INCREMENT,
    batch_name varchar(100) NOT NULL,
    batch_type varchar(20) NOT NULL DEFAULT 'Online',
    user_id int(11) unsigned NOT NULL,
    associate_id int(11) unsigned NOT NULL DEFAULT '0',
    course_id int (11) unsigned NOT NULL,
    course_fee decimal(11,2) unsigned NOT NULL DEFAULT '0.00',
    coupon_id int DEFAULT '1111111111',
    transaction_id int(11) unsigned NOT NULL ,
    start_date date NOT NULL DEFAULT '0000-00-00',
    ended_date date NOT NULL DEFAULT '0000-00-00',
    batch_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    batch_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(batch_id),
    CONSTRAINT fk_courses FOREIGN KEY (course_id) REFERENCES course_master(course_id),
    CONSTRAINT fk_user_map FOREIGN KEY (user_id) REFERENCES user_master(user_id) on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* Table created for Batch,this is new By Nitesh */
/*
CREATE table if not exists batch_master(
    batch_id int auto_increment primary key,
    batch_name varchar(50) not null,
    batch_type varchar(10) not null,
    user_id varchar(20) not null,
    associate_id varchar(20) ,
    course_id int (11) unsigned NOT NULL,
    batch_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    batch_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key(course_id) references course_master(course_id)
)ENGINE=InnoDB CHARSET=utf8;
*/

/* Table for Attempt test */

CREATE TABLE IF NOT EXISTS attempt_master(
	attempt_id int(11) unsigned NOT NULL AUTO_INCREMENT,
	course_id int(11) unsigned NOT NULL,
    test_subject varchar(100) NOT NULL,
	user_id int(11) unsigned NOT NULL,
	attempt_count int(11) unsigned NOT NULL,
	test_no int(11) unsigned NOT NULL,
	test_type varchar(100) NOT NULL,
	test_name varchar(100) NOT NULL,
	no_of_questions int(11) NOT NULL,
	answer_key text  NOT NULL,
	student_answer text NOT NULL,
	test_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	remaining_time varchar(50) NOT NULL DEFAULT '00:00',
	test_score int(11) NOT NULL,
	test_percentage decimal(11,2) unsigned NOT NULL,
	submit_status int NOT NULL DEFAULT '0',
	PRIMARY KEY(attempt_id),
	CONSTRAINT fk_attempt_course_map  FOREIGN KEY (course_id) REFERENCES course_master(course_id) on delete cascade,
	CONSTRAINT fk_attempt_user_map FOREIGN KEY (user_id) REFERENCES user_master(user_id) on delete cascade

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* This is a Associate Subject Map table*/
/* This Associate Subject MAP maps Associate - Subject - Payment*/
CREATE TABLE IF NOT EXISTS associate_subject_map (
    map_id int (11) unsigned NOT NULL AUTO_INCREMENT,
    user_id int unsigned  NOT NULL,
    subject_name varchar(20) NOT NULL DEFAULT 'SUBJECT',
    subject_fee int (11) unsigned NOT NULL,
    coupon_id int DEFAULT '1111111111',
    transaction_id int (11) unsigned NOT NULL,
    PRIMARY KEY(map_id),
    CONSTRAINT fk_associate FOREIGN KEY (user_id) REFERENCES user_master(user_id),
    CONSTRAINT fk_transaction FOREIGN KEY (transaction_id) REFERENCES payment_master(transaction_id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


 /* Unsend mail alert table */
CREATE TABLE IF NOT EXISTS unsend_mail_alert(
	id int auto_increment primary key,
  	email_id varchar(50) not null,
  	email_subject varchar(500) not null,
        email_body text not null,
  	invalid int(10) not null default '0'
)ENGINE=INNODB CHARSET=utf8;

/*Unsend SMS log */
CREATE TABLE IF NOT EXISTS unsend_sms_alert(
	id int auto_increment primary key,
	user_fname varchar(50) not null,
	email_id varchar(50) not null,
	user_phone varchar(12) not null,
	message_body varchar(800) not null,
	sms_response text,
  sms_status varchar(200) NOT NULL DEFAULT 'START',
	unsend_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Creating new table for scholarship  */
create table if not exists scholarship_master (
       scholarship_id int (11) unsigned AUTO_INCREMENT,
       user_id int unsigned NOT NULL,
       user_fname varchar(100) NOT NULL,
       registration_no varchar(20) NOT NULL,
       course_id int (11) unsigned NOT NULL,
       course_name varchar(100) NOT NULL,
       course_fee decimal(11,2) unsigned NOT NULL,
       scholarship_request text,
       discount_amount int(10),
       status_id int NOT NULL,
       PRIMARY KEY(scholarship_id)
)ENGINE=INNODB CHARSET=utf8;


/* Creating new table for Quote Request Master  */
CREATE TABLE IF NOT EXISTS quote_request_master (
       quote_id int (11) unsigned AUTO_INCREMENT,
       user_id int unsigned NOT NULL,
       user_fname varchar(100) NOT NULL,
       registration_no varchar(20) NOT NULL,
       subject_id int (11) unsigned NOT NULL,
       subject_name varchar(100) NOT NULL,
       subject_fee decimal(11,2) unsigned NOT NULL,
       scholarship_request text,
       no_of_license int (100) unsigned NOT NULL DEFAULT '0',
       discount_amount int(10),
       status_id int NOT NULL,
       quote_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
       quote_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
       PRIMARY KEY(quote_id),
       CONSTRAINT fk_spoc_aoi FOREIGN KEY (subject_id) REFERENCES subject_master(subject_id) on delete CASCADE
)ENGINE=INNODB CHARSET=utf8;

/* Creating new table for Quote Request Master  */
CREATE TABLE IF NOT EXISTS affilate_user_map (
       affilate_map_id int (11) unsigned AUTO_INCREMENT,
       affilate_user_id int unsigned NOT NULL,
       joined_user_id int unsigned NOT NULL,
       map_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
       map_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
       PRIMARY KEY(affilate_map_id),
       CONSTRAINT fk_affilate_map FOREIGN KEY (affilate_user_id) REFERENCES user_master(user_id) on delete cascade,
       CONSTRAINT fk_joined_map FOREIGN KEY (joined_user_id) REFERENCES user_master(user_id) on delete cascade
)ENGINE=INNODB CHARSET=utf8;

/* Mentor/SME Course Map Table */
CREATE TABLE IF NOT EXISTS mentor_course_map(
    map_id INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
    mentor_id INT UNSIGNED NOT NULL,
    course_id INT UNSIGNED NOT NULL,
    map_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    map_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY(map_id),
    UNIQUE KEY (mentor_id,course_id),
    CONSTRAINT fk_mentor_user_map FOREIGN KEY (mentor_id) REFERENCES user_master(user_id) on delete CASCADE,
    CONSTRAINT fk_mentor_course_map FOREIGN KEY (course_id) REFERENCES course_master(course_id) on delete CASCADE
)  ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* course subscription count_master for all user subscription */
CREATE TABLE IF NOT EXISTS course_subscription_count_master (
  subscription_id INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
  course_id INT UNSIGNED NOT NULL,
  sub_count INT UNSIGNED NOT NULL DEFAULT '0',
  sub_created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  sub_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(subscription_id),
  UNIQUE KEY (course_id),
  CONSTRAINT fk_subscription_course_map FOREIGN KEY (course_id) REFERENCES course_master(course_id) on delete CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
