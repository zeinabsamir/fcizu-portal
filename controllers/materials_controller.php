<?php
  class MaterialsController {

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

      require_once('views/materials/index.php');
    }

    public function show() {
      $course = Course::find($_GET['course_id']);

      $materials = Material::all($_GET['course_id']);

      require_once('views/materials/show.php');
    }

    public function create() {
      if (isset($_POST['createMaterialSubmit']) && $_SESSION['currentUserRole'] == 'teacher') {
        $courseId = $_GET['course_id'];
        $teacherId = $_SESSION['currentUserID'];
        $description = mysql_real_escape_string($_POST['description']);

        if ($filePath = FileUploader::upload_file("file_url", "/var/www/fcizuportal/public/courses/")) {
          Material::create($courseId, $teacherId, $description, $filePath);
        } else {
          $_SESSION['notice'] = "An Error Occurred While Uploading the File!";
        }

        header("location: /index.php?controller=materials&action=show&course_id={$courseId}");
      }
    }

    public function destroy() {
      if(isset($_GET['material_id']) && $_SESSION['currentUserRole'] == 'teacher') {
        if(Material::delete($_GET['material_id'])) {
          $_SESSION['notice'] = "Material was deleted successfully!";
          header("location: /index.php?controller=materials&action=show&course_id={$_GET['course_id']}");
        }
      }
    }

    public function download() {
      if(isset($_GET['material_id'])){
        $file = Material::find($_GET['material_id'])->fileURL;

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
