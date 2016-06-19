<?php
  class GradesController {

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

      require_once('views/grades/index.php');
    }

    public function show() {
      $course = Course::find($_GET['course_id']);

      if ($_SESSION['currentUserRole'] == 'student') {
        $gradeRecords = Grade::all($_GET['course_id'], $_SESSION['currentUserID']);
      } else if ($_SESSION['currentUserRole'] == 'teacher') {
        $gradeTitles = Grade::allTitles($_GET['course_id'], $_SESSION['currentUserID']);
        $gradeRecords = Grade::findByCourse($_GET['course_id']);
      }

      require_once('views/grades/show.php');
    }

    public function generateGrades() {
      if ($_POST['newGradesSubmit'] && $_GET['course_id'] && $_SESSION['currentUserRole'] == 'teacher') {
        $courseId = $_GET['course_id'];
        $teacherId = $_SESSION['currentUserID'];
        $title = mysql_real_escape_string($_POST['title']);
        $studentIds = StudentCourse::whoStudies($_GET['course_id']);
        foreach($studentIds as $studentId) {
          Grade::create($courseId, $studentId, $teacherId, $title, 0);
        }

        header("location: /index.php?controller=grades&action=show&course_id={$courseId}");
      }
    }

    public function removeGrades() {
      if ($_POST['removeGradesSubmit'] && $_GET['course_id'] && $_SESSION['currentUserRole'] == 'teacher') {
        $courseId = $_GET['course_id'];
        $title = mysql_real_escape_string($_POST['title']);
        $studentIds = StudentCourse::whoStudies($_GET['course_id']);

        foreach($studentIds as $studentId) {
          Grade::delete($courseId, $studentId, $title);
        }

        header("location: /index.php?controller=grades&action=show&course_id={$courseId}");
      }
    }

    public function edit() {
      if($_POST['updateGradeSubmit'] && $_SESSION['currentUserRole'] == 'teacher' && isset($_GET['course_id']) && isset($_GET['grade_id'])) {
        $courseId = $_GET['course_id'];
        $gradeId = $_GET['grade_id'];
        $grade = floatval($_POST['grade']);

        if (Grade::updateGrade($gradeId, $grade)){
          header("location: /index.php?controller=grades&action=show&course_id={$courseId}");
        }
      }
    }

  }
?>
