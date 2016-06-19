<?php
  class Grade {
    public $id;
    public $courseId;
    public $studentId;
    public $teacherId;
    public $title;
    public $grade;
    public $createdAt;

    public function __construct($id, $courseId, $studentId, $teacherId, $title,
                                $grade, $createdAt) {
      $this->id = $id;
      $this->courseId = $courseId;
      $this->studentId = $studentId;
      $this->teacherId = $teacherId;
      $this->title = $title;
      $this->grade = $grade;
      $this->createdAt = $createdAt;
    }

    public static function create($courseId, $studentId, $teacherId, $title, $grade) {
      $query = "INSERT INTO grades (course_id, student_id, teacher_id, title, grade, created_at)
                VALUES ('$courseId', '$studentId', '$teacherId', '$title', '$grade', now())";

      if(mysql_query($query)) {
        return new Grade(null, $courseId, $studentId, $teacherId, $title, $grade, null);
      } else {
        $_SESSION['notice'] = "Grade error: ".mysql_error()."\n";
      }
    }

    public static function find($courseId, $studentId, $title) {
      $query = "SELECT * FROM grades WHERE course_id='$courseId' AND student_id='$studentId' AND title='$title' LIMIT 1";
      $result = mysql_query($query);
      $grade = mysql_fetch_array($result);

      return new Grade($grade['id'], $grade['course_id'], $grade['student_id'],
                            $grade['teacher_id'], $grade['title'],
                            $grade['grade'], $grade['created_at']);
    }

    public function findByCourse($courseId) {
      $list = [];

      $query = "SELECT * from grades WHERE course_id='$courseId'";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($grade = mysql_fetch_array($result)) {
          $list[] = new Grade($grade['id'], $grade['course_id'], $grade['student_id'],
                            $grade['teacher_id'], $grade['title'],
                            $grade['grade'], $grade['created_at']);
        }
      }

      return $list;
    }

    public static function all($courseId, $studentId) {
      $list = [];

      $query = "SELECT * from grades WHERE course_id='$courseId' AND student_id='$studentId'";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($grade = mysql_fetch_array($result)) {
          $list[] = new Grade($grade['id'], $grade['course_id'], $grade['student_id'],
                            $grade['teacher_id'], $grade['title'],
                            $grade['grade'], $grade['created_at']);
        }
      }

      return $list;
    }

    public static function updateGrade($id, $grade) {
      $query = "UPDATE grades SET grade='$grade' WHERE id='$id'";

      if(mysql_query($query)){
        return true;
      } else {
        echo "error".mysql_error()."\n";
      }
    }

    public static function delete($courseId, $studentId, $title) {
      // Check if the record exists
      if($grade = Grade::find($courseId, $studentId, $title)) {
        $query = "DELETE FROM grades WHERE id='$grade->id'";
        if(mysql_query($query)) {
          return true;
        } else {
          echo "error".mysql_error()."\n";
        }
      } else {
        return false;
      }
    }

    // Get a list of all distinct titles of grade records in the database
    public static function allTitles($courseId, $teacherId) {
      $list = [];
      $query = "SELECT DISTINCT title from grades where course_id='$courseId' AND teacher_id='$teacherId'";
      $result = mysql_query($query);

      if (mysql_num_rows($result) > 0) {
        while($grade = mysql_fetch_array($result)) {
          $list[] = $grade['title'];
        }
      }

      return $list;
    }

  }
?>
