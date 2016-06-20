<?php
  class Assignment {
    public $id;
    public $courseId;
    public $studentId;
    public $description;
    public $fileURL;
    public $createdAt;

    public function __construct($id, $courseId, $studentId, $description, $fileURL, $createdAt) {
      $this->id = $id;
      $this->courseId = $courseId;
      $this->studentId = $studentId;
      $this->description = $description;
      $this->fileURL = $fileURL;
      $this->createdAt = $createdAt;
    }

    public static function create($courseId, $studentId, $description, $fileURL) {
      $query = "INSERT INTO course_assignments (course_id, student_id, description, file_url, created_at)
                VALUES ('$courseId', '$studentId', '$description', '$fileURL', now())";

      if(mysql_query($query)) {
        return new Assignment(null, $courseId, $studentId, $description, $fileURL, null);
      } else {
        $_SESSION['notice'] = "Assignment error: ".mysql_error()."\n";
      }
    }

    public static function all($courseId) {
      $list = [];

      $query = "SELECT * from course_assignments WHERE course_id='$courseId' ORDER BY created_at DESC";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($assignment = mysql_fetch_array($result)) {
          $list[] = new Assignment($assignment['id'], $assignment['course_id'],
                                 $assignment['student_id'], $assignment['description'],
                                 $assignment['file_url'], $assignment['created_at']);
        }
      }

      return $list;
    }

    public static function find($assignmentId) {
      $query = "SELECT * FROM course_assignments WHERE id='$assignmentId' LIMIT 1";
      $result = mysql_query($query);
      $assignment = mysql_fetch_array($result);

      return new Assignment($assignment['id'], $assignment['course_id'],
                          $assignment['student_id'], $assignment['description'],
                          $assignment['file_url'], $assignment['created_at']);
    }

    public static function delete($assignmentId) {
      // Check if the record exists
      if($assignment = Assignment::find($assignmentId)) {
        $query = "DELETE FROM course_assignments WHERE id='$assignment->id'";
        if(mysql_query($query)) {
          return true;
        } else {
          echo "error".mysql_error()."\n";
        }
      } else {
        return false;
      }
    }

  }
?>

