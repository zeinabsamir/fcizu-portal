<?php
  class AttendanceHelper {
    public static function checkAttendance($courseId, $studentId, $day) {
      if (Attendance::didAttend($courseId, $studentId, $day)) {
        return true;
      } else {
        return false;
      }
    }

  }
?>
