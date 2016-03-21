<?php
  class AttendanceHelper {
    public static function saneAttendance($status) {
      if ($status == 1) {
        return 'Attended';
      } else if ($status == 0) {
        return 'Absent';
      }
    }

  }
?>
