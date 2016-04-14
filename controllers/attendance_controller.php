<?php
  class AttendanceController {

    public function index() {
      if ($_SESSION['currentUserRole'] == 'student') {
        $myCoursesList = [];
        $courseIds = StudentCourse::myCourses($_SESSION['currentUserID']);

        foreach($courseIds as $courseId) {
          $course = Course::find($courseId);
          $myCoursesList[] = $course;
        }

      } else if ($_SESSION['currentUserRole'] == 'teacher') {
        $myCoursesList = [];
        $courseIds = TeacherCourse::myCourses($_SESSION['currentUserID']);

        foreach($courseIds as $courseId) {
          $course = Course::find($courseId);
          $myCoursesList[] = $course;
        }
      }

      require_once('views/attendance/index.php');
    }

    public function show() {
      $course = Course::find($_GET['course_id']);

      if ($_SESSION['currentUserRole'] == 'student') {
        $attendanceRecords = Attendance::all($_GET['course_id'], $_SESSION['currentUserID']);
      } else if ($_SESSION['currentUserRole'] == 'teacher') {
        $attendanceRecords = Attendance::findByDay($_GET['course_id'], date('Y-m-d'));
      }

      require_once('views/attendance/show.php');
    }

    public function generateAttendance() {
      if ($_GET['course_id'] && $_SESSION['currentUserRole'] == 'teacher') {
        $courseId = $_GET['course_id'];
        $teacherId = $_SESSION['currentUserID'];
        $day = date('Y-m-d');
        $studentIds = StudentCourse::whoStudies($_GET['course_id']);

        foreach($studentIds as $studentId) {
          Attendance::create($courseId, $studentId, $teacherId, $day);
        }

        header("location: /index.php?controller=attendance&action=show&course_id={$courseId}");
      }
    }

    public function removeAttendance() {
      if ($_GET['course_id'] && $_SESSION['currentUserRole'] == 'teacher') {
        $courseId = $_GET['course_id'];
        $day = date('Y-m-d');
        $studentIds = StudentCourse::whoStudies($_GET['course_id']);

        foreach($studentIds as $studentId) {
          Attendance::delete($courseId, $studentId, $day);
        }

        header("location: /index.php?controller=attendance&action=show&course_id={$courseId}");
      }
    }

    public function toggleAttendance() {
      if($_SESSION['currentUserRole'] == 'teacher' && isset($_GET['course_id']) && isset($_GET['student_id'])) {
        $courseId = $_GET['course_id'];
        $studentId = $_GET['student_id'];
        $day = date('Y-m-d');

        if (Attendance::updateHasAttended($courseId, $studentId, $day)){
          header("location: /index.php?controller=attendance&action=show&course_id={$courseId}");
        }
      }
    }

  }
?>
