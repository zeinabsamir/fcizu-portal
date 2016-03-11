<?php
  class CoursesHelper {
    public static function checkSubscription($courseId, $userId) {
      if($_SESSION['currentUserRole'] == 'student') {
        return StudentCourse::isSubsribed($courseId, $userId);
      } else if($_SESSION['currentUserRole'] == 'staff') {
        return TeacherCourse::isSubsribed($courseId, $userId);
      } else {
        return false;
      }
    }

  }
?>
