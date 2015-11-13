/* Seleting ASK Analytics DB */
use ask_analytics_db;

/* Droping Views */

DROP VIEW IF EXISTS user_status_role_view;
DROP VIEW IF EXISTS course_syllabus_view;
DROP VIEW IF EXISTS batch_course_view;
DROP VIEW IF EXISTS user_course_view;
DROP VIEW IF EXISTS course_subject_resource_view;
DROP VIEW IF EXISTS course_subject_assessment_view;
DROP VIEW IF EXISTS content_director_view;
DROP VIEW IF EXISTS course_resource_mapview;
DROP VIEW IF EXISTS course_assessment_mapview;
DROP VIEW IF EXISTS user_course_batch_view;
DROP VIEW IF EXISTS student_batch_payment_view;
DROP VIEW IF EXISTS parent_student_view;
DROP VIEW IF EXISTS parent_student_details_view;
DROP VIEW IF EXISTS associate_subject_payment_view;
DROP VIEW IF EXISTS student_assessment_score_view;
DROP VIEW IF EXISTS student_test_schedule_view;
DROP VIEW IF EXISTS associate_additional_view;
DROP VIEW IF EXISTS associate_course_view;
DROP VIEW IF EXISTS associate_course_sub_res_map;
DROP VIEW IF EXISTS payment_master_user_view;
DROP VIEW IF EXISTS user_course_link_view;
DROP VIEW IF EXISTS student_course_subject_view;
DROP VIEW IF EXISTS user_email_course_batch_view;
DROP VIEW IF EXISTS subject_course_link_view;
DROP VIEW IF EXISTS associate_add_student_course_view;
DROP VIEW IF EXISTS associate_subject_registration;
DROP VIEW IF EXISTS students_assessments_scores_view;
DROP VIEW IF EXISTS quote_request_status_view;
DROP VIEW IF EXISTS students_course_link_view;
DROP VIEW IF EXISTS associate_student_link;
DROP VIEW IF EXISTS mentor_resource_view;
DROP VIEW IF EXISTS mentor_assessment_view;
DROP VIEW IF EXISTS affilate_user_map_view;
DROP VIEW IF EXISTS mentor_course_map_view;
DROP VIEW IF EXISTS mentor_course_user_count_view;
DROP VIEW IF EXISTS available_course_area_interest_view;
DROP VIEW IF EXISTS user_course_area_interest_batch_view;

/***** Admin Related Feature ---------------------------------------------------------------------------*/

/* Creating Views */

CREATE VIEW user_status_role_view AS SELECT user_master.*, status_master.status_name, role_master.role_name FROM user_master inner join status_master ON user_master.user_status = status_master.status_id inner join role_master ON user_master.user_role=role_master.role_id;

/* Creating VIEW for Content Director User Staus VIEW */

CREATE VIEW content_director_view AS select usrv.*, cd.subject_id, sm.subject_name from content_directors AS cd, subject_master sm, user_status_role_view usrv where sm.subject_id = cd.subject_id AND usrv.user_id = cd.user_id;

/* Creating View for Course Resource Map View For Content Admin Display in DT */

CREATE VIEW course_resource_mapview AS SELECT csrm.map_id, csrm.course_id, csrm.module_name, csrm.group_name, csrm.subject_name, csrm.syllabus_type,rm.resource_id, rm.resource_name, rm.resource_type, csrm.schedule, csrm.res_order, csrm.resource_status FROM course_subject_resource_map AS csrm inner join resource_master rm ON csrm.resource_id = rm.resource_id WHERE csrm.syllabus_type ='RESOURCE';

/* Creating View for Course Assessment Map View For Content Admin Display in DT */

CREATE VIEW course_assessment_mapview AS SELECT csrm.map_id, csrm.course_id, csrm.module_name, csrm.group_name, csrm.subject_name, csrm.syllabus_type,am.test_id, am.test_no, am.test_name, am.test_type, am.test_date, csrm.schedule , csrm.res_order, csrm.resource_status FROM course_subject_resource_map AS csrm inner join assessment_master am ON am.test_id = csrm.resource_id WHERE csrm.syllabus_type ='ASSESSMENT';

