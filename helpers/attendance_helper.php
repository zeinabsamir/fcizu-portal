<?php
  class AttendanceHelper {
    public static function checkAttendance($courseId, $studentId, $day) {
      if (Attendance::didAttend($courseId, $studentId, $day)) {
        return true;
      } else {
        return false;
      }
    }

    public static function saneAttendance($status) {
      if ($status == 1) {
        return 'Attended';
      } else if ($status == 0) {
        return 'Absent';
      }
    }

  }
?>
