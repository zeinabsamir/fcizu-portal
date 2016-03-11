<?php
  class Course {
    public $id;
    public $title;
    public $code;
    public $department;
    public $createdAt;

    public function __construct($id, $title, $code, $department, $createdAt) {
      $this->id = $id;
      $this->title = $title;
      $this->code = $code;
      $this->department = $department;
      $this->createdAt = $createdAt;
    }

    // CREATE new course and add it to the database
    public static function create($title, $code, $department) {

      $query = "INSERT INTO courses (title, code, department, created_at)
                VALUES ('$title', '$code', '$department', now())";

      if(mysql_query($query)) {
        return new Course(null, $title, $code, $department, null);
      } else {
        $_SESSION['notice'] = "Course error: ".mysql_error()."\n";
      }
    }

    // READ a course from the database using its ID
    public static function find($id) {
      $query = "SELECT * FROM courses WHERE id='$id' LIMIT 1";
      $result = mysql_query($query);
      $course = mysql_fetch_array($result);

      return new Course($course['id'], $course['title'], $course['code'],
                            $course['department'], $course['created_at']);
    }

    // UPDATE a course
    public static function update($course) {
      $query = "UPDATE courses SET title='$course->title', code='$course->code',
                department='$course->department' WHERE id='$course->id'";

      if(mysql_query($query)){
        return true;
      } else {
        echo "error".mysql_error()."\n";
      }
    }

    // DELETE a course from the database using its ID
    public static function delete($id) {
      // Check if course exists
      if($course = Course::find($id)) {
        // Delete the course
        $query = "DELETE FROM courses WHERE id='$id'";
        if(mysql_query($query)) {
          return true;
        } else {
          echo "error".mysql_error()."\n";
        }
      } else {
        return false;
      }
    }

    // Return a list of all the courses in the database
    public static function all() {
      $list = [];

      $query = "SELECT * FROM courses";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($course = mysql_fetch_array($result)) {
          $list[] = new Course($course['id'], $course['title'], $course['code'],
                             $course['department'], $course['created_at']);
        }
      }

      return $list;
    }
  }
?>
