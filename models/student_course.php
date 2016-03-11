<?php
  class StudentCourse {
    public $id;
    public $courseId;
    public $studentId;
    public $year;
    public $semester;
    public $createdAt;

    public function __construct($id, $courseId, $studentId, $year, $semester,
                                $createdAt) {
      $this->id = $id;
      $this->courseId = $courseId;
      $this->studentId = $studentId;
      $this->year = $year;
      $this->semester = $semester;
      $this->createdAt = $createdAt;
    }

    public static function create($courseId, $studentId) {
      $year = date('Y');
      $semester = '1';

      $query = "INSERT INTO studies (course_id, student_id, year, semester, created_at)
                VALUES ('$courseId', '$studentId', '$year', '$semester', now())";

      if(mysql_query($query)) {
        return new StudentCourse(null, $courseId, $studentId,
                        $year, $semester, null);
      } else {
        $_SESSION['notice'] = "StudentCourse error: ".mysql_error()."\n";
      }
    }

    public static function find($courseId, $studentId) {
      $query = "SELECT * FROM studies WHERE course_id='$courseId' AND student_id='$studentId' LIMIT 1";
      $result = mysql_query($query);
      $studentCourse = mysql_fetch_array($result);

      return new StudentCourse($studentCourse['id'], $studentCourse['course_id'], $studentCourse['student_id'],
                            $studentCourse['year'], $studentCourse['semester'],
                          $studentCourse['created_at']);
    }

    public static function delete($courseId, $studentId) {
      // Check if the record exists
      if($studentCourse = StudentCourse::find($courseId, $studentId)) {
        $query = "DELETE FROM studies WHERE id='$studentCourse->id'";
        if(mysql_query($query)) {
          return true;
        } else {
          echo "error".mysql_error()."\n";
        }
      } else {
        return false;
      }
    }

    public static function isSubsribed($courseId, $studentId) {
      $query = "SELECT * FROM studies WHERE course_id='$courseId' AND student_id='$studentId' LIMIT 1";
      $result = mysql_query($query);
      $course = mysql_fetch_array($result);

      if(mysql_num_rows($result) == 1) {
        return true;
      } else {
        return false;
      }
    }

  }
?>

