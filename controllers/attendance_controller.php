<?php
  class AttendanceController {

    // List all users in variable $users and giving it to the view
    // We grab the list of users using User::all() method
    // /?controller=user&action=index
    public function index() {
      $myCoursesList = [];

      $courseIds = TeacherCourse::myCourses($_SESSION['currentUserID']);
      foreach($courseIds as $courseId) {
        $course = Course::find($courseId);
        $myCoursesList[] = $course;
      }

      require_once('views/attendance/index.php');
    }

    public function show() {
      $studentsList = [];

      $course = Course::find($_GET['id']);

      $studentIds = StudentCourse::whoStudies($_GET['id']);
      foreach($studentIds as $studentId) {
        $student = User::find($studentId);
        $studentsList[] = $student;
      }

      require_once('views/attendance/show.php');
    }

  }
?>
