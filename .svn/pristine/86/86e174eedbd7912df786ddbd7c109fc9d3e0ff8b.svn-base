use ask_analytics_db;
/*DROPPING ONLY VIEWS IN skol_update_2.sql */
-- DROP VIEW IF EXISTS student_course_subject_view;
-- DROP VIEW IF EXISTS user_email_course_batch_view;
/**/
-- CREATE VIEW student_course_subject_view AS select um.registration_no , um.user_id, um.user_fname ,um.user_state,am.course_id ,  am.test_no , am.test_name , am.test_date , am.no_of_questions , am.test_score , am.test_percentage, csav.subject_name from user_master as um ,attempt_master as am, course_subject_assessment_view as csav where um.user_id = am.user_id and am.attempt_count = 1 and am.submit_status = 1 and csav.test_no = am.test_no; 

/* CREATING USER EMAIL COURSE BATCH VIEW -- used in checking email while doing bulk registration */
-- CREATE VIEW user_email_course_batch_view AS SELECT um.user_email,ucbv.* FROM user_course_batch_view AS ucbv,user_master AS um WHERE um.user_id = ucbv.user_id;