/* Creating Course Syllabus View */

CREATE VIEW course_syllabus_view AS SELECT course_subject_resource_map.map_id, course_subject_resource_map.course_id, course_subject_resource_map.module_name, course_subject_resource_map.group_name, course_subject_resource_map.subject_name, course_subject_resource_map.syllabus_type, resource_master.resource_name, resource_master.resource_type, course_subject_resource_map.schedule, course_subject_resource_map.res_order FROM course_subject_resource_map inner join resource_master ON course_subject_resource_map.resource_id = resource_master.resource_id;

/*------------------------------------------------------------------------------------------------------*/


/* Creating View for Batch Course View */
/*CREATE VIEW batch_course_view AS SELECT batch_master.batch_id, batch_master.course_id, batch_master.batch_name, course_master.course_name, batch_master.start_date,course_master.course_duration, course_master.course_type, course_master.course_fee FROM batch_master inner join course_master ON batch_master.course_id = course_master.course_id;
*/

/* Creating View for User Course View*/

CREATE VIEW user_course_batch_view AS SELECT ubm.user_id,ubm.batch_id, ubm.batch_name,ubm.batch_type,ubm.associate_id,ubm.course_id, cm.course_name,cm.course_duration, ubm.course_fee, ubm.transaction_id, pm.transaction_number, pm.payment_status, sm.status_name FROM batch_master AS ubm,course_master as cm,payment_master as pm,status_master as sm WHERE cm.course_id = ubm.course_id AND ubm.transaction_id = pm.transaction_id AND pm.payment_status=sm.status_id AND cm.course_status='Published';



/******** Student Side Features --------------------------------------------------------------------------*/
/* Creating View for Course Subject Resource View For Student Side */

CREATE VIEW course_subject_resource_view AS SELECT csrm.course_id, csrm.module_name, csrm.group_name, csrm.subject_name, csrm.resource_id, csrm.syllabus_type ,rm.resource_name, rm.resource_type,rm.resource_link,csrm.schedule,csrm.res_order, csrm.resource_status FROM course_subject_resource_map AS csrm, resource_master rm WHERE rm.resource_id = csrm.resource_id AND csrm.syllabus_type ='RESOURCE';

/* Creating View for Course Subject Assessment View For Student Side */
CREATE VIEW course_subject_assessment_view AS SELECT csam.course_id, csam.module_name, csam.group_name, csam.subject_name, am.test_id, am.test_no, csam.syllabus_type ,am.test_name, am.test_type,csam.schedule,csam.res_order, csam.resource_status FROM course_subject_resource_map AS csam, assessment_master am WHERE am.test_id = csam.resource_id AND csam.syllabus_type ='ASSESSMENT';

/* Creating View for User Course View To Display Availabe Course For Students */
CREATE VIEW user_course_view AS SELECT cm.* FROM course_master AS cm, course_subject_resource_map csrmp WHERE (cm.course_id = csrmp.course_id) AND (csrmp.resource_status='Published') AND (cm.course_status='Published') GROUP BY(cm.course_id);

/* Creating view for Student Batch Payment from user_master and batch_master */
CREATE view student_batch_payment_view as select um.user_id,um.user_fname,um.user_mname,um.user_lname,um.user_email,um.user_phone,
um.registration_no,bm.transaction_id,pm.payment_status,bm.batch_name,bm.batch_type,bm.associate_id,bm.course_id,cm.course_name,um.user_photo
,um.user_status from user_master as um, payment_master as pm, batch_master as bm , course_master as cm where um.user_id=bm.user_id and bm.transaction_id = pm.transaction_id and bm.course_id = cm.course_id and user_role=1;

/*---------------------------------------------------------------------------------------------------------*/

/********* Associate Side Features ------------------------------------------------------------------------*/

