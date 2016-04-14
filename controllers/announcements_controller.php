<?php
  class AnnouncementsController {

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

      require_once('views/announcements/index.php');
    }

    public function show() {
      $course = Course::find($_GET['course_id']);

      $announcements = Announcement::all($_GET['course_id']);

      require_once('views/announcements/show.php');
    }

    public function create() {
      if (isset($_POST['createAnnouncementSubmit']) && $_SESSION['currentUserRole'] == 'teacher') {
        $content = mysql_real_escape_string($_POST['content']);
        $courseId = $_GET['course_id'];
        $teacherId = $_SESSION['currentUserID'];

        Announcement::create($content, $courseId, $teacherId);

        header('location: /index.php');
      }
    }

    public function destroy() {
      if(isset($_GET['course_id']) && $_SESSION['currentUserRole'] == 'teacher') {
        if(Announcement::delete($_GET['course_id'])) {
          $_SESSION['notice'] = "Announcement was deleted successfully!";
          header('location: /index.php');
        }
      }
    }
  }
?>
