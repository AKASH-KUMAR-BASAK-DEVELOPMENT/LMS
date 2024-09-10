<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCourseEnrollmentTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER after_course_enrollment_request_accept
            AFTER UPDATE ON course_enrollments
            FOR EACH ROW
            BEGIN
                IF NEW.status = 1 THEN
                    INSERT INTO notification_log (source_id, source, user_id, message, status, created_at)
                    VALUES (NEW.id, "course_enrollments", NEW.user_id, CONCAT("User ", NEW.user_id, " enrolled in course ", NEW.course_id), 1, NOW());
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_course_enrollment_request_accept');
    }
}
