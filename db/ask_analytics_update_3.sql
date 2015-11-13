-- SELECT DB 
use ask_analytics_db;
/*DROPPING VIEWS*/
-- DROP VIEW IF EXISTS associate_course_view;
-- DROP VIEW IF EXISTS subject_course_link_view;
-- DROP VIEW IF EXISTS associate_add_student_course_view;
-- DROP VIEW IF EXISTS associate_subject_registration;
-- DROP VIEW IF EXISTS students_course_link_view;
-- DROP VIEW IF EXISTS associate_student_link;
-- DROP VIEW IF EXISTS students_assessments_scores_view;
/* Creating View for Associate Course View with out grouping course id need to handel in model */
-- CREATE VIEW associate_course_view as SELECT cmasv.*,asv.* from course_subject_resource_map as csrv , associate_subject_map as asv, course_master as cmasv where csrv.subject_name = asv.subject_name and cmasv.course_id = csrv.course_id and cmasv.course_status = 'Published' and csrv.resource_status ='Published';

/* Creating View for Subject Master Course Link View */
-- CREATE VIEW subject_course_link_view AS SELECT sm.*,csrmv.resource_status FROM subject_master AS sm LEFT OUTER JOIN course_subject_resource_map AS csrmv  ON sm.subject_name = csrmv.subject_name GROUP BY sm.subject_name;

/* UPDATE ASSOCIATE to AFFILIATE */
-- UPDATE role_master SET role_name = 'Affiliate' WHERE role_id = 3;

/* UPDATING All Subject Name to Upper Case */
-- UPDATE subject_master SET subject_name = upper(subject_name);
-- UPDATE associate_subject_map SET subject_name = upper(subject_name);
-- UPDATE course_subject_resource_map SET subject_name = upper(subject_name);
-- UPDATE assessment_master SET test_subject = upper(test_subject);
-- UPDATE resource_master SET subject_name = upper(subject_name);

/* CREATING VIEW FOR ASSOCIATE ADD STUDENT COURSE LIST */
-- CREATE VIEW associate_add_student_course_view AS SELECT acv.*,pmv.payment_status,sm.status_name FROM associate_course_view AS acv, payment_master AS pmv, status_master AS sm WHERE acv.transaction_id=pmv.transaction_id AND pmv.payment_status = sm.status_id;

/*CREATING VIEW FOR ASSOCIATE SUBJECT REGISTRATION */
-- CREATE VIEW associate_subject_registration AS SELECT usrv.*,group_concat(asm.subject_name) AS associate_subjects ,pmv.payment_status FROM associate_subject_map AS asm, payment_master AS pmv , user_status_role_view AS usrv WHERE asm.transaction_id = pmv.transaction_id AND pmv.payment_status=2 AND asm.user_id = usrv.user_id GROUP BY asm.user_id;

/* Student Bulk Upload Table  Removied UNIQUE KEY*/
-- DROP TABLE IF EXISTS student_bulk_upload;
-- CREATE TABLE IF NOT EXISTS student_bulk_upload (
--     id INT UNSIGNED NOT NULL AUTO_INCREMENT primary key,
--     first_name varchar(50),
--     last_name varchar(50),
--     email varchar(50),
--     mobile varchar(12),
--     parent_name varchar(40),    
--     address varchar(40),
--     course varchar(100),
--     associate_id varchar(50),
--     cost int(5),
--     transaction_id int(11) unsigned NOT NULL
-- )ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Different activities like login, logout, create company, etc are captured here
-- create table activity_master(
--        activity_id int auto_increment primary key,
--        activity_name varchar(50) not null unique,
--        activity_desc varchar(250) not null,
--        activity_created timestamp default '0000-00-00 00:00:00',
--        activity_updated timestamp default current_timestamp on update current_timestamp
-- )ENGINE=INNODB CHARSET=utf8;

-- Log of activities happen in admin console
-- create table activity_log(
--        log_id int auto_increment primary key,
--        log_description varchar(250) not null,
--        log_user_agent varchar(100) not null,
--        user_id int,
--        severity_id int not null default 1,
--        activity_id int not null,
--        log_created timestamp default current_timestamp on update current_timestamp,
--        foreign key (user_id) references user_master(user_id) on delete cascade,
--        foreign key (severity_id) references severity_master(severity_id),
--        foreign key (activity_id) references activity_master(activity_id)
-- )ENGINE=INNODB CHARSET=utf8;

-- CREATE VIEW students_course_link_view AS SELECT `um`.`user_id` AS `student_id`,`um`.`user_role` AS `user_role`,`ucbv`.`batch_type` AS `batch_type`,`ucbv`.`batch_id` AS `batch_id`,`um`.`registration_no` AS `student_regno`,`um`.`user_fname` AS `student_fname`,`um`.`user_email` AS `student_email`,`ucv`.`course_id` AS `course_id`,`ucv`.`course_name` AS `course_name`,`ucbv`.`associate_id` AS `associate_id`,`ucbv`.`payment_status` AS `payment_status`,`ucbv`.`status_name` AS `status_name`,`ucbv`.`transaction_id` AS `transaction_id` from ((`user_master` `um` join `user_course_view` `ucv`) join `user_course_batch_view` `ucbv`) WHERE ((`ucbv`.`user_id` = `um`.`user_id`) AND (`ucbv`.`course_id` = `ucv`.`course_id`));
/* Creating view for associate student link for unlinking */
-- CREATE VIEW associate_student_link AS SELECT uclv.*,um.user_fname AS associate_fname,um.user_email AS associate_email,um.registration_no AS associate_regno FROM students_course_link_view AS uclv, user_master AS um WHERE uclv.associate_id = um.user_id;

/* Creating View for Student Assessments Score View for Assoicate level ranking */
-- create view students_assessments_scores_view as select um.registration_no , um.user_id, um.user_fname ,bm.batch_name as user_state,am.course_id ,  am.test_no , am.test_name , am.test_date , am.no_of_questions , am.test_score , am.test_percentage from user_master as um , attempt_master as am,batch_master bm where um.user_id = am.user_id and am.attempt_count = 1 and am.submit_status = 1 and bm.course_id = am.course_id and bm.user_id = am.user_id;
