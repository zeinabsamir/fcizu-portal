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
      $course = Course::find($_GET['id']);

      if ($_SESSION['currentUserRole'] == 'student') {
        $attendanceRecords = Attendance::all($_GET['id'], $_SESSION['currentUserID']);
      } else if ($_SESSION['currentUserRole'] == 'teacher') {
        $studentsList = [];
        $studentIds = StudentCourse::whoStudies($_GET['id']);

        foreach($studentIds as $studentId) {
          $student = User::find($studentId);
          $studentsList[] = $student;
        }
      }

      require_once('views/attendance/show.php');
    }

    public function addAttendance() {
      if(isset($_GET['course_id']) && isset($_GET['student_id']) && isset($_GET['teacher_id'])) {
        $courseId = $_GET['course_id'];
        $studentId = $_GET['student_id'];
        $teacherId = $_GET['teacher_id'];
        $hasAttended = 1;
        $day = date('Y-m-d');

        if (Attendance::create($courseId, $studentId, $teacherId, $hasAttended, $day)){
          header('location: /index.php');
        }
      }
    }

    public function removeAttendance() {
      if(isset($_GET['course_id']) && isset($_GET['student_id'])) {
        $courseId = $_GET['course_id'];
        $studentId = $_GET['student_id'];
        $day = date('Y-m-d');

        if (Attendance::delete($courseId, $studentId, $day)){
          header('location: /index.php');
        }
      }
    }

  }
?>
