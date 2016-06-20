<?php
  class AssignmentsController {

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

      require_once('views/assignments/index.php');
    }

    public function show() {
      $course = Course::find($_GET['course_id']);

      $assignments = Assignment::all($_GET['course_id']);

      require_once('views/assignments/show.php');
    }

    public function create() {
      if (isset($_POST['createAssignmentSubmit']) && $_SESSION['currentUserRole'] == 'student') {
        $courseId = $_GET['course_id'];
        $studentId = $_SESSION['currentUserID'];
        $description = mysql_real_escape_string($_POST['description']);

        if ($filePath = FileUploader::upload_file("file_url", "/var/www/fcizuportal/public/courses/")) {
          Assignment::create($courseId, $studentId, $description, $filePath);
        } else {
          $_SESSION['notice'] = "An Error Occurred While Uploading the File!";
        }

        header("location: /index.php?controller=assignments&action=show&course_id={$courseId}");
      }
    }

    public function destroy() {
      if(isset($_GET['assignment_id']) && $_SESSION['currentUserRole'] == 'student') {
        if(Assignment::delete($_GET['assignment_id'])) {
          $_SESSION['notice'] = "Assignment was deleted successfully!";
          header("location: /index.php?controller=assignments&action=show&course_id={$_GET['course_id']}");
        }
      }
    }

    public function download() {
      if(isset($_GET['assignment_id'])){
        $file = Assignment::find($_GET['assignment_id'])->fileURL;

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }
      }
    }
  }
?>
