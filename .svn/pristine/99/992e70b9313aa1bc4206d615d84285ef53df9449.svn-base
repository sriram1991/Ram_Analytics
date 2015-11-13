use ask_analytics_db;

delete from subject_master;
alter table subject_master auto_increment=1;

delete from user_master;
alter table user_master auto_increment=1;

delete from role_master;
alter table role_master auto_increment=1;

delete from status_master;
alter table status_master auto_increment=1;


insert into status_master(status_id, status_name) value(1, 'Active');
insert into status_master(status_id, status_name) value(2, 'Paid');
insert into status_master(status_id, status_name) value(3, 'Pending Payment');
insert into status_master(status_id, status_name) value(4, 'Email Not Verified');
insert into status_master(status_id, status_name) value(5, 'Inactive');
insert into status_master(status_id, status_name) value(6, 'Valid');
insert into status_master(status_id, status_name) value(7, 'Invalid');
insert into status_master(status_id, status_name) value(8, 'Payment Not Verified');
insert into status_master(status_id, status_name) value(9, 'Applied');
insert into status_master(status_id, status_name) value(10, 'Approved');
insert into status_master(status_id, status_name) value(11, 'Rejected');

insert into role_master(role_id, role_name) value(1, 'User');
insert into role_master(role_id, role_name) value(2, 'Parent/Guardian');
insert into role_master(role_id, role_name) value(3, 'SPOC');
insert into role_master(role_id, role_name) value(4, 'Registrar');
insert into role_master(role_id, role_name) value(5, 'Accountant');
insert into role_master(role_id, role_name) value(6, 'Mentor/SME');
insert into role_master(role_id, role_name) value(7, 'Super Admin');
insert into role_master(role_id, role_name) value(8, 'Content Admin');
insert into role_master(role_id, role_name) value(9, 'Affiliate');

/* create basic admin account */
-- 1 SuperAdmin Creation  Role ID : 7
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015E0001','Super', 'Admin', 'admin@askanalytics.com', 1, 7);
-- 2 Content Admin Creation Role ID : 8
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015E0002','Content Director', 'Admin', 'contentadmin@askanalytics.com', 1, 8);
-- 3 Registrar Creation Role ID : 4
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015E0003','ASKS', 'Registrar', 'registrar@askanalytics.com', 1, 4);
-- 4 Accountant Creation Role ID : 5
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015E0004','ASKS', 'Accountant', 'accountant@askanalytics.com', 1, 5);

-- insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015S0002','ASKS', 'Student', 'student@askanalytics.com', 1, 1);
-- insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015P0003','ASKS', 'Parent', 'parent@askanalytics.com', 1, 2);
-- insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015A0004','ASKS', 'Associate', 'associate@askanalytics.com', 1, 3);
-- insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015E0007','ASKS', 'ContentAdmin', 'contentcreator@askanalytics.com', 1, 6);

/* Test User Creation
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015S0008','Test', 'Student' , 'teststudent@askanalytics.com', 1,1);
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015S0010','Test10', 'Student' , 'teststudent10@askanalytics.com', 1,1);
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015S0011','Test11', 'Student' , 'teststudent11@askanalytics.com', 1,1);
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015S0012','Test12', 'Student' , 'teststudent12@askanalytics.com', 1,1);
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015S0013','Test13', 'Student' , 'teststudent13@askanalytics.com', 1,1);
insert into user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('ASKS2015A0009','Test', 'Associate', 'testassociate@askanalytics.com', 1,3);
*/

/* creating basic resource files
insert into resource_master(resource_name, resource_link, resource_type,resource_tag) value('Kinematics PDF','kinematics_test.pdf','PDF','p1');
insert into resource_master(resource_name, resource_link, resource_type,resource_tag) value('Kinematics Video','https://www.youtube.com/watch?v=MJeRFzs4oRU&list=PLBEA57F7E7560C8E8','VIDEO','v1');
*/

/* CREATING BASIC SUBJECTS
INSERT INTO subject_master(subject_name, subject_description) value('Maths','Mathemetics');
INSERT INTO subject_master(subject_name, subject_description) value('Physics','Physics');
INSERT INTO subject_master(subject_name, subject_description) value('Chemistry','Chemistry');
*/

/* CREATING BASIC COURSE 
INSERT INTO course_master(course_name,course_description,course_duration) value('IIT Entrance', 'For 10th Standard','3');
*/

/* Create Director map with subject
insert into content_directors(user_id,subject_id) values('7','1');
*/

/* Module list */
insert into module_list(module_name) values('Course Content');
insert into module_list(module_name) values('Additional Material');
insert into module_list(module_name) values('Evaluation');
insert into module_list(module_name) values('Case Study');
insert into module_list(module_name) values('Do-it-yourself');

/* Group List */
insert into group_list(group_name) values('Group I');
insert into group_list(group_name) values('Group II');
insert into group_list(group_name) values('Group III');
insert into group_list(group_name) values('Group IV');
insert into group_list(group_name) values('Group V');
insert into group_list(group_name) values('Group VI');

/* Updating Roles For ASK Analytics */
-- UPDATE role_master SET role_name = 'User' WHERE role_id = '1';
-- UPDATE role_master SET role_name = 'Parent' WHERE role_id = '2';
-- UPDATE role_master SET role_name = 'SPOC' WHERE role_id = '3';



/*
Please execute this command
load data local infile '/home/balaji/mobisir/skol/pin_code_master.csv' into table india_pincode_master fields terminated by ',' enclosed by '"' lines terminated by '\n';
*/