/* Creating view for Associate-Subject-Payment from user_master and associate_subject_map */
create view associate_subject_payment_view as select distinct um.user_id,um.user_fname,um.user_email,um.user_phone,um.registration_no,asm.subject_name,asm.transaction_id,pm.payment_status,sm.status_name from user_master as um,payment_master as pm , associate_subject_map as asm,status_master as sm where um.user_id=pm.user_id and asm.transaction_id = pm.transaction_id and pm.payment_status = sm.status_id;

/*---------------------------------------------------------------------------------------------------------*/


CREATE view parent_student_view as select um.user_id,ucbv.batch_id,ucbv.batch_name,um.user_fname,ucbv.course_name,am.test_name,am.test_date,am.test_score,am.test_percentage,am.no_of_questions  from user_master um,user_course_batch_view ucbv,attempt_master am where um.user_id=ucbv.user_id and ucbv.user_id=am.user_id and am.course_id = ucbv.course_id;

CREATE view parent_student_details_view as select spm.*, usv.* from student_parent_map as spm , user_status_role_view usv where spm.student_id = usv.user_id;


/* Creating a  view*/
create view student_assessment_score_view as  select um.registration_no , um.user_id, um.user_fname ,um.user_state,am.course_id ,  am.test_no , am.test_name , am.test_date , am.no_of_questions , am.test_score , am.test_percentage from user_master as um , attempt_master as am where um.user_id = am.user_id and am.attempt_count = 1 and am.submit_status = 1 ;

/* Creating View for SCM Scheduling for TEST */
CREATE VIEW student_test_schedule_view as select ucbv.user_id,stu_mas.user_role,stu_mas.user_fname,stu_mas.user_email,stu_mas.user_phone,ucbv.course_name,csav.subject_name,csav.test_name,csav.test_no,csav.schedule from user_course_batch_view as ucbv , user_master as stu_mas, course_subject_assessment_view as csav where ucbv.user_id = stu_mas.user_id and ucbv.course_id = csav.course_id and ucbv.payment_status = '2' and csav.resource_status ="Published"  and csav.schedule = (CURDATE() + INTERVAL 1 DAY);

/* Creating View for Associate Documents View */
create view associate_additional_view as select ass_um.registration_no, adm.* from associate_details_master as adm, user_master as ass_um where adm.user_id = ass_um.user_id;

/* Creating View for Associate Course View */
/* OLD
CREATE VIEW associate_course_view as select cmasv.*,asv.* from course_subject_resource_map as csrv , associate_subject_map as asv, course_master as cmasv where csrv.subject_name = asv.subject_name and cmasv.course_id = csrv.course_id and cmasv.course_status = 'Published' and csrv.resource_status ='Published' group by cmasv.course_id;
*/

/* Creating View for Associate Course View with out grouping course id need to handel in model */
CREATE VIEW associate_course_view as SELECT cmasv.*,asv.* from course_subject_resource_map as csrv , associate_subject_map as asv, course_master as cmasv where csrv.subject_name = asv.subject_name and cmasv.course_id = csrv.course_id and cmasv.course_status = 'Published' and csrv.resource_status ='Published';

/* Creating View for Payment Master User View */
CREATE VIEW payment_master_user_view as select pay_master.*,upmrv.user_fname,upmrv.user_email,upmrv.user_role,upmrv.role_name from payment_master as pay_master , user_status_role_view as upmrv where pay_master.user_id = upmrv.user_id;


/* Create View For Assoicate Course Subject Resource Map View */
CREATE VIEW associate_course_sub_res_map AS SELECT csrm.*,aspv.user_id,astr.payment_status,astr.status_name FROM associate_subject_map AS aspv, course_subject_resource_map AS csrm, associate_subject_payment_view AS astr WHERE aspv.subject_name = csrm.subject_name AND astr.transaction_id = aspv.transaction_id AND csrm.resource_status ='Published';


