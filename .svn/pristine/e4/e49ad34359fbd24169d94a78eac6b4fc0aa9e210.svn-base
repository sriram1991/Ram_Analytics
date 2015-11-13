use ask_analytics_db;
/* Dropping OLD Triggers */
DROP TRIGGER IF EXISTS trigger_new_course_entry;
DROP TRIGGER IF EXISTS trigger_new_course_sub;
DROP TRIGGER IF EXISTS trigger_course_unsub;

/* Creating Trigger for new course entry when course is created */
CREATE TRIGGER trigger_new_course_entry AFTER INSERT ON course_master FOR EACH ROW INSERT INTO course_subscription_count_master (course_id) values (NEW.course_id);

/* Creating Trigger for course subscription count update on new course subscription by user */

CREATE TRIGGER trigger_new_course_sub AFTER INSERT ON batch_master FOR EACH ROW UPDATE course_subscription_count_master SET sub_count = sub_count + 1 WHERE course_id = NEW.course_id;

/* Creating Trigger for course subscription count update on course un-subscription user by admin */
CREATE TRIGGER trigger_course_unsub AFTER DELETE ON batch_master FOR EACH ROW UPDATE course_subscription_count_master SET sub_count = sub_count - 1 WHERE course_id = OLD.course_id;
