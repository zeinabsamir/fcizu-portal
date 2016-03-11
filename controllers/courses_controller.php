<?php
  class CoursesController {

    // List all courses in variable $courses and giving it to the view
    // We grab the list of courses using Course::all() method
    // /?controller=courses&action=index
    public function index() {
      $courses = Course::all();

      require_once('views/courses/index.php');
    }

    // Show one course using its id which we get from the request parameters using $_GET('id')
    // /?controller=courses&action=show&id=x
    public function show() {
      if (!isset($_GET['id']))
        return call('pages', 'error');

      // we use the given id to get the right course
      $course = Course::find($_GET['id']);
      require_once('views/courses/show.php');
    }

    // Create a course using Course::create() method from the model
    // /?controller=courses&action=create
    public function create() {
      require_once('views/courses/create.php');

      if(isset($_POST['createCourseSubmit'])) {
        $title = mysql_real_escape_string($_POST['title']);
        $code = mysql_real_escape_string($_POST['code']);
        $faculty = mysql_real_escape_string($_POST['faculty']);
        $department = mysql_real_escape_string($_POST['department']);

        // Create the course in the database
        if($course = Course::create($title, $code, $faculty, $department)) {
          $_SESSION['notice'] = 'Course was created successfully!';

          // Go to the home page
          header('location: /index.php');
          exit();
        }
      }
    }

    // edit course using Course::update()
    // /?controller=courses&action=edit&id=x
    public function edit() {
      if(isset($_GET['id'])) {
        $course = Course::find($_GET['id']);

        require_once('views/courses/edit.php');

        if(isset($_POST['editCourseSubmit'])) {
          $course->title = $_POST['title'] ? mysql_real_escape_string($_POST['title']) : $course->title;
          $course->code = $_POST['code'] ? mysql_real_escape_string($_POST['code']) : $course->code;
          $course->faculty = $_POST['faculty'] ? mysql_real_escape_string($_POST['faculty']) : $course->faculty;
          $course->department = $_POST['department'] ? mysql_real_escape_string($_POST['department']) : $course->department;

          if(Course::update($course)) {
            // Redirect the course to home(index) page
            header('location: /index.php');
            exit();
          }

        }
      } else {
        // Redirect the course to home(index) page
        header('location: /index.php');
        exit();
      }
    }

    // Delete course using Course::delete()
    // /?controller=courses&action=destroy&id=x
    public function destroy() {
      if(isset($_GET['id'])) {
        if(Course::delete($_GET['id'])) {
          $_SESSION['notice'] = "Course was deleted successfully!";
          header('location: /index.php');
        }
      }
    }

    // subscribe to course using StudentCourse::create() OR TeacherCourse::delete()
    // /?controller=courses&action=subscribe&course_id=x&user_id=y
    public function subscribe() {
      if(isset($_GET['course_id']) && isset($_GET['user_id'])) {
        if($_SESSION['currentUserRole'] == 'student') {
          if(StudentCourse::create($_GET['course_id'], $_GET['user_id'])) {
            $_SESSION['notice'] = "Subscribed successfully!";
            header('location: /index.php');
          }
        } else if($_SESSION['currentUserRole'] == 'staff') {
          if(TeacherCourse::create($_GET['course_id'], $_GET['user_id'])) {
            $_SESSION['notice'] = "Subscribed successfully!";
            header('location: /index.php');
          }
        } else {
            header('location: /index.php');
        }
      }
    }

    // unsubscribe to course using StudentCourse::delete() OR TeacherCourse::delete()
    // /?controller=courses&action=unsubscribe&course_id=x&user_id=y
    public function unsubscribe() {
      if(isset($_GET['course_id']) && isset($_GET['user_id'])) {
        if($_SESSION['currentUserRole'] == 'student') {
          if(StudentCourse::delete($_GET['course_id'], $_GET['user_id'])) {
            $_SESSION['notice'] = "Unsubscribed successfully!";
            header('location: /index.php');
          }
        } else if($_SESSION['currentUserRole'] == 'staff') {
          if(TeacherCourse::delete($_GET['course_id'], $_GET['user_id'])) {
            $_SESSION['notice'] = "Unsubscribed successfully!";
            header('location: /index.php');
          }
        } else {
            header('location: /index.php');
        }
      }
    }

  }
?>