/* Creating user course link */
CREATE VIEW user_course_link_view AS SELECT um.user_id,um.user_role,ucbv.batch_id,um.registration_no, um.user_fname, um.user_email, ucv.course_id, ucv.course_name, ucbv.payment_status,ucbv.status_name,ucbv.transaction_id FROM user_master as um, user_course_view ucv, user_course_batch_view ucbv where ucbv.user_id = um.user_id and ucbv.course_id = ucv.course_id;

/* OLD Student Course Subject View */
-- CREATE VIEW student_course_subject_view AS select um.registration_no , um.user_id, um.user_fname ,um.user_state,am.course_id ,  am.test_no , am.test_name , am.test_date , am.no_of_questions , am.test_score , am.test_percentage, csav.subject_name from user_master as um ,attempt_master as am, course_subject_assessment_view as csav where um.user_id = am.user_id and am.attempt_count = 1 and am.submit_status = 1 and csav.test_no = am.test_no;

-- Taken From ASK Analytics Update 2
/* New student course subject view for students */
CREATE VIEW student_course_subject_view AS select um.registration_no , um.user_id, um.user_fname ,um.user_state,am.course_id ,  am.test_no , am.test_name , am.test_date , am.no_of_questions , am.test_score , am.test_percentage, csav.subject_name from user_master as um ,attempt_master as am, course_subject_assessment_view as csav where um.user_id = am.user_id and am.attempt_count = 1 and am.submit_status = 1 and csav.test_no = am.test_no;
/* user email Course Batch View */
CREATE VIEW user_email_course_batch_view AS SELECT um.user_email,ucbv.* FROM user_course_batch_view AS ucbv,user_master AS um WHERE um.user_id = ucbv.user_id;

-- TAKEN FROM UPDATE 3
/* Creating View for Subject Master Course Link View */
CREATE VIEW subject_course_link_view AS SELECT sm.*,csrmv.resource_status FROM subject_master AS sm LEFT OUTER JOIN course_subject_resource_map AS csrmv  ON sm.subject_name = csrmv.subject_name GROUP BY sm.subject_name;

/* CREATING VIEW FOR ASSOCIATE ADD STUDENT COURSE LIST */
CREATE VIEW associate_add_student_course_view AS SELECT acv.*,pmv.payment_status,sm.status_name FROM associate_course_view AS acv, payment_master AS pmv, status_master AS sm WHERE acv.transaction_id=pmv.transaction_id AND pmv.payment_status = sm.status_id;

/*CREATING VIEW FOR ASSOCIATE SUBJECT REGISTRATION */
CREATE VIEW associate_subject_registration AS SELECT usrv.*,group_concat(asm.subject_name) AS associate_subjects ,pmv.payment_status FROM associate_subject_map AS asm, payment_master AS pmv , user_status_role_view AS usrv WHERE asm.transaction_id = pmv.transaction_id AND pmv.payment_status=2 AND asm.user_id = usrv.user_id GROUP BY asm.user_id;

/* CREATEING VIEW FOR STUDENTS CORUSE LINK VIEW */
CREATE VIEW students_course_link_view AS SELECT `um`.`user_id` AS `student_id`,`um`.`user_role` AS `user_role`,`ucbv`.`batch_type` AS `batch_type`,`ucbv`.`batch_id` AS `batch_id`,`um`.`registration_no` AS `student_regno`,`um`.`user_fname` AS `student_fname`,`um`.`user_email` AS `student_email`,`ucv`.`course_id` AS `course_id`,`ucv`.`course_name` AS `course_name`,`ucbv`.`associate_id` AS `associate_id`,`ucbv`.`payment_status` AS `payment_status`,`ucbv`.`status_name` AS `status_name`,`ucbv`.`transaction_id` AS `transaction_id` from ((`user_master` `um` join `user_course_view` `ucv`) join `user_course_batch_view` `ucbv`) WHERE ((`ucbv`.`user_id` = `um`.`user_id`) AND (`ucbv`.`course_id` = `ucv`.`course_id`));

