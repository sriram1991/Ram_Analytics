-- Change DB to SKOL
use skoldb;

delete from user_master where registration_no = 'SKOL2015S0004';



/* Creating Users Student And Parent */
INSERT INTO user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('SKOL2015S0004','SKOL', 'Student', 'student@skol.com', 1, 1);
INSERT INTO user_master(registration_no,user_fname, user_lname, user_email, user_status, user_role) value('SKOL2015P0005','SKOL', 'Parent', 'parent@skol.com', 1, 2);	


/* creating basic resource files */
INSERT INTO resource_master(resource_name, resource_link, resource_type,resource_tag) value('Kinematics PDF','kinematics_test.pdf','PDF','p1');
INSERT INTO resource_master(resource_name, resource_link, resource_type,resource_tag) value('Kinematics Video','https://www.youtube.com/watch?v=MJeRFzs4oRU&list=PLBEA57F7E7560C8E8','VIDEO','v1');


/* CREATING BASIC SUBJECTS */
INSERT INTO subject_master(subject_name, subject_description) value('Maths','Mathemetics');
INSERT INTO subject_master(subject_name, subject_description) value('Physics','Physics');
INSERT INTO subject_master(subject_name, subject_description) value('Chemistry','Chemistry');


/* CREATING BASIC COURSE */
INSERT INTO course_master(course_name,course_description,course_duration) value('IIT Entrance', 'For 10th Standard','3');