/* Creating view for associate student link for unlinking */
CREATE VIEW associate_student_link AS SELECT uclv.*,um.user_fname AS associate_fname,um.user_email AS associate_email,um.registration_no AS associate_regno FROM students_course_link_view AS uclv, user_master AS um WHERE uclv.associate_id = um.user_id;

/* Creating View for Student Assessments Score View for Assoicate level ranking */
CREATE VIEW students_assessments_scores_view as select um.user_id,um.registration_no, um.user_fname,um.user_email ,bm.batch_name as user_state,um.user_country,am.course_id,cm.course_name, am.test_no , am.test_name ,am.test_subject, am.test_date , am.no_of_questions , am.test_score , am.test_percentage from user_master as um , attempt_master as am,batch_master bm,course_master as cm where um.user_id = am.user_id and am.attempt_count = 1 and am.submit_status = 1 and bm.course_id = am.course_id and am.course_id = cm.course_id and bm.user_id = am.user_id; 

/* Creating view for bring status  for request_for_quote in SPOC's */
CREATE VIEW quote_request_status_view AS SELECT qrm.quote_id,qrm.user_id,qrm.user_fname,qrm.registration_no,qrm.subject_id,qrm.subject_name, qrm.subject_fee,qrm.scholarship_request,qrm.discount_amount,sm.status_id,sm.status_name FROM status_master sm, quote_request_master qrm WHERE sm.status_id = qrm.status_id;

/* Creating View for Mentor/SME Resource View */
CREATE VIEW mentor_resource_view AS SELECT res_mas.*,umr.* FROM resource_master AS res_mas, user_status_role_view AS umr WHERE res_mas.uploaded_user_id = umr.user_id;

/* Creating View for Mentor/SME Assessment View */
CREATE VIEW mentor_assessment_view AS SELECT ass_mas.*,um_sme.* FROM assessment_master AS ass_mas, user_status_role_view AS um_sme WHERE ass_mas.uploaded_user_id = um_sme.user_id;

/* Creating View for Affilate User Map View to know how user registered */
CREATE VIEW affilate_user_map_view AS SELECT umsrv.*,afum.* FROM affilate_user_map AS afum, user_status_role_view AS umsrv WHERE afum.joined_user_id = umsrv.user_id order by umsrv.user_id;

/* Creating View for Mentor Course Map View */
CREATE VIEW mentor_course_map_view AS SELECT mentor_details.*,mentor_map.map_id,mentor_map.mentor_id,course_details.* FROM mentor_course_map AS mentor_map, course_master AS course_details , user_status_role_view AS mentor_details WHERE mentor_map.mentor_id = mentor_details.user_id AND mentor_map.course_id = course_details.course_id;

/* Creating View for Mentor Course User Map View */
CREATE VIEW mentor_course_user_count_view AS SELECT mcmv.*,scscm.sub_count FROM mentor_course_map_view AS mcmv,course_subscription_count_master AS scscm WHERE mcmv.course_id = scscm.course_id;

/* Creating View for Available Course Area of Interest View */
CREATE VIEW available_course_area_interest_view AS SELECT ucv.*,csv.subject_name,csv.module_name,csv.group_name,csv.syllabus_type FROM user_course_view AS ucv, course_syllabus_view AS csv WHERE ucv.course_id = csv.course_id;

/* Creating View for User Course Area of Interest View */
CREATE VIEW user_course_area_interest_batch_view AS SELECT uclv.*,scv.subject_name,scv.module_name,scv.group_name,scv.syllabus_type FROM user_course_batch_view AS uclv, course_syllabus_view AS scv WHERE uclv.course_id = scv.course_id;

/* Creating View for Assessment Master View */
-- CREATE VIEW attempt_master_view AS select p.* from attempt_master p inner join (select user_id,max(attempt_count) as attempt_count from attempt_master group by user_id) a on a.attempt_count = p.attempt_count and a.user_id = p.user_id;
